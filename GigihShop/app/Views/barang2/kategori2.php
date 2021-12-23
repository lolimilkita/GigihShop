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
              <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="nav-home-tab" data-bs-target="#nav-home" role="tab" aria-selected="false" href="/barang2">Kategori 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" id="nav-profile-tab" data-bs-target="#nav-profile" role="tab" aria-selected="true" href="">Kategori 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nav-contact-tab" data-bs-target="#nav-contact" role="tab" aria-selected="false" href="/barang2/kategori3">kategori 3</a>
                </li>
              </ul>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-home" role="tabpanel" >
                </div>
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" >
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php if($kategori2 == null) : ?>
                      <p>Kosong</p>
                    <?php else : ?>
                    <?php foreach($kategori2 as $k) : ?>
                      <div class="col">
                        <div class="card h-100">
                          <img src="/img/barang/<?= $k['gambar']; ?>" class="card-img-top" >
                          <div class="card-body">
                            <h5 class="card-title"><?= $k['nama_barang']; ?></h5>
                            <p class="price"><?= $k['harga']; ?></p>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <?php if(logged_in()) : ?>
                              <a type="button" class="btn btn-secondary" href="/keranjang/tambah/<?= $k['barang_id']; ?>" >+ Tambah Ke Keranjang</a>
                            <?php else : ?>
                              <a type="button" class="btn btn-secondary disabled" >+ Tambah Ke Keranjang</a>
                              <div class="text-danger d-flex" role="alert">
                                  <?php echo session()->getFlashdata('not_login') ?>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                  <div id="pager">
                      <?= $pager->links('barang', 'barang_pagination'); ?>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" ></div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection(); ?>