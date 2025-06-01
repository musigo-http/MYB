<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Carte avec ping personnalisé</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 500px;
      width: 100%;
    }
  </style>
</head>
<body>

  <h2>Carte avec ping géographique</h2>
  <div id="map"></div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const lat = 43.6047;
    const lon = 1.4442;

    const map = L.map('map').setView([lat, lon], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const marker = L.marker([lat, lon]).addTo(map);
    marker.bindPopup("📍 Ping ici !<br>Latitude : " + lat + "<br>Longitude : " + lon).openPopup();
  </script>

</body>
</html>
