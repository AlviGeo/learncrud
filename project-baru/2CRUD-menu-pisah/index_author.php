<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Book</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php include "./author/query_author.php"; ?>

    <!-- TABLE -->
    <a href="./author/add_author.php" class="btn btn-danger">Add New Author</a>

    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Author ID</th>
                    <th>Author Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mysqli = new mysqli("localhost", "root", "", "learncrud2") or die(mysqli_error($mysqli));

                ($list = mysqli_query($mysqli, "SELECT * FROM author")) or die(mysqli_error($mysqli));
                while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>''
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><a href="./author/edit_author.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="./author/query_author.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>