<?php

	
	//ID DE CLIENTEs-------------> 2
	//AQUI INICIAMOS SESION 
	session_start();

//SI EL ROL NO EXISTE ENTONCES REDIRIGIR AL FORMULARIO DE INICAR SESION
	if(!isset($_SESSION['rol']))
	{
		header("location: ../iniciarSesion.php");
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>MODIFICAR USUARIO</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="../vista/css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="../vista/css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="../vista/css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="../vista/css/all.css"> <!-- este código tiene demasiadas líneas-->

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="../vista/css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="../vista/js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="../vista/css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="../vista/css/style.css">

	<!--MENSAJE ALERTA-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</head>
<body>

<!-- Main container -->
<main class="full-box main-container">
	<!-- Nav lateral -->
	<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="../vista/assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						<?php 
						
							echo $_SESSION['rol'];
							
							if($_SESSION['rol'] != "Administrador")
							{
								echo "<br>";
						        echo "Departamento: ".$_SESSION['departamento_usuario'];
							}
						?> 
						<br><small class="roboto-condensed-light">IUT DR. FEDERICO RIVERO PALACIOS</small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">

					<!--type="hidden"  para ocultar el contendio del boton-->
					<input type="hidden" name="rol" id="rol" value="<?php echo $_SESSION['rol'] ?>">

					
				<ul>
						<li>
							<a href="../inicio.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Menú</a>
						</li>

						<li id="usuario"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Gestión de usuario <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../vista/vistaCrearUsuario.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear perfil Usuario</a>
								</li>
								<li>
									<a href="../vista/vistaModificarUsuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar perfil usuario</a>
								</li>
								<li>
									<a href="../vista/vistaConsultarUsuario.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Usuario</a>
								</li>
	
							</ul>
						</li>

						<li id="persona"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user fa-fw"></i> &nbsp; Gestión de persona <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../vista/vistaCrearPersona.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear perfil persona</a>
								</li>
								<li>
									<a href="../vista/vistaModificarPersona.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar perfil persona</a>
								</li>
								<li>
									<a href="../vista/vistaConsultarPersona.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar persona</a>
								</li>
							</ul>
						</li>
	<!--SUB MODULO-->
						
						<li id="pedido"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión hoja de pedido <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li id="pedido">
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Hoja Pedido <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear hoja de pedido</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar hoja de pedido</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Consultar hoja de pedido</a>
										</li>
									</ul>
								</li>


								<li id="solicitudadServicio">
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Solicitud de Servicio <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear Solicitud</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar Solicitud</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Consultar Solicitud</a>
										</li>
									</ul>
								</li>


								<li id="solicitudRefrigerio">
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Solicitud de Refrigerio <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear Solicitud</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar Solicitud</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Consultar Solicitud</a>
										</li>
									</ul>
								</li>


								<li id="solicitudRefrigerio">
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Requisición <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear Requisición</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar Requisición</a>
										</li>
										<li>
											<a href="#"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Consultar Requisición</a>
										</li>
									</ul>
								</li>


							</ul>
						</li>


						<li id="memo"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de memos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear memo</a>
								</li>
								<li>
									<a href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar memo</a>
								</li>
								<li>
									<a href="#"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Consultar memo</a>
								</li>
							</ul>
						</li>
						<li id="departamento"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Gestión de departamento <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../vista/vistaCrearDepartamento.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear departamento</a>
								</li>
								<li>
									<a href="../vista/vistaModificarDepartamento.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar departamento</a>
								</li>
								<li>
									<a href="../vista/vistaConsultarDepartamento.php"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Consultar departamento</a>
								</li>
							</ul>
						</li>
					
						<li id="correspondencia" style = "display: none">
							<a href="#"><i class="fas fa-envelope-open-text fa-fw"></i> &nbsp; Envio Correspondencia</a>
						</li>

						<li id="estatus"  style="display: none">
							<a href="../vista/vistaEstatusSolicitud.php"><i class="fas fa-file-import fa-fw"></i> &nbsp; Estatus de solicitud</a>
						</li>


						<li id="cambioImagen" style="display: none" >
							<a href="../vista/vistaMembrete.php"><i class="fas fa-file-import fa-fw"></i> &nbsp; Membrete</a>
						</li>

					</ul>
				</nav>
			</div>
		</section>
		

		<!-- Page content --> <!-- NO SE QUE HACE ESTA SECCION-->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a href="user-update.html">
					<i class="fas fa-user-cog"></i>
				</a>
				<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; ENVIAR CORRESPONDENCIA
				</h3>
			</div>
			


    
    
	
	

 <?php



require_once('../modelo/claseCorrespondencia.php');



//-------------------Variable para la fecha y la hora--------------//
    /*para fecha en español*/
	setlocale(LC_ALL,"spanish"); 
	
	//aqui guardamos la fecha, el mes y el año del sistema
	$dia = date("d");
    $mes = date("m");
    $año = date("y");

    $fechaS = $dia."/".$mes."/".$año;

    $hora = date("h").":".date("i")." ".date("a");
//----------------------------------------------------------------//


//----------Variable que se deben pasar a la clase Documento-----//

    $destino = $_POST['para'];
    $tipoDocumento = $_POST['TipoDoc'];
    $asunto = $_POST['Asunto'];
    $mensaje = $_POST['Mensaje'];
    $origen = $_SESSION['departamento_usuario'];


//-----Para verificar que tipo de documento se está enviando (Memo, servicio, refrigerio)-----//

    switch ($tipoDocumento) {
        //Si es 1, es Memo
        case 1:

            $correspondencia = new correspondencia('',$origen,$destino,$hora,$fechaS,$asunto,$mensaje,$_POST['Memo']);
            $correspondencia -> enviarCorrespondencia();

			?>
					 <script>
						Swal.fire({
							 title: ' ¡ENVIO EXITOSO! ',
							 html: 'El memo fue enviado con exito a <?php if($_SESSION['departamento_usuario']== $destino)
																		   echo "Al mismo departamento";
																		   else	
																		   echo $destino;?>',
							 icon: 'succes',
							 showConfirmButton: true,
							 confirmButtonText: 'Aceptar',
						 })
						 .then(resultado=>{
							 if(resultado.value){
								 window.location.href='../vista/vistaEnvioCorrespondencia.php';
							 }
						 }) ;  
					 </script>                              
				  <?php   
          
            break;

       //Si es 2, es Servicio
       case 2:
		$correspondencia = new correspondencia('',$origen,$destino,$hora,$fechaS,$asunto,$mensaje,$_POST['Servicio']);
		$correspondencia -> enviarCorrespondencia();

		?>
				 <script>
					 Swal.fire({
						 title: ' ¡ENVIO EXITOSO! ',
						 html: 'El Servicio fue enviado con exito a <?php if($_SESSION['departamento_usuario']== $destino)
																		   echo "Al mismo departamento";
																		   else	
																		   echo $destino;?>',
						 icon: 'succes',
						 showConfirmButton: true,
						 confirmButtonText: 'Aceptar',
					 })
					 .then(resultado=>{
						 if(resultado.value){
							 window.location.href='../vista/vistaEnvioCorrespondencia.php';
						 }
					 }) ;  
				 </script>                              
			  <?php   
       break;

       //Si es 3, es Refrigerio
       case 3:
		$correspondencia = new correspondencia('',$origen,$destino,$hora,$fechaS,$asunto,$mensaje,$_POST['Refrigerio']);
		$correspondencia -> enviarCorrespondencia();
        //echo "<br>". $correspondencia -> toString();


		?>
				 <script>
					Swal.fire({
						 title: ' ¡ENVIO EXITOSO! ',
						 html: 'La solicitud de refrigerio fue enviado con exito a <?php if($_SESSION['departamento_usuario']== $destino)
																		   echo "Al mismo departamento";
																		   else	
																		   echo $destino;?>',
						 icon: 'succes',
						 showConfirmButton: true,
						 confirmButtonText: 'Aceptar',
					 })
					 .then(resultado=>{
						 if(resultado.value){
							 window.location.href='../vista/vistaEnvioCorrespondencia.php';
						 }
					 }) ;  
				 </script>                              
			  <?php   
       break;

        default:
            echo "No ha seleccionado ninguna opción";
            break;
    }










?>
			  
				
				
        
        

</div>

	
	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="../vista/js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="../vista/js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="../vista/js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="../vista/js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="../vista/js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
	
	<!-- validar menú dependiendo del rol--->
	<script src="../vista/js/validacionRol.js"></script>
	<script src="../vista/js/validarModificarUsuario.js"></script>
	<script src="../vista/js/main.js" ></script>
</body>
</html>




