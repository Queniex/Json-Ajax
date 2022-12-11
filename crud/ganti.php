<?php

include 'koneksi.php';
$nama = $_POST['nama'];
$asal = $_POST['asal'];
$id = $_GET["id_user"];
$sql = "UPDATE datas SET 
        nama_user = '$nama', 
        asal_user = '$asal' 
        WHERE id_user = '$id'";

    if(mysqli_query($conn,$sql)) {
        echo "Berhasil Update Data!";
    } else {
        echo "Error Update Data <br/>" . mysqli_error($conn);
    }

?>