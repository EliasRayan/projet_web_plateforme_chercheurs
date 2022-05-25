<?php

    require_once('Model.php');
    require_once('functions.php');
    require "header.php";

    if (isset($_SESSION["loggedin"])) {
        header("location: home.php");
    }
    $list_cle = ["username","password"];
    if (check_data($list_cle)) {
        if ($_POST["username"]=== "admin" && $_POST["password"] ==="admin") {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $_POST["username"];
            header("location: home.php");
        }
        else{
            $requete = $db->prepare("SELECT password FROM chercheurs where username = :username");
            $requete->bindValue(":username",$_POST["username"]);
            $requete->execute();
            $tab = $requete->fetch(PDO::FETCH_ASSOC);
            $hash = $tab["password"];

            if (password_verify($_POST["password"], $hash)) {
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $_POST["username"];
                header("location: home.php"); 
            } else {
                $message= "Identifiant invalide";
            }
        }
    }
?>

<!-- Partie login -->
<div class="container">
            <div class="jumbotron">
                <h2 style="color:blue"> Connexion </h2>
                <form action="login.php" method="post">
                <p> <label> Nom d'utilisateur: <input class="form-control" type="text" name="username" /> </label> </p>
                <p> <label> Mot de passe: <input class="form-control" type="password" name="password" /> </label> </p>
                <p> <input class="btn btn-primary" type="submit" value="Connexion" style="color:white;"/> </p>
                </form>
                <?php if(isset($message)){echo '<p class="text-danger">'.$message.'</p>' ;} ?>
                <h5>Vous n'avez pas de compte ? Vous pouvez vous <a href="register.php">inscrire</a>.</h5>
            </div>
        </div>

<?php require "footer.php";?>