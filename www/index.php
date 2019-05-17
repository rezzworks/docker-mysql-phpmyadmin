<!-- put in ./www directory -->

<html>
 <head>
  <title>Docker with PHP & MySQL</title>
  <meta charset="utf-8" /> 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
</head>
<body>
    <div class="container">
    <?php echo "<h1>Docker with PHP & MySQL</h1>"; ?>
    <hr />
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover table-condensed">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>NAME</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
    </div>

    <hr />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            <button type="button" class="btn btn-primary btn-flat" id="addNew">Add New</button>
            </div>
        </div>
    </div>


    <!-- addNewModal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Name</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" id="addNameForm">
            <div class="row">
                <div class="col-lg-4">
                    <label>Add Name</label>
                    <input type="text" class="form-control" id="addName" placeholder="Enter Name" />
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="addNewSubmit">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <!-- editModal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" id="editUserForm">
            <div class="row">
                <div class="col-lg-6">
                    <label>Edit User</label><span class="text-error" id="editFNameError" style="display:none; color:red;"> * field cannot be blank</span>
                    <input type="text" class="form-control" id="editFirstName" placeholder="Enter First Name" />
                    <input type="hidden" id="editUID" />
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="editUserSubmit">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="js/global.js" type="text/javascript"></script>
</body>
</html>