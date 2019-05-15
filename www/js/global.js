$('#checkSubmit').on('click', function()
{
    var name = $('#checkName').val();
    console.log('name is ' + name);
});

$.ajax({
    url: 'process/getUsers.php',
    type: 'POST',
    data: '',
    dataType: 'html',
    success: function(data, textStatus, jqXHR)
    {
        console.log(data);
        /*var jsonObject = JSON.parse(data);

        var table = $('#example1').DataTable({
            "data": jsonObject,
            "columns": [
                {"data": "id"},
                {"data": "name"}
            ],
            "iDisplayLength": 25,
            "order": [[ 1, "desc" ]],
            "paging": true,
            "scrollY": 550,
            "scrollX": true,
            "bDestroy": true,
            "stateSave": true,
            "autoWidth": true,
            "deferRender": true
        });*/
    },
    error: function(jqHHR, textStatus, errorThrown)
    {
        $('#loadingDiv').hide();
        $('#errorModal').modal('show');
        $('.message').text('There was an error conducting your search. Please try again.');
        console.log('fail: '+ errorThrown);
        return false;       
    }
});