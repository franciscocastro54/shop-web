<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="../style1.css">
	<style>
		.header {
			background: rgb(133, 89, 42);
		}
		button[name=register_btn] {
			background: rgb(133, 89, 42);
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - crear usuario</h2>
	</div>
	
	<form method="post" action="create_user.php">

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
			<label>Tipo de usuario</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">Usuario</option>
			</select>
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
			<button type="submit" class="btn" name="register_btn"> + Crear usuario</button>
		</div>
	</form>
</body>
</html>

