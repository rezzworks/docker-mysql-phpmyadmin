<?php
    include("../include/database.php");

    $query = 'SELECT `id`, `name` From Person';
    $result = mysqli_query($conn, $query);

    $out = array(); 
    while($row = $query->fetch_assoc())
    {
        $out[] = $row;
    }
    echo json_encode($out);

    # close connection
    $dbc->close();    
?>