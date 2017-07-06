function validar_anio() {

	var anio = document.getElementById('anio');

	if(anio.value != ""){
		if(anio.value.toString().length !== 4 || anio.value < 1900){
			alert("El año debe tener cuatro digitos y ser mayor que 1900");
			return false;
		}
	}
	return true;
}


function validar_signin(){

	var name = document.getElementById('name');
	var surName = document.getElementById('surName');
	var email = document.getElementById('email');
	var user = document.getElementById('user');
	var pass = document.getElementById('pass');
	var passRepeat = document.getElementById('passRepeat');
	var letra=0;
	var num=0;
	var especial=0;

	if((name.value=="")){
		alert("No se ingreso ningun nombre, por favor  ingrese uno");
		return false;
	} else {
		for (var i = 0; i <name.value.length ; i++) {
			if(!(((name.value.charAt(i) >="a") && (name.value.charAt(i) <="z" )) || ((name.value.charAt(i) >="A") && (name.value.charAt(i) <="Z" )))){
				alert("Solo son validos caracteres alfabéticos");
				return false;
			}
		}
	}

	if(surName.value==""){
		alert("No se ingreso ningun apellido, por favor ingrese uno");
		return false;
	} else {
		for (var i = 0; i <surName.value.length ; i++) {
			if(!(((surName.value.charAt(i) >="a") && (surName.value.charAt(i) <="z" )) || ((surName.value.charAt(i) >="A") && (surName.value.charAt(i) <="Z" )))){
				alert("Solo son validos caracteres alfabéticos");
				return false;
			}
		}
	}

	if(email.value==""){
		alert("No se ingreso ningun email, por favor ingrese uno");
		return false;
	}

	if(user.value==""){
		alert("No se ingreso ningun usuario, por favor ingrese uno");
		return false;
	} else {
		if (user.value.length < 6){
			alert("El usuario debe tener 6 caracteres como minimo");
			return false;
		} else {
			for (var i=0;i<user.value.length;i++){
				if(!(((user.value.charAt(i) >="0") && (user.value.charAt(i) <="9" )) || ((user.value.charAt(i) >="a") && (user.value.charAt(i) <="z" )) || ((user.value.charAt(i) >="A") && (user.value.charAt(i) <="Z" )))){
					alert("Solo son validos caracteres alfanumericos");
					return false;
				}
			}
		}
	}

	if(pass.value==""){
		alert("No se ingreso ninguna contraseña, por favor ingrese una");
		return false;
	} else {
		if (pass.value.length < 6){
			alert("La contraseña debe tener 6 caracteres como minimo");
			return false;
		} else  {
			for (var i=0;i<pass.value.length;i++){
				if(((pass.value.charAt(i) >="a") && (pass.value.charAt(i) <="z" )) || ((pass.value.charAt(i) >="A") && (pass.value.charAt(i) <="Z" ))){
					letra++;
				} else {
					if((pass.value.charAt(i) >="0") && (pass.value.charAt(i) <="9" )){
						num++;
					} else {
						especial++;
					}
				}
			}
			if((letra<3) || (num<2) || (especial<1)) {
				alert("La contraseña debe tener como minimo 3 letras, 2 numeros y 1 caracter especial");
				return false;
			}
		}
	}

	if (pass.value==""){
		alert("Falta repetir la contraseña");
		return false;
	} else {
		if (pass.value != passRepeat.value){
			alert("Las contraseñas no coinciden");
			return false;
		}
	}

	return true;
}

function validar_login(){

	var user = document.getElementById('user');
	var pass = document.getElementById('pass');

	if(user.value==""){
		alert("No se ingreso ningun usuario, por favor ingrese uno");
		return false;
	} else {
		if (user.value.length < 6){
			alert("El usuario debe tener 6 caracteres como minimo");
			return false;
		} else {
			for (var i=0;i<user.value.length;i++){
				if(!(((user.value.charAt(i) >="0") && (user.value.charAt(i) <="9" )) || ((user.value.charAt(i) >="a") && (user.value.charAt(i) <="z" )) || ((user.value.charAt(i) >="A") && (user.value.charAt(i) <="Z" )))){
					alert("Solo son validos caracteres alfanumericos");
					return false;
				}
			}
		}
	}
	if(pass.value==""){
		alert("No se ingreso ninguna contraseña, por favor ingrese una");
		return false;
	}

	return true;
}

function validar_crear_pelicula(){

	var nameFilm = document.getElementById('nameFilm');
	var sinposis = document.getElementById('sinopsis');
	var anio = document.getElementById('anio');
	var genero = document.getElementById('genero');
	var imagen = document.getElementById('imagen');

	if(nameFilm.value ==""){
		alert('Por favor ingrese un nombre para la pelicula');
		return false;
	}

	if(sinposis.value ==""){
		alert('Por favor ingrese una sinopsis para la pelicula');
		return false;
	}

	if(anio.value == ""){
		alert('Por favor ingrese un año de estreno para la pelicula');
		return false;
	} else {
		if(anio.value.toString().length !== 4 || anio.value < 1900){
			alert("El año debe tener cuatro digitos y ser mayor que 1900");
			return false;
		}
	}

	if(genero.value ==0){
		alert('Por favor ingrese un genero para la pelicula');
		return false;
	}
	
	if(!imagen.value){
		alert('Por favor ingrese una imagen para la pelicula');
		return false;
	}

	return true;
}

function validar_modificar_pelicula(){

	var nameFilm = document.getElementById('nameFilm');
	var sinposis = document.getElementById('sinopsis');
	var anio = document.getElementById('anio');
	var genero = document.getElementById('genero');

	if(nameFilm.value ==""){
		alert('Por favor ingrese un nombre para la pelicula');
		return false;
	}

	if(sinposis.value ==""){
		alert('Por favor ingrese una sinopsis para la pelicula');
		return false;
	}

	if(anio.value == ""){
		alert('Por favor ingrese un año de estreno para la pelicula');
		return false;
	} else {
		if(anio.value.toString().length !== 4 || anio.value < 1900){
			alert("El año debe tener cuatro digitos y ser mayor que 1900");
			return false;
		}
	}

	if(genero.value ==0){
		alert('Por favor ingrese un genero para la pelicula');
		return false;
	}

	return true;
}

function confirm_delete(){
	if(confirm('Esta seguro de eliminar la pelicula')){
		window.location=url;
	} else {
		return false;
	}
}

function validar_comentario(ctrl){

	var comment = document.getElementById('comment');
	var cant = 0;
	if(comment.value == ""){
		alert("Por favor ingrese comentario");
		return false;
	}
	
	for(var i=0;i<ctrl.length;i++){
        if(!(ctrl[i].checked)){
        	cant ++;
		}
	}

	if (cant == 5){
		alert("Por favor seleccione una puntuación");
		return false;
	}

	return true;

}



