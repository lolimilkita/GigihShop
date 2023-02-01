<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-3 text-center">Pesanan Anda Berhasil Dipesan</h2>
            <p class="text-center">Cek pesanan anda di menu profil pojok kanan atas Atau</p>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="/pesanan" class="btn btn-outline-dark mx-auto d-block">Daftar Pesanan</a>
            </div>
            <img src="/img/Saly-22.png" class="figure-img img-fluid mx-auto d-block" id="imgBerhasil">
        </div>
    </div>
</div>


<?= $this->endSection(); ?>