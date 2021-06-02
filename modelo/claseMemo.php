<?php

	require_once("claseDocumento.php"); // clase de la cual heredamos  datos
	include_once('conexion.php'); // clase que conecta con la db

	class memo extends documento{
		//ATRIBUTOS
		private $idMemo;
		private $para; // es el departamento 
		private $asunto;
		private $descripcion;
		private $de;

		//Getter's and setter's

		public function getIdMemo() { return $this->idMemo; }
		public function setIdMemo($idMemo) { $this->idMemo= $idMemo;}

		public function getPara() { return $this->para; }
		public function setPara($para) { $this->para= $para; }

		public function getAsunto() { return $this->asunto; }
		public function setAsunto($asunto) { $this->asunto= $asunto; }

		public function getDescripcion() { return $this->descripcion; }
		public function setDescripcion($descripcion) { $this->descripcion= $descripcion;}

		public function getDe() { return $this->de; }
		public function setDe($de) { $this->de= $de; }


		//Construct

		public function __construct($idDocumento=null, $fecha=null, $estatus=null ,$cedula=null, $tipodoc=null, $idImg=null, $idMemo=null, $para=null, $asunto=null , $descripcion=null, $de=null){
			parent::__construct($idDocumento,$fecha,$estatus,$cedula,$tipodoc,$idImg);
			{

				if($idMemo!=null){
					$this->setIdMemo($idMemo);
				}else{
					$this->setIdMemo(0);
				}

				if($para!=null){
					$this->setPara($para);
				}else{
					$this->setPara(0);
				}

				if($asunto!=null){
					$this->setAsunto($asunto);
				}else{
					$this->setAsunto(" ");
				}

				if($descripcion!=null){
					$this->setDescripcion($descripcion);
				}else{
					$this->setDescripcion(" ");
				}

				if($de!=null){
					$this->setDe($de);
				}else{
					$this->setDe(0);
				}
			}

		}


		//TO STRING

		public function toString()
		{
			return parent::toString() . "<br>Id Memo: ".$this->getIdMemo() ."<br>para: ". $this->getPara() . "<br>"."asunto: ". $this->getAsunto() . "<br>". "descripcion: ". $this->getDescripcion(). "<br> De: ".$this->getDe();
		}




		//---------------MÉTODOS DEL CRUD----------------\\

								//------CREAR MEMO-----

		public function crearMemo(){  //modificado a nueva tabla

			$conexion=new conexion();

			/*$query = "INSERT INTO documento(fechad, cedulad, estatus, tipodoc, idimg)
					VALUES ("."'".$this->getFecha()."'".","."'".$this->getCedula()."'".",".$this->getEstatus().",".$this->getTipodoc().",".$this->getIdImg().");";
	

			echo $query . "<br><br><br>";

			$query ="SELECT * FROM documento";
					$result =pg_query($conexion->getStrcnx(),$query);
					$this->setidDocumento(pg_num_rows($result)); //guardamos la cant. 


			$query1 = "INSERT INTO memo(idmemo,para,asunto,descripcion,iddoc,de)
					VALUES ("."'".$this->getIdMemo()."'".",".$this->getPara().","."'".$this->getAsunto()."'".","."'".$this->getDescripcion()."'".",".$this->getidDocumento().",".$this->getDe().");";

			echo $query1;*/
			
			try{
						//--INSERTAMOS EN LA CLASE DOCUMENTO--//
					$query = "INSERT INTO documento(fechad, cedulad, estatus, tipodoc, idimg)
					VALUES ("."'".$this->getFecha()."'".","."'".$this->getCedula()."'".",".$this->getEstatus().",".$this->getTipodoc().",".$this->getIdImg().");";
	
					
					$result=pg_query($conexion->getStrcnx(),$query);
					//pg_close($conexion->getStrcnx()); //cerramos la conexion a la db


					//CONSULTAMOS EN LA TABLA DOCUMENTO para ver cuantos registros hay

					$query ="SELECT * FROM documento";
					$resultado =pg_query($conexion->getStrcnx(),$query);
					//$this->setIddoc(pg_num_rows($resultado)); //guardamos la cant.
					$this->setidDocumento(pg_num_rows($resultado));

					
						//--INSERTAMOS EN LA CLASE MEMO--//
					$query1 = "INSERT INTO memo(idmemo,para,asunto,descripcion,iddoc,de)
					VALUES ("."'".$this->getIdMemo()."'".",".$this->getPara().","."'".$this->getAsunto()."'".","."'".$this->getDescripcion()."'".",".$this->getidDocumento().",".$this->getDe().");";
	
					$resultado=pg_query($conexion->getStrcnx(),$query1);
					//pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

					if(($result == true) && $resultado==true){
						return true;
					}else{
						return false;
					}

					//return $query1;

				
				}catch(Exception $e){
					$this->getStrcnx(null);
					echo "error".$e->getMessage()."<br>";
					die("");
				}
		}

		//------CONSULTAR MEMO x ID-----
			//este metodo se utiliza a la hora de consultar el memo para validar
			//que sea de ese departamento origen

		public function consultarIdMemo(){  //modificado con la nueva tabla
			$conexion=new conexion();

			$query = "SELECT m.idmemo, de.nombred ,m.asunto ,d.fechad, e.nombree, m.descripcion, d.cedulad, m.iddoc, d.idimg, m.de
				FROM memo as m, documento as d, estatus as e, departamento as de
				where  d.estatus = e.idestatus and m.para = de.idd and m.iddoc = d.iddoc and m.idmemo="."'".$this->getIdMemo()."' and m.de=".$this->getDe().";";

			$result=pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			return $result;
			
		}

		//------CONSULTAR MEMO x ID-----
			//este metodo se utiliza a la hora de consultar el memo para validar
			//que sea de ese departamento origen
			
			public function consultarId(){  //modificado con la nueva tabla
				$conexion=new conexion();
	
				$query = "SELECT m.idmemo, de.nombred ,m.asunto ,d.fechad, e.nombree, m.descripcion, d.cedulad, m.iddoc
					FROM memo as m, documento as d, estatus as e, departamento as de
					where  d.estatus = e.idestatus and m.para = de.idd and m.iddoc = d.iddoc and m.idmemo="."'".$this->getIdMemo()."';";
	
				$result=pg_query($conexion->getStrcnx(),$query);
				pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
	
				return $result;
				
			}

		//CONSULTAR MEMO X ID DOCUMENTO//

		public function consultarIdDocumentoMemo(){
			$conexion=new conexion();

			$query = "SELECT m.idmemo, nombree, m.iddoc, t.nombretipo
				FROM memo as m, documento as d, estatus as e, tipodocumento as t
				where  d.estatus = e.idestatus and d.tipodoc = t.idtipo and m.iddoc = "."'".$this->getIdDocumento()."'";

			$result=pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			return $result;
		}
		//------------------------------------------------------


					//------CONSULTAR MEMO x FECHA-----

		public function consultarFechaMemo(){ // modificado nueva tabla
			$conexion=new conexion();

			$query = "SELECT m.idmemo, de.nombred, m.asunto, d.fechad, e.nombree, m.descripcion, d.cedulad
				FROM memo as m, documento as d, estatus as e, departamento as de
				where  d.estatus = e.idestatus and m.para = de.idd and m.iddoc = d.iddoc and d.fechad="."'".$this->getFecha()."' and m.de=".$this->getDe().";";

			$result=pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			return $result;
			
		}


					//------CONSULTAR MEMO x ASUNTO-----

		public function consultarAsuntoMemo(){  //modificado nueva tabla
			$conexion=new conexion();

			$query = "SELECT m.idmemo, de.nombred, m.asunto ,d.fechad, e.nombree, m.descripcion, d.cedulad
				FROM memo as m, documento as d, estatus as e, departamento as de
				where  d.estatus = e.idestatus and m.para = de.idd and m.iddoc = d.iddoc and m.asunto like '%".$this->getAsunto()."%' and m.de=".$this->getDe().";";

					

			$result=pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			return $result;
			
		}


				//------CONSULTAR MEMO x PARA-----

		public function consultarParaMemo(){  //modificado nueva tabla
			$conexion=new conexion();

			$query = "SELECT m.idmemo, de.nombred, m.asunto, d.fechad, e.nombree, m.descripcion, d.cedulad
				FROM memo as m, documento as d, estatus as e, departamento as de
				where  d.estatus = e.idestatus and m.para = de.idd  and m.iddoc = d.iddoc and m.para=".$this->getPara()."and m.de=".$this->getDe();

			$result=pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			return $result;

			/*$query = "SELECT m.idmemo, de.nombred, m.asunto, d.fechad, e.estatus, m.descripcion, d.cedulad
				FROM memo as m, documento as d, estatus as e, departamento as de
				where  d.estatus = e.estatus and m.para = de.idd  and m.iddoc = d.iddoc and m.para=".$this->getPara();

			echo $query;*/
			
		}

			//------CONSULTAR MEMO ----
			//este metodo lo usamos para consultar antes de crear el memo

		public function consultarMemo(){ 
			$conexion=new conexion();

			$query = "SELECT m.idmemo, de.nombred, m.asunto, d.fechad, e.nombree, m.descripcion, d.cedulad
				FROM memo as m, documento as d, estatus as e, departamento as de
				where  d.estatus = e.idestatus and m.para = de.idd and m.iddoc = d.iddoc";

			$result=pg_query($conexion->getStrcnx(),$query);
			pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

			return $result;
			
		}


		//------CONSULTAR MEMO  ----
			//este metodo lo usamos para consultar los memos generados en el departamento

			public function consultarMemoDepartamento(){  //modificado a nueva tabla
				$conexion=new conexion();
	
				$query = "SELECT m.idmemo, de.nombred, m.asunto, d.fechad, e.nombree, m.descripcion, d.cedulad, d.iddoc, t.nombretipo 
					FROM memo as m, documento as d, estatus as e, departamento as de, tipodocumento as t
					where  d.estatus = e.idestatus and m.para = de.idd and m.iddoc = d.iddoc and d.tipodoc = t.idtipo and m.de=".$this->getDe();
	
				$result=pg_query($conexion->getStrcnx(),$query);
				pg_close($conexion->getStrcnx()); //cerramos la conexion a la db
	
				return $result;
				
			}


		public function modificarMemo(){ //modificacion con la tabla

			//echo "hola";
			$conexion=new conexion();

			/*echo "<br><br><br><br>";
			echo $query = "UPDATE documento
						SET fecha="."'".$this->getFecha()."'"."
						WHERE iddocumento=".$this->getidDocumento().";";
			echo "<br><br><br><br>";
			echo $query1 = "UPDATE memo
						SET para="."'".$this->getPara()."',"."
							asunto="."'".$this->getAsunto()."',"."
							descripcion="."'".$this->getDescripcion()."'"."
						WHERE idmemo="."'".$this->getIdMemo()."'".";";*/

			//MODIFICAMOS EL DOCUMENTO Y EL MEMO
			try{
				/*$query = "UPDATE documento
						SET fecha="."'".$this->getFecha()."'"."
						WHERE iddocumento=".$this->getidDocumento().";";*/
						


				//$result=pg_query($conexion->getStrcnx(),$query);
				//pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

							//--INSERTAMOS EN LA CLASE MEMO--//
				$query1 = "UPDATE memo
							SET para=".$this->getPara().","."
							asunto="."'".$this->getAsunto()."',"."
							descripcion="."'".$this->getDescripcion()."'"."
							WHERE idmemo="."'".$this->getIdMemo()."'".";";	

				$resultado=pg_query($conexion->getStrcnx(),$query1);
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




		//-------------VALIDAR MEMO-----------//
			
		public function validarMemo(){

			$conexion = new conexion();
			
			$query = "SELECT d.iddoc, d.fechad, m.idmemo
					 FROM documento as d,
						   memo as m
					 WHERE m.iddoc = "."'".$this->getIdDocumento()."'";

				$result=pg_query($conexion->getStrcnx(),$query);

				if(pg_num_rows($result)>0)
					return true;
				else
					return false;

		}


		public function validarMemoDepartamento(){

			$conexion = new conexion();
			
			$query = "SELECT *
					 FROM memo
					 WHERE de = "."'".$this->getDe()."'";

				$result=pg_query($conexion->getStrcnx(),$query);

				if(pg_num_rows($result)>0)
					return true;
				else
					return false;

		}



		public function consultarDocumentoMemo(){
			$conexion=new conexion();


			$query = "SELECT d.iddoc, m.asunto
				   FROM memo as m, documento as d
				   where m.iddoc = d.iddoc and d.estatus=2 and m.de=".$this->getDe();

		   $result=pg_query($conexion->getStrcnx(),$query);
		   pg_close($conexion->getStrcnx()); //cerramos la conexion a la db

		   return $result;
			
		}

		


	}

?>