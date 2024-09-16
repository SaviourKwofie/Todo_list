<?php
include("./connection.php");
function getAllData() {
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    try {
        $query = "SELECT * FROM todos WHERE isSoftDeleted = 0";
        $result = mysqli_query($GLOBALS["conn"],$query);    
       
        return $result;
 

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

 
function getSoftDeletedData() {
    try {
        $query = "SELECT * FROM todos WHERE isSoftDeleted = 1";
        $result = mysqli_query($GLOBALS["conn"],$query);    
       
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function updateTaskStatuses() {
    $today = date('Y-m-d');
    $query = "SELECT id, date, status FROM todos WHERE isSoftDeleted = 0";
    $result = mysqli_query($GLOBALS['conn'], $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $taskId = $row['id'];
        $taskDate = $row['date'];
        $currentStatus = $row['status'];

        if ($currentStatus !== 'Completed') {
            if ($taskDate < $today && $currentStatus !== 'Inprogress') {
                $newStatus = 'Incomplete';
            } elseif ($taskDate == $today) {
                $newStatus = 'Inprogress';
            } else {
                $newStatus = 'Pending';
            }

            if ($newStatus !== $currentStatus) {
                $updateQuery = "UPDATE todos SET status = '$newStatus' WHERE id = $taskId";
                mysqli_query($GLOBALS['conn'], $updateQuery);
            }
        }
    }
}

?>
 

