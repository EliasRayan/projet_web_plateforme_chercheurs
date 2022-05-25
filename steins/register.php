<?php

require_once('Model.php');
require_once('functions.php');
require "header.php";

if (isset($_SESSION["loggedin"])) {
    header("location: home.php");
}

$list_cle = ["prenom","nom","jour","mois","annee","pays","ville","adresse","tel","email","travail","grade","affiliation","biographie","thematique","cv","username","password"];
if (check_data($list_cle)) {
    $_POST["password"]= password_hash($_POST["password"],PASSWORD_DEFAULT);
    $requete = $db->prepare("INSERT INTO chercheurs VALUES (DEFAULT,:prenom,:nom,:jour,:mois,:annee,:pays,:ville,:adresse,:tel,:email,:travail,:grade,:affiliation,:biographie,:thematique,:cv,:username,:password)");
    foreach ($list_cle as $value) {
        $requete->bindValue(":" . $value, $_POST[$value]);
    }
    $requete->execute();
}


?>
<!-- Formulaire d'inscription -->
<div class="container">
            <div class="jumbotron">
                <h1 style="color:blue;"> Formulaire d'inscription </h1>
                <form action = "register.php" method="post">
                    <h3><b> Informations personnelles </b></h3>
                    <div class="container-fluid" style="border:solid; padding-top:8px;">
                        <div class="row">
                            <div class="col-sm-5">
                                <p> <label> Nom: <input type="text" placeholder="John" name="prenom" required /> </label> </p>
                            </div>
                            <div class="col-sm-5">
                                <p> <label> Prénom: <input type="text" placeholder="Doe" name="nom"/ required> </label></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h4><b>Genre:</b></h4>
                            </div>
                            <div class="col-sm-2">
                                <p><div class="radio"><label><input type="radio" name="genre" value="homme">Homme</label></div></p>
                            </div>
                            <div class="col-sm-2">
                                <p><div class="radio"><label><input type="radio" name="genre" value="femme">Femme</label></div></p>
                            </div>
                            <div class="col-sm-2">
                                <p><div class="radio"><label><input type="radio" name="genre" value="autre">Autre</label></div></p>
                            </div>
                        </div>

                        <p><b>Date de naissance: </b></p>
                        <p> 
                            <label> Jour: <input type="number" name="jour" placeholder="20" min ="1" max="31" required/></label>
                            <label> Mois (en nombre): <input type="number" name="mois" placeholder="01" min="1" max= "12" required/></label> 
                            <label> Année: <input type="number" placeholder="2022" name="annee" min="1900" max="2004" required/></label> 
                        </p>
                    </div>
                    <h3><b> Coordonnées </b></h3>
                    <div class="container-fluid" style="border:solid; padding-top:8px;">
                        <div class="row">
                            <div class="col-sm-4">
                                <p> <label> Pays: <input type="text" placeholder="France" name="pays" required/></label> </p>
                            </div>
                            <div class="col-sm-4">
                                <p> <label> Ville: <input type="text" placeholder="Paris" name="ville" required/></label> </p>
                            </div>
                            <div class="col-sm-4">
                                <p> <label> Adresse: <input type="text" placeholder="3 Place du Web" name="adresse" required/></label> </p>
                            </div>
                        </div>
                        <p> <label> Numéro de téléphone: <input type="text" placeholder="01 02 03 04 05" name="tel" required/></label> </p>
                        <p> <label> E-mail: <input type="email" name="email" placeholder="name@domain.com" required/></label> </p>
                    </div>
                    <h3><b> Informations professionnelles </b></h3>
                    <div class="container-fluid" style="border:solid; padding-top:8px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <p> <label> Travail: <input type="text" placeholder="Maître de conférences" name="travail" required/></label> </p>
                            </div>
                            <div class="col-sm-6">
                                <p> <label> Grade: <input type="text" name="grade" required/></label> </p>
                            </div>
                        </div>
                        <p> <label> Structure d'affiliation (laboratoire, université,entreprise...): <input type="text" placeholder="LIPN" name="affiliation" required/></label> </p>
                        <div class="row" style="max-height:300px;">
                            <div class="col-sm-7">
                                <p><b>Biographie: </b></p>
                                <textarea name="biographie" cols="70" rows="10" maxlength="4000" placeholder="Maximum 4000 caractères"></textarea>
                            </div>
                            <div class="col-sm-5">
                                <h4><b><br>Thématique de recherche:</b></h4>
                                <p><div class="radio"><label><input type="radio" name="thematique" value="informatique">Informatique</label></div></p>
                                <p><div class="radio"><label><input type="radio" name="thematique" value="physique">Physique</label></div></p>
                                <p><div class="radio"><label><input type="radio" name="thematique" value="chimie">Chimie</label></div></p>
                                <p><div class="radio"><label><input type="radio" name="thematique" value="Biologie">Biologie</label></div></p>
                                <p><div class="radio"><label><input type="radio" name="thematique" value="medecine">Médecine</label></div></p> 
                            </div>
                        </div>
                        <label class="form-label" for="customFile">CV (en pdf): <input type="file" class="form-control" id="customFile" name="cv"></label>
                    </div>
                    <h3><b> Identifiants </b></h3>
                    <div class="container-fluid" style="border:solid; padding-top:8px;">
                        <p> <label> Nom d'utilisateur: <input type="text" name="username" required/></label> </p>
                        <p> <label> Mot de passe: <input type="password" name="password" required/></label> </p>
                        <p>  <input class="btn btn-primary" type="submit" value="Confirmer inscription"/> </p>
                        <h5>Vous avez déjà un compte ? Vous pouvez vous <a href="login.php">connecter</a>.</h5>
                    </div>
                </form>
                
            </div>
        </div>
<?php require "footer.php";?>