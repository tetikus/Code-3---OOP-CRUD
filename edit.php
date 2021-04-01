<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>CRUD WITH OOP</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">CRUD WITH OOP</h1>
                <hr style="height:1px; color:black; background-color:black;">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                include 'model.php';
                $model = new Model();
                $id = $_REQUEST['id'];
                $row = $model->edit($id);

                if (isset($_POST['update'])) {
                    if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['genre'])) {
                        if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['genre'])) {

                            $data['id'] = $id;
                            $data['author'] = $_POST['author'];
                            $data['title'] = $_POST['title'];
                            $data['genre'] = $_POST['genre'];

                            $update = $model->update($data);

                            if ($update) {
                                echo "<script>alert('Data Updated Successfully!'); </script>";
                                echo "<script>window.location.href = 'record.php'</script>";
                            } else {
                                echo "<script>alert('Data Update Failed!'); </script>";
                                echo "<script>window.location.href = 'record.php'</script>";
                            }
                        } else {
                            echo "<script>alert('empty'); </script>";
                            header("Location: edit.php?id=$id");
                        }
                    }
                }


                ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Author</label>
                        <input type="text" name="author" value="<?php echo $row['author']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Genre</label>
                        <input type="text" name="genre" value="<?php echo $row['genre']; ?>" class="form-control">
                    </div>
                    <div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>