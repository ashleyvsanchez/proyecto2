
<?php

//VERIFICACIÓN  DE DATOS
//include ("manejadora.php");

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
<title>MEMBRETE</title>

<!-- Normalize V8.0.1 -->
<link rel="stylesheet" href="./css/normalize.css">

<!-- para validaciones en tiempo real -->
<!--<link rel="stylesheet"href="./css/materialize.min.css">-->

<!-- Bootstrap V4.3 -->
<link rel="stylesheet" href="./css/bootstrap.min.css">

<!-- Bootstrap Material Design V4.0 -->
<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

<!-- Font Awesome V5.9.0 -->
<link rel="stylesheet" href="./css/all.css"> <!-- este código tiene demasiadas líneas-->

<!-- Sweet Alerts V8.13.0 CSS file -->
<link rel="stylesheet" href="./css/sweetalert2.min.css">

<!-- Sweet Alert V8.13.0 JS file-->
<script src="./js/sweetalert2.min.js" ></script>

<!-- jQuery Custom Content Scroller V3.1.5 -->
<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">

<!-- General Styles -->
<link rel="stylesheet" href="./css/style.css">


<!-- PARA EL TEXT AREA-->
<script src="./ckeditor/ckeditor.js" ></script>


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
					<img src="./assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
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
							<a href="inicio.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Menú</a>
						</li>

						<li id="usuario"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Gestión de usuario <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="./vistaCrearUsuario.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear perfil Usuario</a>
								</li>
								<li>
									<a href="./vistaModificarUsuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar perfil usuario</a>
								</li>
								<li>
									<a href="./vistaConsultarUsuario.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Usuario</a>
								</li>
	
							</ul>
						</li>

						<li id="persona"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user fa-fw"></i> &nbsp; Gestión de persona <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="./vistaCrearPersona.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear perfil persona</a>
								</li>
								<li>
									<a href="./vistaModificarPersona.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar perfil persona</a>
								</li>
								<li>
									<a href="./vistaConsultarPersona.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar persona</a>
								</li>
							</ul>
						</li>

						<!--SUB MODULO-->
						
						<li id="solicitud"  style="display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de Solicitudes <i class="fas fa-chevron-down"></i></a>
							<ul>
								
								<li>
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Solicitud de Servicio <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="./vistaCrearServicio.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear Solicitud</a>
										</li>
										<li>
											<a href="./vistaModificarServicio.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar Solicitud</a>
										</li>
										<li>
											<a href="./vistaConsultarServicio.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Solicitud</a>
										</li>
									</ul>
								</li>


								<li>
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Solicitud de Refrigerio <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="./vistaCrearRefrigerio.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear Solicitud</a>
										</li>
										<li>
											<a href="./vistaModificarRefrigerio.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar Solicitud</a>
										</li>
										<li>
											<a href="./vistaConsultarRefrigerio.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Solicitud</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>


						<li id="memo"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de memos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="./vistaCrearMemo.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear memo</a>
								</li>
								<li>
									<a href="./vistaModificarMemo.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar memo</a>
								</li>
								<li>
									<a href="./vistaConsultarMemo.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar memo</a>
								</li>
							</ul>
						</li>

						<li id="departamento"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Gestión de departamento <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="./vistaCrearDepartamento.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear departamento</a>
								</li>
								<li>
									<a href="./vistaModificarDepartamento.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar departamento</a>
								</li>
								<li>
									<a href="./vistaConsultarDepartamento.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar departamento</a>
								</li>
							</ul>
						</li>
					
						<li id="correspondencia"  style="display: none">
						    <a href="#" class="nav-btn-submenu"><i class="fas fa-envelope-open-text fa-fw"></i> &nbsp; Envio Correspondencia <i class="fas fa-chevron-down"></i></a>
                        	<ul>
                            	<li>
                                	<a href="./vistaEnvioCorrespondencia.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Enviar Correspondencia</a>
                            	</li>
                            	<li>
                                	<a href="./vistaCorrespondenciaEnviada.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Enviada</a>
                            	</li>
                            	<li>
                               		<a href="./vistaCorrespondenciaRecibida.php"><i class="fas fa-search fa-fw"></i> &nbsp; Recibida</a>
                            	</li>
                        	</ul>
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
        <nav class="full-box navbar-info" style="background-color: white">
            <a href="#" class="float-left show-nav-lateral">
                <i class="fas fa-exchange-alt"></i>
            </a>
            <a href="#" class="btn-exit-system">
                <i class="fas fa-power-off"></i>
            </a>
        </nav>

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-plus fa-fw"></i> &nbsp; ACTUALIZACIÓN DE MEMBRETE 
            </h3>
            <p class="text-justify">
                <!--Se podrá crear un nuevo perfil de departamento.-->
            </p>
        </div>
        
        <!-- Content -->
        <div class="container-fluid">
            <form action="../controlador/controladorMembrete.php" method="POST" enctype="multipart/form-data" class="form-neon" name="formEnvioMembrete" id="formEnvioMembrete">
            <legend><i class="fas fa-store-alt fa-fw"></i> &nbsp; Seleccione una imagen</legend><br><br>
                
                <div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
                                    <input type="file" name="archivo" class="btn btn-raised btn-info btn-sm" id="Imagen" onfocusout="validarImagen()"> <br> <br>
								</div>
								<span class="helper-text"></span>
							</div>


							<div class="col-12 ">
								<p class="text-center" style="margin-top: 40px;">

								<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
								<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save" name="envio"></i> &nbsp; ENVIAR IMAGEN</button>
								</p>
						    </div>
                        </div>
			    </div>
            
            </fieldset>
			<br><br><br>

            </form>

        </div>

    </section>


</main>


<!--=============================================
=            Include JavaScript files           =
==============================================-->
<!-- jQuery V3.4.1 -->
<script src="./js/jquery-3.4.1.min.js" ></script>

<!-- popper -->
<script src="./js/popper.min.js" ></script>

<!-- Bootstrap V4.3 -->
<script src="./js/bootstrap.min.js" ></script>

<!-- jQuery Custom Content Scroller V3.1.5 -->
<script src="./js/jquery.mCustomScrollbar.concat.min.js" ></script>

<!-- Bootstrap Material Design V4.0 -->
<script src="./js/bootstrap-material-design.min.js" ></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<!-- validar menú dependiendo del rol--->
<script src="./js/validacionRol.js" ></script>

<script src="./js/main.js" ></script>

<!-- validaciones en tiempo real --->
<script src="./js/validacionCambioImagen.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</body>
</html>