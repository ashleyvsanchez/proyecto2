const form = document.getElementById('formModificarServicio');
const trabajo = document.getElementById("trabajo");
const lugar = document.getElementById("lugar");
const DT = document.getElementById("Descripcion trabajo");


const green = '#4CAF50';
const red = '#F44336';

// Manejo de formulario
form.addEventListener('submit', function(event) {
// Prevenir comportamiento por defecto

event.preventDefault();
if ((validar()
)){


Swal.fire({
title: "CONFIRMACIÓN",
html: "Pulse <b>ACEPTAR</b> para modificar servicio o <b>CANCELAR</b> para cancelar el proceso",
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



function validar(){
if(!validartrabajo()){return;}
if(!validarlugar()){return;}
if(!validarDT()){return;}

return true;

}


function validartrabajo(){
if (validarVacio(trabajo)) return;
return true;
}

function validarlugar(){
if (validarVacio(lugar)) return;
return true;
}

function validarDT(){
if (validarVacio(DT)) return;
return true;
}




function validarVacio(campo){
if(siVacio(campo.value.trim())) {
marcarInvalido(campo, `El campo no debe estar vacío`);
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