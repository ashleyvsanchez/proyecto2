const optMod = document.getElementById('optMod');


const formP = document.getElementById('FormPersonal');


const formC = document.getElementById('FormContacto');


const vSP = document.getElementById("vSP"); 
const Nom = document.getElementById("Nom"); 
const checkNom = document.getElementById("checkNom"); 
const Ape = document.getElementById("Ape"); 
const checkApe = document.getElementById("checkApe"); 
const Dir = document.getElementById("Dir"); 
const checkDir = document.getElementById("checkDir"); 
const Cargo = document.getElementById("Cargo"); 
const checkCargo = document.getElementById("checkCargo"); 

const tCargo = document.getElementById("tCargo"); 
const tDep = document.getElementById("tDep"); 

const vSC = document.getElementById("vSC"); 
const checkCor = document.getElementById("checkCor"); 
const checkTel = document.getElementById("checkTel"); 
const tTel = document.getElementById("tTel"); 
const tCor = document.getElementById("tCor"); 
const TipT = document.getElementById("TT"); 
const TipC = document.getElementById("TC"); 
const addCorreo = document.getElementById("addCorreo"); 
const addTel = document.getElementById("addTel"); 
const delCorreo = document.getElementById("delCorreo"); 
const delTel = document.getElementById("delTel"); 
const tTC = document.getElementById("tTC"); 
const tTT = document.getElementById("tTT"); 




const green = '#4CAF50';
const red = '#F44336';

    if(optMod.value == 1){
        formP.addEventListener('submit', function(event) {
            // Prevenir comportamiento por defecto
            event.preventDefault();
            if (
                validarP() 
            ) {
                Swal.fire({
                    title: "CONFIRMACIÓN",
                    html: "Pulse <b>ACEPTAR</b> para modificar datos o <b>CANCELAR</b> para cancelar el proceso",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "ACEPTAR",
                    cancelButtonText: "CANCELAR",
                })
                .then(resultado => {
                    if (resultado.value) {
                        formP.submit();
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
        }
        });

    }
    if(optMod.value ==2){

        formC.addEventListener('submit', function(event) {
            // Prevenir comportamiento por defecto
            event.preventDefault();
            if (
                validarC() 
            ) {
                Swal.fire({
                    title: "CONFIRMACIÓN",
                    html: "Pulse <b>ACEPTAR</b> para modificar datos o <b>CANCELAR</b> para cancelar el proceso",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "ACEPTAR",
                    cancelButtonText: "CANCELAR",
                })
                .then(resultado => {
                    if (resultado.value) {
                        formC.submit();
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
        }
        });
    }
        
        



        function validarP(){
            if(!validarSeleccionarPersonal()){return;}
            if(checkNom.checked){
                if(!validarNom()){return;}
            }
            if(checkApe.checked){
                if(!validarApe()){return;}
            }
            if(checkDir.checked){
                if(!validarDir()){return;}
            }
            if(checkCargo.checked){
                if(!validarCargo()){return;}
            }
           
            
               
            return true;
    }

        function validarC(){
            if(!validarSeleccionarContacto()){return;}
            if(checkTel.checked){
                if(!valSelTel()){return;}
            }
            if(checkCor.checked){
                if(!valSelCor()){return;}
            }
            if(selTel.value == 1){
                if(!validarAddTel()){return;}
                if(!validarAddTTel()){return;}
            }
            if(selTel.value == 2){
                if(!validarDelTel()){return;}
            }
            if(selCor.value == 1){
                if(!validarAddCor()){return;}
                if(!validarAddTCor()){return;}
            }
            if(selCor.value == 2){
                if(!validarDelCor()){return;}
            }

            return true;
        }

// VALIDACIONES
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

    function validarSoloLetras(campo){
        if (/^[a-zA-Z ]+$/.test(campo.value)) {
            marcarValido(campo);
            return true;
        } else {
            marcarInvalido(campo, `${campo.name} solo debe contener letras`);
            return false;
        }
    }
    function validarCorreo(campo){
        if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(campo.value)) {
            marcarValido(campo);
            return true;
        } else {
            marcarInvalido(campo, `${campo.name} debe ser una dirección de correo valida`);
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
    

        
// DATOS PERSONALES
function validarSeleccionarPersonal(){
if(checkNom.checked || checkApe.checked || checkDir.checked || checkCargo.checked || checkDep.checked){
    vSP.innerHTML = '';
    return true;
    
}
vSP.innerHTML = 'Debe seleccionar una opción';
vSP.style.color = red;
return;
}
function validarNom(){
if (validarVacio(Nom)) return;
if (!validarSoloLetras(Nom)) return;

return true;
}

function validarApe(){
if (validarVacio(Ape)) return;
if (!validarSoloLetras(Ape)) return;

return true;
}

function validarDir(){
if (validarVacio(Dir)) return;

return true;
}


    
function validarCargo(){
if(siVacio(Cargo.value.trim())) {
        tCargo.innerHTML =`Debe seleccionar una opción`;
        tCargo.style.color = red;
            return;
        }else {
            tCargo.innerHTML = '';
          
        };
      return true;
    }

function mostrarNom() {
element = document.getElementById("modNom");
check = document.getElementById("checkNom");
if (check.checked) {
    element.style.display='block';
}
else {
    element.style.display='none';
}
}

function mostrarApe() {
element = document.getElementById("modApe");
check = document.getElementById("checkApe");
if (check.checked) {
    element.style.display='block';
}
else {
    element.style.display='none';
}
}

function mostrarDir() {
element = document.getElementById("modDir");
check = document.getElementById("checkDir");
if (check.checked) {
    element.style.display='block';
}
else {
    element.style.display='none';
}
}

function mostrarCargo() {
element = document.getElementById("modCargo");
check = document.getElementById("checkCargo");
if (check.checked) {
    element.style.display='block';
}
else {
    element.style.display='none';
}
}

function mostrarDep() {
element = document.getElementById("modDep");
check = document.getElementById("checkDep");
if (check.checked) {
    element.style.display='block';
}
else {
    element.style.display='none';
}
}

// DATOS DE CONTACTO 
function validarSeleccionarContacto(){
    if(checkCor.checked || checkTel.checked ){
        vSC.innerHTML = '';
        return true;
        
    }
    vSC.innerHTML = 'Debe seleccionar una opción';
    vSC.style.color = red;
    return;
}

function valSelTel(){
    if(siVacio(selTel.value.trim())) {
        tTel.innerHTML =`Debe seleccionar una opción`;
        tTel.style.color = red;
            return;
        }else {
            tTel.innerHTML = '';
        
        };

      return true;
    }

function valSelCor(){
    if(siVacio(selCor.value.trim())) {
        tCor.innerHTML =`Debe seleccionar una opción`;
        tCor.style.color = red;
            return;
        }else {
            tCor.innerHTML = '';
        
        };

      return true;
    }

function validarAddTel(){
    if (validarVacio(addTel)) return;
    if (!validarSoloNumeros(addTel)) return;

    return true;
}

function validarAddTTel(){
    if(siVacio(TipT.value.trim())) {
        tTT.innerHTML =`Debe seleccionar una opción`;
        tTT.style.color = red;
            return;
        }else {
            tTT.innerHTML = '';
        
        };

      return true;

}

function validarDelTel(){
    if (validarVacio(delTel)) return;
    if (!validarSoloNumeros(delTel)) return;

    return true;
}

function validarAddCor(){
    if (validarVacio(addCorreo)) return;
    if (!validarCorreo(addCorreo)) return;

    return true;
}

function validarAddTCor(){
    if(siVacio(TipC.value.trim())) {
        tTC.innerHTML =`Debe seleccionar una opción`;
        tTC.style.color = red;
            return;
        }else {
            tTC.innerHTML = '';
        
        };

      return true;
}

function validarDelCor(){
    if (validarVacio(delCorreo)) return;
    if (!validarCorreo(delCorreo)) return;

    return true;
}







function mostrarCor() {
element = document.getElementById("optCor");
check = document.getElementById("checkCor");
add = document.getElementById("addCor");
addI = document.getElementById("addCorreo");
addT = document.getElementById("addTC");
Tip = document.getElementById("TC");
del = document.getElementById("delCor");
delI = document.getElementById("delCorreo");
sel = document.getElementById("selCor");

ch = document.getElementById("checkTel");

if (check.checked) {
    element.style.display='block';
    ch.checked= false;
    ch.disabled = true;
    mostrarTel();
    vSC.innerHTML = '';
}
else {
    element.style.display='none';
    add.style.display='none';
    addT.style.display='none';
    del.style.display='none';
    sel.value='0';
    Tip.value='0';
    addI.value='';
    delI.value='';
    ch.disabled = false;
}
}
function mostrarTel() {
element = document.getElementById("optTel");
check = document.getElementById("checkTel");
add = document.getElementById("addNum");
addI = document.getElementById("addTel");
addT = document.getElementById("addTT");
Tip = document.getElementById("TT");
del = document.getElementById("delNum");
delI = document.getElementById("delTel");
sel = document.getElementById("selTel");

ch = document.getElementById("checkCor");

if (check.checked) {
    element.style.display='block';
    ch.checked= false;
    ch.disabled = true;
    mostrarCor();
    vSC.innerHTML = '';
}
else {
    element.style.display='none';
    add.style.display='none';
    addT.style.display='none';
    del.style.display='none';
    sel.value='0';
    Tip.value='0';
    addI.value='';
    delI.value='';
    ch.disabled = false;
}
}

function mostrarAddDelTel() {
    add = document.getElementById("addNum");
    addI = document.getElementById("addTel");
    addT = document.getElementById("addTT");
    Tip = document.getElementById("TT");
    del = document.getElementById("delNum");
    delI = document.getElementById("delTel");
    sel = document.getElementById("selTel");
    if (sel.value=='1') {
        add.style.display='block';
        addT.style.display='block';
    }
    else {
        add.style.display='none';
        addT.style.display='none';
        Tip.value='0';
        addI.value='';
    }
    if (sel.value=='2') {
        del.style.display='block';
    }
    else {
        del.style.display='none';
        delI.value='';
    }
}

function mostrarAddDelCor() {
    add = document.getElementById("addCor");
    addI = document.getElementById("addCorreo");
    addT = document.getElementById("addTC");
    Tip = document.getElementById("TC");
    del = document.getElementById("delCor");
    delI = document.getElementById("delCorreo");
    sel = document.getElementById("selCor");
    if (sel.value=='1') {
        add.style.display='block';
        addT.style.display='block';
    }
    else {
        add.style.display='none';
        addT.style.display='none';
        Tip.value='0';
        addI.value='';
    }
    if (sel.value=='2') {
        del.style.display='block';
    }
    else {
        del.style.display='none';
        delI.value='';
    }
}