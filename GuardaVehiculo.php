<?php
session_start();
include ("db.php");



if(isset($_POST['GuardaVehiculo'])){
   
    //print_r("Que ".$_POST['GuardaVehiculo']);
    
        $id_marca = $_POST['id_marca'];
        $id_modelo = $_POST['id_modelo'];
        $id_linea = $_POST['id_linea'];
        $id_tipo = $_POST['id_tipo'];
        $matricula = $_POST['matricula'];
        $status = '1';
        $id_usuario = '1';
        
        //print_r($id_marca);
    
print_r("INSERT INTO vehiculos(id_marca,id_modelo,id_linea,id_tipo,matricula,status,id_usuario)
              VALUES ('$id_marca','$id_modelo','$id_linea',' $id_tipo','$matricula','$status_v','$id_usuario')");

    $query = "INSERT INTO vehiculos(id_marca,id_modelo,id_linea,id_tipo,matricula,status,id_usuario)
              VALUES ('$id_marca','$id_modelo','$id_linea',' $id_tipo','$matricula','$status','$id_usuario')";

       
        if($conn->query($query)==TRUE){
            $_SESSION['message'] = 'Vehiculo'.$marca.' Agregado Exitosamente';
            $_SESSION['message_type'] = 'info';
            header("Location: formVehiculos.php");
        }else{
            echo "Error de Conexion";
        }

}