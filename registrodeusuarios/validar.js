function validar(){
    var nombre, apellidos, correo, usuario, clave, telefono;
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    correo = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("clave").value;
    telefono = document.getElementById("telefono").value;
    expresion = /\w+@\w+\.[a-zA-Z]{2,6}/;

    if(nombre === ""){
        alert("Es necesario ingresar el nombre.");
    }else if(apellidos === ""){
        alert("Es necesario ingresar el apellido.");
    }else if(correo === ""){
        alert("Es necesario ingresar el correo.");
    }else if(usuario === ""){
        alert("Es necesario ingresar el usuario.");
    }else if(clave === ""){
        alert("Es necesario ingresar la clave.");
    }else if(telefono === ""){
        alert("Es necesario ingresar el telefono.");
    }

   else if(nombre.length>10){
        alert("El nombre es demaciado largo");
    }
    else if(apellidos.length>10){
        alert("El apellido es demaciado largo");
    }
    else if(correo.length>100){
        alert("El correo es demaciado largo");
    }
    else if(!expresion.test(correo)){
        alert("Correo no valido");
    }
    else if(usuario.length>20){
        alert("El usuario debe tener maximo 20 caracteres");
    }
    else if(clave.length>10){
        alert("La clave debe tener maximo 20 caractere");
    }
    else if(telefono.length>10){
        alert("EL telefono debe tener maximo 20 caractere");
    }
    else if(isNaN(telefono)){
        alert("Ingrese un numero de telefono");
    }
    else{
        document.getElementById("formulario").submit();
    }

}