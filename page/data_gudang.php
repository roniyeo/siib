<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Gudang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active">Data Gudang</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row my-3 mx-1">
                    <a href="?p=tambah_gudang" class="btn btn-sm btn-primary">Tambah Gudang</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Data Gudang : 3</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gudang</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn, "select * from warehouse");
                                    while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_gudang']; ?></td>
                                    <td><?php echo $row['lokasi']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modalEdit<?php echo $row['id']; ?>">Edit</a>
                                        <a href="include/delete_pegawai.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                    
                                    <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Gudang</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="include/edit_gudang.php" method="post">
                                                    <input type="hidden" name="gudang_id" value="<?php echo $row['id']; ?>">
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="nama_gudang">Nama Gudang</label>
                                                                        <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="<?php echo $row['nama_gudang']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="lokasi">Lokasi Gudang</label>
                                                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $row['lokasi']; ?>">
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