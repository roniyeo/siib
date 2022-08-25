<?php
session_start();
include 'database.php';

$kembali_id = $_POST['kembali_id'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$nama_file = $_FILES['bukti_foto']['name'];
$ukuran_file = $_FILES['bukti_foto']['size'];
$tipe_file = $_FILES['bukti_foto']['type'];
$tmp_file = $_FILES['bukti_foto']['tmp_name'];

$path = "../foto/pengembalian/" . $nama_file;
if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") { 
    if ($ukuran_file <= 100000000) { 
        if (move_uploaded_file($tmp_file, $path)) { 
            $query = mysqli_query($conn, "UPDATE `pengembalian` SET `tanggal_pengembalian` = '$tanggal_kembali', `status_approved` = 'Sudah Kembali', `bukti_foto` = '$nama_file' WHERE `pengembalian`.`id` = '$kembali_id'"); 
            if ($query) {
                header("location: ../?p=kembali");
            } else {
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href='../?p=kembali'>Kembali Ke Form</a>";
            }
        } else {
            echo "Maaf, Gambar gagal untuk diupload.";
            echo "<br><a href='../?p=kembali'>Kembali Ke Form</a>";
        }
    } else {
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        echo "<br><a href='../?p=kembali'>Kembali Ke Form</a>";
    }
} else {
    echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
    echo "<br><a href='../?p=kembali'>Kembali Ke Form</a>";
}


