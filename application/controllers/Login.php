<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
        $this->load->view('login');
	}

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->user_model->get_user_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('username', $user['username']);
            redirect('dashboard'); 
        } else {
            $this->session->set_flashdata('error', 'Username atau password tidak valid.');
            redirect('login');
        }
    }

    public function logout() {
    
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */