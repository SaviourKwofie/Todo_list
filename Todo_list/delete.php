
<?php
include("./connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE todos SET isSoftDeleted = 1 WHERE id = $id";
    if (mysqli_query($GLOBALS["conn"], $query)) {
        header("Location: index.php?success=Task moved to trash.");
        exit();
    } else {
        echo "Error deleting todo item: " . mysqli_error($GLOBALS["conn"]);
    }
}
if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    $query = "DELETE FROM todos WHERE id = $id";
    if (mysqli_query($GLOBALS["conn"], $query)) {
        echo "Todo item deleted permanently.";
        header("Location: trash.php");
        exit();
    } else {
        echo "Error deleting todo item: " . mysqli_error($GLOBALS["conn"]);
    }
}

 

?>