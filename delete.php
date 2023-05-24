<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = $conn->prepare("DELETE FROM buku WHERE id=?");
    $sql->bind_param('i', $id);
    $sql->execute();
    if ($sql) {
        // echo json_encode(array('RESPONSE' => 'SUCCESS'));
        header("location: buku.php");
    } else {
        echo json_encode(array('RESPONSE' => 'FAILED'));
    }
} else {
    echo "GAGAL";
}
?>