<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="align-items-start" id="navsAdmin">
                <div class="nav nav-fill nav-pills mb-2 bg-white p-1 rounded-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link m-1 btn btn-primary" href="/admin" id="v-pills-barang-tab" data-bs-target="#v-pills-barang" role="tab" aria-selected="false">Barang</a>
                    <a class="nav-link m-1 btn btn-primary active" href="" id="v-pills-kota-tab" data-bs-target="#v-pills-kota" role="tab" aria-selected="true">Kota</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/banner" id="v-pills-banner-tab" data-bs-target="#v-pills-banner" role="tab" aria-selected="false">Banner</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/pesanan" id="v-pills-pesanan-tab" data-bs-target="#v-pills-pesanan" role="tab" aria-selected="false">Pesanan</a>
                </div>
                <div class="tab-content flex-fill" id="v-pills-tabContent">
                    <div class="tabAdmin tab-pane fade" id="v-pills-barang" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade show active" id="v-pills-kota" role="tabpanel">
                        <h4 class="text-center">Daftar Kota</h4>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-file-earmark-plus-fill"></i>
                            Tambah Data Kota
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content border-0">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Kota</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <form action="/admin/kotasave" method="POST">
                                            <?= csrf_field(); ?>
                                            <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Kota</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama" placeholder="contoh Jakarta" required>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <?php if(session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kota</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($kota as $k) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $k['kota']; ?></td>
                                            <td>
                                                <a href="/admin/kotaedit/<?= $k['kota_id']; ?>" class="btn btn-success mb-2">Edit</a>
                                                
                                                <form action="/admin/kotadelete/<?= $k['kota_id']; ?>" method="POST" class="d-inline">
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
                        </div>                            
                    </div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-banner" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-pesanan" role="tabpanel"></div>
                </div>
            </div>
                
        </div>
    </div>
</div>


<?= $this->endSection(); ?>