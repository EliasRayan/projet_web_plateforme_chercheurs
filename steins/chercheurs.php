<?php
require_once('Model.php');
require "header.php";

$reqCher = $db->prepare("SELECT id,prenom,nom,pays,travail,thematique FROM chercheurs");
$reqCher ->execute();
$tabCher = $reqCher-> fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Tableau des chercheurs -->
<div class="container" style="margin-bottom:2%">
        <h2 style="color:blue">Nos chercheurs</h2>        
        <table class="sortable table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Pays</th>
              <th>Travail</th>
              <th>Thematique</th>
              <th>Lien</th>
            </tr>
          </thead>
          <tbody>
          <?php
                foreach ($tabCher as $value) {
                    echo "<tr>";
                    echo "<td>" . $value["nom"] ."</td>";
                    echo "<td>" . $value["prenom"] ."</td>";
                    echo "<td>" . $value["pays"] ."</td>";
                    echo "<td>" . $value["travail"] ."</td>";
                    echo "<td>" . $value["thematique"] ."</td>";
                    echo '<td><a href="chercheur.php?id=' . $value["id"] . '">Lien</a></td>';
                    echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>

<?php require "footer.php"; ?>