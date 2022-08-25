<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row my-3 mx-1">
                    <a href="?p=tambah_barang" class="btn btn-sm btn-primary">Tambah Barang</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Lokasi Gudang</th>
                                    <th>Total Barang</th>
                                    <th>Foto Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($conn, "SELECT barang.id, nama_barang, nama_gudang, jumlah_barang, foto_barang FROM `barang` LEFT JOIN `warehouse` ON `barang`.`gudang_id` = `warehouse`.`id`");
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_barang']; ?></td>
                                    <td><?php echo $row['nama_gudang']; ?></td>
                                    <td><?php echo $row['jumlah_barang']; ?></td>
                                    <td><img src="foto/barang/<?php echo $row['foto_barang']; ?>" width="100px"></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modalEdit<?php echo $row['id']; ?>">Edit</a>
                                        <a href="include/delete_barang.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="include/edit_barang.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="barang_id" value="<?php echo $row['id']; ?>">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="nama_barang">Nama Barang</label>
                                                                <input type="text" class="form-control" id="nama_barang"
                                                                    name="nama_barang"
                                                                    value="<?php echo $row['nama_barang']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="lokasi">Lokasi Gudang</label>
                                                                <select class="form-control" name="lokasi_gudang"
                                                                    id="lokasi">
                                                                    <?php
                                                                    $sql1 = mysqli_query($conn, "select * from warehouse");
                                                                        while ($row1 = mysqli_fetch_array($sql1)) {
                                                                    ?>
                                                                    <option value="<?php echo $row1['id']; ?>">
                                                                        <?php echo $row1['nama_gudang']; ?></option>
                                                                    <?php }?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="jumlah_barang">Jumlah Barang</label>
                                                                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $row['jumlah_barang']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                            <label for="formFile" class="form-label">Foto Barang</label>
                                                            <input class="form-control" type="file" id="formFile" name="foto_barang">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>