<?php

	require("./FPDF/fpdf.php");
	
					//buscar información 
	require_once('../modelo/claseServicio.php'); 
					//buscar información de la persona
	require_once('../modelo/persona.php');
	require_once('../modelo/claseUsuario.php');

						//guardamos el dato de la URL
    $IDS = $_GET['codigo']; 
    $depid = $_GET['depid']; 



						//BUSCAMOS INFORMACIÓN

	$servicio= new servicio(null,null,null,null,null,null,$IDS,null,null,null,null); // instanciamos
	$result=$servicio->consultarIdServicio($depid); // hacemos el llamado al método
    $row=pg_fetch_array($result);


						//CERRAMOS BUSQUEDA 

    					//BUSCAMOS EL NOMBRE Y EL DEPARTAMENTO AL QUE PERTENECE
    $cedula = $row[2];

    $persona= new persona(null,null,null,null,null,null); // instanciamos
    $resultado=$persona->reporteListado($cedula); // hacemos el llamado al método
                        //CERRAMOS BUSQUEDAD
      	//buscamos la ruta de la imagen
			require_once('../modelo/claseImgEncabezado.php');
			$idImagen = $row[7];

			$idImg= new imgEncabezado($idImagen,null,null); // instanciamos
			$resultImg=$idImg->consultarId(); // hacemos el llamado al método
			$filas=pg_fetch_array($resultImg); // guardamos la ruta de la imagen                   



	//--------CREAMOS EL PDF--------\\
    class PDF extends FPDF {
        function Header(){
            
            global $filas;
    
            $this->Cell(12);
            

        $this->Image($filas[2],5,5,195);
            
            $this->Cell(100,10,'',0,1);
          
            $this->Ln(5);
            
        }
    
    }
    
    
    
    
    $pdf = new PDF('P','mm','A4'); //use new class
    
    
    
    
    $pdf->AddPage();
    $pdf->Cell(195	,5,'',0,1,);
    
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(20	,5,'1. No.:',0,0);
    $pdf->Cell(40	,5,$row[0],1,1, 'C');
    
    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial','B',10);
    //Cell(width , height , text , border , end line , [align] )
    $pdf->Cell(70	,5,'',0,0);
    $pdf->Cell(60	,5,'SOLICITUD DE SERVICIOS',0,0);
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(20	,5,'2. FECHA:',0,0);
    $pdf->Cell(40	,5,$row[1],1,1, 'C');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(95	,5,'3. NOMBRE Y APELLIDO DEL SOLICITANTE:',1,0, 'C');
    $pdf->Cell(95	,5,'4. DEPARTAMENTO DE ADSCRIPCION:',1,1, 'C');
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(95	,5,$resultado[1]." ".$resultado[2],1,0, 'C');
    $pdf->Cell(95	,5,$row[3],1,1, 'C');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(190	,5,'5. TRABAJO A REALIZAR:',1,1, 'C');
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190	,15,$row[4],1,1, 'C');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(190	,5,'6. LUGAR:',1,1, 'C');
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190	,10,$row[5],1,1, 'C');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(190	,5,'7. DESCRIPCION DEL TRABAJO:',1,1, 'C');
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190	,10,$row[6],1,1, 'C');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(63	,5,'8. DEPENDENCIA SOLICITANTE:',1,0, 'C');
    $pdf->Cell(64	,5,'9. RECIBIDO POR:',1,0, 'C');
    $pdf->Cell(63	,5,'10. AUTORIZADO POR:',1,1, 'C');
    
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(63	,10,'','L,R',0, 'C');
    $pdf->Cell(64	,10,'','L,R',0, 'C');
    $pdf->Cell(63	,10,'','L,R',1, 'C');
    
    $pdf->Cell(63	,5,'DPTO. DE '.$row[3],'L,R',0, 'C');
    $pdf->Cell(64	,5,'FECHA:','L,R',0, );
    $pdf->Cell(63	,5,'FECHA:','L,R',1, );
    
    
    $pdf->Cell(63	,5,'FIRMA Y SELLO','L,R,B',0, 'C');
    $pdf->Cell(64	,5,'FIRMA Y SELLO','L,R,B',0, 'C');
    $pdf->Cell(63	,5,'FIRMA Y SELLO','L,R,B',1, 'C');
    
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(20	,5,'F-4500-2',0,1,);
    
    
    
    
    
    
    
    
    
    
    $pdf->Output();
?>