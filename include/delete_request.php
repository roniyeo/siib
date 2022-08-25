<?php
    session_start();
    include 'database.php';

    $rid = $_GET['id'];

    mysqli_query($conn, "DELETE FROM `request` WHERE `request`.`id` = '$rid'");
    header('location:../?p=request');