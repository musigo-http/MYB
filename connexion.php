<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="email" id="email">
        <input type="password" name="password" id="password">
        <button type="submit"></button>
    </form>
</body>
</html>

<?php
try{
    $bdd = new PDO("mysql:host=localhost; unix_socket=/run/mysqld/mysqld.sock; dbname=bdd;", "root", "Mat.at89");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $bdd->prepare("INSERT INTO utilisateurs (email, prenom, nom, adresse, numero_telephone, birthday, lat, lng)
                           VALUES (:email, :prenom, :nom, :adresse, :numero_telephone, :birthday, :lat, :lng)");
                           
  $_SESSION["email"]=$_POST["email"];
}
catch(PDOException $e){
    echo "ERREUR : ".$e->getMessage();
}
?>