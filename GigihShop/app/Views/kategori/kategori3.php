<div class="row row-cols-1 row-cols-md-3 g-4">
  <?php if($kategori3 == null) : ?>
    <p>Kosong</p>
  <?php else : ?>
  <?php foreach($kategori3 as $k) : ?>
    <div class="col">
      <div class="card h-100">
        <img src="/img/barang/<?= $k['gambar']; ?>" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title"><?= $k['nama_barang']; ?></h5>
          <p class="price"><?= $k['harga']; ?></p>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <button type="button" class="btn btn-secondary">+ Tambah Ke Keranjang</button>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?php endif; ?>
</div>
