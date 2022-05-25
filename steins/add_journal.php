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
$list_cle = ["titre","isbn","editeur","theme"];
if (check_data($list_cle)) {
    $requete = $db->prepare("INSERT INTO journaux VALUES (DEFAULT,:titre,:isbn,:editeur,:theme)");
    foreach ($list_cle as $value) {
        $requete->bindValue(":" . $value, $_POST[$value]);
    }
    $requete->execute();
}

?>
<div class="container">
        <form action="add_journal.php" method="post">
            <p><label>Titre du journal: <input type="text" name="titre"/></label></p>
            <p><label>ISBN du journal: <input type="text" name="isbn"/></label></p>
            <p><label>Editeur du journal: <input type="text" name="editeur"/></label></p>
            <p><label>Theme du journal: <input type="text" name="theme"/></label></p>
            <p> <input class="btn btn-primary" type="submit" value="Ajouter Journal"/> </p>
        </form>
</div>

<?php require "footer.php";?>