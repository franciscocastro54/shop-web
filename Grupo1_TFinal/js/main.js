//formato en el que se mostraran productos en la pantalla principal
function productTemplate(producto){
    let template = `
    <div class="product">
    <a  href="./index.html" class="photo-container">
        <span class="dcto">-${producto.dcto}%</span>
        <img class="product-photo" src="${producto.imgUrl}">
    </a>

    <div class="price">$${producto.price}</div>
    
    <a href="./index.html" class="product-name">${producto.productName}</a>
    
    <button id="agregar${producto.productName}" class="product-button">Agregar al carrito</button>

</div>`;

    if (producto.dcto == 0) {
        template = `
    <div class="product">
    <a  href="./index.html" class="photo-container">
        <img class="product-photo" src="${producto.imgUrl}">
    </a>

    <div class="price">$${producto.price}</div>
    
    <a href="./index.html" class="product-name">${producto.productName}</a>
    
    <button id="agregar${producto.productName}" class="product-button">Agregar al carrito</button>

</div>`;
    }

    return template;
}

//data 

const products = [
    {
        "productName": "Lechuga",
        "price": "500",
        "dcto": "0",
        "imgUrl": "./img/Cabbage.jpg"
    },
    {
        "productName": "Brócoli",
        "price": "500",
        "dcto": "5",
        "imgUrl": "./img/broccoli.jpeg"
    },
    {
        "productName": "Zanahoria",
        "price": "100",
        "dcto": "0",
        "imgUrl": "./img/carrot.jpg"
    },
    {
        "productName": "Coliflor",
        "price": "500",
        "dcto": "10",
        "imgUrl": "./img/cauliflower.jpg"
    },
    {
        "productName": "Choclo (kg)",
        "price": "2.000",
        "dcto": "0",
        "imgUrl": "./img/corn.jpg"
    },
    {
        "productName": "Berenjena (kg)",
        "price": "2.500",
        "dcto": "10",
        "imgUrl": "./img/eggplant.jpg"
    },
    {
        "productName": "Ajo",
        "price": "100",
        "dcto": "0",
        "imgUrl": "./img/garlic.jpeg"
    },
    {
        "productName": "Pimenton verde",
        "price": "500",
        "dcto": "0",
        "imgUrl": "./img/greenPepper.jpg"
    },
    {
        "productName": "Champiñones (kg)",
        "price": "1.500",
        "dcto": "25",
        "imgUrl": "./img/mushroom.png"
    },
    {
        "productName": "Cebolla (kg)",
        "price": "1.200",
        "dcto": "0",
        "imgUrl": "./img/onion.jpg"
    },
    {
        "productName": "Papa (kg)",
        "price": "3.500",
        "dcto": "15",
        "imgUrl": "./img/potato.jpg"
    }

]


//jquery 

$(document).ready(function () {
    const content = $('#content')
    products.map(function(producto){
        content.append(productTemplate(producto));
    })

});