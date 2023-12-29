<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mapel_model');
		$this->load->model('User_model');
		if (!$this->session->userdata('user_id')) {
            redirect('login'); 
        }

		$this->data['username'] = $this->session->userdata('username');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'Halaman Mata Pelajaran';
		$data['mapel'] = $this->mapel_model->get_data('tbl_mapel')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('mapel', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah mapel';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_mapel');
		$this->load->view('templates/footer');	
	}

		public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama_mapel' => $this->input->post('nama_mapel'),
				'guru_mapel' => $this->input->post('guru_mapel'),
				'waktu_mapel' => $this->input->post('waktu_mapel'),
			);

			$this->mapel_model->insert_data($data, 'tbl_mapel');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan!
			</div>');
			redirect('mapel');
		}
	}

	public function edit($id_mapel)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_mapel' => $id_mapel,
				'nama_mapel' => $this->input->post('nama_mapel'),
				'guru_mapel' => $this->input->post('guru_mapel'),
				'waktu_mapel' => $this->input->post('waktu_mapel'),
			);
			$this->mapel_model->update_data($data, 'tbl_mapel');
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert"> Data Berhasil Diubah!
			</div>');
			redirect('mapel');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('guru_mapel', 'Nama Dosen', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('waktu_mapel', 'Waktu Perminggu', 'required', array(
			'required' => '%s harus di isi !!'
		));
	}

		public function delete($id)
	{
		$where = array('id_mapel' => $id);

		$this->mapel_model->delete($where, 'tbl_mapel');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Data Berhasil Dihapus!
			</div>');
			redirect('mapel');

	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */