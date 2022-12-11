<?php

include 'koneksi.php';

    if(isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $asal = $_POST['asal'];
        $sql = "INSERT INTO datas VALUES ('', '$nama', '$asal')";
        if(mysqli_query($conn,$sql)) {
            echo "Berhasil Memasukkan Data!";
        } else {
            echo "Error Memasukkan Data <br/>" . mysqli_error($conn);
        }
    }

?>