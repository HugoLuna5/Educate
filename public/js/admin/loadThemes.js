$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
///admin/cursos-loadTheme


$( "#btnModalSubTheme" ).click(function() {
    $URLForm= $('#formLoadThemes').attr('action');
    $id_course = $('#id_course').val();

    $.ajax({
        url: $URLForm,
        method: 'POST',
        data: {'id_course':$id_course},
        success:function(data){

            $('#theme_course').append(data);


        }

    });



});