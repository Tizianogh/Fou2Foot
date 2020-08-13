<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <h3 class="font-weight-bold text-center text-uppercase mb-4">LISTE PRESTATION</h3>';
  <input class="form-control" id="myInput" type="text" placeholder="Recherche..">
  <br>
  <table class="table table-bordered table-hover" >
    <thead>
  		<tr>
        <td>Nom prestation</td>
  			<td>Nombre place</td>
  			<td>Tarif prestation</td>
  			<td>Date création</td>
  			<td>Date validité</td>
  			<td>Age limité</td>
  			<td>Description prestation</td>
  			<td>Commentaire prestation</td>
  		</tr>
    </thead>
  		<?php
  			$con = mysqli_connect("localhost","root","","fdf");
  			$req = mysqli_query($con,"SELECT * FROM prestation");
  			while($ligne = mysqli_fetch_array($req)){
  		?>
    <tbody id="myTable">
  		<tr>
  			<td><?php echo $ligne["NOMPREST"] ?></td>
  			<td><?php echo $ligne["NBREPLACE"]?></td>
  			<td><?php echo $ligne["TARIFPREST"] ?></td>
  			<td><?php echo $ligne["DATECREATION"]?></td>
  			<td><?php echo $ligne["DATEVALIDITE"]?></td>
  			<td><?php echo $ligne["AGELIMITE"]?></td>
  			<td><?php echo $ligne["DESCRIPREST"]?></td>
  			<td><?php echo $ligne["COMMENPREST"]?></td>
  		<tr>
    </tbody>
  		<?php
  			}
  		?>
  </table>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
