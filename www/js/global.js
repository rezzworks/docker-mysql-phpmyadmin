displayRecords();

function displayRecords()
{
    $.ajax({
        url: 'process/getUsers.php',
        type: 'POST',
        data: '',
        dataType: 'html',
        success: function(data, textStatus, jqXHR)
        {
            var jsonObject = JSON.parse(data);

            var table = $('#example1').DataTable({
                "data": jsonObject,
                "columns": [
                    {"data": ""},
                    {"data": "id"},
                    {"data": "name"}
                ],
                "iDisplayLength": 25,
                "order": [[ 1, "desc" ]],
                "paging": true,
                "scrollY": 550,
                /*"scrollX": true,*/
                "bDestroy": true,
                "stateSave": true,
                "autoWidth": true,
                "deferRender": true
            });
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
}

$('#addNew').on('click', function()
{
    $('#addNewModal').modal('show');
});

$('#addNewSubmit').on('click', function()
{
    var addName = $('#addName').val();

    $.post('process/editUser.php', {addName:addName}, function(data)
    {
        console.log(data);
    });
});