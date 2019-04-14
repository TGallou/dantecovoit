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
	<title>Accueil - Dantecovoit</title>
</head>
<body>
					<!--____PAGE UNE____-->

	<!--______________________navbar_____________________-->

	<ul class="nav_bar">
	  <li><a href="index.php"><img src="img/logo_fld.png" class="fld"></a></li>
	</ul>

	<!--______________________fin navbar_______________________-->


<!--_______________Deuxime promo______________-->
<div class="down_page">
	<div class="back_lines">
		<a href="profil.php"><div class="container profilbtn">
			<ul class="col-md-4 p1">
				<li><img src="img/profil2.png"><br><h5>Profil</h5></li>
				<li>Consulter mon profil</li>
			</ul>
			</div></a>
			<a href="info.php"><div class="container info">
			<ul class="col-md-4 p1">
				<li><img src="img/info.png"><br><h5>Info</h5></li>
				<li>Consulter la page d'informations</li>
			</ul>
			</div></a>
			<a href="deconnexion.php"><div class="container deconnexion">
			<ul class="col-md-4">
				<li><img src="img/deconnexion.png"><br><h5>Déconnexion</h5></li>
				<li>Se déconnecter</li>
			</ul>
		</div></a>
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