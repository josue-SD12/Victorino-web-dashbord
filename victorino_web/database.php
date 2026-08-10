<?php
$host = "localhost";
$user = "root";
$pass = ""; // O tu contraseña si usas una
$db = "victorino";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
