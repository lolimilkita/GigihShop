<link rel="stylesheet" href="/css/styleNavbar.css">

<?php 
$uri = service('uri');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/'); ?>">
      <img src="\img\logo.png" width="120" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">            
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a class="nav-item nav-link <?= $uri->getSegment(1) == 'pages' ? 'active' : ''; ?>" href="<?= base_url('/pages/about'); ?>">Kontak</a>
        <a class="nav-item nav-link <?= $uri->getSegment(1) == 'barang' ? 'active' : ''; ?>" href="/barang">Barang</a>
        <?php if(in_groups('admin')) : ?>
          <a class="nav-item nav-link <?= $uri->getSegment(1) == 'admin' ? 'active' : ''; ?>" href="/admin">Admin</a>
        <?php endif; ?>
      </ul>
      <form class="d-flex">
        <?php if(logged_in()) : ?>
          <!-- <a class="btn btn-outline-secondary" href="/logout">Logout</a> -->
          <div class="btn-group">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline">
                <?= user()->username; ?>
              </span>
              <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profil</a></li>
              <?php if (in_groups('user')) : ?>
                <li><a class="dropdown-item" href="/pesanan">Pesanan</a></li>
              <?php endif; ?>
              <li><a class="dropdown-item" href="/logout">Keluar</a></li>
            </ul>
          </div>
        <?php else : ?>
          <a class="btn btn-outline-secondary" href="/login">Login</a>
        <?php endif; ?>
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