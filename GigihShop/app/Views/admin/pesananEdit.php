<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-outline-success d-inline-flex align-items-center mb-3" href="/admin/pesanan">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left me-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Kembali
            </a>

            <div class="card border-0 mb-4" id="cardKeranjang">
                <h2 class="mb-4 text-center">Form Ubah Status Pesanan</h2>
                
                <h4 class="fw-bold mb-3">No Invoice</h4>
                <p class="mb-4">
                    <?php 
                        $date = str_replace('-', '', substr($pesanan['created_at'], 0, 7));
                        $noInvoice = 'INV/' . $date . '/' . $pesanan['pesanan_id'];
                        echo ($noInvoice);
                    ?>
                </p>

                <form action="/admin/pesananupdate/<?= $pesanan['pesanan_id']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <h5>Pilih Status</h5>
                    <select class="form-select" name="status" aria-label="Pilih Status..." required>
                        <option selected value="">Pilih Status...</option>
                        <option value="0">Proses negosiasi</option>
                        <option value="1">Menunggu pembayaran</option>
                        <option value="2">Pembayaran sedang divalidasi</option>
                        <option value="3">Lunas</option>
                        <option value="4">Proses pengiriman</option>
                        <option value="5">Selesai</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>