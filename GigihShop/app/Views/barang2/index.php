<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/banner1.jpg" class="d-block w-100" >
                    </div>
                    <div class="carousel-item">
                        <img src="/img/banner2.jpg" class="d-block w-100" >
                    </div>
                    <div class="carousel-item">
                        <img src="/img/banner3.jpg" class="d-block w-100" >
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <nav id="nav-tabs-barang">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-selected="true">Barang 1</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-selected="false">Barang 2</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-selected="false">Barang 3</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" ><?= $this->include('kategori/kategori1'); ?></div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" ><?= $this->include('kategori/kategori2'); ?></div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" ><?= $this->include('kategori/kategori3'); ?></div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>