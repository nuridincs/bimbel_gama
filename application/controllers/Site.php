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
		$data['data_materi'] = $this->site->getData('materi');
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

	public function page($type="",$act = "",$id=""){
		if($type == "add"){
			if($act == "jadwal"){
				$data['content'] = 'manage/content/form/_jadwal';
				$data['data_materi'] = $this->site->getData('materi');
				$data['data_instruktur'] = $this->site->getData('instruktur');
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "materi"){
				$data['content'] = 'manage/content/form/_materi';
				$data['data_instruktur'] = $this->site->getData('instruktur');
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "instruktur"){
				$data['content'] = 'manage/content/form/_instruktur';
				//$data['result'] = $this->site->getData('user');
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "user"){
				$data['content'] = 'manage/content/_user';
				$this->load->view('manage/main_layout',$data);
			}
		}elseif($type == "update"){
			if($act == "instruktur"){
				$id = base64_decode($id);
				$data['content'] = 'manage/content/form/_instruktur';
				$data['result'] = $this->site->getData('instrukturById',$id);
				// print_r($data['result']);die;
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "materi"){
				$id = base64_decode($id);
				$data['content'] = 'manage/content/form/_materi';
				$data['result'] = $this->site->getData('materiById',$id);
				$data['data_instruktur'] = $this->site->getData('instruktur');
				// print_r($data['result']);die;
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "jadwal"){
				$id = base64_decode($id);
				$data['content'] = 'manage/content/form/_jadwal';
				$data['result'] = $this->site->getData('jadwalById',$id);
				$data['data_instruktur'] = $this->site->getData('instruktur');
				
				$data['data_materi'] = $this->site->getData('materi');
				$this->load->view('manage/main_layout',$data);
			}elseif($act == "user"){
				$data['result'] = $this->site->getData('userById',base64_decode($id));
				$data['content'] = 'manage/content/_user';
				$this->load->view('manage/main_layout',$data);
			}
		}
	}

	public function execute($type="",$act="",$id=""){
		if($type == 'add'){
			if($act == 'instruktur'){
				$data_instruktur = array(
					'nama_instruktur' => $this->input->post('nama_instruktur'),
					'email' => $this->input->post('email'),
					'no_telpon' => $this->input->post('no_telpon'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('app_instruktur',$data_instruktur);
				$this->session->set_flashdata('status', '200');
				redirect('site/instruktur');
			}elseif($act == 'materi'){
				$data = array(
					'nama_materi' => $this->input->post('nama_materi'),
					'id_instruktur' => $this->input->post('nama_instruktur'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('app_materi',$data);
				$this->session->set_flashdata('status', '200');
				redirect('site/materi');
			}elseif($act == 'jadwal'){
				$data = array(
					'id_materi' => $this->input->post('materi'),
					'id_instruktur' => $this->input->post('nama_instruktur'),
					'hari' => $this->input->post('hari'),
					'tanggal' => $this->input->post('tgl_belajar'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('app_jadwal',$data);
				$this->session->set_flashdata('status', '200');
				redirect('site/jadwal');
			}elseif($act == 'user'){
				$data = array(
					'fullname' => $this->input->post('nama_lengkap'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'no_telpon' => $this->input->post('no_telpon'),
					'id_user_role' => 4
				);
				$this->db->insert('app_users',$data);
				$this->session->set_flashdata('status', '200');
				redirect('site/user');
			}elseif ($act == 'pendaftaran') {
				$data_users = array(
					'fullname' => $this->input->post('nama_lengkap'),
					'email' => $this->input->post('email'),
					'password' => md5("gama2018"),
					'no_telpon' => $this->input->post('no_telpon'),
					'id_user_role' => 3
				);
				$this->db->insert('app_users',$data_users);
				$user_id = $this->db->insert_id();

				$this->db->insert('history_peserta',array('keterangan' => 'Gama'. date('Y')));
				$sequence = $this->db->query("SELECT MAX(id) AS id FROM history_peserta")->result_array();
				$id_peserta = "GM-".date('Ymd').$sequence[0]['id'];
				$data_peserta = array(
					'id' => $id_peserta,
					'users_id' => $user_id,
					'tmpt_lahir' => $this->input->post('tmpt_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'alamat' => $this->input->post('alamat'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'sekolah' => $this->input->post('sekolah'),
					'hari_bimbel' => $this->input->post('hari_bimbel'),
					'waktu_bimbel' => $this->input->post('waktu_bimbel'),
					'id_materi' => $this->input->post('id_materi'),
					'tgl_belajar' => $this->input->post('tgl_belajar'),
					'program_kelas' => $this->input->post('program_kelas'),
					'tgl_masuk' => $this->input->post('tgl_masuk'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('app_list_peserta_didik',$data_peserta);
				$param['email'] = $this->input->post('email');
				$param['nama'] = $this->input->post('nama_lengkap');
				$this->sendEmail($param);
				$data['content'] = 'manage/content/_pendaftaran_berhasil';
				$this->load->view('manage/main_layout',$data);	
				// $this->session->set_flashdata('status', '200');
				// redirect('site/user');
			}
		}elseif($type == 'update'){
			if($act == 'instruktur'){
				//$id = base64_decode($id);
				$data_instruktur = array(
					'nama_instruktur' => $this->input->post('nama_instruktur'),
					'email' => $this->input->post('email'),
					'no_telpon' => $this->input->post('no_telpon'),
					// 'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->where('id',$id);
				$this->db->update('app_instruktur', $data_instruktur);
				// print_r($this->db->last_query());die;
				$this->session->set_flashdata('status', '200');
				redirect('site/instruktur');
			}elseif($act == 'materi'){
				//$id = base64_decode($id);
				$data_instruktur = array(
					'nama_materi' => $this->input->post('nama_materi'),
					'id_instruktur' => $this->input->post('nama_instruktur'),
				);
				$this->db->where('id',$id);
				$this->db->update('app_materi', $data_instruktur);
				// print_r($this->db->last_query());die;
				$this->session->set_flashdata('status', '200');
				redirect('site/materi');
			}elseif($act == 'jadwal'){
				$data = array(
					'id_materi' => $this->input->post('materi'),
					'id_instruktur' => $this->input->post('nama_instruktur'),
					'hari' => $this->input->post('hari'),
					'tanggal' => $this->input->post('tgl_belajar'),
				);
				$this->db->where('id',$id);
				$this->db->update('app_jadwal', $data);
				// print_r($this->db->last_query());die;
				$this->session->set_flashdata('status', '200');
				redirect('site/jadwal');
			}elseif($act == 'user'){
				$data = array(
					'fullname' => $this->input->post('nama_lengkap'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'no_telpon' => $this->input->post('no_telpon'),
					// 'id_user_role' => $this->input->post('role')
				);
				$this->db->where('id', $id);
				$this->db->update('app_users', $data);

				redirect('site/user');
			}
		}elseif($type == 'delete'){
			if($act == 'instruktur'){
				$this->db->where('id',$id);
				$this->db->delete('app_instruktur');
				$this->session->set_flashdata('status', '200');
				redirect('site/instruktur');
			}elseif($act == 'materi'){
				$this->db->where('id',$id);
				$this->db->delete('app_materi');
				$this->session->set_flashdata('status', '200');
				redirect('site/materi');
			}elseif($act == 'jadwal'){
				$this->db->where('id',$id);
				$this->db->delete('app_jadwal');
				$this->session->set_flashdata('status', '200');
				redirect('site/jadwal');
			}elseif($act == 'users'){
				$this->db->where('id',$id);
				$this->db->delete('app_users');
				$this->session->set_flashdata('status', '200');
				redirect('site/users');
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

	public function sendEmail($param){
		$subject = "Pendaftaran Bimbel Gama";
		$msg = $this->load->view('manage/content/_email_pendaftaran',$param,TRUE);
		$email = $param['email'];
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
		$ci->email->from('nuridin.mu23@gmail.com', 'Gama UI');
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
