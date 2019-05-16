<?php
    include("../include/database.php");

    if(isset($_POST['addName']))
    {
        $addName = $_POST['addName'];

        $insert = "INSERT INTO Person (id, `name`) VALUES ('4', 'KAREN')";

        if($conn->query($insert) === TRUE)
        {
            echo "Success: New record created successfully";
        }
        else
        {
            echo "Error: " . $insert . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>