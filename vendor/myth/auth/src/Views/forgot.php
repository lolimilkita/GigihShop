<?= $this->extend($config->viewLayout) ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">

            <div class="card-group" id="cardLogin">

                <div class="card  border-0 justify-content-center" id="cardImgLogin">
					<figure id="figure"><img src="/img/Saly-39.png" class="img-fluid" id="imgLogin"></figure>
				</div>

                <div class="card border-0" id="cardInputLogin">
                    <h2 class="card-header" id="cardHeaderLogin">Lupa Password?</h2>
                    <div class="card-body">
    
                        <?= view('Myth\Auth\Views\_message_block') ?>
    
                        <p>Tidak masalah! Masukkan email anda dan kami akan mengirimkan kode untuk merubah password anda</p>
    
                        <form action="<?= route_to('forgot') ?>" method="post">
                            <?= csrf_field() ?>
    
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                       name="email" aria-describedby="emailHelp" placeholder="Masukkan Email Anda">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>
    
                            <br>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Kirimkan</button>
                            </div>
                        </form>
    
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<?= $this->endSection() ?>
