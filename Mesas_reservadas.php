<?php
$conexion = new mysqli("localhost", "root", "", "victorino");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM reservacion_mesas ORDER BY fecha_reserva DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservaciones de Mesa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b2838;
            color: #ffffff;
            padding: 20px;
        }
        h1 {
            color: #66c0f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #2a475e;
            border: 1px solid #66c0f4;
        }
        th, td {
            border: 1px solid #66c0f4;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #3b4d61;
        }
        tr:nth-child(even) {
            background-color: #22303c;
        }
        .boton-volver {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #66c0f4;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            width: 120px;
        }
        .boton-volver:hover {
            background-color: #4a90d9;
        }
        .acciones button {
            margin: 0 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .acciones .check {
            background-color: #28a745;
            color: white;
        }
        .acciones .cancel {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Reservaciones de Mesa</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Cliente</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>ID Mesa</th>
                <th>Estado Reserva</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>{$fila['id']}</td>
                            <td>{$fila['nombre_cliente']}</td>
                            <td>{$fila['correo_cliente']}</td>
                            <td>{$fila['fecha_reserva']}</td>
                            <td>{$fila['hora_reserva']}</td>
                            <td>{$fila['id_mesa']}</td>
                            <td>{$fila['estado_reserva']}</td>
                            <td class='acciones'>
                                <button class='check' onclick='gestionarReserva(this, \"confirmar\")'>✅</button>
                                <button class='cancel' onclick='gestionarReserva(this, \"cancelar\")'>❌</button>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay registros de reservas.</td></tr>";
            }

            $conexion->close();
            ?>
        </tbody>
    </table>

    <a class="boton-volver" href="dashboardvictorino.php">Volver</a>

    <script>
    function gestionarReserva(boton, accion) {
        const fila = boton.closest("tr");
        const id = fila.querySelector("td").innerText; // Se asume que la primera columna es el ID

        let mensaje = accion === "confirmar"
            ? "✅ ¡Se cumplió la reservación con éxito!"
            : "❌ La mesa ha sido cancelada.";

        if (confirm("¿Estás seguro de " + (accion === "confirmar" ? "confirmar" : "cancelar") + " esta reservación?")) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "eliminar_reserva.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText.trim() === "eliminado") {
                        alert(mensaje);
                        fila.remove(); // Elimina la fila visualmente
                    } else {
                        alert("⚠️ Error al eliminar la reservación.");
                    }
                }
            };
            xhr.send("id=" + id);
        }
    }
    </script>
</body>
</html>
