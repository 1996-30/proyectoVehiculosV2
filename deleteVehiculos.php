<?php
include("db.php");
session_start();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $matricula = $_GET['matricula'];

    $query = "UPDATE vehiculos SET status = 2 WHERE id_vehiculo = $id";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Consulta Fallida");
    }

    $_SESSION['message'] = 'El Vehiculo se dio de Baja Exitosamente';
    $_SESSION['message_type'] = 'danger';

    header("Location: formVehiculos.php");

}

?>
