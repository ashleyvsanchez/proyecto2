<?php

	require_once("claseDocumento.php"); // clase de la cual heredamos  datos
	include_once('conexion.php'); // clase que conecta con la db

	class servicio extends documento{
		//ATRIBUTOS
		private $NoS; // Número solicitud de servicio.
		private $Dep; // Departamento de adscripción (No estoy seguro de si esto debería ser colocado automaticamente).
		private $Trabajo; // Trabajo a realizar.
        private $Lugar; 
        private $DescTrabajo; // Descripción del trabajo.

		//Getter's and setter's

		public function getNoS() { return $this->NoS; }
        public function setNoS($NoS) { $this->NoS= $NoS;}
        
		public function getDep() { return $this->Dep; }
        public function setDep($Dep) { $this->Dep= $Dep;}
        
		public function getTrabajo() { return $this->Trabajo; }
        public function setTrabajo($Trabajo) { $this->Trabajo= $Trabajo;}
        
		public function getLugar() { return $this->Lugar; }
        public function setLugar($Lugar) { $this->Lugar= $Lugar;}
        
		public function getDescTrabajo() { return $this->DescTrabajo; }
		public function setDescTrabajo($DescTrabajo) { $this->DescTrabajo= $DescTrabajo;}



		//Construct

		public function __construct($idDocumento=null, $fecha=null, $estatus=null, $cedula=null, $tipodoc=null, $idImg=null, $NoS=null, $Dep=null, $Trabajo=null, $Lugar=null, $DescTrabajo=null){
			parent::__construct($idDocumento,$fecha,$estatus,$cedula,$tipodoc,$idImg);
			{

				if($NoS!=null){
					$this->setNoS($NoS);
				}else{
					$this->setNoS(0);
				}

				if($Dep!=null){
					$this->setDep($Dep);
				}else{
					$this->setDep(" ");
                }
                
                if($Trabajo!=null){
					$this->setTrabajo($Trabajo);
				}else{
					$this->setTrabajo(" ");
                }
                
                if($Lugar!=null){
					$this->setLugar($Lugar);
				}else{
					$this->setLugar(" ");
				}

                if($DescTrabajo!=null){
					$this->setDescTrabajo($DescTrabajo);
				}else{
					$this->setDescTrabajo(" ");
                }
                
                

			}

		}


		//TO STRING

		public function toString(){
            return parent::toString() . "<br>Numero de Solicitud de Servicio: ". $this->getNoS() . "<br>"."Departamento de Adscripcion: ". $this->getDep() . "<br>". "Trabajo: ". $this->getTrabajo() . "<br>Lugar: " . $this->getLugar(). "<br>Descripcion del trabajo: " . $this->getDescTrabajo();
        }

        //---------------MÉTODOS DEL CRUD----------------\\

								//------CREAR SOLCITUD DE SERVICIO-----
		public function crearServicio(){
			$conexion=new conexion();
			
			try{
						//--INSERTAMOS EN LA CLASE DOCUMENTO--//
						$query = "INSERT INTO documento(fechad, estatus, cedulad, tipodoc, idimg)
						VALUES ("."'".$this->getFecha()."'".","."'".$this->getEstatus()."'".","."'".$this->getCedula()."',"."2".",".$this->getIdImg().");";


					
					$result=pg_query($conexion->getStrcnx(),$query);


                    $query ="SELECT * FROM documento";
                    $result =pg_query($conexion->getStrcnx(),$query);
                    $num = pg_num_rows ($result);
						//--INSERTAMOS EN LA TABLA SERVICIO--//
					$query1 = "INSERT INTO servicio(dep, trabajo, lugar, descripcion, iddoc)
                    VALUES ("."'".$this->getDep()."'".","."'".$this->getTrabajo().
                    "'".","."'".$this->getLugar()."'".","."'".$this->getDescTrabajo()."'".","."'".$num."');";

					$resultado=pg_query($conexion->getStrcnx(),$query1);
				

					if(($result == true) && $resultado==true){
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
        
        		//------CONSULTAR SOLICITUD DE SERVICIO x ID-----

	
                public function consultarIdServicio($depid){
                    $conexion=new conexion();
        
                    $query = "SELECT s.nos, d.fechad, d.cedulad, dep.nombred, s.trabajo, s.lugar, s.descripcion, d.idimg
                        FROM servicio as s, documento as d, departamento as dep
                        where s.dep = dep.idd and s.iddoc = d.iddoc and s.nos="."'".$this->getNoS()."' and s.dep =".$depid;
        
                    $result=pg_query($conexion->getStrcnx(),$query);
                    pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
        
                    return $result;
                    
				}

				//----CONSULTAR X ID DOCUMENTO -----//

				public function consultarIdDocumentoServicio(){
					$conexion=new conexion();
		
					$query = "SELECT s.nos, d.iddoc, t.nombretipo
						FROM servicio as s, documento as d, tipodocumento as t
						where t.idtipo='2' and s.iddoc ="."'".$this->getIdDocumento()."'";
		
					$result=pg_query($conexion->getStrcnx(),$query);
					pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
		
					return $result;
					
				}
				
					//------CONSULTAR SOLICITUD DE SERVICIO x FECHA-----

	
					public function consultarFechaServicio($depid){
						$conexion=new conexion();
			
						$query = "SELECT s.nos, d.fechad, d.cedulad, dep.nombred, s.trabajo, s.lugar, s.descripcion
							FROM servicio as s, documento as d, departamento as dep
							where s.dep = dep.idd and s.iddoc = d.iddoc and d.fechad="."'".$this->getFecha()."'and s.dep =".$depid;
			
						$result=pg_query($conexion->getStrcnx(),$query);
						pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
			
						return $result;
					}



					public function consultarFechaServicioVista($depid){
						$conexion=new conexion();
			
						$query = "SELECT distinct (d.fechad)
							FROM servicio as s, documento as d, departamento as dep
							where s.dep = dep.idd and s.iddoc = d.iddoc and s.dep =".$depid;
			
						$result=pg_query($conexion->getStrcnx(),$query);
						pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
			
						return $result;
					}

					//------CONSULTAR SOLICITUD DE SERVICIO x DEPARTAMENTO DE ADSCRIPCION-----

	
					public function consultarDepServicio(){
						$conexion=new conexion();
			
						$query = "SELECT s.nos, d.fechad, d.cedulad, dep.nombred, s.trabajo, s.lugar, s.descripcion, d.iddoc, e.nombree, t.nombretipo
							FROM servicio as s, documento as d, departamento as dep, tipodocumento as t, estatus as e
							where s.dep = dep.idd and s.iddoc = d.iddoc and d.estatus = e.idestatus and d.tipodoc = t.idtipo and s.dep="."'".$this->getDep()."'";
			
						$result=pg_query($conexion->getStrcnx(),$query);
						pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
			
						return $result;
						
					}

					//------CONSULTAR SOLICITUD DE SERVICIO x TRABAJO A REALIZAR-----

	
					public function consultarTrabajoServicio($depid){
						$conexion=new conexion();
			
						$query = "SELECT s.nos, d.fechad, d.cedulad, dep.nombred, s.trabajo, s.lugar, s.descripcion
							FROM servicio as s, documento as d, departamento as dep
							where s.dep = dep.idd and s.iddoc = d.iddoc and s.trabajo="."'".$this->getTrabajo()."'and s.dep =".$depid;
			
						$result=pg_query($conexion->getStrcnx(),$query);
						pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
			
						return $result;
						
					}

						//------CONSULTAR SOLICITUD DE SERVICIO-----

	
						public function consultarServicio($depid){
							$conexion=new conexion();
				
							$query = "SELECT s.nos, d.fechad, d.cedulad, dep.nombred, s.trabajo, s.lugar, s.descripcion
								FROM servicio as s, documento as d, departamento as dep
								where s.dep = dep.idd and s.iddoc = d.iddoc and s.dep =".$depid;
				
							$result=pg_query($conexion->getStrcnx(),$query);
							pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
				
							return $result;
							
						}

						public function modificarServicio(){

							$conexion=new conexion();
				
							
				
							//MODIFICAMOS EL DOCUMENTO Y EL MEMO
							try{
							
				
											//--INSERTAMOS EN LA CLASE MEMO--//
								$query = "UPDATE servicio
											SET trabajo="."'".$this->getTrabajo()."',"."
											lugar="."'".$this->getLugar()."',"."
											descripcion="."'".$this->getDescTrabajo()."'"."
											WHERE nos="."'".$this->getNoS()."'".";";	
				
								$resultado=pg_query($conexion->getStrcnx(),$query);
								//pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
				
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
				
			
			

						//--- VALIDAR SERVICIO X ID DOCUMENTO

						public function validarServicio(){

							$conexion = new conexion();
							
							$query = "SELECT s.nos, d.iddoc, t.nombretipo  
									 FROM documento as d,
										   servicio as s,
										   tipodocumento as t
									 WHERE  s.iddoc = "."'".$this->getIdDocumento()."'";
				
								$result=pg_query($conexion->getStrcnx(),$query);
			
								if(pg_num_rows($result)>0)
									return true;
								else
									return false;
			
						}


						public function validarServicioDep(){

							$conexion = new conexion();
							
							$query = "SELECT *
									 FROM servicio
									 WHERE  dep = "."'".$this->getDep()."'";
				
								$result=pg_query($conexion->getStrcnx(),$query);
			
								if(pg_num_rows($result)>0)
									return true;
								else
									return false;
			
						}


						public function consultarDocumentoServicio()
							{
								
								$conexion = new conexion();
								
								$query = "SELECT d.iddoc, d.fechad, s.iddoc, s.trabajo , s.nos
											FROM documento as d,
												 servicio as s
											WHERE d.iddoc = s.iddoc and d.estatus= 2 and s.dep="."'".$this->getDep()."'";


									$result=pg_query($conexion->getStrcnx(),$query);
								
								return $result;

							}
        


    }			

?>