<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    
    <div class="row mb-3">
        <div class="col">
            
            <div class="row g-0">
                <div class="card-group bg-white" id="cardKrj">
                    <div class="col d-flex">
                        <div class="card border-0" id="cardKeranjangDetail">
                            <img src="/img/gambarrumah.jpeg" class="img img-fluid" style="max-width: 400px;" >
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card border-0" id="cardInputLogin">
                            <h4 class="fw-bold fs-3">Hubungi Kami</h4>
                            <p>Anda dapat menghubi kami melalui whatsapp ataupun datang langsung ke kantor kami</p>
                            <h5>Whatsapp</h5>
                            <p>
                                <i class="bi bi-whatsapp"></i>
                                +6285-2907-5898
                            </p>
                            <h5>Kantor</h5>
                            <p>
                                <i class="bi bi-geo-alt-fill"></i>
                                JL. Flamboyan No.5 Desa/Kel Plandi RT.003 RW.001 Kec.Purwodadi Kab.Purworejo
                            </p>            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>