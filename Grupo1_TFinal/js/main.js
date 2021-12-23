//data

const products = [
  {
    productId: "1",
    title: "Lechuga",
    price: "500",
    unidad: "unidad",
    dcto: "0",
    imgUrl: "./img/Cabbage.jpg",
  },
  {
    productId: "2",
    title: "Brócoli",
    price: "500",
    unidad: "unidad",
    dcto: "5",
    imgUrl: "./img/broccoli.jpeg",
  },
  {
    productId: "3",
    title: "Zanahoria",
    price: "100",
    unidad: "unidad",
    dcto: "0",
    imgUrl: "./img/carrot.jpg",
  },
  {
    productId: "4",
    title: "Coliflor",
    price: "500",
    unidad: "unidad",
    dcto: "10",
    imgUrl: "./img/cauliflower.jpg",
  },
  {
    productId: "5",
    title: "Choclo",
    price: "2.000",
    unidad: "kg",
    dcto: "0",
    imgUrl: "./img/corn.jpg",
  },
  {
    productId: "6",
    title: "Berenjena",
    price: "2.500",
    unidad: "kg",
    dcto: "10",
    imgUrl: "./img/eggplant.jpg",
  },
  {
    productId: "7",
    title: "Ajo",
    price: "100",
    unidad: "unidad",
    dcto: "0",
    imgUrl: "./img/garlic.jpeg",
  },
  {
    productId: "8",
    title: "Pimenton verde",
    price: "500",
    unidad: "unidad",
    dcto: "0",
    imgUrl: "./img/greenPepper.jpg",
  },
  {
    productId: "9",
    title: "Champiñones",
    price: "1.500",
    unidad: "kg",
    dcto: "25",
    imgUrl: "./img/mushroom.png",
  },
  {
    productId: "10",
    title: "Cebolla",
    price: "1.200",
    unidad: "kg",
    dcto: "0",
    imgUrl: "./img/onion.jpg",
  },
  {
    productId: "11",
    title: "Papa",
    price: "3.500",
    unidad: "kg",
    dcto: "15",
    imgUrl: "./img/potato.jpg",
  },
];

let carrito = [];

//pantalla para añadir al carrito
function showModal(productName) {
  let producto;
  products.map(function (product) {
    if (product.productName == productName) {
      producto = product;
    }
  });

  const modalTemplate = `
    <div class="box">
        <div class="modal-container" id="m1-o" >
            <div class="modal">
            <h1 class="modal__title">Agregar producto</h1>
            <div class="modal__content">
                <img src="${producto.imgUrl}" class="modal-img">
                <div class="modal-info">
                    <p class="modal-name">${producto.productName}</p>
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad">
                    <span>unidades</span>
                </div>
            </div>
            <button onclick="agregarCarrito('${producto.productName}')" class="modal__btn">Agregar al carrito &rarr;</button>
            <a href="#m1-c" class="link-2"></a>
            </div>
        </div>
    </div>`;

  content.append(modalTemplate);
}

// function agregarCarrito(productId) {
//   const cantidad = document.getElementById(`cantidad${productId}`);
//   products.map(function (producto) {
//     if (productName == producto.productId && cantidad > 0) {
//       const cantidad = document.getElementById(`cantidad${productName}`);
//       let addNewProduct = { cantidad: cantidad, producto: producto };
//       carrito.push(addNewProduct);
//     }
//   });
// }

//jquery

$(document).ready(function () {
  const content = $("#content");

  products.map(function (producto) {
    content.append(productTemplate(producto));
        $(`#agregar${producto.productId}`).click(function () {
        const modalTemplate = `
            <div id='box' class="box">
                <div class="modal-container" id="m1-o" >
                    <div class="modal">
                    <h1 class="modal__title">Agregar producto</h1>
                    <div class="modal__content">
                        <img src="${producto.imgUrl}" class="modal-img">
                        <div class="modal-info">
                            <p class="modal-name">${producto.title}</p>
                            <label for="cantidad${producto.productId}">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad${producto.productId}">
                            <span>${producto.unidad}</span>
                        </div>
                    </div>
                    <button id="agregarCarrito${producto.productId}" class="modal__btn">Agregar al carrito &rarr;</button>
                    <a  id="close-modal${producto.productId}" class="link-2"></a>
                    </div>
                </div>
            </div>`;
        content.append(modalTemplate);
        
        $(`#agregarCarrito${producto.productId}`).click(function(){
            const cantidad = document.getElementById(`cantidad${producto.productId}`).value;
            if (cantidad > 0) {
                let addNewProduct = { cantidad: cantidad, producto: producto };
                carrito.push(addNewProduct);
                console.log(carrito)
            }
        })

        $(`#close-modal${producto.productId}`).click(function(){
            $(`#box`).remove();
        })

        });
        
        
    })

  //formato en el que se mostraran productos en la pantalla principal
  function productTemplate(producto) {
    let template = `
      <div class="product">
      <a  href="./index.html" class="photo-container">
          <span class="dcto">-${producto.dcto}%</span>
          <img class="product-photo" src="${producto.imgUrl}">
      </a>
  
      <div class="price">$${producto.price}</div>
      
      <a href="./index.html" class="product-name">${producto.title} (${producto.unidad})</a>
      
      <button id="agregar${producto.productId}" class="product-button" >Agregar al carrito</button>
  
  </div>`;

    if (producto.dcto == 0) {
      template = `
      <div class="product">
      <a  href="./index.html" class="photo-container">
          <img class="product-photo" src="${producto.imgUrl}">
      </a>
  
      <div class="price">$${producto.price}</div>
      
      <a href="./index.html" class="product-name">${producto.title} (${producto.unidad})</a>
      
      <button id="agregar${producto.productId}" class="product-button" >Agregar al carrito</button>
  
  </div>`;
    }

    return template;
  }
});
