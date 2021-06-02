
//---GUARDAMOS LOS DATOS DEL FORMULARIO EN CONSTANTES----------

//const deMemo = document.getElementById('de');
const paraMemo = document.getElementById('para');
const paraS = document.getElementById('paraS');
const asuntoMemo = document.getElementById('asunto');
const descripcionMemo = document.getElementById('editor1');
const form = document.getElementById('formCrearMemo');

// Colores de validación
const green = '#4CAF50';
const red = '#F44336';

//---------VALIDAMOS-----------

form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  event.preventDefault();
   if ((validarPara())
      && (validarAsunto())
      && (validarDescripcion())){
    
    //window.location = './crearDepartamento.php';
    //return true;
    Swal.fire({
        title: "CONFIRMACIÓN",
        html: "Pulse <b>ACEPTAR</b> para crear memo o <b>CANCELAR</b> para cancelar el proceso",
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


function validarAsunto() {
  // Revisar si está vacío
  if (chequearVacio(asuntoMemo)) return;
  // Revisar si solo contiene letras
  if (!chequearSoloLetras(asuntoMemo)) return;
  // Debe tener cierta cantidad de caracteres
  if (!longitud(asuntoMemo,6,80)) return;
    return true;
}

//---VALIDAMOS LA DESCRIPCION----
function validarDescripcion() {
  // Revisar si está vacío
  if (chequearVacio(descripcionMemo)) return;
  return true;
}s


function validarPara() {
  // Revisar si está vacío
  if (paraMemo.value == "0" || paraMemo.value == "" ) {
        paraS.innerHTML = `Debe seleccionar una opción en ${para.name}`;
        paraS.style.color = red;
        return false;
      } else {
        paraS.innerHTML = ``;
        return true
      }
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

  //---FUNCION PARA CONFIRMAR QUE LA CEDULA SOLO SEAN NUMEROS-----

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
