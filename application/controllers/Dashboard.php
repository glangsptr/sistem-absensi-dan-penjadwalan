<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('user_id')) {
            // Jika tidak ada sesi user_id, redirect ke halaman login
            redirect('login'); 
        }
		$this->data['username'] = $this->session->userdata('username');
    }


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */