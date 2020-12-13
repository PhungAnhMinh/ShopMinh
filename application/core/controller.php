<?php 
	class controller {

// ham require model
		public function models_frontend($model){
			require_once"./application/models/frontend/".$model.".php";
			return new $model;
		}

		public function models_backend($model){
			require_once"./application/models/backend/".$model.".php";
			return new $model;
		}
// view trang hien thi
		public function views_frontend($view, $data=[]){
			require_once"./application/views/frontend/".$view.".php";
		}
		public function views_backend($view, $data=[]){
			require_once"./application/views/backend/".$view.".php";
		}
// require library
		public function library_frontend($library){
			require_once"./application/library/frontend/".$library.".php";
			return new $library;
		}
		public function library_backend($library){
			require_once"./application/library/backend/".$library.".php";
			return new $library;
		}

	}
?>