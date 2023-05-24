<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create Book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/createbook.css" type="text/css">
    </head>

    <body>
        <div class="popup" id="popup">
            <form action="" method="POST">
                <img src="pict/logo.png" class="logo">
                <center><h1>Create Book</h1></center>
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <input type="text" name="author" class="form-control" placeholder="Author">
                </div>
                <div class="group">
                    <label>Image</label><input type="file" name="image" class="form-control" placeholder="Image">
                </div>
                <div class="form-group">
                    <textarea type="text" name="synopsis" class="form-control" placeholder="Synopsis"></textarea>
                </div>
                <div class="group">
                    <label class="date">Release At</label><input type="date" name="release_at" class="form-control" placeholder="Release At">
                </div>
                <div class="button">
                    <button type="button" class="close"><a href="buku.php">Close</a></button>
                    <input type="submit" class="post" name="simpan" value="Post">
                </div>
            </form>
        </div>
        
        <?php
        if(isset($_POST["simpan"])){
            include "connection.php";

            $title = $_POST["title"];
            $author = $_POST["author"];
            $image = $_POST["image"];
            $synopsis = $_POST["synopsis"];
            $release_at = $_POST["release_at"];


            $sql="INSERT into buku value(' ', '$title','$author','$image','$synopsis','$release_at')";

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