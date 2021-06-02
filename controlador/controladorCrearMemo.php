<?php



/*para fecha en español*/
    setlocale(LC_ALL,"spanish"); 
 

/*Incluimos el menu*/
    include_once ('../vista/vistaMenu.php');

/*Incluimos las clases */
    include_once ('../modelo/claseMemo.php'); 
    include_once ('../modelo/claseDepartamento.php');
    include_once ('../modelo/claseImgEncabezado.php');

//aqui guardamos los datos del formulario
    $para = $_POST['para'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripción'];
    $depa = $_POST['departamento'];

//aqui guardamos la fecha, el mes y el año del sistema
    $fechaS = strftime('%d/%B/%G');
    $diaS = strftime('%d');
    $mesS = strftime('%m');
    $añoS = strftime('%G');


// aqui hacemos un arreglo de meses en letras

    //$meses_string =  array("January", "Febrary", "March", "April", "May", "June", "July", "Agust", "September", "October", "November", "December");
    $meses_string =  array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");


    //CON ESTE MÉTODO OBTENEMOS EL LOS DATOS DEL JEFE DEL DEPARTAMENTO
    $departamento=new departamento(null,$depa); //instanciamos
    $row=$departamento->datosDepartamento();

    //guardamos la cedula de la persona
    $cedula = $row['4'];
    $estatus=1; //el estatus en crear siempre sera uno que significa "EN REVISIÓN"
    $tipoD=1;
    $de = $row['1'];


    //echo  $descripcion;



    // PRIMERO ANTES DE CREAR EL MEMO, consultamos en la bd para ver si hay registro
   
   
    $memo = new memo(null,null,null,null,null,null,null,null,null);
    $codigo = $memo->consultarMemo(); // consultamos y guardamos el resultado para ver cuantos registros hay

        $cont = 1; // contador para correlativo del memo

        if(pg_num_rows($codigo)>0){
            while($row=pg_fetch_array($codigo)){
                $fechaDB = $row[3]; // guardamos la cadena de la fecha del memo
                $añoDB = explode ("/", $fechaDB); // guardamos el año del memo


                
         //--------COMPARAMOS LOS MESES-------------//
                    //mes del sistema y mes del ultimo registro

                    for ($x=0; $x < 12 ; $x++) { 
                        if($meses_string[$x] == $añoDB[1]){
                            $posicion = $x+1; // obtenermos el mes del ultimo registro del sistema en numer
                        }
                    }
    
                    //VALIDACIONES PARA EL CORRELATIVO

                    if($añoS == $añoDB[2]){ // año igual
                        if ($mesS > $posicion){ // si el mes es mayor
                            $cont++;
                        
                        }else if(($mesS == $posicion)){ // mes igual
                            if($diaS < $añoDB[0]){  // dia es menor 
                                $cont = 0;
                               
                            }else{ // si el dia es distinto de menor, es decir:  mayor o igual
                                $cont++;
                            }
                        } else{ // si el mes es menor
                            $cont = 0;
                              
                        }
                    }else if($añoS > $añoDB[2]){ // si el año es mayor
                        $cont;
                           
                    }else{ // si el año es menor
                        $cont = 0;
                          
                    }



            } // cierre del while

        } // cierre del if --> if(pg_num_rows($codigo)>0)

        
        /*echo "<br>INFORMACION<br>";
        echo "<br>para: ".$para;
        echo "<br>asunto:".$asunto;
        echo "<br>descripcion: " . $descripcion;
        echo "<br>fecha:".$fechaS;
        echo "<br>contador:".$cont;
        echo "<br>cedula:".$cedula;
        echo "<br>estatus:".$estatus;
        echo "<br>tipo documento:".$tipoD;*/


        //VALIDAMOS si cont es mayor que 0 o no

           if($cont > 0){

                //PARA CREAR EL CORRELATIVO DEL MEMO
                $primeraP = "CE.M.1700.";
                $segundaP = $añoS . ".";
                $terceraP = sprintf("%04d",$cont);

                $idMemo = $primeraP.$segundaP.$terceraP;
                $fechaS = strtoupper($fechaS); // convertimos la fecha en mayusculas


               /* echo "<br>INFORMACION<br>";
                echo "<br>para: ".$para;
                echo "<br>asunto:".$asunto;
                echo "<br>descripcion: " . $descripcion;
                echo "<br>fecha:".$fechaS;
                echo "<br>contador:".$cont;
                echo "<br>cedula:".$cedula;
                echo "<br>estatus:".$estatus;
                echo "<br>tipo documento:".$tipoD;
                echo "<br>de:".$de;
                echo "<br><br><br>";*/

                
            //buscamos el id del ultimo encabezado
                $imgEncabezado = new imgEncabezado(null,null,null);

                $resultado = $imgEncabezado->consultarImagen();

                $ultimoId = pg_num_rows($resultado); //guardamos el id del encabezado
                
                $memo = new memo(null,$fechaS,$estatus,$cedula,$tipoD,$ultimoId,$idMemo,$para,$asunto,$descripcion,$de);

                //echo $memo->toString(); // hacemos el llamado al método
            
               $result = $memo->crearMemo(); //llamamos al metodo de crear en la clase memo

                
                if($result==true){
                   // echo "<br>creación exitosa <br>";
                    echo"
                        <script>
                            Swal.fire({
                                title: 'CREACIÓN EXITOSA',
                                icon: 'info',
                                showCancelButton: false,
                                confirmButtonText: 'ACEPTAR',
                                cancelButtonText: 'INICIO',
                                position: 'center',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    window.location.href='../vista/vistaConsultarMemo.php';
                                }
                            });

                        </script>
                    ";

                }else{
                    //echo "<br>error <br>";
                    echo"
                        <script>
                            Swal.fire({
                                title: 'ERROR',
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonText: 'ACEPTAR',
                                cancelButtonText: 'INICIO',
                                position: 'center',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false
                            })
                            .then(resultado => {
                            if (resultado.value) {
                                window.location.href='../vista/vistaCrearMemo.php';
                            }
                        });

                        </script>
                    ";
                }

           }else if ($cont == 0){
                //echo "<br>problemas de fechas <br>";

                echo"
                    <script>
                        Swal.fire({
                            title: 'ERROR',
                            html: '<b>existen problemas de fechas. <br> Le recomendamos revisar la fecha del ordenador<b>',
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'ACEPTAR',
                            cancelButtonText: 'INICIO',
                            position: 'center',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false
                        })
                        .then(resultado => {
                            if (resultado.value) {
                                window.location.href='../vista/vistaCrearMemo.php';
                            }
                        });

                     </script>
                ";
            }


            
?>