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
	<title>CREAR SOLICITUD DE REFRIGERIO</title>

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
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; CREAR SOLICITUD DE REFRIGERIO
				</h3>
				<p class="text-justify">
				
				</p>
			</div>
			
			<!-- Content -->
						
            <?php

//ACOMODAR PORQUE SE AGREGO EL ATRIBUTO ID

/*Incluimos la clase REFRIGERIO para poder registrar los datos*/
include_once ('../modelo/claseRefrigerio.php'); 

/*Incluimos la clase EVENTOCURSO / SERVICIOSOLICITADO para poder registrar los datos*/
include_once ('../modelo/claseEventoCurso.php'); 
include_once ('../modelo/claseServicioSolicitado.php'); 


/*Inlcuimos a la clase PERSONA para poder validar la cedula ingresada*/
include_once ('../modelo/persona.php');
include_once ('../modelo/claseDepartamento.php');

include_once ('../modelo/claseImgEncabezado.php');


$year = date('o');
$partesFecha = array(date('j'),date('n'),date('o'));
$fecha = implode("/",$partesFecha);



$conteo = new refrigerio(null, null, null, null, null, null, null, null, null);
$num = $conteo->contarRefrigerio()+1;
$idr = "SR"." ".$year."-".$num;

//aqui guardamos los datos del formulario
// información importante
$depa = $_POST['departamento'];

  //CON ESTE MÉTODO OBTENEMOS EL LOS DATOS DEL JEFE DEL DEPARTAMENTO
  $departamento=new departamento(null,$depa); //instanciamos
  $ced=$departamento->datosDepartamento();
  $depconsulta=$departamento->consultarNombreDepartamento();
  $depensol= $depconsulta['1'];


  //guardamos la cedula de la persona
  $cedula = $ced['4'];
  $estatus=1; //el estatus en crear siempre sera uno que significa "EN REVISIÓN"



$cursoevento = $_POST['cursoevento'];

//curso o evento
$fechace = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$nparticipantes = $_POST['nparticipantes'];

$fechacedos = $_POST['fechados'];
$horados = $_POST['horados'];
$lugardos = $_POST['lugardos'];
$nparticipantesdos = $_POST['nparticipantesdos'];

$fechacetres = $_POST['fechatres'];
$horatres = $_POST['horatres'];
$lugartres = $_POST['lugartres'];
$nparticipantestres = $_POST['nparticipantestres'];

$fechacecuatro = $_POST['fechacuatro'];
$horacuatro = $_POST['horacuatro'];
$lugarcuatro = $_POST['lugarcuatro'];
$nparticipantescuatro = $_POST['nparticipantescuatro'];

//servicio solicitado
$tiposer = $_POST['tiposer'];
$npersonassug = $_POST['npersonassug'];
$menu = $_POST['menu'];
$costomenu = $_POST['costomenu'];
$costototal = $_POST['costototal'];

$tiposerdos = $_POST['tiposerdos'];
$npersonassugdos = $_POST['npersonassugdos'];
$menudos = $_POST['menudos'];
$costomenudos = $_POST['costomenudos'];
$costototaldos = $_POST['costototaldos'];

$tiposertres = $_POST['tiposertres'];
$npersonassugtres = $_POST['npersonassugtres'];
$menutres = $_POST['menutres'];
$costomenutres = $_POST['costomenutres'];
$costototaltres = $_POST['costototaltres'];

$tiposercuatro = $_POST['tiposercuatro'];
$npersonassugcuatro = $_POST['npersonassugcuatro'];
$menucuatro = $_POST['menucuatro'];
$costomenucuatro = $_POST['costomenucuatro'];
$costototalcuatro = $_POST['costototalcuatro'];






// verificamos si la cedula se encuentra registrada
$persona = new persona('','','','','','');
if($persona->valPer($cedula,$depensol) == 0){
if($cedula == ""){
    echo "vacio";
}
}else{


	$imgEncabezado = new imgEncabezado(null,null,null);

	$resultado = $imgEncabezado->consultarImagen();

	$idimg = pg_num_rows($resultado); //guardamos el id del encabezado

    
$refrigerio = new refrigerio(null,$fecha,$estatus,$cedula,null,$idimg,$idr,$depensol,$cursoevento);

$result=$refrigerio->crearRefrigerio();

//EVENTO O CURSO
$eventocursotabla = new eventocurso(null,$fechace,$hora,$lugar,$nparticipantes);
$result2 =$eventocursotabla->crearEventoCurso();

if ($fechacedos !="" || $horados !="" || $lugardos !="" || $nparticipantesdos !=""){
$eventocursotablados = new eventocurso(null,$fechacedos,$horados,$lugardos,$nparticipantesdos);
$ecdos =$eventocursotablados->crearEventoCurso();   
}else{
	$eventocursotablados = new eventocurso(null,null,null,null,null);
	$ecdos =$eventocursotablados->crearEventoCurso();   
}

if ($fechacetres !="" || $horatres !="" || $lugartres !="" || $nparticipantestres !=""){
$eventocursotablatres = new eventocurso(null,$fechacetres,$horatres,$lugartres,$nparticipantestres);
$ectres =$eventocursotablatres->crearEventoCurso();   
}else{
	$eventocursotablatres = new eventocurso(null,null,null,null,null);
	$ectres =$eventocursotablatres->crearEventoCurso();   
}

if ($fechacecuatro !="" || $horacuatro!="" || $lugarcuatro !="" || $nparticipantescuatro !=""){
$eventocursotablacuatro = new eventocurso(null,$fechacecuatro,$horacuatro,$lugarcuatro,$nparticipantescuatro);
$eccuatro =$eventocursotablacuatro->crearEventoCurso();   
}else{
	$eventocursotablacuatro = new eventocurso(null,null,null,null,null);
	$eccuatro =$eventocursotablacuatro->crearEventoCurso();   
}

// SERVICIO SOLICITADO
$serviciosolicitadotabla = new serviciosolicitado(null,$tiposer,$npersonassug,$menu,$costomenu,$costototal);
$result3 =$serviciosolicitadotabla->crearServicioSolicitado();

if ($tiposerdos !="" || $npersonassugdos !="" || $menudos !="" || $costomenudos !="" || $costototaldos !=""){
$serviciosolicitadotablados = new serviciosolicitado(null,$tiposerdos,$npersonassugdos,$menudos,$costomenudos, $costototaldos);
$ssdos =$serviciosolicitadotablados->crearServicioSolicitado();   
}else{
	$serviciosolicitadotablados = new serviciosolicitado(null,null,null,null,null,null);
	$ssdos =$serviciosolicitadotablados->crearServicioSolicitado();   

}

if ($tiposertres !="" || $npersonassugtres !="" || $menutres !="" || $costomenutres !="" || $costototaltres !=""){
$serviciosolicitadotablatres = new serviciosolicitado(null,$tiposertres,$npersonassugtres,$menutres,$costomenutres, $costototaltres);
$sstres =$serviciosolicitadotablatres->crearServicioSolicitado();   
}else{
	$serviciosolicitadotablatres = new serviciosolicitado(null,null,null,null,null,null);
	$sstres =$serviciosolicitadotablatres->crearServicioSolicitado();   

}

if ($tiposercuatro !="" || $npersonassugcuatro !="" || $menucuatro !="" || $costomenucuatro !="" || $costototalcuatro !=""){
$serviciosolicitadotablacuatro = new serviciosolicitado(null,$tiposercuatro,$npersonassugcuatro,$menucuatro,$costomenucuatro, $costototalcuatro);
$ssdos =$serviciosolicitadotablacuatro->crearServicioSolicitado();   
}else{
	$serviciosolicitadotablacuatro = new serviciosolicitado(null,null,null,null,null,null);
	$sscuatro =$serviciosolicitadotablacuatro->crearServicioSolicitado();   

}




if($result==true){
    echo"
    <script type='text/javascript'>
    Swal.fire({
        title: '¡CREACIÓN EXITOSA!',
        html: 'Datos almacenados',
        icon: 'success',
        confirmButtonText: 'VOLVER',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false
    })
    .then(resultado => {
        if(resultado.value) {
            window.location.href='../vista/vistaCrearRefrigerio.php';
        }
    });
    
    </script>
    ";
}else{
echo "ERROR NO SE PUDO CREAR";
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!-- validar menú dependiendo del rol--->
	<script src="../vista/js/validacionRol.js" ></script>

	<script src="../vista/js/main.js" ></script>

    <script src="../vista/js/controladorModificarServicio.js"></script>


	
</body>
</html>