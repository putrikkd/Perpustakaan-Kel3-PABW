<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/createbook.css" type="text/css">
    </head>

    <body>
        <?php
        include "connection.php";
        $id = $_GET['id'];
        $data = mysqli_query($conn,"SELECT * FROM buku WHERE id='$id'");
        while($d = mysqli_fetch_array($data)){
        ?>

        <div class="popup" id="popup">
            <form action="" method="POST">
                <img src="pict/logo.png" class="logo">
                <center><h1>Update Book</h1></center>
                <div class="form-group">
                    <input type="text" name="title" class="form-control" value="<?php echo $d["title"];?>">
                </div>
                <div class="form-group">
                    <input type="text" name="author" class="form-control" value="<?php echo $d["author"];?>">
                </div>
                <div class="group">
                    <label>Image</label><input type="file" name="image" class="form-control" value="<?php echo $d["image"];?>">
                </div>
                <div class="form-group">
                    <textarea type="text" name="synopsis" class="form-control" value="<?php echo $d["synopsis"];?>"></textarea>
                </div>
                <div class="group">
                    <label class="date">Release At</label><input type="date" name="release_at" class="form-control" value="<?php echo $d["release_at"];?>">
                </div>
                <div class="button">
                    <button type="button" class="close"><a href="buku.php">Close</a></button>
                    <input type="submit" class="post" name="simpan" value="Post">
                </div>
            </form>
        </div>

        <?php
        }

        if (isset($_POST['simpan'])) {
            $title   	= $_POST['title'];
            $author 	= $_POST['author'];
            $image 		= $_POST['image'];
            $synopsis 	= $_POST['synopsis'];
            $release_at = $_POST['release_at'];

            $sql = "UPDATE buku SET title='$title', author='$author', image='$image', synopsis='$synopsis', release_at='$release_at' WHERE id=$id";
            
            if ($conn->query($sql) === TRUE){
                echo "<br>" . "New record created successfully";
            } else {
                echo "error: ".$sql. "<br>". $conn->error;
            }
            $conn->close();
            header("Location: buku.php");
        }
        ?>
    </body>
</html>
