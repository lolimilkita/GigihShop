<?= $this->extend($config->viewLayout) ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">

        <div class="card-group" id="cardLogin">

            <div class="card  border-0 justify-content-center" id="cardImgLogin">
                <figure id="figure"><img src="/img/Saly-39.png" class="img-fluid" id="imgLogin"></figure>
            </div>

            <div class="card border-0" id="cardInputRegister">
                <h2 class="card-header" id="cardHeaderRegister">Ganti Password Anda</h2>
                <div class="card-body">
    
                    <?= view('Myth\Auth\Views\_message_block') ?>
    
                    <p>Masukan kode yang anda terima di email Anda, email Anda, dan password baru Anda</p>
    
                    <form action="<?= route_to('reset-password') ?>" method="post">
                        <?= csrf_field() ?>
    
                        <div class="form-group">
                            <label for="token">Kode Anda</label>
                            <input type="text" class="form-control <?php if(session('errors.token')) : ?>is-invalid<?php endif ?>"
                                   name="token" placeholder="kode" value="<?= old('token', $token ?? '') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="email"><?=lang('Auth.email')?></label>
                            <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
    
                        <br>
    
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                   name="password">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="pass_confirm">Ulangi Password Baru</label>
                            <input type="password" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                   name="pass_confirm">
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>
    
                        <br>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
                        </div>
                    </form>
    
                </div>
            </div>

        </div>


        </div>
    </div>
</div>

<?= $this->endSection() ?>
