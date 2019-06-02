<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Fecha de publicacion: <?php echo $post['created_at']; ?></small><br>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<br>
<hr>
<div class="post-body">
	<?php echo $post['body']; ?>
</div>
<!-- si el usuario creo el post, podra eliminarlo -->
<?php if ($this->session->userdata('user_id') == $post['user_id']) : ?>
	<hr>
	<a class="btn btn-default btn-primary pull-left mb-2" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Editar</a>
	<?php echo form_open('/posts/delete/' . $post['id']); ?>
	<input type="submit" value="Eliminar" class="btn btn-danger">
	</form>
<?php endif; ?>
<hr>
<h3>Commentarios</h3>
<?php if ($comments) : ?>
	<?php foreach ($comments as $comment) : ?>
		<div class="well">
			<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No hay comentarios en esta publicacion</p>
<?php endif; ?>
<hr>
<h3>Añadir un Comentario</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/' . $post['id']); ?>
<div class="form-group">
	<label>Nombre</label>
	<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
	<label>Correo</label>
	<input type="text" name="email" class="form-control">
</div>
<div class="form-group">
	<label>Comentario</label>
	<textarea name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button class="btn btn-primary" type="submit">Comentar</button>
</form>