<?php
//Controlador de los comentarios
class Comments extends CI_Controller
{
	//se llama cuando se desea realizar un comentario
	public function create($post_id)
	{
		//la variable data se envia a la vista, comunmente posee los datos traidos de los modelos y el titulo a mostrar en la pagina
		$slug = $this->input->post('slug'); //obtenemos el slug del post
		$data['post'] = $this->post_model->get_posts($slug); //obtenemos el post mediante su $slug
		// en el readme se encuentra la informacion respectiva de la libreria form validation
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		} else {
			$this->comment_model->create_comment($post_id); //le decimos al modelo que almacene el comentario en la base de datos
			redirect('posts/' . $slug); //redireccionamos al post que estabamos viendo
		}
	}
}
