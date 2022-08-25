<?php
    session_start();
    include 'database.php';

    $uid = $_GET['id'];

    mysqli_query($conn, "delete from users where id = '$uid'");
    header('location:../?p=pegawai');