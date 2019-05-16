<?php
    include("../include/database.php");

    $query = "SELECT '', id, `name` From Person";

    if($result = $conn->query($query))
    {
        $out = array();
        while($row = $result->fetch_assoc())
        {
            $out[] = $row;
        }
        echo json_encode($out);
        $result->free();
    }

    /*$result = mysqli_query($conn, $query);

    $out = array(); 
    while($row = $query->fetch_assoc())
    {
        $out[] = $row;
    }
    echo json_encode($out);

    # close connection*/
    $conn->close();    
?>