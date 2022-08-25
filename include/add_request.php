<?php
    session_start();
    include 'database.php';

    $gudang_id = $_POST['gudang'];
    $barang_id = $_POST['barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $tanggal_request = $_POST['tanggal_request'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $keperluan = $_POST['keperluan'];
    
    $insert = mysqli_query($conn, "INSERT INTO `request` (`id`, `gudang_id`, `barang_id`, `jumlah_barang`, `nama_pegawai`, `tanggal_request`, `tanggal_peminjaman`, `tanggal_pengembalian`, `keperluan`, `status_approved`, `approved_id`, `created_at`, `updated_at`) VALUES (NULL, '$gudang_id', '$barang_id', '$jumlah_barang', '$nama_pegawai', '$tanggal_request', '$tanggal_pinjam', '$tanggal_kembali', '$keperluan', 'Pending', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");

    if ($insert) {
        echo "<script>alert('Request Berhasil'); window.location.href = '../?p=request';</script>";
    }else{
        echo "<script>alert('Request Gagal'); window.location.href = '../?p=form_request';</script>";
    }