<?php
	
	require("./FPDF/fpdf.php");
	include('../modelo/persona.php');
	include('../modelo/correo.php');
	include('../modelo/telefono.php');
	require_once('../modelo/claseImgEncabezado.php');
	$p= new persona('','','','','','');
	$c= new correo('','','');
	$t= new telefono('','','');


	$partesFecha = array(date('j'),date('n'),date('o'));
	$fecha = implode("/",$partesFecha);




		class PDF extends FPDF {
			function Header(){
	
				//buscamos el id del ultimo encabezado
				$imgEncabezado = new imgEncabezado(null,null,null);
	
				$resultado = $imgEncabezado->consultarImagen();
		
				$ultimoId = pg_num_rows($resultado); //guardamos el id del encabezado
	
				//buscamos la ruta
					$imgEncabezado = new imgEncabezado($ultimoId,null,null);
					$rutaImg = $imgEncabezado->consultarId();
					$row = pg_fetch_array($rutaImg);
					
				
		
				$this->Cell(12);
				
				//put logos
				$this->Image("$row[2]",5,5,195);
				
				$this->Cell(100,10,'',0,1);
				
			
				$this->Ln(5);
				
			}
	
	
			function Footer(){
	
	
				$per = $_GET['per'];
		
	
				$this->setY(-40);
				$this->SetFont('Arial','B',12);
				$this->Cell(80);
				$this->Cell(80,10,"Elaborado por");
				$this->Ln(5);
				$this->Cell(55);
				$this->Cell(80,10,"$per");
				
				
				
			}
		
	
		
		}
	$pdf = new PDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->Ln(5); //salto de linea
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(5);
	$pdf->Cell(30,10, utf8_decode($fecha));
	$pdf->Ln(10); //salto de linea
	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(58);
	$pdf->Cell(70,10, utf8_decode("REPORTE PERSONA"));
	$pdf->Ln(15); //salto de linea
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(70);
	$pdf->Cell(70,10, utf8_decode("Datos Personales"));
	$pdf->Ln(10); //salto de linea
	
	// Colores, ancho de línea y fuente en negrita

    $pdf->SetFillColor(1,55,102);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','',10);
    $pdf->Cell(3);
	$pdf->Cell(20,10,utf8_decode('CÉDULA'),0,0,'C',1);
	
	$pdf->Cell(25,10,'NOMBRE',0,0,'C',1);
	
    $pdf->Cell(25,10,'APELLIDO',0,0,'C',1);
    $pdf->Cell(35,10,utf8_decode('DIRECCIÓN'),0,0,'C',1);
    $pdf->Cell(40,10,'CARGO',0,0,'C',1);
	$pdf->Cell(40,10,'DEPARTAMENTO',0,0,'C',1);
	

    $pdf->Ln(10); //salto de linea


    // Restauración de colores y fuentes
    $pdf->SetFillColor(224,235,255);
    $pdf->SetFont('Arial','',8.5);
    $pdf->SetTextColor(0);
	$pdf->SetFont('');
	
	$codigo = $_GET['codigo'];
	$opt = $_GET['opt'];
	$depid = $_GET['depid'];



	if($opt == 1){
	

		$result=$p->reporteListadoPDF($codigo,$depid);
		$resultado=$t->reporteListarTlfnPDF($codigo,$depid);

		$pdf->Cell(3);
		$pdf->Cell(20,10,"$result[0]",0,0,'C',1);
		$anchoCelda = 25;
		$tamañoFuente = 8.5;
		$tamañoFuenteTemp = 8.5;
		while($pdf->GetStringWidth($result[1])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$result[1]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
		/////
		while($pdf->GetStringWidth($result[2])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$result[2]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
		////
		$anchoCelda = 35;
		while($pdf->GetStringWidth($result[3])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$result[3]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
		////
		$anchoCelda = 40;
		while($pdf->GetStringWidth($result[4])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$result[4]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
	
    	$pdf->Cell(40,10,"$result[5]",0,0,'C',1);

    
    	if(pg_num_rows($resultado)>0){
				//--------SEGUNDA TABLA------------//

				$pdf->Ln(15); //salto de linea
				$pdf->Cell(70);
				$pdf->SetFont('Arial','B',14);
				$pdf->Cell(70,10, utf8_decode("Datos de Teléfono"));
				$pdf->Ln(10); //salto de linea
		
		
				// Colores, ancho de línea y fuente en negrita
		
				   $pdf->SetFillColor(1,55,102);
				$pdf->SetTextColor(255);
				$pdf->SetDrawColor(128,0,0);
				$pdf->SetLineWidth(.3);
				$pdf->SetFont('','',10);
				$pdf->Cell(15);
				$pdf->Cell(80,10,utf8_decode('NÚMERO'),0,0,'C',1);
				$pdf->Cell(80,10,'TIPO',0,0,'C',1);
				$pdf->Ln(10); //salto de linea
		
				// Restauración de colores y fuentes
				$pdf->SetFillColor(224,235,255);
				$pdf->SetFont('Arial','',10);
				$pdf->SetTextColor(0);
				$pdf->SetFont('');
		
        	while($row=pg_fetch_array($resultado)){
        		$pdf->Cell(15);
                $pdf->Cell(80,10,"$row[0]",0,0,'C',1);
    			$pdf->Cell(80,10,"$row[1]",0,0,'C',1);
    			$pdf->Ln(11);	
    		}
        }

        //--------TERCERA TABLA------------//

        $result= $c->reporteListarCorreoPDF($codigo,$depid);


    	

    	if(pg_num_rows($result)>0){
			$pdf->Ln(5); //salto de linea
    	$pdf->Cell(70);
    	$pdf->SetFont('Arial','B',14);
		$pdf->Cell(70,10, utf8_decode("Datos de Correo"));
		$pdf->Ln(10); //salto de linea


		// Colores, ancho de línea y fuente en negrita

   		$pdf->SetFillColor(1,55,102);
    	$pdf->SetTextColor(255);
    	$pdf->SetDrawColor(128,0,0);
    	$pdf->SetLineWidth(.3);
    	$pdf->SetFont('','',10);
    	$pdf->Cell(15);
    	$pdf->Cell(80,10,utf8_decode('DIRECCIÓN'),0,0,'C',1);
    	$pdf->Cell(80,10,'TIPO',0,0,'C',1);
    	$pdf->Ln(10); //salto de linea

    	// Restauración de colores y fuentes
    	$pdf->SetFillColor(224,235,255);
    	$pdf->SetFont('Arial','',10);
    	$pdf->SetTextColor(0);
    	$pdf->SetFont('');
        	while($row=pg_fetch_array($result)){
        		$pdf->Cell(15);
                $pdf->Cell(80,10,"$row[0]",0,0,'C',1);
    			$pdf->Cell(80,10,"$row[1]",0,0,'C',1);
    			$pdf->Ln(11);	
    		}
		}
		

	}else if ($opt == 2){
	

		$result=$p->reporteListadoDepaPDF($codigo,$depid);

	
		if(pg_num_rows($result)>0){
        	while($row=pg_fetch_array($result)){
				$pdf->Cell(3);
				$pdf->Cell(20,10,"$row[0]",0,0,'C',1);
				$anchoCelda = 25;
				$tamañoFuente = 8.5;
				$tamañoFuenteTemp = 8.5;
				while($pdf->GetStringWidth($row[1])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[1]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
				/////
				while($pdf->GetStringWidth($row[2])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[2]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
				////
				$anchoCelda = 35;
				while($pdf->GetStringWidth($row[3])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[3]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
				////
				$anchoCelda = 40;
				while($pdf->GetStringWidth($row[4])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[4]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
			
				$pdf->Cell(40,10,"$row[5]",0,0,'C',1);
						$pdf->Ln(11);
    		}
        }
	}else if ($opt == 3){
	

		$result=$p->reporteListadoCargoPDF($codigo,$depid);

	
		if(pg_num_rows($result)>0){
        	while($row=pg_fetch_array($result)){
				$pdf->Cell(3);
				$pdf->Cell(20,10,"$row[0]",0,0,'C',1);
				$anchoCelda = 25;
				$tamañoFuente = 8.5;
				$tamañoFuenteTemp = 8.5;
				while($pdf->GetStringWidth($row[1])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[1]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
				/////
				while($pdf->GetStringWidth($row[2])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[2]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
				////
				$anchoCelda = 35;
				while($pdf->GetStringWidth($row[3])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[3]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
				////
				$anchoCelda = 40;
				while($pdf->GetStringWidth($row[4])>$anchoCelda){
					$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
				}
				$pdf->Cell($anchoCelda,10,"$row[4]",0,0,'C',1);
				$tamañoFuenteTemp = $tamañoFuente;
				$pdf->SetFontSize($tamañoFuente);
			
				$pdf->Cell(40,10,"$row[5]",0,0,'C',1);
						$pdf->Ln(11);
    		}
        }
	}else{
		

		$result=$p->reporteListadoTodosPDF($depid);

	
		if(pg_num_rows($result)>0){
        	while($row=pg_fetch_array($result)){
        		$pdf->Cell(3);
		$pdf->Cell(20,10,"$row[0]",0,0,'C',1);
		$anchoCelda = 25;
		$tamañoFuente = 8.5;
		$tamañoFuenteTemp = 8.5;
		while($pdf->GetStringWidth($row[1])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$row[1]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
		/////
		while($pdf->GetStringWidth($row[2])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$row[2]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
		////
		$anchoCelda = 35;
		while($pdf->GetStringWidth($row[3])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$row[3]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
		////
		$anchoCelda = 40;
		while($pdf->GetStringWidth($row[4])>$anchoCelda){
			$pdf->SetFontSize($tamañoFuenteTemp -=0.1);
		}
		$pdf->Cell($anchoCelda,10,"$row[4]",0,0,'C',1);
		$tamañoFuenteTemp = $tamañoFuente;
		$pdf->SetFontSize($tamañoFuente);
	
    	$pdf->Cell(40,10,"$row[5]",0,0,'C',1);
    			$pdf->Ln(11);
    		}
        }
	}

	
	$pdf->Output(); // cerramos la clase pdf

?>