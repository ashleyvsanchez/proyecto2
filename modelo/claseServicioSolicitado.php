<?php

	include_once('conexion.php'); // clase que conecta con la db

	class serviciosolicitado{
        //ATRIBUTOS
        private $idserviciosolictado; //
        private $tiposervicio; //Tipo de servicio (por alguna razon marca las fechas)
        private $personassugeridas; //Numero de personas sugeridas
        private $menu; //Menu
        private $costomenu; //Costo por menu
        private $costototal; //Costo total

        //Getter's and setter's
        
        public function getidserviciosolicitado() { return $this->idserviciosolicitado; }
        public function setidserviciosolicitado($idserviciosolicitado) { $this->idserviciosolicitado= $idserviciosolicitado;}

		public function gettiposervicio() { return $this->tiposervicio; }
        public function settiposervicio($tiposervicio) { $this->tiposervicio= $tiposervicio;}
        
		public function getpersonassugeridas() { return $this->personassugeridas; }
        public function setpersonassugeridas($personassugeridas) { $this->personassugeridas= $personassugeridas;}

        public function getmenu() { return $this->menu; }
        public function setmenu($menu) { $this->menu= $menu;}

        public function getcostomenu() { return $this->costomenu; }
        public function setcostomenu($costomenu) { $this->costomenu= $costomenu;}

        public function getcostototal() { return $this->costototal; }
        public function setcostototal($costototal) { $this->costototal= $costototal;}
        
		



		//Construct

		//CONSTRUCT
		public function __construct($idserviciosolicitado=null, $tiposervicio=null, $personassugeridas=null, $menu=null, $costomenu=null, $costototal=null)
		{

			if($idserviciosolicitado!=null)
			{
				$this->setidserviciosolicitado($idserviciosolicitado);
			}else{
				$this->setidserviciosolicitado(0);
			}

			if($tiposervicio!=null)
			{
				$this->settiposervicio($tiposervicio);
			}else{
				$this->settiposervicio("");
			}

			if($personassugeridas!=null)
			{
				$this->setpersonassugeridas($personassugeridas);
			}else{
				$this->setpersonassugeridas(" ");
			}


			if($menu != null){
				$this->setmenu($menu);
			}else{
				$this->setmenu(" ");
            }
            
            if($costomenu != null){
				$this->setcostomenu($costomenu);
			}else{
				$this->setcostomenu(" ");
            }
            
            if($costototal != null){
				$this->setcostototal($costototal);
			}else{
				$this->setcostototal(" ");
			}
		}


		public function toString()
		{
            return  "ID Servicio Solicitado: " . $this->getidserviciosolicitado() . "<br> Tipo de Servicio: ". $this->gettiposervicio() 
            . "<br>"."Numero de personas sugeridas: " . $this->getpersonassugeridas() . "<br>"."Menu: " . $this->getmenu() 
            . "<br>"."Costo por menu: " . $this->getcostomenu() . "<br>"."Costo total: " . $this->getcostototal();
		}

      

        //---------------MÉTODOS DEL CRUD----------------\\

								//------CREAR EVENTO O CURSO-----
		public function crearServicioSolicitado(){
            $conexion=new conexion();
            $queryconteo ="
            SELECT idr
            FROM refrigerio
            ORDER BY iddoc DESC
            LIMIT 1";
            $conteo= pg_query($conexion->getStrcnx(),$queryconteo);
            $num=pg_fetch_array($conteo);
			try{
	


					
				
						//--INSERTAMOS EN LA TABLA SERVICIOSOLICITADO--//
					$query = "INSERT INTO serviciosolicitado(tiposervicio, personassugeridas, menu, costomenu, costototal, idr)
                    VALUES ("."'".$this->gettiposervicio()."'".","."'".$this->getpersonassugeridas().
                    "'".","."'".$this->getmenu()."',"."'".$this->getcostomenu()."',"
                    ."'".$this->getcostototal()."','".$num["idr"]."');";

					$resultado=pg_query($conexion->getStrcnx(),$query);
				

					if($resultado==true){
						return true;
					}else{
						return false;
					}


				
				}catch(Exception $e){
					$this->getStrcnx(null);
					echo "error".$e->getMessage()."<br>";
					die("");
				}
		}
					
				//------CONSULTAR SERVICIO SOLICITADO-----


				public function consultarServicioSolicitado($IDR){
					$conexion=new conexion();


					$query = "SELECT s.tiposervicio, s.personassugeridas, s.menu, s.costomenu, s.costototal, s.idserviciosolicitado
						FROM  serviciosolicitado as s
						where s.idr ="."'".$IDR."'"
						."order by idserviciosolicitado";

				$result=pg_query($conexion->getStrcnx(),$query);
				pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

				return $result;
		
	}

	public function modificarServicioSolicitado(){

		$conexion=new conexion();
	  
				try{
				
	
								//--INSERTAMOS EN LA TABLA SERVICIO SOLICITADO--//
					$query = "UPDATE serviciosolicitado
								SET tiposervicio="."'".$this->gettiposervicio()."',"."
								personassugeridas="."'".$this->getpersonassugeridas()."',"."
								menu="."'".$this->getmenu()."',"."
								costomenu="."'".$this->getcostomenu()."',"."
								costototal="."'".$this->getcostototal()."'"."
								WHERE idserviciosolicitado="."'".$this->getidserviciosolicitado()."'".";";	

	
					$resultado=pg_query($conexion->getStrcnx(),$query);
				   
	
					if($resultado==true){
						return true;
					}else{
						return false;
					}
	
	
				
				}catch(Exception $e){
					$this->getStrcnx(null);
					echo "error".$e->getMessage()."<br>";
					die("");
				}
	
			}
        

    }			

?>