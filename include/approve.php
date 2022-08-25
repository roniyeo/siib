<?php
    session_start();
    include 'database.php';
    $user_id = $_SESSION['user_id'];
    $request_id = $_GET['id'];

    mysqli_query($conn, "UPDATE `request` SET `status_approved` = 'Approved', `approved_id` = '$user_id' WHERE `request`.`id` = '$request_id'");

    $data = mysqli_query($conn, "select * from request left join barang on request.barang_id = barang.id where request.id = '$request_id'");
    $row = mysqli_fetch_assoc($data);

    $nama_pegawai = $row['nama_pegawai'];
    $nama_barang = $row['nama_barang'];
    $tanggal_kembali = $row['tanggal_pengembalian'];
    $status_approved = $row['status_approved'];

    mysqli_query($conn, "INSERT INTO `pengembalian` (`id`, `request_id`, `nama_pegawai`, `nama_barang`, `tanggal_pengembalian`, `status_approved`, `created_at`, `updated_at`) VALUES (NULL, '$request_id', '$nama_pegawai', '$nama_barang', '$tanggal_kembali', '$status_approved', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
    
    header('location:../?p=request');