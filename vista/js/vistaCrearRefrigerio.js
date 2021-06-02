const btnecuno = document.getElementById('btnecuno');
const btnecdos = document.getElementById('btnecdos');
const btnectres = document.getElementById('btnectres');

const btnssuno = document.getElementById('btnssuno');
const btnssdos = document.getElementById('btnssdos');
const btnsstres = document.getElementById('btnsstres');

const ecdos = document.getElementById('ecdos');
const ectres = document.getElementById('ectres');
const eccuatro = document.getElementById('eccuatro');

const ssdos = document.getElementById('ssdos');
const sstres = document.getElementById('sstres');
const sscuatro = document.getElementById('sscuatro');

const cursoevento = document.getElementById('cursoevento');


const form = document.getElementById('formCrearRefrigerio');

	const green = '#4CAF50';
	const red = '#F44336';
	
	// Manejo de formulario
	form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  event.preventDefault();
  if ((
       validarCursoEvento()
	)){
    

    Swal.fire({
        title: "CONFIRMACIÓN",
        html: "Pulse <b>ACEPTAR</b> para crear refrigerio o <b>CANCELAR</b> para cancelar el proceso",
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
 
   
});






  
function validarCursoEvento(){
    if (validarVacio(cursoevento)) return;
  
    return true;
}

function botonecuno(){
    btnecuno.style.display='none';
    
    ecdos.style.display='block';
    
}


function botonecdos(){
    btnecdos.style.display='none';
    
    ectres.style.display='block';
    
}


function botonectres(){
    btnectres.style.display='none';
    
    eccuatro.style.display='block';
    
}


function botonssuno(){
    btnssuno.style.display='none';
    
    ssdos.style.display='block';
    
}


function botonssdos(){
    btnssdos.style.display='none';
    
    sstres.style.display='block';
    
}


function botonsstres(){
    btnsstres.style.display='none';
    
    sscuatro.style.display='block';
    
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
        marcarInvalido(campo, `El campo solo debe contener números`);
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