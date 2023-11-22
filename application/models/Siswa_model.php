<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data, $table)
	{
		$this->db->insert('$table', $data);
	}

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */