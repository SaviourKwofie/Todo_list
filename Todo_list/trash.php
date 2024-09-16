 <?php
include("./connection.php");
include("./helpers.php");
$data = getSoftDeletedData();
$rowNo = 0;
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Trash</title>
</head>
<body>
    <a href="/todo_list"><i class="fas fa-home"></i><b><i>Home</i></b></a>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $rowNo +=1?></td>
                    <td><?php echo $row["title"] ?></td>
                    <td><?php echo $row["description"] ?></td>
                    <td>
                        <?php
                        if ($row["status"] == 'complete') {
                            echo '<i class="fas fa-check-circle text-success"></i> Complete';
                        } else {
                            echo '<i class="fas fa-times-circle text-danger"></i> Incomplete';
                        }
                        ?>
                    </td>
                    <td><?php echo $row["date"] ?></td>
                    <td>
                        <a href="/todo_list/delete.php?deleteId=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this task permanently?');">
                            <button type="button" class="delete">
                                <i class="fas fa-trash-alt"></i> Delete permanently
                            </button>
                        </a>
                        <a href="/todo_list/restore.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Do you want to restore this task?');">
                            <button type="button">
                                <i class="fas fa-undo-alt"></i> Restore
                         
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        new DataTable('#example');
    </script>
</body>

</html>
