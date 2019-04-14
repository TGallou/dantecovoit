<?php
session_start();
include_once('includes.php');	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Accueil</title>
</head>
<body>
					<!--____PAGE UNE____-->

	<!--______________________navbar_____________________-->

	<ul class="nav_bar">
	  <li><a href="index.php"><img src="img/logo_fld.png" class="fld"></a></li>
	  
	  <?php 				       
						if(!isset($_SESSION['id'])){
							echo '<li class="bouton"><a href="inscription.php" class="profil2"><img src="img/logo_inscription.png" class="icon">Inscription</a></li>';
							echo '<li class="bouton"><a href="connexion.php" class="profil"><img src="img/logo_connexion.png" class="icon"> Connexion</a></li>';
				    	}
						else{
							echo '<li class="bouton"><a href="#" class="user2"></li>';
							echo '<li class="bouton"><a href="utilisateur.php" class="user">'.$_SESSION['pseudo'].' <img src="img/triangle.png" class="fleche"></a></li>';				
						}			       	
		?>
	</ul>

	<!--______________________fin navbar_______________________-->




<!--_________________Trouver une course__________________-->

<div class="image_baner">
  <!--________image_________-->
	<div class="image_slide">
		<!--___________text____________-->
		<div class="trouver_course">
			<ul>
				<li><h1>Près à faire de nouvelles rencontres ?!</h1></li>
			</ul>
			<ul>
				<li><h3>Le covoiturage c'est plus sympas</h3></li>
			</ul>
			<!--____________Boutons_____________-->
			<ul class="course">
				<li class="course_bouton col-md-3"><input type="text" name="depart" placeholder="Départ" class="form-control"></li>

				<li class="course_bouton col-md-3" form-control><input type="text" name="destination" placeholder="Destination" class="form-control" /></li>

				<li class="course_bouton col-md-3"><input type="date" class="form-control" /></li>

				<li class="course_bouton col-md-3"><input type="submit" class="btn btn-info valider" value="Chercher un trajet"></li>
			</ul>
		</div>
	</div>
</div>
<!--___________________Fin trouver course_________________________-->





						<!--____PAGE DEUX____--> 


<!-- ________________________proposer trajet_______________________-->

<div class="proposer_trajet2 container">
	<!--____________Image____________-->
	<div class="image">
		<img src="img/covoiturage.jpg">
	</div>
	<!--__________texte________________-->
	<div class="text" >
		<ul>
			<li><h3>Vous avez une voiture ?<br>Ne roulez pas seuls</h3></li>
			<li><p>Ensemble, permetons a des etudiants d'aller à Felix le Dantec</p></li>
			<li><a href="Proposer_trajet.html" class="btn btn-success">Proposer un trajet</a></li>
		</ul>
	</div>
</div>
<!--_______________________Fin proposer trajet_________________________-->





<!--_______________Bandeau bouton______________-->

<div class="pub container-fluid">
	<ul class="container">
		<!--_____________Text___________-->
		<li class="text col-md-4"><h3>Outils :</h3></li>
			<!--__________Bouton____________-->
		<li class="col-md-4 bouton " ><a class="btn btn-primary"href="http://www.toutatice.fr/portail" target="_blank">Toutatice</a></li>
		<li class="col-md-4 bouton"><a class="btn btn-primary" href="http://lycee-ledantec.fr/" target="_blank">Felix Le Dantec</a></li>
		<li class="col-md-4 bouton"><a class="btn btn-primary" href="http://www.meteofrance.com/previsions-meteo-france/bretagne/regin05">Meteo France</a></li>
	</ul>
</div>

<!--_________________Fin bandeau bouton________________-->



<!--_____________Promotion_______________-->

<div class="container promo">
	<h2>Deplacez-vous rapidement !</h2>
	<div class="container">
		<ul class="col-md-4 p1">
			<li><h5>Pratique</h5></li>
			<li>Trouvez rapidement un covoiturage à proximité qui vous emènera ou ramènera du lycée.</li>
		</ul>
		<ul class="col-md-4 p1">
			<li><h5>Facile</h5></li>
			<li>Réservez le trajet parfait ! Il suffit d'entrer votre adresse exacte et de choisir avec qui vous voulez voyager.</li>
		</ul>
		<ul class="col-md-4">
			<li><h5>Direct</h5></li>
			<li>Vous arrivez à l'adresse exacte de votre destination sans perdre de temps sur le quai ou dans les files d'attente.</li>
	</div>
</div>

<!--_____________Fin Promotion_______________-->





<!--_______________Deuxime promo______________-->
<div class="down_page">
	<div class="back_lines">
		<div class="container promo2">
			<h2>Ce qui va vous plaire</h2>
			<ul class="col-md-4 p1">
				<li><img src="img/panneau.jpg"><br><h5>Avoir le choix</h5></li>
				<li>L'avantage des routes ? Elles vont partout ou partent du lycée !Profitez de centaine de destinations.</li>
			</ul>
			<ul class="col-md-4 p1">
				<li><img src="img/communaute.png"><br><h5>Communauté</h5></li>
				<li>Nous connaissons chacun de nos membres. Et tous sont au Lycée Felix Le Dantec. Vous savez ainsi avec qui vous voyagez.</li>
			</ul>
			<ul class="col-md-4">
				<li><img src="img/assurance.png"><br><h5>Assurance</h5></li>
				<li>Chacun de nos membre son noté et son donc fiable. Vous pouvez donc etre sûs que le trajet sera effectué !</li>
			</ul>
		</div>
	</div>
</div>

<!--_______________Fin Deuxime promo______________-->




<!--______________Bas de page________________-->
<div class="bas_page container-fluid">
	<ul>
		<li><img src="img/logo_fld.png"></li>
		<li>Lycée Félix Le Dantec<br>
			Rue des Cordiers • BP 80349<br>
			22303 Lannion cedex
		</li>
		<li class="num">Tel. 02 96 05 61 71</li>
	</ul>
	<ul class="label">
		<li><h4>ÉTABLISSEMENT LABELLISÉ</h4></li>
		<li><img src="img/academie_rennes.png"></li>
		<li><img src="img/logo-erasmus.png"></li>
		<li><img src="img/logo_campus_blanc.png"></li>
	</ul>
	<ul class="contact">
		<li><a href="contact.html" class="btn btn-secondary"><h5>CONTACT & ACCES</h5></a></li>
	</ul>
	<ul class="img_points">
		<li><img src="img/points.png"></li>
	</ul>
</div>
<!--______________Fin Bas de page________________-->




<!--______________pied de page________________-->
<div class="pied container-fluid">
	<ul class="container">
		<!--_____________Text___________-->
		<li class="text col-md-6"><a href="#" target="_blank">MENTION LEGALE</a></li>
			<!--__________Bouton____________-->
		<li class="col-md-6">2018 LYCEE FELIX LE DANTEC - Webdesign : <a href="#" target="_blank">SENOU</a></a></li>
	</ul>
</div>

<!--______________Fin pied de page________________-->
</body>
</html>