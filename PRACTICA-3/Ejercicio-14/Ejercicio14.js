"use strict";

class F{
    constructor(){
        navigator.geolocation.getCurrentPosition(this.getPosition.bind(this));
    }

    getPosition(posicion){
        this.longitud = posicion.coords.longitude;
        this.latitud = posicion.coords.latitude;
        this.precision = posicion.coords.accuracy;
    }

    showPosition(){
        var ubicacion = document.querySelector("body > section");
        localStorage.setItem("longitud",this.longitud)
        localStorage.setItem("latitud",this.latitud)
        localStorage.setItem("precision",this.precision)
        var datos = '';
        datos += '<p>Longitud: ' + this.longitud + ' grados</p>';
        datos += '<p>Latitud: ' + this.latitud + ' grados</p>';
        datos += '<p>Precisión de la latitud y longitud: ' + this.precision + ' metros</p>';
        ubicacion.innerHTML = datos;
    }

    showPreviousPosition(){
        var ubicacion = document.querySelector("body > section");
        var datos = '';
        datos += '<p>Antigua longitud: ' + localStorage.getItem("longitud") + ' grados</p>';
        datos += '<p>Antigua latitud: ' + localStorage.getItem("latitud") + ' grados</p>';
        datos += '<p>Antigua precisión de la latitud y longitud: ' + localStorage.getItem("precision") + ' metros</p>';
        ubicacion.innerHTML = datos;
    }

    initMap(files) {
        var ubicacion = document.querySelector("body > section");
        ubicacion.innerHTML = '';

        var archivo = files[0]
        var lector = new FileReader();
        lector.onload = function (event) {
            var text = lector.result;
            var geojson = JSON.parse(text);
            L.mapbox.accessToken = 'pk.eyJ1IjoidW8yNjk4NzEiLCJhIjoiY2t3anJpaTBjMThzZzMxcGJlbnkzeXZwaiJ9.n977TEsECRb_69i8Unbq6A';
            L.mapbox.map('map')
                .setView([43.363433, -5.8633631], 8)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'))
                .featureLayer.setGeoJSON(geojson);
        }

        lector.readAsText(archivo);
    }

}

var f = new F();    