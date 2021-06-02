//Variable que obtiene nombre de usuario
const nombre = document.getElementById('nombreUsuario');

//Variable que obtiene clave de usuario
const clave = document.getElementById('claveUsuario');

const claveRep = document.getElementById('claveUsuarioRep');

//Variable que obtienes la cedula usuario 
const cedula = document.getElementById('cedulaUsuario');

//variable que obtiene el rol del usuario
const rol = document.getElementById('rolUsuario');

const textRol = document.getElementById('rolUsu');


const form = document.getElementById('formulario');

const green = '#4CAF50';
const red = '#F44336';

//---------VALIDAMOS-----------

form.addEventListener('submit', function(event) {
    // Prevenir comportamiento por defecto
    
    event.preventDefault();
     if ((validarNombre()) 
     && (validarCedula())
     && (validarRepetirClave())
     && (validarClave())
     && (validarRol())
     ){
      
      //window.location = './crearDepartamento.php';
      //return true;
      Swal.fire({
          title: "CONFIRMACIÓN",
          html: "Pulse <b>ACEPTAR</b> para crear USUARIO o <b>CANCELAR</b> para cancelar el proceso",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: "ACEPTAR",
          cancelButtonText: "CANCELAR",
      })
      .then(resultado => {
          if (resultado.value) {
            form.submit();
          } else {
            Swal.fire({
                title: '¡CANCELACIÓN DE DATOS!',
                icon: 'success',
                text: 'Cancelación exitosa',
                confirmButtonText: 'Intentar de nuevo'
            });
          }
      });
  
  
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
  
  //Esta funcion valida que los campos de "nombre" esten correctos
  function validarNombre() {
    // Revisar si está vacío
    if (checkIfEmpty(nombre)) return;
    // Revisar si solo contiene letras
    if (!checkIfOnlyLetters(nombre)) return;
    return true;
  }


  //Esta funcion valida que los campos de "Cedula" esten correctos
function validarCedula(){

    if (checkIfEmpty(cedula)) return;
    // Revisar si solo contiene letras
    if (!checkIfOnlynumbers(cedula)) return;
    return true;
}


//Esta funcion valida que los campos de "Clave" esten correctos
function validarClave(){
    // Revisar si está vacío
    if (checkIfEmpty(clave)) return;
    // Debe tener cierta cantidad de caracteres
    if (!meetLength(clave, 8, 16)) return;
    // Debe contener estos caracteres
    // 1- a
    // 2- a 1
    // 3- A as 1
    // 4- A a 1 @
    if (!containsCharacters(clave, 4)) return;
    return true;
}
  
function validarRol() {
    // Revisar si está vacío
      if (rol.value == 2|| rol.value== 3) {
           textRol.innerHTML = ``;
                  return true;
      } 
      else {
                textRol.innerHTML = `Debe seleccionar una opción en ${rol.name}`;
                textRol.style.color = red;      
                return false;
           }
}


function validarRepetirClave(){

  if (checkIfEmpty(claveRep)) return;
 
  if(claveRep.value != clave.value){

    setInvalid(claveRep, `Las contraseñas no coinciden`);
    return false;
  }
  else{
    setValid(claveRep);
    return true;
  }

}
  

  
//Funcion para campos vacios
function checkIfEmpty(field) {
    if (isEmpty(field.value.trim())) {
      // set field invalid
      setInvalid(field, `Este campo no debe estar vacío`);
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
      setInvalid(field, `Este campo solo debe contener letras`);
      return false;
    }
  }
  
  //Funcion que valida si son sólo numeros
  function checkIfOnlynumbers(field) {
    if (/[0-9]/.test(field.value)) {
      setValid(field);
      return true;
    } else {
      setInvalid(field, `Este campo solo debe contener Numeros`);
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
  
  