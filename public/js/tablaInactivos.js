document.addEventListener("DOMContentLoaded", function () {

    function loadEmployee() {
        fetch('index.php?controller=EmployeeController&action=getEmployeesJson')
            .then(response => response.json())
            .then(employees => {
                const tbody = document.querySelector('#tablaInactivos tbody');
                tbody.innerHTML = '';

                if (employees.length > 0) {
                    employees.forEach(employee => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                    
                        <td>${employee.id}</td>
                        <td>${employee.usuario}</td>
                        <td>${employee.edad}</td>
                        <td>${employee.genero}</td>
                        <td>${employee.correo}</td>
                        <td>${employee.cargo}</td>
                        <td>${employee.fecha_creacion}</td>
                        <td>
                        <a href="index.php?controller=EmployeeController&action=edit&id=${employee.id}" class="btn btn-warning">Editar</a>
                        <a href="index.php?controller=EmployeeController&action=delete&id=${employee.id}" class="btn btn-danger">Eliminar</a>
                        </td>
                    `;
                        tbody.appendChild(row);
                    });
                } else {
                    const row = document.createElement('tr');
                    row.innerHTML = '<td colspan="8"> No se encontraron empleados.</td>';
                    tbody.appendChild(row);
                }
            })
            .catch(error => {
                console.error('Error  cargando empleados', error);
            });
    }
    loadEmployee();
})