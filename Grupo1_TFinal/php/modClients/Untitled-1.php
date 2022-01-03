<?php 
	include('functions.php');
        if (isLoggedIn()) {
echo "<p>Cerrar Session</p>";
}else echo "Iniciar Session"
?>