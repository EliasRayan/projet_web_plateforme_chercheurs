<?php
require_once('Model.php');
require "header.php";

if (!isset($_GET["id"])) {
    header("location: home.php");
}

$reqCher = $db->prepare("SELECT * FROM chercheurs WHERE id = :id");
$reqCher->bindValue(":id", $_GET["id"]);
$reqCher ->execute();
$lineCher = $reqCher-> fetch(PDO::FETCH_ASSOC);

?>

<div class="container">
        <div class="jumbotron">
            <h2>Chercheur :</h2>         
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Affiliation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $lineCher["nom"];?></td>
                        <td><?php echo $lineCher["prenom"];?></td>
                        <td><?php echo $lineCher["affiliation"];?></td>
                    </tr>
                </tbody>
            </table>
            <?php
                if (isset($_SESSION["loggedin"])) {
                    echo'<div style="border:dotted grey;">
                    <h3 style="text-decoration:underline;">Biographie :</h3>
                    <p>'. $lineCher["biographie"] .'</p>
                </div>';
                }
            ?>
        </div>
    </div>

<?php require "footer.php"; ?>