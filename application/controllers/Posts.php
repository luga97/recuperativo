<?php
class Posts extends CI_Controller
{
	//metodo que se llama al abrir el aplicativo
	public function index($offset = 0)
	{
		// en el readme se encuentra la informacion respectiva de la libreria pagination
		$config['base_url'] = base_url() . 'posts/index/';
		$config['total_rows'] = $this->db->count_all('posts'); //cuantos posts existen
		$config['per_page'] = 3; //cuantos mostraremos por pagina
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');

		$this->pagination->initialize($config);

		$data['title'] = 'Ultimos Posts'; //en $data almacenamos los datos que seran enviados a las vistas

		$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset); //obtenemos los posts desde la base de datos
		//cargamos las vistas
		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}
	//se llama para ver un post a detalle
	public function view($slug = NULL)
	{
		$data['post'] = $this->post_model->get_posts($slug); //obtenemos el post desde la base de datos
		$post_id = $data['post']['id'];
		$data['comments'] = $this->comment_model->get_comments($post_id); //obtenemos los comentarios de cada post

		if (empty($data['post'])) {
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}
	//lo usamos para crear un nuevo usuario
	public function create()
	{
		// verificamos que el usuario tenga una sesion iniciada, si no es asi lo redireccionamos al login
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$data['title'] = 'Crear un Post';

		$data['categories'] = $this->post_model->get_categories(); //obtenemos las categorias desde la base de datos

		// en el readme se encuentra la informacion respectiva de la libreria form validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		} else {
			// Subimos la foto
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			// la informacion respectiva a la libreria upload se encuentra en el readme
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->post_model->create_post($post_image); //enviamos el post en la base de datos

			$this->session->set_flashdata('post_created', 'Tu post ha sido creado');

			redirect('posts');
		}
	}
	//funciona para eliminar los post
	public function delete($id)
	{
		//checkeamos que el usuario esta logueado
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$this->post_model->delete_post($id); //eliminamos el post de la abse de datos

		$this->session->set_flashdata('post_deleted', 'Su post ha sido borrado exitosamente'); //informamos al usuario

		redirect('posts'); //redirecionamos a la pagina principal
	}

	//con este metodo editamos los post
	public function edit($slug)
	{
		//checkeamos que el usuario esta logueado

		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$data['post'] = $this->post_model->get_posts($slug); //obtenemos el post de la base de datos

		//verificamos que el usuario que creo el post sea el mismo que el que intenta eliminarlo
		if ($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']) {
			redirect('posts');
		}

		$data['categories'] = $this->post_model->get_categories(); //obtenemos las categorias

		//por si intentan abrir un post que no existe
		if (empty($data['post'])) {
			show_404();
		}

		$data['title'] = 'Editar Post';

		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
	}
	//enviamos la actualizacion del post a la base de datos
	public function update()
	{
		//checkeamos que el usuario esta logueado
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$this->post_model->update_post(); //le decimos a la base de datos que actualize el post

		$this->session->set_flashdata('post_updated', 'Tu post ha sido actualizado');

		redirect('posts');
	}
}
