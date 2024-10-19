<?php
session_start();
include ("db.php");

/*if(!isset($_SESSION['id_usuario'])){
    header("Location: index.php");
} */

$id = $_SESSION['id_usuario'] ;
$nombreu = $_SESSION['usuario'];
$tipo_user = $_SESSION['id_rol'] ;

$nombreu = mb_convert_case($nombre, MB_CASE_UPPER, "UTF-8");



if(isset($_POST['guardarSolicitud'])){
   
    //print_r("Que ".$_POST['GuardaVehiculo']);
        $id_cliente = $id;
        $id_vehiculo = $_POST['id_vehiculo'];
        //$status = '1';
        $obs = $_POST['obs'];
      
        
        //print_r($id_marca);
    
/*print_r("INSERT INTO vehiculos(id_marca,id_modelo,id_linea,id_tipo,matricula,status,id_usuario)
              VALUES ('$id_marca','$id_modelo','$id_linea',' $id_tipo','$matricula','$status_v','$id_usuario')");*/

    $query = "INSERT INTO solicitudes(id_usuario,id_vehiculo,obs)
              VALUES ('$id_cliente','$id_vehiculo',' $obs')";

       
        if($conn->query($query)==TRUE){
            $_SESSION['message'] = 'Solicitud de '.$nombre.' Enviada Exitosamente';
            $_SESSION['message_type'] = 'info';
            header("Location: lista_vehiculosc.php");
        }else{
            echo "Error de Conexion";
        }

}