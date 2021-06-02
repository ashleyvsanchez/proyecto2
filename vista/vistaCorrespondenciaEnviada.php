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
<title>CORRESPONDENCIA ENVIADA</title>

<!-- Normalize V8.0.1 -->
<link rel="stylesheet" href="../vista/css/normalize.css">

<!-- para validaciones en tiempo real -->
<!--<link rel="stylesheet"href="./css/materialize.min.css"> -->

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

						<li id="usuario"  style="display: none">
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

						<li id="persona"   style="display: none">
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


						<li id="memo" style="display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de memos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="vistaCrearMemo.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear memo</a>
								</li>
								<li>
									<a href="vistaModificarMemo.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar memo</a>
								</li>
								<li>
									<a href="vistaConsultarMemo.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar memo</a>
								</li>
							</ul>
						</li>


						<li id="departamento"  style="display: none">
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
<!-- Page content -->
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
				<i class="fas fa-search fa-fw"></i> &nbsp; CORRESPONDENCIA ENVIADA
			</h3>
			<p class="text-justify">
				SE PODRÁ VISUALIZAR LA CORRESPONDENCIA ENVIADA
			</p>
		</div>


			<!-- Content -->
			<div class="container-fluid">
        		<form class="form-neon" action="../controlador/controladorConsultarCorrespondenciaE.php" method="POST" id="form" name="form" >
            		<div class="row">
						<div class="col-md-6"> 
							<div align="center" class="form-group" >
								<select class="form-control" name="optFiltro" id="optFiltro" onchange="mostrarOptFiltro()">
									<option value="0" disabled="" selected="">Filtro</option>
									<option value="1">FECHA ENVIO</option>
									<option value="2">ASUNTO</option>
									<option value="3">RECEPTOR</option>
								</select>
								<span class="helper-text"></span>
							</div>
						</div>

						<div class="col-12 col-md-6">
                       		<p class="text-center" style="margin-top: 40px;">
                            	<button type="submit" class="btn btn-raised btn-info" name="consultar" id="consultarFiltro"><i class="fas fa-search" ></i> &nbsp; FILTRAR</button>
                       		</p>
                   		</div>
					</div>


						<div class="row justify-content-md">
					
                    		<div class="col-md-6">

                        		<div class="form-group" id="inpFecha" style="display: none">
                           			<label for="inputSearch" class="bmd-label-floating">FECHA ENVIO </label>
                            		<input type="text" class="form-control"  name="fecha" id="fecha" maxlength="30" onfocusout="validarFecha()">
                            		<span class="helper-text"></span>
								</div>


								<div class="form-group" id="inpAsunto" style="display: none">
                           			<label for="inputSearch" class="bmd-label-floating"> ASUNTO</label>
                            		<input type="text" class="form-control" name="asunto" id="asunto" maxlength="30" onfocusout="validarAsunto()">
                            		<span class="helper-text"></span>
								</div>

								<div class="form-group" id="inpDepa" style="display: none">
                           			<label for="inputSearch" class="bmd-label-floating"> RECEPTOR</label>
                            		<input type="text" class="form-control" id="nombreDepartamento" name="departamento" onfocusout="validarNombre()">
                            		<span class="helper-text"></span>
								</div>

							</div>
               			</div>
        		</form>
    		</div>

		<!--TABLA GENERICA -->

        <?php

                        require_once('../modelo/claseCorrespondencia.php');
                        $correspondencia = new correspondencia('',$_SESSION['departamento_usuario'],'','','','','','');
						$resultado = $correspondencia -> correspondenciaEnviada();
						
						if(!$resultado){

							?>
									<script>
										Swal.fire({
											title: ' ¡Vacía! ',
											html: '¡No ha enviado correspondencia!',
											icon: 'info',
											showConfirmButton: true,
											confirmButtonText: 'Aceptar',
										})
										.then(resultado=>{
											if(resultado.value){
												window.location.href='../vista/inicio.php';
											}
										}) ;  
									</script>        
							<?php

						}
						else{
                        ?>   

                        <div class='container-fluid'><table border='1' class='table table-dark table-sm'><thead>
                        <tr class='text-center roboto-medium'>
                        <td align='center' width=400><h5>Para</h5></td>
                        <td align='center' width=400><h5>Asunto</h5></td>
                        <td align='center' width=400><h5>Mensaje</h5></td>
                        <td align='center' width=400><h5>Fecha Envio</h5></td>
                        <td align='center' width=400><h5>Hora Envio</h5></td>
                        <td align='center' width=400><h5>Estatus</h5></td>
						
                        </thead> 
                        <?php
                        while ($fila=pg_fetch_array($resultado))
                        {
                        ?>
                            <tr>
							<?php if($_SESSION['departamento_usuario']==$fila[0]){?>
                            	<td align='center' width=400><h6>Mismo Departamento</h6></td>
								<td align='center' width=400><h6><?php echo $fila[1];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[2];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[3];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[4];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[6];?></h6></td>
							<?php 
								 }
								else{
						    ?>
								<td align='center' width=400><h6><?php echo $fila[0];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[1];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[2];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[3];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[4];?></h6></td>
								<td align='center' width=400><h6><?php echo $fila[6];?></h6></td>
                        <?php
						  }
                        }
                        pg_free_result($resultado);
					} ?>
                        </table></div>

		</div>

		<div class="container-fluid">
			<form action="">
				<input type="hidden" name="eliminar-busqueda" value="eliminar">
				<div class="container-fluid">
					<div class="row justify-content-md-center">
						
						<div class="col-12">
							<p class="text-center" style="margin-top: 20px;">
								<a type="buttom" href="../vista/vistaCorrespondenciaRecibida.php" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp; Atras</a>
							</p>
						</div>
					</div>
				</div>
			</form>

					
		</div>

	</section> 
</main>


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

<script src="./js/validarFiltroCorrespondencia.js" ></script>

<!-- validar menú dependiendo del rol--->
<script src="./js/validacionRol.js"></script>
<script src="../vista/js/valConsUsuario.js"></script>
<script src="../vista/js/main.js" ></script>
</body>
</html>	