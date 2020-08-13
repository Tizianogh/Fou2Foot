<?php
		if(isset($_POST['valid'])) {
		 if(!empty($_POST['mail']) && !empty($_POST['fixe']) && !empty($_POST['port']) && !empty($_POST['nais']) && !empty($_POST['urg'])){
		$con = mysqli_connect("localhost","root","","fdf");
		$mail1 = htmlspecialchars($_POST['mail']);
		$fixe1 = htmlspecialchars($_POST['fixe']);
		$port1 = htmlspecialchars($_POST['port']);
		$nais1 = htmlspecialchars($_POST['nais']);
		$urg1 = htmlspecialchars($_POST['urg']);
		$date1 = date("Y-m-d");
		$login1 = $_SESSION["login"];
		$nom1  = $_SESSION["nom"];
		$prenom1 = $_SESSION["prenom"];
			$req = "INSERT INTO adherant (NOADH ,USER, NOMADH, PRENOMADH, ADRMAILADH, NOTELADH, NOPORTADH, DTNAISSADH, NOTELURG, DTINSCRIPTION, DTFINADH)
                ('2', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
				if(mysqli_query($con,$req)){
							$succes = 'Félicitation vous êtes inscrit';
					}
				else {
					$erreur="Echec requête";
				}
			}
			else {
				$erreur="Vous n'avez pas remplis tous les champs !";
			}
		} //isset
	?>
<div class='titrePage'>Formulaire d'inscription</div>
<form action='pagenew.php?page=adh' method='post'>
	<table class='test' border='1px solid black' style="text-align: center">
		<tr>
			<td>
				Adresse MAIL :
			</td>
			<td>
				<input type='email' name='mail' placeholder= 'Adresse Mail'/>
			</td>
		</tr>
		<tr>
			<td>
				N° de téléphone  :
			</td>
			<td>
				<input type="tel" placeholder="téléphone fixe" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name='fixe'>
			</td>
		</tr>
		<tr>
			<td>
				N° de portable :
			</td>
			<td>
				<input type='tel' pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" placeholder="téléphone portable" name='port'/>
			</td>
		</tr>
		<tr>
			<td>
				Date de naissance :
			</td>
			<td>
				<input type='Date' name='nais'/>
			</td>
		</tr>
		<tr>
			<td>
				N° de téléphone (urgence)
			</td>
			<td>
				<input type='tel' name='urg' pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" placeholder="téléphone portable" placeholder="téléphone d'urence" />
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='submit' name='valid' value='OK'/>
			</td>
		</tr>
	<?php
	if(isset($erreur))
	{		echo "<tr>
						<td colspan ='2'>";
						echo"<div class='erreur'>";
									echo $erreur;
						echo "</div>";
		echo "</td>
		</tr>";
	}
	else if(isset($succes)){
	echo "<tr>
						<td colspan ='2'>";
			echo"<div class='confirm'>";
							echo $succes;
			echo "</div>";
		echo "</td>
		</tr>";
	}
	?>
	</form>
</table>
