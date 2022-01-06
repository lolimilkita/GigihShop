<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="align-items-start" id="navsAdmin">
                <div class="nav nav-fill nav-pills mb-2 bg-white p-1 rounded-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link m-1 btn btn-primary active" href="" id="v-pills-barang-tab" data-bs-target="#v-pills-barang" role="tab" aria-selected="true">Barang</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/kota" id="v-pills-kota-tab" data-bs-target="#v-pills-kota" role="tab" aria-selected="false">Kota</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/banner" id="v-pills-banner-tab" data-bs-target="#v-pills-banner" role="tab" aria-selected="false">Banner</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/pesanan" id="v-pills-pesanan-tab" data-bs-target="#v-pills-pesanan" role="tab" aria-selected="false">Pesanan</a>
                </div>
                <div class="tab-content flex-fill" id="v-pills-tabContent">
                    <div class="tabAdmin tab-pane fade show active" id="v-pills-barang" role="tabpanel">
                        <h4 class="text-center">Daftar Barang</h4>
                        <a href="/admin/barangcreate" class="btn btn-primary mb-2">
                            <i class="bi bi-file-earmark-plus-fill"></i>
                            Tambah Data Barang
                        </a>
                        <div class="d-flex pencarian">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari Barang..." name="keyword">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Cari</button>
                                </div>
                            </form>  
                        </div>
                        <?php if(session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (4 * ($currentPage - 1)); ?>
                                    <?php foreach($barang as $b) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><img src="/img/barang/<?= $b['gambar']; ?>" class="sampul img-fluid" ></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td>
                                            <?php 
                                                $kategori = $b['kategori_id'];
                                                switch ($kategori){
                                                    case '1':
                                                        echo ('Batu');
                                                        break;
                                                    case '2':
                                                        echo ('Pasir');
                                                        break;
                                                    case '3':
                                                        echo ('Tanah');
                                                        break;
                                                    case '4':
                                                        echo ('Jasa');
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="/admin/barangdetail/<?= $b['barang_id']; ?>" class="btn btn-success mb-2">Edit</a>
    
                                            <form action="/admin/barangdelete/<?= $b['barang_id']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Apakah anda yakin?');" data-bs-toggle="modal" data-bs-target="#yakinHapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $pager->links('barang', 'barang_pagination'); ?>
                        </div>
                    </div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-kota" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-banner" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-pesanan" role="tabpanel"></div>
                </div>
            </div>
                
        </div>
    </div>
</div>


<?= $this->endSection(); ?>