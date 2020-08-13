<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href='css/bootstrap.css'>
  </head>
  <body>
    <img src='images/foudefoot.jpg' alt='fdrf'width="100%" />
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="accueil.php?page=accueil">Accueil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="accueil.php?page=prestation">Prestations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accueil.php?page=seance">Séances</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accueil.php?page=inscription">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accueil.php?page=connexion">Connexion</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container" style="margin-top:30px">
      <?php
      if(isset($_GET['page'])){
        switch($_GET['page']){
          case 'seance' :
            include('listeseance.php');
          break;
          case 'prestation' :
            include('listeprestation.php');
          break;
          case 'inscription' :
            include('inscription.php');
          break;
          case 'connexion' :
            echo '  <h3 class="font-weight-bold text-center text-uppercase mb-4">CONNEXION</h5>';
            include('login.php');
          break;
          case 'accueil' :
            echo '  <h3 class="font-weight-bold text-center text-uppercase mb-4">BIENVENUE</h5>';
            echo "<p>Bienvenue sur notre site où vous pourrez vous créer un compte et vous connecter pour
                    ensuite pouvoir vous inscrire à une séance et vous désincrire si vous ne pouvez plus vous y
                    en rendre pour quelconque raisons.</p> ";
            echo "<hr>";
            echo "<p>Passez un bon moment sur notre site ! :) </p>";
          break;
        }
      }
      ?>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small mdb-color lighten-3 pt-4 mt-4">
      <!-- Footer Links -->
      <div class="container text-center text-md-left">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
            <!-- Content -->
            <h5 class="font-weight-bold text-uppercase mb-4">À propos de nous</h5>
            <p>Ce site a été réalisé par TSI Kévin, GHISOTTI Tiziano, ATTARD Audrey et BESSEAT Jeremy</p>
            <p>Site officiel de Fou de Foot</p>
          </div>
          <!-- Grid column -->
          <hr class="clearfix w-100 d-md-none">
          <!-- Grid column -->
          <!-- Grid column -->
          <hr class="clearfix w-100 d-md-none">
          <!-- Grid column -->
          <!-- Grid column -->
          <hr class="clearfix w-100 d-md-none">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 text-center mx-auto my-4">
            <!-- Social buttons -->
            <h5 class="font-weight-bold text-uppercase mb-4">Suivez-nous</h5>
            <!-- Facebook -->
            <img src="Images/facebook.png" alt="Facebook" width=100px>
            <!-- Twitter -->
            <img src="Images/youtube.png" alt="Youtube" width=80px>
            <!-- Google +-->
            <img src="Images/twitter.png" alt="Twitter" width=80px>
            <!-- Dribbble -->
            <a type="button" class="btn-floating btn-dribbble"><i class="fa fa-dribbble"></i></a>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
      <!-- Footer Links -->
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="#"> FouDeFoot.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </body>
</html>
