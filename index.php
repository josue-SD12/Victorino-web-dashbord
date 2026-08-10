<?php
include __DIR__ . "/database.php";
session_start(); // Inicia sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    // Consulta segura
    $sql = "SELECT * FROM usuarios WHERE correo = ? AND clave = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $correo, $clave);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $_SESSION["usuario"] = $correo;
        header("Location: dashboardvictorino.php");
        exit();
    } else {
        $error = "❌ Usuario o contraseña incorrectos.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Victorino Artesanal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #2c3e50;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: white;
    }
    form {
      background: #34495e;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    input, button {
      display: block;
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 5px;
      border: none;
    }
    button {
      background: #27ae60;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    .error {
      color: #e74c3c;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <form method="POST" action="index.php">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
  </form>
</body>
</html>
