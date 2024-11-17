<?php
session_start();
include('../includes/db.php');
include('../includes/header.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Área Contable</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        .logo-container img {
            max-width: 150px;
        }
        .btn-lg {
            font-size: 1.1rem;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .logout-btn {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Botón para cerrar sesión -->
    <div class="logout-btn">
        <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Bienvenida y logo -->
    <div class="text-center logo-container mb-4">
        <img src="../images/1.png" alt="Logo de la Empresa" class="img-fluid">
        <br>
        <br>
        <h2 style="color: #007bff;">Bienvenido a Contadorcito S.A DE C.V</h2>
        <p>Gestione sus empresas, comprobantes y reportes con facilidad.</p>
    </div>

    <!-- Botones principales -->
    <div class="d-flex justify-content-around mt-4">
        <a href="add_company.php" class="btn btn-primary btn-lg w-25"><i class="fas fa-building"></i> Agregar Empresa</a>
        <a href="add_invoice.php" class="btn btn-secondary btn-lg w-25"><i class="fas fa-file-invoice"></i> Agregar Comprobante</a>
        <a href="report.php" class="btn btn-info btn-lg w-25"><i class="fas fa-chart-line"></i> Generar Reporte</a>
    </div>

    <!-- Estadísticas rápidas -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header"><i class="fas fa-building"></i> Total Empresas</div>
                <div class="card-body">
                    <h5 class="card-title">12 Empresas</h5>
                    <p class="card-text">Cantidad de empresas registradas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header"><i class="fas fa-exclamation-circle"></i> Comprobantes Pendientes</div>
                <div class="card-body">
                    <h5 class="card-title">5 Comprobantes</h5>
                    <p class="card-text">Comprobantes de compras y ventas pendientes por revisar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header"><i class="fas fa-file-alt"></i> Último Reporte Generado</div>
                <div class="card-body">
                    <h5 class="card-title">Reporte de Octubre</h5>
                    <p class="card-text">Reporte de actividades de compras y ventas del mes pasado.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include('../includes/footer.php');
?>
