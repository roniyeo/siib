<?php
    session_start();
    include 'database.php';

    $rid = $_POST['request_id'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $gudang = $_POST['gudang'];
    $barang = $_POST['barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $keperluan = $_POST['keperluan'];

    $update = mysqli_query($conn, "UPDATE `request` SET `gudang_id` = '$gudang', `barang_id` = '$barang', `jumlah_barang` = '$jumlah_barang', `nama_pegawai` = '$nama_pegawai', `tanggal_peminjaman` = '$tanggal_pinjam', `tanggal_pengembalian` = '$tanggal_kembali', `keperluan` = '$keperluan' WHERE `request`.`id` = '$rid'");

    if ($update) {
        header('location:../?p=request');
    }else{
        echo "ERROR";
    }