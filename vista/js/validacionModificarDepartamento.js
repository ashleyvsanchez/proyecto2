
//-------GUARDAMOS LOS DATOS DEL FORMULARIO-------

const nombreDepartamento = document.getElementById('nombreDepartamento'); // segundo formulario
const idDepartamento = document.getElementById('idDepartamento'); // primer formulario
const idS = document.getElementById('idS');
const form = document.getElementById('formMConsultarDepartamento'); // primer formulario

// Colores de validación
const green = '#4CAF50';
const red = '#F44336';


//----------VALIDAMOS-------------

form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  if(form.name=="formModificarDepartamento"){
    event.preventDefault();
    if (validarNombre()){
    
    Swal.fire({
        title: "CONFIRMACIÓN",
        html: "Pulse <b>ACEPTAR</b> para modificar departamento o <b>CANCELAR</b> para cancelar el proceso",
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

  }else if(form.name=="formMConsultarDepartamento"){
     event.preventDefault();
    if (validarIdDepartamento()){
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
  }
  
   
});


//------VALIDAMOS EL ID DEL DEPARTAMENTO----------

function validarIdDepartamento() {
  // Revisar si está vacío
  if (idDepartamento.value == "0" || idDepartamento.value == "" ) {
        idS.innerHTML = `Debe seleccionar una opción en ${idDepartamento.name}`;
        idS.style.color = red;
        return false;
      } else {
        idS.innerHTML = ``;
        return true
      }
}


//------VALIDAMOS EL NOMBRE DEL DEPARTAMENTO----------

function validarNombre(){
  // Revisar si está vacío
  if (chequearVacio(nombreDepartamento)) return;
  // Revisar si solo contiene letras
  if (!chequearSoloLetras(nombreDepartamento)) return;
  // Debe tener cierta cantidad de caracteres
  if (!longitudNombre(nombreDepartamento,6,20)) return;
  return true;
}

//------FUNCION PARA CAMPOS VACIOS----------

function chequearVacio(field) {
  if (vacio(field.value.trim())) {
    setInvalido(field, `${field.name} no debe estar vacío`);
    return true;
  } else {
    setValido(field);
    return false;
  }
}

//------FUNCION PARA CAMPOS VACIOS----------

function vacio(value) {
  if (value === '') return true;
  return false;
}

//------FUNCION PARA MENSAJES INVALIDOS O DE ERROR----------

function setInvalido(field, message) {
  //field.className = 'invalid';
  field.nextElementSibling.innerHTML = message;
  field.nextElementSibling.style.color = red;
}

//------FUNCION PARA MENSAJES VALIDOS O CORRECTOS----------

function setValido(field) {
  //field.className = 'valid';
  field.nextElementSibling.innerHTML = '';
}


//------FUNCION SOLO PARA NÚMEROS----------
function chequarSoloNumeros(field) {
  if (/^([0-9])*$/.test(field.value)) {
    setValido(field);
    return true;
  } else {
    setInvalido(field, `${field.name} solo debe contener números`);
    return false;
  }
}

//------FUNCION SOLO PARA LETRAS----------
function chequearSoloLetras(field) {
  if (/^[a-zA-Z ]+$/.test(field.value)) {
    setValido(field);
    return true;
  } else {
    setInvalido(field, `${field.name} solo debe contener letras`);
    return false;
  }
}

 //------FUNCION SOLO PARA  CANT DE LETRAS----------

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

   //------FUNCION SOLO PARA  CANT DE NUMEROS----------

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

 //------FUNCION PARA CONFIRMAR QUE COINCIDEN----------

function coincidirConRegEx(regEx, field, message) {
    if (field.value.match(regEx)) {
      setValido(field);
      return true;
    } else {
      setInvalido(field, message);
      return false;
    }
  }

