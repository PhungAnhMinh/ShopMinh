<?php 
	class app{
		protected $controller = "home";
		protected $action = "sayhi";
		protected $params = "";

		function __construct(){
			$arr =  $this->UrlProcess();
			
			// Xử lí controller - nếu tồn tại file thì gắn $controller bằng phần tử đầu của url
			if(isset($arr[0]) && file_exists("./application/controllers/".$arr[0].".php")){
				$this->controller = $arr[0];
				require_once"./application/controllers/".$this->controller.".php";
				
				unset($arr[0]);
			}
			require_once"./application/controllers/".$this->controller.".php";
			//neu ton tai file thi require
			if( isset($arr[0]) && file_exists("./application/controllers/admin/".$arr[0].".php")) {
				$this->controller = $arr[0];
				require_once"./application/controllers/admin/".$this->controller.".php";
				
				unset($arr[0]);
			}
			$this->controller = new $this->controller;

			// Xử lí action - nếu tồn tại phần tử thứ 2 của mảng url thì kiểm tra phương thức có tồn tại trong lớp đó không, nếu có thì gắn action bằng phần tử đó
			if(isset($arr[1])){
				if(method_exists($this->controller, $arr[1])){
					$this->action = $arr[1];
				}
				unset($arr[1]);
			}

			// Xử lí params -  Nếu tồn tại mảng url param thì chuyển từ mảng kết hợp sang mảng liên tục
			$this->params =  $arr?array_values($arr):[];

			//Truyền đối sô params vào mảng( lớp > hàm đã tạo )
			call_user_func_array([$this->controller, $this->action], $this->params);

		}
		// Hàm lấy url
		function UrlProcess(){
			if(isset($_GET['url'])){

				// Loại bỏ khoảng trắng bằng hàm trim và làm sạch bằng hàm filter_var
				$url = filter_var(trim($_GET['url'], '/'));

				// Tách chuỗi
				return explode('/',$url);
			}
		}
	}
?>