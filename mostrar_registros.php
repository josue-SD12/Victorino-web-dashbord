<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Pagos</title>
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
        .btn-volver {
            display: block;
            margin: 30px auto 0;
            padding: 10px 20px;
            background-color: #66c0f4;
            color: #1b2838;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            width: 120px;
        }
        .btn-volver:hover {
            background-color: #549ec9;
        }
    </style>
</head>
<body>
    <h1>Registro de Pagos de Pizza</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Tamaño</th>
                <th>Método de Pago</th>
                <th>Número o Dato</th>
                <th>Código Verificación</th>
                <th>Fecha de Pago</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexion = new mysqli("localhost", "root", "", "victorino");

            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            $sql = "SELECT * FROM historial_pagos ORDER BY fecha_pago DESC";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>
                        <td>{$fila['id']}</td>
                        <td>{$fila['producto']}</td>
                        <td>{$fila['tamano']}</td>
                        <td>{$fila['metodo_pago']}</td>
                        <td>{$fila['numero_tarjeta_o_dato']}</td>
                        <td>{$fila['codigo_verificacion']}</td>
                        <td>{$fila['fecha_pago']}</td>
                        <td>{$fila['nombre_cliente']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay registros.</td></tr>";
            }

            $conexion->close();
            ?>
        </tbody>
    </table>

    <!-- Botón de retorno -->
    <a href="dashboardvictorino.php" class="btn-volver">Volver</a>

</body>
</html>
