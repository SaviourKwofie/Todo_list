 <?php
include("./connection.php");
include("./helpers.php");
$data = getAllData();
$rowNo = 0;
// Update task statuses automatically
updateTaskStatuses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Todo List</title>
</head>
<body>
    <h1><b><i><u>SGMA To Do List</u></i></b></h1>
    <a href="/todo_list/todo-form.html"><i class="fas fa-plus"></i><i><b>Create Todo</b></i></a><br><br>
    <a href="/todo_list/trash.php"><i class="fas fa-trash"></i><i><b>Trash</b></i></a>

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
                    <td><?php echo $rowNo +=1 ?></td>
                    <td><?php echo $row["title"] ?></td>
                    <td><?php echo $row["description"] ?></td>
                    <td>
                         
                        <?php echo ($row["status"]) ?>
                         
                    </td>
                    <td><?php echo $row["date"] ?></td>
                    <td>
                        <a href="/todo_list/delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this task?');">
                            <button type="button" class="delete">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </a>

                        <a href="/todo_list/edit.php?id=<?php echo $row['id'] ?>">
                            <button type="button">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        new DataTable('#example');
    </script>

    <!-- Feedback alert after successful operation -->
    <?php if (isset($_GET['success'])) { ?>
        <script>
            alert("<?php echo htmlspecialchars($_GET['success']); ?>");
        </script>
    <?php } ?>

</body>
</html>