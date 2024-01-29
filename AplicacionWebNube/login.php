<?php
session_start();
if (isset($_POST["usuario"]) ) {
    
    
    $_SESSION["usuario"] = $_POST["usuario"];
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="logo_circular.png">
    <!-- Agrega el enlace de Bootstrap (puedes cambiar a la versión que desees) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e6ffe6; /* Color de fondo verde claro */
        }
        .card {
            background-color: #ffffff; /* Color de fondo blanco */
            border: 1px solid #28a745; /* Borde verde */
            border-radius: 10px; /* Esquinas redondeadas */
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.1); /* Sutil sombra */
        }
        .card-header {
            background-color: #28a745; /* Color de fondo verde */
            color: #ffffff; /* Texto blanco */
            border-bottom: 1px solid #ffffff; /* Borde blanco */
        }
        .btn-primary {
            background-color: #218838; /* Color de fondo verde oscuro */
            border-color: #218838; /* Borde verde oscuro */
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Inicio de Sesión</h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="logo_circular.png" alt="Logo" class="img-fluid mb-4" style="max-width: 150px;">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="text">Usuario:</label>
                                <input type="text" class="form-control" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <button type="button" class="btn btn-primary btn-block" onclick="login()">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega los scripts de Firebase y tu aplicación -->
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-auth-compat.js"></script>
    <script src="app.js"></script>

    <!-- Agrega el script de Bootstrap (puedes cambiar a la versión que desees) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
