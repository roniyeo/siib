<?php
    session_start();
    include 'database.php';

    $gid = $_POST['gudang_id'];
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi = $_POST['lokasi'];

    $update = mysqli_query($conn, "UPDATE `warehouse` SET `nama_gudang` = '$nama_gudang', `lokasi` = '$lokasi' WHERE `warehouse`.`id` = '$gid'");
    if ($update) {
        header("location:../?p=gudang");
    }else{
        echo "ERROR";
    }