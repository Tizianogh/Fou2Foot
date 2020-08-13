<center><table class="table table-bordered table-hover" ></center>
<form action='' method='post'>
	<tr collspan=7>
		Quel compte voulez vous modifier ?&nbsp
		<input type="text"  name="admin" placeholder="Entrez le PSEUDO" /> &nbsp
		<select name ='attr'>
			<option name=''></option>
			<option name='AD'>AD</option>
			<option name='RES'>RES</option>
			<option name='FDF'>FDF</option>
		</select>&nbsp
		<input type='submit' class="btn btn-info" value='MODIFIER'/>
	</tr>
	<tr>
		<td>PSEUDO</td>
		<td>NOM</td>
		<td>PRENOM</td>
		<td>MDP</td>
		<td>DATE INSCRIPTION</td>
		<td>DATE PEREMPTION</td>
		<td>TYPE COMPTE</td>
	</tr>
			<?php
			$con = mysqli_connect("localhost","root","","fdf");
			$req = mysqli_query($con,"SELECT * FROM compte");
			$count = mysqli_num_rows($req);
			while($ligne = mysqli_fetch_array($req)){
			?>
	<tr>
		<td><?php echo $ligne["USER"] ?></td>
		<td><?php echo $ligne["NOMCPTE"] ?></td>
		<td><?php echo $ligne["PRENOMCPTE"] ?></td>
		<td><?php echo $ligne["MDP"] ?></td>
		<td><?php echo $ligne["DATEINSCPTE"] ?></td>
		<td><?php echo $ligne["DATESUPCPTE"] ?></td>
		<td><?php echo $ligne["TYPECOMPTE"] ?></td>
	</tr>
	<?php
		}
	?>
</form>
</table>
<?php
	if (isset($_POST['attr'])) {
					if ($_POST['attr'] == 'AD')
					{
						$req = mysqli_query($con,'UPDATE compte SET TYPECOMPTE = "AD" WHERE USER = "' . $_POST["admin"] . '"');
						$req1 = mysqli_query($con,'UPDATE adherant SET DTFINADH = NULL WHERE USER = "' . $_POST["admin"] . '"');
								 		  header('location:pageadm.php?page=admin');
					} else if ($_POST['attr']=='RES')
					{
						$req = mysqli_query($con,'UPDATE compte SET TYPECOMPTE = "RES" WHERE USER = "' . $_POST["admin"] . '"');
						$req1 = mysqli_query($con,'UPDATE adherant SET DTFINADH = NULL WHERE USER = "' . $_POST["admin"] . '"');
								 		  header('location:pageadm.php?page=admin');
					} else if ($_POST['attr'] =='FDF')
					{
							$req = mysqli_query($con,'UPDATE compte SET TYPECOMPTE = "FDF" WHERE USER = "' . $_POST["admin"] . '"');
								 		  header('location:pageadm.php?page=admin');
					}
	}
?>
