<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('m_site','site');
		// $this->load->model('m_manage','manage');
		$this->load->library('email'); 
  //       if (!$this->session->userdata('login')){
		// 	redirect('site');
		// }
	}
	
	public function index()
	{
		// $this->load->view('manage/content/login');
		$data['content'] = 'manage/content/login';
		$this->load->view('manage/main_layout',$data);
	}
	
	public function home()
	{
		// if($this->session->userdata('status') != "login"){
		// 	redirect("manage");
		// }
		$data['content'] = 'manage/content/_dashboard';
		$this->load->view('manage/main_layout',$data);
	}
	
	public function pendaftaran()
	{
		$data['content'] = 'manage/content/_form_pendaftaran';
		$data['result'] = "";
		$this->load->view('manage/main_layout',$data);	
	}

	public function materi()
	{
		$data['content'] = 'manage/content/_list_materi';
		$data['result'] = $this->site->getData('materi');
		$this->load->view('manage/main_layout',$data);	
	}

	public function jadwal()
	{
		$data['content'] = 'manage/content/_list_jadwal';
		$data['result'] = $this->site->getData('jadwal');
		$this->load->view('manage/main_layout',$data);	
	}

	public function instruktur()
	{
		$data['content'] = 'manage/content/_list_instruktur';
		$data['result'] = $this->site->getData('instruktur');
		$this->load->view('manage/main_layout',$data);	
	}

	public function list_peserta_didik()
	{
		$data['content'] = 'manage/content/_list_peserta_didik';
		$data['result'] = $this->site->getData('peserta_didik');
		$this->load->view('manage/main_layout',$data);	
	}

	public function user()
	{
		$data['content'] = 'manage/content/_list_user';
		$data['result'] = $this->site->getData('user');
		$this->load->view('manage/main_layout',$data);	
	}

	public function pembayaran()
	{
		$data['content'] = 'manage/content/_pembayaran';
		$data['result'] = [];//$this->site->getData('user');
		$this->load->view('manage/main_layout',$data);	
	}

	public function kontak()
	{
		$data['content'] = 'manage/content/kontak';
		//$data['result'] = $this->site->getData('user');
		$this->load->view('manage/main_layout',$data);	
	}

	public function page($type="",$act = ""){
		if($type == "add"){
			if($act == "jadwal"){
				$data['content'] = 'manage/content/form/_jadwal';
				//$data['result'] = $this->site->getData('user');
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "materi"){
				$data['content'] = 'manage/content/form/_materi';
				//$data['result'] = $this->site->getData('user');
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "instruktur"){
				$data['content'] = 'manage/content/form/_instruktur';
				//$data['result'] = $this->site->getData('user');
				$this->load->view('manage/main_layout',$data);
			}
		}
	}

	public function action($type="",$act="",$id=""){
		if($type == 'detail'){
			if($act == 'donasi'){
				$data['row'] = $this->site->getData('detail_kegiatan',$id);
				$data['bank'] = $this->site->getData('bank',$id);
				$this->load->view('content/_detail',$data);
			}
		}elseif($type == 'execute'){
			if($act == 'donasi'){
				$this->db->insert('history_trx',array('id' => '','keterangan' => 'donasi '.date('Y')));
				$sequence = $this->site->getData('history_trx');
				$id_trx = 'TRX'.date('dmy').$sequence[0]['id'];
				$data = array(
					'fullname' => $this->input->post('nama_lengkap'),
					'email' => $this->input->post('email'),
					'password' => md5('donasi2018'),
					'no_telpon' => $this->input->post('no_telpon'),
					'id_user_role' => 2
				);
				$this->db->insert('app_users',$data);
				$id_user = $this->db->insert_id();
				$data_trx = array(
					'id' => $id_trx,
					'id_users' => $id_user,
					'id_kegiatan' => $this->input->post('id_kegiatan'),
					'jumlah_donasi' => $this->input->post('jumlah_donasi'),
					'unix_id' => $this->input->post('unix_id'),
					'id_bank_transfer' => $this->input->post('bank'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('app_trx_donatur',$data_trx);
				$data['row'] = $this->site->getData('trx_donasi',$id_trx);
				$this->sendEmail($data);
				$this->load->view('content/_thankyou',$data);
			}
		}
	}

	public function sendEmail($data){
		$subject = "Transfer Rp ". number_format($data['row'][0]['total_donasi'],0,',','.')." ke Rekening berikut";
		$msg = $this->load->view('manage/content/_email_detail_transfer',$data,TRUE);
		$email = $data['row'][0]['email'];
		$ci = get_instance();
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "nuridin50@gmail.com";
		$config['smtp_pass'] = "unaspasim";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('nuridin.mu23@gmail.com', 'PAY');
		// $list = array('nuridin50@gmail.com');
		$ci->email->to($email);
		$ci->email->subject($subject);
		$ci->email->message($msg);
		$this->email->send();
		// $this->load->view('manage/content/_email_detail_transfer',$data,TRUE);
		// if ($this->email->send()) {
		// 	echo 'Email sent.';
		// } else {
		// 	show_error($this->email->print_debugger());
		// }
	}

	public function export(){
		$this->load->library('m_pdf');
		error_reporting(E_ALL);
		$nama_dokumen='PDF';
		$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial');//
		ob_start();
		echo "test laporan pdf";
			
		$html = ob_get_contents();
		//ob_end_clean();
		$mpdf->WriteHTML(utf8_encode($html));
		$mpdf->Output($nama_dokumen.".pdf" ,'I');
		exit;
	}

	public function laporan(){
		// echo $_SERVER['HTTP_HOST'];die;
		$this->load->view('manage/content/_email_detail_transfer');
	}
	
}
