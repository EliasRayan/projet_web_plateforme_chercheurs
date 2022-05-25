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
$list_cle = ["titre","contenu","image"];
if (check_data($list_cle)) {
    $requete = $db->prepare("INSERT INTO informations VALUES (DEFAULT,:titre,:contenu,:image)");
    foreach ($list_cle as $value) {
        $requete->bindValue(":" . $value, $_POST[$value]);
    }
    $requete->execute();
}

?>
<div class="container">
        <form action="add_information.php" method="post">
            <p><label>Titre de l'information: <input type="text" name="titre"/></label></p>
            <p><b>Contenu : </b> </p>
            <p><textarea name="contenu" cols="150" rows="10"></textarea> </p>
            <p><input type="file" name="image"></p>
            <p><input class="btn btn-primary" type="submit" value="Ajouter Information"/> </p>
        </form>
</div>

<?php require "footer.php";?>