<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Confirmar Pedido</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 2rem;
      text-align: center;
      background-color: #f0f0f0;
    }

    .card {
      background-color: white;
      padding: 2rem;
      border-radius: 10px;
      max-width: 400px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      color: #333;
    }

    #producto-nombre {
      font-size: 1.5rem;
      margin: 1rem 0;
      color: #007bff;
    }

    button {
      margin-top: 2rem;
      padding: 0.8rem 2rem;
      font-size: 1rem;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <div class="card">
   <h2>Producto Seleccionado</h2>
<div id="producto-nombre">Cargando...</div>
<button onclick="realizarPago()">Realizar Pago</button>

<script>
  const params = new URLSearchParams(window.location.search);
  const producto = params.get('producto');

  document.getElementById('producto-nombre').textContent = producto ?? "Producto no encontrado";

  function realizarPago() {
    // Opcional: mostrar alerta
    alert("Gracias por su compra de: " + producto);

    // Redirigir a metodopago.php con el producto en la URL
    window.location.href = "metodopago.php?producto=" + encodeURIComponent(producto);
  }
</script>

</body>
</html>
