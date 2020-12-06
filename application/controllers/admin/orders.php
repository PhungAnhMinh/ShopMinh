<?php 
	class orders extends controller{
		public $model;
		public function __construct(){
			$this->model = $this->models_backend("Mcontent");
		}
		public function detail(){
			$this->views_backend("components/orders/detail", []);
		}
		public function index(){
			$this->views_backend("components/orders/index", []);
		}
		public function recyclebin(){
			$this->views_backend("components/orders/recyclebin", []);
		}
		public function view(){
			$this->views_backend("components/orders/view", []);
		}
	}
?>