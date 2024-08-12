<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar empleado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar empleado</h1>
    <form action="index.php?controller=EmployeeController&action=update&id=<?php echo $employee['id']; ?>" method="POST">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $employee['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="name">Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo $employee['apellido']; ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Edad:</label>
            <input type="number" name="edad" class="form-control" value="<?php echo $employee['edad']; ?>" required>
        </div>
        <div class="form-group">
            <label for="gender">Género:</label>
            <select name="genero" class="form-control" required>
                <option value="Masculino" <?php if ($employee['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                <option value="Femenino" <?php if ($employee['genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" name="correo" class="form-control" value="<?php echo $employee['correo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="position">Cargo:</label>
            <input type="text" name="cargo" class="form-control" value="<?php echo $employee['cargo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="stade">Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="1" <?php if ($employee['estado'] == 'Activo') echo 'selected'; ?>>Activo</option>
                <option value="2" <?php if ($employee['estado'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
                <option value="3" <?php if ($employee['estado'] == 'Suspendido') echo 'selected'; ?>>Suspendido</option>
                <option value="4" <?php if ($employee['estado'] == 'Retirado') echo 'selected'; ?>>Retirado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <a href="/index.php?controller=EmployeeController&action=index" class="btn btn-secondary mt-3">Volver</a>
</div>
</body>
</html>