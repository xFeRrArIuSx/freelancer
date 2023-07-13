<?php
include 'cn.php';
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];
$expresion = '/\w+@\w+\.[a-zA-Z]{2,6}/';

$insertar = "INSERT INTO usuario(nombre, apellidos, correo, usuario, clave, telefono)
VALUES ('$nombre' , '$apellidos' , '$correo' , '$usuario' , '$clave' , '$telefono')";

if(isset($_POST['boton']))
{
    if(empty($nombre)){
        echo '<script language="javascript">
        alert("Ingresa tu nombre");
        window.history.go(-1);
        </script>';
        exit();
    }
    if(empty($apellidos)){
        echo '<script language="javascript">
        alert("Ingresa tu apellido");
        window.history.go(-1);
        </script>';
        exit();
    }
    if(empty($correo)){
        echo '<script lenguage="javascript">
        alert("Ingresa tu correo"); 
        window.history.go(-1);
        </script>';
        exit();
    }
    if(!preg_match($expresion,$_POST['correo'])){
        echo "<script>alert('Correo invalido.'); 
        window.history.go(-1);</script>";
    }
    if(empty($usuario)){
        echo '<script lenguage="javascript">
        alert("Ingresa tu usuario"); 
        window.history.go(-1);
        </script>';
        exit();
    }
    if(empty($clave)){
        echo '<script lenguage="javascript">
        alert("Ingresa tu clave"); 
        window.history.go(-1);
        </script>';
        exit();
    }
    if(empty($telefono)){
        echo '<script lenguage="javascript">
        alert("Ingresa tu telegono"); 
        window.history.go(-1);
        </script>';
        exit();
    }
}

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
    //echo 'ERROR: El usuario ya existe';
    echo '<script Language = "javascript">alert("El usuario ya existe, intente de nuevo");
    windows.history.go(-1);
    </script>';
    exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo = '$correo'");
if(mysqli_num_rows($verificar_correo) > 0){
    //echo 'ERROR: El correo ya existe';
    echo '<script Language = "javascript">alert("El correo ya existe, intente de nuevo");
    windows.history.go(-1);
    </script>';
    exit;
}

if(strlen($nombre)>10){
    echo '<script language="javascript">
    window.history.go(-1);
    </script>';
    exit();
}

if(strlen($correo)>100){
    echo '<script language="javascript">
    window.history.go(-1);
    </script>';
    exit();
}





if (preg_match($expresion, $correo)) {
    echo "La dirección de correo electrónico es válida";
} else {
    echo "La dirección de correo electrónico no es válida";
}


$resultado = mysqli_query($conexion,$insertar);
if(!$resultado){
    //echo 'Error al registrar usuario';
    echo '<script Language = "javascript">alert("Error al registrar el usuario, intente de nuevo");
    windows.history.go(-1);
    </script>';
} else{
    //echo 'Usuario registrado exitosamente';
    echo '<script Language = "javascript">alert("Usuario registrado exitosamente.");
    windows.history.go(-1);
    </script>';
    exit;
}
mysqli_close($conexion);