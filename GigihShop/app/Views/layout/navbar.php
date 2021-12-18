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
        <a class="nav-item nav-link" href="/barang2">Barang2</a>
      </ul>
      <form class="d-flex">
        <?php if(logged_in()) : ?>
          <a class="btn btn-outline-success" href="/logout">Logout</a>
        <?php else : ?>
          <a class="btn btn-outline-success" href="/login">Login</a>
        <?php endif; ?>
        <a id="btn-keranjang">
          <img src="/img/cart.png" alt="">
          <!-- <?php $totalBarang = 1; ?>
          <?php	if($totalBarang != 0){ echo "<span class='total-barang'>$totalBarang</span>"; } ?> -->
        </a>
      </form>
    </div>
  </div>
</nav>