<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parrit - Inscription</title>
</head>
<body>
    <p>Adresse</p>
    <input type="text" name="" id="numeroderue" placeholder="N° et rue">
    <input type="text" name="" id="ligneadresseaditionelle" placeholder="Ligne d'adresse additionelle">
    <input type="text" name="" id="ville" placeholder="Ville">
    <input type="text" name="" id="pays" placeholder="Pays">
    <input type="text" name="" id="codepostal" placeholder="Code Postal">
    <button id="submit">Suivant</button>
</body>
</html>

<!--

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Géocoder une adresse avec JavaScript</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 500px;
      width: 100%;
    }
  </style>
</head>
<body>

  <h2>Carte centrée sur une adresse</h2>
  <div id="map"></div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const adresse = "131B Rue Paul Bert, Paron 89100, France";

    // Encodage de l'adresse pour l'URL
    const url = `https://nominatim.openstreetmap.org/search?format=json&limit=1&q=${encodeURIComponent(adresse)}`;

    // Appel à l'API Nominatim pour géocoder
    fetch(url, {
      headers: {
        'User-Agent': 'mon-app-js/1.0 (email@example.com)' // recommandé par Nominatim
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data && data.length > 0) {
        const lat = parseFloat(data[0].lat);
        const lon = parseFloat(data[0].lon);

        // Initialiser la carte avec Leaflet
        const map = L.map('map').setView([lat, lon], 15);

        // Tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Ajouter un marqueur
        const marker = L.marker([lat, lon]).addTo(map);
        marker.bindPopup(`<b>Adresse géocodée :</b><br>${adresse}`).openPopup();
      } else {
        alert("Adresse non trouvée.");
      }
    })
    .catch(error => {
      console.error("Erreur lors du géocodage :", error);
    });
  </script>

</body>
</html>

-->