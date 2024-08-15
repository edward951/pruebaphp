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
    <title>Lista de empleados inactivos</title>
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
        <h1 class="mb-4">Lista de empleados Inactivos</h1>
        <a href="index.php?controller=EmployeeController&action=index" class="btn btn-primary mb-4">Activos</a>
        <table class="table table-bordered" id="">
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
                <?php if(!empty($employees)) : ?>
                    <?php foreach ($employees as $employee) : ?>
                        <tr>
                            <td><?= htmlspecialchars($employee['id']); ?></td>
                            <td><?= htmlspecialchars($employee['usuario']) ?></td>
                            <td><?= htmlspecialchars($employee['edad']) ?></td>
                            <td><?= htmlspecialchars($employee['genero']) ?></td>
                            <td><?= htmlspecialchars($employee['correo']) ?></td>
                            <td><?= htmlspecialchars($employee['cargo']) ?></td>
                            <td><?= htmlspecialchars($employee['fecha_creacion']) ?></td>
                            <td>
                                <a href="index.php?controller=EmployeeController&action=reactivate&id=<?= htmlspecialchars($employee['id']); ?>" class="btn btn-success">Reactivar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No se encontraron empleados inactivos</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</body>
</html>