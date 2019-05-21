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
                            $(nTd).html("<a href='#' id='editLink' data-uid='"+oData.id+"' data-name='"+oData.firstName+"'><i class='fas fa-edit'></i></a>  <a href='#' id='delLink' data-deluid='"+oData.id+"' data-delname='"+oData.firstName+"'><i class='fas fa-times'></i></a>");
                        }
                    },
                    {"data": "id"},
                    {"data": "firstName"},
                    {"data": "lastName"}
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
    var addcriteria = {
        addFirstName: $('#addFirstName').val(),
        addLastName: $('#addLastName').val()
    }
    var addName = $('#addName').val();

    $.post('process/editUser.php', {addcriteria:addcriteria}, function(data)
    {
        if(data.indexOf('Error') > 1)
        {
            console.log('Error: ' + data);
        }
        else
        {
            $('#addNewModal').modal('hide');
            displayRecords();
        }
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
    var editFirstName = rowData.firstName;
    var editLastName = rowData.lastName;

    $('#editUID').val(editUID);
    $('#editFirstName').val(editFirstName);
    $('#editLastName').val(editLastName);

    $('#editModal').modal('show');
});

$('#editUserSubmit').on('click', function()
{
    var editCriteria = {
        editUID: $('#editUID').val(),
        editFirstName: $('#editFirstName').val(),
        editLastName: $('#editLastName').val()
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
           if(data.indexOf('Error') > 1)
           {
               console.log('Error: ' + data);
           }
           else
           {
            $('#editModal').modal('hide');
               displayRecords();
           }
        });
    }
});

$('#example1').on('click', 'tr > td > a#delLink', function(e)
{
    e.preventDefault();
    var $dataTable = $('#example1').DataTable();
    var tr = $(this).closest('tr');
    var data = $dataTable.rows().data();
    var rowData = data[tr.index()];

    var delUID = rowData.id;
    var delName = rowData.name;

    $('#delUID').val(delUID);
    $('#delFirstName').val(delName);    
    
    $('#delModal').modal('show');
});

$('#delUserSubmit').on('click', function()
{
    var deleteCriteria = {
        delUID: $('#delUID').val()
    }

    $.post('process/editUser.php', {deleteCriteria:deleteCriteria}, function(data)
    {
        if(data.indexOf('Error') > 1)
        {
            console.log('Error: ' + data);
        }
        else
        {
            $('#delModal').modal('hide');
            displayRecords();
        }
    });
});