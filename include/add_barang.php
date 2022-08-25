<?php
    session_start();
    include 'database.php';

    $nama_barang = $_POST['nama_barang'];
    $lokasi = $_POST['lokasi_gudang'];
    $jumlah = $_POST['jumlah_barang'];
    $foto_barang = $_FILES['foto_barang']['name'];

    if ($foto_barang != "") {
        $ekstensi_diperbolehkan = array('png','jpg');
        $x = explode('.', $foto_barang);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_barang']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$foto_barang;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../foto/barang/'.$nama_gambar_baru);
            $sql = mysqli_query($conn, "INSERT INTO `barang` (`id`, `gudang_id`, `nama_barang`, `jumlah_barang`, `foto_barang`, `created_at`, `updated_at`) VALUES (NULL, '$lokasi', '$nama_barang', '$jumlah', '$nama_gambar_baru',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
            if ($sql) {
                echo "<script>alert('Tambah Barang Berhasil'); window.location.href = '../?p=barang';</script>";
            }else{
                echo "<script>alert('Tambah Barang Gagal'); window.location.href = '../?p=tambah_barang';</script>";
            }
        }else{
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.'); window.location.href = '../?p=tambah_barang';</script>";
        }
    }else{
        $sql = mysqli_query($conn, "INSERT INTO `barang` (`id`, `gudang_id`, `nama_barang`, `jumlah_barang`, `foto_barang`, `created_at`, `updated_at`) VALUES (NULL, '$lokasi', '$nama_barang', '$jumlah', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");

        if ($sql) {
            echo "<script>alert('Tambah Barang Berhasil'); window.location.href = '../?p=barang';</script>";
        }else{
            echo "<script>alert('Tambah Barang Gagal'); window.location.href = '../?p=tambah_barang';</script>";
        }
    }
    