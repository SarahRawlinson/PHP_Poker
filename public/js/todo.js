$(document).ready(function($){
    //----- Open model CREATE -----//
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    });
    // CREATE
    $("#btn-save").click(function (e) {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
            }
        });
        e.preventDefault();
        let formData = {
            title: $('#title').val(),
            description: $('#description').val(),
        };
        let state = $('#btn-save').val();
        let type = "POST";
        let todo_id = $('#todo_id').val();
        let ajaxurl = 'todo';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

                let todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.description + '</td>';

                if (state == "add") {
                    let message = $('#server-message');
                    message.text('');
                    message.hide();
                    $("#table-list-todo").find('tbody').append(todo);
                } else {
                    $("#todo" + todo_id).replaceWith(todo);
                }
                $('#myForm').trigger("reset");
                $('#formModal').modal('hide')
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
