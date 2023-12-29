<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('absensi_model');
		if (!$this->session->userdata('user_id')) {
            redirect('login'); 
        }
		$this->data['username'] = $this->session->userdata('username');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');	
		$data['title'] = 'Absensi';
		$data['absensi'] = $this->absensi_model->get_data('tbl_absensi')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('absensi', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Absensi';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_absensi');
		$this->load->view('templates/footer');	
	}

		public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'tanggal_absensi' => $this->input->post('tanggal_absensi'),
				'nama_mapel' => $this->input->post('nama_mapel'),
				'kelas_absensi' => $this->input->post('kelas_absensi'),
				'total_absensi' => $this->input->post('total_absensi'),
			);

			$this->absensi_model->insert_data($data, 'tbl_absensi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan!
			</div>');
			redirect('absensi');
		}
	}

	public function edit($id_absensi)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_absensi' => $id_absensi,
				'tanggal_absensi' => $this->input->post('tanggal_absensi'),
				'nama_mapel' => $this->input->post('nama_mapel'),
				'kelas_absensi' => $this->input->post('kelas_absensi'),
				'total_absensi' => $this->input->post('total_absensi'),
			);
			$this->absensi_model->update_data($data, 'tbl_absensi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert"> Data Berhasil Diubah!
			</div>');
			redirect('absensi');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('tanggal_absensi', 'Hari / Tanggal', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('nama_mapel', 'Mapel', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('kelas_absensi', 'Ruang Kelas', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('total_absensi', 'Jumlah Absensi', 'required', array(
			'required' => '%s harus di isi !!'
		));
	}

	public function delete($id)
	{
		$where = array('id_absensi' => $id);

		$this->absensi_model->delete($where, 'tbl_absensi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Data Berhasil Dihapus!
			</div>');
			redirect('siswa');

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */