<?php
session_start();
include_once('includes.php');

if(!isset($_SESSION['pseudo'])){
	header('Location: index.php');
	exit;
}

if(!empty($_POST)){
	extract($_POST);
	$valid = true;

	if($modifier == "mdp"){
		
		$Password = trim($Password);
		$PasswordConfirmation =trim($PasswordConfirmation);
		$NewPassword = trim($NewPassword);
		
		$req = $DB->query("Select * from user where id = :id", array('id' => $_SESSION['id']));
		$req = $req->fetch();
		
		if(empty($Password)){
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez insérer votre mot de passe actuel !";
		
		}elseif($NewPassword && empty($PasswordConfirmation)){
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez confirmer votre nouveau mot de passe";

		}elseif($NewPassword != $PasswordConfirmation){
			$valid = false;
			$_SESSION['flash']['danger'] = "Confirmation du nouveau mot de passe invalide !";

		}else if($req['password'] != (crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'))){
			$valid = false;
			$_SESSION['flash']['danger'] = "Mot de passe actuel incorrect !";
			
		}else if(empty($NewPassword)){
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez insérer un nouveau mot de passe !";
	
		}else if($valid){
			
			$DB->insert("UPDATE user SET password = :newpassword where id = :id", array('id' => $_SESSION['id'], 'newpassword' => (crypt($NewPassword, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'))));
			
			$_SESSION['flash']['success'] = "Votre nouveau mot de passe a été enregistré !";
			header('Location: modifier.php');
			exit;
			
		}	
	}
}		
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/>
		<link href="css/membre.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
		
		<title>Modifier profil</title>
	</head>
	
	<body>	
	<header>
		<img id="logo" src="img/logo.png" alt="" />
	</header>
		
		<?php 
		    if(isset($_SESSION['flash'])){ 
		        foreach($_SESSION['flash'] as $type => $message): ?>
				<div id="alert" class="alert alert-<?= $type; ?> infoMessage"><a class="close">X</span></a>
					<?= $message; ?>
				</div>	
		    
			<?php
			    endforeach;
			    unset($_SESSION['flash']);
			}
		?> 
			
		
		<div class="container-fluid">
			
	        <div class="row">
		       	
		       	<div class="col-xs-1 col-sm-2 col-md-3"></div>
		       	<div class="col-xs-10 col-sm-8 col-md-6">
			       	
			       <h1 class="index-h1">Modifier votre profil</h1>
			       	
			       <br/>
	                
	                <form method="post" action="modifier.php">

	                    <label>Mot de passe actuel :</label>	                 

                        <input class="input" type="password" name="Password" placeholder="Mot de passe actuel" required="required"/>
					
						<br/>
	                    
	                    <label>Nouveau mot de passe :</label>
                        <input class="input" type="password" name="NewPassword" placeholder="Nouveau mot de passe" required="required"/>
						
						<br/>
						
						<label>Confirmez votre nouveau mot de passe :</label>

                        <input class="input" type="password" name="PasswordConfirmation" placeholder="Nouveau mot de passe" required="required"/>
						
						<br/><br/>
						
	                    <div class="row">
	                        <div class="col-xs-0 col-sm-10 col-md-2"></div>
	                        <div class="col-xs-12 col-sm-2 col-md-8">
		                        <input type="hidden" value="mdp" name="modifier"/>
								<button type="submit">Modifier mon Mot De Passe</button>
	                        </div>
	                        <div class="col-xs-0 col-sm-1 col-md-2"></div>                                
	                   </div>
	
	                </form>
			       
					<br/>
					<a href="index.php">Retour à l'accueil</a>

		       	</div>
	            <div class="col-xs-1 col-sm-2 col-md-3"></div>
	        </div>
        </div>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Remove 000webhost Banner -->
		<script>
			$(document).ready(function(){ 
			$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
			}); 
		</script>
<!-- End Remove 000webhost Banner -->
	</body>
</html