<?php
session_start();
include("db.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}
$query = "
    SELECT usuarios.nit AS NIT, usuarios.nombre AS NOMBRE, usuarios.dpi AS DPI, 
           usuarios.email AS correo, usuarios.telefono AS telefono, 
           usuarios.direccion AS direccion, solicitudes.fecha AS fechasol, 
           solicitudes.fechae AS fechaent, status_r.nombre AS estatus 
    FROM usuarios 
    INNER JOIN solicitudes ON usuarios.id_usuario = solicitudes.id_usuario 
    INNER JOIN vehiculos ON solicitudes.id_vehiculo = vehiculos.id_vehiculo 
    INNER JOIN status_r ON solicitudes.id_status = status_r.status
    WHERE solicitudes.id = (SELECT MAX(id) FROM solicitudes)
";

$result = $conn->query($query);
if ($result) {
    $data = $result->fetch_assoc();
    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode(["error" => "No se encontraron datos"]);
    }
} else {
    echo json_encode(["error" => "Error al obtener datos: " . $conn->error]);
}

?>

