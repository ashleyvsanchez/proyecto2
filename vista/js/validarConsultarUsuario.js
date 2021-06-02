  
//Variable que obtiene nombre de usuario


const Snombre = document.getElementById('selectNombre');
const textNombre = document.getElementById('Snombre');


//Variable que obtiene clave de usuario
const clave = document.getElementById('claveUsuario');

//Variable que obtienes la cedula usuario 
const cedula = document.getElementById('cedulaUsuario');

//variable que obtiene el rol del usuario
const rol = document.getElementById('rolUsuario')

const form = document.getElementById('formulario');

const green = '#4CAF50';
const red = '#F44336';


form.addEventListener('submit', function(event){
  // Prevenir comportamiento por defecto
  
  event.preventDefault();

  //Este if es para el formulario de consultar
  if(form.name == "consultar"){
    if (mostrarOptUsu() == true){
      //este if es cuando quiera consultar un usuario en especifico
      if (validarNombreConsulta()){
        form.submit();
    //fin de usuario en especifico
     }else{
       Swal.fire({
       title: '¡Error!',
       icon: 'error',
       text: 'Revisa los campos',
        confirmButtonText: 'Intentar de nuevo'
    });
      //return false;
    }
  }else {
        form.submit();
       
      //Fin de consultar todos los usuario
      }
 //final de consultar
    }
});







//Esta funcion valida que los campos de "nombre" esten correctos
function validarNombre() {
  // Revisar si está vacío
  if (checkIfEmpty(nombre)) return;
  // Revisar si solo contiene letras
  if (!checkIfOnlyLetters(nombre)) return;
  return true;
}


function validarNombreConsulta(){


  // Revisar si está vacío
  if (Snombre.value != 0) {
      textNombre.innerHTML = ``;
    return true;
} 
else {
         textNombre.innerHTML = `Debe seleccionar una opción en Nombre de usuario`;
         textNombre.style.color = red;      
         return false;
    }

}



//Esta funcion valida que los campos de "Cedula" esten correctos





//Funcion para campos vacios
function checkIfEmpty(field) {
  if (isEmpty(field.value.trim())) {
    // set field invalid
    setInvalid(field, `${field.name} no debe estar vacío`);
    return true;
  } else {
    // set field valid
    setValid(field);
    return false;
  }
}


function isEmpty(value) {
  if (value === '') return true;
  return false;
}

function setInvalid(field, message) {

  field.nextElementSibling.innerHTML = message;
  field.nextElementSibling.style.color = red;
}
function setValid(field) {
 
  field.nextElementSibling.innerHTML = '';
}


//funcion que verifica si son sólo letras
function checkIfOnlyLetters(field) {
  if (/^[a-zA-Z ]+$/.test(field.value)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, `${field.name} solo debe contener letras`);
    return false;
  }
}

//Funcion que valida si son sólo numeros
function checkIfOnlynumbers(field) {
  if (/[0-9]/.test(field.value)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, `${field.name} solo debe contener Numeros`);
    return false;
  }
}


//funcion que verifica el minimo y el maximo de caracteres
function meetLength(field, minLength, maxLength) {
  if (field.value.length >= minLength && field.value.length < maxLength) {
    setValid(field);
    return true;
  } else if (field.value.length < minLength) {
    setInvalid(
      field,
      `${field.name} debe tener al menos ${minLength} caracteres`
    );
    return false;
  } else {
    setInvalid(
      field,
      `${field.name} debe tener menos de ${maxLength} caracteres`
    );
    return false;
  }
}



function containsCharacters(field,code) {
  let regEx;
  switch (code) {
    case 1:
      // Letras
      regEx = /(?=.*[a-zA-Z])/;
      return matchWithRegEx(
        regEx, 
        field,
        'Debe contener al menos una letra');
    case 2:
      // Letras y numeros
      regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Debe contener al menos una letra y un número'
      );
    case 3:
      // Mayúscula, minúscula y número
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Debe contener al menos una letra minúscula, una letra mayúscula y un número'
      );
      case 4:
        // Mayúscula, minúscula, número y caracter especial
        regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
        return matchWithRegEx(
          regEx,
          field,
          'Debe contener al menos una letra minúscula, una letra mayúscula, un número y un caracter especial'
        );
      
      default:
        return false;
    }
  }

function matchWithRegEx(regEx, field, message) {
  if (field.value.match(regEx)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, message);
    return false;
  }
}


//----------------------------------Consultar Usuario-----------------------------\\

//Esta funcion habilita un input si quieres consultar un usuario en especifico
function mostrarOptUsu()
{
    nombreUsuario = document.getElementById('NomUsu');
    opcion = document.getElementById('optConUsu').value;

    if (opcion=='1') {
     nombreUsuario.style.display='block';
     return true;
      }
    else {
     nombreUsuario.style.display='none';
     return false;
    }
}
