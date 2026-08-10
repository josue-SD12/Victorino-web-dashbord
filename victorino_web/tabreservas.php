<?php
$conexion = new mysqli("localhost", "root", "", "victorino");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$registro_exitoso = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $producto = $_POST['producto'] ?? '';

    if (empty($nombre) || empty($correo) || empty($fecha) || empty($hora)) {
        echo "<script>alert('Todos los campos son obligatorios.');</script>";
    } else {
        // Buscar el primer número de mesa disponible para esa fecha y hora
        $sqlBuscar = "SELECT numero_mesa FROM mesas WHERE fecha_reserva = ? AND hora_reserva = ? LIMIT 1";
        $stmtBuscar = $conexion->prepare($sqlBuscar);
        $stmtBuscar->bind_param("ss", $fecha, $hora);
        $stmtBuscar->execute();
        $stmtBuscar->store_result();

        if ($stmtBuscar->num_rows > 0) {
            $sqlUltimaMesa = "SELECT MAX(numero_mesa) AS ultima FROM mesas";
            $resultado = $conexion->query($sqlUltimaMesa);
            $fila = $resultado->fetch_assoc();
            $nueva_mesa = $fila['ultima'] + 1;
        } else {
            $nueva_mesa = 1;
        }

        $stmtBuscar->close();

        // Insertar la reserva en la tabla mesas
        $sqlInsert = "INSERT INTO mesas (numero_mesa, estado, nombre_cliente, correo_cliente, fecha_reserva, hora_reserva)
                      VALUES (?, 'reservada', ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sqlInsert);
        $stmt->bind_param("issss", $nueva_mesa, $nombre, $correo, $fecha, $hora);

        if ($stmt->execute()) {
            $registro_exitoso = true;
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

$conexion->close();
$producto = isset($_GET['producto']) ? htmlspecialchars($_GET['producto']) : 'Producto no especificado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reserva de Mesa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('images/fondo-pizza-dibujada-mano_23-2150905263.avif');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .reserva-container {
      max-width: 500px;
      margin: auto;
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    input, select, button {
      width: 100%;
      padding: 0.7rem;
      margin: 0.5rem 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    .boton-volver {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #28a745;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      display: inline-block;
    }
    .boton-volver:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <?php if ($registro_exitoso): ?>
    <div class="reserva-container">
      <h2>¡Felicidades!</h2>
      <p>Mesa registrada con éxito.</p>
      <a class="boton-volver" href="index.php">Volver al inicio</a>
      <script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 3000);
      </script>
    </div>
  <?php else: ?>
    <div class="reserva-container">
      <h2>Reservar Mesa</h2>
      <form action="" method="post">
        <input type="hidden" name="producto" value="<?php echo $producto; ?>">

        <label for="nombre">Tu Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Tu Correo:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="fecha">Fecha de Reserva:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="hora">Hora de Reserva:</label>
        <select name="hora" id="hora" required>
          <option value="">-- Selecciona una hora --</option>
          <option value="12:00">12:00 pm</option>
          <option value="13:00">1:00 pm</option>
          <option value="14:00">2:00 pm</option>
          <option value="15:00">3:00 pm</option>
          <option value="16:00">4:00 pm</option>
          <option value="17:00">5:00 pm</option>
          <option value="18:00">6:00 pm</option>
          <option value="19:00">7:00 pm</option>
          <option value="20:00">8:00 pm</option>
        </select>

        <br><br>
        <button type="submit">Reservar</button>
      </form>
    </div>
  <?php endif; ?>
</body>
</html>
