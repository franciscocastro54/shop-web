<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Bienvenidos | webPage</title>
</head>

<body><?php
        include('C:\Users\camilo\Downloads\multi_login1 (1)\multi_login1\functions.php');
        if (isLoggedIn() && isAdmin()) {
        ?>
        <header>


        </header>
        <nav>

        </nav>
        <section>
            <article class="container-contact">


                <h2>Lista de Productos</h2>
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
                <a href="./createProduct.php"><button class="submit-button">Ingresar Nuevo Producto</button></a>
                <div class="form">

                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Unidad</th>
                                <th>Descuento</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $List = reloadProduct();
                            foreach ($List as $product) {
                                $idProduct = $product["productId"];
                                $name = $product["title"];
                                $price = $product["price"];
                                $unit = $product["unidad"];
                                $dcto = $product["dcto"];
                                $imgUrl = $product["imgUrl"];
                                echo "<tr>
                    <td><a href='modProduct.php/?id=$idProduct'>$name</a></td>
                    <td>$price</td>
                    <td>$unit</td>
                    <td>$dcto</td>
                    <td><a href='$imgUrl' target='_blank'>img</td>
                    </tr>";
                            }


                            ?>

                </div>

                </tbody>
                </table>



                </div>




            </article>

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