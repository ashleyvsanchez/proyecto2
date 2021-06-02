
const username = document.getElementById('UserName');
const password = document.getElementById('UserPassword');

const form = document.getElementById('Formulario');

// Colores de validación
const green = '#4CAF50';
const red = '#F44336';




form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  event.preventDefault();
  if (validateUsername() && validatePassword()) {
    
    form.submit();
    return true;
  }
  else 
    return false;

});



function validateUsername() {
    // Revisar si está vacío
    if (checkIfEmpty(username)) return;
    // Revisar si solo contiene letras
    if (!checkIfOnlyLetters(username)) return;
    return true;
  }


  function validatePassword() {
    // Revisar si está vacío
    if (checkIfEmpty(password)) return;
    // Debe tener cierta cantidad de caracteres
    if (!meetLength(password, 8, 100)) return;
    // Debe contener estos caracteres
    // 1- a
    // 2- a 1
    // 3- A a 1
    // 4- A a 1 @
    if (!containsCharacters(password, 4)) return;
    return true;
  }




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



//Funcion de sólo letras
  function checkIfOnlyLetters(field) {
    if (/^[a-zA-Z ]+$/.test(field.value)) {
      setValid(field);
      return true;
    } else {
      setInvalid(field, `${field.name} solo debe contener letras`);
      return false;
    }
  }

//funcion de cantidad de caracteres 

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
          'Clave incorrecta');
      case 2:
        // Letras y numeros
        regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
        return matchWithRegEx(
          regEx,
          field,
          'Clave incorrecta'
        );
      case 3:
        // Mayúscula, minúscula y número
        regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
        return matchWithRegEx(
          regEx,
          field,
          'Clave incorrecta'
        );
      case 4:
        // Mayúscula, minúscula, número y caracter especial
        regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
        return matchWithRegEx(
          regEx,
          field,
          'Clave incorrecta'
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
  
  


  /*function validar(){
    if((validateUsername()) && (validatePassword())){
      alert("True")
        return true;
    }else{
        alert("False");
        return false;
    }
  }*/
  