<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form method="post">
        <input type="text" name="email" id="email">
        <input type="password" name="password" id="password">
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

<?php
session_start();
try{
    $bdd = new PDO("mysql:host=musigo.duckdns.org; unix_socket=/run/mysqld/mysqld.sock; dbname=bdd;", "root", "Mat.at89");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $bdd->prepare("SELECT * from utilisateurs where email=:email");
    $stmt->execute(['email' => $_POST["email"]]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST["password"], $user['password'])) {
        $_SESSION["email"]=$_POST["email"];
        echo "<script>window.location.href = '/index.php'</script>";
    } else {
        echo "identifiant ou mot de passe invalide!";
    }
}
catch(PDOException $e){
    echo "ERREUR : ".$e->getMessage();
}
?>