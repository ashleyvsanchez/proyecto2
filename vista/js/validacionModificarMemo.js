
//-------GUARDAMOS LOS DATOS DEL PRIMER FORMULARIO FORMULARIO-------

const ID = document.getElementById('Idmemo'); //primer formulario
const IDS = document.getElementById('IDS');
//const form = document.getElementById('formMemo'); // primer formulario

//-------GUARDAMOS LOS DATOS DEL SEGUNDO FORMULARIO--------
const asuntoMemo = document.getElementById('asunto');
//const descripcionMemo = document.getElementById('editor1');

//------ GUARDAMOS EL ID DE AMBOS FOMRULARIO

const form = document.getElementById('formMemo'); // primer formulario

// Colores de validación
const green = '#4CAF50';
const red = '#F44336';


//----------VALIDAMOS-------------

form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  if(form.name=="controladorModificarMemo"){ // fomulario del controlador
    event.preventDefault();
    if ((validarAsunto())
      ){
    
    Swal.fire({
        title: "CONFIRMACIÓN",
        html: "Pulse <b>ACEPTAR</b> para modificar MEMO o <b>CANCELAR</b> para cancelar el proceso",
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

  }else if(form.name=="formularioMemo"){ //formulario de busquedad del id
     event.preventDefault();
    if (validarId()){
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

function validarId(){
// Revisar si está vacío
  if (ID.value == "0" || ID.value == "" ) {
    IDS.innerHTML = `Debe seleccionar una opción en ${Idmemo.name}`;
    IDS.style.color = red;
    return false;
  } else {
      IDS.innerHTML = ``;
      return true;
  }
}

//------VALIDAMOS EL NOMBRE DEL DEPARTAMENTO----------


//-----VALIDAMOS EL ASUNTO---------

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
  if (/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(field.value)) {
    setValido(field);
    return true;
  } else {
    setInvalido(field, `${field.name} solo debe contener letras`);
    return false;
  }
}

 //------FUNCION SOLO PARA  CANT DE LETRAS----------

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



