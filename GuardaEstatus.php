<?php
session_start();
include ("db.php");

if(isset($_POST['guardaEstatus'])){
   
    $nombre = $_POST['nombre'];
    

    $query = "INSERT INTO status_r(nombre)
              VALUES ('$nombre')";

       
        if($conn->query($query)==TRUE){
            $_SESSION['message'] = 'Estatus '.$nombre.' Agregado Exitosamente';
            $_SESSION['message_type'] = 'info';
            header("Location: formEstatus.php");
        }else{
            echo "Error de Conexion";
        }

}