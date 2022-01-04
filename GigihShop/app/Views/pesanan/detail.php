<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <?php 
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    ?>

    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mb-3 text-center">Detail Pesanan Saya</h2>
        </div>
    </div>

    
    <div class="row">
        <div class="col">

            <div class="row g-0 mb-3">
                <div class="card-group bg-white" id="cardKrj">
                    <div class="col d-flex flex-column">
                        <div class="card border-0" id="cardInputLogin">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Nomor Invoice</th>
                                        <td>
                                            <?php
                                                $date = str_replace('-', '', substr($pesanan[0]['created_at'], 0, 7));
                                                $noInvoice = 'INV/' . $date . '/' . $pesanan[0]['pesanan_id'];
                                                $link = 'https://wa.me/+628529075898?text=Hallo%20saya%20ingin%20nego%20untuk%20transaksi%20dengan%20no%20Invoice%20' . $noInvoice;
                                                echo ($noInvoice);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td><?= $pesanan[0]['nama_penerima']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= $pesanan[0]['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td><?= $pesanan[0]['nomor_telepon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pemesanan</th>
                                        <td><?= substr($pesanan[0]['created_at'], 0, 10); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <?php 
                                                switch ($pesanan[0]['status']) {
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
                                    </tr>
                                </tbody>
                            </table>    
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="card border-0 text-center" id="cardInputLogin">
                            <div class="card-body">
                                <h5>Petunjuk Transaksi</h5>
                                <p class="mb-4">Silahkan negosiasi terlebih dahulu untuk masalah harga dan ongkos kirim melalui whatsapp (WA) pada menu dibawah! Atau +628529075898</p>
                                <div class="d-grid gap-2 w-75 mx-auto">
                                    <button type="button" class="btn btn-primary mb-3 btn-lg" onclick="parent.open('<?= $link; ?>')" >
                                        Chat Penjual
                                        <i class="bi bi-whatsapp ms-2"></i>
                                    </button>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-dark mb-3 btn-lg" data-bs-toggle="modal" data-bs-target="#yakinHapus">
                                        Batalkan Pesanan
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
                                            Apakah anda yakin ingin menghapus pesanan ini?
                                          </div>
                                          <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <form action="/pesanan/delete/<?= $pesanan[0]['pesanan_id']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-warning">Iya, hapus!</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shadow-none p-3 border-0 mb-3 mt-1 bg-white accordion-item" id="accordionDetailBarang">
        <button class="accordion-button collapsed bg-transparent fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Detail Barang
        </button>
        <div id="flush-collapseOne" class="accordion-collapse collapse bg-light rounded-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Harga Dipilih</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($detail as $d) : ?>
                          <tr>
                              <th scope="row"><?= $i++; ?></th>
                              <td><?= $d['nama_barang']; ?></td>
                              <td>
                                  <?php 
                                      if ($d['barang_id'] == 6) {
                                          echo ("Untuk batu besar ini dapat dinegosiasi melalui whatsapp");
                                      } elseif ($d['harga_dipilih'] == 0) {
                                          echo ("Anda belum memilih harga, pilih melalui detail");
                                      } else {
                                          echo rupiah($d['harga_dipilih']);
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
                                  for($x = 0; $x < count($detail); $x++) {
                                      $hargaTotal += $detail[$x]['harga_dipilih'];
                                  }
                                  echo rupiah($hargaTotal);
                              ?>
                          </td>
                      </tfoot>
                  </table>
                      
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>