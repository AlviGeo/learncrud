<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index of Author</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <?php include "./layout/navbar.php"; ?>

    <div class="container mt-4 ">
        <a href="./author/add_author.php" name="add_author" type="button" class="btn btn-success text-dark">Add Author</a>
        <a href="../author/edit_author.php" name="edit_author" type="button" class="btn btn-warning" disabled>Edit Author</a>
        <a href="#" name="delete_author" type="button" class="btn btn-danger" disabled>Delete Author</a>
        <a href="#" name="view_author" type="button" class="btn btn-info" disabled>View Author</a>
    </div>
    <br>

    <h3 class="mt-4">Authors Table</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php
        include "../library/process.php";
        $no = 1;
        ($row = mysqli_query($mysqli, "SELECT * FROM author"))
            or die(mysqli_error($mysqli));
        while ($result = $row->fetch_assoc()) :
        ?>
            <tr>
                <tbody>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['address']; ?></td>
                    <td><?php echo $result['phone']; ?></td>
                    <td>
                        <a href="./author/edit_author.php?edit=<?php echo $result['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="../model/query_author.php?delete=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tbody>
            </tr>

        <?php endwhile; ?>

    </table>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>