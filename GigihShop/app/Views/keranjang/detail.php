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

    <div class="row mb-3">
        <div class="col">
            
            <div class="row g-0">
                <div class="card-group bg-white" id="cardKrj">
                    <div class="col d-flex">
                        <div class="card border-0" id="cardKeranjangDetail">
                            <img src="/img/barang/<?= $keranjang['gambar']; ?>" class="img img-fluid d-flex" id="img">
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card border-0" id="cardInputLogin">
                            <p class="fw-bold fs-3"><?= $keranjang['nama_barang']; ?></p>
                            <p class="mb-1">Jumlah Pesanan</p>

                            <?php 
                                function rupiah($angka){
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                }
                            ?>

                            <form class="mb-3" action="/keranjang/update/<?= $keranjang['id']; ?>" method="POST">
                                <select name="pilihan" class="form-select mb-3" id="inputGroupSelect02">
                                    <option value="<?= $keranjang['harga1']; ?>">
                                        <?php
                                            echo rupiah($keranjang['harga1']); 
                                            echo (" Plastik 1 KG");
                                            if ($keranjang['harga1'] == 0) echo (" (Tidak tersedia!)"); 
                                        ?>
                                    </option>
                                    <option value="<?= $keranjang['harga2']; ?>">
                                        <?php
                                            echo rupiah($keranjang['harga2']); 
                                            echo (" Plastik 5 KG");
                                            if ($keranjang['harga2'] == 0) echo (" (Tidak tersedia!)"); 
                                        ?>
                                    </option>
                                    <option value="<?= $keranjang['harga3']; ?>">
                                        <?php
                                            echo rupiah($keranjang['harga3']); 
                                            echo (" Plastik 15 KG");
                                            if ($keranjang['harga3'] == 0) echo (" (Tidak tersedia!)"); 
                                        ?>
                                    </option>
                                    <option value="<?= $keranjang['harga4']; ?>">
                                        <?php
                                            echo rupiah($keranjang['harga4']); 
                                            echo (" Untuk 1/2 Pickup");
                                            if ($keranjang['harga4'] == 0) echo (" (Tidak tersedia!)"); 
                                        ?>
                                    </option>
                                    <option value="<?= $keranjang['harga5']; ?>">
                                        <?php
                                            echo rupiah($keranjang['harga5']); 
                                            echo (" Untuk 1 Pickup");
                                            if ($keranjang['harga5'] == 0) echo (" (Tidak tersedia!)"); 
                                        ?>
                                    </option>
                                    <option value="<?= $keranjang['harga6']; ?>">
                                        <?php
                                            echo rupiah($keranjang['harga6']); 
                                            echo (" Untuk 1/2 Truck");
                                            if ($keranjang['harga6'] == 0) echo (" (Tidak tersedia!)"); 
                                        ?>
                                    </option>
                                    <option value="<?= $keranjang['harga7']; ?>">
                                        <?php
                                            echo rupiah($keranjang['harga7']); 
                                            echo (" Untuk 1 Truck");
                                            if ($keranjang['harga7'] == 0) echo (" (Tidak tersedia!)");
                                        ?>
                                    </option>
                                </select>
                                <div class="mb-3">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Petunjuk
                                        <i class="bi bi-question-circle-fill"></i>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Petunjuk jumlah pesanan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fw-bold">Dimohon untuk memilih yang tersedia, nanti tetap bisa di negosiasi.</p>
                                                <p>
                                                    <?php
                                                        if ($keranjang['barang_id'] == 6) echo ("Untuk batu besar ini tidak ada patokan harga jadi dapat dinegosiasi melalui whatsapp");
                                                    ?>
                                                </p>
                                                <p class="m-0">Pilihan 1 Plastik Standing Pouch Untuk Ukuran 1Kg</p>
                                                <p class="m-0">Pilihan 2 Plastik PE 10Micron Untuk Ukuran 5Kg</p>
                                                <p class="m-0">Pilihan 3 Plastik PE 15Micron Untuk Ukuran 10Kg</p>
                                                <p class="m-0">Pilihan 4 Untuk ukuran 1/2 mobil pickup</p>
                                                <p class="m-0">Pilihan 5 Untuk ukuran 1 full mobil pickup</p>
                                                <p class="m-0">Pilihan 6 Untuk ukuran 1/2 truck</p>
                                                <p class="m-0">Pilihan 7 Untuk ukuran 1 truck</p>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Catatan" id="floatingTextarea" name="catatan" style="height: 100px"></textarea>
                                    <label for="floatingTextarea">Tambahkan Catatan Jika perlu</label>
                                </div>

                                <button class="btn btn-primary " type="submit">Simpan</button>
                            </form>
                                
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>