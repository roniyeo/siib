<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Form Request</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active">Form Request</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="include/add_request.php" method="post">
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
                                <div class="input-group datepicker" id="datepicker">
                                    <input type="text" class="form-control" id="date" data-date-format="yyyy-mm-dd"
                                        value="<?php echo date("Y-m-d"); ?>" name="tanggal_request" readonly />
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
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
                                <select class="form-control" aria-label="Default select example" id="warehouse" name="gudang">
                                    <option selected>Pilih Gudang</option>
                                    <?php
                                        $wh = mysqli_query($conn, "select * from warehouse");
                                        while ($row = mysqli_fetch_array($wh)) {
                                    ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_gudang']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="barang">Nama Barang</label>
                                <select class="form-control showBarang" aria-label="Default select example" id="barang" name="barang">
                                    <option value="">Pilih Barang</option>
                                    <?php
                                        $barang = mysqli_query($conn, "select barang.id, barang.nama_barang, barang.gudang_id, barang.foto_barang from barang inner join warehouse on barang.gudang_id = warehouse.id");
                                        while ($row = mysqli_fetch_array($barang)) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"
                                        class="<?php echo $row['gudang_id']; ?>"><?php echo $row['nama_barang']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="container mt-2">
                                    <?php 
                                        $barang = mysqli_query($conn, "select barang.id, barang.foto_barang from barang inner join warehouse on barang.gudang_id = warehouse.id");
                                        while ($row = mysqli_fetch_array($barang)) {
                                    ?>
                                        <div class="data" id="<?php echo $row['id']; ?>">
                                            <img src="foto/barang/<?php echo $row['foto_barang']; ?>" width="300px">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="jumlah_barang">Jumlah Barang</label>
                                    <input type="text" class="form-control" id="jumlah_barang"
                                        placeholder="Jumlah Barang" name="jumlah_barang">
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
                                <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="date" name="tanggal_pinjam" data-date-format="yyyy-mm-dd"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="tanggal_kembali">Tanggal Pengembalian</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="date" name="tanggal_kembali" data-date-format="yyyy-mm-dd"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="keperluan">Keperluan</label>
                                <textarea class="form-control" id="keperluan" rows="3" name="keperluan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary my-2" type="submit">Tambah</button>
            </form>
        </div>
    </section>
</div>