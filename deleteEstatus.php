<?php
include("db.php");
session_start();


if(isset($_GET['status'])){
    $id = $_GET['status'];

    $query = "DELETE FROM status_r WHERE status = $id";
    $resultado = mysqli_query($conn,$query);

    if(!$resultado){
        die("Consulta Fallida");
    }

    $_SESSION['message'] = 'Registro No. '  .$id = $_GET['status'].  ' Eliminado Exitosamente';
    $_SESSION['message_type'] = 'danger';

    header("Location: formEstatus.php");

}

?>
