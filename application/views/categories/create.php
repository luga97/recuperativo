<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
<div class="form-group">
	<label>Ingrese el nombre de la categoria</label>
	<input type="text" class="form-control" name="name" placeholder="Nombre">
</div>
<button type="submit" class="btn btn-default btn-primary">Crear</button>
</form>