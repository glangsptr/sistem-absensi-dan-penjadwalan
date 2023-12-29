<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelas_model');
		if (!$this->session->userdata('user_id')) {
            redirect('login'); 
        }
		$this->data['username'] = $this->session->userdata('username');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'Halaman Kelas';
		$data['kelas'] = $this->kelas_model->get_data('tbl_kelas')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kelas', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Kelas';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_kelas');
		$this->load->view('templates/footer');	
	}

		public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama_kelas' => $this->input->post('nama_kelas'),
				'wali_kelas' => $this->input->post('wali_kelas'),
				'anggota_kelas' => $this->input->post('anggota_kelas'),
			);

			$this->kelas_model->insert_data($data, 'tbl_kelas');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan!
			</div>');
			redirect('kelas');
		}
	}

	public function edit($id_kelas)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_kelas' => $id_kelas,
				'nama_kelas' => $this->input->post('nama_kelas'),
				'wali_kelas' => $this->input->post('wali_kelas'),
				'anggota_kelas' => $this->input->post('anggota_kelas'),
			);
			$this->kelas_model->update_data($data, 'tbl_kelas');
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert"> Data Berhasil Diubah!
			</div>');
			redirect('kelas');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kelas', 'Kelas', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('anggota_kelas', 'Anggota Kelas', 'required', array(
			'required' => '%s harus di isi !!'
		));
	}

		public function delete($id)
	{
		$where = array('id_kelas' => $id);

		$this->kelas_model->delete($where, 'tbl_kelas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Data Berhasil Dihapus!
			</div>');
			redirect('kelas');

	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */