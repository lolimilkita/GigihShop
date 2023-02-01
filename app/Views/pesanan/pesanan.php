<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-outline-success d-inline-flex align-items-center" href="/keranjang">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left me-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
                Kembali
            </a>
                
        </div>
    </div>

    <?php 
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    ?>

    <div class="row mb-3">
        <div class="col">
            
            <div class="row g-0">
                <div class="card-group bg-white" id="cardKrj">
                    <div class="col">
                        <div class="card border-0" id="cardKeranjangDetail">
                            <h4 class="card-header border-0 bg-white">Detail Pesanan</h4>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga Dipilih</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($keranjang as $k) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
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
                                                            case $k['harga5']:
                                                                echo rupiah($k['harga_dipilih']) , " (1/2 Truck)";
                                                                break;
                                                            case $k['harga6']:
                                                                echo rupiah($k['harga_dipilih']) , " (1 Truck)";
                                                                break;
                                                        }
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <td colspan="2" class="fw-bold">Total harga</td>
                                        <td>
                                            <?php
                                                for($x = 0; $x < count($keranjang); $x++) {
                                                    $hargaTotal += $keranjang[$x]['harga_dipilih'];
                                                }
                                                echo rupiah($hargaTotal);
                                            ?>
                                        </td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0" id="cardKeranjangDetail">
                            <h4 class="card-header border-0 bg-white">Alamat Pengiriman</h4>
                            <div class="card-body">
                                <?= csrf_field(); ?>
                                <form action="/pesanan/savepesanan" method="POST">
                                    <div class="mb-3">
                                        <label for="namePenerima" class="form-label">Nama Penerima</label>
                                        <input class="form-control <?= ($validation->hasError('namePenerima')) ? 'is-invalid' : ''; ?>" id="namePenerima" name="namePenerima" value="<?= old('namePenerima'); ?>" >
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('namePenerima'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomorTelp" class="form-label">Nomor Telepon</label>
                                        <input class="form-control <?= ($validation->hasError('nomorTelp')) ? 'is-invalid' : ''; ?>" id="nomorTelp" name="nomorTelp" value="<?= old('nomorTelp'); ?>" >
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nomorTelp'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Pengiriman</label>
                                        <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>" ></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select name="kota" class="form-select" id="datalistOptions" required>
                                            <option selected value="">Pilih kota..</option>
                                            <?php foreach($kota as $k) : ?>
                                                <option value="<?= $k['kota_id']; ?>">
                                                    <?php echo ($k['kota']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>