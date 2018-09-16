<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_manage','manage');
        // if($this->session->userdata('status') != "login"){
		// 	redirect("manage");
		// }
    }

	public function index()
	{
		$this->load->view('manage/content/login');
		// redirect('login');
	}

	public function dashboard()
	{
		// if($this->session->userdata('status') != "login"){
		// 	redirect("manage");
		// }
		$data['content'] = 'manage/content/_dashboard';
		$this->load->view('manage/main_layout',$data);
	}

	public function kegiatan()
	{
		$data['result'] = $this->manage->getData('kegiatan');
		$data['content'] = 'manage/content/_list_kegiatan';
		$this->load->view('manage/main_layout',$data);
	}

	public function konfirmasi()
	{
		$id_user = $this->session->userdata('id_user');
		// echo $id_user;die;
		$data['result'] = $this->manage->getData('konfirmasi',$id_user);
		$data['content'] = 'manage/content/_list_konfirmasi';
		$this->load->view('manage/main_layout',$data);
	}

	public function laporan($act)
	{
		if($act == 'donasi'){
			$data['result'] = $this->manage->getData('laporan_donasi');
			$data['content'] = 'manage/content/_laporan_donasi';
		}else{
			$data['result'] = $this->manage->getData('laporan_kegiatan');
			$data['content'] = 'manage/content/_laporan_kegiatan';
		}
		$this->load->view('manage/main_layout',$data);
	}

	public function data($act)
	{
		if($act == 'donasi'){
			$data['result'] = $this->manage->getData('donatur');
			$data['content'] = 'manage/content/_donasi';
		}elseif($act == 'bank'){
			$data['result'] = $this->manage->getData('bank');
			$data['content'] = 'manage/content/_list_bank';
		}else{
			$data['result'] = $this->manage->getData('user');
			$data['content'] = 'manage/content/_list_user';
		}
		$this->load->view('manage/main_layout',$data);
	}

	public function action($type="",$act="",$id=""){
		if($type == 'add'){
			if($act == 'kegiatan'){
				$data['content'] = 'manage/content/_kegiatan';
				$this->load->view('manage/main_layout',$data);
			}elseif($act == 'user'){
				$data['content'] = 'manage/content/_user';
				$this->load->view('manage/main_layout',$data);
			}elseif($act == 'bank'){
				$data['content'] = 'manage/content/_bank';
				$this->load->view('manage/main_layout',$data);
			}
		}else if($type == 'update'){
			if($act == 'kegiatan'){
				$data['result'] = $this->manage->getData('kegiatanById',base64_decode($id));
				$data['content'] = 'manage/content/_kegiatan';
				$this->load->view('manage/main_layout',$data);
			}elseif($act == 'user'){
				$data['result'] = $this->manage->getData('userById',base64_decode($id));
				$data['content'] = 'manage/content/_user';
				$this->load->view('manage/main_layout',$data);
			}elseif($act == 'bank'){
				$data['result'] = $this->manage->getData('bankById',base64_decode($id));
				$data['content'] = 'manage/content/_bank';
				$this->load->view('manage/main_layout',$data);
			}elseif($act == 'keterangan'){
				$data['id'] = base64_decode($id);
				$data['content'] = 'manage/content/_keterangan';
				$this->load->view('manage/main_layout',$data);
			}elseif($act == 'konfirmasi'){
				$data['id'] = base64_decode($id);
				$data['content'] = 'manage/content/_form_konfirmasi';
				$this->load->view('manage/main_layout',$data);
			}
		}else if($type == 'delete'){

		}
	}

	public function execute($type="",$act="",$id=""){
		$post = $this->input->post();
		if($type == 'add'){
			if($act == 'kegiatan'){
				$target_dir = "assets/upload/";
				$target_file = $target_dir . time().basename($_FILES["file_input"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imgName = time().basename($_FILES["file_input"]["name"]);
				move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file);

				$data = array(
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'deskripsi' => $this->input->post('deskripsi'),
					'image' => $imgName,//$this->input->post('image'),
					'target_dana' => $this->input->post('target_dana'),
					'unix_id' => $this->generateUnixId(),
					'start_date' => $this->input->post('start_date'),
					'end_date' => $this->input->post('end_date'),
					'created_at' => date("Y-m-d")
				);
				$this->manage->execute('app_kegiatan',$data);

				redirect('manage/kegiatan');
			}elseif($act == 'user'){
				$data = array(
					'fullname' => $this->input->post('nama_lengkap'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'no_telpon' => $this->input->post('no_telpon'),
					'id_user_role' => $this->input->post('role')
				);
				$this->manage->execute('app_users',$data);

				redirect('manage/data/user');
			}elseif($act == 'bank'){
				$target_dir = "assets/upload/bank/";
				$target_file = $target_dir . time().basename($_FILES["file_input"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imgName = time().basename($_FILES["file_input"]["name"]);
				move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file);

				$data = array(
					'id' => $this->input->post('id_bank'),
					'nama_pemilik' => $this->input->post('nama_pemilik'),
					'nama_bank' => $this->input->post('nama_bank'),
					'no_rekening' => $this->input->post('no_rekening'),
					'cabang' => $this->input->post('cabang'),
					'logo_bank' => $imgName,
					'status' => $this->input->post('status'),
				);
				$this->manage->execute('app_bank',$data);

				redirect('manage/data/bank');
			}
		}elseif($type == 'update'){
			if($act == 'kegiatan'){
				/*$target_dir = "assets/upload/";
				$target_file = $target_dir . time().basename($_FILES["file_input"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imgName = time().basename($_FILES["file_input"]["name"]);
				move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file);*/

				$data = array(
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'deskripsi' => $this->input->post('deskripsi'),
					//'image' => $imgName,//$this->input->post('image'),
					'target_dana' => $this->input->post('target_dana'),
					//'unix_id' => $this->generateUnixId(),
					'start_date' => $this->input->post('start_date'),
					'end_date' => $this->input->post('end_date'),
					//'created_at' => date("Y-m-d")
				);
				
				$this->db->where('id', $id);
				$this->db->update('app_kegiatan', $data);
				// $this->manage->execute('app_kegiatan',$data);

				redirect('manage/kegiatan');
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

				redirect('manage/data/user');
			}elseif($act == 'bank'){
				$data = array(
					'nama_pemilik' => $this->input->post('nama_pemilik'),
					'nama_bank' => $this->input->post('nama_bank'),
					'no_rekening' => $this->input->post('no_rekening'),
					'cabang' => $this->input->post('cabang'),
					// 'logo_bank' => $imgName,
					'status' => $this->input->post('status'),
				);
				$this->db->where('id', $id);
				$this->db->update('app_bank', $data);

				redirect('manage/data/bank');
			}elseif($act == 'keterangan'){
				$keterangan = $this->input->post('keterangan');
				$this->db->where('id', $id);
				$this->db->update('app_trx_donatur', array('keterangan' => $keterangan));
				// echo $this->db->last_query();die;
				redirect('manage/laporan/donasi');
			}elseif($act == 'konfirmasi'){
				$target_dir = "assets/upload/bukti_transfer/";
				$target_file = $target_dir . time().basename($_FILES["bukti_transfer"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imgName = time().basename($_FILES["bukti_transfer"]["name"]);
				move_uploaded_file($_FILES["bukti_transfer"]["tmp_name"], $target_file);

				$keterangan = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->update('app_trx_donatur', array('bukti_donasi' => $imgName));
				// print_r($this->db->last_query());die;
				redirect('manage/konfirmasi');
			}elseif($act == 'verifikasi'){
				$this->db->where('id', $id);
				$this->db->update('app_trx_donatur', array('verifikasi' => 1));
				// echo $this->db->last_query();die;
				redirect('manage/data/donasi');
			}
		}elseif($type == 'delete'){
			if($act == 'kegiatan'){
				$this->db->where('id', $id);
				$this->db->delete('app_kegiatan');
				redirect('manage/kegiatan');
			}elseif($act == 'user'){
				$this->db->where('id', $id);
				$this->db->delete('app_users');
				redirect('manage/data/user');
			}elseif($act == 'bank'){
				$this->db->where('id', $id);
				$this->db->delete('app_bank');
				redirect('manage/data/bank');
			}
		}
	}

	public function export($act=""){
		$this->load->library('m_pdf');
		error_reporting(E_ALL);
		if($act == 'donasi'){
			$nama_dokumen='PDF';
			$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial');
			ob_start();
			$data['result'] = $this->manage->getData('laporan_donasi');
			$_view = "<h1 align='center'>Laporan Donasi</h1>";
			$_view .= "<table border=1 class='.table-striped'>";
			$_view .= "<tr>";
				$_view .= "<th>Nama Kegiatan</th>";
				$_view .= "<th>Target Donasi</th>";
				$_view .= "<th>Total Donasi</th>";
				$_view .= "<th>Nama Bank</th>";
				$_view .= "<th>Keterangan</th>";
			$_view .= "</tr>";
			foreach($data['result'] as $value){
				$_view .= "<tr>";
					$_view .= "<td>".$value['nama_kegiatan']."</td>";
					$_view .= "<td>Rp. " . number_format($value['target_dana'],0,',','.')."</td>";
					$_view .= "<td>Rp. " . number_format($value['total_terkumpul'],0,',','.')."</td>";
					$_view .= "<td>".$value['nama_bank']."</td>";
					$_view .= "<td>".$value['keterangan']."</td>";
				$_view .= "</tr>";
			}
			$_view .= "</table>";
		}elseif($act == 'kegiatan'){
			$nama_dokumen='PDF';
			$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial');
			ob_start();
			$data['result'] = $this->manage->getData('laporan_kegiatan');
			$_view = "<h1 align='center'>Laporan Kegiatan</h1>";
			$_view .= "<table border=1 class='.table-striped'>";
			$_view .= "<tr>";
				$_view .= "<th>Nama Kegiatan</th>";
				$_view .= "<th>Target Dana</th>";
				$_view .= "<th>Total Donasi</th>";
				$_view .= "<th>Unix ID</th>";
				$_view .= "<th>Tgl. Mulai</th>";
				$_view .= "<th>Tgl. Berakhir</th>";
			$_view .= "</tr>";
			foreach($data['result'] as $value){
				$_view .= "<tr>";
					$_view .= "<td>".$value['nama_kegiatan']."</td>";
					$_view .= "<td>Rp. " . number_format($value['target_dana'],0,',','.')."</td>";
					$_view .= "<td>Rp. " . number_format($value['total_terkumpul'],0,',','.')."</td>";
					$_view .= "<td>".$value['unix_id']."</td>";
					$_view .= "<td>".$value['start_date']."</td>";
					$_view .= "<td>".$value['end_date']."</td>";
				$_view .= "</tr>";
			}
			$_view .= "</table>";
		}
		
		echo $_view;
			
		$html = ob_get_contents();
		//ob_end_clean();
		$mpdf->WriteHTML(utf8_encode($html));
		$mpdf->Output($nama_dokumen.".pdf" ,'I');
		exit;
	}

	// public function kirimEmailDonatur(){
	// 	$data['result'] = $this->manage->getData('laporan_donasi');
	// 	foreach($data['result'] as $value){
	// 		$this->sendEmail($value);
	// 	}
	// }

	public function kirimEmailDonatur(){
		$data['result'] = $this->manage->getData('laporan_donasi');
		// echo "<pre>";
		// print_r($data);die;
		$totalData = count($data);
		for($i=0;$i>$totalData;$i++){
			$subject = "Laporan Donasi";
			$msg = "Terim Kasih sudah berdonasi";//$this->load->view('manage/content/_email_laporan_donasi',$data,TRUE);
			$email = $data[$i]['result']['email'];
			// print_r($email);die;
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
			$ci->email->to($email);
			$ci->email->subject($subject);
			$ci->email->message($msg);
			$this->email->send();
		}
		redirect('manage/laporan/donasi');
	}

	public function generateUnixId($digits = 9){
	    $i = 0; //counter
	    $code = ""; //our default code is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $code .= mt_rand(0, 9);
	        $i++;
	    }
	    return substr($code,1,3);
	}
}

