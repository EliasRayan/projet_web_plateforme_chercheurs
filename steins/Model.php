<?php

$host = 'mysql:host=localhost;dbname=projetweb';
$login = 'root';
$pass = 'root';

try{
    $db = new PDO ($host,$login,$pass);}
    catch (PDOException $e){
        die("Erreur:".$e ->getMessage());
}