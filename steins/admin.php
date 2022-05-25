<?php
require_once('Model.php');
require "header.php";

if (! isset($_SESSION["loggedin"])) {
    header("location: home.php");
}
if (!($_SESSION["username"]==="admin")){
    header("location: home.php");
}

if(isset($_POST["bgcolor"])){
    $_SESSION["bgcolor"]=$_POST["bgcolor"];
    header("location: admin.php");
}
?>
<!-- Formulaire admin -->
<div class="container" style="text-align:center">
        <form action="admin.php" method="post">
        <p>
            <label for="colorpicker"><h3>Couleur de fond:</h3> </label>
            <input type="color" id="colorpicker" name="bgcolor" value="#ffffff">
            <input type="submit" value="Choisir">
        </p>
        </form>
        <p>
            <button type="button" class="btn btn-primary btn-lg">
                <a href="add_information.php" id="liens_menu_bas">Ajouter information</a>
            </button>
        </p>
        <p>
            <button type="button" class="btn btn-primary btn-lg">
                <a href="add_evenement.php" id="liens_menu_bas">Ajouter évenement</a>
            </button>
        </p>
        <p>
            <button type="button" class="btn btn-primary btn-lg">
                <a href="add_publication.php" id="liens_menu_bas">Ajouter publication</a>
            </button>
        </p>
        <p>
            <button type="button" class="btn btn-primary btn-lg">
                <a href="add_conference.php" id="liens_menu_bas">Ajouter conférence</a>
            </button>
        </p>
        <p>
            <button type="button" class="btn btn-primary btn-lg">
                <a href="add_journal.php" id="liens_menu_bas">Ajouter journal</a>
            </button>
        </p>
        <p>
            <button type="button" class="btn btn-danger btn-lg">
                <a href="logout.php" id="liens_menu_bas">Se déconnecter</a>
            </button>
        </p>
    </div>
    <!-- Fin formulaire admin -->

<?php require "footer.php"; ?>