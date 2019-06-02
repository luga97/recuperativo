<?php
//controlador de las categorias
class Categories extends CI_Controller
{
	//se llama cuando abrimos el segmento de categorias
	public function index()
	{
		//la variable data se envia a la vista, comunmente posee los datos traidos de los modelos y el titulo a mostrar en la pagina
		$data['title'] = 'Categorias'; //asignamos el titulo de la pagina

		$data['categories'] = $this->category_model->get_categories(); //traemos las categorias desde la base de datos
		//cargamos las vistas
		$this->load->view('templates/header');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');
	}
	//para crear una sesion
	public function create()
	{
		// validamos la sesion
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$data['title'] = 'Crear categoria';
		// en el readme se encuentra la informacion respectiva de la libreria form validation
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->category_model->create_category();

			//en el readme se encuentra la informacion respectiva de la libreria session
			$this->session->set_flashdata('category_created', 'Tu categoria ha sido creada');
			//despues de haber creado una categoria redireccionamos a la pagina principal de categorias
			redirect('categories');
		}
	}
	//obtener los post especificos de una categoria
	public function posts($id)
	{
		$data['title'] = $this->category_model->get_category($id)->name;

		$data['posts'] = $this->post_model->get_posts_by_category($id); //obtenemos los post por categoria

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{ 	/*
		* Con este metodo eliminamos las categorias 
		*/
		// verificamos que el usuario este logueado
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}
		//le decimos al modelo que la elimine en la base de datos
		$this->category_model->delete_category($id);

		// Le decimos al usuario lo que sucede
		$this->session->set_flashdata('category_deleted', 'la categoria ha sido eliminada exitosamente');

		redirect('categories');
	}
}
