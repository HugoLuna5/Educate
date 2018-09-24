$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#seachBarCourse").keyup(function() {


    $URLForm= $('#formSearchCourse').attr('action');

    $searchResult = $('#searchResultsCourse');
    $searchBar = $('#seachBarCourse').val();
    if ($searchBar != ""){

        //$('#searchResults')

        $.ajax({
            url: $URLForm,
            method: 'POST',
            data: {'search':$searchBar},
            success:function(data){

                $('#searchResultsCourse').html(data);

            }

        });



        $("#searchResultsCourse").show().width($("#formSearchCourse").width());
        $("#containerCourses").hide();

    }else {
        $("#searchResultsCourse").hide();
        $("#containerCourses").show();
    }

});



