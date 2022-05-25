<?php

require_once('Model.php');
require_once('functions.php');
require "header.php";

if (! isset($_SESSION["loggedin"])) {
    header("location: home.php");
}
if (!($_SESSION["username"]==="admin")){
    header("location: home.php");
}
$list_cle = ["nom","date"];
if (check_data($list_cle)) {
    $requete = $db->prepare("INSERT INTO evenements VALUES (DEFAULT,:nom,:date)");
    foreach ($list_cle as $value) {
        $requete->bindValue(":" . $value, $_POST[$value]);
    }
    $requete->execute();
}

?>
<div class="container">
        <form action="add_evenement.php" method="post">
            <p><label>Nom de l'évenement: <input type="text" name="nom"/></label></p>
            <p><label>Date de l'évenement: <input type="date" name="date"/></label></p>
            <p> <input class="btn btn-primary" type="submit" value="Ajouter Evenement"/> </p>
        </form>
</div>

<?php require "footer.php";?>