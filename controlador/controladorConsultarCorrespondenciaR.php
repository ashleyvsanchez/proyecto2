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
	<title>CORRESPONDENCIA RECIBIDA</title>

<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="../vista/css/normalize.css">

	<!-- para validaciones en tiempo real -->
	<!--<link rel="stylesheet"href="../vista/css/materialize.min.css">-->

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
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de Solicitudes <i class="fas fa-chevron-down"></i></a>
							<ul>
								
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
											<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Solicitud</a>
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
											<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar Solicitud</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>


						<li id="memo"  style = "display: none" >
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Gestión de memos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../vista/vistaCrearMemo.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Crear memo</a>
								</li>
								<li>
									<a href="../vista/vistaModificarMemo.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Modificar memo</a>
								</li>
								<li>
									<a href="../vista/vistaCosultatMemo.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar memo</a>
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
									<a href="../vista/vistaConsultarDepartamento.php"><i class="fas fa-search fa-fw"></i> &nbsp; Consultar departamento</a>
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
				    <i class="fas fa-search fa-fw"></i> &nbsp; BANDEJA DE CORRESPONDENCIA
			    </h3>
			    <p class="text-justify">
				    SE PODRÁ VISUALIZAR LA CORRESPONDENCIA RECIBIDA
			    </p>
		    </div>


			<!--CONTROLADOR DE CONRRESPONDENCIA-->

			<div class="container-fluid">

			<?php

				

				//INCLUIMOS A LA CLASE CORRESPONDENCIA
				require_once('../modelo/claseCorrespondencia.php');
				require_once('../modelo/claseDocumento.php');
				require_once('../modelo/claseMemo.php');
				require_once('../modelo/claseServicio.php');
                require_once('../modelo/claseRefrigerio.php');
                require_once('../modelo/claseDepartamento.php');
			

				if(($_POST['fecha'] !='') && ($_POST['optFiltro'] == 1))
    			{
    				

					$fecha = $_POST['fecha'];
					//echo "<br> fecha: ". $fecha;

					$correspondencia = new correspondencia('','',$_SESSION['departamento_usuario'],'',$fecha,'','',''); //instanciamos
					$resultado=$correspondencia ->consultaFechaRecibido(); //llamamos al metodo


    			}else if(($_POST['asunto'] !='') && ($_POST['optFiltro'] == 2))
    			{
    
					$asunto = $_POST['asunto'];
					//echo "<br> asunto: ".$asunto;

					$correspondencia = new correspondencia('','',$_SESSION['departamento_usuario'],'','',$asunto,'',''); //instanciamos
					$resultado=$correspondencia ->consultarAsuntoRecibido(); //llamamos al metodo


    			}else {
    				//CONSULTAMOS SI EL DEPARTAMENTO AL QUE SE QUIERE CONSULTAR EXISTE EXISTE
					
					$emisor = strtoupper($_POST['departamento']);
				
					$departamento= new departamento(null,$emisor); //instanciamos un objeto de la clase
					$row=$departamento->consultarNombreDepartamento(); // hacemos el llamado al método

					if($row == true){

						$correspondencia = new correspondencia('',$emisor,$_SESSION['departamento_usuario'],'','','','',''); //instanciamos
						$resultado = $correspondencia ->consultarEmisor(); //llamamos al metodo

					}else{
						?>
						
							<script>
								Swal.fire({
       								title: 'ERROR',
        							html: 'No se encontro el'+'<b> DEPARTAMENTO </b>ingresado.',
        							icon: 'error',
        							showCancelButton: false,
        							confirmButtonText: 'CONSULTAR MEMO',
       								cancelButtonText: 'INICIO',
       								position: 'center',
									allowOutsideClick: false,
									allowEscapeKey: false,
									allowEnterKey: false
    							})
    						.then(resultado => {
        						if (resultado.value) {
        							window.location.href='../vista/vistaCorrespondenciaRecibida.php';
        						}
    						});

    						</script>
						<?php
					}
    				

    			}
    			//-----------EVALUAMOS EL $resul


				if(pg_num_rows($resultado)>0){
            		?>
           				<div class='container-fluid'><table border='1' class='table table-dark table-sm'><thead>
                            <tr class='text-center roboto-medium'>
                            <td align='center' width=400><h5>De</h5></td>
                            <td align='center' width=400><h5>Asunto</h5></td>
                            <td align='center' width=400><h5>Mensaje</h5></td>
                            <td align='center' width=400><h5>Fecha Envio</h5></td>
                            <td align='center' width=400><h5>Hora Envio</h5></td>
                            <td align='center' width=400><h5>Estatus</h5></td>
                            <td align='center' width=400><h5>Tipo Documento</h5></td>
                            <td align='center' width=400><h5>Reporte</h5></td>
                            </thead> 
                            <?php
                            while ($row_correspondencia=pg_fetch_array($resultado))
                            {
								$m = new memo($row_correspondencia['iddoc']);
								$s = new servicio($row_correspondencia['iddoc']);
								$r = new refrigerio($row_correspondencia['iddoc']);

								
								
							?>	
								
                                <tr>
								<?php if($_SESSION['departamento_usuario']==$row_correspondencia[0]){?>
                            	<td align='center' width=400><h6>Mismo Departamento</h6></td>
								<td align='center' width=400><h6><?php echo $row_correspondencia[1];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[2];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[3];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[4];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[6];?></h6></td>
								
								<?php 
									}
									else{
						    	?>
								<td align='center' width=400><h6><?php echo $row_correspondencia[0];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[1];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[2];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[3];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[4];?></h6></td>
                                <td align='center' width=400><h6><?php echo $row_correspondencia[6];?></h6></td>
								
								<!-- Abrimos php para diferenciar si el documento es MEMO -->
								<?php 
									}
							    //Validamos si el id del documento es igual al de la tabla Memo
								if($memo = $m->validarMemo()){

									//$row_memo = tipo de documento
									//$row_memo = idMemo
									
									$datos_memo = $m->consultarIdDocumentoMemo();
									$row_memo=pg_fetch_array($datos_memo);


										//Boton que envia por GET el Id del memo al controladorReporteMemo 
										echo "<td align='center' width=400><h6>".$row_memo['nombretipo']."</h6></td>";
										echo"<td align='center' width=100> <a href='../controlador/controladorReportesMemo.php?codigo=".$row_memo["idmemo"]."' target='_blank' rel='noopener noreferrer'>
										<button type='submit' class='btn btn-raised btn-danger' name='reporteID' id='reporte'></i> &nbsp; REPORTE</button>
										 </a> </td>"; 
										
									}
									//Validamos si el id del documento es igual al de la tabla Servicio
									else if($servicio= $s->validarServicio()){

										$datos_servicio = $s->consultarIdDocumentoServicio();
										$row_servicio=pg_fetch_array($datos_servicio);

										//Boton que envia por GET el Id del servicio al controladorReporteServicio 
										echo "<td align='center' width=400><h6>".$row_servicio['nombretipo']."</h6></td>";
										echo"<td align='center' width=100> <a href='../controlador/controladorReportesServicio.php?codigo=".$row_servicio["nos"]."' target='_blank' rel='noopener noreferrer'>
										<button type='submit' class='btn btn-raised btn-danger' name='reporteID' id='reporte'></i> &nbsp; REPORTE</button>
										 </a> </td>";
                        
	
									}

									//Si el id del documento es igual al de la tabla Refrigerio
									else {

										$datos_refrigerio = $r->consultarIdDocumentoRefrigerio();
										$row_refrigerio=pg_fetch_array($datos_refrigerio);

										
										//Boton que envia por GET el Id del memo al controladorReporteMemo 
										echo "<td align='center' width=400><h6>".$row_refrigerio['nombretipo']."</h6></td>";
										echo"<td align='center' width=100> <a href='../controlador/controladorReportesRefrigerio.php?codigo=".$row_refrigerio["idr"]."' target='_blank' rel='noopener noreferrer'>
										<button type='submit' class='btn btn-raised btn-danger' name='reporteID' id='reporte'></i> &nbsp; REPORTE</button>
										 </a> </td>";
								
                            		
								}
                            } // cierre while
                            pg_free_result($resultado);
                            ?>
                            </table></div>
                <?php
            		}else{
				?>
						<script>
							Swal.fire({
								title: 'ERROR',
								html: '<b>NO SE ENCONTRO EL DATO INGRESADO<b>', 
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
        						window.location.href='../vista/vistaCorrespondenciaRecibida.php';
        					}
    					});

    					</script>
					<?php
				}
            
				?>

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

	<!-- validar menú dependiendo del rol--->
	<script src="../vista/js/validacionRol.js" ></script>

	<script src="../vista/js/main.js" ></script>

	<!-- validaciones en tiempo real --->
	<!--<script src="../js/validacionConsultarDepartamento.js"></script>-->

	
	
</body>
</html>