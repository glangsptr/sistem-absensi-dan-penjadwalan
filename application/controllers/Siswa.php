<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
		if (!$this->session->userdata('user_id')) {
            redirect('login'); 
        }
		$this->data['username'] = $this->session->userdata('username');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');	
		$data['title'] = 'Halaman Siswa';
		$data['siswa'] = $this->siswa_model->get_data('tbl_siswa')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('siswa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Siswa';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_siswa');
		$this->load->view('templates/footer');	
	}

		public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama_siswa' => $this->input->post('nama_siswa'),
				'kelas_siswa' => $this->input->post('kelas_siswa'),
				'alamat_siswa' => $this->input->post('alamat_siswa'),
			);

			$this->siswa_model->insert_data($data, 'tbl_siswa');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan!
			</div>');
			redirect('siswa');
		}
	}

	public function edit($id_siswa)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_siswa' => $id_siswa,
				'nama_siswa' => $this->input->post('nama_siswa'),
				'kelas_siswa' => $this->input->post('kelas_siswa'),
				'alamat_siswa' => $this->input->post('alamat_siswa'),
			);
			$this->siswa_model->update_data($data, 'tbl_siswa');
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert"> Data Berhasil Diubah!
			</div>');
			redirect('siswa');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('kelas_siswa', 'Kelas', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('alamat_siswa', 'Alamat', 'required', array(
			'required' => '%s harus di isi !!'
		));
	}

	public function delete($id)
	{
		$where = array('id_siswa' => $id);

		$this->siswa_model->delete($where, 'tbl_siswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Data Berhasil Dihapus!
			</div>');
			redirect('siswa');

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */