<?php

class conexion{

		//---------------------------
		private $User;
		private $Password;
		private $Db;
		private $Port;
		private $Host;	
		private $Strcnx=null;
	//---------------------------
		public function getUser(){return $this->User;}
		public function getPassword(){return $this->Password;}
		public function getDb(){return $this->Db;}
		public function getPort(){return $this->Port;}
		public function getHost(){return $this->Host;}
		public function getStrcnx(){return $this->Strcnx;}

		public function setUser($User){$this->User=$User;}
		public function setPassword($Pass){$this->Password=$Pass;}
		public function setDb($Db){$this->Db=$Db;}
		public function setPort($Port){$this->Port=$Port;}
		public function setHost($Host){$this->Host=$Host;}
		public function setStrcnx($Strcnx){$this->Strcnx=$Strcnx;}
	
		// construct 

		public function __construct($User=null,$Password=null,$Db=null,$Port=null,$Host=null)
		{
			if($User!=null){$this->setUser($User);}else{$this->setUser("postgres");}
			if($Password!=null){$this->setPassword($Password);}else{$this->setPassword("1234");}
			if($Db!=null){$this->setDb($Db);}else{$this->setDb("proyecto");}
			if($Port!=null){$this->setPort($Port);}else{$this->setPort(5432);}
			if($Host!=null){$this->setHost($Host);}else{$this->setHost("localhost");}
		
			try{

				$this->setStrcnx(pg_connect(" host=".$this->getHost(). " port=".$this->getPort(). " dbname=".$this->getDb(). " user=".$this->getUser(). " password=".$this->getPassword()));

				//echo "Conexion Exitosa <br><br><br>";

			}
			catch(Exception $e)
			{
				$this->setStrcnx(null);
				echo "Error al Crear Conexion...".$e->getMessage()."<br/>";
	      	 	die("");
			}

		} //cierre de constructor 

		public function toString()
		{
			return "host: " . $this->getHost() . "<br>Port: " .$this->getPort(). "<br>Password: " . $this->getPassword() ."<br>DataBase: " .$this->getDb() . "<br>User: " . $this->getUser();
		} //cierre de toString

		//---------------------M É T O D O S----------------------///

		public function Usuario($nombre,$clave)
		{
			
			//VERIFICAMOS QUE EL USUARIO EXITA, QUE TIPO DE ROL ES Y A CUAL DEPARTAMENTO PERTENECE
			$result=pg_query($this->getStrcnx(), "SELECT u.nombreu,u.contra,u.cedulap,r.nombrer,r.idr
				from usuario as u, rol as r
				where u.nombreu='$nombre' and u.contra='$clave' and u.idr = r.idr;");
			//pg_close($result);  // CERRARMOS LA CONEXION A LA DB
		
			
			// SI EL RESULT CONTIENE DATOS, REDIRECCIONA A LA PAGINA NECESARIA

			if(pg_num_rows($result)>0){
				while ($row=pg_fetch_array($result)){

					$_SESSION['rol'] = $row[3];
		
				//Aqui veremos si es administrador o no	
					if($row[4] != 1){
						//Buscamos el departamento del Usuario que ingresa
						echo "No administrador <br>";
					 	header("location: ./vista/inicio.php");
						
					}
					else{
						header("location: ./vista/inicio.php");
					}

					$this->departamento_usuario($row[2]);

					
					 
			}
				return 0;

			}else
				return 1;
				
			pg_free_result($result);
	
		} 



		public function departamento_usuario($cedula)
		{
			require_once("persona.php");

			$persona= new persona(null,null,null,null,null,null); // instanciamos
			$departamento = $persona->reporteListado($cedula);

			$_SESSION['departamento_usuario'] = $departamento[5];

			$_SESSION['nombre_persona'] = $departamento[1]." ".$departamento[2];
			

		}

}

?>
