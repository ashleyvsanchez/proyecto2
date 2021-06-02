<?php

   include_once('conexion.php');


    class usuario
     {
         //--------------Atributos----------------\\

         //private $idUsuario;
         private $cedula;
         private $nombreUsuario;
         private $claveUsuario;
         private $rolUsuario;
         //-------------Set and Get----------------\\

        public function getIdUsuario() { return $this->idUsuario; }
		public function setIdUsuario($idUsuario) { $this->idUsuario= $idUsuario; } 

        public function getCedula() { return $this->cedula; }
		public function setCedula($cedula) { $this->cedula= $cedula; } 


		public function getNombreUsuario() { return $this->nombreUsuario; }
        public function setNombreUsuario($nombreUsuario) { $this->nombreUsuario= $nombreUsuario;}
        
        public function getClaveUsuario() { return $this->claveUsuario; }
        public function setClaveUsuario($claveUsuario) { $this->claveUsuario= $claveUsuario;}
        
        public function getRolUsuario() { return $this->rolUsuario; }
        public function setRolUsuario($rolUsuario) { $this->rolUsuario= $rolUsuario;}

		
         //----------- Constructor-------------------\\

        function __construct($idUsuario=null, $cedula=null, $nombreUsuario=null, $claveUsuario=null, $rolUsuario=null)
        {
            if($idUsuario!=null)
			{
				$this->setIdUsuario($idUsuario);
			}else{
				$this->setIdUsuario(0);
			}

            if($cedula!=null)
			{
				$this->setCedula($cedula);
			}else{
				$this->setCedula("");
			}


			if($nombreUsuario!=null)
			{
				$this->setNombreUsuario($nombreUsuario);
			}else{
				$this->setNombreUsuario(" ");
            }
            

            if($claveUsuario!=null)
			{
				$this->setclaveUsuario($claveUsuario);
			}else{
				$this->setclaveUsuario(" ");
            }   
            
            if($rolUsuario!=null)
			{
				$this->setRolUsuario($rolUsuario);
			}else{
                $this->setRolUsuario(0);
			}
        }

        //-------------To string-------------------\\

        public function toString()
		{
			return  "id Usuario: " . $this->getIdUsuario() . "<br>" . "Cedula: ".  $this->getCedula()  ."<br>" . "nombre Usuario: " . $this->getNombreUsuario() . "<br>" . "Clave Usuario: " . $this->getClaveUsuario(). "<br>". "Rol: " . $this->getRolUsuario();
        }
        


        function validarUsuario(){

			$conexion = new conexion();
			$query = "SELECT nombreu  
					  FROM usuario 
					   WHERE nombreu = "."'".$this->getNombreUsuario()."'";

			$result= pg_query($conexion->getStrcnx(), $query);

			if(pg_num_rows($result)>0){
				return true;
			}else
				{
				return false;
				}
			pg_free_result($result);
		}


		function validarCedula(){

			$conexion = new conexion();
			$query = "SELECT cedulap  
					  FROM usuario
					  WHERE cedulap = "."'".$this->getCedula()."'";

			$result= pg_query($conexion->getStrcnx(), $query);

			if(pg_num_rows($result)>0){
				return true;
			}else
				{
				return false;
				}
			pg_free_result($result);
		}


		function validarRol($Ced){
			include_once ("persona.php");
			include_once ("claseDepartamento.php");
			$persona = new persona('','','','','','');
			$info_per = $persona -> reporteListado($Ced);

			$dep = new departamento('',$info_per[5],'');
			$Departamento = $dep -> consultarNombreDepartamento();

			$conexion = new conexion();
			$query = "SELECT p.cedulap, p.idd, dep.nombred, r.nombrer

					  FROM persona as p,
						   departamento as dep,
						   rol as r,
						   usuario as u

					  WHERE p.cedulap = u.cedulap AND
							p.idd = dep.idd AND
							p.idd = '$Departamento[1]' AND
							u.idr = r.idr AND
							u.idr = 2";
			
			$result = pg_query($conexion->getStrcnx(), $query);

			$row=pg_fetch_array($result);

			

			if(pg_num_rows($result)>0){
				return true;
			}else
				{
				return false;
				}
			pg_free_result($result);

		}




		function crearUsuario()
		{
			$conexion = new conexion();
			
			try{
					$query = "INSERT INTO usuario (nombreu,contra,cedulap,idr) 
									VALUES("."'".$this->getNombreUsuario()."'".","."'".$this->getClaveUsuario()."'".","."'".$this->getCedula()."'".","."'".$this->getRolUsuario()."');";
									
									//.$this->getNombreUsuario().","."'".$this->getClaveUsuario()."'".",". $this->getCedula().","."'".$this->getRolUsuario()."');";

				$result=pg_query($conexion->getStrcnx(),$query);
				
				//pg_close($result);  // CERRARMOS LA CONEXION A LA DB

				return $result;

				}catch(Exception $e){
					$this->getStrcnx(null);
					echo "error".$e->getMessage()."<br>";
					die("");
				}	
			
					
		}

//-----------------------Consultar Usuario -------------------\\

		function consultarUsuario()
		{
			$conexion = new conexion();

			$query = "SELECT u.nombreU, u.contra, u.cedulap, p.cedulap, r.idr, r.nombrer
			 		  FROM usuario as u, persona as p , rol as r
					  Where u.nombreU="."'".$this->getNombreUsuario()."'"."and u.cedulap = p.cedulap and u.idr = r.idr;";
					  
		 $result =pg_query($conexion->getStrcnx(),$query);
			

			echo "
			<div class='container-fluid'><table class='table table-dark table-sm'><thead>
			<tr class='text-center roboto-medium'><td align='center' width=400><h5>Nombre de Usuario</h5></td>
			<td align='center' width=400><h5>Cedula</h5></td>
			<td align='center' width=400><h5>Rol</h5></td>
			</thead> ";

			while ($row=pg_fetch_array($result))
			{
				echo "<tr><td align='center' width=400>"."<h6>".$row[0]."</h6></td>";
				echo "<td align='center' width=400>"."<h6>".$row[2]."</h6></td>";
				echo "<td align='center' width=400>"."<h6>".$row[5]."</h6></td>";
			} echo "</table></div>";

			pg_free_result($result);
		}

		function consultartodosUsuarios()
		{
			$conexion = new conexion();

			$result =pg_query($conexion->getStrcnx(),"SELECT u.nombreU, u.contra, u.cedulap, p.cedulap, r.idr, r.nombrer
			FROM usuario as u, persona as p , rol as r
			where u.cedulap = p.cedulap and u.idr = r.idr;");

				
			echo "
			<div class='container-fluid'><table class='table table-dark table-sm'><thead>
			<tr class='text-center roboto-medium'><td align='center' width=400><h5>Nombre de Usuario</h5></td>
			<td align='center' width=400><h5>Cedula</h5></td>
			<td align='center' width=400><h5>Rol</h5></td>
			</thead> ";

			while ($row=pg_fetch_array($result))
			{
				echo "<tr><td align='center' width=400>"."<h6>".$row[0]."</h6></td>";
				echo "<td align='center' width=400>"."<h6>".$row[2]."</h6></td>";
				echo "<td align='center' width=400>"."<h6>".$row[5]."</h6></td>";
			} echo "</table></div>";


			pg_free_result($result);

		}



			//---------Modificar usuario---------\\


			public function modificarNombre($nombreModificado){

				$conexion = new conexion();
				
				$query = "UPDATE usuario 
						  SET nombreu='$nombreModificado' 
						  WHERE nombreu = "."'".$this->getNombreUsuario()."'";
						  
				pg_query($conexion->getStrcnx(),$query); 
			}



			public function modificarClave($claveModificada){

				$conexion = new conexion();

				$query = "UPDATE usuario 
						  SET contra='$claveModificada' 
						  WHERE nombreu = "."'".$this->getNombreUsuario()."'";
						  
				pg_query($conexion->getStrcnx(),$query); 
			}

		
			public function modificarRol($rolModificado){

				$conexion = new conexion();

				$query = "UPDATE usuario 
						  SET idr='$rolModificado' 
						  WHERE nombreu = "."'".$this->getNombreUsuario()."'";
				
	 			 pg_query($conexion->getStrcnx(),$query); 
			}


			//--------- REPORTE ESPECIFICO---------\\

			public function reporteEspecifico(){
				$conexion = new conexion();

				$query = "SELECT u.nombreU, u.contra, u.cedulap, p.cedulap, r.idr, r.nombrer
			 		  FROM usuario as u, persona as p , rol as r
					  Where u.nombreU="."'".$this->getNombreUsuario()."'"."and u.cedulap = p.cedulap and u.idr = r.idr;";
					  
		 		$result =pg_query($conexion->getStrcnx(),$query);

		 		$row=pg_fetch_array($result);
		 		return $row;
			}

			//--------- REPORTE GENERAL---------\\

			public function reporteGeneral(){
				$conexion=new conexion();
				$query = "SELECT u.nombreU, u.contra, u.cedulap, p.cedulap, r.idr, r.nombrer FROM usuario as u, persona as p , rol as r
					where u.cedulap = p.cedulap and u.idr = r.idr;";

				$result=pg_query($conexion->getStrcnx(),$query);
				return $result;
			}


			public function verificarRol(){

				$conexion = new conexion();
				$query = "SELECT u.idr, r.nombrer
						  from usuario as u, rol as r
						  where u.idr = r.idr and cedulap="."'".$this->getCedula()."';";
				$result=pg_query($conexion->getStrcnx(),$query);

				$row = pg_fetch_array($result);

				return $row;

			}



			public function ListadoPorOrden(){
				$conexion=new conexion();
				$query = "SELECT u.nombreU, u.contra, u.cedulap, p.cedulap, r.idr, r.nombrer FROM usuario as u, persona as p , rol as r
					where u.cedulap = p.cedulap and u.idr = r.idr
					order by nombreu DESC;";

				$result=pg_query($conexion->getStrcnx(),$query);
				return $result;
			}


    }

?>



