<?php
defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/

class Bioweb extends MY_Controller
{
	public $nmPage = "dash/setupweb/page/";

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->module('template');
		$this->load->library('encrypt');
		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$this->load->library('xmlrpc');
		$this->load->library('xmlrpcs');
		$this->load->model('dash/setupweb/page_model');
		date_default_timezone_set("Asia/Jakarta");

		//$this->load->model('admin__model');

		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth', 'refresh');
		}
		$this->ion_auth->get_user_group();
	}

	public function index() //blank
	{
		echo "zxckvfzxjhc";
	}

	public function biodata()
	{
		$data['page'] = $this->nmPage . "v_biodata_index";
		$this->template->template_view($data);
	}

	public function daftar()
	{
		$data['page'] = $this->nmPage . "v_page_index";
		$this->template->template_view($data);
	}

	public function tambah()
	{
		$data['page'] = $this->nmPage . "v_page_tambah";
		$data["nmPage"] = $this->nmPage;
		$this->template->template_view($data);
	}

	public function frmTambah($idParent = null)
	{

		$data = [
			"nmPage" => $this->nmPage,
			"mode" => "new"
		];

		if ($idParent) {
			$data['parent_id_for_sub'] = $idParent;
		}

		$this->load->view($this->nmPage . "v_page_tambah_content", $data);
	}

	public function profil($id = null, $slug = null)
	{
		$backfall = "<h3>Tidak menemukan halaman yang ingin dikelola</h3> 
		<a href='" . base_url() . "dash/setupweb/page/daftar'>Lihat Daftar halaman</a>";

		if ($id == null) {
			echo $backfall;
			die();
		} else {
			$page = $this->page_model->findBy(["a.id" => $id]);

			if (count($page) > 0) {

				$data['page'] = $this->nmPage . "v_page_edit";
				$data['data'] = $page[0];
				$data['nmPage'] = $this->nmPage;

				$this->template->template_view($data);
			} else {
				echo $backfall;
				die();
			}
		}
	}

	public function save_halaman()
	{
		$postData = json_decode(file_get_contents("php://input"));
		$postData->slug = slugify($postData->nama);

		$date = date("Y-m-d H:i:s");
		$postData->modify = $date;
		$postData->created = $date;
		$id = $postData->id;

		$res = $this->page_model->save($postData);

		if ($res) {
			echo json_encode([
				"success" => true,
				"status" => true,
				"message" => "Berhasil simpan",
				"data" => $postData
			]);
		} else {
			echo json_encode([
				"success" => false,
				"status" => false,
				"message" => "Gagal simpan, Silakan cek lagi data Anda",
				"data" => $postData
			]);
		}

		header('Content-Type: application/json');
	}

	public function save_halaman_form()
	{
		$data = array(
			'id' => '',
			'nama' => post('nama'),
			'slug' => slugify(post('nama')),
			'is_statis' => post('is_statis'),
			'keterangan' => post('keterangan'),
			'wallpaper' => '',
			'is_private' => post('is_private'),
			'parent_id' => 0,
			'url' => post('url'),
			'urutan' => post('urutan'),
			'icon' => post('icon'),
			'created' => date('Y-m-d H:i:s'),
			'updated' => date('Y-m-d H:i:s')
		);


		$result = $this->page_model->save($data);

		if ($result) {
			$msg = "Permission Added Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('dash/setupweb/page/daftar', 'refresh');
		} else {
			$msg = "Error";
			$this->session->set_flashdata('error', $msg);
			redirect('dash/setupweb/page/daftar', 'refresh');
		}
	}

	public function save_sub_halaman()
	{

		$data = array(
			'id' => '',
			'nama' => post('nama'),
			'slug' => slugify(post('nama')),
			'is_statis' => post('is_statis'),
			'keterangan' => post('keterangan'),
			'wallpaper' => '',
			'is_private' => post('is_private'),
			'parent_id' => post('parent_id'),
			'url' => post('url'),
			'urutan' => post('urutan'),
			'icon' => post('icon'),
			'created' => date('Y-m-d H:i:s'),
			'updated' => date('Y-m-d H:i:s')
		);


		$result = $this->page_model->save($data);

		if ($result) {
			$msg = "Permission Added Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('dash/setupweb/page/daftar', 'refresh');
		} else {
			$msg = "Error";
			$this->session->set_flashdata('error', $msg);
			redirect('dash/setupweb/page/daftar', 'refresh');
		}
	}


	public function update_halaman()
	{

		$postData = json_decode(file_get_contents("php://input"));
		if (isset($postData->nama)) {
			$postData->slug = slugify($postData->nama);
		}


		$date = date("Y-m-d H:i:s");
		$postData->modify = $date;
		$id = $postData->id;

		$res = $this->page_model->update($postData, $id);

		if ($res) {
			unset($postData->isi);
			echo json_encode([
				"success" => true,
				"status" => true,
				"message" => "Berhasil simpan perubahan",
				"data" => $postData
			]);
		} else {
			unset($postData->isi);

			echo json_encode([
				"success" => false,
				"status" => false,
				"message" => "Gagal simpan perubahan, Silakan cek lagi data Anda",
				"data" => $postData
			]);
		}

		header('Content-Type: application/json');


		// if (!$this->ion_auth->is_admin()) {
		// 	return show_error("You Must Be An Administrator To View This Page");
		// }
		// $data = array(
		// 	'perm_name' => post('perm_name'),
		// 	'icon' => post('icon'),
		// 	'keterangan' => post('keterangan'),
		// 	'url' => post('url'),
		// 	'urutan' => post('urutan'),
		// );

		// // $result = $this->common_model->UpdateDB($this->tables['permissions'], array('perm_id' => post('id')), $data);

		// if ($result) {
		// 	$msg = "Head Permission Update Successfully";
		// 	$this->session->set_flashdata('success', $msg);
		// 	redirect('users/Permissions', 'refresh');
		// } else {
		// 	$msg = "Error";
		// 	$this->session->set_flashdata('error', $msg);
		// 	redirect('users/Permissions', 'refresh');
		// }
	}

	public function update_sub_permission()
	{
		if (post('id') == post('head_perm')) {
			$msg = "Gagal update menu dan sub menu tidak boleh sama ";
			$this->session->set_flashdata('error', $msg);
			redirect('users/Permissions', 'refresh');
		} else {
			$data = array(
				'perm_name' => post('perm'),
				'url' => post('url'),
				'keterangan' => post('keterangan'),
				'parent_id' => post('head_perm'),
				'urutan' => post('urutan'),
			);

			$result = $this->common_model->UpdateDB($this->tables['permissions'], array('perm_id' => post('id')), $data);

			if ($result) {
				$msg = "Sub Permission Updated Successfully";
				$this->session->set_flashdata('success', $msg);
				redirect('users/Permissions', 'refresh');
			} else {
				$msg = "Error";
				$this->session->set_flashdata('error', $msg);
				redirect('users/Permissions', 'refresh');
			}
		}
	}

	public function delete_halaman($id)
	{
		if ($this->ion_auth->get_users_groups()->row()->id == 1) {


			$this->db->trans_start();

			$page = $this->page_model->findBy(["a.id" => $id])[0];
			//jika dia halaman root maka hapus juga sub halaman nya
			if ($page->parent_id = 0) {
				$this->page_model->delete($id);
				$this->page_model->deleteBy(["parent_id" => $id]);
			}
			//jika dia sub halaman maka hapus sub haalaman saja
			else {
				$this->page_model->delete($id);
			}

			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {

				$msg = "Upps terjadi masalah dengan pengahpusan data.. ";
				$this->session->set_flashdata('error', $msg);
				redirect('/dash/setupweb/page/daftar', 'refresh');
			} else {

				$msg = "Halaman berhasil dihapus";
				$this->session->set_flashdata('success', $msg);
				redirect('/dash/setupweb/page/daftar', 'refresh');
			}
		} else {
			$msg = "Anda tidak diperbolehkan menghapus data ini";
			$this->session->set_flashdata('error', $msg);
			redirect('/dash/setupweb/page/daftar', 'refresh');
		}
	}

	public function get_perm()
	{
		$id = post('id');
		$level = post('level');

		if ($level == 0) {
			$edit_id = array('perm_id' => $id);

			$result = $this->common_model->getAllData($this->tables['permissions'], '*', 1, $edit_id);

			echo json_encode($result);
		} else {
			$result =  $this->common_model->getAllData($this->tables['permissions'], '*', 1, array('perm_id' => $id));

			echo json_encode($result);
		}
	}

	public function get_permission()
	{
		$id = post('id');
		$level = post('level');

		if ($level == 0) {
			$edit_id = array('perm_id' => $id);

			$result = $this->common_model->getAllData($this->tables['permissions'], '*', 1, $edit_id);

			echo json_encode($result);
		} else {
			$result =  $this->common_model->getAllData($this->tables['permissions'], '*');

			echo json_encode($result);
		}
	}
}
