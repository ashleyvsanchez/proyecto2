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
<!-- INCLUIMOS LA EL MODELO -->
<?php require_once('../modelo/claseMemo.php'); ?>
<?php require_once('../modelo/claseDepartamento.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>MODIFICAR MEMO</title>

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

	<!-- PARA EL TEXT AREA-->
	<script src="../vista/ckeditor/ckeditor.js" ></script>



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


		<!-- Page content --> <!-- NO SE QUE HACE ESTA SECCION-->
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; MODIFICAR MEMO
				</h3>
				<p class="text-justify">
					Permite modificar los datos del memo solicitado.
				</p>
			</div>

			<!-- MOSTRAR VISTA DEL PDF ANTES DE MODIFICAR -->

			<!-- Content -->
			<div class="container-fluid">
				<div class="container-fluid">
					<div class="col-12">
						<p class="text-center" style="margin-top: 40px;">

							<?php

							if(isset($_POST['modificar'])){

								
								$id = $_POST['correlativo']; //correlativo del ID
								$de = $_POST['de'];

								//echo "<br> ID: " . $id;
								//echo "<br>de en letras: ".$de;
								

								//-------CONSULTAMOS EL ID

						
								$memo= new memo(null,null,null,null,null,null,$id,null,null,null,$de); // instanciamos

								$result=$memo->consultarIdMemo(); // hacemos el llamado al método

								$row = pg_fetch_array($result);

								if($row==false){
									//echo "<br>no se encontro el ID";
									echo"
										<script>
											Swal.fire({
       											title: 'ERROR',
        										html: 'No se encontro el'+'<b> ID </b>ingresado o no se genero en este departamento.',
        										icon: 'error',
        										showCancelButton: false,
        										confirmButtonText: 'CONSULTAR',
       											cancelButtonText: 'INICIO',
       											position: 'center',
												allowOutsideClick: false,
												allowEscapeKey: false,
												allowEnterKey: false
    										})
    										.then(resultado => {
        										if (resultado.value) {
        											window.location.href='../vista/vistaConsultarMemo.php';
        										}
    										});

    									</script>";
										
								}else{
									echo"<td aling='center' width=100> <a href='./controladorReportesMemo.php?codigo=".$row["idmemo"].'&opt='.$de."' target='_blank' rel='snoopener noreferrer'>
                       				<button type='submit' class='btn btn-raised btn-danger' name='reporteG' id='reporte'><i class='fas fa-file-invoice fa-fw' ></i> &nbsp; REPORTE</button>
                    				</a> </td>";
								}
								
								?>

								
								<!-- MOSTRAR CAMPOS RELLENOS CON LA INFORMACION QUE SE PUEDE MODIFICAR-->

								
									<form action="../controlador/controladorModificarMemo.php" method="POST" class="form-neon" name="controladorModificarMemo" id="formMemo">
										<legend><i class="fas fa-store-alt fa-fw"></i> &nbsp; Modificar Memo </legend>
										<p style="color: red"> CAMPOS OBLIGATORIOS (*) </p>
										<h6><?php echo "$row[0]"; ?></h6>
										<h7><?php echo "Fecha: "."$row[3]"; ?></h7><br>
										<h7><?php echo "De: ".$_SESSION['departamento_usuario']; ?></h7><br><br>
										<div class="container-fluid">
											<div class="row">
		   
												<input type="hidden" class="form-control" name="idMemo" id="idMemo" value="<?php echo $row[0]; ?>">

												<div class="col-12 col-md-5">
													<div class="form-group">

														<?php
															 $departamento = new departamento();
															 $result=$departamento->consultarDepartamento();
														?>
															 <select class="form-control" id="para" name="para">
															 	<?php echo "<option value=".$row['de'].">".$row[1]."</option>"; ?>
															<!--<option value="1"> Administración </option>-->
																<?php
																	while($row1=pg_fetch_array($result)){
																		if($row[1] != $row1["nombred"]){
																			echo "<option value=".$row1['idd'].">".$row1["nombred"]."</option>";
																		}
																		
																	}
																?>   
															</select>
                                    						<span class="helper-text" id="paraS"></span>
														</div>
												</div>

												<div class="col-12 col-md-1">
													<div class="form-group">
														<p style="color: red">*</p>
													</div>
												</div>

													<input type="hidden" class="form-control" name="de" id="de"  maxlength="70" value="<?php echo $de; ?>">

													<input type="hidden" class="form-control" name="fecha" id="fecha" value="<?php echo $row[3]; ?>">

													<div class="col-12 col-md-5">
														<div class="form-group">
															<label for="asunto" class="bmd-label-floating">asunto</label>
															<input type="text" class="form-control" name="asunto" id="asunto"  maxlength="70" value="<?php echo $row[2]; ?>" onfocusout="validarAsunto()">
															<span class="helper-text"></span>
														</div>
													</div>

													<div class="col-12 col-md-1">
														<div class="form-group">
															<p style="color: red">*</p>
														</div>
													</div>

													

													<div class="col-12 col-md-6">
                                						<div class="form-group">
															<textarea name="descripción" id="editor1" rows="10" cols="80">
															<?php echo $row[5]; ?>
            													</textarea>
                                    								<span class="helper-text"></span>
                              									 </div>
                     								 </div>

													<div class="col-12 col-md-1">
													<div class="form-group">
														<p style="color: red">*</p>
													</div>
								</div>


													<input type="hidden" name="Enviar" value="Enviar" id="Envio">


										</div>
										</fieldset>
										<br><br><br>

										<p class="text-center" style="margin-top: 40px;">

											<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>


											<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save" name="crearDepartamento"></i> &nbsp; MODIFICAR MEMO</button>
										</p>

									</form>
								
								
							<?php
							

							}
														
							?>
							
						</p>
					</div>
				</div>
				
			</div>


			
				

		
		<?php

        //--------Consultamos el memo--------//
			
				
				if(isset($_POST['Enviar'])){ // verificamos el formulario por el input escondido
					// verificamos que los campos no esten vacios 
					if(($_POST['para'] != "") && ($_POST['asunto'] != "")&&  ($_POST['idMemo'] != "") && ($_POST['fecha'] != "")){
					
						//GUARDAMOS
						$para = $_POST['para']; //convertimos en mayusculas
						$de = $_POST['de'];

						//echo "para: " . $para . "<br>";
						//echo $de . "<br>" ;

						//BUSCAMOS EL NUMERO DEL DOCUMENTO 

						$memo= new memo(null,null,null,null,null,null,$_POST['idMemo'],null,null,null,$de); // instanciamos

						$result = $memo->consultarIdMemo(); // hacemos el llamado al método

						$row1 = pg_fetch_array($result);
						//echo "<br>id documento: " . $row[7];

						//HACEMOS LA MODIFICACION 
						$memo= new memo($row1[7],$_POST['fecha'],null,null,null,null,$_POST['idMemo'],$para,$_POST['asunto'],$_POST['descripción'],$de); // instanciamos
						$result=$memo->modificarMemo(); // hacemos el llamado al método

						//echo "<br>el id del documento es: " . $result[7];
    					
    						if($result == true){
    							//echo "modificacion exitosa";
    								echo"
                   					<script>
                        				Swal.fire({
                            				title: 'MODIFICACIÓN EXITOSA',
                            				icon: 'info',
                            				showCancelButton: false,
                           					confirmButtonText: 'ACEPTAR',
                            				cancelButtonText: 'INICIO',
                            				position: 'center',
                            				allowOutsideClick: false,
                            				allowEscapeKey: false,
                            				allowEnterKey: false
                        				})
                            			.then(resultado => {
                            				if (resultado.value) {
                               	 				window.location.href='../vista/vistaConsultarMemo.php';
                            				}
                        				});

                    				</script>";

    						}else{
								//echo "<br><br> se produjo un error al modificar";
								echo "
           							<script>
                						Swal.fire({
                   							title: 'ERROR',
                    						html: '<b>se produjo un error</b>.',
                    						icon: 'error',
                    						showCancelButton: false,
                    						confirmButtonText: 'ACEPTAR',
                    						cancelButtonText: 'INICIO',
                    						position: 'center',
                    						allowOutsideClick: false,
                    						allowEscapeKey: false,
                    						allowEnterKey: false
                						})
                    					.then(resultado => {
                        					if (resultado.value) {
                             					window.location.href='../vista/vistaModificarMemo.php';
                            				}
                    					});

            						</script>";
							}

					}

				}
			
	
		?>


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

	<!-- validar menú dependiendo del rol--->
	<script src="../vista/js/validacionRol.js" ></script>

	<script src="../vista/js/main.js" ></script>

	<!--validaciones en tiempo real-->
	<script src="../vista/js/validacionModificarMemo.js"></script>

	<script>
	// Replace the <textarea id="editor1"> with a CKEditor 4
	// instance, using default configuration.
	CKEDITOR.replace( 'editor1' );
	</script>

</body>
</html>