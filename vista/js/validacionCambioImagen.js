
//-------GUARDAMOS LOS DATOS DEL FORMULARIO-------

const imagen = document.getElementById('Imagen'); // segundo formulario
const form = document.getElementById('formEnvioMembrete'); // primer formulario

// Colores de validación
const green = '#4CAF50';
const red = '#F44336';


//---------VALIDAMOS-----------

form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  event.preventDefault();
  if ((validarImagen())){
    Swal.fire({
        title: "CONFIRMACIÓN",
        html: "Pulse <b>ACEPTAR</b> para actualizar el membrete de los documentos o <b>CANCELAR</b> para cancelar el proceso",
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
      text: 'No ha seleccionado ninguna imagen',
      confirmButtonText: 'Intentar de nuevo'
    });
     return false;
    }
    //alert("Revisa los campos, hay un error");
   
});

//SI EL INPUT ESTA VACIO

//---VALIDAMOS EL ID----

function validarImagen() {
  // Revisar si está vacío
  if (chequearVacio(imagen)) return;
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
