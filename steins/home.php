<?php
require_once('Model.php');
require "header.php";

$reqInfos = $db->prepare("SELECT * FROM informations ORDER BY id DESC LIMIT 4");
$reqInfos ->execute();
$tabInfos = $reqInfos-> fetchAll(PDO::FETCH_ASSOC);

$reqInfosLast = $db->prepare("SELECT * FROM informations WHERE id <=(SELECT count(*) FROM informations) - 4");
$reqInfosLast ->execute();
$tabInfosLast = $reqInfosLast-> fetchAll(PDO::FETCH_ASSOC);

$reqEvents = $db->prepare("SELECT * FROM evenements");
$reqEvents ->execute();
$tabEvents = $reqEvents-> fetchAll(PDO::FETCH_ASSOC);

?>

<script language="JavaScript"> 
          var i = 0; 
          var tab = new Array(); 
          var timeout;
          <?php echo "tab =['"; echo $tabInfos [0]["image"];echo "','";echo $tabInfos [1]["image"];echo "','";echo $tabInfos [2]["image"];echo "','";echo $tabInfos [3]["image"];echo "'];"; ?>
          <?php echo "tablinks =['"; echo $tabInfos [0]["id"];echo "','";echo $tabInfos [1]["id"];echo "','";echo $tabInfos [2]["id"];echo "','";echo $tabInfos [3]["id"];echo "'];"; ?>
          

          function stop_diapo(){
            clearTimeout(timeout);
          }
      
          function lancer_diapo() 
          { 
          document.diapo.src = tab[i];
          document.getElementById("lien_diapo").href="information.php?id=" + tablinks[i];
          if(i < tab.length - 1) 
            i++; 
          else 
            i = 0;
          timeout = setTimeout("lancer_diapo()",2000); 
          } 
          window.onload=lancer_diapo; 
      
        </script>

        <!-- Présentation du site -->
        <div class="container">
          <div class="jumbotron">
            <p>
                <b>STEINS</b> offre une plateforme de collaboration entre chercheurs du monde entier. 
                Il partage des travaux de recherche dans des domaines différents (Sciences de données, 
                Sciences humaine, Astronomie, Economie, etc.). Il présente aussi les différentes conférences 
                et journaux dans le but de diffuser les informations liées à chaque conférence et de chaque 
                domaine de recherche.
            </p>
          </div>
        </div>
        
        <!-- Bloc informations et évènements -->
        <div class="container-fluid">
          <div class="row">
            <!-- Zone informations-->
            <div class="col-sm-7">
              <!-- Diaporama des dernières informations-->
              <div class="container-fluid" style="margin:auto; text-align:center; position:static; ">
                  <h2>Informations les plus récentes</h2>
                  <a href="#" id="lien_diapo">
                    <img onmouseenter="stop_diapo()" onmouseleave="lancer_diapo()" name="diapo" alt="diapo" src="content/img/galaxie.jpg" style="width: auto !important;height: 300px !important;margin: 0 auto 1em auto;">
                  </a>
                  </div>
              <!-- Informations moins récentes-->
              <div class="container-fluid" style="margin:auto; text-align:center;">
                <h2>Informations moins récentes</h2>         
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Titre</th>
                      <th>Extrait</th>
                      <th>Lien</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                            foreach ($tabInfosLast as $value) {
                                echo "<tr>";
                                echo "<td>" . $value["titre"] ."</td>";
                                echo "<td>" . substr($value["contenu"], 0, 99) ."...</td>";
                                echo '<td><a href="information.php?id=' . $value["id"] . '">Lien</a></td>';
                                echo "</tr>";
                            }
                       ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Zone évènements-->
            <div class="col-sm-5">
              <div class="container-fluid" style="margin:2%;">
                <h2>Evènements à venir</h2>         
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Titre</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                            foreach ($tabEvents as $value) {
                                echo "<tr>";
                                echo "<td>" . $value["nom"] ."</td>";
                                echo "<td>" . $value["date"] ."</td>";
                                echo "</tr>";
                            }
                       ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

<?php 
require "footer.php";
?>