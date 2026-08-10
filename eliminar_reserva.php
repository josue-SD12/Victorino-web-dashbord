<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $conexion = new mysqli("localhost", "root", "", "victorino");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("DELETE FROM reservacion_mesas WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "eliminado";
    } else {
        echo "error";
    }

    $stmt->close();
    $conexion->close();
}
?>
