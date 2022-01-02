<?php include('functions.php') ?>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
        <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="header">
	<h2>Registrarse</h2>
</div>
<form method="post" action="register.php">
    <?php echo display_error(); ?>
	<div class="input-group">
		<label>Usuario</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Correo</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Contrasena</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirmar contrasena</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Registrarse</button>
	</div>
	<p>
		Ya tienes cuenta? <a href="login.php">Inicia sesion</a>
	</p>
</form>
</body>
</html>


