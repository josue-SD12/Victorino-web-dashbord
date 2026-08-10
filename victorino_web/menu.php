<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>VICTORINO</title>
  <style>
 .menuitems_wrap {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 2rem;
  padding: 2rem 0;
  background-color: #000; /* fondo gris oscuro */
}
    .item {
      width: 300px;
      text-align: center;
      transition: transform 0.3s ease;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 1rem;
      background-color: #000;
        color: #ff0000;           
}
    

    .item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }

    .item h6 {
      margin-top: 0.5rem;
      font-size: 0.9rem;
      color: #007bff;
      text-transform: uppercase;
    }

    .item h5 {
      font-size: 1.1rem;
      font-weight: bold;
      margin: 0.5rem 0;
    }

    .item p {
      font-style: italic;
      color: #555;
    }

    .item button {
      margin-top: 0.5rem;
      padding: 0.5rem 1rem;
      background-color:rgb(29, 212, 60);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .item button:hover {
      background-color: #218838;
    }

    .item:hover {
      transform: scale(1.05);
    }

    .navbar {
      background-color:rgb(148, 6, 6);
      padding: 1rem;
      text-align: center;
    }

    .navbar h1 {
      margin: 0;
    }

    .navbar nav a {
      margin: 0 1rem;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    .navbar nav a:hover {
      color:hsl(0, 0.00%, 3.10%);
    }
  </style>
</head>
<body>
  <header>
    <div class="navbar">
      <h1>Restaurante Delicias</h1>
      <nav>
        <a href="index.php">Inicio</a></li>
        <a href="#menu">Menú</a>
        <a href="#promos">Promociones</a>
        <a href="#contacto">Contacto</a>
      </nav>
    </div>
  </header>

  <section id="menu">
    <div class="menuitems_wrap">

      <div class="item">
        <img src="images/pizza victorino.png" alt="">
        <h6>Pizza Victorino</h6>
        <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
        <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('Pizza Victorino')">Agregar</button>
      </div> 
      <div class="item">
        <img src="images/hawaiana tropical.png" alt="">
        <h6>Pizza Hawaiana</h6>
        <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
        <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('Pizza Hawaiana')">Agregar</button>
      </div>

      <div class="item">
        <img src="images/Pizza-3007395.jpg" alt="">
        <h6>Pizza Italiana</h6>
        <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
         <h5>xl(32/revanadas) ...s/65.00</h5>
    
        <button onclick="redirigirAPago('Pizza Italiana')">Agregar</button>
      </div>
       <div class="item">
        <img src="images/pizza peperoni.png" alt="">
        <h6>Pizza Peperoni</h6>
        <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
      <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('Pizza Peperoni')">Agregar</button>
      </div>

      <div class="item">
        <img src="images/pizza americana.png" alt="">
        <h6>pizza Americana</h6>
   <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
      <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('pizza Americana')">Agregar</button>
      </div>
      <div class="item">
        <img src="images/full carne.png" alt="">
        <h6>pizza Carnivora</h6>
   <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
      <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('pizza Carnivora')">Agregar</button>
      </div>

  <div class="item">
        <img src="images/pizza vegetariana.png" alt="">
        <h6>Pizza vegetariana</h6>
        <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
        <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('Pizza vegetariana')">Agregar</button>
      </div>
      
  <div class="item">
        <img src="images/pizza suprema.png" alt="">
        <h6>Pizza suprema</h6>
        <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
        <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('Pizza suprema')">Agregar</button>
      </div>
       

       <div class="item">
        <img src="images/pizza la brava.png" alt="">
        <h6>Pizza la brava</h6>
        <h5>Personal (8/revanadas)...s/15.00</h5>
        <h5>Familiar(16/revanadas) ...s/35.00</h5>
        <h5>xl(32/revanadas) ...s/65.00</h5>
        <button onclick="redirigirAPago('Pizza la brava')">Agregar</button>
      </div>
      <!-- Agrega los demás items igual, con su botón que llama a redirigirAPago() -->

    </div>
  </section>

  <script>
    function redirigirAPago(nombreProducto) {
      const encoded = encodeURIComponent(nombreProducto);
      window.location.href = `pago.php?producto=${encoded}`;
    }
  </script>
</body>
</html>