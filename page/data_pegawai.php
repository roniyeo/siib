<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active">Data Pegawai</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row my-3 mx-1">
                    <a href="?p=tambah_pegawai" class="btn btn-sm btn-primary">Tambah Pegawai</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Data Pegawai : 2</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn, "select * from users where not role = 'Admin'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_pegawai']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modalEdit<?php echo $row['id']; ?>">Edit</a>
                                        <a href="include/delete_pegawai.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="include/edit_pegawai.php" method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="nama_pegawai">Nama Pegawai</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama_pegawai" name="nama_pegawai"
                                                                            value="<?php echo $row['nama_pegawai']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="role">Role</label>
                                                                        <select class="form-control" id="role" name="role">
                                                                            <option value="">Pilih Jabatan</option>
                                                                            <option value="Admin">BM Nagoya</option>
                                                                            <option value="Admin">BM Taman Kota</option>
                                                                            <option value="Admin">BM Hyundai</option>
                                                                            <option value="SPV">SPV Promosi</option>
                                                                            <option value="SPV">Staf Promosi 1</option>
                                                                            <option value="Sales">Staf Promosi 2</option>
                                                                            <option value="Sales">SPV Nagoya</option>
                                                                            <option value="Sales">SPV Taman Kota</option>
                                                                            <option value="Sales">SPV Hyundai</option>
                                                                        </select>
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