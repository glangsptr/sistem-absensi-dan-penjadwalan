<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
	}

	public function index()
	{
		$data['title'] = 'Halaman Siswa';
		$data['siswa'] = $this->siswa_model->get_data('siswa')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('siswa', $data );
		$this->load->view('templates/footer');	
	}

	public function tambah()
	{
		$data['title'] = 'Input Data Siswa';

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
				'id_siswa' => $this->input->post('id_siswa'),
				'id_kelas' => $this->input->post('id_kelas'),
				'alamat' => $this->input->post('alamat'),
			);

			$this->siswa_model->insert_data($data, 'siswa');
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
 			 A simple primary alert— Data Berhasil Ditambahkan!
			</div>');
			redirect('siswa');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('id_siswa', 'NIS', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
			'required' => '%s harus di isi !!'
		));
	}
}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */