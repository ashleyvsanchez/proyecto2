<?php
       require_once('conexion.php');

    class Correo{
        private $direccionC;
        private $tipoC;
        private $Ced;
    
        public function getdireccionC(){return $this->direccionC;}
        public function gettipoC(){return $this->tipoC;}
        public function getCed(){return $this->Ced;}
        public function setdireccionC($valor){$this->direccionC=$valor;}
        public function settipoC($valor){$this->tipoC=$valor;}
        public function setCed($valor){$this->Ced=$valor;}
    
        public function __construct($direccionC, $tipoC, $Ced)
        {
            $this->setdireccionC($direccionC);
            $this->settipoC($tipoC);
            $this->setCed($Ced);
        }
    
        public function toString(){
            return $this->getdireccionC().'/'.$this->gettipoC().'/'.$this->getCed().'/';
        }

        public function registrarCorreo(){
            $c = new conexion();
            pg_query($c->getStrcnx(),"insert into correo values('".$this->getdireccionC()."','".$this->gettipoC()."','".$this->getCed()."');") or die ("Error al registrar");
        }


        public function addCor($Cor,$TC,$Ced){
            $c = new Conexion();
            pg_query($c->getStrcnx(),"insert into correo values('$Cor','$TC','$Ced');") or die ("Error al registrar");
            echo"
            <script type='text/javascript'>
            Swal.fire({
                title: '¡MODIFCACIÓN EXITOSA!',
                html: 'Correo agregado',
                icon: 'success',
                confirmButtonText: 'VOLVER',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            })
            .then(resultado => {
                if(resultado.value) {
                    window.location.href='../vista/vistaModificarPersona.php';
                }
            });
            
            </script>
            ";
    
        }
    
        public function delCor($Cor,$Ced){
            $c = new Conexion();
            $resultado=pg_query($c->getStrcnx(),"select from correo where cedulap='$Ced'AND direccionc ='$Cor';") or die ("Error al registrar");
            if(pg_num_rows($resultado)>0){
                pg_query($c->getStrcnx(),"delete from correo where cedulap='$Ced'AND direccionc ='$Cor';") or die ("Error al registrar");
                echo"
                                <script type='text/javascript'>
                                Swal.fire({
                                    title: '¡MODIFCACIÓN EXITOSA!',
                                    html: 'Correo eliminado',
                                    icon: 'success',
                                    confirmButtonText: 'VOLVER',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    allowEnterKey: false
                                })
                                .then(resultado => {
                                    if(resultado.value) {
                                        window.location.href='../vista/vistaModificarPersona.php';
                                    }
                                });
                                
                                </script>
                                ";
                }
                else{
                    echo"
                                <script type='text/javascript'>
                                Swal.fire({
                                    title: '¡ERROR!',
                                    html: 'Este correo no existe o no pertenece a esta cédula',
                                    icon: 'error',
                                    confirmButtonText: 'VOLVER',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    allowEnterKey: false
                                })
                                .then(resultado => {
                                    if(resultado.value) {
                                        window.location.href='../vista/vistaModificarPersona.php';
                                    }
                                });
                                
                                </script>
                                ";
                }
           
        }
    

        public function listarCorreo($Ced){
        
            $c = new conexion();
            $resultado =pg_query($c->getStrcnx(),"select correo.direccionc, tipocorreo.nombretipoc
            from correo, persona, tipocorreo
            where correo.cedulap = persona.cedulap AND tipocorreo.idtipoc = correo.tipoc AND persona.cedulap ='$Ced';") or die ("Error en la consulta");
    
            if(pg_num_rows($resultado)>0){
                echo "<h3 align='center'>DATOS DE CORREO</h3><div class='container-fluid'><table class='table table-dark table-sm'><thead>
                    <tr class='text-center roboto-medium'><td align='center' width=400><h5>Dirección</h5></td>
                    <td align='center' width=400><h5>Tipo</h5></td></tr> </thead> ";
                while($filas=pg_fetch_array($resultado)){
                    echo "<tr><td align='center' width=400>"."<h6>".$filas["direccionc"]."</h6></td>";
                    echo "<td align='center' width=400>"."<h6>".$filas["nombretipoc"]."</h6></td></tr>";
                } echo "</table></div>";
            }else{echo "<h5 align='center'>No hay datos de Correo que coincidan con esta cédula</h5>";}
        }

         //VALIDAR EXISTENCIA

        public function valCor($Cor){
        $c = new conexion();
		$resultado=pg_query($c->getStrcnx(),"select * from correo where direccionc='$Cor';") or die ("Error al registrar");
		
		    if(pg_num_rows($resultado)>0){
		    return 1;
		    }else{
			    return 0;
            }

        }
        
        //REPORTE 

        public function reporteListarCorreo($Ced){
        
            $c = new conexion();
            $resultado =pg_query($c->getStrcnx(),"select correo.direccionc, tipocorreo.nombretipoc
            from correo, persona, tipocorreo
            where correo.cedulap = persona.cedulap AND tipocorreo.idtipoc = correo.tipoc AND persona.cedulap ='$Ced';") or die ("Error en la consulta");
            return $resultado;

        }

        //REPORTE PDF

        public function reporteListarCorreoPDF($Ced, $depid){
        
            $c = new conexion();
            if($depid == 0){
                $resultado =pg_query($c->getStrcnx(),"select correo.direccionc, tipocorreo.nombretipoc
                from correo, persona, tipocorreo
                where correo.cedulap = persona.cedulap AND tipocorreo.idtipoc = correo.tipoc AND persona.cedulap ='$Ced';") or die ("Error en la consulta");
            }else{
                $resultado =pg_query($c->getStrcnx(),"select correo.direccionc, tipocorreo.nombretipoc
                from correo, persona, tipocorreo
                where correo.cedulap = persona.cedulap AND tipocorreo.idtipoc = correo.tipoc AND persona.cedulap ='$Ced' AND persona.idd = $depid;") or die ("Error en la consulta");
            }
           
            return $resultado;

        }

    }
  