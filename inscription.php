<?php
    if(isset($_POST['inscription'])){
    	 if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['user']) && !empty($_POST['mdp']) && !empty($_POST['mail']) && !empty($_POST['fixe'])&& !empty($_POST['port']) && !empty($_POST['nais']) && !empty($_POST['urg'])) {
    	 	  $con = mysqli_connect("localhost","root","","fdf");
         	$login = htmlspecialchars($_POST['user']);
         	$nom = htmlspecialchars($_POST['nom']);
         	$prenom = htmlspecialchars($_POST['prenom']);
         	$mdp = htmlspecialchars($_POST['mdp']);
         	$mail = htmlspecialchars($_POST['mail']);
         	$fixe = htmlspecialchars($_POST['fixe']);
         	$port = htmlspecialchars($_POST['port']);
         	$nais = htmlspecialchars($_POST['nais']);
         	$urg  = htmlspecialchars($_POST['urg']);
         	$rand = mt_rand(0,1000);
         	$date = date("Y-m-d");
         	$datesup = date("Y-m-d", strtotime("+31 days"));
            $req = "INSERT INTO adherant (NOADH, USER, NOMADH, PRENOMADH, ADRMAILADH, NOTELADH, NOPORTADH, DTNAISSADH, NOTELURG, DTINSCRIPTION, DTFINADH )
                        VALUES ('$rand', '$login', '$nom', '$prenom', '$mail', '$fixe', '$port', '$nais', '$urg', '$date', '$datesup')";
            $req1 ="INSERT INTO compte (USER, MDP, NOMCPTE, PRENOMCPTE, DATEINSCPTE, TYPECOMPTE)
            		VALUES ('$login', '$mdp', '$nom', '$prenom', '$date', 'FDF')";
            $req3 = "SELECT * FROM compte WHERE USER ='$login'";
    			if($result = mysqli_query($con,$req3)){
    		      if(mysqli_num_rows($result)==0){
                 if (mysqli_query($con,$req1)){
                     if(mysqli_query($con,$req)){
                       $succes = 'Inscrit avec succès';
                     }
                     else{
                       $erreur = 'ECHEC REQ ';
                     }
                 }
    				  }
  			      else{
  					     $erreur = 'Ce login est déjà utilisé';
  			      }
        }
    }
    else{
		    $erreur = 'Vous devez remplir tous les champs';
    }
  }
?>
<h3 class="font-weight-bold text-center text-uppercase mb-4">INSCRIPTION</h3>
<form action='accueil.php?page=inscription' method='post'>
	<table class='table table-corner'>
		<tr>
			<td>
				Nom :
			</td>
			<td>
				<input type='text' name='nom' placeholder='Votre nom'/>
			</td>
		</tr>
		<tr>
			<td>
				Prenom :
			</td>
			<td>
				<input type='text' name='prenom' placeholder='Votre prénom'/>
			</td>
		</tr>
		<tr>
			<td>
				Login :
			</td>
			<td>
					<input type='text' name='user' placeholder="Votre nom d'utilisateur"/>
			</td>
		</tr>
		<tr>
			<td>
				Mot de passe :
			</td>
			<td>
				<input type='password' name='mdp' placeholder='Votre mot de passe'/>
			</td>
		</tr>

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
				<input type='submit' class="btn btn-primary" name='inscription' value='OK'/>
			</td>
		</tr>
    <?php
    if(isset($succes)){
        echo "<tr>
                <td colspan ='2'>";
                echo"<div class='confirm'>";
                      echo $succes;
                echo "</div>";
        echo "</td>
        </tr>";
    }
    else if(isset($erreur)){
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
