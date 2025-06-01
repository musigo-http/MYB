// Exemple : Coordonnées de Toulouse
const latitude = 43.6047;
const longitude = 1.4442;

// Initialisation de la carte centrée sur ces coordonnées
const map = L.map('map').setView([latitude, longitude], 13);

// Tuiles OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap | Leaflet',
}).addTo(map);

// Ajout du marqueur ("ping")
const marker = L.marker([latitude, longitude]).addTo(map);

// Optionnel : bulle (popup) attachée au marqueur
marker.bindPopup("📍 Ping ici !").openPopup();
