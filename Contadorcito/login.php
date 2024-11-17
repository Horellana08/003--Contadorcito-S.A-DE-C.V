<?php
session_start();
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['usuario'] = $user['nombre_usuario'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: admin/dashboard.php");
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Área Contable</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-header i {
            color: #007bff;
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .login-header h2 {
            font-size: 1.5rem;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <i class="fas fa-calculator"></i>
        <h2>CONTADORCITO S.A DE C.V</h2>
        <p>Inicie sesión para gestionar su sistema.</p>
    </div>

    <?php if (isset($error)) { ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php } ?>

    <form method="post">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese su usuario" required>
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese su contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
    </form>

    <div class="footer">
        <p>¿Olvidó su contraseña? <a href="#">Recupérala aquí</a></p>
        <p>© 2024 Contadorcito S.A DE C.V . Todos los derechos reservados| HENRY ORELLANA.</p>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
