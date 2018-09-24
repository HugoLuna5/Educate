$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#searchInstructor").keyup(function() {


    $URLForm= $('#formSearchInstructor').attr('action');

    $searchResult = $('#resultsInstructors');
    $searchBar = $('#searchInstructor').val();
    if ($searchBar != ""){

        //$('#searchResults')

        $.ajax({
            url: $URLForm,
            method: 'POST',
            data: {'search':$searchBar},
            success:function(data){

                $('#resultsInstructors').html(data);

            }

        });



        $("#resultsInstructors").show().width($("#formSearchInstructor").width());


    }else {
        $("#resultsInstructors").hide();
    }

});



