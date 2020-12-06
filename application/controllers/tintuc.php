<?php 
	class tintuc extends controller{
		function __construct() {
	        $teo = $this->models_frontend("author_model");
	        $teo = $this->models_frontend("author_model");
	    }
		public function detail(){
			
			$this->views_frontend("components/tintuc/detail", []);
		}
		public function index(){
			
			$this->views_frontend("components/tintuc/index", []);
		}
	}
?>