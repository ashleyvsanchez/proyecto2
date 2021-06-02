<?php
	
	///iniciamos session
	session_start();

	session_unset(); //libera todas las variables de sesión actualmente 							registradas. 
	session_destroy(); // para destruir la sesion

//redirigir a la pagina principal
	header("location: ./index.php");

?>