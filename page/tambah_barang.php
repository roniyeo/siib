<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Barang</h1>
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
            <form action="include/add_barang.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" placeholder="Isi nama barang" name="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="gudang">Lokasi Gudang</label>
                            <select class="form-control" name="lokasi_gudang">
                                <option value="">Pilih Gudang</option>
                                <?php
                                    $sql = mysqli_query($conn, "select * from warehouse");
                                    while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_gudang']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang</label>
                            <input type="text" class="form-control" id="jumlah_barang" placeholder="Isi Jumlah Barang" name="jumlah_barang">
                        </div>
                        <div class="form-group">
                            <label for="formFile" class="form-label">Foto Barang</label>
                            <input class="form-control" type="file" id="formFile" name="foto_barang">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary my-2" type="submit">Tambah</button>
            </form>
        </div>
    </section>
</div>