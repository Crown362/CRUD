<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CRUD Application</h1>
        <!-- Your PHP code for displaying records -->
        <?php 
        $sql = "SELECT * FROM items";
        $result = $conn->query($sql);
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <!-- Loop through your data and display it -->
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><a href='update.php?id=<?php echo $row["id"]; ?>'>Edit</a></td>
                        <td><a href='delete.php?id=<?php echo $row["id"]; ?>'>Delete</a></td>
                    </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            ?>
        </table>
        <a href="create.php" class="button">Create New Record</a>
    </div>
</body>
</html>
