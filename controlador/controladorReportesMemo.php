<?php
	ob_start();

	//BUSCAMOS LA INFORMACIÓN DEL MEMO
	require_once('../modelo/claseMemo.php');

	
	//guardamos el dato de la URL
	$idMemo = $_GET['codigo'];
	$de = $_GET['opt'];
	$persona = $_GET['persona'];

	if(($idMemo != "") || ($de!="") || ($de != 0)){

		$memo= new memo(null,null,null,null,null,null,$idMemo,null,null,null,$de); // instanciamos
		$result=$memo->consultarIdMemo(); // hacemos el llamado al método
		$row=pg_fetch_array($result);
		if($row==true){

			//buscamos la ruta de la imagen
			require_once('../modelo/claseImgEncabezado.php');
			$idImagen = $row[8];

			$idImg= new imgEncabezado($idImagen,null,null); // instanciamos
			$resultImg=$idImg->consultarId(); // hacemos el llamado al método
			$filas=pg_fetch_array($resultImg); // guardamos la ruta de la imagen 



			//buscar información de la persona
			require_once('../modelo/persona.php');
			require_once('../modelo/claseUsuario.php');

			$fecha = explode ("/", $row[3]); // guardamos la fecha
			
			//BUSCAMOS EL NOMBRE Y EL DEPARTAMENTO AL QUE PERTENECE EL JEFE DE DE DEPARTAMENTO
			$cedula = $row[6];
	
			$persona= new persona(null,null,null,null,null,null); // instanciamos
			$resultado=$persona->reporteListado($cedula); // hacemos el llamado al método
			//CERRAMOS BUSQUEDAD
						
			//BUSCAMOS EL ROL
						
			$usuario = new usuario(null,$cedula,null,null,null);
			//echo "<br><br><br>";
			$r=$usuario->verificarRol();
			//echo "es el: " . $r[1];

			//CIERRE DELA BUSQUEDA
	
	?>


<style>

#encabezado{
	/* IMAGEN*/
	padding: 5px 0;
	width: 100%;
	margin:auto;
}

h3,#centrar{
	/*CENTRAR NOMBRE DOCUMENTO Y INFORMACIÓN FINAL*/
	text-align:center;
	font-size:120.5%;
	
}

h3,#table{
	/* TAMAÑO DE LA LETRA*/
	font-size:120.5%;
}

p,#table{
	/*MARGEN GENERAL PARA TEXTO*/
	margin: 10mm 10mm 0 10mm;
}



#descripcion{
	margin: 0 5mm 1mm 0;
	text-align:justify;
	font-size:120.5%;
	text-indent: 20px;
}


#tabla{
	font-size:120.5%;
	margin: auto;
}

#tabla td{
	text-align: center;
}


#piepagina{
	/* IMAGEN*/
	padding: 3px 0;
	width: 100%;
	margin:auto;
}



</style>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">

<!-- ENCABEZADO DEL PDF-->
		<img   id="encabezado" src="<?php echo $filas[2]; ?>">

		<p> <?php echo $row[0] ?> </p><br><br><br> <!-- Correlativo del memo-->

		<!-- CUERPO DEL PDF-->	
		<h3> M E M O R A N D O </h3><br><br>

		<!-- TABLA CON INFORMACIÓN DE, PARA...-->

		<table id="table">
			<tr>
				<td> <b>PARA:</b> </td>
				<td>  </td>
				<td>  </td>
				<td> <b><?php echo "$row[1]" ?></b></td>
			</tr>

			<tr>
				<td> <b>DE:</b> </td>
				<td>  </td>
				<td>  </td>
				<td> <b><?php echo"$resultado[5]" ?></b></td>
			</tr>

			<tr>
				<td> <b>ASUNTO:</b> </td>
				<td>  </td>
				<td>  </td>
				<td> <b><?php echo "$row[2]" ?></b></td>
			</tr>

			<?php
				$mes = strtolower($fecha[1]);
				$mes = ucfirst($mes);
			?>

			<tr>
				<td> <b>FECHA:</b> </td>
				<td>  </td>
				<td>  </td>
				<td> <b><?php echo "$fecha[0] de $mes del $fecha[2]" ?></b></td>
			</tr>

		</table>

	<!-- DESCRIPCION DEL MEMO-->
	
		<p id="descripcion"> <?php echo"$row[5]"?> </p>
		<p id="descripcion" style="margin-left:55px;">Sin otro particular a que hacer referencia, se despide. </p><br><br><br>

	
	<!-- FINAL DEL MEMO --->
		
		<?php

		//PERSONA
			$nombre = strtolower($resultado[1]); //convertimos a minusculas
			$nombreM = ucfirst ($nombre); // primera letra del string a mayuscula
	
			$apellido = strtolower($resultado[2]); //convertimos a minusculas
			$apellidoM = ucfirst ($apellido); // primera letra del string a mayuscula
		?>

		<p id="centrar"> Atentamente, </p><br><br><br>
		

		<?php 

		// ROL
		$rol = ucfirst ($r[1]); // primera letra del string a mayuscula
		
		//DEPARTAMENTO
		$departamento = strtolower($resultado[5]); //convertimos a minusculas
		$departamento= ucfirst ($departamento); // primera letra del string a mayuscula

		?>
	<div>

		<table id="tabla">
			<tr>
				<td > <b><?php echo "$nombreM $apellidoM" ?></b> </td>
			</tr>

			<tr>
				<td> <b><?php echo "$rol" ?></b> </td>
			</tr>

			<tr>
				<td><b>de <?php echo "$departamento" ?></b> </td>
		
			</tr>

		</table>
		
	</div>

	<?php

			$person = $_GET['persona'];
			$person = strtolower($person);

			$person = explode(" ", $person);

			$nombreL = $person[0];
			$apellidoL = $person[1];
		?>
		
		<br><br><br><br><p> <?php echo "$nombreM[0]$apellidoM[0]/$nombreL[0]$apellidoL[0]" ?> </p>


	<page_footer>

	
		<img   id="piepagina" src="../imagenes/piepagina.jpeg">


  	<?php
		}else{
			header("Location: ../vista/vistaConsultarMemo.php");
		} // cierre del if($row==true){
	}else{

		header("Location: ../vista/vistaConsultarMemo.php");
	}// cierre del if(($idMemo != "") && ($de!="") && ($de != 0)){

	?>
		
	</page_footer>
  </page>

 

  

  <!-- PARA GENERAR EL PDF -->
  
  <?php
  
	$content = ob_get_clean();
	require_once('../vendor/autoload.php');

	use Spipu\Html2Pdf\Html2Pdf;

	try
	{
		$html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', 3);
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output("$row[0].pdf");
	}
	catch(Html2PdfException $e) {
		echo $e;
		exit;
	}

?>
