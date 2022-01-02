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

//jquery

$(document).ready(function () {
  const content = $("#content");

  //se carga pantalla con productos
  function loadProduct(producto) {
    content.append(productTemplate(producto));

    //se agrega funcion para desplegar seleccion de cantidad de productos
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
      //se agregan productos al carrito
      $(`#agregarCarrito${producto.productId}`).click(function () {
        const cantidad = document.getElementById(
          `cantidad${producto.productId}`
        ).value;
        if (cantidad > 0) {
          let addNewProduct = { cantidad: cantidad, producto: producto };
          carrito.push(addNewProduct);
          console.log(carrito);
        }
      });

      $(`#close-modal${producto.productId}`).click(function () {
        $(`#box`).remove();
      });
    });
  }

  function loadProducts() {
    content.removeClass("container-contact").addClass("content");
    content.empty();
    products.map(function (producto) {
      loadProduct(producto);
    });
  }

  loadProducts();

  $("#productos").click(function () {
    loadProducts();
  });

  $("#faq").click(function () {
    let template = `
      <h2>Preguntas frecuentes</h2>

      <div class="info-container">
          <p>Como funciona?</p>
          <p>En productos añade los productos que quiera al carro, para luego pasar por carro, iniciar sesion si no lo ha hecho aun, paga, y listo!</p>
      </div>

      <div class="info-container">
          <p>Cuanto tardan y cuestan los envios?</p>
          <p>Llegan al dia siguiente a la fecha de la orden. El precio varia segun localidad de la Region.</p>
      </div>`;
    content.empty();
    content.removeClass("content").addClass("container-contact");
    content.append(template);
  });

  $("#quienesSomos").click(function () {
    let template = `
      <h2>Quiénes Somos</h2>

      <div class="info-container">
          <p>Sobre nosotros</p>
          <p>Somos una verdureria online que siempre busca entregar un servicio rápido y de calidad a todos sus clientes, de manera paralela e independiente a las ferias locales, pues muchos de los vecinos tienen dificultades trasladandose o a si mismos o a los productos a sus hogares, y eso es algo de lo que somos conscientes y apuntamos a solucionar.</p>
      </div>
      
      <div class="info-container">
          <p>Zona de despacho</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d425998.14892663143!2d-70.9100195384674!3d-33.472472762753654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c5410425af2f%3A0x8475d53c400f0931!2sSantiago%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses!2scl!4v1641068825905!5m2!1ses!2scl"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      `;
    content.empty();
    content.removeClass("content").addClass("container-contact");
    content.append(template);
  });

  $("#login").click(function () {
    let loginTemplate = `
      <h2>Ingresar</h2>
        <form method="post" action="../connection/login.php" class="form">
            <p>Ingresa tus datos</p>
            
            <div class="input-container">
                <p>Usuario</p>
                <input name="userName" type="user_name" >
            </div>        

            <div class="input-container">
                <p>Contraseña</p>
                <input name="password" type="password" >
            </div>

            <button id="submit" type="submit" name="submit" value="submit" class="submit-button"> Ingresar </button>

            <a id="signUp" class="signup"> Registrarse </a>

        </form>
      `;
    content.empty();
    content.removeClass("content").addClass("container-contact");
    content.append(loginTemplate);
    $("#signUp").click(function () {
      let signTemplate = `
        <h2>Registrarse</h2>
        <form method="post" action="../connection/signUp.php" class="form">
            <p>Ingresa tus datos</p>
            
            <div class="input-container">
                <p>nombre de usuario</p>
                <input name="userName" type="user_name" >
            </div>        

            <div class="input-container">
                <p>Contraseña</p>
                <input name="password" type="password" >
            </div>

            <button id="submit" type="submit" name="submit" value="submit" class="submit-button"> Ingresar </button>

        </form>
        `;
      content.empty();
      content.removeClass("content").addClass("container-contact");
      content.append(signTemplate);
    });
  });

  $("#registrarse").click(function () {});

  $("#miCuenta").click(function () {});

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
