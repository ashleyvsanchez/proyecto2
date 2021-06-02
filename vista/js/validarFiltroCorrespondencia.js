// GUARDAMOS DATOS PARA MOSTRAR U OCULTAR OPCION

const fecha = document.getElementById("inpFecha");
const asunto = document.getElementById("inpAsunto");
const depa = document.getElementById("inpDepa");
const optFiltro = document.getElementById("optFiltro");


//GUARDAMOS LOS DATOS DEL FORMULARIO

const fechaFiltro = document.getElementById("fecha");
const asuntoFiltro = document.getElementById("asunto");
const nombreFiltro = document.getElementById('nombreDepartamento');
const form = document.getElementById('form');


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

function mostrarOptFiltro(){
  
 
  if (optFiltro.value=='1'){
    fecha.style.display='block';
  }
  else{
    fecha.style.display='none';
    fecha.value="0";
  }

  if (optFiltro.value=='2'){
    asunto.style.display='block';
  }
  else{
    asunto.style.display='none';
    asunto.value="0";
  }

  if (optFiltro.value=='3'){
    depa.style.display='block';
  }
  else{
    depa.style.display='none';
    depa.value="0";
  }
  
}


//--- VALIDAMOS LA OPCION DE BUSQUEDAD Y EL CAMPO----//


function validar(){

  if(!validarOpt()){return;}

  if(optFiltro.value == 1){
    if(!validarFecha()){return;}
  }
  if(optFiltro.value == 2){
    if(!validarAsunto()){return;}
  }
  if(optFiltro.value == 3){
    if(!validarNombre()){return;}
  }
   return true;           
}

function validarOpt(){
  if (validarOpcion(optFiltro)) return;

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


  //--- VALIDAMOS LA FECHA----//

function validarFecha() {
    // Revisar si está vacío
    if (chequearVacio(fechaFiltro)) return;
    if (!containsCharacters(fechaFiltro)) return;
    return true;
  }


//--- VALIDAMOS EL ASUNTO ----//
function validarAsunto() {
  // Revisar si está vacío
  if (chequearVacio(asuntoFiltro)) return;
  // Revisar si solo contiene letras
  if (!chequearSoloLetras(asuntoFiltro)) return;
  // Debe tener cierta cantidad de caracteres
  if (!longitud(asuntoFiltro,6,80)) return;
    return true;
}

//--- VALIDAMOS EL NOMBRE ----//

function validarNombre() {
    // Revisar si está vacío
    if (chequearVacio(nombreFiltro)) return;
    // Revisar si solo contiene letras
    if (!chequearSoloLetras(nombreFiltro)) return;
    // Debe tener cierta cantidad de caracteres
    if (!longitud(nombreFiltro,6,20)) return;
    return true;
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

//--- VALIDAMOS SI EL NOMBRE CONTIENE LETRAS ----//

function chequearSoloLetras(field) {
    if (/^[a-zA-Z ]+$/.test(field.value)) {
      setValido(field);
      return true;
    } else {
      setInvalido(field, `${field.name} solo debe contener letras`);
      return false;
    }
}

//--- VALIDAMOS SI EL ID CONTIENE NUMEROS ----//

function chequearSoloNumeros(field) {
    if (/^([0-9])*$/.test(field.value)) {
      setValido(field);
      return true;
    } else {
      setInvalido(field, `${field.name} solo debe contener números`);
      return false;
    }
}

//--- VALIDAMOS SI EL NOMBRE CONTIENE LA CANTIDAD DE LETRAS ----//

function longitud(field, minLength, maxLength) {
    if (field.value.length >= minLength && field.value.length < maxLength) {
      setValido(field);
      return true;
    } else if (field.value.length < minLength) {
      setInvalido(
        field,
        `${field.name} debe tener al menos ${minLength} caracteres`
      );
      return false;
    } else {
      setInvalido(
        field,
        `${field.name} debe tener menos de ${maxLength} caracteres`
      );
      return false;
    }
}

  //--- VALIDAMOS SI EL ID CONTIENE LA CANTIDAD DE NUMEROS ----//

function longitudID(field,maxLength) {
    if (field.value.length < maxLength) {
      setValido(field);
      return true;
    } else {
      setInvalido(
        field,
        `${field.name} debe tener menos de ${maxLength} caracteres`
      );
      return false;
    }
}


//------VALIDAMOS LA FECHA-------

function containsCharacters(field) {
  let regEx;
  //original:  /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/
  // dia con barra: /^(0?[1-9]|1[012])[\/\-]$/;
  //mes con barra: /^[a-zA-Z ]+[\/\-]$/;
  //año: /\d{4}$/;
  regEx =/^([0-9]{4})-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$/;
  return coincidirConRegEx(
        regEx, 
        field,
        'El formato de la fecha debe ser: año-mes-día');
}


//--- VALIDAMOS SI COINCIDE ----//

function coincidirConRegEx(regEx, field, message) {
    if (field.value.match(regEx)) {
      setValido(field);
      return true;
    } else {
      setInvalido(field, message);
      return false;
    }
}





