<?php 
session_start();

// conexion a db
$db = mysqli_connect('localhost', 'root', '', 'multi_login');

// declaracion de variable
$username = "";
$email    = "";
$errors   = array(); 

// llamar la funcion register() si register_btn es clickeado
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTRAR USUARIO
function register(){
	// llamar a estas variables con la palabra clave global para que estén disponibles en función
	global $db, $errors, $username, $email;

	// recibe todos los valores de entrada del formulario. Llamar a la función e ()
    // definida a continuación para escapar de los valores del formulario
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// validacion de formulario
	if (empty($username)) { 
		array_push($errors, "Se requiere un usuario"); 
	}
	if (empty($email)) { 
		array_push($errors, "Se requiere un correo"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Se requiere una contrasena"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Las contrasenas no coinciden");
	}

	// registrar usuario si no hay errores en el llenado
	if (count($errors) == 0) {
		$password = md5($password_1);//encripta la contrasena antes de insertarla en la DB

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "Usuario nuevo creado exitosamente!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// toma la id del usuario creado
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // poner a usuario logeado en sesion
			$_SESSION['success']  = "Has iniciado sesion.";
			header('location: index.php');				
		}
	}
}

// retornar array de usuario desde su id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// string de escape
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}        
        
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// deslogear usuario si cerrar sesion es clickeado
if (isset($_GET['logout'])) {
	//unset($_GET);
	session_destroy();
	unset($_SESSION['user']);
	header('location: /Grupo1_TFinal/public_html/');
}

// llamar la funcion login() si register_btn es clickeado
if (isset($_POST['login_btn'])) {
	login();
}

// LOGEAR USUARIO
function login(){
	global $db, $username, $errors;

	// valores de formulario grap
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// cerciorarse que el formulario se llene correctamente
	if (empty($username)) {
		array_push($errors, "Se requiere usuario");
	}
	if (empty($password)) {
		array_push($errors, "Se requiere contrasena");
	}

	// intentar login si no hay errores en formulario
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // usuario encontrado
			// comprobacion si tipo de usuario es usuario o admin
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Has iniciado sesion.";
			 
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Has iniciado sesion.";

				
			}
		}else {
			array_push($errors, "Usuario o contrasena no coinciden.");
		}
	}
}

function isAdmin(){
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


	

if (isset($_POST['modUser_btn'])) {
	ModifyUser();
}
function ModifyUser()
{
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
	// defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "Se requiere un usuario");
	}
	if (empty($email)) {
		array_push($errors, "Se requiere un correo");
	}
	if (empty($password_1)) {
		array_push($errors, "Se requiere una contrasena");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Las contrasenas no coinciden");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1); //encrypt the password before saving in the database



		$idUser = $_SESSION['user']['id'];
		$typeUser = $_SESSION['user']['user_type'];
		$query = "UPDATE `users` SET `username`='$username',`email`='$email',`user_type`='$typeUser',`password`='$password' WHERE `id`=$idUser";
		if (mysqli_query($db, $query)) {
			$_SESSION['user'] = getUserById($idUser); // put logged in user in session
			$_SESSION['success']  = "Usuario Modificado exitosamente!!";
		}
	}
}


function reloadClient()
{
	global $db;
	$query = "SELECT * FROM users ;";
	$results = mysqli_query($db, $query);
	if ($results) {
		$List = [];
		while ($row = mysqli_fetch_array($results)) {

			array_push($List, $row);
		}
		return $List;
	}
}
if (isset($_POST['modClient_btn'])) {
	ModifyClient();
}
function ModifyClient()
{
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
	// defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$typeUser      =  e($_POST['type']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "Se requiere un usuario");
	}
	if (empty($email)) {
		array_push($errors, "Se requiere un correo");
	}
	if (empty($password_1)) {
		array_push($errors, "Se requiere una contrasena");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Las contrasenas no coinciden");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1); //encrypt the password before saving in the database



		$idUser = $_SESSION['client']['id'];
		$query = "UPDATE `users` SET `username`='$username',`email`='$email',`user_type`='$typeUser',`password`='$password' WHERE `id`=$idUser";
		if (mysqli_query($db, $query)) {
			$_SESSION['client'] = getUserById($idUser); // put logged in user in session
			$_SESSION['success']  = "Cliente Modificado exitosamente!!";
		}
	}
}
if (isset($_POST['delClient_btn'])) {
	DeleteClient();
}
function DeleteClient()
{
	global $db;
	$idClient = $_SESSION['client']["id"];
	$query = "DELETE FROM `users` WHERE id=$idClient";
	if (mysqli_query($db, $query)) {
		unset($_SESSION['client']);
		header('location: /modClients/List.php');
	}
}
function reloadProduct()
{
	global $db;
	$query = "SELECT * FROM products ;";
	$results = mysqli_query($db, $query);
	if ($results) {
		$List = [];
		while ($row = mysqli_fetch_array($results)) {

			array_push($List, $row);
		}
		return $List;
	}
}
function getProductById($id)
{
	global $db;
	$query = "SELECT * FROM products WHERE productId =" . $id;
	$result = mysqli_query($db, $query);

	$product = mysqli_fetch_assoc($result);
	return $product;
}
if (isset($_POST['registerProduct_btn'])) {
	CreateProduct();
}
function CreateProduct()
{
	// call these variables with the global keyword to make them available in function
	global $db, $errors;

	// receive all input values from the form. Call the e() function
	// defined below to escape form values
                            $name = e($_POST['title']);
                            $price = e($_POST['price']);
                            $unit = e($_POST['unidad']);
                            $dcto =e($_POST['dcto']);
                            $imgUrl = e($_POST['imgUrl']);


	// form validation: ensure that the form is correctly filled
	if (empty($name)) {
		array_push($errors, "Se requiere un nombre");
	}
	if (empty($price)) {
		array_push($errors, "Se requiere un precio");
	}
	if (empty($unit)) {
		array_push($errors, "Se requiere una unidad");
	}
	if (empty($dcto)) {
		array_push($errors, "Se requiere un descuento");
	}
	if (empty($imgUrl)) {
		array_push($errors, "Se requiere una imagen(URL)");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
	
		$query = "INSERT INTO `products`(`title`, `price`, `unidad`, `dcto`, `imgUrl`) 
		VALUES ('$name','$price','$unit','$dcto','$imgUrl')";
		if (mysqli_query($db, $query)) {
			$_SESSION['product'] = getProductById(mysqli_insert_id($db)); // put logged in user in session
			$_SESSION['success']  = "Producto creado exitosamente!!";
			header('location: /modProduct/List.php');
		}
	}
}
if (isset($_POST['modProduct_btn'])) {
	ModifyProduct();
}
function ModifyProduct()
{
	// call these variables with the global keyword to make them available in function
	global $db, $errors;

	// receive all input values from the form. Call the e() function
	// defined below to escape form values
	$idProduct = $_SESSION["product"]["productId"];
                            $name = e($_POST['title']);
                            $price = e($_POST['price']);
                            $unit = e($_POST['unidad']);
                            $dcto =e($_POST['dcto']);
                            $imgUrl = e($_POST['imgUrl']);


	// form validation: ensure that the form is correctly filled
	if (empty($name)) {
		array_push($errors, "Se requiere un nombre");
	}
	if (empty($price)) {
		array_push($errors, "Se requiere un precio");
	}
	if (empty($unit)) {
		array_push($errors, "Se requiere una unidad");
	}
	if (empty($dcto)) {
		array_push($errors, "Se requiere un descuento");
	}
	if (empty($imgUrl)) {
		array_push($errors, "Se requiere una imagen(URL)");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
	
		$query = "UPDATE `products` SET `title`='$name',`price`='$price',`unidad`='$unit',`dcto`='$dcto',`imgUrl`='$imgUrl' WHERE `productId`=$idProduct";
		if (mysqli_query($db, $query)) {
			$_SESSION['product'] = getProductById($idProduct); // put logged in user in session
			$_SESSION['success']  = "Producto Modificado exitosamente!!";
		}
	}
}

if (isset($_POST['delProduct_btn'])) {
	DeleteProduct();
}
function DeleteProduct()
{
	global $db;
	$idProduct = $_SESSION['product']["productId"];
	$query = "DELETE FROM `products` WHERE productId =$idProduct";
	if (mysqli_query($db, $query)) {
		unset($_SESSION['product']);
		header('location: /modProduct/List.php');
	}
}
