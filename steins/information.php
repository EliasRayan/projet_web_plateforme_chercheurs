<?php
require_once('Model.php');
require "header.php";

if (!isset($_GET["id"])) {
    header("location: home.php");
}

$reqInfo = $db->prepare("SELECT * FROM informations WHERE id = :id");
$reqInfo->bindValue(":id", $_GET["id"]);
$reqInfo ->execute();
$lineInfo = $reqInfo-> fetch(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="jumbotron">
        <div class="text-center"><img src= <?php echo $lineInfo["image"] ?> ></div>
        <h3 id="soustitre">Titre :</h3>
        <p><?php echo $lineInfo["titre"];?></p>
        <h3 id="soustitre">Détail :</h3>
        <p><?php echo $lineInfo["contenu"];?></p>       
    </div>
</div>

<?php require "footer.php"; ?>