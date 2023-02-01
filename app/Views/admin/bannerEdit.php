<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-0 mb-4" id="cardKeranjang">
                <h2 class="mb-4 text-center">Form Ubah Data Banner</h2>
                <form action="/admin/bannerupdate/<?= $banner['banner_id']; ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="gambarLama" value="<?= $banner['gambar']; ?>">
                    <img src="/img/<?= $banner['gambar']; ?>" class="img-fluid img-thumbnail img-preview" id="banner">
                    <p>Kami menyarankan ukuran gambar 1200px X 300px</p>
                    <div class="mb-2">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambarLabel" name="gambar" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar'); ?>
                        </div>
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Banner</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama" value="<?= $banner['banner']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
                <div class="d-grid gap-2 d-md-block mt-3">
                    <a class="btn btn-outline-success" href="/admin/banner">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>