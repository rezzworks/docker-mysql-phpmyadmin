<?php
    include("../include/database.php");

    if(isset($_POST['addcriteria']))
    {
        $value = $_POST['addcriteria'];
        $addFirstName = $value['addFirstName'];
        $addLastName = $value['addLastName'];

        $select = "SELECT max(id) + 1 AS `NEW_ID` FROM Person";
        $result = $conn->query($select);

        $row = $result->fetch_assoc();
        $newid = $row["NEW_ID"];

        $insert = "INSERT INTO Person (id, `firstName`, `lastName`) VALUES ('$newid', '$addFirstName', '$addLastName')";

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
        $editLastName = $value['editLastName'];

        $update = "UPDATE Person SET `firstName` = '$editFirstName', `lastName` = '$editLastName' WHERE id = '$editUID'";

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

    if(isset($_POST['deleteCriteria']))
    {
        $value = $_POST['deleteCriteria'];

        $delUID = $value['delUID'];

        $delete = "DELETE FROM Person WHERE id = '$delUID'";

        if($conn->query($delete) === TRUE)
        {
            echo "Success: Record deleted";
        }
        else
        {
            echo "Error " . $delete . "<br>" . $conn->error;
        }
    }
?>