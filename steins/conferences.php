<?php
require_once('Model.php');
require "header.php";

$reqConf = $db->prepare("SELECT id,titre,sujet,date,lieu FROM conferences");
$reqConf ->execute();
$tabConf = $reqConf-> fetchAll(PDO::FETCH_ASSOC);

?>

      <!-- Conférences -->
      <div class="container" style="margin-bottom:2%">
        <h2 style="color:blue">Conférences</h2>        
        <table class="sortable table table-bordered table-striped">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Sujet</th>
              <th>Date</th>
              <th>Lieu</th>
              <th>Lien</th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach ($tabConf as $value) {
                    echo "<tr>";
                    echo "<td>" . $value["titre"] ."</td>";
                    echo "<td>" . $value["sujet"] ."</td>";
                    echo "<td>" . $value["date"] ."</td>";
                    echo "<td>" . $value["lieu"] ."</td>";
                    echo '<td><a href="conference.php?id=' . $value["id"] . '">Lien</a></td>';
                    echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>

<?php require "footer.php"; ?>