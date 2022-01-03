
<!DOCTYPE html>
<html lang="es">

<head>
<?php
                include('../php/functions.php');
                
                ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Verduleria a tu casa</title>
</head>

<body>

    <header class="header">
        <div class="header-links">
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

        </div>
    </header>
    <nav class="nav">
            <a class="page-logo-container" href="./"><img class="page-logo" src="./img/verduleriaLogo.jpg"></a>
            <ul class="menu">
                <li>
                    <a class="left-nav" id="productos">Productos</a>
                </li>


                <li>
                    <a class="left-nav" id="quienesSomos">Quiénes somos</a>

                </li>
                <li>
                    <a class="left-nav" id="faq">FAQ</a>
                </li>

             




                <?php
            
                if (isLoggedIn()) { ?>
<li class="left-nav">
                    <a class="left-nav" >Perfil</a>
                    <ul class="submenu-1">
                        <?php if(isAdmin()){?>
                            <li class="option">
                            <a  href="../php/modProduct/List.php">Editar Productos</a>
                        </li><li class="option">
                            <a href="../php/modClients/List.php">Administrar Clientes</a>
                        </li>
                            <?php } ?>
                        <li class="option">
                            <a href="../php/modUser/modUser.php">Modificar Perfil</a>
                        </li>
                        <li class="option">
                        <a href="?logout='1'">Cerrar Session</a>
                        </li>
                      
                    </ul>
                </li>
                   
                    </li>
                <?php } else { ?>
                    <li class="login">
                        <a class="right-nav" id="login">Ingresa</a>
                    </li>

                <?php } ?>

            </ul>
        </nav>
        <section>
    <article id="content" class="content"></article>
                </section>
    <footer class="footer">

        <div class="footer-section">
            <a href="./index.html" class="titulo">Contáctanos</a>
            <ul id="contactos">
                <li><a href="./index.html" id="message">Dejanos un mensaje</a></li>
                <li><a href="./index.html" id="phone">+569 12345678</a></li>
                <li><a href="./index.html" id="e-mail">web-page@gmail.com</a></li>

            </ul>
        </div>

        <div class="footer-section">
            <a href="./index.html" class="titulo">Redes sociales</a>
            <ul id="redes-sociales">
                <li>
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
            <a href="./index.html" class="titulo">Sucursales</a>
            <ul id="sucursales">
                <li><a href="./index.html" id="sucursalNorte">Sucursal Norte</a></li>
                <li><a href="./index.html" id="sucursalSur">Sucursal Sur</a></li>
            </ul>
        </div>

</body>

</html>