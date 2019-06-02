<?php
//modelo para las categorias
class Category_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database(); //cargamos la base de datos
	}

	public function get_categories()
	{
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array(); //retorna el array con las categorias ya ordenadas por nombre
	}
	//crear una categoria nueva
	public function create_category()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'user_id' => $this->session->userdata('user_id'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('categories', $data);
	}
	//obtener la categoria
	public function get_category($id)
	{
		$query = $this->db->get_where('categories', array('id' => $id));
		return $query->row();
	}

	//eliminar categoria
	public function delete_category($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('categories');
		return true;
	}
}
