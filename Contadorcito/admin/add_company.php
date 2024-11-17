<?php
include('../includes/db.php');
include('../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $tipo_empresa = $_POST['tipo_empresa'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $sql = "INSERT INTO empresas (nombre, tipo_empresa, direccion, telefono, email) 
            VALUES ('$nombre', '$tipo_empresa', '$direccion', '$telefono', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Empresa registrada correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al registrar la empresa: " . $conn->error . "</div>";
    }
}
?>

<form method="post" class="container mt-5">
    <h2>Agregar Empresa</h2>
    <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>
    <input type="text" name="tipo_empresa" class="form-control mb-3" placeholder="Tipo de Empresa" required>
    <input type="text" name="direccion" class="form-control mb-3" placeholder="Dirección" required>
    <input type="text" name="telefono" class="form-control mb-3" placeholder="Teléfono" required>
    <input type="email" name="email" class="form-control mb-3" placeholder="Correo Electrónico" required>
    <button type="submit" class="btn btn-primary">Registrar Empresa</button>
</form>

<!-- Enlace para regresar al dashboard -->
<div class="mt-3">
    <a href="dashboard.php" class="btn btn-secondary">Volver al Dashboard</a>
</div>

<?php
include('../includes/footer.php');
?>
