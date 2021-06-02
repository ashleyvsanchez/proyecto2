
const trabajo = document.getElementById('Trabajo a realizar');
const lugar = document.getElementById('Lugar');
const dt = document.getElementById('Descripcion del trabajo');

const form = document.getElementById('formCrearServicio');

const green = '#4CAF50';
const red = '#F44336';

	// Manejo de formulario
	form.addEventListener('submit', function(event) {
        // Prevenir comportamiento por defecto
        
        event.preventDefault();
        if (( 
          validartrabajo() &&
          validarlugar() &&
          validarDT() 
         
          )){
          
      
          Swal.fire({
              title: "CONFIRMACIÓN",
              html: "Pulse <b>ACEPTAR</b> para crear servicio o <b>CANCELAR</b> para cancelar el proceso",
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
                    title: '¡ERROR!',
                    icon: 'error',
                    text: 'Revisa los campos',
                    confirmButtonText: 'Intentar de nuevo'
              });
             return false;
            }
          //alert("Revisa los campos, hay un error");
         
      });



    function validartrabajo() {
        // Revisar si está vacío
        if (checkIfEmpty(trabajo)) return;
        return true;
    }

    function validarlugar() {
         // Revisar si está vacío
        if (checkIfEmpty(lugar)) return;
        return true;
    }

    function validarDT() {
        // Revisar si está vacío
         if (checkIfEmpty(dt)) return;
         return true;
    }
    

	

function checkIfEmpty(field) {
    if (isEmpty(field.value.trim())) {
        // set field invalid
        setInvalid(field, `El campo no debe estar vacío`);
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

	
    function checkIfOnlyNumbers(field) {
        if (/^[0-9]+$/.test(field.value)) {
            setValid(field);
            return true;
        } else {
            setInvalid(field, `${field.name} solo debe contener números`);
            return false;
        }
    }