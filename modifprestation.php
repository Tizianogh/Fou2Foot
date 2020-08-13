<?php
	if(isset($_POST['valid'])){
		if(!empty($_POST['codepresta']) && !empty($_POST['nomprest']) && !empty($_POST['nbreplace']) && !empty($_POST['tarifprest']) && !empty($_POST['datevalidite']) &&
		   !empty($_POST['agelimite']) && !empty($_POST['descprest']) && !empty($_POST['commentprest'])){
			$con = mysqli_connect("localhost","root","","fdf");
	    $codeprest = htmlspecialchars($_POST['codepresta']);
			$nomprest = htmlspecialchars($_POST['nomprest']);
			$nbreplace = htmlspecialchars($_POST['nbreplace']);
	    $tarifprest = htmlspecialchars($_POST['tarifprest']);
	    $datevalidite = date('Y-m-d',strtotime($_POST['datevalidite']));
	    $agelimite = htmlspecialchars($_POST['agelimite']);
	    $descprest = htmlspecialchars($_POST['descprest']);
	    $commentprest = htmlspecialchars($_POST['commentprest']);
	    $datesyst = date('Y-m-d');
			$req = "UPDATE prestation
	    				SET NOMPREST = '$nomprest', NBREPLACE = '$nbreplace', TARIFPREST = '$tarifprest', DATECREATION = '$datesyst', DATEVALIDITE = '$datevalidite', AGELIMITE = '$agelimite', DESCRIPREST = '$descprest', COMMENPREST = '$commentprest'
	            WHERE CODEPREST = '$codeprest'";
			if(mysqli_query($con,$req)){
						$succes = 'La prestation a été modifiée avec succès';
	    }
	}
	else{
		    $erreur = "Vous devez remplir tous les champs";
	}
}
?>
<h3 class="font-weight-bold text-center text-uppercase mb-4">Modifier une prestation</h3>
<form action='pageresponsable.php?page=modifprest' method='post'>
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
