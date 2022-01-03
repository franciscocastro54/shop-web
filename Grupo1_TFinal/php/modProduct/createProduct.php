<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public_html/style.css">
    <title>Bienvenidos | webPage</title>
</head>

<body><?php
        include('../functions.php');
        if (isLoggedIn()) {

        ?>
        <header>


        </header>
        <nav>

        </nav>


        <article class="container-contact">


            <h2>Registrar Producto</h2>
            <?php
            display_error();
            if (isset($_SESSION['success'])) : ?>
                <div class="error success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <form class="form" method="post">
                <p>confirmar datos</p>
                <div class="input-container">
                    <p>Nombre</p>
                    <input type="text" name="title">
                </div>

                <div class="input-container">
                    <p>Precio</p>
                    <input type="number" name="price">
                </div>
                <div class="input-container">
                    <p>Unidad</p>
                    <input type="text" name="unidad">
                </div>
                <div class="input-container">
                    <p>Descuento(%)</p>
                    <input type="number" name="dcto">
                </div>
                <div class="input-container">
                    <p>imagen (URL)</p>
                    <input type="text" name="imgUrl">
                </div>

                <button class="submit-button" type="submit" name="registerProduct_btn"> Registrar </button>

            </form>




        </article>

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
                <a href="./sucursales.html" class="titulo">Sucursales</a>
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