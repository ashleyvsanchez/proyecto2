const form = document.getElementById('formServicio');
const ids = document.getElementById("idServicio");


const green = '#4CAF50';
const red = '#F44336';

    form.addEventListener('submit', function(event) {
    // Prevenir comportamiento por defecto
    event.preventDefault();
    if (
        validar() 
    ) {
        form.submit();
    }else{
        Swal.fire({
    title: '¡ERROR!',
     icon: 'error',
    text: 'Revisa los campos',
    confirmButtonText: 'Intentar de nuevo'
    });
    }
    });



function validar(){
    if(!validarIDS()){return;}
   
        return true;
    
}


function validarIDS(){
  if (validarVacio(ids)) return;
  
  return true;
}




function validarVacio(campo){
    if(siVacio(campo.value.trim())) {
        marcarInvalido(campo, `Debe seleccionar una opción`);
        return true;
    }else {
        marcarValido(campo);
        return false;
    }

}

function siVacio(valor){
    if (valor == ''|| valor == 0) return true;
    return false;
}

function marcarInvalido(campo, mensaje){
    campo.nextElementSibling.innerHTML = mensaje;
    campo.nextElementSibling.style.color = red;
}

function marcarValido(campo){
campo.nextElementSibling.innerHTML = '';
}

function validarSoloNumeros(campo){
    if (/^[0-9]+$/.test(campo.value)) {
        marcarValido(campo);
        return true;
    } else {
        marcarInvalido(campo, `${campo.name} solo debe contener números`);
        return false;
    }
}

