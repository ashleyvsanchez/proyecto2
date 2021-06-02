const id = document.getElementById("inpID");
const fecha = document.getElementById("inpFecha");
const inptrabajo = document.getElementById("inpTrabajo");
const optServicio = document.getElementById("optServicio");

const IDS = document.getElementById("IDS");
const fechainput = document.getElementById("fecha");
const depads = document.getElementById("depads");
const trabajo = document.getElementById("trabajo");




const form = document.getElementById('formConsultarServicio');

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

function mostrarOptServicio(){

if (optServicio.value=='1'){
    id.style.display='block';
    
}
else{
    id.style.display='none';
}

if (optServicio.value=='2'){
    fecha.style.display='block';
}
else{
    fecha.style.display='none';
}

if (optServicio.value=='4'){
    inptrabajo.style.display='block';
}
else{
    inptrabajo.style.display='none';
}

}

function validar(){
    if(!validarOpt()){return;}

    if(optServicio.value == 1){
        if(!validarID()){return;}
    }
    if(optServicio.value == 2){
        if(!validarFecha()){return;}
    }
    if(optServicio.value == 3){
        if(!validardepads()){return;}
    }
    if(optServicio.value == 4){
        if(!validartrabajo()){return;}
    }
   
        return true;
    
}

function validarID(){
    if (validarOpcion(IDS)) return;
    return true;
  }

  function validarFecha(){
    if (validarOpcion(fechainput)) return;
    return true;
  }

  

  function validartrabajo(){
    if (validarVacio(trabajo)) return;
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

function validarOpt(){
  if (validarOpcion(optServicio)) return;

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

function validarSoloNumeros(campo){
    if (/^[0-9]+$/.test(campo.value)) {
        marcarValido(campo);
        return true;
    } else {
        marcarInvalido(campo, `${campo.name} solo debe contener números`);
        return false;
    }
}

