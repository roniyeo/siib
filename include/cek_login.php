<?php
    session_start();
    include 'database.php';

    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $sql = mysqli_query($conn, "select * from users where username='$username' and password='$password'");
    $cek = mysqli_num_rows($sql);

    if ($cek > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['fullname'] = $row['nama_pegawai'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $row['role'];
        $_SESSION['status'] = 'login';
        header('location:../index.php');
    }else{
        echo "<script>alert('Username dan Password salah'); window.location.href = '../login.php';</script>";
    }