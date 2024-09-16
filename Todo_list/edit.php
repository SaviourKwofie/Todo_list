<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php

include("./connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM todos WHERE id = $id";
    $result = mysqli_query($GLOBALS["conn"], $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <div>
            <form id="add-task-form" method="POST" action="update.php">

                <input type="text" name="title" value="<?php echo $row['title']  ?>" placeholder="Task title" required>
                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                <input type="text" name="description" value="<?php echo $row['description']  ?>" placeholder="Task description" required>
                <input type="date" value="<?php echo $row['date'] ?>" name="date" required>
                <select name="status" id="">
                    <option <?php echo $row['status'] == 'Completed' ? 'selected' : ''; ?> value="completed">Completed</option>
                    <option <?php echo $row['status'] == 'Incomplete' ? 'selected' : ''; ?> value="incomplete">Incomplete</option>
                  
                </select>
                <button type="submit">Update Task</button>

            </form>

        </div>

<?php
    } else {
        echo "Todo item not found.";
    }
}


?>