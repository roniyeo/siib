<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Request</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active">Data Request</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <?php 
                    if ($_SESSION['role'] == "Sales") {
                ?>
                <div class="row my-3 mx-1">
                    <a href="?p=form_request" class="btn btn-sm btn-primary">Request</a>
                </div>
                <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Request</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nama Gudang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Keperluan</th>
                                    <th>status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT request.id, warehouse.nama_gudang, barang.nama_barang, request.jumlah_barang, request.nama_pegawai, request.tanggal_request, request.tanggal_peminjaman, request.tanggal_pengembalian, request.keperluan, request.status_approved, request.approved_id, request.alasan_reject FROM ((request INNER JOIN barang ON request.barang_id = barang.id) INNER JOIN warehouse ON request.gudang_id = warehouse.id)");
                                    while ($row = mysqli_fetch_array($data)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama_pegawai']; ?></td>
                                    <td><?php echo $row['nama_gudang']; ?></td>
                                    <td><?php echo $row['nama_barang']; ?></td>
                                    <td><?php echo $row['jumlah_barang']; ?></td>
                                    <td><?php echo $row['keperluan']; ?></td>
                                    <?php
                                        if ($row['status_approved'] == "Pending") {
                                    ?>
                                    <td class="text-danger" style="color: red;"><?php echo $row['status_approved']; ?>
                                    </td>
                                    <?php }else if ($row['status_approved'] == "Reject") { ?>
                                        <td class="text-danger"><?php echo $row['status_approved']; ?></td>
                                    <?php }else{ ?>
                                        <td class="text-success"><?php echo $row['status_approved']; ?></td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($_SESSION['role'] == "SPV") { 
                                            if ($row['status_approved'] == "Approved")  {?>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <?php }else if ($row['status_approved'] == "Reject") { ?>
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <?php }else{ ?>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <a href="include/approve.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-sm btn-success">Approve</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#modalReject<?php echo $row['id']; ?>">Reject</a>
                                        <?php } ?>
                                        <?php }else if ($_SESSION['role'] == "Sales") { 
                                            if ($row['status_approved'] == "Approved") { ?>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <?php }else if ($row['status_approved'] == "Reject"){ ?>
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <?php }else{?>
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#modalEdit<?php echo $row['id']; ?>">Edit</a>
                                            <a href="include/delete_request.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        <?php
                                        }
                                            }else{ ?>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalView<?php echo $row['id']; ?>">View</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!-- Modal View -->
                                <div class="modal fade" id="modalView<?php echo $row['id']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">View Request</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Tanggal Request : <?php echo $row['tanggal_request']; ?>
                                                    </div>
                                                    <div class="col-12">
                                                        Tanggal Peminjaman :
                                                        <?php echo $row['tanggal_peminjaman']; ?>
                                                    </div>
                                                    <div class="col-12">
                                                        Tanggal Pengembalian :
                                                        <?php echo $row['tanggal_pengembalian']; ?>
                                                    </div>
                                                    <div class="col-12">
                                                    <?php 
                                                        if ($row['status_approved'] == "Reject") {
                                                            echo "Alasan Reject :";
                                                            echo $row['alasan_reject'];
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Reject -->
                                <div class="modal fade" id="modalReject<?php echo $row['id']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reject Request</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="include/reject.php" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <div class="row">
                                                        <div class="col-12">
                                                        <label for="alasan-reject" class="form-label">Alasan Reject Request</label>
                                                        <textarea class="form-control" id="alasan-reject" rows="3" name="ket_reject"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Request</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="include/edit_request.php" method="post">
                                                <input type="hidden" name="request_id"
                                                    value="<?php echo $row['id']; ?>">
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <h3 class="text-center">
                                                                    Isi Data
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="datepicker">Tanggal Request</label>
                                                                    <div class="input-group date" id="datepicker">
                                                                        <input type="text" class="form-control"
                                                                            id="date" data-date-format="yyyy-mm-dd"
                                                                            value="<?php echo date("Y-m-d"); ?>"
                                                                            name="tanggal_request" readonly />
                                                                        <span class="input-group-append">
                                                                            <span
                                                                                class="input-group-text bg-light d-block">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="nama_pegawai">Nama
                                                                            Pegawai</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama_pegawai"
                                                                            value="<?php echo $row['nama_pegawai']; ?>"
                                                                            name="nama_pegawai">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <h3 class="text-center">
                                                                    Request Barang
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label for="warehouse">Lokasi Gudang</label>
                                                                    <select class="form-control"
                                                                        aria-label="Default select example"
                                                                        id="warehouse" name="gudang">
                                                                        <?php
                                                                                $wh = mysqli_query($conn, "select * from warehouse");
                                                                                while ($row1 = mysqli_fetch_array($wh)) {
                                                                            ?>
                                                                        <option value="<?php echo $row1['id']; ?>">
                                                                            <?php echo $row1['nama_gudang']; ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label for="barang">Nama Barang</label>
                                                                    <select class="form-control"
                                                                        aria-label="Default select example" id="barang"
                                                                        name="barang">
                                                                        <?php
                                                                                $barang = mysqli_query($conn, "select * from barang inner join warehouse on barang.gudang_id = warehouse.id");
                                                                                while ($row12 = mysqli_fetch_array($barang)) {
                                                                            ?>
                                                                        <option value="<?php echo $row12['id']; ?>"
                                                                            id="barang"
                                                                            class="<?php echo $row12['id']; ?>">
                                                                            <?php echo $row12['nama_barang']; ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="jumlah_barang">Jumlah
                                                                            Barang</label>
                                                                        <input type="text" class="form-control"
                                                                            id="jumlah_barang"
                                                                            value="<?php echo $row['jumlah_barang']; ?>"
                                                                            name="jumlah_barang">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <h3 class="text-center">
                                                                    Catatan
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="tanggal_pinjam">Tanggal
                                                                        Peminjaman</label>
                                                                    <div class="input-group date" id="tanggal_pinjam">
                                                                        <input type="text" class="form-control"
                                                                            id="date" name="tanggal_pinjam"
                                                                            data-date-format="yyyy-mm-dd"
                                                                            value="<?php echo $row['tanggal_peminjaman']; ?>" />
                                                                        <span class="input-group-append">
                                                                            <span
                                                                                class="input-group-text bg-light d-block">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="tanggal_kembali">Tanggal
                                                                        Pengembalian</label>
                                                                    <div class="input-group date" id="tanggal_kembali">
                                                                        <input type="text" class="form-control"
                                                                            id="date" name="tanggal_kembali"
                                                                            data-date-format="yyyy-mm-dd"
                                                                            value="<?php echo $row['tanggal_pengembalian']; ?>" />
                                                                        <span class="input-group-append">
                                                                            <span
                                                                                class="input-group-text bg-light d-block">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label for="keperluan">Keperluan</label>
                                                                    <textarea class="form-control" id="keperluan"
                                                                        rows="3"
                                                                        name="keperluan"><?php echo $row['keperluan']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>