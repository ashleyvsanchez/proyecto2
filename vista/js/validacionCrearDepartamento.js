
//---GUARDAMOS LOS DATOS DEL FORMULARIO EN CONSTANTES----------

const nombreDepartamento = document.getElementById('nombreDepartamento');
const idDepartamento = document.getElementById('idDepartamento');
const form = document.getElementById('formCrearDepartamento');

// Colores de validación
const green = '#4CAF50';
const red = '#F44336';

//---------VALIDAMOS-----------

form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  event.preventDefault();
  if ((validarNombre()) && (validarID())){
    
    //window.location = './crearDepartamento.php';
    //return true;
    Swal.fire({
        title: "CONFIRMACIÓN",
        html: "Pulse <b>ACEPTAR</b> para crear departamento o <b>CANCELAR</b> para cancelar el proceso",
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

//---VALIDAMOS EL NOMBRE----

function validarNombre() {
    // Revisar si está vacío
    if (chequearVacio(nombreDepartamento)) return;
    // Revisar si solo contiene letras
    if (!chequearSoloLetras(nombreDepartamento)) return;
    // Debe tener cierta cantidad de caracteres
    if (!longitudNombre(nombreDepartamento,6,20)) return;
      return true;
}

//---VALIDAMOS EL ID----

function validarID() {
    // Revisar si está vacío
    if (chequearVacio(idDepartamento)) return;
    // Debe tener cierta cantidad de caracteres
    if (!longitudID(idDepartamento,4)) return;
    // Revisar si solo contiene números
    if (!chequearSoloNumeros(idDepartamento)) return;
      return true;
  }


//---FUNCION PARA CAMPOS VACIOS----

function chequearVacio(field) {
  if (vacio(field.value.trim())) {
    setInvalido(field, `${field.name} no debe estar vacío`);
      return true;
  } else {
    setValido(field);
      return false;
  }
}

//---FUNCION PARA CAMPOS VACIOS----

function vacio(value) {
  if (value === '') return true;
    return false;
}

//---FUNCION PARA MENSAJES INVALIDOS----

function setInvalido(field, message) {
  //field.className = 'invalid';
  field.nextElementSibling.innerHTML = message;
  field.nextElementSibling.style.color = red;
}

//---FUNCION PARA MENSAJES VALIDOS----
  
function setValido(field) {
  //field.className = 'valid';
  field.nextElementSibling.innerHTML = '';
}

//---FUNCION PARA CONFIRMAR QUE EL NOMBRE SOLO SEAN LETRAS-----

function chequearSoloLetras(field) {
  if (/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(field.value)) {
    setValido(field);
    return true;
  } else {
    setInvalido(field, `${field.name} solo debe contener letras`);
    return false;
  }
}

  //---FUNCION PARA CONFIRMAR QUE EL ID SOLO SEAN NUMEROS-----

  function chequearSoloNumeros(field) {
    if (/^([0-9])*$/.test(field.value)) {
      setValido(field);
      return true;
    } else {
      setInvalido(field, `${field.name} solo debe contener números`);
      return false;
    }
  }

 //---FUNCION PARA CONFIRMAR CANT. LETRAS EN EL NOMBRE-----

  function longitudNombre(field, minLength, maxLength) {
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

//---FUNCION PARA CONFIRMAR CANT. NUMEROS EN EL ID-----

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

//---FUNCION PAARA CONFIRMAR QUE CONINCIDA-----

  function coincidirConRegEx(regEx, field, message) {
    if (field.value.match(regEx)) {
      setValido(field);
      return true;
    } else {
      setInvalido(field, message);
      return false;
    }
  }
