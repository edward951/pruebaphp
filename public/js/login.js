$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        let usuario = $('#usuario').val();
        let contrasena = $('#contrasena').val();

        $.ajax({
            type: 'POST',
            url: '?controller=EmployeeController&action=auntheticate',
            data:{
                usuario: usuario,
                contrasena: contrasena
            },
            success: function(response){
                if(response === 'success'){
                    Swal.fire({
                        title: 'Hola!',
                        text: 'Has iniciado sesión correctamente',
                        icon: 'success'
                    }).then(function(){
                        window.location.href = '?controller=EmployeeController&action=index';
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Usuario o contraseña son incorrectas',
                        icon: 'error'
                    }).then(function(){
    
                        window.location.href = '?controller=EmployeeController&action=login';
                    });
                }
            }
        });

    })
});