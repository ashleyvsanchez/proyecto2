
const optConPer = document.getElementById("optConPer");
const form = document.getElementById('Form');
const ced = document.getElementById("inpCed");

const cargo = document.getElementById("inpCar");
const dep = document.getElementById("inpDep");
const cedV = document.getElementById("conCed");

const cargoV = document.getElementById("conCargo");
const depV = document.getElementById("Departamento");

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

function mostrarOptPer() {
    
    if (optConPer.value=='1') {
        ced.style.display='block';
        
    }
    else {
        ced.style.display='none';
        ced.value="0";
    }
    if (optConPer.value=='2') {
        dep.style.display='block';
    }
    else {
        dep.style.display='none';
        dep.value="0";
    }
    if (optConPer.value=='3') {
        cargo.style.display='block';
    }
    else {
        cargo.style.display='none';
        cargo.value="0";
    }
}


function validar(){
    if(!validarOpt()){return;}

    if(optConPer.value == 1){
        if(!validarCedula()){return;}
    }
    if(optConPer.value == 2){
        if(!validarDep()){return;}
    }
 
    if(optConPer.value == 3){
        if(!validarCargo()){return;}
    }
   
        return true;
    
}

function validarOpt(){
  if (validarOpcion(optConPer)) return;

  return true;
}

function validarCedula(){
  if (validarVacio(cedV)) return;
  if (!validarSoloNumeros(cedV)) return;

  return true;
}

function validarCargo(){
  if (validarOpcion(cargoV)) return;

  return true;
}

function validarDep(){
    if (validarOpcion(depV)) return;
  
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


