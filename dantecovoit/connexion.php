<?php
session_start();
include_once('includes.php');

if(isset($_SESSION['pseudo'])){
	header('Location: index.php');
	exit;
}

if(!empty($_POST)){
	extract($_POST);
	$valid = true;
	
	$Mail = htmlspecialchars(trim($Mail));
	$Password = trim($Password);
		
	if(empty($Mail)){
		$valid = false;
		$_SESSION['flash']['warning'] = "Veuillez renseigner votre mail !";
	}
	
	if(empty($Password)){
		$valid = false;
		$error_password = "Veuillez renseigner un mot de passe !";
	}
	
	
	$req = $DB->query('Select * from user where mail = :mail and password = :password', array('mail' => $Mail, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t')));
	$req = $req->fetch();
		
	if(!$req['mail']){
		$valid = false;
		$_SESSION['flash']['danger'] = "Votre mail ou mot de passe ne correspondent pas";
	}
	
	
	if($valid){
		
		$_SESSION['id'] = $req['id'];
		$_SESSION['pseudo'] = $req['pseudo'];
		$_SESSION['mail'] = $req['mail'];
		$_SESSION['password'] = $req['password'];
		
		$_SESSION['flash']['info'] = "Bonjour " .$_SESSION['pseudo'];
		header('Location: index.php');
		exit;
			
	}
	
}	
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/membre.css">
		<title>Connexion</title>
	</head>
	
	<body class="connexion">
	
	<?php 
		    if(isset($_SESSION['flash'])){ 
		        foreach($_SESSION['flash'] as $type => $message): ?>
				<div id="alert" class="alert alert-<?= $type; ?> infoMessage">
					<?= $message; ?>
				</div>	
		    
			<?php
			    endforeach;
			    unset($_SESSION['flash']);
			}
	?> 
	
	<div class="container formulaire">
		

	
		<div class="container-fluid">
			<h3>Connexion</h3>
			<br>
			<form class="con-form" method="post" action="">
				                             
	                    <div class="form-group">
							<label>Mail</label>	
							<input class="form-control" type="email" name="Mail" placeholder="Mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required">						
						</div>
						
						<div class="form-group">
							<label>Mot de passe</label>	                    	
							<?php
								if(isset($error_password)){
									echo $error_password."<br/>";
								}	
							?>
							<input class="form-control" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required="required">
						</div>
	
	
	                    <button type="submit" class="btn btn-primary">Se connecter</button>
						<div class="form-row">
							<div class="form-group col-6">
								<a href="inscription.php">Pas encore inscrit !</a>
							</div>
							<div class="form-group col-6">
								<a href="#">Mot de passe oublié ?</a>
							</div>
						</div>              
			</form>		
	</div>
	</body>
</html>