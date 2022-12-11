<?php

include 'koneksi.php';

$id = $_GET["id_user"];
$sql = "DELETE FROM datas WHERE id_user = $id";
    if(mysqli_query($conn,$sql)) {
        echo "Berhasil Hapus Data!";
    } else {
        echo "Error Hapus Data <br/>" . mysqli_error($conn);
    }

?>