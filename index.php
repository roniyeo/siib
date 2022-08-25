<?php
    session_start();
    if($_SESSION['status'] != 'login'){
        header('location:login.php');
    }
    include 'include/database.php';
    $pgw = mysqli_query($conn, "select * from users where role != 'Admin'");
    $total_pgw = mysqli_num_rows($pgw);
    $gudang = mysqli_query($conn, "select * from warehouse");
    $total_gudang = mysqli_num_rows($gudang);

    
?>
<?php include 'template/header.php'; ?>

<div class="content-wrapper">
    <?php
        if (isset($_GET['p'])) {
            $page = $_GET['p'];
            switch ($page) {
                case 'pegawai':
                    include "page/data_pegawai.php";
                    break;
                
                case 'tambah_pegawai':
                    include "page/tambah_pegawai.php";
                    break;

                case 'gudang':
                    include "page/data_gudang.php";
                    break;
                
                case 'tambah_gudang':
                    include "page/tambah_gudang.php";
                    break;

                case 'barang':
                    include "page/data_barang.php";
                    break;
                
                case 'tambah_barang':
                    include "page/tambah_barang.php";
                    break;

                case 'request':
                    include "page/data_request.php";
                    break;
                
                case 'form_request':
                    include "page/form_request.php";
                    break;
                    
                case 'kembali':
                    include "page/data_kembali.php";
                    break;
                
                default:
                    echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                    break;
            }
        }else{
            include "page/home.php"; 
        }
    ?>
</div>

<?php include 'template/footer.php'; ?>