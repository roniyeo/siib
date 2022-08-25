<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Pegawai</h1>
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
            <form action="include/add_pegawai.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">System Login</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Profile</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama_pegawai"
                                        placeholder="Enter nama pegawai" name="nama_pegawai">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 align-content-end justify-content-end">Tambah</button>
            </form>
        </div>
    </section>
</div>