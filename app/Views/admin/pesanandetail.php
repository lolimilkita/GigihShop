<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
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
                                            $date = str_replace('-', '', substr($pesanan['created_at'], 0, 7));
                                            $noInvoice = 'INV/' . $date . '/' . $pesanan['pesanan_id'];
                                            $link = 'https://wa.me/+628529075898?text=Hallo%20saya%20ingin%20nego%20untuk%20transaksi%20dengan%20no%20Invoice%20' . $noInvoice;
                                            echo ($noInvoice);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td><?= $pesanan['nama_penerima']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= $pesanan['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td><?= $pesanan['nomor_telepon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pemesanan</th>
                                        <td><?= substr($pesanan['created_at'], 0, 10); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <?php
                                            switch ($pesanan['status']) {
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
                                    <button type="button" class="btn btn-primary mb-3 btn-lg" onclick="parent.open('<?= $link; ?>')">
                                        Chat Penjual
                                        <i class="bi bi-whatsapp ms-2"></i>
                                    </button>

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
                        <?php foreach ($detail as $d) : ?>
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
                            $hargaTotal = 0;
                            for ($x = 0; $x < count($detail); $x++) {
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