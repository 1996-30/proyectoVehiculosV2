<?php  
include("db.php");
session_start();

// Inicializar variables
$nombre = '';
$id_status = ''; 
$obs = ''; 

if(isset($_GET['idsol'])) {
    $id = $_GET['idsol'];
    
    /*$vehiculos = "SELECT vehiculos.id_vehiculo, vehiculos.id_status, status_r.nombre AS estatus, solicitudes.obs AS observaciones FROM vehiculos  
    INNER JOIN status_r ON vehiculos.id_status=status_r.status 
    INNER JOIN solicitudes ON vehiculos.id_vehiculo=solicitudes.id_vehiculo
    WHERE vehiculos.id_vehiculo=$id";*/

    $solicitudes = "SELECT solicitudes.id as idsol, solicitudes.id_status as idstatus, status_r.nombre AS nestatus, solicitudes.obs AS observaciones FROM solicitudes  
    INNER JOIN status_r ON solicitudes.id_status=status_r.status    
    WHERE solicitudes.id=$id";

    $resultado = mysqli_query($conn, $solicitudes);

    if(mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $nombre = $row['nestatus'];
        $id_status = $row['idstatus'];
        $obs = $row['observaciones'];
    }
}

if(isset($_POST['update'])) {
    $id = $_GET['idsol'];
    $obs = $_POST['obs'];
    $estatus = $_POST['id_status'];

    $estatus = mysqli_real_escape_string($conn, $estatus);
    $obs = mysqli_real_escape_string($conn, $obs); 

    $query = "UPDATE solicitudes SET id_status = '$id_status', obs = '$obs' WHERE id = $id";
    mysqli_query($conn, $query);

   // $query_obs = "UPDATE solicitudes SET obs = '$obs' WHERE id_vehiculo = $id"; 
    //mysqli_query($conn, $query_obs);

    $_SESSION['message'] = 'Registro Actualizado Exitosamente';
    $_SESSION['message_type'] = 'success';
    
    header("Location: control_Solicitudes.php");
    exit();
}

$estatusQuery = "SELECT status, nombre FROM status_r";
$estatusResult = mysqli_query($conn, $estatusQuery);

?>

<?php include("header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="updateSolicitud.php?idsol=<?php echo htmlspecialchars($id); ?>" method="POST">
                    <div class="form-group">
                        <label for="obs">Actualizar Observaciones:</label>
                        <textarea name="obs" id="obs" class="form-control" rows="4" placeholder="Escribe tus observaciones aquí..."><?php echo htmlspecialchars($obs); ?></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="estatus" class="form-control">Autorización de Reserva:</label>
                        <select name="id_status" id="estatus" class="form-control">
                            <option value=""></option>
                            <?php while($row = mysqli_fetch_assoc($estatusResult)) { ?>
                                <option value="<?php echo $row['status']; ?>" <?php if($row['status'] == $id_status) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-success" name="update">Autorizar Solicitud</button>
                    <button class="btn btn-danger" name="cancelar">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
