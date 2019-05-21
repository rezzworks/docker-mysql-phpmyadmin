<?php
    include("../include/database.php");

    $query = "SELECT '', id, `firstName`, `lastName` From Person";

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

    $conn->close();    
?>