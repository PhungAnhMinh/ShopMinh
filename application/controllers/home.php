<?php 
	class home extends controller{
	public $model_order;
	public $model_product;
	public $model_content;
	public $model_slider;
	public $model_cate;
	public function __construct(){
		$this->model_order=$this->models_frontend("Morders");
		$this->model_cate=$this->models_frontend("Mcategory");
		$this->model_product=$this->models_frontend("Mproduct");
		$this->model_content=$this->models_frontend("Mcontent");
		$this->model_slider=$this->models_frontend("Mslider");
	}
		function index(){
			$product = $this->model_product->select_product_sale(1);
			$this->views_frontend("components/trangchu/index",[
						"product"=>$product
					]);
		}
		
	}
?>