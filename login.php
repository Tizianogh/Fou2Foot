<?php
if(isset($_POST['valid'])){
	if(!empty($_POST['login']) && !empty($_POST['mdp'])){
		$con = mysqli_connect("localhost","root","","fdf");
		$login = $_POST['login'];
		$pwd = $_POST['mdp'];
		$req = mysqli_query($con,"SELECT * FROM compte WHERE USER='$login' AND MDP='$pwd'");
		if(!$ligne = mysqli_fetch_array($req)){
				$erreur = 'Le login ou le mot de passe est incorrect';
		}
		else{
				if($ligne['TYPECOMPTE']=='RES'){
					session_start();
					$_SESSION['login'] = $login;
					$_SESSION['mdp'] = $pwd;
					$_SESSION['prenom'] = $ligne['PRENOMCPTE'];
					$_SESSION['nom'] = $ligne['NOMCPTE'];
					header('location: pageresponsable.php?page=accueil');
					mysqli_close($con);
				}
				if($ligne['TYPECOMPTE']=='FDF'){
					session_start ();
					$_SESSION['login'] = $login;
					$_SESSION['mdp'] = $pwd;
					$_SESSION['prenom'] = $ligne['PRENOMCPTE'];
					$_SESSION['nom'] = $ligne['NOMCPTE'];
					header('location: adherent.php?page=accueil');
					mysqli_close($con);
				}
				if($ligne['TYPECOMPTE']=='AD'){
					session_start ();
					$_SESSION['login'] = $login;
					$_SESSION['mdp'] = $pwd;
					$_SESSION['prenom'] = $ligne['PRENOMCPTE'];
					$_SESSION['nom'] = $ligne['NOMCPTE'];
					header('location: pageadm.php?page=accueil');
					mysqli_close($con);
				}
				if($ligne['TYPECOMPTE']=='NEW'){
					session_start ();
					$_SESSION['login'] = $login;
					$_SESSION['mdp'] = $pwd;
					$_SESSION['prenom'] = $ligne['PRENOMCPTE'];
					$_SESSION['nom'] = $ligne['NOMCPTE'];
					header('location: pagenew.php?page=accueil');
					mysqli_close($con);
				}
			}
		}
		else{
				$erreur = "Vous devez remplir tous les champs";
			}
		}
?>
<form action='accueil.php?page=connexion' method='post'>
<table class='table table-corner'>
	<tr>
		<td>
			Login :
		</td>
		<td>
			<input type='text' name='login' placeholder='Login'/>
		</td>
	</tr>
	<tr>
		<td>
			Mot de passe :
		</td>
		<td>
			<input type='password' name='mdp' placeholder='Mot de passe'/>
		</td>
	</tr>
	<tr>
		<td colspan='2'>
			<input type='submit'class="btn btn-primary" name='valid' value='OK'/>
		</td>
	</tr>
	<?php
		if(isset($erreur)){
			echo "<tr>
								<td colspan ='2'>";
					echo"<div class='erreur'>";
									echo $erreur;
					echo "</div>";
				echo "</td>
				</tr>";
		}
	?>
</table>
</form>
