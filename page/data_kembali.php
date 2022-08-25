<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pengembalian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active">Data Pengembalian</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pengembalian</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM pengembalian");
                                    while ($row = mysqli_fetch_array($data)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama_pegawai']; ?></td>
                                    <td><?php echo $row['nama_barang']; ?></td>
                                    <td><?php echo $row['tanggal_pengembalian']; ?></td>
                                    <?php
                                        if ($row['status_approved'] == "Approved") {
                                    ?>
                                    <td class="text-success" style="color: red;"><?php echo $row['status_approved']; ?>
                                    </td>
                                    <?php }else{ ?>
                                    <td class="text-info"><?php echo $row['status_approved']; ?></td>
                                    <?php } ?>
                                    <td>
                                        <?php
                                            if ($_SESSION['role'] == "Sales") {
                                        ?>
                                        <?php 
                                                if ($row['status_approved'] == "Sudah Kembali") {
                                            ?>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <?php } else { ?>
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modalKembali<?php echo $row['id']; ?>">Pengembalian</a>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <?php 
                                                if ($row['status_approved'] == "Sudah Kembali") {
                                            ?>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <?php } ?>
                                        <?php } ?>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalKembali<?php echo $row['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Form Pengembalian
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="include/pengembalian.php" method="post"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" value="<?php echo $row['id']; ?>"
                                                        name="kembali_id">
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label for="pengembalian">Tanggal
                                                                        Pengembalian</label>
                                                                    <div class="input-group date" id="pengembalian">
                                                                        <input type="text" class="form-control" data-date-format="yyyy-mm-dd"
                                                                            value="<?php echo date("Y-m-d"); ?>"
                                                                            name="tanggal_kembali" />
                                                                        <span class="input-group-append">
                                                                            <span
                                                                                class="input-group-text bg-light d-block">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-2">
                                                                    <label for="bukti_foto">Bukti Foto</label><br>
                                                                    <input type="file" name="bukti_foto"
                                                                        id="bukti_foto">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal View -->
                                    <div class="modal fade" id="modalView<?php echo $row['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bukti Foto</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Bukti Foto</label>
                                                                <img src="foto/pengembalian/<?php echo $row['bukti_foto']; ?>"
                                                                    class="rounded mx-auto d-block img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

