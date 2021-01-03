<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Author</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <?php include "./author/query_author.php"; ?>
    <div class="container mt-4">
        <?php if (isset($_SESSION['message'])) : ?>
            <div id="message">
                <div class="<?= $_SESSION['type']; ?>success alert-dismissible fade show" role="alert">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
        <!-- TABLE -->
        <a href="./author/add_author.php" class="btn btn-success">Add New Author</a>
        <a href="./index_book.php" class="btn btn-warning">Book Page</a>
        <br><br>


        <table class="table">

            <?php include "./alert.php"; ?>
            <thead class="thead-dark">
                <tr>
                    <th>Author ID</th>
                    <th>Author Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Photo</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "./process.php";
                ($list = mysqli_query($mysqli, "SELECT * FROM author"))
                    or die(mysqli_error($mysqli));
                while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['photo']; ?></td>
                        <td><a href="./author/edit_author.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="./author/query_author.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Do You Want to Delete This?');" class="btn btn-danger">Delete</a>
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