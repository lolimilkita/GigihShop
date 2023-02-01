<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mb-5">
        <div class="col">

            <div class="card border-0 bg-transparent mt-3">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="card-body" id="cardGlass">
                            <h1 class="card-title fw-bold mb-4">Selamat datang di Gigih Shop</h1>
                            <p class="card-text mb-5">Kami menjual berbagai macam material untuk pembangunan, dikirim menggunakan truck maupun mobil pickup jadi anda bisa pesan banyak maupun sedang</p>
                            <a type="button" href="/barang" class="btn bg-white rounded-0 btn-lg" id="btnHomeP">
                                Lanjut Pesan
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10" id="imgHomeTop">
                      <img src="/img/Frame_66.jpg" class="img-fluid" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="bg-white mb-5 p-5">
    <div class="container">
        <h4 class="text-center mb-5">Material Kami Pilih Hanya Yang Terbaik</h4>
    
        <div class="row">
          <div class="col-lg-3 mb-3">
              <div class="card border-0" id="cardHomeM">
                    <img src="/img/barang/Tanah-Semi-Padas-Atau-Tanah-Liat.jpg" id="imgHomeM">
                    <div class="card-body" id="cardTrans">
                        <h5 class="card-title" style="color: white;">Tanah Semi-Padas Dari Purworejo</h5>
                    </div>
                    <div class="card-img-overlay">
                        <a href="/barang/detail/15" id="home"></a>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 mb-3">
              <div class="card border-0" id="cardHomeM">
                    <img src="/img/barang/batu-koral-lava-volcano.jpg" id="imgHomeM">
                    <div class="card-body" id="cardTrans">
                        <h5 class="card-title" style="color: white;">Batu koral lava volcano</h5>
                    </div>
                    <div class="card-img-overlay">
                        <a href="/barang/detail/2" id="home"></a>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 mb-3">
              <div class="card border-0" id="cardHomeM">
                  <img src="/img/barang/HTB1PBbAX6DuK1Rjy1zjq6zraFXaG.jpg" id="imgHomeM">
                  <div class="card-body" id="cardTrans">
                      <h5 class="card-title" style="color: white;">Batu Alam Ukuran Besar</h5>
                  </div>
                  <div class="card-img-overlay">
                        <a href="/barang/detail/6" id="home"></a>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 mb-3">
              <div class="card border-0" id="cardHomeM">
                  <img src="/img/barang/Pasir-Sungai.jpg" id="imgHomeM">
                  <div class="card-body" id="cardTrans">
                      <h5 class="card-title" style="color: white;">Pasir Sungai</h5>
                  </div>
                  <div class="card-img-overlay">
                        <a href="/barang/detail/8" id="home"></a>
                    </div>
              </div>
          </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row gx-0">
        <div class="col-lg-3 pe-3">
            <h2>Tentang Kami</h2>
            <p>Kami adalah pengirim supplier material bangunan seperti pasir, batu, dan tanah urug. Kami juga menjual jasa segala jenis angkutan truck.</p>
            <a type="button" href="/pages/about" class="btn bg-white rounded-0 btn-lg" id="btnHomeP">
                Kontak
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="col-lg-4">
            <img src="/img/gambarbukit.jpg" alt="" class="img img-fluid">
        </div>
        <div class="col-lg-5">
            <img src="/img/gambarrumah.jpeg" alt="" class="img img-fluid">
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col">
            <div class="card bg-white border-0 p-5" id="cardHomeK">
                <h2 class="text-center mb-5">Kategori Barang</h2>

                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="card h-100" id="cardBarang" >
                            <img src="/img/barang/batu-koral-hitam.jpg" class="card-img-top" id="imgHomeM" >
                            <div class="card-img-overlay">
                                <a href="/barang/index" id="main"></a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Batu</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card h-100" id="cardBarang" >
                            <img src="/img/barang/Pasir-Mundu.jpg" class="card-img-top" id="imgHomeM">
                            <div class="card-img-overlay">
                                <a href="/barang/kategori2" id="main"></a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Pasir</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card h-100" id="cardBarang" >
                            <img src="/img/barang/tanahmerah.jpg" class="card-img-top" id="imgHomeM">
                            <div class="card-img-overlay">
                                <a href="/barang/kategori3" id="main"></a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Tanah Urug</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="footer text-white" id="footerHome">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h5>Whatsapp</h5>
                <p>
                    <i class="bi bi-whatsapp"></i>
                    +6285-2907-5898
                </p>
            </div>
            <div class="col-lg-6 mb-3 text-center">
                <h5>Kantor</h5>
                <p>
                    <i class="bi bi-geo-alt-fill"></i>
                    JL. Flamboyan No.5 Desa/Kel Plandi RT.003 RW.001 Kec.Purwodadi Kab.Purworejo
                </p>        
            </div>
            <h5 class="text-center mb-5">
                Copyright CV GIGIH 2022
            </h5>
        </div>
        
    </div>
</footer>

<?= $this->endSection(); ?>