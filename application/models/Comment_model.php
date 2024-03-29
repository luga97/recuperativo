<?php
class Comment_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	//crear un comentario
	public function create_comment($post_id)
	{
		$data = array(
			'post_id' => $post_id,
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'body' => $this->input->post('body'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('comments', $data);
	}
	// obtener comentarios
	public function get_comments($post_id)
	{
		$query = $this->db->get_where('comments', array('post_id' => $post_id));
		return $query->result_array();
	}
}
