<?php
	if(isset($_POST['valid'])){
		if(!empty($_POST['codepresta']) && !empty($_POST['dateseance']) && !empty($_POST['codetatseance']) && !empty($_POST['nometatseance']) &&
      !empty($_POST['prixseance']) && !empty($_POST['heuredebseance']) &&
		  !empty($_POST['heurefinseance']) && !empty($_POST['noterrain'])){
		$con = mysqli_connect("localhost","root","","fdf");
    $codeprest = htmlspecialchars($_POST['codepresta']);
		$dateseance = date('Y-m-d',strtotime($_POST['dateseance']));
		$codetatseance = htmlspecialchars($_POST['codetatseance']);
    $nometatseance = htmlspecialchars($_POST['nometatseance']);
		$prixseance = htmlspecialchars($_POST['prixseance']);
		$heuredebseance = htmlspecialchars($_POST['heuredebseance']);
    $heurefinseance = htmlspecialchars($_POST['heurefinseance']);
    $noterrain = htmlspecialchars($_POST['noterrain']);
		$req = "INSERT INTO etat_seance (CODEETATSEANCE,NOMETATSEANCE)
				    VALUES('$codetatseance','$nometatseance')";
		if(mysqli_query($con,$req)){
      $con = mysqli_connect("localhost","root","","fdf");
      $req2 = "INSERT INTO seance (CODEPREST,DATESEANCE ,CODEETATSEANCE,PRIXSEANCE,HEUREDEBSEANCE,HEUREFINSEANCE,NOTERRAIN)
        VALUES('$codeprest','$dateseance','$codetatseance','$prixseance','$heuredebseance','$heurefinseance','$noterrain')";
        if(mysqli_query($con,$req2)){
						$succes = 'La séance a bien été enregistrée';
						mysqli_close($con);
        }
	  }
  }
	else {
			$erreur = 'Vous devez remplir tous les champs';
	}
}
?>
<h3 class="font-weight-bold text-center text-uppercase mb-4">Enregistrer une nouvelle séance</h3>
<form action='pageresponsable.php?page=enregseance' method='post'>
	<table class='table table-corner' >
    <tr>
      <td>
        Code prestation :
      </td>
      <td>
        <select class="liste" name="codepresta">
            <?php
                $con = mysqli_connect("localhost","root","","fdf");
                $req = "SELECT CODEPREST FROM prestation";
                $res = mysqli_query($con,$req);
                while($ligne = mysqli_fetch_array($res)){
                  echo "<option value=".$ligne['CODEPREST'].">".$ligne['CODEPREST']."</option>";
                }
             ?>
        </select>
      </td>
    </tr>
		<tr>
			<td>
			   Date de séance :
			</td>
			<td>
				<input type='date' name='dateseance'/>
			</td>
		</tr>
		<tr>
			<td>
				Code état séance :
			</td>
			<td>
				<input type='text' name='codetatseance'/>
			</td>
		</tr>
    <tr>
      <td>
        Nom état séance :
      </td>
      <td>
        <input type='text' name='nometatseance'/>
      </td>
    </tr>
		<tr>
			<td>
				Prix séance :
			</td>
			<td>
				<input type='text' name='prixseance'/>
			</td>
		</tr>
		<tr>
			<td>
				Heure de début de séance :
			</td>
			<td>
				<input type='time' name='heuredebseance'/>
			</td>
		</tr>
    <tr>
			<td>
				  Heure de fin de séance :
			</td>
			<td>
				<input type='time' name='heurefinseance'/>
			</td>
		</tr>
    <tr>
			<td>
				Numéro de terrain :
			</td>
			<td>
				<input type='text' name='noterrain'/>
			</td>
		</tr>
    <tr>
			<td colspan='2'>
				<input type='submit' name='valid' class="btn btn-info" value='OK'/>
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
