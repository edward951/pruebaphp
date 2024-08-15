<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: /employee/login');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lista de empleados Activos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../public/js/tablaEmpleados.js"></script>
    <script src="../public/js/scripts.js"></script>

</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de empleados Activos</h1>
        <a href="index.php?controller=EmployeeController&action=create" class="btn btn-primary mb-4">Crear empleado</a>
        <a href="index.php?controller=EmployeeController&action=showInactiveEmployees" class="btn btn-warning mb-4">Inactivos</a>
        <table class="table table-bordered" id="tablaEmpleados">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Edad</th>
                    <th class="text-center">Género</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Cargo</th>
                    <th class="text-center">Fecha creación</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
<script>
    <?php if (isset($_GET['success'])) : ?>
        <?php if ($_GET['success'] === 'true'): ?>
            handleSuccessParam('Operacion exitosa', 'success', 'Se ha creado el empleado satisfactoriamente');
        <?php else: ?>
            handleSuccessParam('Error', 'error', 'Nose ha creado el empleado');
        <?php endif; ?>
    <?php endif; ?>
</script>

</html>