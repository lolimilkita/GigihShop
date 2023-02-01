<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="col">
            <div class="card border-0 mb-4" id="cardKeranjang">
                <h2 class="mb-4 text-center">Form Ubah Data Barang</h2>
                <form action="/admin/barangupdate/<?= $barang['barang_id']; ?>" method="POST" class="row g-3" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="gambarLama" value="<?= $barang['gambar']; ?>">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" value="<?= (old('nama_barang')) ? old('nama_barang') : $barang['nama_barang']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Kategori</label>
                        <select id="inputState" name="kategori" class="form-select" required>
                            <option selected value="">Pilih Kategori...</option>
                            <option value="batu">Batu</option>
                            <option value="pasir">Pasir</option>
                            <option value="tanah">Tanah</option>
                            <option value="jasa">Jasa</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="Deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi baru disini..." ></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="deslama" class="fw-bold">Deskripsi lama</label>
                        <p id="deslama">
                            <?= $barang['deskripsi']; ?>
                        </p>
                    </div>

                    <div class="hargaBarang col-12">
                        <button class="accordion-button collapsed fw-bold border" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Harga Barang
                        </button>
                        <div id="flush-collapseOne" class="accordion-collapse collapse bg-light rounded-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body row g-3">
                                <p>Jika tidak ada harganya bisa masukkan 0 saja</p>
                                <div class="col-md-4">
                                    <label for="Harga1" class="form-label">Harga1 (1KG)</label>
                                    <input type="number" class="form-control" id="Harga1" name="harga1" value="<?= (old('harga1')) ? old('harga1') : $barang['harga1']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="Harga2" class="form-label">Harga2 (5KG)</label>
                                    <input type="number" class="form-control" id="Harga2" name="harga2" value="<?= (old('harga2')) ? old('harga2') : $barang['harga2']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="Harga3" class="form-label">Harga3 (10KG)</label>
                                    <input type="number" class="form-control" id="Harga3" name="harga3" value="<?= (old('harga3')) ? old('harga3') : $barang['harga3']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Harga4" class="form-label">Harga4 (1/2 Pickup)</label>
                                    <input type="number" class="form-control" id="Harga4" name="harga4" value="<?= (old('harga4')) ? old('harga4') : $barang['harga4']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Harga5" class="form-label">Harga5 (1 Pickup)</label>
                                    <input type="number" class="form-control" id="Harga5" name="harga5" value="<?= (old('harga5')) ? old('harga5') : $barang['harga5']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Harga6" class="form-label">Harga6 (1/2 Truck)</label>
                                    <input type="number" class="form-control" id="Harga6" name="harga6" value="<?= (old('harga6')) ? old('harga6') : $barang['harga6']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Harga7" class="form-label">Harga7 (1 Truck)</label>
                                    <input type="number" class="form-control" id="Harga7" name="harga7" value="<?= (old('harga7')) ? old('harga7') : $barang['harga7']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="sampul" class="d-flex form-label">Sampul</label>
                        <img src="/img/barang/<?= $barang['gambar']; ?>" class="sampul img-fluid img-thumbnail img-preview">
                    </div>
                    <div class="col-md-8">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambarLabel" name="gambar" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar'); ?>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="d-grid col-4 mx-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</div>
<?= $this->endSection(); ?>