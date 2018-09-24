$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('#avatarInput').change(function () {

    $urlFile = $('#avatarInput').val();

    var formData = new FormData();
    formData.append('photo', $('#avatarInput')[0].files[0]);
    $avatarURL = $('#avatarForm').attr('action');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $avatarURL,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false

    }).done(function (data) {
        if (data.success)
            console.log(data.file_name);
        $('#avatarImage').attr('src', '/my/photo/' + data.file_name + '?' + new Date().getTime());
    }).fail(function () {
            alert('la imagen no tiene formato correcto');
        });


});

