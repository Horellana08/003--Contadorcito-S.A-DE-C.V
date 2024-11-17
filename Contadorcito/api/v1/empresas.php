<?php
// Obtener todas las empresas
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM empresas";
    $result = $conn->query($sql);

    $empresas = [];
    while ($row = $result->fetch_assoc()) {
        $empresas[] = $row;
    }
    echo json_encode($empresas);
}

// Crear una nueva empresa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $tipo_empresa = $data['tipo_empresa'];
    $direccion = $data['direccion'];
    $telefono = $data['telefono'];
    $email = $data['email'];

    $sql = "INSERT INTO empresas (nombre, tipo_empresa, direccion, telefono, email)
            VALUES ('$nombre', '$tipo_empresa', '$direccion', '$telefono', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Empresa registrada exitosamente']);
    } else {
        echo json_encode(['error' => 'Error al registrar la empresa']);
    }
}
?>
