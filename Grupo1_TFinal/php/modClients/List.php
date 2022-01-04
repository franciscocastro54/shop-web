


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
    if (isLoggedIn()&&isAdmin()) {
        ?>
    <header>      
    </header>
    <nav >
        </nav>
<section>
    <article class="container-contact">

   
        <h2>Lista de clientes</h2>
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
        <a href="./createUser.php"><button class="submit-button">Ingresar Nuevo Producto</button></a>
        
        <div class="form">
       <table>
      <thead>
          <tr>
<th>Usuario</th><th>Correo</th><th>Rol</th>
          </tr>
      </thead>
      <tbody>
  
			
					<?php 
                   $List= reloadClient();
                   foreach ( $List as $Client){
                       $idUser=$Client["id"];
                    $user=$Client["username"];
                    $email=$Client["email"];
                    $rol=$Client["user_type"];
                    echo "<tr>
                    <td><a href='modClient.php/?id=$idUser'>$user</a></td>
                    <td>$email</td>
                    <td>$rol</td>
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