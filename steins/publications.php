<?php
require_once('Model.php');
require "header.php";

$reqPub = $db->prepare("SELECT * FROM publications");
$reqPub ->execute();
$tabPub = $reqPub-> fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container" style="margin-bottom:2%">
        <h2 style="color:blue">Publications</h2>        
        <table class="sortable table table-bordered table-striped">
          <thead>
            <tr>
              <th>Auteur</th>
              <th>Titre</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
          <?php
                foreach ($tabPub as $value) {
                    echo "<tr>";
                    echo "<td>" . $value["auteur"] ."</td>";
                    echo "<td>" . $value["titre"] ."</td>";
                    echo "<td>" . $value["date"] ."</td>";
                    echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>

<?php require "footer.php"; ?>