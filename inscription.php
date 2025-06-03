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
      <input type="text" name="rue" id="rue" placeholder="Rue, ex: rue Paul Bert" require>
      <input type="text" name="numeroderue" id="numeroderue" placeholder="numéro de domicile, ex: 2">
      <!--<input type="text" name="" id="ligneadresseaditionelle" placeholder="Ligne d'adresse additionelle">-->
      <input type="text" name="ville" id="ville" placeholder="Ville, ex: Paris">
      <input type="text" name="pays" id="pays" placeholder="Pays, ex: France">
      <input type="text" name="codepostal" id="codepostal" placeholder="Code Postal, ex: 75003">
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
}//mettre les infos dns la db et passer a l'etape suivante
?>