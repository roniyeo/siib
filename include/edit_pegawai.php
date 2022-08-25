<?php
    session_start();
    include 'database.php';

    $uid = $_POST['user_id'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $role = $_POST['role'];

    $update = mysqli_query($conn, "UPDATE `users` SET `nama_pegawai` = '$nama_pegawai', `role` = '$role' WHERE `users`.`id` = '$uid'");
    if ($update) {
        header("location:../?p=pegawai");
    }else{
        echo "ERROR";
    }