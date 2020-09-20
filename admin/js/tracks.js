$(document).ready(function(){
    console.log('Funciona');
    fetchAdmin();
    Getid();

    // Inicio de variale para edit en falso
    let edit = false;


    $("#form-track").submit(function(e) {
        
        const formData = {
            name_track: $("#name_track").val(),
            idtrack: $("#idtrack").val(),
            mileage: $("#mileage").val(),
            id: $('#datoID').val()
        }

        let url = edit === false ? './server/tracks/insert_admin.php' : './server/tracks/edit_admin.php';
        
        $.post(url, formData, function(resp){
            const ui = new UI();
            fetchAdmin();
            Getid();
            ui.showMessage(resp, 'secondary');
    
            $('#form-track').trigger('reset');
        });

        e.preventDefault();
    })

    // Obtner solo el ultmino id
    function Getid(){
        $.ajax({
            url: './server/tracks/get_id.php',
            type: 'GET',
            success: function(resp) {
                let datas = JSON.parse(resp);
                let temp = '';
                datas.forEach(data => {
                    temp += `
                        <p>${data.id_date}</p>

                    `
                });
                $("#id-track").html(temp);
            }
        })
    }
    //


    function fetchAdmin(){
        $.ajax({
            url: './server/tracks/get_admin.php',
            type: 'GET',
            success: function(resp) {
                let registers = JSON.parse(resp);
                let template = '';
                registers.forEach(register => {
                    template += `
                        <tr datoID=${register.id_track}>
                            <td>${register.id_track}</td>
                            <td>${register.name_track}</td>
                            <td>${register.mileage}</td>
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
                $("#list_tracks").html(template);
            }
        })
    }


    // Eliminar una registro
    $(document).on('click', '.delete', function(e) {
        if(confirm('¿Deseas continuar con la acción?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('datoID');
            $.post('./server/tracks/destroy.php', {id}, function(resp) {
                const ui = new UI();
                ui.showMessage(resp, 'success');
                fetchAdmin();
                Getid();
            });
        }
        e.preventDefault();
    });
    
    //Editar un registro
    $(document).on('click', '.edit', function(e) {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('datoID');

        $.post('./server/tracks/update_admin.php', {id}, function(res) {
            const content = JSON.parse(res);
            $('#name_track').val(content.name_track);
            $('#mileage').val(content.mileage);
            $('#idtrack').val(content.idtrack);
            $('#datoID').val(content.idtrack);
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
  