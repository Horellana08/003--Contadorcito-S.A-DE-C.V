<?php
// Obtener todos los usuarios
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);
}

// Crear un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre_usuario = $data['nombre_usuario'];
    $contrasena = $data['contrasena'];
    $rol = $data['rol'];

    $sql = "INSERT INTO usuarios (nombre_usuario, contrasena, rol)
            VALUES ('$nombre_usuario', '$contrasena', '$rol')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Usuario registrado']);
    } else {
        echo json_encode(['error' => 'Error al registrar el usuario']);
    }
}
?>
