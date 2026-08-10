<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard con Fondo</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background-image: url(https://img.freepik.com/foto-gratis/superficie-oscura-espacio-blanco-menu-comida-rapida_23-2147684608.jpg?semt=ais_hybrid&w=740); /* Imagen que subiste */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .sidebar {
      width: 220px;
      background-color: rgba(15, 24, 43, 0.95); /* fondo oscuro con transparencia */
      color: rgba(10, 0, 0, 0);
      padding: 20px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      text-align: center;
    }

    .sidebar a {
      display: block;
      color: rgb(243, 238, 238);
      text-decoration: none;
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .sidebar a:hover {
      background-color: #4e638f;
    }

    .main {
      flex: 1;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.021); /* fondo transparente */
      backdrop-filter: blur(4px);
    }

    .header {
      font-size: 24px;
      margin-bottom: 20px;
      color: #e4e5e6;
    }

    .cards {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .card {
      background-color: rgb(224, 227, 233);
      padding: 20px;
      border-radius: 10px;
      flex: 1;
      min-width: 200px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .card h3 {
      margin-bottom: 10px;
      color: #333;
    }

    .card p {
      font-size: 24px;
      font-weight: bold;
      color: #2ed573;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>R CHIQEN</h2>
    <div class="header">VICTORINO</div>
    <a href="#">Inicio</a>
    <div class="menu-item">
 
  <ul class="submenu">
    <li><a href="mostrar_registros.php">Pedidos realizados desde la paguina</a></li>
  </ul>
    <ul class="submenu">
    <li><a href="Mesas_reservadas.php">Mesas Reservadas</a></li>
  </ul>
</div>

    <a href="#">Estadísticas</a>
    <a href="#">Configuración</a>
    <a href="#">Salir</a>
  </div>
  <div class="main">
    <div class="header">Bienvenido!!</div>
    <div class="cards">
      <div class="card">
        <h3>Usuarios Activos</h3>
        <p>150</p>
      </div>
      <div class="card">
        <h3>Ventas</h3>
        <p>$4,300</p>
      </div>
      <div class="card">
        <h3>Visitas</h3>
        <p>12,800</p>
      </div>
    </div>
  </div>
</body>
</html>
