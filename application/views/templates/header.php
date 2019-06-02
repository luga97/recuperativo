<html>

<head>
  <title>Blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?php echo base_url(); ?>">Inicio</a>
        <a class="nav-item nav-link" href="<?php echo base_url(); ?>categories">Categorias</a>
        <?php if (!$this->session->userdata('logged_in')) : ?>
          <a class="nav-item nav-link" href="<?php echo base_url(); ?>users/login">Ingresar</a>
          <a class="nav-item nav-link" href="<?php echo base_url(); ?>users/register">Registrarse</a>
        <?php endif; ?>
        <?php if ($this->session->userdata('logged_in')) : ?>
          <a class="nav-item nav-link" href="<?php echo base_url(); ?>categories/create">Crear Categoria</a>
          <a class="nav-item nav-link" href="<?php echo base_url(); ?>posts/create">Crear Post</a>
          <a class="nav-item nav-link" href="<?php echo base_url(); ?>users/logout">Salir</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>



  <div class="container">
    <!-- Flash messages -->
    <?php if ($this->session->flashdata('user_registered')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_created')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_updated')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_created')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_created') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_deleted')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('login_failed')) : ?>
      <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedin')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedout')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_deleted')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_deleted') . '</p>'; ?>
    <?php endif; ?>