// GUARDAMOS DATOS PARA MOSTRAR U OCULTAR OPCION

const id = document.getElementById("inpID");
const fecha = document.getElementById("inpFecha");
const dependencia = document.getElementById("inpDependencia");
const inpCursoEvento = document.getElementById("inpCursoEvento");
const optRefrigerio = document.getElementById("optRefrigerio");

const IDR = document.getElementById("IDR");
const fechainput = document.getElementById("fecha");
const depen = document.getElementById("dependencia");
const cursoevento = document.getElementById("cursoevento");

const form = document.getElementById('formConsultarRefrigerio');

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

function mostrarOptRefrigerio(){

    if (optRefrigerio.value=='1'){
        id.style.display='block';
        
    }
    else{
        id.style.display='none';
    }

    if (optRefrigerio.value=='2'){
        fecha.style.display='block';
    }
    else{
        fecha.style.display='none';
    }

   
    if (optRefrigerio.value=='3'){
        inpCursoEvento.style.display='block';
    }
    else{
        inpCursoEvento.style.display='none';
    }

}


function validar(){
    if(!validarOptRefrigerio()){return;}

    if(optRefrigerio.value == 1){
        if(!validarIDR()){return;}
    }
    if(optRefrigerio.value == 2){
        if(!validarFecha()){return;}
    }
 
    if(optRefrigerio.value == 3){
        if(!validarCursoEvento()){return;}
    }
   
        return true;
}

function validarIDR(){
    if (validarVacio(IDR)) return;
    return true;
  }

  function validarFecha(){
    if (validarOpcion(fechainput)) return;
    return true;
  }

  function validarDependencia(){
    if (validarVacio(depen)) return;

    return true;
  }

  function validarCursoEvento(){
    if (validarVacio(cursoevento)) return;
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

function validarOptRefrigerio(){
  if (validarOpcion(optRefrigerio)) return;

  return true;
}

function validarOpcion(campo){
    if(siVacio(campo.value.trim())) {
    marcarInvalido(campo, `Debe seleccionar una opción`);
    return true;
    }else {
    marcarValido(campo)
    return false;
    }
}
