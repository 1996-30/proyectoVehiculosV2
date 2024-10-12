<?php
session_start();
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); 

    // Comprobar la conexión
    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }

    // Consulta SQL para obtener el usuario antes de eliminarlo
    $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Consulta SQL para eliminar el usuario por ID
        $queryDelete = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmtDelete = $conn->prepare($queryDelete);

        if ($stmtDelete) {
            $stmtDelete->bind_param("i", $id);
            if ($stmtDelete->execute() && $stmtDelete->affected_rows > 0) {
                $_SESSION['message'] = 'El usuario con ID ' . $id . ' fue eliminado';
                $_SESSION['message_type'] = 'success';
            }
            $stmtDelete->close();
        }
    }

    $stmt->close();
}

// Redirigir a la página de control de usuarios
header('Location: control_usuarios.php');
exit();
?>
