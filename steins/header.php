<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <title>Steins</title>
        <style>
            #liens_menu_bas{color:white;}
            #soustitre{
              color:blue;
              font-weight: bold;
            }
        </style>
        <?php
            if (isset($_SESSION["bgcolor"])) {
                echo "<style> body{background-color:" . $_SESSION["bgcolor"] . ";}</style>";
            }
        ?>
    </head>
    <body>
        <!-- Menu en haut de page -->
        <div class="text-center">
            <img src="content/img/research_logo.jpg" width="6%" height="6%" style="margin-left : auto; margin-right : auto;">
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
            <ul class="nav nav-justified">
                <li class="active"><a href="home.php">Accueil</a></li>
                <li><a href="chercheurs.php">Chercheurs</a></li>
                <li><a href="publications.php">Publications</a></li>
                <li><a href="journaux.php">Journaux</a></li>
                <li><a href="conferences.php">Conférences</a></li>
                <?php
                    if (isset($_SESSION["loggedin"])) {
                        if ($_SESSION["username"]==="admin") {
                            echo '<li><a href="admin.php" class="btn btn-warning">Admin</a></li>';
                        }
                        else {
                            echo '<li><a href="logout.php" class="btn btn-danger">Se déconnecter</a></li>';
                        }
                    }
                    else {
                        echo '<li><a href="login.php" class="btn btn-info">Se connecter</a></li>';
                    }
                 ?>
                
            </ul>
            </div>
        </nav>
        <main style="margin:5%;">