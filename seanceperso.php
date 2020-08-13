<?php
  if(isset($_POST['desinscrire'])){
    $con = mysqli_connect("localhost","root","","fdf");
    if(isset($_POST['checkbox']) && !empty($_POST['checkbox'] && isset($_POST['checkbox2']) && !empty($_POST['checkbox2']))){
      foreach ($_POST['checkbox'] as $idcodeprest){
        foreach ($_POST['checkbox2'] as $iddateseance) {
          $login = $_SESSION['login'];
          $req = mysqli_query($con,"SELECT NOADH FROM adherant WHERE USER = '$login'");
          $ligne = mysqli_fetch_array($req);
          $noadh = $ligne['NOADH'];
          if($req)
          {
            $req1 = mysqli_query($con,"DELETE FROM inscription WHERE CODEPREST ='$idcodeprest' AND DATESEANCE = '$iddateseance' AND NOADH = '$noadh'");
            if($req1){
              $succes = 'Votre désinscription a bien été prise en compte';
            }
            else{
              $erreur = 'ECHEC';
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
<h3 class="font-weight-bold text-center text-uppercase mb-4">MES SÉANCES</h3>
<form action="adherent.php?page=seanceperso" method="post">
  <table class="table table-bordered table-hover" >
    <tr>
      <td>SELECT</td>
      <td>Code prestation</td>
      <td>Date de séance</td>
      <td>Numéro de l'adherent</td>
      <td>Nombre de joueur</td>
    </tr>
    <?php
      $con = mysqli_connect('localhost','root','','fdf');
      $login = $_SESSION['login'];
      $req2 = mysqli_query($con,"SELECT NOADH FROM adherant WHERE USER = '$login'");
      $row = mysqli_fetch_array($req2);
      $noadh = $row['NOADH'];
      $req = "SELECT * FROM inscription WHERE NOADH='$noadh'";
      if($res = mysqli_query($con,$req)){
        while ($ligne = mysqli_fetch_array($res)) {
    ?>
    <tr>
      <td><input type='checkbox' name='checkbox[]' value='<?php echo $ligne["CODEPREST"]?>'/>
      <input type="hidden" name='checkbox2[]' value='<?php echo $ligne["DATESEANCE"]?>'/>
      <td><?php echo $ligne['CODEPREST']?></td>
      <td><?php echo $ligne['DATESEANCE']?></td>
      <td><?php echo $ligne['NOADH']?></td>
      <td><?php echo $ligne['NBREJOUEUR']?></td>
    </tr>
    <?php
    }
    }
    ?>
    <tr>
      <td colspan='8' >
      <input type="submit" name="desinscrire" class='btn btn-info' value="SE DESINSCRIRE">
      </td>
    </tr>
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
  </table>
</form>
