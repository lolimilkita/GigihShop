<link rel="stylesheet" href="/css/styleNavbar.css">
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/'); ?>">
      <img src="\img\logo.png" width="120" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">            
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a class="nav-item nav-link" href="<?= base_url('/pages/about'); ?>">Kontak</a>
        <a class="nav-item nav-link" href="/barang">Barang</a>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-secondary" href="/login">Login</a>
        <a id="btn-keranjang" class="btn position-relative" href="/keranjang">
          <img src="/img/cart.png" alt="">
          <?php if(session()->get('jml_keranjang')) : ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?= session()->get('jml_keranjang'); ?>
              <span class="visually-hidden">unread messages</span>
            </span>
          <?php endif; ?>
        </a>
      </form>
    </div>
  </div>
</nav>