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
	<title>CONSULTAR PERSONA</title>

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
							<a href="../vista/inicio.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Menú</a>
						</li>

						<li id="usuario"  style="display: none">
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

						<li id="persona"   style="display: none">
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
						
						<li id="solicitud"  style="display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de Solicitudes <i class="fas fa-chevron-down"></i></a>
							<ul>
								
								<li>
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Solicitud de Servicio <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="../vista/vistaCrearServicio.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear Solicitud</a>
										</li>
										<li>
											<a href="../vista/vistaModificarServicio.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar Solicitud</a>
										</li>
										<li>
											<a href="../vista/vistaConsultarServicio.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Solicitud</a>
										</li>
									</ul>
								</li>


								<li>
									<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Solicitud de Refrigerio <i class="fas fa-chevron-down"></i></a>
									<ul>
										<li>
											<a href="../vista/vistaCrearRefrigerio.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear Solicitud</a>
										</li>
										<li>
											<a href="../vista/vistaModificarRefrigerio.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar Solicitud</a>
										</li>
										<li>
											<a href="../vista/vistaConsultarRefrigerio.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Solicitud</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>


						<li id="memo" style="display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de memos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../vista/vistaCrearMemo.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear memo</a>
								</li>
								<li>
									<a href="../vista/vistaModificarMemo.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar memo</a>
								</li>
								<li>
									<a href="../vista/vistaConsultarMemo.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar memo</a>
								</li>
							</ul>
						</li>


						<li id="departamento"  style="display: none">
							<a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Gestión de departamento <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../vista/vistaCrearDepartamento.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear departamento</a>
								</li>
								<li>
									<a href="../vista/vistaModificarDepartamento.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar departamento</a>
								</li>
								<li>
									<a href="../vista/vistaConsultarDepartamento.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar departamento</a>
								</li>
							</ul>
						</li>
					
						<li id="correspondencia"  style="display: none">
						    <a href="#" class="nav-btn-submenu"><i class="fas fa-envelope-open-text fa-fw"></i> &nbsp; Envio Correspondencia <i class="fas fa-chevron-down"></i></a>
                        	<ul>
                            	<li>
                                	<a href="../vista/vistaEnvioCorrespondencia.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Enviar Correspondencia</a>
                            	</li>
                            	<li>
                                	<a href="../vista/vistaCorrespondenciaEnviada.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Enviada</a>
                            	</li>
                            	<li>
                               		<a href="../vista/vistaCorrespondenciaRecibida.php"><i class="fas fa-search fa-fw"></i> &nbsp; Recibida</a>
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
			<nav class="full-box navbar-info">
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
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; CONSULTAR PERSONA
				</h3>
				<p class="text-justify">
					Se podrán consultar los datos registrados en las personas existentes.
				</p>
			</div>
			
			<!-- Content -->
						
			<?php
				$rol = $_POST['rol'];

				include('../modelo/persona.php');
				include('../modelo/correo.php');
				include('../modelo/telefono.php');
				include_once ('../modelo/claseDepartamento.php');
				$p= new persona('','','','','','');
				$c= new correo('','','');
				$t= new telefono('','','');
				
				if($rol != 'Administrador'){
				$depa = $_POST['departamento'];
				$departamento=new departamento(null,$depa); //instanciamos
				$depconsulta=$departamento->consultarNombreDepartamento();
				$depid= $depconsulta['1'];
				}else{
					$depid = 0;
				}
			
				if($_POST['Cédula'] != "" && $p->valPer($_POST['Cédula'],$depid)==0){
					echo"
					<script type='text/javascript'>
					Swal.fire({
						title: '¡ERROR!',
						html: 'La cédula ingresada no esta registrada en el sistema',
						icon: 'error',
						confirmButtonText: 'VOLVER',
						allowOutsideClick: false,
						allowEscapeKey: false,
						allowEnterKey: false
					})
					.then(resultado => {
						if(resultado.value) {
							window.location.href='../vista/vistaConsultarPersona.php';
						}
					});
					
					</script>
					";
				}else{
					if($_POST['Cédula'] != "" && $_POST['optConPer']=="1"){
						$p->Listado($_POST['Cédula']);
						$t->listarTlfn($_POST['Cédula']);
						$c->listarCorreo($_POST['Cédula']);
					}
				}		
                
                
             
                
                if($_POST['Cargo'] != 0 && $_POST['optConPer']=="3"){
                    $p->ListadoCargo($_POST['Cargo'],$depid);
				}
				if($_POST['Departamento'] != 0 && $_POST['optConPer']=="2"){
                    $p->ListadoDep($_POST['Departamento']);
				}
				if($_POST['optConPer']=="4"){
                    $p->ListadoTodos($depid);
                }
                
        
            ?>
			   <!-- Content -->
			<div class="container-fluid">

				<div class="col-12">
                    <p class="text-center" style="margin-top: 40px;">
                    	<a href="../vista/vistaConsultarPersona.php">
                       		<button type="submit" class="btn btn-raised btn-info" name="consultarDepartamento" id="consultarDepartamento"><i class="fas fa-search" ></i> &nbsp; VOLVER</button>
                    	</a>

                    	<?php

                    	//HACEMOS ESTE CONDICIONAL para poder pasar por URL lo que queremos en el reporte

                    	if($_POST['Cédula'] != "" && $_POST['optConPer']=="1"){
							$codigo = $_POST['Cédula'];
							$opt =  $_POST['optConPer'];
							$per = $_SESSION['nombre_persona'];

							echo"<a href='./controladorReportesPersona.php?codigo=".$codigo.'&opt='.$opt.'&depid='.$depid.'&per='.$per."' target='_blank' rel='snoopener noreferrer'>
                       		<button type='submit' class='btn btn-raised btn-danger' name='reporteG' id='reporte'><i class='fas fa-file-invoice fa-fw' ></i> &nbsp; REPORTE</button>
							</a>";
						
						}else if($_POST['Departamento'] != 0 && $_POST['optConPer']=="2"){
							$codigo= $_POST['Departamento'];
							$opt =  $_POST['optConPer'];
							$per = $_SESSION['nombre_persona'];

							echo"<a href='./controladorReportesPersona.php?codigo=".$codigo.'&opt='.$opt.'&depid='.$depid.'&per='.$per."' target='_blank' rel='snoopener noreferrer'>
                       		<button type='submit' class='btn btn-raised btn-danger' name='reporteG' id='reporte'><i class='fas fa-file-invoice fa-fw' ></i> &nbsp; REPORTE</button>
                    		</a>";

					
						}else if($_POST['Cargo'] != 0 && $_POST['optConPer']=="3"){
							$codigo= $_POST['Cargo'];
							$opt =  $_POST['optConPer'];
							$per = $_SESSION['nombre_persona'];

							echo"<a href='./controladorReportesPersona.php?codigo=".$codigo.'&opt='.$opt.'&depid='.$depid.'&per='.$per."' target='_blank' rel='snoopener noreferrer'>
                       		<button type='submit' class='btn btn-raised btn-danger' name='reporteG' id='reporte'><i class='fas fa-file-invoice fa-fw' ></i> &nbsp; REPORTE</button>
                    		</a>";


						}else if($_POST['optConPer']=="4"){
							$opt =  $_POST['optConPer'];
							$per = $_SESSION['nombre_persona'];

							echo"<a href='./controladorReportesPersona.php?codigo&opt=".$opt.'&depid='.$depid.'&per='.$per."' target='_blank' rel='snoopener noreferrer'>
                       		<button type='submit' class='btn btn-raised btn-danger' name='reporteG' id='reporte'><i class='fas fa-file-invoice fa-fw' ></i> &nbsp; REPORTE</button>
                    		</a>";
						}

                    	?>

                    </p>
                </div>
					
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!-- validar menú dependiendo del rol--->
	<script src="../vista/js/validacionRol.js" ></script>

	<script src="../vista/js/main.js" ></script>


	
</body>
</html>