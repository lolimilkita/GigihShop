<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="align-items-start" id="navsAdmin">
                <div class="nav nav-fill nav-pills mb-2 bg-white p-1 rounded-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link m-1 btn btn-primary" href="/admin" id="v-pills-barang-tab" data-bs-target="#v-pills-barang" role="tab" aria-selected="false">Barang</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/kota" id="v-pills-kota-tab" data-bs-target="#v-pills-kota" role="tab" aria-selected="false">Kota</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/banner" id="v-pills-banner-tab" data-bs-target="#v-pills-banner" role="tab" aria-selected="false">Banner</a>
                    <a class="nav-link m-1 btn btn-primary active" href="" id="v-pills-pesanan-tab" data-bs-target="#v-pills-pesanan" role="tab" aria-selected="true">Pesanan</a>
                </div>
                <div class="tab-content flex-fill" id="v-pills-tabContent">
                    <div class="tabAdmin tab-pane fade" id="v-pills-barang" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-kota" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-banner" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade show active" id="v-pills-pesanan" role="tabpanel">
                        <h4 class="text-center">Daftar Pesanan</h4>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Invoice</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Nama Penerima</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($pesanan as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td>
                                                <?php 
                                                    $date = str_replace('-', '', substr($p['created_at'], 0, 7));
                                                    $noInvoice = 'INV/' . $date . '/' . $p['pesanan_id'];
                                                    echo ($noInvoice);
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
                                                        case 4:
                                                            echo ('Proses pengiriman');
                                                            break;
                                                        case 5:
                                                            echo ('Selesai');
                                                            break;
                                                    }
                                                ?>
                                            </td>
                                            <td><?= $p['nama_penerima']; ?></td>
                                            <td>
                                                <a href="/admin/pesanandetail/<?= $p['pesanan_id']; ?>" class="btn btn-success mb-2">Detail</a>
                                                <a href="/admin/pesananedit/<?= $p['pesanan_id']; ?>" class="btn btn-outline-dark mb-2">Update Status</a>
                                                
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
    </div>
</div>


<?= $this->endSection(); ?>