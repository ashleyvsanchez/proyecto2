<?php


include_once('conexion.php');
   


class estatus
 {
     //--------------Atributos----------------\\

     
     private $idEstatus;
     private $nombreEstatus;
    
     //-------------Set and Get----------------\\

    
    public function getIdEstatus() { return $this->idEstatus; }
    public function setIdEstatus($idEstatus) { $this->idEstatus= $idEstatus; } 


    public function getNombreEstatus() { return $this->nombreEstatus; }
    public function setNombreEstatus($nombreEstatus) { $this->nombreEstatus= $nombreEstatus;}
    
   

    
     //----------- Constructor-------------------\\

    function __construct($idEstatus=null, $nombreEstatus=null)
    {
        
        if($idEstatus!=null)
        {
            $this->setIdEstatus($idEstatus);
        }else{
            $this->setIdEstatus(0);
        }


        if($nombreEstatus!=null)
        {
            $this->setNombreEstatus($nombreEstatus);
        }else{
            $this->setNombreEstatus("");
        }
        
    }

    //-------------To string-------------------\\

    public function toString()
    {
        return  "Id estatus: ".  $this->getIdEstatus()  ."<br>" . "Nombre Estatus: " . $this->getNombreEstatus(); 
    }
    

    function consultarEstatus(){

        $conexion = new conexion();

			$query = "SELECT idestatus,nombree FROM estatus";
					  
             $result =pg_query($conexion->getStrcnx(),$query);


             return $result;

             pg_free_result($result);

    }



    public function modificarEstatus($iddoc){

        $conexion = new conexion();
                    
                    $query = "UPDATE documento 
                              SET estatus="."'".$this->getIdEstatus()."'"."
                              WHERE iddoc =".$iddoc.";";
                              
                    pg_query($conexion->getStrcnx(),$query); 
    
    
     }

 }





?>