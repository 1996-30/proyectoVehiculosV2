<?php 
session_start();
include("db.php");
include("header.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit;
}

// Variables de sesión
$id = $_SESSION['id_usuario'];
$nombreu = $_SESSION['usuario'];
$tipo_user = $_SESSION['id_rol'];
$correo = $_SESSION['email'];
$dpi = $_SESSION['dpi'];
$nit = $_SESSION['nit'];
$telefono = $_SESSION['telefono'];
$direccion = $_SESSION['direccion'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="js/script.js"></script>
    <title>Control de Solicitudes</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Control Solicitudes Reserva de Vehículos</h1>
        
        <!-- Alertas -->
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= htmlspecialchars($_SESSION['message_type']) ?> alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <!-- Fin de alertas -->

        <!-- Tabla para mostrar las solicitudes -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No. Sol</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">DPI</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Fecha Emision</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                // Consulta para obtener todos los usuarios junto con el nombre del rol
                $query = "
                SELECT solicitudes.id as idsol, usuarios.nit as NIT, usuarios.nombre as NOMBRE, usuarios.dpi as DPI, usuarios.email as correo,
                usuarios.telefono as telefono, usuarios.direccion as direccion, solicitudes.fecha as fechasol, 
                solicitudes.fechae as fechaent, status_r.nombre as estatus, solicitudes.id AS id_solicitud 
                FROM usuarios 
                INNER JOIN solicitudes ON usuarios.id_usuario=solicitudes.id_usuario
                INNER JOIN vehiculos ON solicitudes.id_vehiculo=vehiculos.id_vehiculo
                INNER JOIN status_r ON solicitudes.id_status=status_r.status
                
                ";

                $result = $conn->query($query);

                if ($result) {
                    $row = $result->fetch_assoc();
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['idsol']); ?></td>
                        <td><?= htmlspecialchars($row['NIT']); ?></td>
                        <td><?= htmlspecialchars($row['NOMBRE']); ?></td>
                        <td><?= htmlspecialchars($row['DPI']); ?></td>
                        <td><?= htmlspecialchars($row['correo']); ?></td>
                        <td><?= htmlspecialchars($row['telefono']); ?></td>
                        <td><?= htmlspecialchars($row['direccion']); ?></td>
                        <td><?= htmlspecialchars($row['fechasol']); ?></td>
                        <td><?= htmlspecialchars($row['estatus']); ?></td>
                        <td>
                             
                             
                            <button class="btn btn-success" onclick="generatePDF()">Imprimir Solicitud</button>
                        </td>
                    </tr>
                    <?php
                } else {
                    echo "<tr><td colspan='10'>Error al obtener solicitudes: " . $conn->error . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
