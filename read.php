<?php
include "connection.php";

$sql = "SELECT * FROM buku";
$result =  $conn->query($sql);

if($result->num_rows > 0){
    $i=0;
    while($row[$i] = $result->fetch_assoc()){
        $i++;
    }
};
$array = array_filter($row);
echo json_encode($array);
?>