$(document).ready(function(){
	$rol= document.getElementById('rol').value;
	if ($rol=="Administrador") {
		$usuario = document.getElementById('usuario').style.display="block";
		$persona = document.getElementById('persona').style.display="block";
        $departamento = document.getElementById('departamento').style.display="block";

        /*$gUsuario = document.getElementById('gUsuario').style.display="block";
        $gPersona = document.getElementById('gPersona').style.display="block";
        $gDepartamento = document.getElementById('gDepartamento').style.display="block";*/
        $gMemo = document.getElementById('gMemo').style.display="none";
        $gSolicitud = document.getElementById('gSolicitud').style.display="none";


	}else if($rol=="Jefe departamento"){
        $persona = document.getElementById('persona').style.display="block";
        $memo = document.getElementById('memo').style.display="block";
        $solicitud = document.getElementById('solicitud').style.display="block";
        $correspondencia = document.getElementById('correspondencia').style.display="block";
        $estatus = document.getElementById('estatus').style.display="block";
        $cambioImagen = document.getElementById('cambioImagen').style.display="block";

        $gUsuario = document.getElementById('gUsuario').style.display="none";
        $gDepartamento = document.getElementById('gDepartamento').style.display="none";
        /*$gPersona = document.getElementById('gPersona').style.display="block";
        $gMemo = document.getElementById('gMemo').style.display="block";
        $gSolicitud = document.getElementById('gSolicitud').style.display="block";*/


    }else if ($rol=="Secretaria"){

        $memo = document.getElementById('memo').style.display="block";
        $solicitud = document.getElementById('solicitud').style.display="block";
        $correspondencia = document.getElementById('correspondencia').style.display="block";
        $estatus = document.getElementById('estatus').style.display="block";
        $cambioImagen = document.getElementById('cambioImagen').style.display="block";

        $gUsuario = document.getElementById('gUsuario').style.display="none";
        $gPersona = document.getElementById('gPersona').style.display="none";
        $gDepartamento = document.getElementById('gDepartamento').style.display="none";

        /*$gMemo = document.getElementById('gMemo').style.display="block";
        $gSolicitud = document.getElementById('gSolicitud').style.display="block";*/

        
    }
});
							
							