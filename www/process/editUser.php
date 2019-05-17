<?php
    include("../include/database.php");

    if(isset($_POST['addName']))
    {
        $addName = $_POST['addName'];

        $select = "SELECT max(id) FROM Person";

        

        $insert = "INSERT INTO Person (id, `name`) VALUES ('4', '$addName')";

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

    if(isset($_POST['editCriteria']))
    {
        $value = $_POST['editCriteria'];

        $editUID = $value['editUID'];
        $editFirstName = $value['editFirstName'];

        $update = "UPDATE Person SET `name` = '$editFirstName' WHERE id = '$editUID'";

        if($conn->query($update) === TRUE)
        {
            echo "Success: Record updated";
        }
        else
        {
            echo "Error " . $update . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>