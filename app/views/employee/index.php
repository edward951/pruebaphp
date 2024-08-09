<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de empleados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Lista de empleados</h1>
    <a href="index.php?controller=EmployeeController&action=create" class="btn btn-primary mb-4">Crear empleado</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Correo</th>
                <th>Cargo</th>
                <th>Fecha creación</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($employees) && is_array($employees)) : ?>
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($employee['id']); ?></td>
                        <td><?php echo htmlspecialchars($employee['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($employee['edad']); ?></td>
                        <td><?php echo htmlspecialchars($employee['genero']); ?></td>
                        <td><?php echo htmlspecialchars($employee['correo']); ?></td>
                        <td><?php echo htmlspecialchars($employee['cargo']); ?></td>
                        <td><?php echo htmlspecialchars($employee['fecha_creacion']); ?></td>
                        <td>
                            <a href="index.php?controller=EmployeeController&action=edit&id=<?php echo htmlspecialchars($employee['id']); ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controller=EmployeeController&action=delete&id=<?php echo htmlspecialchars($employee['id']); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">No se encontraron empleados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
