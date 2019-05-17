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
                    {
                        "data": "",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol)
                        {
                            $(nTd).html("<a href='#' id='editLink' data-uid='"+oData.id+"' data-name='"+oData.name+"'><i class='fas fa-edit'></i></a>");
                        }
                    },
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

$('#example1').on('click', 'tr > td > a#editLink', function(e)
{
    e.preventDefault();
    var $dataTable = $('#example1').DataTable();
    var tr = $(this).closest('tr');
    var data = $dataTable.rows().data();
    var rowData = data[tr.index()];

    $('#editFNameError').hide();

    var editUID = rowData.id;
    var editName = rowData.name;

    $('#editUID').val(editUID);
    $('#editFirstName').val(editName);

    $('#editModal').modal('show');
});

$('#editUserSubmit').on('click', function()
{
    var editCriteria = {
        editUID: $('#editUID').val(),
        editFirstName: $('#editFirstName').val()
    }

    if(editCriteria.editFirstName == "")
    {
        $('#editFNameError').show();
        return false;
    }
    else
    {
        $.post('process/editUser.php', {editCriteria:editCriteria}, function(data)
        {
           console.log(data); 
        });
    }
});