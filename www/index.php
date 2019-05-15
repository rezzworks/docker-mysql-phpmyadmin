<!-- put in ./www directory -->

<html>
 <head>
  <title>Docker with PHP & MySQL</title>
  <meta charset="utf-8" /> 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
</head>
<body>
    <div class="container">
    <?php echo "<h1>Docker with PHP & MySQL</h1>"; ?>

    <?php
    $conn = mysqli_connect('db', 'user', 'test', "myDb");
    $query = 'SELECT * From Person';
    $result = mysqli_query($conn, $query);
    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    $result->close();
    mysqli_close($conn);
    ?>

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
            <input type="text" class="form-control" id="checkName" placeholer="enter name" />
            </div>
            <div class="col-lg-3">
            <button type="button" class="btn btn-primary btn-flat" id="checkSubmit">Submit</button>
            </div>
        </div>
        <div class="row">
 
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="js/global.js" type="text/javascript"></script>
</body>
</html>