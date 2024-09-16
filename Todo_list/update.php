<?php
 

include("./connection.php");
 
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $query = "UPDATE todos SET title = '$title', description = '$description', date = '$date', status = '$status' WHERE id = '$id'";

    if (mysqli_query($GLOBALS["conn"], $query)) {
        echo "Todo item updated successfully.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating todo item: " . mysqli_error($GLOBALS["conn"]);
    }
}


 
 
?>