<?php
$conexion = new mysqli("localhost", "root", "", "victorino");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$producto = $_POST['producto'];
$tamano = $_POST['tamano'];
$metodo = $_POST['metodo'];
$cuenta = $_POST['cuenta'];
$codigo = $_POST['codigo'];
$nombre_cliente = $_POST['nombre'];
$fecha_pago = date('Y-m-d H:i:s');

// Insertar en pagos
$sql1 = "INSERT INTO pagos 
    (producto, tamano, metodo_pago, numero_tarjeta_o_dato, codigo_verificacion, fecha_pago, nombre_cliente)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt1 = $conexion->prepare($sql1);
$stmt1->bind_param("sssssss", $producto, $tamano, $metodo, $cuenta, $codigo, $fecha_pago, $nombre_cliente);

if ($stmt1->execute()) {
    // Insertar en historial_pagos
    $sql2 = "INSERT INTO historial_pagos 
        (producto, tamano, metodo_pago, numero_tarjeta_o_dato, codigo_verificacion, fecha_pago, nombre_cliente)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt2 = $conexion->prepare($sql2);
    $stmt2->bind_param("sssssss", $producto, $tamano, $metodo, $cuenta, $codigo, $fecha_pago, $nombre_cliente);

    if ($stmt2->execute()) {
        echo "Pago y registro en historial exitoso.";
    } else {
        echo "Error al guardar en historial: " . $stmt2->error;
    }

    $stmt2->close();
} else {
    echo "Error al registrar el pago: " . $stmt1->error;
}

$stmt1->close();
$conexion->close();
?>
