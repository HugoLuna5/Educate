$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
///admin/cursos-loadTheme


$( "#btnModalMaterial" ).click(function() {
    $URLFormTheme= $('#formLoadThemes').attr('action');
    $URLForm= $('#formLoadSubThemes').attr('action');
    $id_course = $('#id_course').val();

    $.ajax({
        url: $URLFormTheme,
        method: 'POST',
        data: {'id_course':$id_course},
        success:function(data){

            $('#theme_courseMaterial').append(data);


        }

    });

    $.ajax({
        url: $URLForm,
        method: 'POST',
        data: {'id_course':$id_course},
        success:function(data){

            $('#subtheme_course').append(data);


        }

    });



});