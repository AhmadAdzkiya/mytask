<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/


class Lkpp extends MY_Controller
{

	public $nmPage = 'dash/laporan/lkpp/';
	public $uploadPaths = [];

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->module('template');
		date_default_timezone_set("Asia/Jakarta");
		$this->config->load('upload_config');
		$this->uploadPaths = $this->config->item('path');  
		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth', 'refresh');
		}
		$this->ion_auth->get_user_group();
	}

	public function tenderSelesaiDetail()
	{
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/961b1e85-5242-4443-bdc5-d82f8c922d0a/json/736988529/TenderSelesaiDetailSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['page'] = $this->nmPage."v_tenderSelesaiDetail";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);
	}


	public function tenderPengumumanDetail()
	{
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/02a49139-7c9c-4f84-b9f1-63bf496b9b1a/json/736988530/TenderPengumumanDetailSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['page'] = $this->nmPage."v_tenderPengumumanDetail";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);
	}

	public function pokjaPertenderSpse()
	{
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/51a43d70-80bd-4f5e-92d6-1666cd71d5a5/json/736988527/PokjaPerTenderSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['page'] = $this->nmPage."v_lkpp_pertender_pokja";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);
	}

	public function nonTenderPengumumanDetailSPSE()
	{
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/17f22127-847a-4c90-8e87-10296ac87c2b/json/736988524/NonTenderPengumumanDetailSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['page'] = $this->nmPage."v_nonTenderPengumumanDetailSPSE";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);
	}


	public function nonTenderPengumumanSelesaiSPSE()
	{
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/2d7fd65b-9f1a-44a1-b6eb-e5c4b8211fc6/json/736988523/NonTenderSelesaiDetailSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_nonTenderPengumumanSelesaiSPSE";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);
	}


	public function paketAnggaranSwakelola()
	{
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/fa4a4e01-a9f5-427d-87b2-a5af58738f2c/json/736988533/PaketAnggaranSwakelola1618/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_paketAnggaranSwakelola";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);
	}


	public function paketAnggaranPeyedia()
	{
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		

		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/3de356fb-a1f2-49ba-8fdd-1d17a7d175f0/json/736988534/PaketAnggaranPenyedia1618/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_paketAnggaranPenyedia";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);
	}



	public function paketSwakelolaOpt(){
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		

		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/8482a897-e2ab-45e7-8324-da657648d3d9/json/736988535/PaketSwakelolaOpt1618/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_paketSwakelolaOpt";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);	
	}

	public function paketPenyediaOpt(){
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		

		
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/fffc1bc7-8e17-49b8-baf2-52925dac98bd/json/736988536/PaketPenyediaOpt1618/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_paketPenyediaOpt";
		$data['thn_query'] =$thn_query;
		 
		$this->template->template_view($data);	
	}

	public function subKomponenMasterRUP(){

		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/e3ff0eb3-5529-4b00-8f2b-2aab12207b6b/json/736988538/SubKomponenMasterRUP/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_subKomponenMasterRUP";
		$data['thn_query'] =$thn_query;

		// print_r($data['perusahaan']);
		 
		$this->template->template_view($data);	
	}

	public function komponenMasterRUP(){

		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/e3ff0eb3-5529-4b00-8f2b-2aab12207b6b/json/736988538/SubKomponenMasterRUP/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_komponenMasterRUP";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}


	public function suboutputMasterRUP(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/e3ff0eb3-5529-4b00-8f2b-2aab12207b6b/json/736988538/SubKomponenMasterRUP/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_suboutputMasterRUP";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}


	public function outputMasterRUP(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/2fd04cee-0f3c-42d2-9035-440ed88b57eb/json/736988541/OutputMasterRUP/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_outputMasterRUP";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}

	public function kegiatanMasterRUP(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/dfd86f9f-f8b7-4317-ac79-1aab05673655/json/736988542/KegiatanMasterRUP/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_kegiatanMasterRUP";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}

	public function programMasterRUP(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/f3ecff3e-eabb-4016-bfc9-b60bd2b2a93e/json/736988543/ProgramMasterRUP/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_programMasterRUP";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}


	public function pokjaPerNonTenderSPSE(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/b4357c14-c3cd-4dbe-bcdd-5a54344744e3/json/736988522/PokjaPerNonTenderSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_pokjaPerNonTenderSPSE";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}


	public function nonTenderSelesaiDetailSPSE(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/2d7fd65b-9f1a-44a1-b6eb-e5c4b8211fc6/json/736988523/NonTenderSelesaiDetailSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_nonTenderSelesaiDetailSPSE";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}


	
	public function pencatatanNonTenderSPSE(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/6a426a74-9e67-4eae-82e4-a91c37b0c948/json/736988518/PencatatanSwakelolaSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_pencatatanNonTenderSPSE";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}

	public function pencatatanSwakelolaSPSE(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/6a426a74-9e67-4eae-82e4-a91c37b0c948/json/736988518/PencatatanSwakelolaSPSE/tipe/4:4/parameter/$thn_query:218";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_pencatatanSwakelolaSPSE";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}

	public function rUPStrukturAnggaranKL1221(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/d61e427a-4017-4aca-817a-60e7572f7d62/json/736988516/RUPStrukturAnggaranKL1221/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_rUPStrukturAnggaranKL1221";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}
	
	public function ecatPaketEPurchasing(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/94060ea8-8f26-4de0-9be5-e0cd9883c7c3/json/736988515/Ecat-PaketEPurchasing/tipe/4:12/parameter/$thn_query:K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_ecatPaketEPurchasing";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}


	public function ecatInstansiSatker(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/ac8a59bf-6d35-44e2-b2e7-728eef763e2a/json/736988510/Ecat-InstansiSatker/tipe/12/parameter/K8";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_ecatInstansiSatker";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}

	
	public function tokoDaringRealisasi(){
		// echo "text ";
		$thn_query = $this->input->get('tahun');
		if(!isset($thn_query)){
			$thn_query = date('Y');
		}else{
			
		}
		
		$client = new \GuzzleHttp\Client([
			'verify' => false ,
		]);

		$segment="https://isb.lkpp.go.id/isb/api/68eee82b-40da-424d-b389-28a66d859ca1/json/736988504/TokoDaringRealisasi/tipe/12:4/parameter/K8:$thn_query";
		$response = $client->request('GET', $segment);


		$data['perusahaan'] = json_decode($response->getBody());
		$data['menu'] = 'data';
		$data['page'] = $this->nmPage."v_tokoDaringRealisasi";
		$data['thn_query'] =$thn_query;

		// print_r( count($data['perusahaan']) );
		 
		$this->template->template_view($data);	
	}





	

	
	


	


	

}