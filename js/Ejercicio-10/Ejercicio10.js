"use strict";
class Oil {
    constructor(){
       
    }

    price() {

        let url = 'https://api.oilpriceservice.com/v1/price/latest'
        const headers = {
            'Authorization': 'Token b1971c16-f07f-48f5-afab-86348fe3b7ee',
            'Content-Type': 'application/json'
        }

        fetch(url, { headers })
        .then(response => response.json())
        .then(json => $("section").append("El precio de un barril de petróleo Brent en USD es: $" + json.data.price))

        // $.ajax({
        //     url: 'https://commodities-api.com/api/latest?access_key=2dh9t30k4zjygby10ho7eh7raohwf6kegnj5dnb0626d83wzg9fq47i73du6&base=USD%2CEUR&symbols=WTIOIL%2CBRENTOIL',
        //     dataType: 'jsonp',
        //     success: function (json) {
        //         $("section").append(JSON.stringify(json,2,null))
        //         var bUSD = 1/data.rates.BRENTOIL
        //         var eur = data.rates.EUR
        //         var wUSD = 1/data.rates.WTIOIL
        //         $("section").remove();
        //         $("section").append("El precio de un barril de petróleo Brent en USD es: $" + bUSD);
        //         $("section").append("<p>El precio de un barril de petróleo crudo en USD es: $" + data.rates.WTIOIL);
        //     },error: function(json){
        //         $("section").append(JSON.stringify(json,2,null))
        //     }
        // })
    }

    create(type, text) {
        var elemento = document.createElement(type);
        elemento.innerHTML = text;
        $("section").append(elemento);
    }

    mostrar(){
        $("section").empty();
        this.create("h2", "Datos desde <a href='commodities-api.com'>Commodities-API</a>");
        this.price();
    }
}

var oil = new Oil();