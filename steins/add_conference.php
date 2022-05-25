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
$list_cle = ["titre","abreviation","sujet","date","date_limite","conferencier","lieu"];
if (check_data($list_cle)) {
    echo "ok";
    $requete = $db->prepare("INSERT INTO conferences VALUES (DEFAULT,:titre,:abreviation,:sujet,:date,:date_limite,:conferencier,:lieu)");
    foreach ($list_cle as $value) {
        $requete->bindValue(":" . $value, $_POST[$value]);
    }
    $requete->execute();
}

?>
<div class="container" >
    <form action="add_conference.php" method="post">
        <p><label>Titre de la conférence: <input type="text" name="titre"/></label></p>
        <p><label>Abréviation de la conférence: <input type="text" name="abreviation"/></label></p>
        <p><label>Sujet de la conférence: <input type="text" name="sujet"/></label></p>
        <p><label>Date de la conférence: <input type="date" name="date"/></label></p>
        <p><label>Date limit de la conférence: <input type="date" name="date_limite"/></label></p>
        <p><label>Conférencier: <input type="text" name="conferencier"/></label></p>
        <p><label>Lieu de la conférence: <input type="text" name="lieu"/></label></p>
        <p> <input class="btn btn-primary" type="submit" value="Ajouter Conférence"/> </p>
    </form>
</div>

<?php require "footer.php";?>