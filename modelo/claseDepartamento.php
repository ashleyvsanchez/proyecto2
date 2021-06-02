<?php

	include_once('conexion.php');

	class departamento
	{	
		//ATRIBUTOS
		private $idDepartamento;
		private $nombreDepartamento;
		private $fechaCreacion;

		//Getter's and setter's

		public function getIdDepartamento() { return $this->idDepartamento; }
		public function setIdDepartamento($idDepartamento) { $this->idDepartamento= $idDepartamento; } 

		public function getNombreDepartamento() { return $this->nombreDepartamento; }
		public function setNombreDepartamento($nombreDepartamento) { $this->nombreDepartamento= $nombreDepartamento; } 
		
		public function getFechaCreacion() { return $this->fechaCreacion; }
		public function setFechaCreacion($fechaCreacion) { $this->fechaCreacion= $fechaCreacion; } 


		//CONSTRUCT
		function __construct($idDepartamento=null, $nombreDepartamento=null, $fechaCreacion=null)
		{
			if($idDepartamento!=null)
			{
				$this->setIdDepartamento($idDepartamento);
			}else{
				$this->setIdDepartamento(0);
			}

			if($nombreDepartamento!=null)
			{
				$this->setNombreDepartamento($nombreDepartamento);
			}else{
				$this->setNombreDepartamento(" ");
			}

			if($fechaCreacion!=null)
			{
				$this->setFechaCreacion($fechaCreacion);
			}else{
				$this->setFechaCreacion(" ");
			}
		}

		//TO STRING

		public function toString()
		{
			return  "id Departamento: " . $this->getIdDepartamento() . "<br>" . "nombre Departamento: " . $this->getNombreDepartamento() ;
		}



		//-------------------MÉTODOS---------------------

		//-------------------verificamos el departamento---------------------
		public function verificarDatosDepartamento(){
			$conexion=new conexion();
			$query = "SELECT nombred, iddepa
				from departamento
				where  nombred="."'".$this->getNombreDepartamento()."'"."or iddepa=".$this->getIdDepartamento();

			$result=pg_query($conexion->getStrcnx(),$query);
			//pg_close($result);
			pg_close($conexion->getStrcnx());

			$row = pg_fetch_array($result);
			return $row;
		}


		//-------------------creamos el departamento---------------------
		public function crearDepartamento(){
			//echo $this->getNombreDepartamento() . "<br>" . $this->getIdDepartamento();
			$conexion=new conexion();

			try{
				$query = "INSERT INTO departamento(iddepa,nombred,fechacreacion)
				VALUES (".$this->getIdDepartamento().","."'".$this->getNombreDepartamento()."'".","."'".$this->getFechaCreacion()."'".");";
				

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


		//-------------------consultamos por nombre el departamento---------------------
		public function consultarNombreDepartamento(){
			//echo "nombre: ".$this->getNombreDepartamento();

			$conexion=new conexion();
			$query = "SELECT nombred, idd, fechacreacion
				from departamento
				where  nombred="."'".$this->getNombreDepartamento()."'";

			$result=pg_query($conexion->getStrcnx(),$query);
			//pg_close($result);
			pg_close($conexion->getStrcnx());

			$row = pg_fetch_array($result);
			return $row;


		}

		//-------------------consultamos por id el departamento---------------------
		public function consultarIdDepartamento(){
			//echo "id departamento: ". $this->getIdDepartamento();
			$conexion=new conexion();
			$query = "SELECT nombred, idd, iddepa, fechacreacion
				from departamento
				where  idd=".$this->getIdDepartamento();

			$result=pg_query($conexion->getStrcnx(),$query);
			//pg_close($result);
			pg_close($conexion->getStrcnx());

			$row=pg_fetch_array($result);
			return $row;

		}


		//-------------------consultamos el departamento---------------------
		public function consultarDepartamento(){

			$conexion=new conexion();
			$query = "SELECT nombred, idd, iddepa, fechacreacion
				from departamento";

			$result=pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx());
			//pg_close($result);

			return $result;

			

		}

		//-------------------modificar el departamento---------------------

		public function modificarDepartamento(){
			$conexion=new conexion();
			
			try{
				$query = "UPDATE departamento
						  SET nombred="."'".$this->getNombreDepartamento()."'"."
						  WHERE idd=".$this->getIdDepartamento().";";


				$result=pg_query($conexion->getStrcnx(),$query);
				//pg_close($result);  // CERRARMOS LA CONEXION A LA DB
				pg_close($conexion->getStrcnx());

				return $result;

				//$this->consultarIdDepartamento();

				}catch(Exception $e){
					$this->getStrcnx(null);
					echo "error".$e->getMessage()."<br>";
					die("");
				}	
		}

		//-------------obtenemos datos generales del documento-------
				// Método para la gestión de los documentos

		public function datosDepartamento(){
			$conexion=new conexion();

			$query = "SELECT  d.nombred, d.idd, p.nombrep, p.apellidop, p.cedulap, u.idr, r.nombrer
        		from departamento as d, persona as p, usuario as u, rol as r
        		where d.idd = p.idd 
        		and u.idr = '2' 
        		and p.cedulap = u.cedulap 
        		and u.idr = r.idr
        		and d.nombred="."'".$this->getNombreDepartamento()."';";

        	$result=pg_query($conexion->getStrcnx(),$query);
        	$row = pg_fetch_array($result);
			pg_close($conexion->getStrcnx());

			return $row;

        	//pg_close($conexion->getStrcnx());

        	//return $result;
		}

	}

?>

