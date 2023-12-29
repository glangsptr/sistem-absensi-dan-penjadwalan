<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->model('user_model');

        if (!$this->session->userdata('user_id')) {
            redirect('login'); 
        }
        
        // Add the username data to the $data array
        $this->data['username'] = $this->session->userdata('username');
    }

	public function index()
	{
		$data['title'] = 'Halaman Guru';
		$data['username'] = $this->session->userdata('username');
		$data['guru'] = $this->guru_model->get_data('tbl_guru')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('guru', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Guru';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_guru');
		$this->load->view('templates/footer');	
	}



	public function tambah_aksi()
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->tambah();
    } else {
      
     
        $data = array(
            'nama_guru' => $this->input->post('nama_guru'),
            'mapel_guru' => $this->input->post('mapel_guru'),
            'alamat_guru' => $this->input->post('alamat_guru'),
           
        );   
		
		$guru = "guru";
		$hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$user = array(
			'username' => $this->input->post('username'),
            'password' => $hashed_password,
			'status'=> $guru
		);
		$this->user_model->insert_data($user,'tb_user');
        $this->guru_model->insert_data($data, 'tbl_guru');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan!</div>');
        redirect('guru');
    }
}




	public function edit($id_guru)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_guru' => $id_guru,
				'nama_guru' => $this->input->post('nama_guru'),
				'mapel_guru' => $this->input->post('mapel_guru'),
				'alamat_guru' => $this->input->post('alamat_guru'),
			);
			$this->guru_model->update_data($data, 'tbl_guru');
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert"> Data Berhasil Diubah!
			</div>');
			redirect('guru');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('mapel_guru', 'Mata Pelajaran', 'required', array(
			'required' => '%s harus di isi !!'
		));

		$this->form_validation->set_rules('alamat_guru', 'Alamat', 'required', array(
			'required' => '%s harus di isi !!'
		));
	}

		public function delete($id)
	{
		$where = array('id_guru' => $id);

		$this->guru_model->delete($where, 'tbl_guru');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Data Berhasil Dihapus!
			</div>');
			redirect('guru');

	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */