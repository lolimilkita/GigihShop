<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mb-3 text-center">Keranjang Saya</h2>
        </div>
    </div>

    <?php 
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    ?>

    <div class="row">
        <div class="col">
            <div class="card border-0 mb-4" id="cardKeranjang">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga Dipilih</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($keranjang as $k) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/barang/<?= $k['gambar']; ?>" class="sampul img-fluid"></td>
                                <td><?= $k['nama_barang']; ?></td>
                                <td>
                                    <?php 
                                        if ($k['barang_id'] == 6) {
                                            echo ("Untuk batu besar ini dapat dinegosiasi melalui whatsapp");
                                        } elseif ($k['harga_dipilih'] == 0) {
                                            echo ("Anda belum memilih harga, pilih melalui detail");
                                        } else {
                                            switch ($k['harga_dipilih']) {
                                                case $k['harga1']:
                                                    echo rupiah($k['harga_dipilih']) , " (1KG)";
                                                    break;
                                                case $k['harga2']:
                                                    echo rupiah($k['harga_dipilih']) , " (5KG)";
                                                    break;
                                                case $k['harga3']:
                                                    echo rupiah($k['harga_dipilih']) , " (10KG0";
                                                    break;
                                                case $k['harga4']:
                                                    echo rupiah($k['harga_dipilih']) , " (1/2 Pickup)";
                                                    break;
                                                case $k['harga5']:
                                                    echo rupiah($k['harga_dipilih']) , " (1 Pickup)";
                                                    break;
                                                case $k['harga6']:
                                                    echo rupiah($k['harga_dipilih']) , " (1/2 Truck)";
                                                    break;
                                                case $k['harga7']:
                                                    echo rupiah($k['harga_dipilih']) , " (1 Truck)";
                                                    break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="/keranjang/detail/<?= $k['id']; ?>" class="btn btn-success mb-2">Detail</a>
                                    
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#yakinHapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="yakinHapus" tabindex="-1" aria-labelledby="yakinHapusLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-sm">
                                        <div class="modal-content border-warning border-2">
                                          <div class="modal-header border-0">
                                            <h5 class="modal-title" id="yakinHapusLabel">Peringatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda yakin?
                                          </div>
                                          <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <form action="/keranjang/<?= $k['id']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-warning">Iya, hapus!</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <th scope="row"></th>
                            <td colspan="2" class="fw-bold">Total harga</td>
                            <td>
                                <?php
                                    for($x = 0; $x < count($keranjang); $x++) {
                                        $hargaTotal += $keranjang[$x]['harga_dipilih'];
                                    }
                                    echo rupiah($hargaTotal);
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($keranjang == null){
                                        echo ('keranjang kosong');
                                    } else {
                                        echo ('<a href="/pesanan/pesanan" class="btn btn-primary text-nowrap">lanjut Pesanan</a>');
                                    }
                                ?>
                                
                            </td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?= $this->endSection(); ?>