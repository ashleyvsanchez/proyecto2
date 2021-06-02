//--- GUARDAMOS LOS DATOS PARA OCULTAR O MOSTRAR LAS OPCIONES DE BUSQUEDAD----//
const nombre = document.getElementById("inpNombre");
const nombreD = document.getElementById("nombreDepartamento");
const optDepartamento = document.getElementById("optDepa");


const form = document.getElementById("formConsultarDepartamento");


// Colores de validación
const green = '#4CAF50';
const red = '#F44336';


//--- VALIDAMOS ----//

form.addEventListener('submit', function(event) {
    // Prevenir comportamiento por defecto
    event.preventDefault();
    if (
        validar() 
    ) {
        form.submit();
    }else{
        Swal.fire({
        title: '¡ERROR!',
        icon: 'error',
        text: 'Revisa los campos',
        confirmButtonText: 'Intentar de nuevo'
      });
    }
});


//-- VALIDAMOS PARA LAS OPCIONES 

function mostrarOptDepa(){

    if (optDepartamento.value=='1'){
      nombre.style.display='block';
    }
    else{
      nombre.style.display='none';
      nombre.value="0";
    }
 
}


//validamos que no este vacio

function validarNombre(){
  if (validarOpcion(nombre)) return;

  return true;
}



function validar(){
  if(!validarOpt()){return;}

  if(optDepartamento.value == 1){
      if(!validarNombre()){return;}
  }

  return true;
  
}


function validarOpt(){
  if (validarOpcion(optDepartamento)) return;

  return true;
}


function validarNombre(){
  if (validarOpcion(nombreD)) return;

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
