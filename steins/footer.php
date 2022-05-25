</main>
<!-- Menu en bas de page-->
<footer class="bg-primary text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled" >
                  <li >
                    <a href="home.php" id="liens_menu_bas">Accueil</a>
                  </li>
                  <li>
                    <a href="chercheurs.php" id="liens_menu_bas">Chercheurs</a>
                  </li>
                  <li>
                    <a href="publications.php" id="liens_menu_bas">Publications</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">        
                <ul class="list-unstyled">
                  <li>
                    <a href="journaux.php" id="liens_menu_bas">Journaux</a>
                  </li>
                  <li>
                    <a href="conferences.php" id="liens_menu_bas">Conférences</a>
                  </li>
                  <?php
                    if (isset($_SESSION["loggedin"])) {
                        if ($_SESSION["username"]==="admin") {
                            echo '<li><a href="admin.php" id="liens_menu_bas">Admin</a></li>';
                        }
                        else {
                            echo '<li><a href="logout.php" id="liens_menu_bas">Se déconnecter</a></li>';
                        }
                    }
                    else {
                        echo '<li><a href="login.php" id="liens_menu_bas">Se connecter</a></li>';
                    }
                 ?>
                </ul>
              </div>
            </div>
          </div>
          
          
          <div class="text-center" style="background-color: rgba(0, 0, 0, 0.2);">
            Copyright:
            <a id="liens_menu_bas" href="home.php">Steins</a>
          </div>
        </footer>
        <!--Fin menu bas de page-->
  </body>
</html>