<?php 
session_start();
class login extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models("login_model");
	}

	function Sayhi(){
		
		$this->views("index",
						[
						]
					);

	}
	public function logout(){
		session_destroy();

		$this->views("index",
						[]
					);
	}

	public function nguoidung(){
		/* kiểm tra dữ liệu vào có phải post ko
			Sau đó so sánh dữ liệu vào có đúng email, pass ko
			nếu dúng thì tạo session và header về indexx
			- Nếu ko thì header về index với script sai pass
			
		*/

		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$pass= $_POST['pass'];
	
			if(empty($email)||empty($pass)){ 
				echo "<script> alert('Bạn chưa nhập dữ liệu!'); </script>";
			}
		}
		// $kq= $this->model->select_author($email);
		$kq= $this->model->select_author($email);
		$num=$kq['num'];
		$arr=$kq[0];
		$email=$arr['email'];
		$passDB=$arr['password'];
		// bên này chưa tạo session à
		if($num==1){
			if(password_verify($pass, $passDB)){
				$_SESSION['is_login'] = true;
				$_SESSION['row'] = $arr;
				
				echo "<script> alert('Đăng nhập thành công!'); </script>";
									// header("location: /MVC/home");
			}else{
									echo "<script> alert('Mật khẩu không đúng!'); </script>";
									header('location: /MVC/home');
								}
								
		}else{
								echo "<script> alert('Email không đúng vui. Vui lòng nhập lại hoặc đăng kí tài khoản mới!'); </script>";
							}
				

		$this->views("index",
						['num'=>$num,
						'email'=>$email,
						'passDB'=>$passDB,
						'pass'=>$pass,
						'row'=>$arr

						]
					);
	}
}
?>