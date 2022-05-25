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
$list_cle = ["auteur","titre","date"];
if (check_data($list_cle)) {
    $requete = $db->prepare("INSERT INTO publications VALUES (DEFAULT,:auteur,:titre,:date)");
    foreach ($list_cle as $value) {
        $requete->bindValue(":" . $value, $_POST[$value]);
    }
    $requete->execute();
}

?>
<div class="container">
    <form action="add_publication.php" method="post">
        <p><label>Auteur de la publication: <input type="text" name="auteur"/></label></p>
        <p><label>Titre de la publication: <input type="text" name="titre"/></label></p>
        <p><label>Date de la publication: <input type="date" name="date"/></label></p>
        <p> <input class="btn btn-primary" type="submit" value="Ajouter Publication"/> </p>
    </form>
</div>

<?php require "footer.php";?>