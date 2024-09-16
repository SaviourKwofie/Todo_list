<?php

include("./connection.php");
 
$title = $_POST["title"];
$description = $_POST["description"];
$date = $_POST["date"];

$query = "INSERT INTO todos(title,description,date) VALUES('$title','$description','$date')"; 

if (mysqli_query($conn, $query)) {
    header("Location: index.php?success=Task added successfully");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>


 