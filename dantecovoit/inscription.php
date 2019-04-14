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
	$PasswordConfirmation = trim($PasswordConfirmation);
	
	if(empty($Nom)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un nom !";
	}
	
	if(empty($Prenom)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un prenom !";
	}
	
	if(empty($Mail)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un mail !";
	}
	
	$req = $DB->query('Select mail from user where mail = :mail', array('mail' => $Mail));
	$req = $req->fetch();
	
	if(empty($Codepost)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un Code Postal !";
	}
	if(empty($Ville)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre une ville !";
	}
	/*if(!empty($Mail) && $req['mail']){
		$valid = false;
		$_SESSION['flash']['danger'] = "Ce mail existe déjà";
		
	}*/
	if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $Mail)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un mail conforme !";
	}
	
	if(empty($Password)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez renseigner votre mot de passe !";

	}elseif($Password && empty($PasswordConfirmation)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez confirmer votre mot de passe !";
	
	}elseif(!empty($Password) && !empty($PasswordConfirmation)){
		if($Password != $PasswordConfirmation){
			
			$valid = false;
			$_SESSION['flash']['danger'] = "La confirmation est différente !";
		}		
	}
		
	if($valid){
		
		
		$PrenomUPPER = ucfirst(strtolower($Prenom));
		$NomUPPER = strtoupper(strtolower($Nom));
		$Pseudo = $PrenomUPPER.".".$initial = substr($NomUPPER, 0, 1) ;
		
		$DB->insert('Insert into user (nom, prenom, pseudo, mail, codepost, ville, password) values (:nom, :prenom, :pseudo, :mail, :codepost, :ville, :password)', array('nom' => ucfirst(strtoupper($Nom)), 'prenom' => ucfirst(strtolower($Prenom)), 'pseudo' => $Pseudo, 'mail' => $Mail, 'codepost' => $Codepost, 'ville' => $Ville, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t')));
	
		$_SESSION['flash']['success'] = "Votre inscription a bien été prise en compte, connectez-vous !";
		header('Location: connexion.php');
		exit;
		
	}	
}	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css"/>

	
	<title>Inscription</title>
</head>
<body>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	



	<form class="container inscription" method="post" action="inscription.php">
		<fieldset>
			<legend id='incriptitre'>INSCRIPTION</legend>
	    <div class="form-row">
	    	<div class="form-group col-md-6">
	      		<label for="inputEmail4">Identité:</label>
	      		<input class="form-control" type="text" name="Nom" placeholder="Nom" value="<?php if (isset($Nom)) echo $Nom; ?>" maxlength="20" required="required">
	    	</div>
	    	<div class="form-group col-md-6">
	      		<label for="inputPassword4">&nbsp;</label>
	      		<input class="form-control" type="text" name="Prenom" placeholder="Prenom" value="<?php if (isset($Prenom)) echo $Prenom; ?>" required="required">
	    	</div>
	  	</div>
	  	<div class="form-group">
	    	<label for="inputAddress">Email:</label>
	    	<input class="form-control" type="email" name="Mail" placeholder="Votre mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required">
	  	</div>
	  	<div class="form-row">
	    	<div class="form-group col-md-4">
	      		<label for="inputEmail4">Coordonnée:</label>
	      		<input class="form-control" type="codepost" name="Codepost" placeholder="Code Postal" value="<?php if (isset($Codepost)) echo $Codepost; ?>" required="required">
	    	</div>
	    	<div class="form-group col-md-8">
	      		<label for="inputPassword4">&nbsp;</label>
	      		<input class="form-control" type="ville" name="Ville" placeholder="Ville" value="<?php if (isset($Ville)) echo $Ville; ?>" required="required">
	    	</div>
	  	</div>
	  	<div class="form-group">
	    	<label for="inputAddress">Mot de passe:</label>
	    	<input class="form-control" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required="required">
	  	</div>
	  	<div class="form-group">
	    	<label for="inputAddress">Confirmation:</label>
	    	<input class="form-control" type="password" name="PasswordConfirmation" placeholder="Confirmation du mot de passe" required="required">
	  	</div>
	  	<div class="form-group">
	    	<div class="form-check">
	      		<input class="form-check-input" type="checkbox">
	      		<label class="form-check-label" for="gridCheck">
	        	J'accepte les <a href="cgu.php">conditions d'utitlisation</a>
	      		</label>
	    	</div>
	  	</div>                               
				<button type="submit" class="btn btn-primary">S'inscrire</button>	                	                                                	    
	  </fieldset>
	</form>

</html>