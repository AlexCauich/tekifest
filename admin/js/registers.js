$(document).ready(function(){
    console.log('funcwwwion');
    fetchAdmin();

    // Inicio de variale para edit en falso
    let edit = false;


    $("#form-card").submit(function(e) {
        
        const formData = {
            username: $("#username").val(),
            password: $("#password").val(),
            r_pass: $("#r_pass").val(),
            id: $('#datoID').val()
        }

        let url = edit === false ? './server/insert_admin.php' : './server/edit_admin.php';


        if(formData.password != formData.r_pass){
            const ui = new UI();
            ui.showMessage('Las contraseñas no coinciden', 'danger');
        }else {
            $.post(url, formData, function(resp){
                const ui = new UI();
                fetchAdmin();
                ui.showMessage(resp, 'secondary');
        
              $('#form-card').trigger('reset');
            });
        }

        e.preventDefault();
    })


    function fetchAdmin(){
        $.ajax({
            url: './server/get_admin.php',
            type: 'GET',
            success: function(resp) {
                let registers = JSON.parse(resp);
                let template = '';
                registers.forEach(register => {
                    template += `
                        <tr datoID=${register.id_user}>
                            <td>${register.email}</td>
                            <td>${register.password}</td>
                            <td>
                                <button class="delete btn btn-danger btn-sm">
                                    <img src="../Budget/svg/delete.svg" title="Borrar" alt="">
                                </button>
                                <button class="edit btn btn-warning btn-sm">
                                    <img src="../Budget/svg/edit.svg" title="Editar" alt="">
                                </button>
                            </td>
                        </tr>
                    `
                });
                $("#list_users").html(template);
            }
        })
    }


    // Eliminar una registro
    $(document).on('click', '.delete', function(e) {
        if(confirm('¿Deseas continuar con la acción?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('datoID');
            $.post('./server/destroy.php', {id}, function(resp) {
                const ui = new UI();
                ui.showMessage(resp, 'success');
                fetchAdmin();
            });
        }
        e.preventDefault();
    });
    
    //Editar un registro
    $(document).on('click', '.edit', function(e) {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('datoID');

        $.post('./server/update_admin.php', {id}, function(res) {
            const content = JSON.parse(res);
            $('#username').val(content.email);
            $('#password').val(content.password);
            $('#r_pass').val(content.r_pass);
            $('#datoID').val(content.id_user);
            edit = true;
            e.preventDefault()
        }); 
    });

})

class UI {
    showMessage(message, cssClass) {
        const div = document.createElement('div');
        div.className = `alert alert-${cssClass}`;
        div.appendChild(document.createTextNode(message));
  
        //show dom
        const container = document.querySelector('.jumbotron');
        const app = document.querySelector('#App');
        container.insertBefore(div, app);
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 6000);
    }
  }
  