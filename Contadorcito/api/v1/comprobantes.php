<?php
// Obtener todos los comprobantes
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM comprobantes_compras";
    $result = $conn->query($sql);

    $comprobantes = [];
    while ($row = $result->fetch_assoc()) {
        $comprobantes[] = $row;
    }
    echo json_encode($comprobantes);
}

// Crear un nuevo comprobante de compra
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id_empresa = $data['id_empresa'];
    $tipo_comprobante = $data['tipo_comprobante'];
    $numero_comprobante = $data['numero_comprobante'];
    $fecha = $data['fecha'];
    $monto = $data['monto'];
    $proveedor = $data['proveedor'];

    $sql = "INSERT INTO comprobantes_compras (id_empresa, tipo_comprobante, numero_comprobante, fecha, monto, proveedor) 
            VALUES ('$id_empresa', '$tipo_comprobante', '$numero_comprobante', '$fecha', '$monto', '$proveedor')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Comprobante de compra registrado']);
    } else {
        echo json_encode(['error' => 'Error al registrar el comprobante']);
    }
}
?>
