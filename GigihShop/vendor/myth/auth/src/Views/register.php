<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">

            <div class="card-group" id="cardLogin">

                <div class="card  border-0 justify-content-center" id="cardImgLogin">
                    <figure id="figure"><img src="/img/Saly-38.png" class="img-fluid" id="imgLogin"></figure>
                </div>
                
                <div class="card border-0" id="cardInputRegister">
                    <h2 class="card-header" id="cardHeaderRegister">Buat Akun</h2>
                    <div class="card-body">
        
                        <?= view('Myth\Auth\Views\_message_block') ?>
        
                        <form action="<?= route_to('register') ?>" method="post">
                            <?= csrf_field() ?>
        
                            <div class="form-group">
                                <label for="email"><?=lang('Auth.email')?></label>
                                <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                    name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                <small id="emailHelp" class="form-text text-muted">Kami tidak menyebarkan email anda</small>
                            </div>
        
                            <div class="form-group">
                                <label for="username"><?=lang('Auth.username')?></label>
                                <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                            </div>
        
                            <div class="form-group">
                                <label for="password"><?=lang('Auth.password')?></label>
                                <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                            </div>
        
                            <div class="form-group">
                                <label for="pass_confirm">Ulangi Password</label>
                                <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Ulangi Password" autocomplete="off">
                            </div>
        
                            <br>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                            </div>
        
                        </form>
        
        
                        <hr>
        
                        <p>Sudah Punya Akun? <a href="<?= route_to('login') ?>">Login</a></p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
