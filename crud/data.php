<?php

include 'koneksi.php';
// global $conn;
$query =  "SELECT * FROM datas";
$result = mysqli_query($conn, $query);
    if( mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_assoc($result)) {
            $link_delete = "<a class = 'Hapus text-red-300 hover:text-red-500' href='hapus.php?id_user=" . $row['id_user'] ."'> Delete </a>";
            $link_update = "<a class = 'Update text-blue-300 hover:text-blue-500 cursor-pointer' href='ganti.php?id_user=" . $row['id_user'] ."' nama='" . $row['nama_user'] ."' asal ='" . $row['asal_user'] ."' > Update </a>";
            echo " - " . $row['nama_user'] . ", berasal dari " . $row['asal_user'] . ". | $link_update | $link_delete <br>";
        }
    }

?>