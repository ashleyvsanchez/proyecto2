<?php


	//incluimos a la base de datos
	//include_once 'conexion.php';
	include_once 'modelo/conexion.php';
	$i= new conexion;
	//echo $i->toString();

	session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>INICIAR SESIÓN</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./vista/css/normalize.css"> <!--PARA QUE SE VEA IGUAL EN TODOS LOS NAVEGADORES-->

    <link rel="stylesheet"href=".vista/css/materialize.min.css">
	

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="./vista/css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="./vista/css/bootstrap-material-design.min.css"> 
	<!-- coloca el inicio de sesión más grande, coloca los input de manera distinta y permite que se le coloque la linea roja o verde dependiendo si esta bien-->

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="./vista/css/all.css"> <!-- para el icono-->

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="./vista/css/sweetalert2.min.css"> <!-- aun no encuentro lo que hace-->

	<!-- Sweet Alert V8.13.0 JS file -->
	<script src="./vista/js/sweetalert2.min.js" ></script> <!-- aun no encuentro lo que hace-->


	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<!--<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">--> <!-- aun no encuentro lo que hace-->
	<!-- General Styles -->
	<link rel="stylesheet" href="./vista/css/style.css"> <!-- aqui es donde estan TODOS los estilos de la página-->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>
<body >

	<div class="login-container">
		<div class="login-content">
			<p class="text-center">
				<i class="fas fa-user-circle fa-5x"></i>
			</p>
			<p class="text-center">
				Inicia sesión con tu cuenta
			</p>
			<form action="index.php" method="POST" id='Formulario'>
				<div class="form-group">
					<!-- no se que hace ese &nbsp;-->
					<label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp;Usuario</label>
					<input type="text" class="form-control" id="UserName" name="usuario" maxlength="35" onfocusout="validateUsername()" >
					<span class="helper-text"></span>
					<!--<input type="text" class="form-control" id="UserName" name="usuario" pattern="[a-zA-Z0-9]{1,35}" maxlength="35">-->
				</div>
				<div class="form-group">
					<label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
					<input type="password" class="form-control" id="UserPassword" name="clave" maxlength="200" onfocusout="validatePassword()" >
					<span class="helper-text"></span>

				</div>
				<input type="submit" name="enviar" value="Iniciar sesión" class="btn-login text-center">
				<!--<a href="home.html" class="btn-login text-center">Iniciar sesión</a>-->
			</form>

		<?php
			//redirigimos a los roles convenientes
			//seteamos las variables, llamamos al metodo correspondiente que se encuentra en el archivo conexion

			if(isset($_POST['usuario']) and isset($_POST['clave']))
			{
				//echo $_POST['usuario'];
				//Esta variable recibe lo que retorna el metodo, si retorna o es porque el usuario se encontró
				$validar = $i->Usuario($_POST['usuario'],$_POST['clave']);

				if($validar == 0)
				{
					//guardamos el nombre de la personas que inicio sesion
					$_SESSION['usuario'] = $usuario;
			
				}
		
		
			else
			{
				//Mensaje de usuario no encontrado
				?>
					<script>
						Swal.fire({
							title: 'Usuario no existe',
							icon: 'warning',
							text: 'Revise el Nombre o la clave',
							confirmButtonText: 'Volver a intentar'
						});
					</script>
         
									
				 <?php	 
			}
		}
		?>
		</div>
	</div>

	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="./vista/js/jquery-3.4.1.min.js" ></script> <!-- aun no encuentro lo que hace-->

	<!-- popper -->
	<script src="./vista/js/popper.min.js" ></script> <!-- aun no encuentro lo que hace-->

	<!-- Bootstrap V4.3 -->
	<script src="./vista/js/bootstrap.min.js" ></script> <!-- aun no encuentro lo que hace-->

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="./vista/js/jquery.mCustomScrollbar.concat.min.js" ></script> <!-- aun no encuentro lo que hace-->

	<!-- Bootstrap Material Design V4.0 -->
	<script src="./vista/js/bootstrap-material-design.min.js" ></script> <!-- aun no encuentro lo que hace-->
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
	 <!-- aun no encuentro lo que hace-->
	<script src="./vista/js/main.js" ></script> <!-- aun no encuentro lo que hace-->

	<script src="./vista/js/validacion_inicio.js"></script>



</body>
</html>