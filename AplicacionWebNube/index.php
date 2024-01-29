<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /AplicacionWebNube/login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <title>Play Reserve</title>
    <link rel="icon" type="image/png" sizes="16x16" href="logo_circular.png">
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-auth-compat.js"></script>

    <style>
        header {
            text-align: center;
            background-color: #28a745;
            color: #ffffff;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
     <style>
        /* Utilizar la fuente en tu CSS */
        body {
            font-family: 'Oswald', sans-serif;
        }

        h1 {
            font-weight: 700; /* Puedes ajustar el peso de la fuente según tus preferencias */
        }
    </style>
    
  </head>
  <body style="background-color: #f8fafa;" >
  <header>
        <div class="container d-flex justify-content-between align-items-center">
            <h1>Play Reserve</h1>
            <button type="button" class="btn btn-danger" onclick="cerrarSesion()">Cerrar sesión</button>
        </div>
    </header>
    
    <div class="container my-4" style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
        <h1>AGREGAR USUARIOS</h1><br>
        
        <input type="text" id="nombres" placeholder="Nombres" class="form-control" required> <br>
        <input type="text" id="appaterno" placeholder="Apellido Paterno" class="form-control" required> <br>
        <input type="text" id="amaterno" placeholder="Apellido Materno" class="form-control" required> <br>
        <input type="text" id="dni" placeholder="Dni" class="form-control" required> <br>
        <input type="email" id="correo" placeholder="Correo" class="form-control" required> <br>
        <input type="text" id="direccion" placeholder="Dirección" class="form-control" required> <br>
        <select id="tipoUsuario" class="form-control" required>
            <option value="" disabled selected hidden>Selecciona un tipo de Usuario</option>
            <option value="3">Super Admin</option>
            <option value="1">Dueño</option>
            <option value="2">Cliente</option>
        </select> <br>
        <input type="text" id="usuario" placeholder="Usuario" class="form-control" required> <br>
        <input type="password" id="pass" placeholder="Contraseña" class="form-control" required> <br>

        <button class="btn btn-info" id="boton" onclick="guardar()">Guardar</button>
        <div class="table-responsive">
        <table class="table my-5">
            <thead>
              <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Ap. Paterno</th>
                <th scope="col">Ap. Materno</th>
                <th scope="col">DNI</th>
                <th scope="col">Correo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Tipo Usuario</th>
                <th scope="col">Usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody id="tabla">
            </tbody>
          </table>
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" 
    crossorigin="anonymous"></script>
    <script src="app.js" ></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>