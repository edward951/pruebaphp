<?php require 'header.php' ?>

<h1 class="mb-4">Editar empleados</h1>

<form method="post" action="/employee/update <?php echo $data['employee']['id']; ?>" >
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['employee']['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nombre">Edad</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['employee']['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nombre">Género</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['employee']['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nombre">Correo</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['employee']['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nombre">Cargo</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['employee']['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nombre">Fecha creación</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['employee']['name']; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>