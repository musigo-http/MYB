<?php
session_start();

/*
    $bdd = new PDO("mysql:host=musigo.duckdns.org; unix_socket=/run/mysqld/mysqld.sock; dbname=bdd;", "root", "Mat.at89");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $bdd->prepare("INSERT INTO utilisateurs (email, prenom, nom, adresse, numero_telephone, birthday, lat, lng, password)
                           VALUES (:email, :prenom, :nom, :adresse, :numero_telephone, :birthday, :lat, :lng, :password)");

    $stmt->execute([
      'email' => $_POST["email"],
      'prenom' => $_POST["firstname"],
      'nom' => $_POST["name"],
      'adresse' => $address,
      'numero_telephone' => $_POST["numberphone"],
      'birthday' => $_POST["datedenaissance"],
      'lat' => $lng,
      'lng' => $lat,
      'password' => password_hash($_POST["password"], PASSWORD_DEFAULT)
  ]);
*/

if(!$_SESSION["email"]){
    header("Location: /connexion.php");
    exit;
}//elseif(db plan = None){
//    header("Location: /plan.php");
//    exit;
//}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>