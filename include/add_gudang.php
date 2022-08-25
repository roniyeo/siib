<?php
    session_start();
    include 'database.php';

    $nama_gudang = $_POST['nama_gudang'];
    $lokasi = $_POST['lokasi'];

    $sql = mysqli_query($conn, "INSERT INTO `warehouse` (`id`, `nama_gudang`, `lokasi`, `created_at`) VALUES (NULL, '$nama_gudang', '$lokasi', CURRENT_TIMESTAMP)");

    if ($sql) {
        echo "<script>alert('Tambah Gudang Berhasil'); window.location.href = '../?p=gudang';</script>";
    }else{
        echo "<script>alert('Tambah Gudang Gagal'); window.location.href = '../?p=tambah_gudang';</script>";
    }