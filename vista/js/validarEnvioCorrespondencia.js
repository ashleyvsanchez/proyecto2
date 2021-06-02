const destino = document.getElementById("Destino");

const asunto = document.getElementById("Asunto");

const mensaje = document.getElementById("Mensaje");

const form = document.getElementById('formulario');



titulo = document.getElementById("tituloDoc");

optMemo = document.getElementById('Memos');
memo = document.getElementById("optMemo");
textMemo = document.getElementById("textMemo");


optServicio = document.getElementById('Servicios');
servicio = document.getElementById("optServicio");



optRefrigerio = document.getElementById('Refrigerios');
refrigerio = document.getElementById("optRefrigerio");






form.addEventListener('submit', function(event){
    // Prevenir comportamiento por defecto
    
    event.preventDefault();
  
      //Aqui verifica si es el formulario de crear
      if(form.name == "Envio"){
        if(validarPara() && validarAsunto() && validarMensaje() && validarDocumentos()){
          
          Swal.fire({
            title: "CONFIRMACIÓN",
            html: "Pulse <b>ACEPTAR</b> para enviar el documento o <b>CANCELAR</b> para cancelar el proceso",
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
                   title: '¡CANCELACIÓN!',
                  icon: 'success',
                  text: 'Cancelación exitosa',
                  confirmButtonText: 'Intentar de nuevo'
              });
            }
        });
       }
    }
    else{
      
      return false; }
  
  });



const green = '#4CAF50';
const red = '#F44336';





function validarPara() {
    textDestino = document.getElementById("textDestino");
    // Revisar si está vacío
    if (destino.value == "0" || destino.value == "" ) {
          textDestino.innerHTML = `Debe seleccionar una opción en ${destino.name}`;
          textDestino.style.color = red;
          return false;
        } else {
            textDestino.innerHTML = ``;
          return true
        }
  }

function validarAsunto() {
    // Revisar si está vacío
    if (checkIfEmpty(asunto)) return;
    // Revisar si solo contiene letras
    if (!checkIfOnlyLetters(asunto)) return;
    // Revisa la cantidad minima y maxima
    if (!meetLength(asunto, 5, 50)) return;
    return true;
  }


  function validarMensaje() {
    // Revisar si está vacío
    if (checkIfEmpty(mensaje)) return;
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
    field.className = 'invalid form-control';
    field.nextElementSibling.innerHTML = message;
    field.nextElementSibling.style.color = red;
  }
  function setValid(field) {
    field.className = 'valid form-control';
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


  function matchWithRegEx(regEx, field, message) {
    if (field.value.match(regEx)) {
      setValid(field);
      return true;
    } else {
      setInvalid(field, message);
      return false;
    }
  }
  




//--------------------------------------- Mostrar los select de los documentos  -----------//


function validarDocumentos()
{

    if(mostrarMemos())
    {
      if(!validarMemo()){return;}
    }
    else if(mostrarServicios())
    {
      if(!validarServicio()){return;}
    }
    else if(mostrarRefrigerios())
    {
       if(!validarRefrigerio()){return;}
    }
     
    if(!mostrarMemos() && !mostrarServicios() && !mostrarRefrigerios())
    {
      Swal.fire({
        title: '¡Error!',
        icon: 'error',
        text: 'Seleccione un Tipo de documento',
        confirmButtonText: 'Aceptar '
        });
    
      return false;
    }

    return true;
}


function validarMemo(){

  textMemo = document.getElementById("textMemo");
  docMemo = document.getElementById("selectMemos");
    // Revisar si está vacío
    if (docMemo.value == "0" || docMemo.value == "" ) {
          textMemo.innerHTML = `Debe seleccionar una opción en ${docMemo.name}`;
          textMemo.style.color = red;
          return false;
        } else {
            textMemo.innerHTML = ``;
          return true
        }

}

function validarServicio(){

  textServicio = document.getElementById("textServicio");
  docServicio = document.getElementById("selectServicios");
    // Revisar si está vacío
    if (docServicio.value == "0" || docServicio.value == "" ) {
          textServicio.innerHTML = `Debe seleccionar una opción en ${docServicio.name}`;
          textServicio.style.color = red;
          return false;
        } else {
            textServicio.innerHTML = ``;
          return true
        }
}


  


function validarRefrigerio(){

  textRefrigerio = document.getElementById("textRefrigerio");
  docRefrigerio = document.getElementById("selectRefrigerios");
    // Revisar si está vacío
    if (docRefrigerio.value == "0" || docRefrigerio.value == "" ) {
          textRefrigerio.innerHTML = `Debe seleccionar una opción en ${docRefrigerio.name}`;
          textRefrigerio.style.color = red;
          return false;
        } else {
            textRefrigerio.innerHTML = ``;
          return true
        }
}


  




function mostrarMemos()
{
    if(memo.checked)
    {
        optMemo.style.display='block';
        titulo.style.display='block'; 
        optServicio.style.display='none';
        optRefrigerio.style.display='none';

        return true;
    }
}

function mostrarServicios()
{
    if(servicio.checked)
    {
        optServicio.style.display='block';
        titulo.style.display='block'; 
        optMemo.style.display='none';
        optRefrigerio.style.display='none';

        return true;
    }

}

function mostrarRefrigerios()
{
    if(refrigerio.checked)
    {
        optRefrigerio.style.display='block';
        titulo.style.display='block'; 
        optMemo.style.display='none';
        optServicio.style.display='none';

        return true;
    }

}















//--------------------- Numero de documentos -----------------//


function mostrarDoc1(){

        if(unDoc.checked)
       {
           primerDocumento.style.display='block';
           titulo.style.display='block';
           
          // if(segundoDocumento != null &&  tercerDocumento != null){
           segundoDocumento.style.display='none';
           tercerDocumento.style.display='none';
           
           return true;
       }
       else
        return false;
       
   }

   function mostrarDoc2(){

    if(dosDoc.checked)
   {
       primerDocumento.style.display='block';
       segundoDocumento.style.display='block';
       titulo.style.display='block';
       tercerDocumento.style.display='none';
       return true;
   }
   else
        return false;
   
}

   
   function mostrarDoc3(){

        if(tresDoc.checked)
       {
           primerDocumento.style.display='block';
           segundoDocumento.style.display='block';
           tercerDocumento.style.display='block';

           titulo.style.display='block';
           return true;
       }
       else
            return false;
       
   }
   

