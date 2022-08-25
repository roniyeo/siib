<?php
    session_start();
    include 'database.php';

    $bid = $_POST['barang_id'];
    $nama_barang = $_POST['nama_barang'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $jumlah_barang = $_POST['jumlah_barang'];
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
            $query  = mysqli_query($conn, "UPDATE `barang` SET `gudang_id` = '$lokasi_gudang', `nama_barang` = '$nama_barang', `jumlah_barang` = '$jumlah_barang', `foto_barang` = '$nama_gambar_baru' WHERE `barang`.`id` = '$bid'");
            if ($query) {
                echo "<script>alert('Update Barang Berhasil'); window.location.href = '../?p=barang';</script>";
            }else{
                echo "<script>alert('Update Barang Gagal');</script>";
            }
        }else{
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');</script>";
        }
    }else{
        $query  = "UPDATE `barang` SET `gudang_id` = '$lokasi_gudang', `nama_barang` = '$nama_barang', `jumlah_barang` = '$jumlah_barang', `foto_barang` = NULL, `updated_at` = CURRENT_TIMESTAMP WHERE `barang`.`id` = '$bid'";
        if ($query) {
            echo "<script>alert('Update Barang Berhasil'); window.location.href = '../?p=barang';</script>";
        }else{
            echo "<script>alert('Update Barang Gagal');</script>";
        }
    }