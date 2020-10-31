<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Edit Author Pisah</title>
</head>

<body>
    <?php
    require_once '../../model/query_author';
    $id = $_GET['edit'];
    $data = mysqli_query($mysqli, "SELECT * FROM author WHERE id = '$id'");
    while ($menu = $data->fetch_assoc()) :
    ?>

        <div class="container">
            <?php if (isset($_SESSION['msg'])) : ?>
                <div class="alert <?= $_SESSION['msg_type']; ?>">
                    <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Edit Data</h2>
                    <form action="../model/query.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $menu['id']; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $menu['nama']; ?>" placeholder="Edit Author Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $menu['alamat']; ?>" $placeholder="Edit Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="text" class="form-control" name="no_hp" value="<?php echo $menu['no_hp']; ?>" placeholder="Edit Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo</label>
                            <input type="text" class="form-control" name="foto" value="<?php echo $menu['foto']; ?>" placeholder="Edit Photo">
                        </div>
                        <button type="submit" name="update_author" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
            </form>
        </div>
        </div>
    <?php endwhile; ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>