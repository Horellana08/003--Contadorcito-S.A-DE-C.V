<?php
session_start();
include('../includes/db.php');

// Función para generar reporte en Excel (CSV)
function generarReporteExcel($result_compras, $result_ventas) {
    $filename = "reporte_compras_ventas_" . date("Y-m-d_H-i-s") . ".csv";
    
    // Definir cabeceras del archivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    $output = fopen('php://output', 'w');

    // Escribir cabeceras del archivo CSV
    fputcsv($output, ['Tipo', 'Fecha', 'Monto', 'Proveedor', 'Comprobante']);

    // Escribir las filas de las compras
    while($row = $result_compras->fetch_assoc()) {
        fputcsv($output, ['Compra', $row['fecha'], $row['monto'], $row['proveedor'], $row['numero_comprobante']]);
    }

    // Escribir las filas de las ventas
    while($row = $result_ventas->fetch_assoc()) {
        fputcsv($output, ['Venta', $row['fecha'], $row['monto'], $row['proveedor'], $row['numero_comprobante']]);
    }

    fclose($output);
    exit();
}

// Función para generar reporte en PDF usando DOMPDF
function generarReportePDF($result_compras, $result_ventas) {
    // Incluir el archivo DOMPDF desde CDN
    require_once('https://cdnjs.cloudflare.com/ajax/libs/dompdf/2.0.2/dompdf.min.js');
    
    // Crear el HTML para el reporte
    $html = '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: center;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h2>Reporte de Compras y Ventas</h2>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Proveedor</th>
                    <th>Comprobante</th>
                </tr>
            </thead>
            <tbody>';

    // Escribir las filas de las compras
    while($row = $result_compras->fetch_assoc()) {
        $html .= '
        <tr>
            <td>Compra</td>
            <td>' . $row['fecha'] . '</td>
            <td>' . $row['monto'] . '</td>
            <td>' . $row['proveedor'] . '</td>
            <td>' . $row['numero_comprobante'] . '</td>
        </tr>';
    }

    // Escribir las filas de las ventas
    while($row = $result_ventas->fetch_assoc()) {
        $html .= '
        <tr>
            <td>Venta</td>
            <td>' . $row['fecha'] . '</td>
            <td>' . $row['monto'] . '</td>
            <td>' . $row['proveedor'] . '</td>
            <td>' . $row['numero_comprobante'] . '</td>
        </tr>';
    }

    $html .= '
            </tbody>
        </table>
    </body>
    </html>';

    // Inicializar DOMPDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();

    // Generar y descargar el archivo PDF
    $dompdf->stream('reporte_compras_ventas.pdf', array("Attachment" => 1));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_empresa = $_POST['id_empresa'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Consulta de compras
    $sql_compras = "SELECT * FROM comprobantes_compras WHERE id_empresa = '$id_empresa' AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    $result_compras = $conn->query($sql_compras);

    // Consulta de ventas
    $sql_ventas = "SELECT * FROM comprobantes_ventas WHERE id_empresa = '$id_empresa' AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    $result_ventas = $conn->query($sql_ventas);

    // Verificar el tipo de reporte
    if (isset($_POST['reporte_excel'])) {
        generarReporteExcel($result_compras, $result_ventas);
    } elseif (isset($_POST['reporte_pdf'])) {
        generarReportePDF($result_compras, $result_ventas);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reporte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
        }
        .footer a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Generar Reporte de Compras y Ventas</h2>
    <form method="post">
        <div class="form-group">
            <label for="id_empresa">ID Empresa</label>
            <input type="text" name="id_empresa" class="form-control" id="id_empresa" required>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio" required>
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha Fin</label>
            <input type="date" name="fecha_fin" class="form-control" id="fecha_fin" required>
        </div>
        <button type="submit" name="reporte_excel" class="btn btn-primary btn-block">Generar Reporte en Excel</button>
        
    </form>
</div>

<div class="footer">
    <p><a href="dashboard.php">Volver al Dashboard</a></p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
