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
	<title>MODIFICAR SOLICITUD DE REFRIGERIO</title>

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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; MODIFICAR SOLICITUD DE REFRIGERIO
				</h3>
				<p class="text-justify">
					Permite modificar los datos de la solicitud de refrigerio deseada.
				</p>
			</div>

			<!-- MOSTRAR VISTA DEL PDF ANTES DE MODIFICAR -->

			<!-- Content -->
			<div class="container-fluid">
				<div class="container-fluid">
					<div class="col-12">
						<p class="text-center" style="margin-top: 40px;">
                            <?php
                            include_once ('../modelo/claseDepartamento.php');
							$depa = $_POST['departamento'];
							$departamento=new departamento(null,$depa); //instanciamos
							$depconsulta=$departamento->consultarNombreDepartamento();
							$depid= $depconsulta['1'];

								$IDR = $_POST['ID'];
								echo "
								<a href='../controlador/controladorReportesRefrigerio.php?codigo=".$IDR."&depid=".$depid."' target='_blank' rel='noopener noreferrer'>
               						<button type='submit' class='btn btn-raised btn-danger' name='reporteID' id='reporte'></i> &nbsp; VISTA PREVIA</button>
                				</a>
								";
							?>
							
						</p>
					</div>
				</div>
				
			</div>

			<!-- MOSTRAR CAMPOS RELLENOS CON LA INFORMACION QUE SE PUEDE MODIFICAR-->

      <!-- Content -->
        <div class="container-fluid">
            <form action="../controlador/controladorModificacionRefrigerio.php" method="POST" class="form-neon" name="formModificarRefrigerio" id="formModificarRefrigerio">

            	 <?php

                    require_once ('../modelo/claseRefrigerio.php');
                    require_once('../modelo/claseEventoCurso.php'); 
                    require_once('../modelo/claseServicioSolicitado.php'); 
                    include_once ('../modelo/claseDepartamento.php');


                    $depa = $_POST['departamento'];
                    $departamento=new departamento(null,$depa); //instanciamos
                    $depconsulta=$departamento->consultarNombreDepartamento();
                    $depid= $depconsulta['1'];
                    
                    $refrigerio= new refrigerio(null,null,null,null,null,null,$IDR,null,null); // instanciamos
					
					$result=$refrigerio->consultarIdRefrigerio($depid); // hacemos el llamado al método
                        $row=pg_fetch_array($result);

                        if(pg_num_rows($result)==0){
                            echo"
                            <script type='text/javascript'>
                            Swal.fire({
                            title: '¡NO HAY DATOS QUE COINCIDAN CON ESTE ID!',
                            html: 'Intente con otro ID',
                            icon: 'error',
                            confirmButtonText: 'VOLVER',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false
                            })
                            .then(resultado => {
                            if(resultado.value) {
                            window.location.href='../vista/vistaModificarRefrigerio.php';
                            }
                            });
                
                            </script>
                            ";
                            exit();
                            }
                       
                        $eventocurso = new eventocurso(null, null, null,null, null);
                        $eventocursoresult = $eventocurso->ConsultarEventoCurso($IDR);

                        $serviciosolicitado = new serviciosolicitado(null, null, null,null, null, null);
                        $serviciosolicitadoresult = $serviciosolicitado->ConsultarServicioSolicitado($IDR);

                        switch (pg_num_rows($eventocursoresult)) {
                            case 0:
                               $eventocursouno = "";
                               $fechauno = "";
                               $horauno = "";
                               $lugaruno ="";
                               $participantesuno= "";
                               $ideventocursouno ="";
                    
                               $eventocursodos = "";
                               $ecdos = "display: none";
                               $fechados = "";
                               $horados = "";
                               $lugardos ="";
                               $participantesdos= "";
                               $ideventocursodos ="";
                    
                               $eventocursotres = "";
                               $ectres = "display: none";
                               $fechatres = "";
                               $horatres = "";
                               $lugartres ="";
                               $participantestres= "";
                               $ideventocursotres ="";
                    
                               $eventocursocuatro= "";
                               $eccuatro = "display: none";
                               $fechacuatro = "";
                               $horacuatro = "";
                               $lugarcuatro ="";
                               $participantescuatro= "";
                               $ideventocursocuatro ="";

                               $btnuno = "display: shown";
                               $btndos = "display: none";
                               $btntres = "display: none";
                                break;
                            case 1:
                                $eventocursouno = pg_fetch_array($eventocursoresult,0);
                                $fechauno = $eventocursouno['fecha'];
                                $horauno = $eventocursouno['hora'];
                                $lugaruno =$eventocursouno['lugar'];
                                $participantesuno= $eventocursouno['participantes'];
                                $ideventocursouno =$eventocursouno['ideventocurso'];

                                $eventocursodos = "";
                                $ecdos = "display: none";
                                $fechados = "";
                                $horados = "";
                                $lugardos ="";
                                $participantesdos= "";
                                $ideventocursodos ="";
                    
                                $eventocursotres = "";
                                $ectres = "display: none";
                                $fechatres = "";
                                $horatres = "";
                                $lugartres ="";
                                $participantestres= "";
                                $ideventocursotres ="";
                     
                    
                                $eventocursocuatro= "";
                                $eccuatro = "display: none";
                                $fechacuatro = "";
                                $horacuatro = "";
                                $lugarcuatro ="";
                                $participantescuatro= "";
                                $ideventocursocuatro ="";

                                $btnuno = "display: shown";
                                $btndos = "display: none";
                                $btntres = "display: none";
                                break;
                            case 2:
                                $eventocursouno = pg_fetch_array($eventocursoresult,0);
                                $fechauno = $eventocursouno['fecha'];
                                $horauno = $eventocursouno['hora'];
                                $lugaruno =$eventocursouno['lugar'];
                                $participantesuno= $eventocursouno['participantes'];
                                $ideventocursouno =$eventocursouno['ideventocurso'];

                                $eventocursodos = pg_fetch_array($eventocursoresult,1);
                                $ecdos = "display: shown";
                                $fechados = $eventocursodos['fecha'];
                                $horados = $eventocursodos['hora'];
                                $lugardos =$eventocursodos['lugar'];
                                $participantesdos= $eventocursodos['participantes'];
                                $ideventocursodos =$eventocursodos['ideventocurso'];
                     
                                $eventocursotres = "";
                                $ectres = "display: none";
                                $fechatres = "";
                                $horatres = "";
                                $lugartres ="";
                                $participantestres= "";
                                $ideventocursotres ="";
                    
                    
                                $eventocursocuatro= "";
                                $eccuatro = "display: none";
                                $fechacuatro = "";
                                $horacuatro = "";
                                $lugarcuatro ="";
                                $participantescuatro= "";
                                $ideventocursocuatro ="";
                                
                                $btnuno = "display: none";
                                $btndos = "display: shown";
                                $btntres = "display: none";
                                break;
                            case 3:
                                $eventocursouno = pg_fetch_array($eventocursoresult,0);
                                $fechauno = $eventocursouno['fecha'];
                                $horauno = $eventocursouno['hora'];
                                $lugaruno =$eventocursouno['lugar'];
                                $participantesuno= $eventocursouno['participantes'];
                                $ideventocursouno =$eventocursouno['ideventocurso'];
                     
                                $eventocursodos = pg_fetch_array($eventocursoresult,1);
                                $ecdos = "display: shown";
                                $fechados = $eventocursodos['fecha'];
                                $horados = $eventocursodos['hora'];
                                $lugardos =$eventocursodos['lugar'];
                                $participantesdos= $eventocursodos['participantes'];
                                $ideventocursodos =$eventocursodos['ideventocurso'];
                     
                     
                                $eventocursotres = pg_fetch_array($eventocursoresult,2);
                                $ectres = "display: shown";
                                $fechatres = $eventocursotres['fecha'];
                                $horatres = $eventocursotres['hora'];
                                $lugartres =$eventocursotres['lugar'];
                                $participantestres= $eventocursotres['participantes'];
                                $ideventocursotres =$eventocursotres['ideventocurso'];
                    
                                $eventocursocuatro= "";
                                $eccuatro = "display: none";
                                $fechacuatro = "";
                                $horacuatro = "";
                                $lugarcuatro ="";
                                $participantescuatro= "";
                                $ideventocursocuatro ="";

                                $btnuno = "display: none";
                                $btndos = "display: none";
                                $btntres = "display: shown";
                                break;
                             case 4:
                                $eventocursouno = pg_fetch_array($eventocursoresult,0);
                                $fechauno = $eventocursouno['fecha'];
                                $horauno = $eventocursouno['hora'];
                                $lugaruno =$eventocursouno['lugar'];
                                $participantesuno= $eventocursouno['participantes'];
                                $ideventocursouno =$eventocursouno['ideventocurso'];
                    
                                $eventocursodos = pg_fetch_array($eventocursoresult,1);
                                $ecdos = "display: shown";
                                $fechados = $eventocursodos['fecha'];
                                $horados = $eventocursodos['hora'];
                                $lugardos =$eventocursodos['lugar'];
                                $participantesdos= $eventocursodos['participantes'];
                                $ideventocursodos =$eventocursodos['ideventocurso'];
                     
                     
                                $eventocursotres = pg_fetch_array($eventocursoresult,2);
                                $ectres = "display: shown";
                                $fechatres = $eventocursotres['fecha'];
                                $horatres = $eventocursotres['hora'];
                                $lugartres =$eventocursotres['lugar'];
                                $participantestres= $eventocursotres['participantes'];
                                $ideventocursotres =$eventocursotres['ideventocurso'];
                    
                                $eventocursocuatro= pg_fetch_array($eventocursoresult,3);
                                $eccuatro = "display: shown";
                                $fechacuatro = $eventocursocuatro['fecha'];
                                $horacuatro = $eventocursocuatro['hora'];
                                $lugarcuatro =$eventocursocuatro['lugar'];
                                $participantescuatro= $eventocursocuatro['participantes'];
                                $ideventocursocuatro =$eventocursocuatro['ideventocurso'];;

                                $btnuno = "display: none";
                                $btndos = "display: none";
                                $btntres = "display: none";
                                
                                break;
                        }

                        switch (pg_num_rows($serviciosolicitadoresult)) {
                            case 0:
                                $serviciosolicitadouno = "";
                                $tiposerviciouno = "";
                                $personassugeridasuno ="";
                                $menuuno ="";
                                $costomenuuno="";
                                $costototaluno="";
                                $idserviciosolicitadouno ="";
                    
                                $serviciosolicitadodos = "";
                                $ssdos = "display: none";
                                $tiposerviciodos = "";
                                $personassugeridasdos ="";
                                $menudos ="";
                                $costomenudos="";
                                $costototaldos="";
                                $idserviciosolicitadodos ="";
                    
                                $serviciosolicitadotres = "";
                                $sstres = "display: none";
                                $tiposerviciotres = "";
                                $personassugeridastres ="";
                                $menutres ="";
                                $costomenutres="";
                                $costototaltres="";
                                $idserviciosolicitadotres ="";
                    
                                $serviciosolicitadocuatro = "";
                                $sscuatro = "display: none";
                                $tiposerviciocuatro = "";
                                $personassugeridascuatro ="";
                                $menucuatro ="";
                                $costomenucuatro="";
                                $costototalcuatro="";
                                $idserviciosolicitadocuatro ="";

                                $btnsuno = "display: shown";
                                $btnsdos = "display: none";
                                $btnstres = "display: none";
                                break;
                            case 1:
                                $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);;
                                $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
                                $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
                                $menuuno =$serviciosolicitadouno['menu'];
                                $costomenuuno=$serviciosolicitadouno['costomenu'];
                                $costototaluno=$serviciosolicitadouno['costototal'];
                                $idserviciosolicitadouno =$serviciosolicitadouno['idserviciosolicitado'];
                    
                                $serviciosolicitadodos = "";
                                $ssdos = "display: none";
                                $tiposerviciodos = "";
                                $personassugeridasdos ="";
                                $menudos ="";
                                $costomenudos="";
                                $costototaldos="";
                                $idserviciosolicitadodos ="";
                    
                                $serviciosolicitadotres = "";
                                $sstres = "display: none";
                                $tiposerviciotres = "";
                                $personassugeridastres ="";
                                $menutres ="";
                                $costomenutres="";
                                $costototaltres="";
                                $idserviciosolicitadotres ="";
                    
                                $serviciosolicitadocuatro = "";
                                $sscuatro = "display: none";
                                $tiposerviciocuatro = "";
                                $personassugeridascuatro ="";
                                $menucuatro ="";
                                $costomenucuatro="";
                                $costototalcuatro="";
                                $idserviciosolicitadocuatro ="";
                                
                                $btnsuno = "display: shown";
                                $btnsdos = "display: none";
                                $btnstres = "display: none";
                                
                                break;
                            case 2:
                                $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);
                                $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
                                $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
                                $menuuno =$serviciosolicitadouno['menu'];
                                $costomenuuno=$serviciosolicitadouno['costomenu'];
                                $costototaluno=$serviciosolicitadouno['costototal'];
                                $idserviciosolicitadouno =$serviciosolicitadouno['idserviciosolicitado'];
                    
                                $serviciosolicitadodos=pg_fetch_array($serviciosolicitadoresult,1);
                                $ssdos = "display: shown";
                                $tiposerviciodos = $serviciosolicitadodos['tiposervicio'];
                                $personassugeridasdos =$serviciosolicitadodos['personassugeridas'];
                                $menudos =$serviciosolicitadodos['menu'];
                                $costomenudos=$serviciosolicitadodos['costomenu'];
                                $costototaldos=$serviciosolicitadodos['costototal'];
                                $idserviciosolicitadodos =$serviciosolicitadodos['idserviciosolicitado'];
                    
                                $serviciosolicitadotres = "";
                                $sstres = "display: none";
                                $tiposerviciotres = "";
                                $personassugeridastres ="";
                                $menutres ="";
                                $costomenutres="";
                                $costototaltres="";
                                $idserviciosolicitadotres ="";
                    
                                $serviciosolicitadocuatro = "";
                                $sscuatro = "display: none";
                                $tiposerviciocuatro = "";
                                $personassugeridascuatro ="";
                                $menucuatro ="";
                                $costomenucuatro="";
                                $costototalcuatro="";
                                $idserviciosolicitadocuatro ="";
                                
                                $btnsuno = "display: none";
                                $btnsdos = "display: shown";
                                $btnstres = "display: none";
                                
                                break;
                            case 3:
                                $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);
                                $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
                                $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
                                $menuuno =$serviciosolicitadouno['menu'];
                                $costomenuuno=$serviciosolicitadouno['costomenu'];
                                $costototaluno=$serviciosolicitadouno['costototal'];
                                $idserviciosolicitadouno =$serviciosolicitadouno['idserviciosolicitado'];
                    
                                $serviciosolicitadodos=pg_fetch_array($serviciosolicitadoresult,1);
                                $ssdos = "display: shown";
                                $tiposerviciodos = $serviciosolicitadodos['tiposervicio'];
                                $personassugeridasdos =$serviciosolicitadodos['personassugeridas'];
                                $menudos =$serviciosolicitadodos['menu'];
                                $costomenudos=$serviciosolicitadodos['costomenu'];
                                $costototaldos=$serviciosolicitadodos['costototal'];
                                $idserviciosolicitadodos =$serviciosolicitadodos['idserviciosolicitado'];
                    
                                $serviciosolicitadotres=pg_fetch_array($serviciosolicitadoresult,2);
                                $sstres = "display: shown";
                                $tiposerviciotres = $serviciosolicitadotres['tiposervicio'];
                                $personassugeridastres =$serviciosolicitadotres['personassugeridas'];
                                $menutres =$serviciosolicitadotres['menu'];
                                $costomenutres=$serviciosolicitadotres['costomenu'];
                                $costototaltres=$serviciosolicitadotres['costototal'];
                                $idserviciosolicitadotres =$serviciosolicitadotres['idserviciosolicitado'];
                    
                                $serviciosolicitadocuatro = "";
                                $sscuatro = "display: none";
                                $tiposerviciocuatro = "";
                                $personassugeridascuatro ="";
                                $menucuatro ="";
                                $costomenucuatro="";
                                $costototalcuatro="";
                                $idserviciosolicitadocuatro ="";

                                $btnsuno = "display: none";
                                $btnsdos = "display: none";
                                $btnstres = "display: showm";
                                
                              
                                break;
                             case 4:
                    
                                $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);;
                                $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
                                $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
                                $menuuno =$serviciosolicitadouno['menu'];
                                $costomenuuno=$serviciosolicitadouno['costomenu'];
                                $costototaluno=$serviciosolicitadouno['costototal'];
                                $idserviciosolicitadouno =$serviciosolicitadouno['idserviciosolicitado'];
                    
                                $serviciosolicitadodos=pg_fetch_array($serviciosolicitadoresult,1);;
                                $ssdos = "display: shown";
                                $tiposerviciodos = $serviciosolicitadodos['tiposervicio'];
                                $personassugeridasdos =$serviciosolicitadodos['personassugeridas'];
                                $menudos =$serviciosolicitadodos['menu'];
                                $costomenudos=$serviciosolicitadodos['costomenu'];
                                $costototaldos=$serviciosolicitadodos['costototal'];
                                $idserviciosolicitadodos =$serviciosolicitadodos['idserviciosolicitado'];
                    
                                $serviciosolicitadotres=pg_fetch_array($serviciosolicitadoresult,2);;
                                $sstres = "display: shown";
                                $tiposerviciotres = $serviciosolicitadotres['tiposervicio'];
                                $personassugeridastres =$serviciosolicitadotres['personassugeridas'];
                                $menutres =$serviciosolicitadotres['menu'];
                                $costomenutres=$serviciosolicitadotres['costomenu'];
                                $costototaltres=$serviciosolicitadotres['costototal'];
                                $idserviciosolicitadotres =$serviciosolicitadotres['idserviciosolicitado'];
                                
                                $serviciosolicitadocuatro=pg_fetch_array($serviciosolicitadoresult,3);;
                                $sscuatro = "display: shown";
                                $tiposerviciocuatro = $serviciosolicitadocuatro['tiposervicio'];
                                $personassugeridascuatro =$serviciosolicitadocuatro['personassugeridas'];
                                $menucuatro =$serviciosolicitadocuatro['menu'];
                                $costomenucuatro=$serviciosolicitadocuatro['costomenu'];
                                $costototalcuatro=$serviciosolicitadocuatro['costototal'];
                                $idserviciosolicitadocuatro =$serviciosolicitadocuatro['idserviciosolicitado'];

                                $btnsuno = "display: none";
                                $btnsdos = "display: none";
                                $btnstres = "display: none";
                                
                                
                                break;
                        }
                ?>

                <legend><i class="fas fa-store-alt fa-fw"></i> &nbsp; Modificar  Solicitud de Refrigerio </legend>
                <h6><?php echo "ID REFRIGERIO: $row[0]"; ?></h6>
                    <div class="container-fluid">
                        <div class="row">

                        	<input type="hidden" name="modificar" value="1" id="modificar">

                        	
                            <input type="hidden"  name="IDR"  value="<?php echo $row[0]; ?>">

                            <input type="hidden"  name="ideventocursouno"  value="<?php echo $ideventocursouno; ?>">
                            <input type="hidden"  name="ideventocursodos"  value="<?php echo $ideventocursodos; ?>">
                            <input type="hidden"  name="ideventocursotres"  value="<?php echo $ideventocursotres; ?>">
                            <input type="hidden"  name="ideventocursocuatro"  value="<?php echo $ideventocursocuatro; ?>">

                            <input type="hidden"  name="idserviciosolicitadouno"  value="<?php echo $idserviciosolicitadouno; ?>">
                            <input type="hidden"  name="idserviciosolicitadodos"  value="<?php echo $idserviciosolicitadodos; ?>">
                            <input type="hidden"  name="idserviciosolicitadotres"  value="<?php echo $idserviciosolicitadotres; ?>">
                            <input type="hidden"  name="idserviciosolicitadocuatro"  value="<?php echo $idserviciosolicitadocuatro; ?>">
                          
                       

                          
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="Nombre del curso o evento" class="bmd-label-floating">NOMBRE DEL CURSO O EVENTO</label>
                                    <input type="text" class="form-control" name="cursoevento" id="cursoevento"  maxlength="30" value="<?php echo $row[4]; ?>" onfocusout="validarCursoEvento()">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <legend><i class="fas  fa-fw"></i> &nbsp; Evento o curso</legend>               
                         <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fecha" id="fecha" value="<?php echo $fechauno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="hora" id="hora" value="<?php echo $horauno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugar" id="lugar" value="<?php echo $lugaruno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantes" id="nparticipantes" value="<?php echo $participantesuno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnecuno" style="<?php echo $btnuno; ?>">
                                <div class="form-group">
                                <button type="button" onclick="botonecuno()">Agregar evento o curso</button>
                                </div>
                            </div>
                           
                    <div class="container-fluid" id="ecdos" style="<?php echo $ecdos; ?>">
                        <div class="row">
                        <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fechados" id="fecha" value="<?php echo $fechados; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="horados" id="hora" value="<?php echo $horados; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugardos" id="lugar" value="<?php echo $lugardos; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantesdos" id="nparticipantes" value="<?php echo $participantesdos; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnecdos" style="<?php echo $btndos; ?>">
                                <div class="form-group">
                                <button type="button" onclick="botonecdos()">Agregar evento o curso</button>
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="container-fluid" id="ectres" style="<?php echo $ectres; ?>">
                        <div class="row">
                        <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fechatres" id="fecha" value="<?php echo $fechatres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="horatres" id="hora" value="<?php echo $horatres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugartres" id="lugar" value="<?php echo $lugartres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantestres" id="nparticipantes" value="<?php echo $participantestres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" id="btnectres" style="<?php echo $btntres; ?>">
                                <div class="form-group">
                                <button type="button" onclick="botonectres()">Agregar evento o curso</button>
                                </div>
                            </div>
                       </div>
                    </div>     
                     <div class="container-fluid"  id="eccuatro" style="<?php echo $eccuatro; ?>">
                        <div class="row">
                        <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">FECHA</label>
                                    <input type="text" class="form-control" name="fechacuatro" id="fecha" value="<?php echo $fechacuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">HORA</label>
                                    <input type="text" class="form-control" name="horacuatro" id="hora" value="<?php echo $horacuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">LUGAR</label>
                                    <input type="text" class="form-control" name="lugarcuatro" id="lugar" value="<?php echo $lugarcuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PARTICIPANTES</label>
                                    <input type="text" class="form-control" name="nparticipantescuatro" id="nparticipantes" value="<?php echo $participantescuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                        
                       </div>
                    </div>
                
                    <legend><i class="fas  fa-fw"></i> &nbsp; Servicio solicitado</legend>               
                         <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposer" id="tiposer" value="<?php echo $tiposerviciouno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassug" id="npersonassug" value="<?php echo $personassugeridasuno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menu" id="menu" value="<?php echo $menuuno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenu" id="costomenu" value="<?php echo $costomenuuno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototal" id="costototal" value="<?php echo $costototaluno; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3" id="btnssuno" style="<?php echo $btnsuno; ?>">
                                <div class="form-group">
                                <button type="button" onclick="botonssuno()">Agregar servicio solicitado</button>
                                </div>
                            </div>
                            <div class="container-fluid" id="ssdos" style="<?php echo $ssdos; ?>">
                            <div class="row">
                            <div class="col-12 col-md-3" >
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposerdos" id="tiposer" value="<?php echo $tiposerviciodos; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassugdos" id="npersonassug" value="<?php echo $personassugeridasdos; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menudos" id="menu" value="<?php echo $menudos; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenudos" id="costomenu" value="<?php echo $costomenudos; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototaldos" id="costototal" value="<?php echo $costototaldos; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3" id="btnssdos" style="<?php echo $btnsdos; ?>">
                                <div class="form-group">
                                <button type="button" onclick="botonssdos()">Agregar servicio solicitado</button>
                                </div>
                            </div>
                            </div>
                            </div>

                            <div class="container-fluid" id="sstres" style="<?php echo $sstres; ?>">
                            <div class="row">
                            <div class="col-12 col-md-3" >
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposertres" id="tiposer" value="<?php echo $tiposerviciotres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassugtres" id="npersonassug" value="<?php echo $personassugeridastres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menutres" id="menu" value="<?php echo $menutres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenutres" id="costomenu" value="<?php echo $costomenutres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototaltres" id="costototal" value="<?php echo $costototaltres; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3" id="btnsstres" style="<?php echo $btnstres; ?>">
                                <div class="form-group">
                                <button type="button" onclick="botonsstres()">Agregar servicio solicitado</button>
                                </div>
                            </div>
                            </div>

                            </div>
                            <div class="container-fluid" id="sscuatro" style="<?php echo $sscuatro; ?>">
                            <div class="row">
                            <div class="col-12 col-md-3" >
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">TIPO DE SERVICIO</label>
                                    <input type="text" class="form-control" name="tiposercuatro" id="tiposer" value="<?php echo $tiposerviciocuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">N° DE PERSONAS SUGERIDAS</label>
                                    <input type="text" class="form-control" name="npersonassugcuatro" id="npersonassug" value="<?php echo $personassugeridascuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">MENU</label>
                                    <input type="text" class="form-control" name="menucuatro" id="menu" value="<?php echo $menucuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO DEL MENU</label>
                                    <input type="text" class="form-control" name="costomenucuatro" id="costomenu" value="<?php echo $costomenucuatro; ?>">
                                    <span class="helper-text"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="Cedula del Solicitante" class="bmd-label-floating">COSTO TOTAL</label>
                                    <input type="text" class="form-control" name="costototalcuatro" id="costototal" value="<?php echo $costototalcuatro; ?>">
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


                    <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save" name=""></i> &nbsp; MODIFICAR SOLICITUD DE REFRIGERIO</button>

                </p>

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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!-- validar menú dependiendo del rol--->
	<script src="../vista/js/validacionRol.js" ></script>

	<script src="../vista/js/main.js" ></script>

    <script src="../vista/js/controladorModificarRefrigerio.js"></script>


	
</body>
</html>