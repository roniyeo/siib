<?php
    session_start();
    include 'database.php';

    $uid = $_GET['id'];

    mysqli_query($conn, "delete from warehouse where id = '$uid'");
    header('location:../?p=gudang');