<?php

	require_once("claseDocumento.php"); // clase de la cual heredamos  datos
	include_once('conexion.php'); // clase que conecta con la db

	class refrigerio extends documento{
        //ATRIBUTOS
        private $idr; //id refrigerio
		private $depensol; // Dependencia solicitante.
		private $cursoevento; // Nombre del curso o evento.

        //Getter's and setter's
        
        public function getidr() { return $this->idr; }
        public function setidr($idr) { $this->idr= $idr;}

		public function getdepensol() { return $this->depensol; }
        public function setdepensol($depensol) { $this->depensol= $depensol;}
        
		public function getcursoevento() { return $this->cursoevento; }
        public function setcursoevento($cursoevento) { $this->cursoevento= $cursoevento;}
        
		



		//Construct

		public function __construct($idDocumento=null, $fecha=null, $estatus=null, $cedula=null, $tipodoc=null, $idImg=null, $idr=null, $depensol=null, $cursoevento=null){
			parent::__construct($idDocumento,$fecha,$estatus,$cedula,$tipodoc,$idImg);
			{

				if($idr!=null){
					$this->setidr($idr);
				}else{
					$this->setidr(" ");
				}

				if($depensol!=null){
					$this->setdepensol($depensol);
				}else{
					$this->setdepensol(" ");
                }
                
                if($cursoevento!=null){
					$this->setcursoevento($cursoevento);
				}else{
					$this->setcursoevento(" ");
                }
                  

			}

		}


		//TO STRING

		public function toString(){
            return parent::toString() . "<br>ID Refrigerio: ". $this->getidr() . "<br>"."Dependencia Solicitante: ". $this->getdepensol() . "<br>". "Curso o Evento: ". $this->getcursoevento();
        }

        public function contarRefrigerio(){
            $conexion=new conexion();
			
            $query ="SELECT * FROM refrigerio";
            $result =pg_query($conexion->getStrcnx(),$query);
            $num = pg_num_rows ($result);

            return $num;
        }

        //---------------MÉTODOS DEL CRUD----------------\\

								//------CREAR SOLCITUD DE REFRIGERIO-----
		public function crearRefrigerio(){
			$conexion=new conexion();
			
			try{
						//--INSERTAMOS EN LA CLASE DOCUMENTO--//
                        $query = "INSERT INTO documento(fechad, estatus, cedulad, tipodoc, idimg)
						VALUES ("."'".$this->getFecha()."'".","."'".$this->getEstatus()."'".","."'".$this->getCedula()."',"."3".",".$this->getIdImg().");";


					
					$result=pg_query($conexion->getStrcnx(),$query);


                    $query ="SELECT * FROM documento";
                    $result =pg_query($conexion->getStrcnx(),$query);
                    $num = pg_num_rows ($result);
						//--INSERTAMOS EN LA TABLA REFRIGERIO--//
					$query1 = "INSERT INTO refrigerio(idr, dependencia, cursoevento, iddoc)
                    VALUES ("."'".$this->getidr()."'".","."'".$this->getdepensol().
                    "'".","."'".$this->getcursoevento()."',".$num.");";

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
        //------CONSULTAR SOLICITUD DE REFRIGERIO x ID-----

	
        public function consultarIdRefrigerio($depid){
            $conexion=new conexion();


             $query = "SELECT r.idr, d.fechad, d.cedulad, dep.nombred, r.cursoevento, d.idimg
                    FROM refrigerio as r, documento as d,  departamento as dep
                    where r.iddoc = d.iddoc and r.dependencia = dep.idd and r.idr="."'".$this->getidr()."' and r.dependencia =".$depid;

            $result=pg_query($conexion->getStrcnx(),$query);
            pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

            return $result;
            
        }



        //----CONSULTAR X ID DOCUMENTO -----//

				public function consultarIdDocumentoRefrigerio(){
					$conexion=new conexion();
		
					$query = "SELECT r.idr, d.iddoc, t.nombretipo, e.nombree
						FROM refrigerio as r, documento as d, tipodocumento as t, estatus as e
						where t.idtipo='3' and r.iddoc ="."'".$this->getIdDocumento()."'";
		
					$result=pg_query($conexion->getStrcnx(),$query);
					pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
		
					return $result;
					
				}

    		//------CONSULTAR SOLICITUD DE REFRIGERIO x FECHA-----

	
            public function consultarFechaRefrigerio($depid){
                $conexion=new conexion();

                $query = "SELECT r.idr, d.fechad, d.cedulad, dep.nombred, r.cursoevento, d.iddoc
                FROM refrigerio as r, documento as d, departamento as dep
                where r.iddoc = d.iddoc and r.dependencia = dep.idd and r.dependencia =".$depid."and d.fechad="."'".$this->getFecha()."'";
    
    
                $result=pg_query($conexion->getStrcnx(),$query);
                pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
    
                return $result;
            } 


            public function consultarFechaRefrigerioVista($depid){
                $conexion=new conexion();

                $query = "SELECT distinct (d.fechad)
                FROM refrigerio as r, documento as d, departamento as dep
                where r.iddoc = d.iddoc and r.dependencia = dep.idd and r.dependencia =".$depid;
    
    
                $result=pg_query($conexion->getStrcnx(),$query);
                pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
    
                return $result;
            } 
            
            //------CONSULTAR SOLICITUD DE REFRIGERIO x DEPENDENCIA SOLICITANTE-----

	
            public function consultarDependenciaRefrigerio(){
                $conexion=new conexion();
    
                $query = "SELECT r.idr, d.fechad, d.cedulad, r.dependencia, r.cursoevento, d.iddoc, e.nombree, t.nombretipo
                FROM refrigerio as r, documento as d, estatus as e, tipodocumento as t
                where r.iddoc = d.iddoc and d.estatus = e.idestatus and d.tipodoc = t.idtipo and r.dependencia="."'".$this->getdepensol()."'";

            
    
                $result=pg_query($conexion->getStrcnx(),$query);
                pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
    
                return $result;
            }  

               //------CONSULTAR SOLICITUD DE REFRIGERIO x CURSO O EVENTO-----

	
               public function consultarCursoEventoRefrigerio($depid){
                $conexion=new conexion();

                $query = "SELECT r.idr, d.fechad, d.cedulad, dep.nombred, r.cursoevento, d.iddoc
                FROM refrigerio as r, documento as d, departamento as dep
                where r.iddoc = d.iddoc and r.dependencia = dep.idd and r.dependencia =".$depid."and r.cursoevento="."'".$this->getcursoevento()."'";
    
            
            
    
                $result=pg_query($conexion->getStrcnx(),$query);
                pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
    
                return $result;
            }  
        

                //------CONSULTAR SOLICITUD DE REFRIGERIO-----


                public function consultarRefrigerio($depid){
                    $conexion=new conexion();


                    $query = "SELECT r.idr, d.fechad, d.cedulad, dep.nombred, r.cursoevento, d.iddoc
                           FROM refrigerio as r, documento as d, departamento as dep
                           where r.iddoc = d.iddoc and r.dependencia = dep.idd and r.dependencia =".$depid;
       
                   $result=pg_query($conexion->getStrcnx(),$query);
                   pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
       
                   return $result;
                    
                }


                


                public function modificarRefrigerio(){

                    $conexion=new conexion();
        
                    
        
                    //MODIFICAMOS EL REFRIGERIO
                    try{
                    
        
                                    //--INSERTAMOS EN LA CLASE REFRIGERIO--//
                        $query = "UPDATE refrigerio
                                    SET 
                                    cursoevento="."'".$this->getcursoevento()."'"."
                                    WHERE idr="."'".$this->getidr()."'".";";	

        
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


                //--- VALIDAR REFRIGERIO X ID DOCUMENTO

						public function validarRefrigerio(){

							$conexion = new conexion();
							
							$query = "SELECT r.idr, d.iddoc, t.nombretipo  
									 FROM documento as d,
										   refrigerio as r,
										   tipodocumento as t
									 WHERE  r.iddoc = "."'".$this->getIdDocumento()."'";
				
								$result=pg_query($conexion->getStrcnx(),$query);
			
								if(pg_num_rows($result)>0)
									return true;
								else
									return false;
			
                        }
                        


                        public function validarRefrigerioDependencia(){

                            $conexion = new conexion();
                            
                            $query = "SELECT *
                                     FROM refrigerio
                                     WHERE  dependencia = "."'".$this->getDepensol()."'";
                
                                $result=pg_query($conexion->getStrcnx(),$query);
            
                                if(pg_num_rows($result)>0)
                                    return true;
                                else
                                    return false;
            
                        }



                        public function consultarDocumentoRefrigerio(){
                            $conexion=new conexion();
        
        
                            $query = "SELECT d.iddoc, d.fechad, r.cursoevento, t.nombretipo
                                   FROM refrigerio as r, documento as d, tipodocumento as t
                                   where t.idtipo='3' and r.iddoc = d.iddoc and d.estatus=2 and r.dependencia=".$this->getdepensol();
               
                           $result=pg_query($conexion->getStrcnx(),$query);
                           pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
               
                           return $result;
                            
                        }
        

        

    }			

?>