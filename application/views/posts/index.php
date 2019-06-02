<h2><?= $title ?></h2>
<!-- imprimimos los posts traidos desde la base de datos -->
<?php foreach ($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<div class="row">
		<div class="col-md-3 mb-5">
			<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
		</div>
		<div class="col-md-9">
			<small class="post-date">Fecha de publicion: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small><br>
			<?php echo word_limiter($post['body'], 60); ?>
			<br><br>
			<p><a class="btn btn-default btn-primary" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Leer más</a></p>
		</div>
	</div>
<?php endforeach; ?>
<!-- Paginizamos los post, mostramos maximo 3 por pagina -->
<div class="pagination-links">
	<?php echo $this->pagination->create_links(); ?>
</div>