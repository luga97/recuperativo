<?php
class Users extends CI_Controller
{
	// Registrar usuario
	public function register()
	{
		$data['title'] = 'Registrese sus datos';
		// en el readme se encuentra la informacion respectiva de la libreria form validation
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {
			// Encriptamos el password
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

			//en el readme se encuentra la informacion respectiva de la libreria session
			$this->session->set_flashdata('user_registered', 'Ya estas registrado y puedes iniciar sesion.');

			redirect('posts');
		}
	}

	// Se llama cuando deseas logearte como usuario
	public function login()
	{
		$data['title'] = 'Ingrese';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		} else {

			// Obtener usuario
			$username = $this->input->post('username');
			// obtener la contraseña encriptada
			$password = md5($this->input->post('password'));

			// Login user
			$user_id = $this->user_model->login($username, $password);

			if ($user_id) {
				// Creamos la sesion
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				// Set message
				$this->session->set_flashdata('user_loggedin', 'Has ingresado exitosamente!');

				redirect('posts');
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Datos incorrectos, por favor intente nuevamente');

				redirect('users/login');
			}
		}
	}

	// Cerrar sesion
	public function logout()
	{
		// Unset datos de usuario
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('user_loggedout', 'Has salido exitosamente');

		redirect('users/login');
	}

	// Verificar si el usuario existe (para registrar nuevos y no repetir el username)
	public function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'Ese nombre de usuario ya esta siendo utilizado. Por favor intente con uno nuevo ');
		if ($this->user_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}

	// Verificar si el correo existe
	public function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'Ya hay un usuario registrado con ese correo electronico.');
		if ($this->user_model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}
