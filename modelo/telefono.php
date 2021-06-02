<?php
  require_once('conexion.php');

    class Telefono{
        private $numeroT;
        private $tipoT;
        private $Ced;
    
        public function getnumeroT(){return $this->numeroT;}
        public function gettipoT(){return $this->tipoT;}
        public function getCed(){return $this->Ced;}
        public function setnumeroT($valor){$this->numeroT=$valor;}
        public function settipoT($valor){$this->tipoT=$valor;}
        public function setCed($valor){$this->Ced=$valor;}
    
        public function __construct($numeroT, $tipoT, $Ced)
        {
            $this->setnumeroT($numeroT);
            $this->settipoT($tipoT);
            $this->setCed($Ced);
        }
    
        public function toString(){
            return $this->getnumeroT().'/'.$this->gettipoT().'/'.$this->getCed().'/';
        }
        

        public function registrarTlfn(){
            $c = new conexion();
            pg_query($c->getStrcnx(),"insert into telefono values('".$this->getnumeroT()."','".$this->gettipoT()."','".$this->getCed()."');") or die ("Error al registrar");
        }

        public function addTel($Tel,$TT,$Ced){
            $c = new Conexion();
            pg_query($c->getStrcnx(),"insert into telefono values('$Tel','$TT','$Ced');") or die ("Error al registrar");
            echo"
            <script type='text/javascript'>
            Swal.fire({
                title: '¡MODIFCACIÓN EXITOSA!',
                html: 'Teléfono agregado',
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
        
        public function delTel($Tel,$Ced){
            $c = new Conexion();
            $resultado=pg_query($c->getStrcnx(),"select from telefono where numerot='$Tel';") or die ("Error al registrar");
            
            if(pg_num_rows($resultado)>0){
            pg_query($c->getStrcnx(),"delete from telefono where cedulap='$Ced'AND numerot ='$Tel';") or die ("Error al registrar");
            echo"
                                <script type='text/javascript'>
                                Swal.fire({
                                    title: '¡MODIFCACIÓN EXITOSA!',
                                    html: 'Número de teléfono eliminado',
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
            }else{
                echo"
                <script type='text/javascript'>
                Swal.fire({
                    title: '¡ERROR!',
                    html: 'Este numero de teléfono no existe o no pertenece a esta cédula',
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
    

        public function listarTlfn($Ced){
        
            $c = new conexion();
            $resultado =pg_query($c->getStrcnx(),"select telefono.numerot, tipotelefono.nombretipot
            from telefono, persona, tipotelefono
            where telefono.cedulap = persona.cedulap AND tipotelefono.idtipot = telefono.tipot AND persona.cedulap ='$Ced';") or die ("Error en la consulta");

            if(pg_num_rows($resultado)>0){
                echo "<h3 align='center'>DATOS DE TELÉFONO</h3><div class='container-fluid'><table class='table table-dark table-sm'><thead>
                    <tr class='text-center roboto-medium'><td align='center' width=400><h5>Número</h5></td>
                    <td align='center' width=400><h5>Tipo</h5></td></tr> </thead> ";
                while($filas=pg_fetch_array($resultado)){
                    echo "<tr><td align='center' width=400>"."<h6>".$filas["numerot"]."</h6></td>";
                    echo "<td align='center' width=400>"."<h6>".$filas["nombretipot"]."</h6></td></tr>";
                } echo "</table></div>";
            }else{echo "<h5 align='center'>No hay datos de Teléfono que coincidan con esta cedula</h5>";}
        }
        
        //      VALIDAR EXISTENCIA
        public function valTel($Tel){
            $c = new conexion();
            $resultado=pg_query($c->getStrcnx(),"select * from telefono where numerot='$Tel';") or die ("Error al registrar");
            
            if(pg_num_rows($resultado)>0){
            return 1;
            }else{
                return 0;
            }
        }

        //REPORTE

        public function reporteListarTlfn($Ced){
        
            $c = new conexion();
            $resultado =pg_query($c->getStrcnx(),"select telefono.numerot, tipotelefono.nombretipot
            from telefono, persona, tipotelefono
            where telefono.cedulap = persona.cedulap AND tipotelefono.idtipot = telefono.tipot AND persona.cedulap ='$Ced';") or die ("Error en la consulta");
            return $resultado;

        }

        public function reporteListarTlfnPDF($Ced, $depid){
        
            $c = new conexion();
            if($depid == 0){
                $resultado =pg_query($c->getStrcnx(),"select telefono.numerot, tipotelefono.nombretipot
                from telefono, persona, tipotelefono
                where telefono.cedulap = persona.cedulap AND tipotelefono.idtipot = telefono.tipot AND persona.cedulap ='$Ced';") or die ("Error en la consulta");
            }else{
                $resultado =pg_query($c->getStrcnx(),"select telefono.numerot, tipotelefono.nombretipot
                from telefono, persona, tipotelefono
                where telefono.cedulap = persona.cedulap AND tipotelefono.idtipot = telefono.tipot AND persona.cedulap ='$Ced' AND persona.idd = $depid;") or die ("Error en la consulta");
            }
           
            return $resultado;

        }
                                                            
    }

    
  

    
?>
