<?php

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
	<title>CREAR SOLICITUD DE REFRIGERIO</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./css/normalize.css">

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
                <i class="fas fa-plus fa-fw"></i> &nbsp; CREAR SOLICITUD DE REFRIGERIO
            </h3>
            <p class="text-justify">
                
            </p>
        </div>
        
        <!-- Content -->
        <div class="container-fluid">
            <form action="../controlador/controladorCrearRefrigerio.php" method="POST" class="form-neon" name="formCrearRefrigerio" id="formCrearRefrigerio">
            <input type="hidden" class="form-control" name="departamento" id="departamento"  maxlength="70" value="<?php echo $_SESSION['departamento_usuario']; ?>">

                <legend><i class="fas fa-store-alt fa-fw"></i> &nbsp; Información importante</legend>
                <p style="color : red"> CAMPOS OBLIGATORIOS (*)</p>
                    <div class="container-fluid">
                        <div class="row">
                            
                   

                          
                            <div class="col-12 col-md-11">
                                <div class="form-group">
                                    <label for="Nombre del curso o evento" class="bmd-label-floating">NOMBRE DEL CURSO O EVENTO</label>
                                    <input type="text" class="form-control" name="cursoevento" id="cursoevento"  maxlength="30"  onfocusout="validarCursoEvento()">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-1">
                       			 <div class="form-group">
									<p style="color : red">*</p>
                       		 	</div>
                   			 </div>
                <legend><i class="fas  fa-fw"></i> &nbsp; Evento o curso</legend>               
                         <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fecha" id="fecha">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="hora" id="hora">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugar" id="lugar">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantes" id="nparticipantes">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnecuno" style="display: shown">
                                <div class="form-group">
                                <button type="button" onclick="botonecuno()">Agregar evento o curso</button>
                                </div>
                            </div>
                           
                    <div class="container-fluid" id="ecdos" style="display: none">
                        <div class="row">
                             <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fechados" id="fechados">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="horados" id="horados">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugardos" id="lugardos">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantesdos" id="nparticipantesdos">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnecdos" style="display: shown">
                                <div class="form-group">
                                <button type="button" onclick="botonecdos()">Agregar evento o curso</button>
                                </div>
                            </div>
                       </div>
                     
                    </div>
                    <div class="container-fluid" id="ectres" style="display: none">
                        <div class="row">
                             <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fechatres" id="fechatres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="horatres" id="horatres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugartres" id="lugartres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantestres" id="nparticipantestres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnectres" style="display: shown">
                                <div class="form-group">
                                <button type="button" onclick="botonectres()">Agregar evento o curso</button>
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="container-fluid"  id="eccuatro" style="display: none">
                        <div class="row">
                             <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fechacuatro" id="fechacuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="horacuatro" id="horacuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugarcuatro" id="lugarcuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantescuatro" id="nparticipantescuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                       </div>
                    </div>

                 <legend><i class="fas  fa-fw"></i> &nbsp; Servicio solicitado</legend>               
                         <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposer" id="tiposer">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassug" id="npersonassug">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menu" id="menu">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenu" id="costomenu">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototal" id="costototal">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnssuno" style="display: shown">
                                <div class="form-group">
                                <button type="button" onclick="botonssuno()">Agregar servicio solicitado</button>
                                </div>
                            </div>
                <div class="container-fluid" id="ssdos" style="display: none">
                    <div class="row">
                        <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposerdos" id="tiposerdos">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassugdos" id="npersonassugdos">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menudos" id="menudos">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenudos" id="costomenudos">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototaldos" id="costototaldos">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnssdos" style="display: shown">
                                <div class="form-group">
                                <button type="button" onclick="botonssdos()">Agregar servicio solicitado</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="sstres" style="display: none">
                    <div class="row">
                        <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposertres" id="tiposertres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassugtres" id="npersonassugtres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menutres" id="menutres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenutres" id="costomenutres">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototaltres" id="costototaltres">
                                    <span class="helper-text"></span>
                                </div>
                              
                            </div>
                            <div class="col-12 col-md-3" id="btnsstres" style="display: shown">
                                <div class="form-group">
                                <button type="button" onclick="botonsstres()">Agregar servicio solicitado</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="sscuatro" style="display: none">
                    <div class="row">
                        <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposercuatro" id="tiposercuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassugcuatro" id="npersonassugcuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menucuatro" id="menucuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenucuatro" id="costomenucuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototalcuatro" id="costototalcuatro">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                </fieldset>
                <br><br><br>

                <p class="text-center" style="margin-top: 40px;">

                    <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>


                    <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save" name="crearDepartamento"></i> &nbsp; CREAR SOLICITUD DE REFRIGERIO</button>

                </p>

            </form>

        </div>

    </section>


</main>
	
	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->

	<!-- ESTA PARTE HACE EL MENÚ LATERAL FUNCIONE, TODAS JUNTAS, SI UNA SE BLOQUEA DEJA DE FUNCIONAR-->

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

    <!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="./js/validacionRol.js" ></script>

	<script src="./js/main.js" ></script>

    <script src="./js/vistaCrearRefrigerio.js"></script>

    <!-- enlace para las alertas personalizadas --->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>