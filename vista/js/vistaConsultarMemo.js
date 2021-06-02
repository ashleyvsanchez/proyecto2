// GUARDAMOS DATOS PARA MOSTRAR U OCULTAR OPCION

const id = document.getElementById("inpID");
const fecha = document.getElementById("inpFecha");
const asunto = document.getElementById("inpAsunto");
const depa = document.getElementById("inpDepa");
const optMemo = document.getElementById("optMemo");


//--------------------

const paraMemo = document.getElementById('nombreDepartamento');
const asuntoMemo = document.getElementById('asunto');
const idMemo = document.getElementById('idMemo');
const fechaMemo = document.getElementById('fecha');


const form = document.getElementById('form');


// Colores de validación
const green = '#4CAF50';
const red = '#F44336';

//---------VALIDAMOS-----------

form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  event.preventDefault();
    if (
         validar() 
    ) {
      form.submit();
    }else{
      Swal.fire({
      title: '¡Error!',
      icon: 'error',
      text: 'Revisa los campos',
      confirmButtonText: 'Intentar de nuevo'
    });
     return false;
    }
    //alert("Revisa los campos, hay un error");
   
});



function mostrarOptMemo(){

    if (optMemo.value=='1'){
        id.style.display='block';
    }
    else{
        id.style.display='none';
        id.value="0";
    }

    if (optMemo.value=='2'){
        fecha.style.display='block';
    }
    else{
        fecha.style.display='none';
        fecha.value="0";
    }

    if (optMemo.value=='3'){
        asunto.style.display='block';
    }
    else{
        asunto.style.display='none';
        asunto.value="0";
    }

    if (optMemo.value=='4'){
        depa.style.display='block';
    }
    else{
        depa.style.display='none';
        depa.value="0";
    }
  
}


function validar(){
    if(!validarOpt()){return;}

    if(optMemo.value == 1){
        if(!validarID()){return;}
    }

    if(optMemo.value == 2){
        if(!validarFecha()){return;}
    }

    if(optMemo.value == 3){
        if(!validarAsunto()){return;}
    }

    if(optMemo.value == 4){
        if(!validarPara()){return;}
    }

    return true;
    
}



function validarOpt(){
  if (validarOpcion(optMemo)) return;

  return true;
}


//----- VALIDAR OPCIONES DEL SEGUNDO SELECT DINAMICO


function validarPara(){
    if (validarOpcion(paraMemo)) return;
  
    return true;
}



function validarAsunto(){
    if (validarOpcion(asuntoMemo)) return;
  
    return true;
}

function validarID(){
    if (validarOpcion(idMemo)) return;
  
    return true;
}

function validarFecha(){
    if (validarOpcion(fechaMemo)) return;
  
    return true;
}



function validarOpcion(field){
    if(vacio(field.value.trim())) {
        setInvalido(field, `Debe seleccionar una opción`);
        return true;
    }else {
        setValido(field)
        return false;
    }

}



 //--- VALIDAMOS SI ESTAN VACIOS ----//

 function chequearVacio(field) {
    if (vacio(field.value.trim())) {
      setInvalido(field, `${field.name} no debe estar vacío`);
      return true;
    } else {
      setValido(field);
      return false;
    }
}

//--- VALIDAMOS SI ESTAN VACIOS ----//

function vacio(value) {
    if (value == ''|| value == 0) return true;
    return false;
}

//--- VALIDAMOS PARA MENSAJES INVALIDOS O INCORRECTOS ----//

function setInvalido(field, message) {
  field.nextElementSibling.innerHTML = message;
  field.nextElementSibling.style.color = red;
   
}

//--- VALIDAMOS PARA MENSAJES VALIDOS O CORRECTOS ----//

function setValido(field) {
  field.nextElementSibling.innerHTML = '';
}

