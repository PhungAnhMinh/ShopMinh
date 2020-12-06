<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class user extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Muser");
	}

	public function login(){
		$this->views_backend("components/user/login",
						[
						]
					);
	}

		/* kiểm tra dữ liệu vào có phải post ko
			Sau đó so sánh dữ liệu vào có đúng email, pass ko
			nếu dúng thì tạo session và header về indexx
			- Nếu ko thì header về index với script sai pass
			
		*/
	public function check_user(){
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$pass= $_POST['pass'];
	
			if(empty($username)||empty($pass)){ 
				echo "Bạn chưa nhập dữ liệu!";
			}
		}
		// $kq= $this->model->select_author($email);
		$kq= $this->model->select_user($username);
		$num=$kq['num'];
		$arr=$kq[0];

		if(isset($arr['username'])&& isset($arr['password'])&& isset($arr['thumbnail'])){
			$username=$arr['username'];
			$passDB=$arr['password'];
			$thumbnail=$arr['thumbnail'];

		}

		if($num==1){
			if($pass==$passDB){
				$_SESSION['is_Login'] = true;
				$_SESSION['row'] = $arr;
				
				setcookie('msg', 'Đăng nhập thành công', time()+5);
				header("location: /ShopMinh/content/index");
			}else{
				setcookie('msg', 'Mật khẩu không đúng', time()+5);
				header("location: /ShopMinh/user/login");
			}
								
		}else{
			setcookie('msg', 'Tên đăng nhập không đúng', time()+5);
			header("location: /ShopMinh/user/login");
		}

		$this->views_backend("components/user/login",[
						'thumbnail'=>$thumbnail,

						]);
	}

	public function logout(){
		session_destroy();
		header('location:/ShopMinh/user/login');
	}
}
?>
