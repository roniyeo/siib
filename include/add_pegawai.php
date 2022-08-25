<?php
    session_start();
    include 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    $sql = mysqli_query($conn, "INSERT INTO `users` (`id`, `username`, `password`, `nama_pegawai`, `email`, `role`, `created_at`) VALUES (NULL, '$username', MD5('$password'), '$nama_pegawai', '$email', '$role', CURRENT_TIMESTAMP)");

    if ($sql) {
        echo "<script>alert('Tambah Pegawai Berhasil'); window.location.href = '../?p=pegawai';</script>";
    }else{
        echo "<script>alert('Tambah Pegawai Gagal'); window.location.href = '../?p=tambah_pegawai';</script>";
    }