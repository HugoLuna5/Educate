$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#searchBar").keyup(function() {


    $URLForm= $('#formSearch').attr('action');

    $searchResult = $('#searchResults');
    $searchBar = $('#searchBar').val();
    if ($searchBar != ""){

        //$('#searchResults')

        $.ajax({
            url: $URLForm,
            method: 'POST',
            data: {'search':$searchBar},
            success:function(data){

                $('#searchResults').html(data);

            }

        });



            $("#searchResults").show().width($("#formSearch").width());


    }else {
        $("#searchResults").hide();
    }

});



