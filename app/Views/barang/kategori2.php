<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

          <?php 
            function rupiah($angka){
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }
          ?>

          <?php 
            function textWrap($text) {
                $showSort = substr($text, 0, 101);
                $hasil = $showSort . "..";
                return $hasil;
            }
          ?>

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/img/banner_default.jpg" class="d-block w-100" id="banner" >
                  </div>
                  <?php foreach($banner as $b) : ?>
                    <div class="carousel-item">
                      <img src="/img/<?= $b['gambar']; ?>" class="d-block w-100" id="banner">
                    </div>
                  <?php endforeach; ?>
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
                  <a class="nav-link" id="nav-home-tab" data-bs-target="#nav-home" role="tab" aria-selected="false" href="/barang">Batu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" id="nav-profile-tab" data-bs-target="#nav-profile" role="tab" aria-selected="true" href="">Pasir</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nav-contact-tab" data-bs-target="#nav-contact" role="tab" aria-selected="false" href="/barang/kategori3">Tanah Urug</a>
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
                        <div class="card h-100" id="cardBarang">
                          <img src="/img/barang/<?= $k['gambar']; ?>" class="card-img-top" >
                          <div class="card-img-overlay">
                            <a href="/barang/detail/<?= $k['barang_id']; ?>" id="main"></a>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title"><?= $k['nama_barang']; ?></h5>
                            <p class="price">
                              <?php 
                                echo rupiah($k['harga4']);
                                echo (" (1/2 Pickup)");
                              ?>
                            </p>
                            <p>
                              <?php
                                echo textWrap($k['deskripsi']);
                              ?>
                            </p>
                            <?php if(logged_in()) : ?>
                              <a id="tambahK" type="button" class="btn btn-secondary" href="/keranjang/tambah/<?= $k['barang_id']; ?>" >
                                <i class="bi bi-cart-plus"></i>
                                Tambah
                              </a>
                            <?php else : ?>
                              <a id="tambahK" type="button" class="btn btn-secondary d-none">Tambah</a>
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