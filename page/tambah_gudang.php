<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Gudang</h1>
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
            <form action="include/add_gudang.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_gudang">Nama Gudang</label>
                            <input type="text" class="form-control" id="nama_gudang" placeholder="Isi nama gudang" name="nama_gudang">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" placeholder="Isi lokasi" name="lokasi">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary my-2" type="submit">Tambah</button>
            </form>
        </div>
    </section>
</div>