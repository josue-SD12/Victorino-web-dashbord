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

            // Asegúrate que esta tabla sea la que realmente estás usando para guardar pagos
            $sql = "SELECT * FROM reguistro_pizza ORDER BY fecha_pago DESC";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>
                        <td>{$fila['id']}</td>
                        <td>{$fila['producto']}</td>
                        <td>{$fila['tamaño']}</td>
                        <td>{$fila['metodo_pago']}</td>
                        <td>{$fila['numero_tarjeta_o_dato']}</td>
                        <td>{$fila['codigo_verificacion']}</td>
                        <td>{$fila['fecha_pago']}</td>
                        <td>{$fila['nombre']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay registros.</td></tr>";
            }

            $conexion->close();
            ?>
        </tbody>
    </table>
</body>
</html>
