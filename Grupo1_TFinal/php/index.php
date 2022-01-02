<?php 
	include('functions.php');
        if (!isLoggedIn()) {
	$_SESSION['msg'] = "Debe iniciar sesion antes";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div class="header">
		<h2>Inicio</h2>
	</div>
	<div class="content">
		<!-- notificacion -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- informacion de usuario logeado -->
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">Cerrar sesion</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>