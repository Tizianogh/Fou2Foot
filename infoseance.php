
<?php
if(isset($_POST['info'])){
    $con = mysqli_connect("localhost","root","","fdf");
      if(isset($_POST['checkbox']) && !empty($_POST['checkbox'] && isset($_POST['checkbox2']) && !empty($_POST['checkbox2']))){
        foreach ($_POST['checkbox'] as $idcodeetatseance){
          foreach ($_POST['checkbox2'] as $idcodeprest) {
            $req1 = mysqli_query($con,"SELECT * FROM seance WHERE CODEPREST ='$idcodeprest' AND CODEETATSEANCE = '$idcodeetatseance'");
              if($req1){
                  $req5 ="SELECT  adherant.NOADH, adherant.USER, adherant.NOMADH, adherant.PRENOMADH, adherant.ADRMAILADH
                          FROM inscription , seance, adherant WHERE inscription.CODEPREST=seance.CODEPREST
                          AND inscription.NOADH=adherant.NOADH
                          AND seance.CODEETATSEANCE = '$idcodeetatseance'
                          AND seance.CODEPREST ='$idcodeprest' ";
                  if($res2 = mysqli_query($con,$req5)){
                    while ($ligne2 = mysqli_fetch_array($res2)) {
                      echo ' '.$ligne2['NOADH'].' '.$ligne2['USER'].' '.$ligne2['NOMADH'].' '.$ligne2['PRENOMADH'].' '.$ligne2['ADRMAILADH']. ' ';
                      echo '<br>';
                    }
                  }
              else{
                $erreur = 'ECHEC LAST REQUEST';
              }
            }
          }
        }
    }
    else{
      $erreur = 'Vous devez cocher au moins une case';
    }
}
 ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <h3 class="font-weight-bold text-center text-uppercase mb-4">Informations sur les participants</h3>
  <input class="form-control" id="myInput" type="text" placeholder="Recherche..">
  <br>
  <form action="" method="post">
  <table class="table table-bordered table-hover" >
    <thead>
      <tr>
      <td></td>
      <td>Code prestation</td>
      <td>Date de séance</td>
      <td>Code état séance</td>
      <td>Prix séance</td>
      <td>Heure de début de séance</td>
      <td>Heure fin de séance</td>
      <td>Numero de terrain</td>
    </tr>
    </thead>
    <?php
        $con = mysqli_connect('localhost','root','','fdf');
        $req = 'SELECT * FROM seance';
        if($res = mysqli_query($con,$req)){
          while ($ligne = mysqli_fetch_array($res)) {
      ?>
    <tbody id="myTable">
      <tr>
        <td><input type='checkbox' name='checkbox[]' value='<?php echo $ligne["CODEETATSEANCE"]?>'/>
            <input type="hidden" name='checkbox2[]' value='<?php echo $ligne["CODEPREST"]?>'/>
        <td><?php echo $ligne['CODEPREST']?></td>
        <td><?php echo $ligne['DATESEANCE']?></td>
        <td><?php echo $ligne['CODEETATSEANCE']?></td>
        <td><?php echo $ligne['PRIXSEANCE']?></td>
        <td><?php echo $ligne['HEUREDEBSEANCE']?></td>
        <td><?php echo $ligne['HEUREFINSEANCE']?></td>
        <td><?php echo $ligne['NOTERRAIN']?></td>
      </tr>
    </tbody>
    <?php
      }
    }
   ?>
   <?php
   if(isset($succes)){
       echo "<tr>
               <td colspan ='8'>";
               echo"<div class='confirm'>";
                     echo $succes;
               echo "</div>";
       echo "</td>
       </tr>";
   }
   else if(isset($erreur)){
     echo "<tr>
               <td colspan ='8'>";
         echo"<div class='erreur'>";
                 echo $erreur;
         echo "</div>";
       echo "</td>
       </tr>";
   }
 ?>
     <tr>
       <td colspan='9'>
         <input type='submit' class="btn btn-primary" name='info' value='Valider'/>
       </td>
    </tr>
  </table>
</form>
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
