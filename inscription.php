<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parrit - Inscription</title>
</head>
<body>
    <p>Adresse</p>
    <form method="post">
      <input type="text" name="name" id="name" placeholder="Nom, ex: Dupont" require>
      <input type="text" name="firstname" id="firstname" placeholder="Prenom, ex: Mathieu" require>
      <input type="text" name="email" id="email" placeholder="Email, ex: mail@exemple.com" require>
      <input type="tel" name="numberphone" id="numberphone" placeholder="Numéro de telephone, ex: +33782421412" require>
      <p>Date de naissance</p>
      <input type="date" name="datedenaissance" id="datedenaissance" require>
      <input type="text" name="rue" id="rue" placeholder="Rue, ex: rue Paul Bert" require>
      <input type="text" name="numeroderue" id="numeroderue" placeholder="numéro de domicile, ex: 2" require>
      <!--<input type="text" name="" id="ligneadresseaditionelle" placeholder="Ligne d'adresse additionelle">-->

<!--


[Wed Jun  4 09:45:58 2025] PHP 8.2.27 Development Server (http://localhost:8000) started
[Wed Jun  4 09:46:14 2025] [::1]:55918 Accepted
[Wed Jun  4 09:46:25 2025] PHP Warning:  Undefined array key "rue" in /home/mateo/Desktop/parrit.ai/inscription.php on line 28
[Wed Jun  4 09:46:25 2025] [::1]:55918 [400]: GET /inscription.php
[Wed Jun  4 09:46:25 2025] [::1]:55918 Closing
[Wed Jun  4 09:46:25 2025] [::1]:34794 Accepted
[Wed Jun  4 09:46:25 2025] [::1]:34800 Accepted
[Wed Jun  4 09:46:25 2025] [::1]:34794 [404]: GET /favicon.ico - No such file or directory
[Wed Jun  4 09:46:25 2025] [::1]:34794 Closing


-->



      <input type="text" name="ville" id="ville" placeholder="Ville, ex: Paris" require>
      <input type="text" name="pays" id="pays" placeholder="Pays, ex: France" require>
      <input type="text" name="codepostal" id="codepostal" placeholder="Code Postal, ex: 75003" require>
      <button id="submit">Suivant</button>
    </form>
</body>
</html>
<?php
if($_POST["rue"]){
$address = urlencode($_POST["numeroderue"] . " " . $_POST["rue"] . " " . $_POST["ville"] . " " . $_POST["codepostal"] . " " . $_POST["pays"]);

$url = "https://api.opencagedata.com/geocode/v1/json?q=".$address."&key=d21f378f6b4244798ecb561aa72ab9d2";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json'
]);
$response = curl_exec($ch);

if ($response === false) {
    echo "<script>alert('Une erreur est survenue, veuillez réessayer ultérieurement')</script>";
    curl_close($ch);
    exit;
}

curl_close($ch);
$data = json_decode($response, true);

$lat = $data['results'][0]['geometry']['lat'];
$lng = $data['results'][0]['geometry']['lng'];
echo "lat: $lat";
echo "lng: $lng";
}else{
  http_response_code(400);
  echo json_encode(['error' => 'Adresse manquante']);
  exit;
}//mettre les infos dns la db (vrai addresse lisible de tous et lat et lng une colone pour chacuns) et passer a l'etape suivante
try{
    $bdd = new PDO("mysql:host=localhost; unix_socket=/run/mysqld/mysqld.sock; dbname=bdd;", "root", "Mat.at89");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $bdd->prepare("INSERT INTO utilisateurs (email, prenom, nom, adresse, numero_telephone, birthday, lat, lng)
                           VALUES (:email, :prenom, :nom, :adresse, :numero_telephone, :birthday, :lat, :lng)");

    $stmt->execute([
      'email' => $_POST["email"],
      'prenom' => $_POST["firstname"],
      'nom' => $_POST["name"],
      'adresse' => $address,
      'numero_telephone' => $_POST["numberphone"],
      'birthday' => $_POST["datedenaissance"],
      'lat' => $lng,
      'lng' => $lat
  ]);
}
catch(PDOException $e){
    echo "ERREUR : ".$e->getMessage();
}

header("Location: index.php");

?>