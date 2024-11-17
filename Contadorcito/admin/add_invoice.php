<?php
session_start();
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_empresa = $_POST['id_empresa'];
    $tipo_comprobante = $_POST['tipo_comprobante'];
    $numero_comprobante = $_POST['numero_comprobante'];
    $fecha = $_POST['fecha'];
    $monto = $_POST['monto'];
    $proveedor = $_POST['proveedor'];

    // Validar que se hayan subido los archivos
    if (isset($_FILES['archivo_pdf']) && isset($_FILES['archivo_json'])) {
        $archivo_pdf = addslashes(file_get_contents($_FILES['archivo_pdf']['tmp_name']));
        $archivo_json = addslashes(file_get_contents($_FILES['archivo_json']['tmp_name']));

        $sql = "INSERT INTO comprobantes_compras (id_empresa, tipo_comprobante, numero_comprobante, fecha, monto, proveedor, archivo_pdf, archivo_json) 
                VALUES ('$id_empresa', '$tipo_comprobante', '$numero_comprobante', '$fecha', '$monto', '$proveedor', '$archivo_pdf', '$archivo_json')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Comprobante de compra registrado correctamente.";
            $_SESSION['message_type'] = "success";
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
            $_SESSION['message_type'] = "danger";
            header("Location: dashboard.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Por favor, sube ambos archivos (PDF y JSON).";
        $_SESSION['message_type'] = "warning";
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Comprobante de Compra</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Estilo del formulario */
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 90%;
            max-width: 600px;
        }

        h2 {
            color: #17d4fc;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            background: transparent;
            border: 1px solid #17d4fc;
            color: #ffffff;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .btn {
            background: #17d4fc;
            color: #0f2027;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background: #0f2027;
            color: #17d4fc;
            transform: scale(1.05);
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Comprobante de Compra</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <input type="text" name="id_empresa" class="form-control" placeholder="ID Empresa" required>
            <select name="tipo_comprobante" class="form-control" required>
                <option value="">Tipo de Comprobante</option>
                <option value="Crédito Fiscal">Crédito Fiscal</option>
                <option value="Consumidor Final">Consumidor Final</option>
            </select>
            <input type="text" name="numero_comprobante" class="form-control" placeholder="Número de Comprobante" required>
            <input type="date" name="fecha" class="form-control" required>
            <input type="number" name="monto" class="form-control" placeholder="Monto" step="0.01" required>
            <input type="text" name="proveedor" class="form-control" placeholder="Proveedor" required>
            <br>
            <label class="form-label">Subir PDF:</label>
            <input type="file" name="archivo_pdf" class="form-control" required>
            <br>
            <label class="form-label">Subir JSON:</label>
            <input type="file" name="archivo_json" class="form-control" required>
            <br>
            <button type="submit" class="btn w-100 mt-3">Registrar</button>
        </form>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
