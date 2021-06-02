const nombre = document.getElementById('modNombre');

const Snombre = document.getElementById('selectNombre');

const textNombre = document.getElementById('Snombre');


//Variable que obtiene clave de usuario
const clave = document.getElementById('Clave');

const claveRep = document.getElementById('ClaveRep')

//variable que obtiene el rol del usuario
const rol = document.getElementById('rolUsuario');

//const textRol = document.getElementById('rolUsu');

const form = document.getElementById('formulario');

const green = '#4CAF50';
const red = '#F44336';




form.addEventListener('submit', function(event){
  // Prevenir comportamiento por defecto
  
  event.preventDefault();

    //Aqui verifica el submit de consultar usuario a modificar
    if(form.name == "Consultar"){
      if(validarNombreConsulta()){
            form.submit();
            return true;

          } 
          else{

            Swal.fire({
              title: '¡Campo vacio!',
              icon: 'error',
              text: 'El campo no debe estar vacio',
              confirmButtonText: 'Aceptar '
          });
            return false;
          }
     }

//Aqui verifica el que va en la modicacion
  else if(form.name == "Modificar"){
          if(validarOpciones())
          {
                    Swal.fire({
                        title: "CONFIRMACIÓN",
                        html: "Pulse <b>ACEPTAR</b> para Modificar Usuario o <b>CANCELAR</b> para cancelar el proceso",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: "ACEPTAR",
                        cancelButtonText: "CANCELAR",
                    })
                    .then(resultado => 
                    {
                        if (resultado.value) 
                        {
                          form.submit();
                        } 
                        else 
                        {
                            Swal.fire({
                                title: '¡CANCELACIÓN!',
                                icon: 'success',
                                text: 'Cancelación exitosa',
                                confirmButtonText: 'Intentar de nuevo'
                            });
                        }
                    });
          } 
          else
          {
           
            return false;
          }
    } 

   });





function validarOpciones(){

//Estas validaciones son para las opciones marcadas a modificar

    if(mostrarNom() == true )
    {
      if(!validarNombre()){return;}
    }

    if(mostrarClave() == true)
    {
      if(!validarClave()){return;}
      if(!validarRepetirClave()){return;}
    }

    if(mostrarRol() == true)
    {
      if(!validarRol()){return ;}
    } 

    if(!mostrarNom() && !mostrarClave() && !mostrarRol())
    {
      Swal.fire({
        title: '¡Error!',
        icon: 'error',
        text: 'Seleccione una opción para modificar',
        confirmButtonText: 'Aceptar '
        });
    
      return false;
    }

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
  
  
  
  function validarRol() {

    textRol = document.getElementById("textRol");
    // Revisar si está vacío
    if (rol.value == 2|| rol.value== 3) {
        textRol.innerHTML = ``;
          return true;
        } else {
          textRol.innerHTML = `Debe seleccionar una opción en ${rol.name}`;
           textRol.style.color = red;
          return false;
        }
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
    // 3- A a 1
    // 4- A a 1 @
    if (!containsCharacters(clave, 4)) return;
    return true;
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

//--------------------------------------Opciones de modificacion de usuario-----------------------\\


//Esta funcion muestra si quieres cambiar de nombre de usuario
function mostrarNom() {
    element = document.getElementById("modNomU");
    check = document.getElementById("checkNomU");
    if (check.checked) {
        element.style.display='block';
        return true
    }
    else {
        element.style.display='none';
        return false
    }
  }
  
  
  //Esta te muestra si quieres cambiar la clave
  function mostrarClave() {
    element = document.getElementById("modClave");
    element2 = document.getElementById('modClaveRep');
    check = document.getElementById("checkClave");
    if (check.checked) {
        element.style.display='block';
        element2.style.display='block';
        return true;
    }
    else {
        element.style.display='none';
        element2.style.display='none';
        return false;
    }
  }
  
  
  //Esta funcion te uestra si quieres cambiar el rol del usuario
  function mostrarRol() {
    element = document.getElementById("modRol");
    check = document.getElementById("checkRol");
    if (check.checked) {
        element.style.display='block';
        return true;
    }
    else {
        element.style.display='none';
        return false;
    }
  }
  
  //-----------------------------------------------------------------------------\\
  