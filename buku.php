<!DOCTYPE html>
<html>
    <head>
        <title>Admin Books</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/admin.css" type="text/css">
    </head>

    <body>
        <div class="wrap">
            <div class="kiri">
                <center><img src="pict/awsome.png" width="259" height="75"></center><br>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li><a href="">Users</a></li>
                    <li><a href="">Slides</a></li>
                    <li><a href="">Blogs</a></li>
                    <li><a href="" class="active">Books</a></li>
                    <li><a href="" class="logout">Log Out</a></li>
                </ul>
            </div>

            <div class="search" align="right"><img src="pict/cari.png" class="search"></div>
            <div class="judul">Books</div>
            <div class="kanan" align="right"><a href="create.php"><img src="pict/plus.png"></a></div>
        </div>

        <div class="konten"> 
            <div class="grid-container-book">
                <div class="grid-item-book"><h5>No</h5></div>
                <div class="grid-item-book"><h5>Title</h5></div>
                <div class="grid-item-book"><h5>Author</h5></div>
                <div class="grid-item-book"><h5>Image</h5></div>
                <div class="grid-item-book"><h5>Synopsis</h5></div>
                <div class="grid-item-book"><h5>Release At</h5></div>
                <div class="grid-item-book"><h5>Actions</h5></div>

                <?php
                include "connection.php";

                $batas = 10;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($conn,"SELECT * FROM buku");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $book = mysqli_query($conn,"SELECT * FROM buku LIMIT $halaman_awal, $batas");
                $no = 1;
                while($row = mysqli_fetch_array($book)){
                ?>
                <div class="grid-item-book"><?php echo $row["id"]; ?></div>
                <div class="grid-item-book"><?php echo $row["title"]; ?></div>
                <div class="grid-item-book"><?php echo $row["author"]; ?></div>
                <div class="grid-item-book">
                    <img src="<?php echo $row['image'] ?>" alt="..." class="image-book">
                </div>
                <div class="grid-item-book"><?php echo $row["synopsis"]; ?></div>
                <div class="grid-item-book"><?php echo $row["release_at"]; ?></div>
                <div class="grid-item">
                    <a href="delete.php?id=<?php echo $row['id']; ?>"><img src="pict/bin.png"></a>
                    <a href="update.php?id=<?php echo $row['id']; ?>"><img src="pict/edit.png"></a>
                </div>
                <?php
                }
                $conn->close();
                ?>
            </div>

            <nav>
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" <?php if($halaman > 1){ echo "href='buku.php?halaman=$previous'"; } ?>>Previous</a>
                    </li>
                    <?php 
                    for($x=1;$x<=$total_halaman;$x++){
                        ?> 
                        <li class="page-item"><a class="page-link" href="buku.php?halaman="><?php echo $x; ?></a></li>
                        <?php
                    }
                    ?>				
                    <li class="page-item">
                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='buku.php?halaman=$next'"; } ?>>Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="notif">
            <div class="window">
                <a href="#" class="close-button" title="close">X</a>
                <h2>Notification</h2>
            </div>
        </div>
    </body>
</html>