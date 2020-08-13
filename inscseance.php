<?php
if(isset($_POST['inscrire'])){
    $con = mysqli_connect("localhost","root","","fdf");
      if(isset($_POST['checkbox']) && !empty($_POST['checkbox'] && isset($_POST['checkbox2']) && !empty($_POST['checkbox2']))){
        foreach ($_POST['checkbox'] as $idcodeetatseance){
          foreach ($_POST['checkbox2'] as $idcodeprest) {
            $req1 = mysqli_query($con,"SELECT * FROM seance WHERE CODEPREST ='$idcodeprest' AND CODEETATSEANCE = '$idcodeetatseance'");
              if($req1){
                $row = mysqli_fetch_array($req1);
                $dateseance = $row['DATESEANCE'];
                $login = $_SESSION['login'];
                $req2 = mysqli_query($con,"SELECT NOADH FROM adherant WHERE USER = '$login'");
                  if ($req2) {
                    $ligne = mysqli_fetch_array($req2);
                    $noadh = $ligne['NOADH'];
                    $date = $date = date("Y-m-d");
                    $req3 = mysqli_query($con,"INSERT INTO inscription (CODEPREST,DATESEANCE,NOADH)
                                    VALUES ('$idcodeprest','$dateseance','$noadh')");
                    if ($req3) {
                      $succes = 'Votre inscription a bien été prise en compte';
                    }
                    else{$erreur = 'ECHEC LAST REQUEST';}
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
    <h3 class="font-weight-bold text-center text-uppercase mb-4">Inscription aux séances</h3>';
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
        <td colspan='8'>
          <input type='submit' class="btn btn-info" name='inscrire' value="S'incrire"/>
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
