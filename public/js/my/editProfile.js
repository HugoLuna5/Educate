$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



$urlFile = $('#avatarInput').val();


$URLForm= $('#formMy').attr('action');



$('#btnSaveChanges').click(function () {


    $username = $('#username').val();
    $name = $('#name').val();
    $ocupacion = $('#ocupacion').val();
    $fb = $('#fb').val();
    $tw = $('#tw').val();
    $bio = $('#bio').val();
    $correo = $('#correo').val();
    $contra = $('#contra').val();


    $.ajax({
        url: $URLForm,
        method: 'POST',
        data: {'username':$username,'name':$name,'ocupacion':$ocupacion,'fb':$fb,'tw':$tw,'bio':$bio,'correo':$correo,'contra':$contra},
        dataType: 'JSON'

    }).done(function (data) {
        if (data.success)

            swal({
                title: "¡Buen trabajo!",
                text: "Se actualizo tu informacion",
                icon: "success",
            });


    }).fail(function () {
        swal({
            title: "¡Upss algo salio mal :c!",
            text: "No se pudo actualizar tu foto información",
            icon: "danger",
        });
    });


});


