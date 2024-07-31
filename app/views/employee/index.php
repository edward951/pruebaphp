<?php require 'header.php' ?>

<h1 class="mb-4">Empleados</h1>
<a href="/empleado/create" class="btn btn-primary mb-4">Crear nuevo empleado</a>
<table class="table table-bordered">
    <thead class="thead-dark">
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
    <body>
        <?php foreach ($data ['empleados'] as $EmployeeModel); ?>

        <tr>
            <td><?php echo $EmployeeModel['id']; ?></td>
            <td><?php echo $EmployeeModel['nombre']; ?></td>
            <td><?php echo $EmployeeModel['edad']; ?></td>
            <td><?php echo $EmployeeModel['genero']; ?></td>
            <td><?php echo $EmployeeModel['correo']; ?></td>
            <td><?php echo $EmployeeModel['cargo']; ?></td>
            <td><?php echo $EmployeeModel['fecha_creacion']; ?></td>
        
            <td>
                <a href="/employee/edit/ <?php echo $EmployeeModel['id']; ?>" class=" btn btn-warning btn-sm">Editar</a>
                <a href="/employee/delete/ <?php echo $EmployeeModel['id']; ?>" class=" btn btn-danger btn-sm">Eliminar</a>
            </td>
        </tr>
        <!-- <?php  ?> -->
    </body>
</table>

