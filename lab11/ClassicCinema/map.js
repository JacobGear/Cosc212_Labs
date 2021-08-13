let Map = (function () {

    let pub = {};
    let map, centralMarker, southernMarker, northernMarker;

    function onMapClick(e) {
        alert('You clicked the map at ' + e.latlng);
    }

    function mapSetup(){
        map = L.map('map').setView([-45.875, 170.500], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            { maxZoom: 18,
                attribution: 'Map data &copy; ' +
                    '<a href="http://www.openstreetmap.org/copyright">' +
                    'OpenStreetMap contributors</a> CC-BY-SA'
            }).addTo(map);
    }

    function markerOverlay(){
        L.circle( [-45.873937, 170.50311],
            { radius: 100,
                color: 'red',
                fillColor: 'red',
                fillOpacity: 0.5 } ).addTo(map);

        L.circle( [-45.86075, 170.510806],
            { radius: 100,
                color: 'blue',
                fillColor: 'blue',
                fillOpacity: 0.5 } ).addTo(map);

        L.circle( [-45.885677, 170.496697],
            { radius: 100,
                color: 'green',
                fillColor: 'green',
                fillOpacity: 0.5 } ).addTo(map);
    }

    function markers(){
        centralMarker = L.marker([-45.873937, 170.50311]).addTo(map);
        centralMarker.bindPopup("<img src=images/Metropolis.jpg alt=Metropolis>" +
            "<br>" +
            "<b>Central Store</b>" +
            "<p>Specialising in Classic Cinema</p>");

        northernMarker = L.marker([-45.86075, 170.510806]).addTo(map);
        northernMarker.bindPopup("<img src=images/King_Kong.jpg alt='King Kong'>" +
            "<br>" +
            "<b>Northern Store</b>" +
            "<p>Specialising in Classic Cinema</p>");

        southernMarker = L.marker([-45.885677, 170.496697]).addTo(map);
        southernMarker.bindPopup("<img src=images/Vertigo.jpg alt=Vertigo>" +
            "<br>" +
            "<b>Southern Store</b>" +
            "<p>Specialising in Classic Cinema</p>");

    }

    function centreMap() {
        if (this.textContent === 'Central') {
            let markerLocation = [centralMarker.getLatLng()];
            let markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        } else if(this.textContent === 'North') {
            let markerLocation = [northernMarker.getLatLng()];
            let markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }
        else {
            let markerLocation = [southernMarker.getLatLng()];
            let markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }

    }

    function centerTitle() {
        let titles = document.getElementsByTagName("h3");
        for(let title of titles){
            if(title.textContent === 'Central'){
                title.style.color="red";
            } else if(title.textContent === 'North'){
                title.style.color="blue";
            } else if(title.textContent === 'South'){
                title.style.color="green";
            }
            title.style.cursor = "pointer";
            title.onclick = centreMap;
        }
    }

    pub.mapClickEvent = function(){
        map.on('click', onMapClick);
    }

    pub.setup = function(){
        mapSetup();
        markers();
        markerOverlay();
        centerTitle();
    }

    return pub;
}());

if(window.addEventListener) {
    window.addEventListener('load', Map.setup);
    window.addEventListener('load', Map.mapClickEvent);
} else if (window.attachEvent) {
    window.attachEvent('onload', Map.setup);
} else {
    window.alert("Could not attach ’Cookie.setup’ to the ’window.onload’ event");
}