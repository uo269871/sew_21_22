"use strict";
class Oil {
    constructor(){
       
    }

    price() {
        $.ajax({
            url: 'https://commodities-api.com/api/latest?access_key=2dh9t30k4zjygby10ho7eh7raohwf6kegnj5dnb0626d83wzg9fq47i73du6',
            dataType: 'json',
            success: function (json) {
                var bUSD = 1/json.data.rates.BRENTOIL;
                var wUSD = 1/json.data.rates.WTIOIL;
                $("section").append('<p>El precio de un barril de petróleo Brent en USD es: $' + bUSD+'</p>');
                $("section").append('<p>El precio de un barril de petróleo crudo en USD es: $' + wUSD+'</p>');
            },error: function(json){
                $("section").append(JSON.stringify(json,2,null))
            }
        })
    }

    create(type, text) {
        var elemento = document.createElement(type);
        elemento.innerHTML = text;
        $("section").append(elemento);
    }

    mostrar(){
        $("section").empty();
        this.create("h2", "Datos");
        this.price();
    }
}

var oil = new Oil();