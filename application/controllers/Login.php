<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('manage/content/login');
	}

	function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("app_users",$where)->num_rows();
		$data = $this->m_login->getData($email);
		if($cek > 0){
			$data_session = array(
                'id_user' => $data[0]['id'],
                'nama' => $data[0]['fullname'],
                'id_user_role' => $data[0]['id_user_role'],
				'email' => $email,
				'status' => "login"
			);
			// print_r($data_session);
			$this->session->set_userdata($data_session);

			redirect(base_url("manage/dashboard"));

		}else{
            echo "<script>alert('Username dan password salah !');</script>";
            redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}