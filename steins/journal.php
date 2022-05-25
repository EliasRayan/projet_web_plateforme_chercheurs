<?php
require_once('Model.php');
require "header.php";

if (!isset($_GET["id"])) {
    header("location: home.php");
}

$reqJour = $db->prepare("SELECT * FROM journaux WHERE id = :id");
$reqJour->bindValue(":id", $_GET["id"]);
$reqJour ->execute();
$lineJour = $reqJour-> fetch(PDO::FETCH_ASSOC);

?>

<!-- Informations sur la conférence -->
<div class="row">
    <div class="col-sm-11">
        <div class="container">
            <div class="jumbotron">
                <h2> Détails :</h2><br>
                <h3 id="soustitre">Titre :</h3>
                <p><?php echo $lineJour["titre"];?></p>
                <h3 id="soustitre">ISBN :</h3>
                <p><?php echo $lineJour["isbn"];?></p>
                <h3 id="soustitre">Editeur :</h3>
                <p><?php echo $lineJour["editeur"];?></p>
                <h3 id="soustitre">Thème :</h3>
                <p><?php echo $lineJour["theme"];?></p>
            </div>
        </div>
    </div>
    <div class="col-sm-1">
        
    </div>
</div>

<?php require "footer.php"; ?>