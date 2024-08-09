<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Empleado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear empleado</h1>
    <form action="index.php?controller=EmployeeController&action=creation" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="genero">Género:</label>
            <select name="genero" id="genero" class="form-control" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cargo">Cargo:</label>
            <input type="text" name="cargo" id="cargo" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="fecha_creacion">Fecha de Creación:</label>
        <input type="datetime-local" name="fecha_creacion" id="fecha_creacion">
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
    <a href="/index.php?controller=EmployeeController&action=index" class="btn btn-secondary mt-3">Volver</a>
</div>
</body>
</html>