//Ubicación que mostrará el mapa
// let map = L.map('map');
let map = L.map('map').setView([39.56966,2.64235], 16);

//añade el mapa de fondo
L.tileLayer('https://dev.{s}.tile.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
maxZoom: 20,
attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'  
}).addTo(map)

//Marcador (chincheta) de ubicación en el mapa
var marker = L.marker([39.56966,2.64235]).addTo(map);

marker.bindPopup('Casal Asociación de Vecinos Puig de Sant Pere');

//Creamos una clase de icono para agregarsela al marcador
let casalMarker = L.ExtraMarkers.icon({
  icon: 'fa-home',
  markerColor: 'pink',
  shape: 'square',
  prefix: 'fa'
});

//Agregamos el icono al marcador
marker.setIcon(casalMarker);

// Geolocation
map.locate({enableHighAccuracy: true}) // creo que activa la geolocalizacion
map.on('locationfound', (e) => {
  const coords = [e.latlng.lat, e.latlng.lng];
  const newMarker = L.marker(coords);
  newMarker.bindPopup('Estais aqui...');
  map.addLayer(newMarker);

});

//Encuadra la posición dada
map.fitbounds(marker);

