const form = document.getElementById('formRefrigerio');
const ids = document.getElementById("idr");


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
    if(!validarIDR()){return;}
   
        return true;
    
}


function validarIDR(){
  if (validarVacio(idr)) return;
  return true;
}




function validarVacio(campo){
    if(siVacio(campo.value.trim())) {
        marcarInvalido(campo, `${campo.name} no debe estar vacío`);
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

