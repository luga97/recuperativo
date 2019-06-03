<?php
//modelo de usuarios
class User_model extends CI_Model
{
	//para registrar nuevos usuarios
	public function register($enc_password)
	{
		// User data array
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $enc_password,
			'created_at' => date('Y-m-d H:i:s')
		);

		// Insertamos el usuario en la base de datos
		return $this->db->insert('users', $data);
	}

	//Hacer login  a un usuario
	public function login($username, $password)
	{
		// Validamos los datos
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row(0)->id;
		} else {
			return false;
		}
	}

	// Verificar que el username que se intenta registrar no este dentro de la base de datos
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));
		$tmp= $query->row_array();
		if (empty($tmp)) {
			return true;
		} else {
			return false;
		}
	}

	// Verificar que el email que se intenta registrar no este dentro de la base de datos

	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));

		$tmp1= $query->row_array();
		if (empty($tmp1)) {
			return true;
		} else {
			return false;
		}
	}
}
