<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Author</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./book_index">Book <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../author/author_index">Author</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <a href="add_book.php" class="btn btn-success">Add Book</a>
    </div>

    <h3 class="mt-2">Table Book</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Title Book</th>
                <th>Author ID</th>
                <th>Year</th>
                <th>Photo</th>
                <th>Publisher</th>
                <th>Description</th>
            </tr>
        </thead>
        <?php
        include('../../library/process.php');
        $row = $mysqli->query("SELECT * FROM author JOIN book ON author.id = book.id")
            or die($mysqli->error);

        while ($result = $row->fetch_assoc()) :
        ?>
            <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['title']; ?></td>
                <td><?php echo $result['author_id']; ?></td>
                <td><?php echo $result['year']; ?></td>
                <td><?php echo $result['photo']; ?></td>
                <td><?php echo $result['publisher']; ?></td>
                <td><?php echo $result['description']; ?></td>
                <td>
                    <a href="edit_book.php?edit=<?php echo $result['id']; ?>" class="btn btn-info">Edit </a>
                    <a href="../model/query.php?delete=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>