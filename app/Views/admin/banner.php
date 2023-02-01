<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="align-items-start" id="navsAdmin">
                <div class="nav nav-fill nav-pills mb-2 bg-white p-1 rounded-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link m-1 btn btn-primary" href="/admin" id="v-pills-barang-tab" data-bs-target="#v-pills-barang" role="tab" aria-selected="false">Barang</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/kota" id="v-pills-kota-tab" data-bs-target="#v-pills-kota" role="tab" aria-selected="false">Kota</a>
                    <a class="nav-link m-1 btn btn-primary active" href="" id="v-pills-banner-tab" data-bs-target="#v-pills-banner" role="tab" aria-selected="true">Banner</a>
                    <a class="nav-link m-1 btn btn-primary" href="/admin/pesanan" id="v-pills-pesanan-tab" data-bs-target="#v-pills-pesanan" role="tab" aria-selected="false">Pesanan</a>
                </div>
                <div class="tab-content flex-fill" id="v-pills-tabContent">
                    <div class="tabAdmin tab-pane fade" id="v-pills-barang" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade" id="v-pills-kota" role="tabpanel"></div>
                    <div class="tabAdmin tab-pane fade show active" id="v-pills-banner" role="tabpanel">
                        <h4 class="text-center">Daftar Banner</h4>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-file-earmark-plus-fill"></i>
                            Tambah Data Banner
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content border-0">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Banner</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <form action="/admin/bannersave" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <img src="/img/bannerdefault.jpg" class="img-fluid img-thumbnail img-preview" id="banner">
                                            <p>Kami menyarankan ukuran gambar 1200px X 300px</p>
                                            <div class="mb-2">
                                                <label for="gambar" class="form-label">Upload Gambar</label>
                                                <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambarLabel" name="gambar" onchange="previewImg()">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('gambar'); ?>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Banner</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama" placeholder="contoh Jakarta" required>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                </div>
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
                                        <th scope="col">gambar</th>
                                        <th scope="col">Nama Banner</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($banner as $b) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><img src="/img/<?= $b['gambar']; ?>" class="gambarCreate img-fluid" ></td>
                                            <td><?= $b['banner']; ?></td>
                                            <td>
                                                <a href="/admin/banneredit/<?= $b['banner_id']; ?>" class="btn btn-success mb-2">Edit</a>
                                                
                                                <form action="/admin/bannerdelete/<?= $b['banner_id']; ?>" method="POST" class="d-inline">
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
                    <div class="tabAdmin tab-pane fade" id="v-pills-pesanan" role="tabpanel"></div>
                </div>
            </div>
                
        </div>
    </div>
</div>


<?= $this->endSection(); ?>