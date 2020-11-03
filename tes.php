    <?php require_once '../../library/process.php';
    $id = $_GET['id'];
    $data = mysqli_query($mysqli, "SELECT * FROM book WHERE id='$id'");
    while ($book = $data->fetch_assoc()) : ?>

    <div class="container mt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style=" padding:25px;">
                    <h5 class="card-title">Edit Book Data Here</h5>
                    <form action="../../Model/Query_book.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" value="<?php echo $book['title']; ?>">
                        </div>
                        <div class=" form-group">
                            <label> Author</label>
                            <select name="author" id="author" class="form-control" >
                                <option disabled selected>Choose Author</option>
                                <?php require_once '../../library/process.php';
                                ($sql = mysqli_query(
                                    $mysqli,
                                    'SELECT * FROM author'
                                )) or die($mysqli->error);
                                while ($author = $sql->fetch_assoc()): ?>
                                    <option value="<?= $author[
                                        'id'
                                    ] ?>"><?= $author['name'] ?></option>
                                <?php endwhile;
                                ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label> Publisher</label>
                            <input type="text" class="form-control" name="publisher" placeholder="Enter publisher" value="<?php echo $book['publisher']; ?>">
                        </div>
                        <div class="form-group">
                            <label> Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Enter book description" value="<?php echo $book['description']; ?>">
                        </div>
                        <div class="form-group">
                            <label> Picture</label>
                            <input type="text" class="form-control" name="picture" placeholder="Enter book picture" value="<?php echo $book['picture']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="update_book">Add new book</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>