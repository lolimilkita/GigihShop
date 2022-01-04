<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mb-3 text-center">Daftar Pesanan</h2>
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
                                <th scope="col">Nama Penerima</th>
                                <th scope="col">Kota dituju</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($pesanan as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['nama_penerima']; ?></td>
                                <td>
                                    <?php 
                                        foreach($kota as $k) {
                                            if ($p['kota_id'] == $k['kota_id']) {
                                                echo ($k['kota']);
                                            }
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        switch ($p['status']) {
                                            case 0:
                                                echo ('Proses negosiasi');
                                                break;
                                            case 1:
                                                echo ('Menunggu pembayaran');
                                                break;
                                            case 2:
                                                echo ('Pembayaran sedang divalidasi');
                                                break;
                                            case 3:
                                                echo ('Lunas');
                                                break;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="/pesanan/detail/<?= $p['pesanan_id']; ?>" class="btn btn-success mb-2">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>
    </div>
    
</div>
<?= $this->endSection(); ?>