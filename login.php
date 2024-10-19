<!-- Un programa que valide un usuario y contaseña, usuario correcto, contraseña 123 -->

<?php 
session_start();
include 'db.php';


if($_POST){
    $name = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $usuarios = "SELECT id_usuario,nombre,id_rol, email, dpi, nit, telefono,direccion, contraseña 
                 FROM usuarios WHERE nombre = '$name'";
   // echo $usuarios;
    $resultado = $conn->query($usuarios);
    //validamos si viene algun registro si es mayor a 0
    $num = $resultado->num_rows;

    //si es mayor cero existe el usuario
    if($num>0){
        $row = $resultado->fetch_assoc();
        //seleccionamos el password de la base de datos
        $password_bd = $row['contraseña'];
        

        if($contraseña==$password_bd){
            
            $_SESSION['message'] = 'Acceso permitido ';
            $_SESSION['message_type'] = 'success';
            $_SESSION['redirect'] = true;
            header("Location: lista_vehiculosc.php");

                    $_SESSION['id_usuario'] = $row['id_usuario'];
                    $_SESSION['usuario'] = $row['nombre'];
                    $_SESSION['id_rol'] = $row['id_rol'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['dpi'] = $row['dpi'];
                    $_SESSION['nit'] = $row['nit'];
                    $_SESSION['telefono'] = $row['telefono'];
                    $_SESSION['direccion'] = $row['direccion'];  

        }else{
            $_SESSION['message'] = 'Contraseña Incorrecta';
            $_SESSION['message_type'] = 'danger';
            $_SESSION['redirect'] = false;
        }

    }else{
        $_SESSION['message'] = 'Acceso no Permitido, Verifique Usuario';
        $_SESSION['message_type'] = 'danger';
        $_SESSION['redirect'] = false;
    }
}


$conn->close();


//header("Location: index.php");

    
?>