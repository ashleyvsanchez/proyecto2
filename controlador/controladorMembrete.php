<?php

    /*para fecha en español*/
    setlocale(LC_ALL,"spanish"); 

    /*Incluimos el menu*/
    include_once ('../vista/vistaMenu.php');

    require_once('../modelo/claseImgEncabezado.php');
    $fechaS = strftime('%d/%m/%G');

    // Cómo subir el archivo
    $directorio = '../imagenes/'; //nombre de la carpeta
    $archivo = $directorio . basename($_FILES["archivo"]["name"]);

    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION)); //tipo del documento

    //verificamos si es una imagen

    if(($tipoArchivo=='jpg') || ($tipoArchivo=='jpeg') || ($tipoArchivo=='png')){

        //CONSULTAMOS LA IMAGEN PARA EVITAR REPITAN EL NOMBRE
        $imgEncabezado=new imgEncabezado(null,$archivo,null); //instanciamos
        $result = $imgEncabezado->consultarRuta();

        if(pg_num_rows($result)>0){
            echo"
            <script>
                Swal.fire({
                    title: 'ERROR',
                    icon: 'error',
                    html: 'Ya existe un membrete con ese nombre, por favor cámbielo',
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
                    window.location.href='../vista/vistaMembrete.php';
                }
            });

            </script>
            ";
        }else{
           //GUARDAMOS LA IMAGEN 
           $imgEncabezado=new imgEncabezado(null,$archivo,$fechaS); //instanciamos
           $resultado=$imgEncabezado->guardarImagen();


           if($resultado==true){
               move_uploaded_file($_FILES['archivo']['tmp_name'],$archivo);
               //echo "se guardo con exito";
               echo"
               <script>
                   Swal.fire({
                       title: 'SE ACTUALIZÓ CON ÉXITO',
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
                           window.location.href='../vista/vistaMembrete.php';
                       }   
                   });

               </script>
               ";

               
           }else{
               //echo "error";
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
                           window.location.href='../vista/vistaMembrete.php';
                       }
                   });

                   </script>
               ";
           }
        }

    }else{
        
        echo"
            <script>
                Swal.fire({
                    title: 'NO ES UNA IMAGEN',
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
                        window.location.href='../vista/vistaMembrete.php';
                    }
                });

             </script>
         ";

    }

?>