<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
<div class="form-group">
  <label>Inserte un titulo</label>
  <input type="text" class="form-control" name="title" placeholder="titulo">
</div>
<div class="form-group">
  <label>Cuerpo del post</label>
  <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
</div>
<div class="form-group">
  <label>Categoria</label>
  <select name="category_id" class="form-control">
    <?php foreach ($categories as $category) : ?>
      <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
  </select>
</div>
<div class="form-group">
  <label>Subir imagenes</label>
  <input class="form-control-file" type="file" name="userfile" size="20">
</div>
<button type="submit" class="btn btn-default btn-primary">Subir post</button>
</form>