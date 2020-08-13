<?php
	if(isset($_POST['valid'])){
		if(!empty($_POST['codepresta']) && !empty($_POST['codetypeprest']) && !empty($_POST['nomTypeprest']) && !empty($_POST['nomprest']) && !empty($_POST['nbreplace']) &&
		  !empty($_POST['tarifprest']) && !empty($_POST['datevalidite']) && !empty($_POST['agelimite']) && !empty($_POST['descprest']) && !empty($_POST['commentprest'])){
		$con = mysqli_connect("localhost","root","","fdf");
    $codeprest = htmlspecialchars($_POST['codepresta']);
		$codetypeprest = htmlspecialchars($_POST['codetypeprest']);
		$nomtypeprest = htmlspecialchars($_POST['nomTypeprest']);
		$nomprest = htmlspecialchars($_POST['nomprest']);
		$nbreplace = htmlspecialchars($_POST['nbreplace']);
    $tarifprest = htmlspecialchars($_POST['tarifprest']);
    $datevalidite = date('Y-m-d',strtotime($_POST['datevalidite']));
    $agelimite = htmlspecialchars($_POST['agelimite']);
    $descprest = htmlspecialchars($_POST['descprest']);
    $commentprest = htmlspecialchars($_POST['commentprest']);
    $datesyst = date('Y-m-d');
		$req = "INSERT INTO type_presta (CODETYPEPRESTA,NOMTYPEPRESTA)
				    VALUES('$codetypeprest','$nomtypeprest')";
		if(mysqli_query($con,$req)){
      $con = mysqli_connect("localhost","root","","fdf");
      $req2 = "INSERT INTO prestation (CODEPREST,CODETYPEPRESTA,NOMPREST,NBREPLACE,TARIFPREST,DATECREATION,DATEVALIDITE,AGELIMITE,DESCRIPREST,COMMENPREST)
        VALUES('$codeprest','$codetypeprest','$nomprest','$nbreplace','$tarifprest','$datesyst','$datevalidite','$agelimite','$descprest','$commentprest')";
        if(mysqli_query($con,$req2)){
						$succes = 'La prestation a bien été enregistrée';
						mysqli_close($con);
        }
	  }
  }
	else {
			$erreur = 'Vous devez remplir tous les champs';
	}
}
?>
<h3 class="font-weight-bold text-center text-uppercase mb-4">Enregistrer une nouvelle prestation</h3>';
<form action='pageresponsable.php?page=enregprest' method='post'>
	<table class='table table-corner' >
    <tr>
      <td>
        Code prestation :
      </td>
      <td>
        <input type='text' name='codepresta'/>
      </td>
    </tr>
		<tr>
			<td>
				Code type prestation :
			</td>
			<td>
				<input type='text' name='codetypeprest'/>
			</td>
		</tr>
		<tr>
			<td>
				Nom type prestation :
			</td>
			<td>
				<input type='text' name='nomTypeprest'/>
			</td>
		</tr>
		<tr>
			<td>
				Nom prestation :
			</td>
			<td>
				<input type='text' name='nomprest'/>
			</td>
		</tr>
		<tr>
			<td>
				Nombre de place :
			</td>
			<td>
				<input type='text' name='nbreplace'/>
			</td>
		</tr>
    <tr>
			<td>
				  Tarif prestation :
			</td>
			<td>
				<input type='text' name='tarifprest'/>
			</td>
		</tr>
    <tr>
			<td>
				Date validité :
			</td>
			<td>
				<input type='date' name='datevalidite'/>
			</td>
		</tr>
    <tr>
			<td>
			   Age limite :
			</td>
			<td>
				<input type='text' name='agelimite'/>
			</td>
		</tr>
    <tr>
			<td>
				Description prestation :
			</td>
			<td>
				<input type='text' name='descprest'/>
			</td>
		</tr>
    <tr>
			<td>
				Commentaire prestation :
			</td>
			<td>
				<input type='text' name='commentprest'/>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='submit' class="btn btn-info" name='valid' value='OK'/>
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
