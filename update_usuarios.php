<?php
session_start();
include('db.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Consulta para obtener el usuario específico
$query = "SELECT * FROM usuarios WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuario no encontrado.";
    exit;
}

// Consulta para obtener los roles
$queryRoles = "SELECT * FROM roles"; 
$resultRoles = $conn->query($queryRoles);
$roles = []; 
if ($resultRoles->num_rows > 0) {
    while ($rol = $resultRoles->fetch_assoc()) {
        $roles[] = $rol; 
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $tipo = $_POST['id_rol'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dpi = $_POST['dpi'];
    $nit = $_POST['nit'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $status = $_POST['status'];

    // Consulta para actualizar el usuario
    $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, id_rol=?, contraseña=?, email=?, dpi=?, nit=?, telefono=?, direccion=?, status=? WHERE id_usuario=?");
    $stmt->bind_param("ssssssissi", $name, $tipo, $password, $email, $dpi, $nit, $telefono, $direccion, $status, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Registro actualizado con éxito';
        $_SESSION['message_type'] = 'success';
        header("Location: control_usuarios.php");
        exit;
    } else {
        echo "Error de conexión: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Actualizar Usuario</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Actualizar Usuario</h1>
        <form action="update_usuarios.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control">
                <small class="form-text text-muted">Dejar en blanco si no desea cambiar la contraseña.</small>
            </div>
            <div class="mb-3">
                <label for="email">Correo</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="dpi">DPI</label>
                <input type="text" name="dpi" class="form-control" value="<?php echo htmlspecialchars($usuario['dpi']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nit">NIT</label>
                <input type="text" name="nit" class="form-control" value="<?php echo htmlspecialchars($usuario['nit']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" value="<?php echo htmlspecialchars($usuario['status']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_rol">Rol</label>
                <select name="id_rol" class="form-control" required>
                    <option value="" disabled>Selecciona un rol</option>
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?php echo $rol['id_rol']; ?>" <?php echo ($rol['id_rol'] == $usuario['id_rol']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($rol['nombre']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
