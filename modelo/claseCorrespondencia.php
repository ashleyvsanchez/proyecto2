<?php

include_once('conexion.php');


	class correspondencia
	{	
		//ATRIBUTOS
		private $idCorrespondencia;
        private $origen;
        private $destino;
        private $horaEnvio;
		private $fechaEnvio;
		private $asunto;
		private $mensaje;
        private $idDocumento; 

		//Getter's and setter's

		//public function getIdCorrespondencia() { return $this->idCorrespondencia; }
		//public function setIdCorrespondencia($idCorrespondencia) { $this->idCorrespondencia= $idCorrespondencia; } 

		public function getIdCorrespondencia() { return $this->idCorrespondencia; }
		public function setIdCorrespondencia($idCorrespondencia) { $this->idCorrespondencia= $idCorrespondencia; } 

		public function getOrigen() { return $this->origen; }
		public function setOrigen($origen) { $this->origen= $origen; } 
		
		public function getDestino() { return $this->destino; }
		public function setDestino($destino) { $this->destino= $destino; } 
		
		public function getHoraEnvio() { return $this->horaEnvio; }
		public function setHoraEnvio($horaEnvio) { $this->horaEnvio= $horaEnvio; } 
		
		public function getFechaEnvio() { return $this->fechaEnvio; }
		public function setFechaEnvio($fechaEnvio) { $this->fechaEnvio= $fechaEnvio; } 

		public function getAsunto() { return $this->asunto; }
		public function setAsunto($asunto) { $this->asunto= $asunto; } 

		public function getMensaje() { return $this->mensaje; }
		public function setMensaje($mensaje) { $this->mensaje= $mensaje; } 
		
		public function getIdDocumento() { return $this->idDocumento; }
		public function setIdDocumento($idDocumento) { $this->idDocumento= $idDocumento; } 

		
		


        function __construct($idCorrespondencia=null, $origen=null, $destino=null,  $horaEnvio=null, $fechaEnvio=null, $asunto=null , $mensaje=null ,$idDocumento = null)
		{
			
			if($idCorrespondencia!=null){$this->setIdCorrespondencia($idCorrespondencia);}
			else{$this->setIdCorrespondencia("");}

            if($origen!=null){$this->setOrigen($origen);}
			else{$this->setOrigen("");}

			if($destino!=null){$this->setDestino($destino);}
			else{$this->setDestino("");}
            
			if($horaEnvio!=null){$this->setHoraEnvio($horaEnvio);}
			else{$this->setHoraEnvio("");}   
            
			if($fechaEnvio!=null){$this->setFechaEnvio($fechaEnvio);}
			else{ $this->setFechaEnvio("");}

			if($asunto!=null){$this->setAsunto($asunto);}
			else{$this->setAsunto("");}

			if($mensaje!=null){$this->setMensaje($mensaje);}
			else{$this->setMensaje("");}

			if($idDocumento!=null){$this->setIdDocumento($idDocumento);}
			else{$this->setIdDocumento("");}

	



		}

		public function toString()
		{
			return  "Id correspondencia: " . $this->getIdCorrespondencia(). "<br>" . "Origen: " . $this->getOrigen() . "<br>" . "Destino: ".  $this->getDestino()  ."<br>" . "Hora de envio: " . $this->getHoraEnvio() . "<br>" . "Fecha de envio: " . $this->getFechaEnvio(). "<br>". "Asunto: " . $this->getAsunto()."<br>". "Mensaje: ". $this->getMensaje() . "<br>". "Id Documento: " . $this->getIdDocumento();
        }


		//Metodos

		public function enviarCorrespondencia()
		{
			$conexion = new conexion();
			try{
				$query = "INSERT INTO correspondencia (emisor,receptor,fechaenvio,horaenvio,asuntoc,mensajec,iddoc) 
								VALUES("."'".$this->getOrigen()."'".","."'".$this->getDestino()."'".","."'".$this->getFechaEnvio()."'".","."'".$this->getHoraEnvio()."'".","."'".$this->getAsunto()."'".","."'".$this->getMensaje()."'".","."'".$this->getIdDocumento()."');";
								
								
			$result=pg_query($conexion->getStrcnx(),$query);
			
			//pg_close($result);  // CERRARMOS LA CONEXION A LA DB

			return $result;

			}catch(Exception $e){
				$this->getStrcnx(null);
				echo "error".$e->getMessage()."<br>";
				die("");
			}							



		}


		public function correspondenciaRecibida()
		{
			$conexion = new conexion();

			$query = "SELECT c.emisor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and receptor="."'".$this->getDestino()."';";

					  
		 	$result = pg_query($conexion->getStrcnx(),$query);
			


			 if(pg_num_rows($result)>0)
				  return $result;
				else
				  return false;

			 
				  pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

		}




		public function correspondenciaEnviada()
		{
			$conexion = new conexion();

			$query = "SELECT c.receptor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and emisor="."'".$this->getOrigen()."';";

					  
			 $result = pg_query($conexion->getStrcnx(),$query);
			 

			 if(pg_num_rows($result)>0)
				  return $result;
				else
				  return false;
			
			 pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			 

		}


		//----------------CONSULTAR CORRESPONDENCIA ENVIADA-------------//
		// consultar por receptor

		public function consultarReceptor()
		{
			$conexion = new conexion();

			$query = "SELECT c.receptor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and receptor="."'".$this->getDestino()."';";

					  
		 	$result = pg_query($conexion->getStrcnx(),$query);
			
			 pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			 return $result;

		}

		// consultar por asunto

		public function consultarAsunto()
		{
			$conexion = new conexion();

			$query = "SELECT c.receptor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and emisor="."'".$this->getOrigen()."' and c.asuntoc="."'".$this->getAsunto()."';";

					  
		 	$result = pg_query($conexion->getStrcnx(),$query);
			
			 pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			 return $result;

		}


		// consultar por fecha
		public function consultaFechaEnvio()
		{
			$conexion = new conexion();

			$query = "SELECT c.receptor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and emisor="."'".$this->getOrigen()."' and c.fechaenvio="."'".$this->getFechaEnvio()."';";

					  
					  
		 	$result = pg_query($conexion->getStrcnx(),$query);
			
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			 return $result;

		}


		//----------------CONSULTAR CORRESPONDENCIA RECIBIDA-------------//
		// consultar por asunto

		public function consultarAsuntoRecibido()
		{
			$conexion = new conexion();

			$query = "SELECT c.emisor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and receptor="."'".$this->getDestino()."' and c.asuntoc="."'".$this->getAsunto()."';";

					  
		 	$result = pg_query($conexion->getStrcnx(),$query);
			
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			return $result;

		}


		// consultar por fecha
		public function consultaFechaRecibido()
		{
			$conexion = new conexion();

			$query = "SELECT c.emisor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and receptor="."'".$this->getDestino()."' and c.fechaenvio="."'".$this->getFechaEnvio()."';";

					  
					  
		 	$result = pg_query($conexion->getStrcnx(),$query);
			
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			 return $result;

		}

		// consultar por emisor

		public function consultarEmisor()
		{
			$conexion = new conexion();

			$query = "SELECT c.emisor,c.asuntoc,c.mensajec,c.fechaenvio,c.horaenvio,c.iddoc , e.nombree
			 		  FROM correspondencia as c, documento as d, estatus as e
					  Where d.iddoc = c.iddoc and d.estatus = e.idestatus and receptor="."'".$this->getDestino()."' and c.emisor="."'".$this->getOrigen()."';";

		 	$result = pg_query($conexion->getStrcnx(),$query);
			
			 pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			 return $result;

		}





		function consultarDocumentosEstatus($idDepartamento){

			$conexion = new conexion();

			$query = "select distinct(d.iddoc), d.tipodoc
						from documento as d, memo as m, correspondencia as c, servicio as s, refrigerio as r
						where d.iddoc=c.iddoc and c.iddoc=m.iddoc and m.de=".$idDepartamento." or 
						d.iddoc=c.iddoc and c.iddoc=s.iddoc and s.dep=".$idDepartamento." or 
						d.iddoc=c.iddoc and c.iddoc=r.iddoc and r.dependencia=".$idDepartamento.";";

			  	$result = pg_query($conexion->getStrcnx(),$query);
			  
			  if(pg_num_rows($result)>0)
				  return $result;
				else
				  return false;
			
			 pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			 return $result;

		}






















	}

?>