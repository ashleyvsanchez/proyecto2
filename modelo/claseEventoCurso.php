<?php

	include_once('conexion.php'); // clase que conecta con la db

	class eventocurso{
        //ATRIBUTOS
        private $ideventocurso; //id evento o curso
        private $fechaec; //fecha evento o curso
        private $horaec; //hora evento o curso
        private $lugarec; //lugar evento o curso
        private $participantesec; //participantes evento o curso

        //Getter's and setter's
        
        public function getideventocurso() { return $this->ideventocurso; }
        public function setideventocurso($ideventocurso) { $this->ideventocurso= $ideventocurso;}

		public function getfechaec() { return $this->fechaec; }
        public function setfechaec($fechaec) { $this->fechaec= $fechaec;}
        
		public function gethoraec() { return $this->horaec; }
        public function sethoraec($horaec) { $this->horaec= $horaec;}

        public function getlugarec() { return $this->lugarec; }
        public function setlugarec($lugarec) { $this->lugarec= $lugarec;}

        public function getparticipantesec() { return $this->participantesec; }
        public function setparticipantesec($participantesec) { $this->participantesec= $participantesec;}
        
		



		//Construct

		//CONSTRUCT
		public function __construct($ideventocurso=null, $fechaec=null, $horaec=null, $lugarec=null, $participantesec=null)
		{

			if($ideventocurso!=null)
			{
				$this->setideventocurso($ideventocurso);
			}else{
				$this->setideventocurso(0);
			}

			if($fechaec!=null)
			{
				$this->setfechaec($fechaec);
			}else{
				$this->setfechaec("");
			}

			if($horaec!=null)
			{
				$this->sethoraec($horaec);
			}else{
				$this->sethoraec("");
			}


			if($lugarec != null){
				$this->setlugarec($lugarec);
			}else{
				$this->setlugarec(" ");
            }
            
            if($participantesec != null){
				$this->setparticipantesec($participantesec);
			}else{
				$this->setparticipantesec(" ");
			}
		}


		public function toString()
		{
            return  "ID Evento o Curso: " . $this->getideventocurso() . "<br> Fecha Evento o Curso: ". $this->getfechaec() 
            . "<br>"."Hora Evento o Curso: " . $this->gethoraec() . "<br>"."Lugar Evento o Curso: " . $this->getlugarec() . "<br>"."Participantes Evento o Curso: " . $this->getparticipantesec();
		}

      

        //---------------MÉTODOS DEL CRUD----------------\\

								//------CREAR EVENTO O CURSO-----
		public function crearEventoCurso(){
            $conexion=new conexion();
            $queryconteo ="
            SELECT idr
            FROM refrigerio
            ORDER BY iddoc DESC
            LIMIT 1";
            $conteo= pg_query($conexion->getStrcnx(),$queryconteo);
            $num=pg_fetch_array($conteo);
			try{
	


					
				
						//--INSERTAMOS EN LA TABLA EVENTOCURSO--//
					$query = "INSERT INTO eventocurso(fecha, hora, lugar, participantes,idr)
                    VALUES ("."'".$this->getfechaec()."'".","."'".$this->gethoraec().
                    "'".","."'".$this->getlugarec()."',"."'".$this->getparticipantesec()."','".$num["idr"]."');";

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

           //------CONSULTAR EVENTO CURSO-----


           public function consultarEventoCurso($IDR){
            $conexion=new conexion();


            $query = "SELECT e.fecha, e.hora, e.lugar, e.participantes, e.ideventocurso
                   FROM  eventocurso as e
				   where e.idr ="."'".$IDR."'"
				   ."order by ideventocurso";

           $result=pg_query($conexion->getStrcnx(),$query);
           pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

           return $result;
            
		}
		public function modificarEventoCurso(){

			$conexion=new conexion();
		  //MODIFICAMOS EL CURSO O EVENTO
                    try{
                    
        
                                    //--INSERTAMOS EN LA TABLA EVENTO O CURSO--//
                        $query = "UPDATE eventocurso
									SET fecha="."'".$this->getfechaec()."',"."
									hora="."'".$this->gethoraec()."',"."
									lugar="."'".$this->getlugarec()."',"."
                                    participantes="."'".$this->getparticipantesec()."'"."
                                    WHERE ideventocurso="."'".$this->getideventocurso()."'".";";	

        
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