<?php
    session_start();
    include 'database.php';

    $user_id = $_SESSION['user_id'];
    $request_id = $_POST['id'];
    $ket_reject = $_POST['ket_reject'];

    mysqli_query($conn, "UPDATE `request` SET `status_approved` = 'Reject', `alasan_reject` = '$ket_reject', `approved_id` = '$user_id' WHERE `request`.`id` = '$request_id'");

    header('location:../?p=request');