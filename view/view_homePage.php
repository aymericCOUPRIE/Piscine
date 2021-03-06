<?php 
	include_once("header.php");
?>

<div class="container mb-5">
	<div class="mt-5 text-center">
		<h1 class="font_blue">Mon Profil</h1>
		<hr style="width: 50%;">
		<!-- affichage des informations du profil de l'utilisateur connecte a l'aide des variable de sessions -->
		<?php 
			echo ('<h4 class="mt-5">Bonjour '.$_SESSION["firstName"].'</h4>');

			echo('<ul class="list-group list-group-flush"><li class="list-group-item">Votre mail est : '.$_SESSION["mail"].'</li>');
			if(isset($_SESSION["numStu"])){
				echo('	
					<li class="list-group-item">Votre numéro étudiant est : '.$_SESSION["numStu"].'</li>
					<li class="list-group-item">Vous êtes groupe '.$_SESSION["idGrp"].'</li>
					<li class="list-group-item">Vous êtes connecté en tant qu\'étudiant</li>	
				');
			}
			else{
				echo('<li class="list-group-item">Vous êtes connecté en tant que professeur</li>');
			}
			echo ('</ul>');
		 ?>

		 <div class="container text-center mt-5">
		 	<div class="row">		
		 		<?php
					//Si le numero etudiant n'est pas initialise dans les variables de sessions alors le compte est de type professeur
					//On affiche alors le bouton qui lui permettra de valider d'autres enseignants 
		 			if(!isset($_SESSION["numStu"])){
						echo ('
						<div class="col">
		 					<form method="post" action="../controller/ctrl_valid_teacher.php">	
								<div class="mt-4" >
									<input type="submit" class="btn btn-primary" name="envoi" value="Valider un professeur" id="envoi"/>
								</div>
							</form>
			 			</div>');
		 			}
		 		 ?>
				<!-- tous les utilisateurs peuvent changer de mot de passe -->
		 		<div class="col">
		 			<form method="post" action="../controller/ctrl_changePassword.php">
			 			<div class="col">
			 				<div class="mt-4" >
								<input type="submit" class="btn btn-primary" name="envoi" value="Changer de mot de passe" id="envoi"/>
							</div>
			 			</div>
		 			</form>
		 		</div>
		 	</div>
		 </div>
		
	</div>	
</div>

 <?php 
	include_once("footer.php");
 ?>
</body>
</html>