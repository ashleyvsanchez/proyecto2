const firstName = document.getElementById('Nombres');
	const lastName = document.getElementById('Apellidos');
	const ced = document.getElementById('Cedula');		
	const dir = document.getElementById('Direccion');		

	const cargo = document.getElementById('Cargo');		
	const cargoS = document.getElementById('CargoS');
	const departamento = document.getElementById('Departamento');		
	const depaS = document.getElementById('DepaS');
	const email = document.getElementById('Correo');	
	const email2 = document.getElementById('Correo 2');		
	const TipoC = document.getElementById('Tipo Correo');		
	const TipoCS = document.getElementById('TipoCS');	
	const TipoC2 = document.getElementById('Tipo Correo 2');		
	const TipoCS2 = document.getElementById('TipoCS2');	
	
	const Tel = document.getElementById('Telefono');
	const TipoT = document.getElementById('Tipo Telefono');		
	const TipoTS = document.getElementById('TipoTS');	

	const Tel2 = document.getElementById('Telefono 2');
	const TipoT2 = document.getElementById('Tipo Telefono 2');		
	const TipoTS2 = document.getElementById('TipoTS2');	
		
	const rol = document.getElementById('rol');	
		
			

	const form = document.getElementById('crearPersonaForm');

	const green = '#4CAF50';
	const red = '#F44336';
	
	// Manejo de formulario
	form.addEventListener('submit', function(event) {
  // Prevenir comportamiento por defecto
  
  event.preventDefault();
  if ((validateFirstName() &&
	validateLastName() &&
	validateCedula() &&
	validateDir() &&
	validateCargo() &&
	validateDepartamento()
	)){
    
    //window.location = './crearDepartamento.php';
    //return true;
    Swal.fire({
        title: "CONFIRMACIÓN",
        html: "Pulse <b>ACEPTAR</b> para crear persona o <b>CANCELAR</b> para cancelar el proceso",
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

		// Validadores
	function validateFirstName() {
	// Revisar si está vacío
	if (checkIfEmpty(firstName)) return;
	// Revisar si solo contiene letras
	if (!checkIfOnlyLetters(firstName)) return;
	return true;
	}
	function validateLastName() {
	// Revisar si está vacío
	if (checkIfEmpty(lastName)) return;
	// Revisar si solo contiene letras
	if (!checkIfOnlyLetters(lastName)) return;
	return true;
	}
	function validateCedula() {
	// Revisar si está vacío
	if (checkIfEmpty(ced)) return;
	// Revisar si solo contiene numeros
	if (!checkIfOnlyNumbers(ced)) return;
	return true;
	}
	function validateDir() {
	// Revisar si está vacío
	if (checkIfEmpty(dir)) return;
	return true;
	}

	function validateCargo() {
	// Revisar si está vacío
	if (cargo.value == "0" || cargo.value == "" ) {
				cargoS.innerHTML = `Debe seleccionar una opción en ${cargo.name}`;
				cargoS.style.color = red;
				return false;
			} else {
				cargoS.innerHTML = ``;
				return true;
			}
	}
	function validateDepartamento() {
		if(rol.value != "Administrador"){
			return true;
		}
		// Revisar si está vacío
		if (departamento.value == "0" || departamento.value == "" ) {
					depaS.innerHTML = `Debe seleccionar una opción en ${departamento.name}`;
					depaS.style.color = red;
					return false;
				} else {
					depaS.innerHTML = ``;
					return true;
				}
		}
	
	function validateEmail() {
	if (checkIfEmpty(email)) return;
	if (!containsCharacters(email, 5)) return;
	if (TipoC.value == "0" || TipoC.value == "" ) {
				TipoCS.innerHTML = `Debe seleccionar una opción en ${TipoC.name}`;
				TipoCS.style.color = red;
				return false;
			} else {
				TipoCS.innerHTML = ``;
				return true
			}
	return true;
	}
	function validateEmail2() {
		if (checkIfEmpty(email2)) return;
		if (!containsCharacters(email2, 5)) return;
		if (TipoC2.value == "0" || TipoC2.value == "" ) {
					TipoCS2.innerHTML = `Debe seleccionar una opción en ${TipoC2.name}`;
					TipoCS2.style.color = red;
					return false;
				} else {
					TipoCS2.innerHTML = ``;
					return true
				}
		return true;
		}

	function validateTel() {
			// Revisar si está vacío
			if (checkIfEmpty(Tel)) return;
			// Revisar si solo contiene numeros
			if (!checkIfOnlyNumbers(Tel)) return;
		if (TipoT.value == "0" || TipoT.value == "" ) {
					TipoTS.innerHTML = `Debe seleccionar una opción en ${TipoT.name}`;
					TipoTS.style.color = red;
					return false;
				} else {
					TipoTS.innerHTML = ``;
					return true
				}
		return true;
	}

	function validateTel2() {
			// Revisar si está vacío
			if (checkIfEmpty(Tel2)) return;
			// Revisar si solo contiene numeros
			if (!checkIfOnlyNumbers(Tel2)) return;
		if (TipoT2.value == "0" || TipoT2.value == "" ) {
					TipoTS2.innerHTML = `Debe seleccionar una opción en ${TipoT2.name}`;
					TipoTS2.style.color = red;
					return false;
				} else {
					TipoTS2.innerHTML = ``;
					return true
				}
		return true;
	}
	
		///////////////////////
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

	field.nextElementSibling.innerHTML = message;
	field.nextElementSibling.style.color = red;
	}
	function setValid(field) {

	field.nextElementSibling.innerHTML = '';
	}
	function checkIfOnlyLetters(field) {
	if (/^[a-zA-Z ]+$/.test(field.value)) {
		setValid(field);
		return true;
	} else {
		setInvalid(field, `${field.name} solo debe contener letras`);
		return false;
	}
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


		function containsCharacters(field, code) {
			let regEx;
			switch (code) {
				case 1:
				// Letras
				regEx = /(?=.*[a-zA-Z])/;
				return matchWithRegEx(
					regEx, 
					field,
					'Debe contener al menos una letra');
				case 2:
				// Letras y numeros
				regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
				return matchWithRegEx(
					regEx,
					field,
					'Debe contener al menos una letra y un número'
				);
				case 3:
				// Mayúscula, minúscula y número
				regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
				return matchWithRegEx(
					regEx,
					field,
					'Debe contener al menos una letra minúscula, una letra mayúscula y un número'
				);
				case 4:
				// Mayúscula, minúscula, número y caracter especial
				regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
				return matchWithRegEx(
					regEx,
					field,
					'Debe contener al menos una letra minúscula, una letra mayúscula, un número y un caracter especial'
				);
				case 5:
				// Patrón de email
				regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return matchWithRegEx(regEx, field, 'Debe ser una dirreción de email');
				default:
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