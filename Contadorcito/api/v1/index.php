<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once('../../includes/db.php');

// Ruta para manejar las peticiones de la API
$uri = explode('/', $_SERVER['REQUEST_URI']);
$resource = $uri[3];

switch ($resource) {
    case 'empresas':
        require_once('empresas.php');
        break;
    case 'comprobantes':
        require_once('comprobantes.php');
        break;
    case 'usuarios':
        require_once('usuarios.php');
        break;
    default:
        echo json_encode(['message' => 'Recurso no encontrado']);
        break;
}
?>
