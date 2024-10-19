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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No. Sol</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">DPI</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Vehiculo Solicitado</th>
                    <th scope="col">Fecha Emisión</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                $query = "
                SELECT solicitudes.id AS idsol, usuarios.nit AS NIT, usuarios.nombre AS NOMBRE, 
                usuarios.dpi AS DPI, usuarios.email AS correo, usuarios.telefono AS telefono, 
                usuarios.direccion AS direccion, solicitudes.fecha AS fechasol, 
                solicitudes.obs AS observaciones, status_r.nombre AS estatus,
                CONCAT(marcas.nombre,' - ',linea.nombre,' - ', modelo.nombre,' - ', matricula, ' - ',tipo_vehiculo.nombre ) as nombreV
                FROM usuarios 
                INNER JOIN solicitudes ON usuarios.id_usuario=solicitudes.id_usuario
                INNER JOIN vehiculos ON solicitudes.id_vehiculo=vehiculos.id_vehiculo
                INNER JOIN status_r ON solicitudes.id_status=status_r.status
                INNER JOIN marcas ON vehiculos.id_marca=marcas.id_marca
                INNER JOIN linea ON vehiculos.id_linea=linea.id_linea
                INNER JOIN modelo ON vehiculos.id_modelo=modelo.id_modelo
                INNER JOIN tipo_vehiculo ON vehiculos.id_tipo=tipo_vehiculo.id_tipo
                ";

                $result = $conn->query($query);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($row['idsol']); ?></td>
                            <td><?= htmlspecialchars($row['NIT']); ?></td>
                            <td><?= htmlspecialchars($row['NOMBRE']); ?></td>
                            <td><?= htmlspecialchars($row['DPI']); ?></td>
                            <td><?= htmlspecialchars($row['correo']); ?></td>
                            <td><?= htmlspecialchars($row['telefono']); ?></td>
                            <td><?= htmlspecialchars($row['nombreV']); ?></td>
                            <td><?= htmlspecialchars($row['fechasol']); ?></td>
                            <td><?= htmlspecialchars($row['estatus']); ?></td>
                            <td><?= htmlspecialchars($row['observaciones']); ?></td> <!-- Mostrar observaciones -->
                            <td>
                                <a href="updateSolicitud.php?idsol=<?php echo $row['idsol']; ?>" class="btn btn-info">Autorizar Renta</a>
                                <br>
                                <button class="btn btn-success" onclick="generatePDF()">Imprimir Solicitud</button>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='11'>Error al obtener solicitudes: " . $conn->error . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
