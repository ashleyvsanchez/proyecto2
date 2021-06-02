<?php  
 require_once('conexion.php');

class Persona{
    private $Ced;
    private $Nom;              
	private $Ape;
    private $Dir;
    private $Dep;
    private $Cargo;
    
    public function getCed(){return $this->Ced;}
    public function getNom(){return $this->Nom;}
    public function getApe(){return $this->Ape;}
    public function getDir(){return $this->Dir;}
    public function getDep(){return $this->Dep;}
    public function getCargo(){return $this->Cargo;}
    public function setCed($valor){$this->Ced=$valor;}
    public function setNom($valor){$this->Nom=$valor;}
    public function setApe($valor){$this->Ape=$valor;}
    public function setDir($valor){$this->Dir=$valor;}
    public function setDep($valor){$this->Dep=$valor;}
    public function setCargo($valor){$this->Cargo=$valor;}

    public function __construct($Ced, $Nom, $Ape, $Dir, $Dep, $Cargo)
    {
        $this->setCed($Ced);
        $this->setNom($Nom);
        $this->setApe($Ape);
        $this->setDir($Dir);
        $this->setDep($Dep);
        $this->setCargo($Cargo);
    }


    public function toString(){
		return $this->getCed().'/'.$this->getNom().'/'.$this->getApe().'/'.$this->getDir().'/'.$this->getDep().'/'.$this->getCargo().'/';
    }

    					                    // REGISTRAR PERSONA //	
    public function registrarPersona(){
        $c = new Conexion();
		pg_query($c->getStrcnx(),"insert into persona values('".$this->getCed()."','".$this->getNom()."','".$this->getApe()."','".$this->getDir()."','".$this->getDep()."','".$this->getCargo()."');") or die ("Error al registrar");
 
     }
     
     public function updateNombre($Ced,$Nom){
        $c = new Conexion();
        pg_query($c->getStrcnx(),"update persona set nombrep='$Nom' where cedulap = '$Ced';") or die ("Error al registrar");
    }
    public function updateApe($Ced,$Ape){
        $c = new Conexion();
        pg_query($c->getStrcnx(),"update persona set apellidop='$Ape' where cedulap = '$Ced';") or die ("Error al registrar");
    }
    public function updateDir($Ced,$Dir){
        $c = new Conexion();
        pg_query($c->getStrcnx(),"update persona set direccionp='$Dir' where cedulap = '$Ced';") or die ("Error al registrar");
    }
    public function updateDep($Ced,$Dep){
        $c = new Conexion();
        pg_query($c->getStrcnx(),"update persona set idd='$Dep' where cedulap = '$Ced';") or die ("Error al registrar");
    }
    public function updateCargo($Ced,$Cargo){
        $c = new Conexion();
        pg_query($c->getStrcnx(),"update persona set idc='$Cargo' where cedulap = '$Ced';") or die ("Error al registrar");
    }
    	                                // CONSULTAR PERSONA //
    public function Listado($Ced){ 
      
        $c = new conexion();
        $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
        from persona, cargo, departamento
        where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.cedulap ='$Ced';") or die ("Error en la consulta");

        if(pg_num_rows($resultado)>0){
        echo "<h3 align='center'>DATOS PERSONALES</h3><div class='container-fluid'><table class='table table-dark table-sm'><thead>
			<tr class='text-center roboto-medium'><td align='center' width=400><h5>Cedula</h5></td>
			<td align='center' width=400><h5>Nombre</h5></td>
			<td align='center' width=400><h5>Apellido</h5></td>
			<td align='center' width=400><h5>Dirección</h5></td>
			<td align='center' width=400><h5>Cargo</h5></td>
			<td align='center' width=400><h5>Departamento</h5></td></tr> </thead> ";
        while($filas=pg_fetch_array($resultado)){
            echo "<tr><td align='center' width=400>"."<h6>".$filas["cedulap"]."</h6></td>";
            echo "<td align='center' width=400>"."<h6>".$filas["nombrep"]."</h6></td>";
            echo "<td align='center' width=400>"."<h6>".$filas["apellidop"]."</h6></td>";
            echo "<td align='center' width=400>"."<h6>".$filas["direccionp"]."</h6></td>";
            echo "<td align='center' width=400>"."<h6>".$filas["nombrec"]."</h6></td>";
            echo "<td align='center' width=400>"."<h6>".$filas["nombred"]."</h6></td></tr>";
        } echo "</table></div>";
    }else{echo "<h5 align='center'>No hay datos que coincidan con esta cédula</h5>";}
    }
    public function ListadoDep($depid){ 
      
        $c = new conexion();
        $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
        from persona, cargo, departamento
        where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idd ='$depid';") or die ("Error en la consulta");
        if(pg_num_rows($resultado)>0){
            echo "<h3 align='center'>DATOS PERSONALES</h3><div class='container-fluid'><table class='table table-dark table-sm'><thead>
                <tr class='text-center roboto-medium'><td align='center' width=400><h5>Cedula</h5></td>
                <td align='center' width=400><h5>Nombre</h5></td>
                <td align='center' width=400><h5>Apellido</h5></td>
                <td align='center' width=400><h5>Dirección</h5></td>
                <td align='center' width=400><h5>Cargo</h5></td>
                <td align='center' width=400><h5>Departamento</h5></td></tr> </thead> ";
            while($filas=pg_fetch_array($resultado)){
                echo "<tr><td align='center' width=400>"."<h6>".$filas["cedulap"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombrep"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["apellidop"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["direccionp"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombrec"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombred"]."</h6></td></tr>";
            } echo "</table></div>";
    }else{echo "<h5 align='center'>No hay datos que coincidan con este departamento</h5>";}
    }
    public function ListadoCargo($Cargo, $depid){ 
      
        $c = new conexion();
        if($depid != 0){
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idc ='$Cargo' AND persona.idd ='$depid';") or die ("Error en la consulta");
        }else{
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idc ='$Cargo';") or die ("Error en la consulta");
        }
      

		if(pg_num_rows($resultado)>0){
            echo "<h3 align='center'>DATOS PERSONALES</h3><div class='container-fluid'><table class='table table-dark table-sm'><thead>
                <tr class='text-center roboto-medium'><td align='center' width=400><h5>Cedula</h5></td>
                <td align='center' width=400><h5>Nombre</h5></td>
                <td align='center' width=400><h5>Apellido</h5></td>
                <td align='center' width=400><h5>Dirección</h5></td>
                <td align='center' width=400><h5>Cargo</h5></td>
                <td align='center' width=400><h5>Departamento</h5></td></tr> </thead> ";
            while($filas=pg_fetch_array($resultado)){
                echo "<tr><td align='center' width=400>"."<h6>".$filas["cedulap"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombrep"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["apellidop"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["direccionp"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombrec"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombred"]."</h6></td></tr>";
            } echo "</table></div>";
    }else{echo "<h5 align='center'>No hay datos que coincidan con este cargo</h5>";}
    }
    public function ListadoTodos($depid){ 
    
        $c = new conexion();
        if($depid != 0){
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idd = $depid") or die ("Error en la consulta");
        }else{
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd") or die ("Error en la consulta");
        }
      

		if(pg_num_rows($resultado)>0){
            echo "<h3 align='center'>DATOS PERSONALES</h3><div class='container-fluid'><table class='table table-dark table-sm'><thead>
                <tr class='text-center roboto-medium'><td align='center' width=400><h5>Cedula</h5></td>
                <td align='center' width=400><h5>Nombre</h5></td>
                <td align='center' width=400><h5>Apellido</h5></td>
                <td align='center' width=400><h5>Dirección</h5></td>
                <td align='center' width=400><h5>Cargo</h5></td>
                <td align='center' width=400><h5>Departamento</h5></td></tr> </thead> ";
            while($filas=pg_fetch_array($resultado)){
                echo "<tr><td align='center' width=400>"."<h6>".$filas["cedulap"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombrep"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["apellidop"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["direccionp"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombrec"]."</h6></td>";
                echo "<td align='center' width=400>"."<h6>".$filas["nombred"]."</h6></td></tr>";
            } echo "</table></div>";
    }else{echo "<h5 align='center'>No hay datos registrados</h5>";}
    }


      //VALIDAR EXISTENCIA

	public function valPer($Ced,$depid){
        
        $c = new conexion();
        if($depid != 0){
            $resultado=pg_query($c->getStrcnx(),"select * from persona where cedulap='$Ced' and idd='$depid';") or die ("Error al registrar");
        }else{
            $resultado=pg_query($c->getStrcnx(),"select * from persona where cedulap='$Ced'") or die ("Error al registrar");
        }
		
		
		if(pg_num_rows($resultado)>0){
		return 1;
		}else{
			return 0;
		}
    }


                                            // REPORTES PERSONA //

    public function reporteListado($Ced){ 
    
        $c = new conexion();
        $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
        from persona, cargo, departamento
        where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.cedulap ='$Ced';") or die ("Error en la consulta");
        $row=pg_fetch_array($resultado);

        return $row;
    }

    public function reporteListadoDepa($Dep){

        $c = new conexion();
        $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idd ='$Dep';") or die ("Error en la consulta");

        return $resultado;

    }

    public function reporteListadoCargo($Cargo){

        $c = new conexion();
        $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idc ='$Cargo';") or die ("Error en la consulta");

        return $resultado;
    }

    public function reporteListadoTodos(){ 
    
        $c = new conexion();
        $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
        from persona, cargo, departamento
        where persona.idc = cargo.idc AND persona.idd = departamento.idd") or die ("Error en la consulta");

        return $resultado;
    }

    
                                            // REPORTES PERSONA PDF //

    public function reporteListadoPDF($Ced, $depid){ 
    
        $c = new conexion();
        if($depid != 0){
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
        from persona, cargo, departamento
        where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.cedulap ='$Ced' AND persona.idd = $depid;") or die ("Error en la consulta");
        }else{
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
        from persona, cargo, departamento
        where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.cedulap ='$Ced' ") or die ("Error en la consulta");
        }
        
        $row=pg_fetch_array($resultado);

        return $row;
    }

    public function reporteListadoDepaPDF($Dep, $depid){

        $c = new conexion();
        if($depid != 0){
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idd ='$Dep' AND persona.idd = $depid;") or die ("Error en la consulta");
        }else{
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idd ='$Dep';") or die ("Error en la consulta");
        }
       

        return $resultado;

    }

    public function reporteListadoCargoPDF($Cargo, $depid){

        $c = new conexion();
        if($depid != 0){
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idc ='$Cargo' AND persona.idd = $depid;") or die ("Error en la consulta");
        }else{
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idc ='$Cargo';") or die ("Error en la consulta");
        }
        

        return $resultado;
    }

    public function reporteListadoTodosPDF($depid){ 
    
        $c = new conexion();
        if($depid!=0){
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd AND persona.idd = $depid;") or die ("Error en la consulta"); 
        }else{
            $resultado =pg_query($c->getStrcnx(),"select persona.cedulap, persona.nombrep, persona.apellidop, persona.direccionp, cargo.nombrec, departamento.nombred
            from persona, cargo, departamento
            where persona.idc = cargo.idc AND persona.idd = departamento.idd ;") or die ("Error en la consulta");
        }
       

        return $resultado;
    }

    

}

?>