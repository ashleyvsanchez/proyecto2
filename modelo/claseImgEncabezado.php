<?php

	include_once('conexion.php');

	class imgEncabezado
	{	
		//ATRIBUTOS
		private $idImg;
        private $ruta;
        private $fecha;
        

		//Getter's and setter's

		public function getIdImg() { return $this->idImg; }
        public function setIdImg($idImg) { $this->idImg= $idImg; }
        
        public function getRuta() { return $this->ruta; }
        public function setRuta($ruta) { $this->ruta= $ruta; } 
        
        public function getFecha() { return $this->fecha; }
		public function setFecha($fecha) { $this->fecha= $fecha; } 

		//CONSTRUCT
		function __construct($idImg=null, $ruta=null, $fecha=null)
		{
			if($idImg!=null)
			{
				$this->setIdImg($idImg);
			}else{
				$this->setIdImg(0);
			}

			if($ruta!=null)
			{
				$this->setRuta($ruta);
			}else{
				$this->setRuta(" ");
            }
            
            if($fecha!=null)
			{
				$this->setFecha($fecha);
			}else{
				$this->setFecha(" ");
			}
		}

		//TO STRING

		public function toString()
		{
			return  "id: " . $this->getIdImg() . "<br>" . "ruta: " . $this->getRuta(). "<br>" . "fecha: " . $this->getFecha() ;
		}



		//-------------------MÉTODOS---------------------


		//-------------------guardamos la imagen---------------------
		public function guardarImagen(){
			//echo $this->getIdimg() . "<br>" . $this->getRuta() . "<br>" . $this->getFecha();
            $conexion=new conexion();
            
            /*echo $query = "INSERT INTO imgEncabezado(fecha,ruta)
				VALUES ("."'".$this->getFecha()."'".","."'".$this->getRuta()."'".");";
            */
            
			try{
				$query = "INSERT INTO imgEncabezado(fecha,ruta)
				VALUES ("."'".$this->getFecha()."'".","."'".$this->getRuta()."'".");";

				$result=pg_query($conexion->getStrcnx(),$query);
				//pg_close($result);  // CERRARMOS LA CONEXION A LA DB
				pg_close($conexion->getStrcnx());

				return $result;
				

				}catch(Exception $e){
					$this->getStrcnx(null);
					echo "error".$e->getMessage()."<br>";
					die("");
				}
		}
		

		//----------------consultamos la imagen------------------

		public function consultarImagen(){

			$conexion=new conexion();

			$query ="SELECT * FROM imgEncabezado";
			$resultado =pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
			
			return $resultado;
		}


		//----------------consultamos el ID de la imagen------------------

		public function consultarId(){

			$conexion=new conexion();

			$query ="SELECT * FROM imgEncabezado
						WHERE idimg=".$this->getIdImg().";";
			$resultado =pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
			
			return $resultado;
		}


		//----------------consultamos la ruta de la imagen------------------

		public function consultarRuta(){

			$conexion=new conexion();

			$query ="SELECT * FROM imgEncabezado
						WHERE ruta='".$this->getRuta()."';";
			$resultado =pg_query($conexion->getStrcnx(),$query);

			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
			
			return $resultado;
		}
        
    }

?>