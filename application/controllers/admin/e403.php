<?php 
	class e403 extends controller{
		public $model;
		public function __construct(){
			$this->model = $this->models_backend("Mcontent");
		}
		public function index(){
			$this->views_backend("components/e403/index", []);
		}
	}
?>