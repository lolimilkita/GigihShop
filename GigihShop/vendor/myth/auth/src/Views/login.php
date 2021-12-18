<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-11">

			<div class="card-group" id="cardLogin">

				<div class="card  border-0 justify-content-center" id="cardImgLogin">
					<figure id="figure"><img src="/img/Saly-38.png" class="img-fluid" id="imgLogin"></figure>
				</div>

				<div class="card  border-0" id="cardInputLogin">
					<h2 class="card-header" id="cardHeaderLogin"><?=lang('Auth.loginTitle')?></h2>
					<div class="card-body">

						<?= view('Myth\Auth\Views\_message_block') ?>

						<form action="<?= route_to('login') ?>" method="post">
							<?= csrf_field() ?>

							<?php if ($config->validFields === ['email']): ?>
								<div class="form-group">
									<label for="login"><?=lang('Auth.email')?></label>
									<input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
										name="login" placeholder="<?=lang('Auth.email')?>">
									<div class="invalid-feedback">
										<?= session('errors.login') ?>
									</div>
								</div>
							<?php else: ?>
								<div class="form-group">
									<label for="login">Email atau Username</label>
									<input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
										name="login" placeholder="Email atau Username">
									<div class="invalid-feedback">
										<?= session('errors.login') ?>
									</div>
								</div>
							<?php endif; ?>

							<div class="form-group">
								<label for="password"><?=lang('Auth.password')?></label>
								<input type="password" name="password" class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
								<div class="invalid-feedback">
									<?= session('errors.password') ?>
								</div>
							</div>

							<?php if ($config->allowRemembering): ?>
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
										<?=lang('Auth.rememberMe')?>
									</label>
								</div>
							<?php endif; ?>

							<br>

							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary btn-block">Masuk</button>
								<?php if ($config->allowRegistration) : ?>
									<a class="btn btn-outline-secondary" href="<?= route_to('register') ?>">Buat Akun</a>
								<?php endif; ?>
							</div>

						</form>

						<hr>

						<?php if ($config->activeResetter): ?>
							<p><a href="<?= route_to('forgot') ?>">Lupa Password?</a></p>
						<?php endif; ?>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>

<?= $this->endSection() ?>
