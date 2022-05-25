<?php
require_once('Model.php');
require "header.php";

if (!isset($_GET["id"])) {
    header("location: home.php");
}

$reqConf = $db->prepare("SELECT * FROM conferences WHERE id = :id");
$reqConf->bindValue(":id", $_GET["id"]);
$reqConf ->execute();
$lineConf = $reqConf-> fetch(PDO::FETCH_ASSOC);

?>

<!-- Informations sur la conférence -->
<div class="row">
    <div class="col-sm-11">
        <div class="container">
            <div class="jumbotron">
                <h2> Informations sur la conférence :</h2><br>
                <h3 id="soustitre">Titre :</h3>
                <p><?php echo $lineConf["titre"];?></p>
                <h3 id="soustitre">Abréviation :</h3>
                <p><?php echo $lineConf["abreviation"];?></p>
                <h3 id="soustitre">Sujet :</h3>
                <p><?php echo $lineConf["sujet"];?></p>
                <h3 id="soustitre">Date :</h3>
                <p><?php echo $lineConf["date"];?></p>
                <a id="date_lim_inscription" style="color:inherit; text-decoration:none;">
                    <h3 id="soustitre">Date limite d'inscription :</h3>
                </a>
                <p><?php echo $lineConf["date_limite"];?></p>
                <a id="conferencier_principal" style="color:inherit; text-decoration:none;">
                    <h3 id="soustitre">Conférencier principal :</h3>
                </a>
                <p><?php echo $lineConf["conferencier"];?></p>
                <a id="lieu" style="color:inherit; text-decoration:none;">
                    <h3 id="soustitre">Lieu :</h3>
                </a>
                <p><?php echo $lineConf["lieu"];?></p>
            </div>
        </div>
    </div>
    <div class="col-sm-1" style="position:fixed; right:20px">
        <nav class="navbar navbar-default" id="mNavbar">
            <p><a href="#date_lim_inscription">Date limite</a></p>
            <p><a href="#conferencier_principal">Conférencier principal</a></p>
            <p><a href="#lieu">Lieu</a></p>
        </nav>
    </div>
</div>

<?php require "footer.php"; ?>