<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">
	<div class="col-md-6 col-md-offset-6 mx-auto">
		<h1 class="text-center"><?= $title; ?></h1>
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" class="form-control" name="name" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label>Usuario</label>
			<input type="text" class="form-control" name="username" placeholder="Usuario">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Confirmar Password">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Registrar</button>
	</div>
</div>
<?php echo form_close(); ?>