<?php
require_once('Model.php');
require "header.php";

$reqJour = $db->prepare("SELECT * FROM journaux");
$reqJour ->execute();
$tabJour = $reqJour-> fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container" style="margin-bottom:2%">
        <h2 style="color:blue">Journaux</h2>        
        <table class="sortable table table-bordered table-striped">
          <thead>
            <tr>
              <th>Titre</th>
              <th>ISBN</th>
              <th>Editeur</th>
              <th>Thème</th>
              <th>Lien</th>
            </tr>
          </thead>
          <tbody>
          <?php
                foreach ($tabJour as $value) {
                    echo "<tr>";
                    echo "<td>" . $value["titre"] ."</td>";
                    echo "<td>" . $value["isbn"] ."</td>";
                    echo "<td>" . $value["editeur"] ."</td>";
                    echo "<td>" . $value["theme"] ."</td>";
                    echo '<td><a href="journal.php?id=' . $value["id"] . '">Lien</a></td>';
                    echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>


<?php require "footer.php"; ?>