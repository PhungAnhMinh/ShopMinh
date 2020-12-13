<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class dashboard extends controller{
	public $model;
	public $model_pro;
	public $model_content;
	public $model_contact;
	public $model_order;
	public $extension;
	public function __construct(){
		$this->model=$this->models_backend("Mcategory");
		$this->model_pro=$this->models_backend("Mproduct");
		$this->model_content=$this->models_backend("Mcontent");
		$this->model_contact=$this->models_backend("Mcontact");
		$this->model_order=$this->models_backend("Morders");
		$this->extension = $this->library_backend("extension");
	}

	public function index(){
		
			
			$this->views_backend("components/dashboard/index",[
				   ]);
		
	}
	
}
?>
