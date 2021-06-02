<?php

	require("./FPDF/fpdf.php");
	
					//buscar información de la solicitud de refrigerio
    require_once('../modelo/claseRefrigerio.php'); 
    require_once('../modelo/claseEventoCurso.php'); 
    require_once('../modelo/claseServicioSolicitado.php'); 
					//buscar información de la persona
	require_once('../modelo/persona.php');
	require_once('../modelo/claseUsuario.php');

						//guardamos el dato de la URL
    $IDR = $_GET['codigo']; 
    $depid = $_GET['depid']; 


						//BUSCAMOS INFORMACIÓN 

	$refrigerio= new refrigerio(null,null,null,null,null,null,$IDR,null,null); // instanciamos
	$result=$refrigerio->consultarIdRefrigerio($depid); // hacemos el llamado al método
    $row=pg_fetch_array($result);

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

           $eventocursodos = "";
           $fechados = "";
           $horados = "";
           $lugardos ="";
           $participantesdos= "";

           $eventocursotres = "";
           $fechatres = "";
           $horatres = "";
           $lugartres ="";
           $participantestres= "";

           $eventocursocuatro= "";
           $fechacuatro = "";
           $horacuatro = "";
           $lugarcuatro ="";
           $participantescuatro= "";
            break;
        case 1:
            $eventocursouno = pg_fetch_array($eventocursoresult,0);
            $fechauno = $eventocursouno['fecha'];
            $horauno = $eventocursouno['hora'];
            $lugaruno =$eventocursouno['lugar'];
            $participantesuno= $eventocursouno['participantes'];

            $eventocursodos = "";
            $fechados = "";
            $horados = "";
            $lugardos ="";
            $participantesdos= "";

            $eventocursotres = "";
            $fechatres = "";
            $horatres = "";
            $lugartres ="";
            $participantestres= "";

            $eventocursocuatro= "";
            $fechacuatro = "";
            $horacuatro = "";
            $lugarcuatro ="";
            $participantescuatro= "";
            break;
        case 2:
            $eventocursouno = pg_fetch_array($eventocursoresult,0);
            $fechauno = $eventocursouno['fecha'];
            $horauno = $eventocursouno['hora'];
            $lugaruno =$eventocursouno['lugar'];
            $participantesuno= $eventocursouno['participantes'];
 

            $eventocursodos = pg_fetch_array($eventocursoresult,1);
            $fechados = $eventocursodos['fecha'];
            $horados = $eventocursodos['hora'];
            $lugardos =$eventocursodos['lugar'];
            $participantesdos= $eventocursodos['participantes'];
 

            $eventocursotres = "";
            $fechatres = "";
            $horatres = "";
            $lugartres ="";
            $participantestres= "";


            $eventocursocuatro= "";
            $fechacuatro = "";
            $horacuatro = "";
            $lugarcuatro ="";
            $participantescuatro= "";
            
            break;
        case 3:
            $eventocursouno = pg_fetch_array($eventocursoresult,0);
            $fechauno = $eventocursouno['fecha'];
            $horauno = $eventocursouno['hora'];
            $lugaruno =$eventocursouno['lugar'];
            $participantesuno= $eventocursouno['participantes'];
 
            $eventocursodos = pg_fetch_array($eventocursoresult,1);
            $fechados = $eventocursodos['fecha'];
            $horados = $eventocursodos['hora'];
            $lugardos =$eventocursodos['lugar'];
            $participantesdos= $eventocursodos['participantes'];
 
            $eventocursotres = pg_fetch_array($eventocursoresult,2);
            $fechatres = $eventocursotres['fecha'];
            $horatres = $eventocursotres['hora'];
            $lugartres =$eventocursotres['lugar'];
            $participantestres= $eventocursotres['participantes'];

            $eventocursocuatro= "";
            $fechacuatro = "";
            $horacuatro = "";
            $lugarcuatro ="";
            $participantescuatro= "";
            break;
         case 4:
            $eventocursouno = pg_fetch_array($eventocursoresult,0);
            $fechauno = $eventocursouno['fecha'];
            $horauno = $eventocursouno['hora'];
            $lugaruno =$eventocursouno['lugar'];
            $participantesuno= $eventocursouno['participantes'];

            $eventocursodos = pg_fetch_array($eventocursoresult,1);
            $fechados = $eventocursodos['fecha'];
            $horados = $eventocursodos['hora'];
            $lugardos =$eventocursodos['lugar'];
            $participantesdos= $eventocursodos['participantes'];
 
            $eventocursotres = pg_fetch_array($eventocursoresult,2);
            $fechatres = $eventocursotres['fecha'];
            $horatres = $eventocursotres['hora'];
            $lugartres =$eventocursotres['lugar'];
            $participantestres= $eventocursotres['participantes'];

            $eventocursocuatro= pg_fetch_array($eventocursoresult,3);
            $fechacuatro = $eventocursocuatro['fecha'];
            $horacuatro = $eventocursocuatro['hora'];
            $lugarcuatro =$eventocursocuatro['lugar'];
            $participantescuatro= $eventocursocuatro['participantes'];
            
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

            $serviciosolicitadodos = "";
            $tiposerviciodos = "";
            $personassugeridasdos ="";
            $menudos ="";
            $costomenudos="";
            $costototaldos="";

            $serviciosolicitadotres = "";
            $tiposerviciotres = "";
            $personassugeridastres ="";
            $menutres ="";
            $costomenutres="";
            $costototaltres="";

            $serviciosolicitadocuatro = "";
            $tiposerviciocuatro = "";
            $personassugeridascuatro ="";
            $menucuatro ="";
            $costomenucuatro="";
            $costototalcuatro="";
            break;
        case 1:
            $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);;
            $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
            $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
            $menuuno =$serviciosolicitadouno['menu'];
            $costomenuuno=$serviciosolicitadouno['costomenu'];
            $costototaluno=$serviciosolicitadouno['costototal'];

            $serviciosolicitadodos = "";
            $tiposerviciodos = "";
            $personassugeridasdos ="";
            $menudos ="";
            $costomenudos="";
            $costototaldos="";

            $serviciosolicitadotres = "";
            $tiposerviciotres = "";
            $personassugeridastres ="";
            $menutres ="";
            $costomenutres="";
            $costototaltres="";

            $serviciosolicitadocuatro = "";
            $tiposerviciocuatro = "";
            $personassugeridascuatro ="";
            $menucuatro ="";
            $costomenucuatro="";
            $costototalcuatro="";
            break;
        case 2:
            $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);;
            $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
            $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
            $menuuno =$serviciosolicitadouno['menu'];
            $costomenuuno=$serviciosolicitadouno['costomenu'];
            $costototaluno=$serviciosolicitadouno['costototal'];

            $serviciosolicitadodos=pg_fetch_array($serviciosolicitadoresult,1);;
            $tiposerviciodos = $serviciosolicitadodos['tiposervicio'];
            $personassugeridasdos =$serviciosolicitadodos['personassugeridas'];
            $menudos =$serviciosolicitadodos['menu'];
            $costomenudos=$serviciosolicitadodos['costomenu'];
            $costototaldos=$serviciosolicitadodos['costototal'];

            $serviciosolicitadotres = "";
            $tiposerviciotres = "";
            $personassugeridastres ="";
            $menutres ="";
            $costomenutres="";
            $costototaltres="";

            $serviciosolicitadocuatro = "";
            $tiposerviciocuatro = "";
            $personassugeridascuatro ="";
            $menucuatro ="";
            $costomenucuatro="";
            $costototalcuatro="";
            
            break;
        case 3:
            $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);;
            $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
            $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
            $menuuno =$serviciosolicitadouno['menu'];
            $costomenuuno=$serviciosolicitadouno['costomenu'];
            $costototaluno=$serviciosolicitadouno['costototal'];

            $serviciosolicitadodos=pg_fetch_array($serviciosolicitadoresult,1);;
            $tiposerviciodos = $serviciosolicitadodos['tiposervicio'];
            $personassugeridasdos =$serviciosolicitadodos['personassugeridas'];
            $menudos =$serviciosolicitadodos['menu'];
            $costomenudos=$serviciosolicitadodos['costomenu'];
            $costototaldos=$serviciosolicitadodos['costototal'];

            $serviciosolicitadotres=pg_fetch_array($serviciosolicitadoresult,2);;
            $tiposerviciotres = $serviciosolicitadotres['tiposervicio'];
            $personassugeridastres =$serviciosolicitadotres['personassugeridas'];
            $menutres =$serviciosolicitadotres['menu'];
            $costomenutres=$serviciosolicitadotres['costomenu'];
            $costototaltres=$serviciosolicitadotres['costototal'];

            $serviciosolicitadocuatro = "";
            $tiposerviciocuatro = "";
            $personassugeridascuatro ="";
            $menucuatro ="";
            $costomenucuatro="";
            $costototalcuatro="";
          
            break;
         case 4:

            $serviciosolicitadouno =pg_fetch_array($serviciosolicitadoresult,0);;
            $tiposerviciouno = $serviciosolicitadouno['tiposervicio'];
            $personassugeridasuno =$serviciosolicitadouno['personassugeridas'];
            $menuuno =$serviciosolicitadouno['menu'];
            $costomenuuno=$serviciosolicitadouno['costomenu'];
            $costototaluno=$serviciosolicitadouno['costototal'];

            $serviciosolicitadodos=pg_fetch_array($serviciosolicitadoresult,1);;
            $tiposerviciodos = $serviciosolicitadodos['tiposervicio'];
            $personassugeridasdos =$serviciosolicitadodos['personassugeridas'];
            $menudos =$serviciosolicitadodos['menu'];
            $costomenudos=$serviciosolicitadodos['costomenu'];
            $costototaldos=$serviciosolicitadodos['costototal'];

            $serviciosolicitadotres=pg_fetch_array($serviciosolicitadoresult,2);;
            $tiposerviciotres = $serviciosolicitadotres['tiposervicio'];
            $personassugeridastres =$serviciosolicitadotres['personassugeridas'];
            $menutres =$serviciosolicitadotres['menu'];
            $costomenutres=$serviciosolicitadotres['costomenu'];
            $costototaltres=$serviciosolicitadotres['costototal'];
            
            $serviciosolicitadocuatro=pg_fetch_array($serviciosolicitadoresult,3);;
            $tiposerviciocuatro = $serviciosolicitadocuatro['tiposervicio'];
            $personassugeridascuatro =$serviciosolicitadocuatro['personassugeridas'];
            $menucuatro =$serviciosolicitadocuatro['menu'];
            $costomenucuatro=$serviciosolicitadocuatro['costomenu'];
            $costototalcuatro=$serviciosolicitadocuatro['costototal'];
            
            
            break;
    }



						//CERRAMOS BUSQUEDA DEL REFRIGERIO

    					//BUSCAMOS EL NOMBRE Y EL DEPARTAMENTO AL QUE PERTENECE
    $cedula = $row[2];

    $persona= new persona(null,null,null,null,null,null); // instanciamos
    $resultado=$persona->reporteListado($cedula); // hacemos el llamado al método
                        //CERRAMOS BUSQUEDAD
                             	//buscamos la ruta de la imagen
		require_once('../modelo/claseImgEncabezado.php');
			$idImagen = $row[5];

			$idImg= new imgEncabezado($idImagen,null,null); // instanciamos
			$resultImg=$idImg->consultarId(); // hacemos el llamado al método
			$filas=pg_fetch_array($resultImg); // guardamos la ruta de la imagen                   

    $partesfecha = explode("/", $row[1]);

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
    
    
    //A4 width : 219mm
    //default margin : 10mm each side
    //writable horizontal : 219-(10*2)=189mm
    
    $pdf = new PDF('P','mm','A4'); //use new class
    
    
    
    
    $pdf->AddPage();
    $pdf->SetFillColor(211,211,211);
    
    $pdf->Cell(195	,5,'',0,1,);
    
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','B',8);
    
    $pdf->Cell(120	,5,'',0,0);
    
    
    $pdf->Cell(30	,5,'1.No. DE SOLICITUD',0,0, );
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(40	,5,$row[0],1,1, 'C');
    
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(135	,5,'',0,0);
    $pdf->Cell(15	,5,'2.FECHA',0,0);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(10	,5,$partesfecha[0],1,0, 'C');
    $pdf->Cell(10	,5,$partesfecha[1],1,0, 'C');
    $pdf->Cell(20	,5,$partesfecha[2],1,1, 'C');
    
    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial','BI',11);
    
    //Cell(width , height , text , border , end line , [align] )
    $pdf->Cell(50	,5,'',0,0);
    $pdf->Cell(60	,5,'SOLICITUD DE REFRIGERIOS',0,1);
    
    $pdf->SetFont('Arial','BI',8);
    $pdf->Cell(90	,10,'3. DEPENDENCIA SOLICITANTE','L,R,T',0, 'C',1);
    
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    
    $pdf->MultiCell(50	,5,'4. NOMBRE Y APELLIDO DEL SOLICITANTE',1,'C',1);
    
    
    //return the position for next cell next to the multicell
    //and offset the x with multicell width
    $pdf->SetXY($xPos + 50 , $yPos);
    $pdf->MultiCell(50	,5,'5. NOMBRE DEL CURSO O EVENTO',1,'C',1);
    
    $pdf->SetFont('Arial','',8);
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    $pdf->MultiCell(90	,10,$row[3],1,'C');
    
    
    //return the position for next cell next to the multicell
    //and offset the x with multicell width
    
    $pdf->SetXY($xPos + 90 , $yPos);
    
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    $pdf->MultiCell(50	,10,$resultado[1]." ".$resultado[2],1,'C');
    
    $pdf->SetXY($xPos + 50 , $yPos);
    
    $pdf->MultiCell(50	,10,$row[4],1,'C');
    
    
    
    $pdf->SetFont('Arial','BI',8);
    
    $pdf->Cell(190	,5,'6. EVENTO O CURSO',1,1, 'C',1);
    
    $pdf->SetFont('Arial','BI',10);
    $pdf->Cell(40	,10,'FECHA',1,0, 'C',1);
    $pdf->Cell(40	,10,'HORA',1,0, 'C',1);
    $pdf->Cell(70	,10,'LUGAR',1,0, 'C',1);
    $pdf->MultiCell(40	,5,'No. DE PARTICIPANTES',1,'C',1);
    
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(40	,15,$fechauno,1,0, 'C');
    $pdf->Cell(40	,15,$horauno,1,0, 'C');
    $pdf->Cell(70	,15,$lugaruno,1,0, 'C');
    $pdf->Cell(40	,15,$participantesuno,1,1, 'C');

    $pdf->Cell(40	,15,$fechados,1,0, 'C');
    $pdf->Cell(40	,15,$horados,1,0, 'C');
    $pdf->Cell(70	,15,$lugardos,1,0, 'C');
    $pdf->Cell(40	,15,$participantesdos,1,1, 'C');

    $pdf->Cell(40	,15,$fechatres,1,0, 'C');
    $pdf->Cell(40	,15,$horatres,1,0, 'C');
    $pdf->Cell(70	,15,$lugartres,1,0, 'C');
    $pdf->Cell(40	,15,$participantestres,1,1, 'C');

    $pdf->Cell(40	,15,$fechacuatro,1,0, 'C');
    $pdf->Cell(40	,15,$horacuatro,1,0, 'C');
    $pdf->Cell(70	,15,$lugarcuatro,1,0, 'C');
    $pdf->Cell(40	,15,$participantescuatro,1,1, 'C');

    $pdf->SetFont('Arial','BI',8);
    
    $pdf->Cell(190	,10,'7. SERVICIO SOLCITADO',1,1, 'C',1);

    $pdf->SetFont('Arial','BI',10);
    $pdf->Cell(40	,10,'TIPO DE SERVICIO',1,0, 'C',0);
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    $pdf->MultiCell(40	,5,'No. DE PERSONAS SUGERIDAS',1,'C',0);
    $pdf->SetXY($xPos + 40 , $yPos);
    $pdf->Cell(45	,10,'MENU',1,0, 'C',0);
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    $pdf->MultiCell(25	,5,'COSTO DEL MENU',1,'C',0);
    $pdf->SetXY($xPos + 25 , $yPos);
    $pdf->Cell(40	,10,'COSTO TOTAL',1,1, 'C',0);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(40	,15,$tiposerviciouno,1,0, 'C');
    $pdf->Cell(40	,15,$personassugeridasuno,1,0, 'C');
    $pdf->Cell(45	,15,$menuuno,1,0, 'C');
    $pdf->Cell(25	,15,$costomenuuno,1,0, 'C');
    $pdf->Cell(40	,15,$costototaluno,1,1, 'C');

    $pdf->Cell(40	,15,$tiposerviciodos,1,0, 'C');
    $pdf->Cell(40	,15,$personassugeridasdos,1,0, 'C');
    $pdf->Cell(45	,15,$menudos,1,0, 'C');
    $pdf->Cell(25	,15,$costomenudos,1,0, 'C');
    $pdf->Cell(40	,15,$costototaldos,1,1, 'C');

    $pdf->Cell(40	,15,$tiposerviciotres,1,0, 'C');
    $pdf->Cell(40	,15,$personassugeridastres,1,0, 'C');
    $pdf->Cell(45	,15,$menutres,1,0, 'C');
    $pdf->Cell(25	,15,$costomenutres,1,0, 'C');
    $pdf->Cell(40	,15,$costototaltres,1,1, 'C');

    $pdf->Cell(40	,15,$tiposerviciocuatro,1,0, 'C');
    $pdf->Cell(40	,15,$personassugeridascuatro,1,0, 'C');
    $pdf->Cell(45	,15,$menucuatro,1,0, 'C');
    $pdf->Cell(25	,15,$costomenucuatro,1,0, 'C');
    $pdf->Cell(40	,15,$costototalcuatro,1,1, 'C');

    
    $pdf->SetFont('Arial','BI',8);
    
    $pdf->Cell(190	,10,'8. FIRMAS AUTORIZADAS',1,1, 'C',1);

    $pdf->Cell(48	,35,'',1,0, 'C');
    $pdf->Cell(47	,35,'',1,0, 'C');
    $pdf->Cell(47	,35,'',1,0, 'C');
    $pdf->Cell(48	,35,'',1,1, 'C');

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48	,10,'SOLICITANTE',1,0, 'C', 1);
    $pdf->Cell(47	,10,'NUTRICION Y DIETETICA',1,0, 'C', 1);
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    $pdf->MultiCell(47	,5,'SUBDIRECCION ADMINISTRATIVA',1,'C',1);
    $pdf->SetXY($xPos + 47 , $yPos);
    $pdf->Cell(48	,10,'DIRECCION',1,1, 'C', 1);
  

    
    
    
    
    
    
    
    
    
    
    
    $pdf->Output();
?>