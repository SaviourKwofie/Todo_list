<?php
include("./connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE todos SET isSoftDeleted = 0 WHERE id = $id";
    if (mysqli_query($GLOBALS["conn"], $query)) {
        echo "Todo item restored successfully.";
        header("Location: trash.php");
        exit();
    } else {
        echo "Error restoring todo item: " . mysqli_error($GLOBALS["conn"]);
    }
}
?>
