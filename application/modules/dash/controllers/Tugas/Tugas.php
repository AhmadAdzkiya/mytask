<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/


class Tugas extends MY_Controller
{

	public $nmPage = 'dash/tugas/';
	public $uploadPaths = [];
	public $user;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->module('template');
		$this->load->helper('url');
		date_default_timezone_set("Asia/Jakarta");
		$this->config->load('upload_config');
		$this->uploadPaths = $this->config->item('path');  
		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth', 'refresh');
		}
		$this->ion_auth->get_user_group();

		$this->user = $this->ion_auth->user()->row();
	}

	
	public function index(){
		$data['menu'] = 'tugas';
		$data['page'] = $this->nmPage."v_tugas_daftar_index";
		$this->template->template_view($data);
	}

	public function daftartugas(){
		$data['menu'] = 'tugas';
		
		$data['page'] = $this->nmPage."v_tugas_daftar_index";
		$this->template->template_view($data);
	}

	public function penugasansaya(){
		$data['menu'] = 'tugas';
		
		$data['page'] = $this->nmPage."v_tugas_daftar_penugasan_saya_index";
		$this->template->template_view($data);
	}

	public function buatTugas(){
		$user_id = $this->user->id;
		$data['menu'] = 'tugas';
		$data['mode'] = 'new';
		$data['pegawai'] = $this->db->query("select a.* from users a left join users_groups b on a.id=b.user_id where b.group_id='2' and b.group_id<>'1' and a.id<>'$user_id' ")->result_object();
		$data['page'] = $this->nmPage."v_tugas_buat_index";
		$this->template->template_view($data);
	}

	


	public function edit($id){
		$user_id = $this->user->id;
		$data['menu'] = 'tugas';
		$data['mode'] = 'edit';
		$data['uploadPaths'] = $this->uploadPaths;
		$data['pegawai'] = $this->db->query("select a.* from users a left join users_groups b on a.id=b.user_id where b.group_id='2' and b.group_id<>'1' and a.id<>'$user_id '")->result_object();
		$data['tugas'] = $this->db->query("select a.* from tugas a where  a.id='$id' ")->result_object()[0];
		$owner_email= $data['tugas']->createdby;
		// echo $owner_email;

		$data['owner'] = $this->db->query("select a.* from users a where  a.email='$owner_email' ")->result_object()[0];
		// echo $data['owner']->email ;
		$data['page'] = $this->nmPage."v_tugas_buat_index";
		$this->template->template_view($data);
	}

	public function hapus($id){

		$this->db->where('id',$id);
		$isSukses = $this->db->delete('tugas');  

		if($isSukses){
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="padding:0.5rem">
			<strong>Hapus Tugas berhasil</strong> Silakan lanjutkan kegiatan berikutnya. Terimakasih.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="color:#38311c; padding:0.5rem">
			<strong>Uppss! hapus Tugas gagal .. </strong>Silakan cek lagi data yang ingin Anda hapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		}

		redirect(base_url().'dash/tugas/tugas/index');
	}


	public function listpenugasan(){
		$search = $this->input->post('search')['value'];
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$user = $this->ion_auth->user()->row();

		// echo $user->email;

		$wUser = " a.petugas = '$user->id' ";

		if(strlen($search)>0){
			$wSearch = " and a.judul like '%$search%' or  a.isi like '%$search%' or concat(b.first_name,' ',b.last_name) like '%$search%' or a.id ='$search'";
		}else{
			$wSearch = '';
		}

		$sql = "select a.*, b.id as 'id_petugas', b.first_name, b.last_name 
			from tugas as a inner join users as b on a.petugas = b.id 
			where $wUser $wSearch

			order by a.created desc

			LIMIT $length OFFSET $start

			
			";

			// echo $sql;

		$data = $this->db->query($sql)->result_object();
		$datax = $this->db->query("select * from tugas")->result_object();
		$data_send = [];
		

		

		foreach ($data as $key => $value) {
			$link_edit =base_url()."dash/tugas/tugas/edit/".$value->id;
			$link_hapus =base_url()."dash/tugas/tugas/hapus/".$value->id;
			$d = [];
			$d[]= $start+$key+1;
			$d[]= $value->id;
			$d[]= $value->judul;
			$d[]= $value->isi;
			$d[]= $value->first_name." ".$value->last_name;
			$d[]= $value->target;
			$d[]= $value->status == "0" ? "<span class='text-danger' >Belum Selesai</span>" : "<span class='text-success' >Selesai</span> ";
			if(strlen($value->file)>0){$d[]= '<a target="blank" href="'. base_url(). ltrim($this->uploadPaths['lampiran_tugas'],"./") . $value->file.'" class="text-primary" > <i class="fa fa-file" aria-hidden="true"></i> '.substr($value->file,0,5).'...</a> ';}
			else{$d[]= '';} 
			$d[]= ' <a href="'.$link_edit.'" class="badge bg-success text-light">Edit</a> ';
			
			$data_send[] = $d;
		}

		header('Content-Type: application/json');

		echo json_encode((object)[
			"draw"=> $draw,
			"recordsTotal"=> count($datax),
			"recordsFiltered"=> count($datax),
			"data" => $data_send
		]);
	}


	public function list(){

		$search = $this->input->post('search')['value'];
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$user = $this->ion_auth->user()->row();

		// echo $user->email;

		$wUser = " a.createdby = '$user->email' ";

		if(strlen($search)>0){
			$wSearch = " and a.judul like '%$search%' or  a.isi like '%$search%' or concat(b.first_name,' ',b.last_name) like '%$search%' or a.id ='$search'";
		}else{
			$wSearch = '';
		}

		$sql = "select a.*, b.id as 'id_petugas', b.first_name, b.last_name 
			from tugas as a inner join users as b on a.petugas = b.id 
			where $wUser $wSearch
			order by a.created desc
			LIMIT $length OFFSET $start
			
			";

			// echo $sql;

		$data = $this->db->query($sql)->result_object();
		$datax = $this->db->query("select * from tugas")->result_object();
		$data_send = [];
		

		

		foreach ($data as $key => $value) {
			$link_edit =base_url()."dash/tugas/tugas/edit/".$value->id;
			$link_hapus =base_url()."dash/tugas/tugas/hapus/".$value->id;
			$d = [];
			$d[]= $start+$key+1;
			$d[]= $value->id;
			$d[]= $value->judul;
			$d[]= $value->isi;
			$d[]= $value->first_name." ".$value->last_name;
			$d[]= $value->target;
			$d[]= $value->status == "0" ? "<span class='text-danger' >Belum Selesai</span>" : "<span class='text-success' >Selesai</span> ";
			if(strlen($value->file)>0){$d[]= '<a target="blank" href="'. base_url(). ltrim($this->uploadPaths['lampiran_tugas'],"./") . $value->file.'" class="text-primary" > <i class="fa fa-file" aria-hidden="true"></i> '.substr($value->file,0,5).'...</a> ';}
			else{$d[]= '';} 
			$d[]= ' <a href="'.$link_edit.'" class="badge bg-success text-light">Edit</a> 
			<a href="'.$link_hapus.'" class="badge bg-danger text-light">Hapus</a>';
			
			$data_send[] = $d;
		}

		header('Content-Type: application/json');

		echo json_encode((object)[
			"draw"=> $draw,
			"recordsTotal"=> count($datax),
			"recordsFiltered"=> count($datax),
			"data" => $data_send
		]);

		
	}



	function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }


	function getRandomString() {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
	
		for ($i = 0; $i < 8; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}
	
		return $randomString;
	}

	public function do_upload() { 


		$uploadDirectory = $this->uploadPaths['lampiran_tugas'];

			$errors = []; // Store errors here

			$fileExtensionsAllowed = ['pdf','jpeg','jpg','png']; // These will be the only file extensions allowed 

			

			$fileName = $_FILES['file']['name'];
			$exts = explode('.',$fileName);
			// var_dump($exts);
			

			$fileSize = $_FILES['file']['size'];
			$fileTmpName  = $_FILES['file']['tmp_name'];
			$fileType = $_FILES['file']['type'];
			$fileExtension = strtolower($exts[count($exts)-1]);
			// var_dump($fileExtension);

			// die();

			$uploadPath = $uploadDirectory . $fileName; 

		

			if (! in_array($fileExtension,$fileExtensionsAllowed)) {
				$errors[] = " [[ $fileExtension ]] This file extension is not allowed. Please upload a JPEG or PNG file od PDF";

				return $errors;
			}

			if ($fileSize > 20000000) {
				$errors[] = "[[ $fileSize ]]File exceeds maximum size (20MB)";
				return $errors;
			}

			if (empty($errors)) {
				

				$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

				// var_dump($didUpload);
				// var_dump($fileTmpName);
				// var_dump($uploadPath);

				// die();

				if ($didUpload) {
					return $errors;
				// echo "The file " . basename($fileName) . " has been uploaded";
				} else {
					$errors[] = "File exceeds maximum size (4MB)";
					return $errors;

				// echo "An error occurred. Please contact the administrator.";
				}
			} else {
				// var_dump($didUpload);
				// var_dump($fileTmpName);
				// var_dump($uploadPath);

				// die();

				return $errors;
				// foreach ($errors as $error) {
				// echo $error . "These are the errors" . "\n";
				// }
			}

			


		// $config['upload_path']   = $this->uploadPaths['lampiran_tugas']; 
		// $config['allowed_types'] = 'pdf|gif|jpg|png'; 
		// $config['max_size']      = 150;
		// // $config['encrypt_name'] = TRUE; //TRUE=means file name will be converted to a random encrypted string
		// // $config['remove_spaces'] = TRUE; //TRUE=means  spaces in the file name will be converted to underscores
		// $this->load->library('upload', $config);



		// $fileTmpName = $_FILES['file']['tmp_name'];
		// // move_uploaded_file($fileTmpName, $config['upload_path']);


		// $this->upload->do_upload('file');
		// die();
		// if ( ! $this->upload->do_upload('file')) {
		//   return true;
		// }
		   
		// else { 
		// 	return false;
		//   ; 
		// } 
	} 

	public function simpaninput(){
		$input = (object) $this->input->post();
		$msgUploaded = '';
		$errors =[];
		


		$rand = rand(10,100);
		$period = date("Ymd");


		$kode = $period.$rand;

		$dataInput = [
			'id' => $kode ,
			'judul' => $input->judul,
			'isi' => $input->isi,
			'petugas' => $input->petugas,
			'file' => '',
			'status' => '0',
			'target' => $input->target,
			'created' => date('Y-m-d H:i:s'),
			'modify' => date('Y-m-d H:i:s'),
			'modifierid' => $input->modifierid,
			'modifiedby' => $input->modifiedby,
			'creatorid' => $input->creatorid,
			'createdby' => $input->createdby,
			'trashed' => '0',
			'trashedid' => '',
			'trashedby' => ''

		];



		
		// echo $str;

		// // echo $this.slugify($str);
		// // $name = $this->getRandomString(). $this.slugify($_FILES['file']['name']);
		$str = $_FILES['file']['name'];
		if($_FILES['file']['size']>0){
			$ex = explode(".",$str);

			$str = $this->getRandomString().'-'.$this->slugify($ex[0]).".".$ex[count($ex)-1];
			$_FILES['file']['name'] = $str;
				// $this->prepareNamingFile($str);
				// var_dump($_FILES['file']);

				$errors = $this->do_upload();

				if(count($errors)==0){
					
					$msgUploaded =" Lampiran tugas berhasil diupload ";
					$dataInput['file'] = $str;
				}else{
					foreach ($errors as $key => $value) {
						$msgUploaded .=" ".$value ;
					}
					
				}

		}
		
		
		

		

		if(count($errors)>0){
			$this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="color:#38311c; padding:0.5rem">
				<strong>Uppss! Input Tugas gagal .. </strong> Silakan cek lagi data yang ingin Anda input. '.$msgUploaded.'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		}else{
			$isSukses = $this->db->insert('tugas', $dataInput); 

			if($isSukses){
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="padding:0.5rem">
				<strong>Input Tugas berhasil</strong> '.$msgUploaded.'  Silakan lanjutkan kegiatan berikutnya. Terimakasih.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="color:#38311c; padding:0.5rem">
				<strong>Uppss! Input Tugas gagal .. </strong> Silakan cek lagi data yang ingin Anda input. '.$msgUploaded.'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			}
		}

		

		redirect(base_url().'dash/tugas/tugas/index');

	}



	public function simpanubah(){
		$input = (object) $this->input->post();
		$msgUploaded = '';
		$errors =[];

		$sql = "select a.*
		from tugas as a 
		where a.id='$input->id'";

		// echo $sql;

		$tugas = $this->db->query($sql)->result_object()[0];
		


		$dataInput = [
			'judul' => $input->judul,
			'isi' => $input->isi,
			'petugas' => $input->petugas,
			'status' => $input->status,
			'target' => $input->target,
			'modifierid' => $input->modifierid,
			'modifiedby' => $input->modifiedby
		];

		
		$str = $_FILES['file']['name'];
		if($_FILES['file']['size']>0){
			$ex = explode(".",$str);

			$str = $this->getRandomString().'-'.$this->slugify($ex[0]).".".$ex[count($ex)-1];
			$_FILES['file']['name'] = $str;
				// $this->prepareNamingFile($str);
				// var_dump($_FILES['file']);

				$errors = $this->do_upload();

				if(count($errors)==0){
					$dataInput['file'] = $str; 
					$msgUploaded =" Lampiran tugas berhasil diupload ";
					echo $this->uploadPaths['lampiran_tugas'].$tugas->file;

					if(file_exists($this->uploadPaths['lampiran_tugas'].$tugas->file)){
						echo 'ada file';
						unlink($this->uploadPaths['lampiran_tugas'].$tugas->file);
					}else{
						echo "tidak ketemu";
					}

				}else{
					foreach ($errors as $key => $value) {
						$msgUploaded .=" ".$value ;
					}
					
				}

		}

		

		
		$this->db->where('tugas.id', $input->id);
    	$isSukses = $this->db->update('tugas', $dataInput);

	


		if($isSukses){
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="padding:0.5rem">
			<strong>Update Tugas berhasil</strong> '.$msgUploaded.'  Silakan lanjutkan kegiatan berikutnya. Terimakasih.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="color:#38311c; padding:0.5rem">
			<strong>Uppss! Update Tugas gagal .. </strong> Silakan cek lagi data yang ingin Anda input. '.$msgUploaded.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		}

		redirect($_SERVER['HTTP_REFERER']);

	}



}