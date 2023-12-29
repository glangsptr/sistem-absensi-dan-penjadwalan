<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// public function get_data($table)
	// {
	// 	return $this->db->get($table);
	// }

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

    public function get_user_by_username($username) {
        $query = $this->db->get_where('tb_user', array('username' => $username));
        return $query->row_array(); 
    }

	// public function update_data($data, $table)
	// {
	// 	$this->db->where('id_guru', $data['id_guru']);
	// 	$this->db->update($table, $data);
	// }

	// public function delete($where, $table)
	// {

	// 	$this->db->where($where);
	// 	$this->db->delete($table);
	// }

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */