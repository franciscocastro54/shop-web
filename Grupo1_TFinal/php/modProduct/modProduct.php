


     <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Bienvenidos | webPage</title>
</head>
<body><?php
	include('C:\Users\camilo\Downloads\multi_login1 (1)\multi_login1\functions.php');
    if (isLoggedIn()) {
        $_SESSION['product']=getProductById($_GET["id"]);
        ?>
    <header class="header">
        
        <nav class="nav">
            <a class="page-logo-container" href="./index.html"><img class="page-logo" src="./img/dragon.png"></a>
            <ul class="menu">
                <li>
                    <a class="left-nav" href="./index.html">Productos</a>
                </li>
                <li>
                    <a class="left-nav" href="./index.html">Ofertas</a>
                </li>
                <li >
                    <a class="left-nav" href="./contactos.html">Contáctanos</a>
                    <ul class="submenu-1" id="contactos">
                        
                        <li class="option">
                            <a href="./index.html" >Contactos</a>
                        </li>

                        <li class="option">
                            <a href="./sucursales.html" >Sucursales</a>
                            <ul class="sub-menu-2" id="sub-2">
                                <li><a href="./index.html" id="sucursalNorte">Sucursal Norte</a></li>
                                <li><a href="./index.html" id="sucursalSur">Sucursal Sur</a></li>
                            </ul>
                        </li>

                        <li class="option">
                            <a href="./index.html" >Redes sociales</a>
                            <ul  class="sub-menu-3" id="redes-sociales">
                                <li >
                                    <a href="./index.html" class="logo-container">
                                        <img src="./img/fb-logo-white.png" class="logo" alt="facebook">
                                    </a>
                                    <a href="./index.html" class="" id="facebook">web-page</a>
                                </li>
                                <li>
                                    <a href="./index.html" class="logo-container">
                                        <img src="./img/instagram-logo-white.png" class="logo" alt="instagram">
                                    </a>

                                    <a href="./index.html" class="logo-name" id="instagram">@web-page</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="left-nav" href="./index.html">Ayuda</a>
                </li>

                <li class="login">
                    <a class="right-nav" href="./login.html">Ingresa o registrate</a>
                </li>
            </ul>
        </nav>
        <div class="header-links">
            <a href="./index.html">Quienes somos</a>
            <a href="./index.html">Nuevos Productos</a>
            <a href="./index.html">Proximamente</a>

        </div>
    </header>


    <article class="container-contact">

   
        <h2>Modificar Producto</h2>
        <?php
    display_error();
    if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
        
        <form class="form" method="post" > 
            <p>confirmar datos</p>
            <div class="input-container">
                <p>Nombre</p>
                <input type="text" name="title" value="<?php echo $_SESSION['product']['title']; ?>"> 
            </div> 

            <div class="input-container">
                <p>Precio</p>
                <input type="number" name="price" value="<?php echo $_SESSION['product']['price']; ?>"> 
            </div> 
            <div class="input-container">
                <p>Unidad</p>
                <input type="text" name="unidad" value="<?php echo $_SESSION['product']['unidad']; ?>"> 
            </div> 
            <div class="input-container">
                <p>Descuento(%)</p>
                <input type="number" name="dcto" value="<?php echo $_SESSION['product']['dcto']; ?>"> 
            </div>
            <div class="input-container">
                <p>imagen (URL)</p>
                <input type="text" name="imgUrl" value="<?php echo $_SESSION['product']['imgUrl']; ?>"> 
            </div>

            <button  class="submit-button"   type="submit" name="modProduct_btn"> Modificar </button>
            <button  class="submit-button"   type="submit" name="delProduct_btn"> Eliminar </button>
        </form>




    </article>

    <footer class="footer">
        
        <div class="footer-section">
            <a href="./index.html" class="titulo" >Contáctanos</a>
            <ul id="contactos">
                <li><a href="./index.html" id="message">Dejanos un mensaje</a></li>
                <li><a href="./index.html" id="phone">+569 12345678</a></li>
                <li><a href="./index.html" id="e-mail">web-page@gmail.com</a></li>
                
            </ul>
        </div>

        <div class="footer-section">
            <a href="./index.html" class="titulo">Redes sociales</a>
            <ul id="redes-sociales">
                <li >
                    <a href="./index.html" class="logo-container">
                        <img src="./img/fb-logo-white.png" class="logo" alt="facebook">
                    </a>
                    <a href="./index.html" class="" id="facebook">web-page</a>
                </li>
                <li>
                    <a href="./index.html" class="logo-container">
                        <img src="./img/instagram-logo-white.png" class="logo" alt="instagram">
                    </a>

                    <a href="./index.html" class="logo-name" id="instagram">@web-page</a>
                </li>
            </ul>
        </div>

        <div class="footer-section">
                <a href="./sucursales.html" class="titulo" >Sucursales</a>
                <ul id="sucursales">
                    <li><a href="./index.html" id="sucursalNorte">Sucursal Norte</a></li>
                    <li><a href="./index.html" id="sucursalSur">Sucursal Sur</a></li>
                </ul>
        </div>

        

    </footer>
    <?php    
}
?>
</body>
</html>