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
	<title>CREAR PERSONA</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./css/normalize.css">

	<!-- para validaciones en tiempo real -->
	<link rel="stylesheet"href="./css/materialize.min.css"> 

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
	<link rel="stylesheet" href="./css/style.css">>


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
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; CREAR PERSONA
				</h3>
				<p class="text-justify">
					Se podrá crear un nuevo perfil de persona.
				</p>
			</div>
			
            <!-- Content -->
            <div class="container-fluid">
	<form action="../controlador/controladorCrearPersona.php" method="POST" class="form-neon" autocomplete="off" id="crearPersonaForm" novalidate>
	<input type="hidden" class="form-control" name="departamentoAuto"   maxlength="70" value="<?php echo $_SESSION['departamento_usuario']; ?>">
	<input type="hidden" class="form-control" name="rol" id="rol"   value="<?php echo $_SESSION['rol']; ?>">

            
				<legend><i class="fas fa-user-lock"></i> &nbsp; Datos Personales</legend>
				<p style="color : red"> CAMPOS OBLIGATORIOS (*)</p>
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="form-group">
							<label for="Nom" class="bmd-label-floating">Nombres </label>
							<input type="text" class="form-control" name="Nombres" id="Nombres" maxlength="35"  onfocusout="validateFirstName()">
							
							<span class="helper-text"></span>
							
                        </div>
					</div>
					<div class="col-12 col-md-1">
                        <div class="form-group">
						<p style="color : red">*</p>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="Ape" class="bmd-label-floating">Apellidos</label>
                            <input type="text" class="form-control" name="Apellidos" id="Apellidos" maxlength="35" onfocusout="validateLastName()">
							<span class="helper-text"></span>
                        </div>
					</div>
					<div class="col-12 col-md-1">
                        <div class="form-group">
						<p style="color : red">*</p>
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="Ced" class="bmd-label-floating">Cédula</label>
                            <input type="text" class="form-control" name="Cedula" id="Cedula" maxlength="35" onfocusout="validateCedula()">
							<span class="helper-text"></span>
                        </div>
					</div>
					<div class="col-12 col-md-1">
                        <div class="form-group">
						<p style="color : red">*</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="Dir" class="bmd-label-floating">Dirección</label>
                            <input type="text" class="form-control" name="Direccion" id="Direccion"maxlength="70" onfocusout="validateDir()">
							<span class="helper-text"></span>
                        </div>
					</div>
					<div class="col-12 col-md-1">
                        <div class="form-group">
						<p style="color : red">*</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-11">
						<select class="form-control" name="Cargo" id="Cargo"  onfocusout="validateCargo()">
								<option value="0" selected="true">Seleccione un cargo</option>
								<option value="1">PERSONAL ADMINISTRATIVO</option>
								<option value="2">PERSONAL DOCENTE</option>
								<option value="3">PERSONAL OBRERO</option>
								<option value="4">BECARIO</option>
							</select>
							<span class="helper-text"  id="CargoS"></span>
                     </div>
					 <div class="col-12 col-md-1">
                        <div class="form-group">
						<p style="color : red">*</p>
                        </div>
                    </div>
                 
				</div>
				<?php
					 if($_SESSION['rol']== 'Administrador'){
						require_once ('../modelo/claseDepartamento.php');
						$departamento = new departamento();
						echo '   <div class="row">
									<div class="col-12 col-md-11">
										<select class="form-control" name="Departamento" id="Departamento"  onfocusout="validateDepartamento()">
										<option value="0" selected="true">Seleccione un departamento</option>';
									$result=$departamento->consultarDepartamento();
									while($row=pg_fetch_array($result)){
									echo "<option value=".$row['idd'].">".$row["nombred"]."</option>";
						
						}
						echo '	</select>
						<span class="helper-text"  id="DepaS"></span>
				 </div>	
				 <div class="col-12 col-md-1">
				 <div class="form-group">
				 <p style="color : red">*</p>
				 </div>
			 </div>
			 </div>';
					 } 
					 ?>
				<br>
                    <legend><i class="fas fa-user-lock"></i> &nbsp; Datos de Contacto</legend>
                <div class="row">	
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="Cor" class="bmd-label-floating">Correo</label>
                            <input type="text" class="form-control" name="Correo" id="Correo" maxlength="35" onfocusout="validateEmail()">
							<span class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="Tel" class="bmd-label-floating">Teléfono</label>
                            <input type="text" class="form-control" name="Telefono" id="Telefono" maxlength="35" onfocusout="validateTel()">
							<span class="helper-text"></span>
                        </div>
						
                    </div>     
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <select class="form-control" name="TipoCorreo" id="Tipo Correo" onfocusout="validateEmail()">
                            <option value="0" selected="">Tipo Correo</option>
                            <option value="1">Personal</option>
                            <option value="2">Institucional</option>
                        </select>
						<span class="helper-text" id="TipoCS"></span>
                    </div>
                        
                    
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="TipoTelefono" id="Tipo Telefono" onfocusout="validateTel()">
                                <option value="0" selected="">Tipo telefono</option>
                                <option value="1">Celular</option>
                                <option value="2">Local</option>
                            </select>
							<span class="helper-text" id="TipoTS"></span>
                        </div>
                </div>
                <div class="row">	
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="Cor2" class="bmd-label-floating">Correo 2</label>
                            <input type="text" class="form-control" name="Correo2" id="Correo 2" maxlength="35" onfocusout="validateEmail2()">
							<span class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="Tel2" class="bmd-label-floating">Teléfono 2</label>
                            <input type="text" class="form-control" name="Telefono2" id="Telefono 2" maxlength="35" onfocusout="validateTel2()">
							<span class="helper-text"></span>
                        </div>
						
                    </div>     
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <select class="form-control" name="TipoCorreo2" id="Tipo Correo 2" onfocusout="validateEmail2()">
                            <option value="0" selected="" >Tipo Correo 2</option>
                            <option value="1">Personal</option>
                            <option value="2">Institucional</option>
                        </select>
						<span class="helper-text" id="TipoCS2"></span>
                    </div>
                        
                    
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="TipoTelefono2" id="Tipo Telefono 2" onfocusout="validateTel2()">
                                <option value="0" selected="" >Tipo telefono 2</option>
                                <option value="1">Celular</option>
                                <option value="2">Local</option>
                            </select>
							<span class="helper-text" id="TipoTS2"></span>
                        </div>
                </div>
    
    
        
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; CREAR PERSONA</button>
        </p>
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
 
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="./js/vistaCrearPersona.js">
	</script>
  
	
</body>
</html>