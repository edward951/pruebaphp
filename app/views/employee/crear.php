<?php require 'header.php' ?>

<h1 class="mb-4">Crear empleados</h1>
 <form method="post" action="/employee/creation">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-group" required>
    </div>
    <div class="form-group">
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad" class="form-group" required>
    </div>

    <div class="form-group">
        <label for="genero">Género</label>
        <input type="text" name="genero" id="genero" class="form-group" required>
    </div>
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo" class="form-group" required>
    </div>
    <div class="form-group">
        <label for="cargo">Cargo</label>
        <input type="text" name="cargo" id="cargo" class="form-group" required>
    </div>
    <div class="form-group">
        <label for="fechaCreacion">Fecha creación</label>
        <input type="date" name="fechaCreacion" id="fechaCreacion" class="form-group" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
 </form>