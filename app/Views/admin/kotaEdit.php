<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-0 mb-4" id="cardKeranjang">
                <h2 class="mb-4 text-center">Form Ubah Data Kota</h2>
                <form action="/admin/kotaupdate/<?= $kota['kota_id']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Kota</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama" value="<?= $kota['kota']; ?>" required>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
                    
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>