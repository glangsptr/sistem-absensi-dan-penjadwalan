<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_model');
		if (!$this->session->userdata('user_id')) {
            redirect('login'); 
        }
		$this->data['username'] = $this->session->userdata('username');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'Halaman Jadwal Kelas';
		$data['jadwal'] = $this->jadwal_model->get_data('tbl_jadwal')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('jadwal', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Jadwal';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_jadwal');
		$this->load->view('templates/footer');	
	}

		public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'id_jadwal' => $this->input->post('id_jadwal'),
				'jadwal_mapel' => $this->input->post('jadwal_mapel'),
				'jadwal_guru' => $this->input->post('jadwal_guru'),
				'jadwal_kelas' => $this->input->post('jadwal_kelas'),
				'jadwal_waktu' => $this->input->post('jadwal_waktu'),
			);

			$this->jadwal_model->insert_data($data, 'tbl_jadwal');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan!
			</div>');
			redirect('jadwal');
		}
	}

	public function edit($id_jadwal)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_jadwal' => $id_jadwal,
				'jadwal_mapel' => $this->input->post('jadwal_mapel'),
				'jadwal_guru' => $this->input->post('jadwal_guru'),
				'jadwal_kelas' => $this->input->post('jadwal_kelas'),
				'jadwal_waktu' => $this->input->post('jadwal_waktu'),
			);
			$this->jadwal_model->update_data($data, 'tbl_jadwal');
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert"> Data Berhasil Diubah!
			</div>');
			redirect('jadwal');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_jadwal', 'Hari', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('jadwal_mapel', 'Mata Pelajaran', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('jadwal_guru', 'Nama Dosen', 'required', array(
			'required' => '%s harus di isi !!'
		));
		$this->form_validation->set_rules('jadwal_kelas', 'Ruang Kelas', 'required', array(
			'required' => '%s harus di isi !!'
		));
		$this->form_validation->set_rules('jadwal_waktu', 'Jam Mulai / Jam Berakhir', 'required', array(
			'required' => '%s harus di isi !!'
		));		
	}

		public function delete($id)
	{
		$where = array('id_jadwal' => $id);

		$this->jadwal_model->delete($where, 'tbl_jadwal');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Data Berhasil Dihapus!
			</div>');
			redirect('jadwal');

	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */