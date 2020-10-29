<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Book CRUD</title>
    <link rel="stylesheet" href="./styles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php include "./book/query_book.php"; ?>

    <!-- TABLE -->
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>Publisher</th>
                    <th>Description</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "./process.php";
                ($list = mysqli_query($mysqli, "SELECT * FROM book")) or
                    die($mysqli->error);
                while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author_id']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href="Edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="Query.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Do You want to delete this?');" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>