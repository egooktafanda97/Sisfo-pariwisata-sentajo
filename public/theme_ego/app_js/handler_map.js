var lay;
var map ;

var basemaps = {
	"OpenStreetMaps": L.tileLayer(
		"https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
		{
			minZoom: 2,
			maxZoom: 19,
			id: "osm.streets"
		}
		),
	"Google-Map": L.tileLayer(
		"https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}",
		{
			minZoom: 2,
			maxZoom: 19,
			id: "google.street"
		}
		),
	"Google-Satellite": L.tileLayer(
		"https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
		{
			minZoom: 2,
			maxZoom: 19,
			id: "google.satellite"
		}
		),
	"Google-Hybrid": L.tileLayer(
		"https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}",
		{
			minZoom: 2,
			maxZoom: 19,
			id: "google.hybrid"
		}
		)
};

map = L.map('maps',{
	zoomControl: true,
	layers: [basemaps.OpenStreetMaps]
}).setView([-0.466291, 101.512315]);
map.setZoom(11);
var l =  L.control({position: 'topright'});
l.onAdd = function (map) {
	var div = L.DomUtil.create('div', 'btn-groups');
	div.innerHTML += `<button class="btn btn-danger btn-sm" onClick="return location.reload()">Back<button>`;
	return div;
}
l.addTo(map);

function style(feature) {
	return {
		// fillColor: getColor(feature.properties.Luas_Km),
		weight: 3,
		// opacity: 1,
		color: '#ffffff',
		// fillOpacity: 0.7

	};
}    

function getColor(d) {
	return d > 900  ? '#0044c4' :
	d > 800  ? '#003089' :
	d > 500  ? '#bfd5ff' :
	d > 300   ? '#80acff' :
	d > 100   ? '#ff9100' :
	d > 50   ? '#b36600' :
	'#ffe4bf';
}

