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
<title>CONSULTAR ESTATUS</title>

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
				<i class="fas fa-search fa-fw"></i> &nbsp; ESTATUS DE DOCUMENTOS
			</h3>
			<p class="text-justify">
				SE PODRÁ VISUALIZAR LOS ESTATUS DE LOS DOCUMENTOS
			</p>
		</div>

					<!-- Content -->
			
        		
		
		<!-- Content -->
		<div class="container-fluid">
			
		<?php

require_once('../modelo/claseMemo.php');
require_once('../modelo/claseServicio.php');
require_once('../modelo/claseRefrigerio.php');
require_once('../modelo/claseDepartamento.php');


$dep = new departamento('',$_SESSION['departamento_usuario']);
$departamento = $dep ->consultarNombreDepartamento();

$m = new memo(null,null,null,null,null,null,null,null,null,null,$departamento['idd']);
$s = new servicio(null,null,null,null,null,null,null,$departamento['idd']);
$r = new refrigerio(null,null,null,null,null,null,null,$departamento['idd']);

	//Estas variables son para validar si los documentos existen, si existen, devuelven true
	$validarMemo = $m -> validarMemoDepartamento();
	$validarServicio = $s -> validarServicioDep();
	$validarRefrigerio = $r -> validarRefrigerioDependencia();
	//--------------------------------------------------------------------------------

	
    
?>

        <div class='container-fluid'><table border='1' class='table table-dark table-sm'><thead>
        <tr class='text-center roboto-medium'>
        <td align='center' width=400><h5>ID</h5></td>
        <td align='center' width=400><h5>Asunto/trabajo/Evento</h5></td>
        <td align='center' width=400><h5>Fecha creacion</h5></td>
        <td align='center' width=400><h5>Estatus Documento</h5></td>
        <td align='center' width=400><h5>Tipo Documento</h5></td>
        <?php if($_SESSION['rol']=="Jefe departamento"){ 
        echo "<td align='center' width=400><h5></h5></td>";
		echo "<td align='center' width=400><h5>Modificar Estatus</h5></td>"; 
        echo "<td align='center' width=400><h5></h5></td>";
		
        }
        ?> 
        </thead>
    <?php

//Este condicional es para validar si exiten documentos hechos
if($validarMemo || $validarRefrigerio || $validarServicio ){
        $datos_memo = $m->consultarMemoDepartamento();
        while($row_memo=pg_fetch_array($datos_memo)){

    ?>
        
        <td align='center' width=400><h6><?php echo $row_memo['idmemo'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_memo['asunto'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_memo['fechad'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_memo['nombree'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_memo['nombretipo'];?></h6></td>
    
		<?php if($_SESSION['rol']=="Jefe departamento"){ ?>
        
		<?php
								echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_memo["iddoc"].'&estatus='.'1'."' rel='noopener noreferrer'>
								<button type='submit' class='btn btn-raised btn-primary' name='Revision' id='reporte'></i> &nbsp; REVISION</button>
								 </a> </td>";

								echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_memo["iddoc"].'&estatus='.'2'."' rel='noopener noreferrer'>
								<button type='submit' class='btn btn-raised btn-success' name='Aceptar' id='reporte'></i> &nbsp; APROBADO </button>
								</a> </td>";

							
								echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_memo["iddoc"].'&estatus='.'3'."'  rel='noopener noreferrer'>
								<button type='submit' class='btn btn-raised btn-danger' name='negar' id='reporte'></i> &nbsp; NEGADO</button>
								</a> </td>";
		?>

	</td>
        
			
    	
<?php 	
		
			}
		echo "</tr>";
		}


        $datos_servicio = $s->consultarDepServicio();
        while($row_servicio=pg_fetch_array($datos_servicio)){

    ?>
        
        <td align='center' width=400><h6><?php echo $row_servicio['nos'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_servicio['trabajo'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_servicio['fechad'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_servicio['nombree'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_servicio['nombretipo'];?></h6></td>
    
		<?php if($_SESSION['rol']=="Jefe departamento"){ ?>
        
		<?php
					echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_servicio["iddoc"].'&estatus='.'1'."' rel='noopener noreferrer'>
					<button type='submit' class='btn btn-raised btn-primary' name='Revision' id='reporte'></i> &nbsp; REVISION</button>
						</a> </td>";

					echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_servicio["iddoc"].'&estatus='.'2'."' rel='noopener noreferrer'>
					<button type='submit' class='btn btn-raised btn-success' name='Aceptar' id='reporte'></i> &nbsp; APROBADO </button>
					</a> </td>";

				
					echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_servicio["iddoc"].'&estatus='.'3'."'  rel='noopener noreferrer'>
					<button type='submit' class='btn btn-raised btn-danger' name='negar' id='reporte'></i> &nbsp; NEGADO</button>
					</a> </td>";
		?>

	</td>
        
			
    	
<?php 	
			
		 }
		echo "</tr>";
    		
		}

        $datos_refrigerio = $r->consultarDependenciaRefrigerio();
        while($row_refrigerio=pg_fetch_array($datos_refrigerio)){

    ?>
        
        <td align='center' width=400><h6><?php echo $row_refrigerio['idr'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_refrigerio['cursoevento'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_refrigerio['fechad'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_refrigerio['nombree'];?></h6></td>
        <td align='center' width=400><h6><?php echo $row_refrigerio['nombretipo'];?></h6></td>
    
		<?php if($_SESSION['rol']=="Jefe departamento"){ ?>
        
		<?php
					echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_refrigerio["iddoc"].'&estatus='.'1'."' rel='noopener noreferrer'>
					<button type='submit' class='btn btn-raised btn-primary' name='Revision' id='reporte'></i> &nbsp; REVISION</button>
						</a> </td>";

					echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_refrigerio["iddoc"].'&estatus='.'2'."' rel='noopener noreferrer'>
					<button type='submit' class='btn btn-raised btn-success' name='Aceptar' id='reporte'></i> &nbsp; APROBADO </button>
					</a> </td>";

				
					echo"<td align='center' width=100> <a href='../controlador/controladorModificarEstatus.php?iddoc=".$row_refrigerio["iddoc"].'&estatus='.'3'."'  rel='noopener noreferrer'>
					<button type='submit' class='btn btn-raised btn-danger' name='negar' id='reporte'></i> &nbsp; NEGADO</button>
					</a> </td>";
		?>

	</td>
<?php 	
			
			}
		echo "</tr>";
		
	}

 //Aqui termina la validacion de los documentos
}
else{

		?>
		<script>
			/*Swal.fire({
				title: ' ¡Vacío! ',
				html: '¡No tiene documentos para ver estatus!',
				icon: 'info',
				showConfirmButton: true,
				confirmButtonText: 'Aceptar',
			})
			.then(resultado=>{
				if(resultado.value){
					window.location.href='../vista/inicio.php';
				}
			}) ; */ 
		</script>        
	<?php
}			
?>	</table></div>	
						
       
					
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
<script src="../vista/js/main.js" ></script>
</body>
</html>	