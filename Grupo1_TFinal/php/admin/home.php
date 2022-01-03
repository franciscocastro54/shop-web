<?php 
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "Debe iniciar sesion antes";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
		<h2>Admin - Inicio</h2>
	</div>
	<div class="content">
		<!-- notification message -->
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

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../images/user.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">Cerrar sesion</a>
                       &nbsp; <a href="create_user.php"> + anadir usuario</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>
