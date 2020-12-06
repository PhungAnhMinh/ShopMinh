<?php 
class author extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_frontend("author_model");
	}

	function Sayhi(){
		$this->views_frontend("index",
						[
						]
					);

	}
	
	public function nguoidung(){

			if(isset($_POST['submit'])){
				$user_name= $_POST['user_name'];
				$email=$_POST['email'];
				$pass=$_POST['pass'];
				$passMH=password_hash($pass, PASSWORD_DEFAULT);
				$repass=$_POST['repass'];
				$repassMH=password_hash($repass, PASSWORD_DEFAULT);
				$phone=$_POST['phone'];
				$gender=$_POST['gt'];
				$address=$_POST['address'];

				$day=$_POST['day'];
				$month=$_POST['month'];
				$year=$_POST['year'];
				$birthday=$year.'-'.$month.'-'.$day;
				

				if ($repass!=$pass) {
					echo "<script>alert('may khau khong trung khop. Nhap lai mat khau!!!');</script>";
					
				}
				
				$num=$this->model->select_author($email);

				$kq=$this->model->insert_author($passMH, $user_name, $email, $phone, $gender, $address, $birthday);
				$this->views("index",
								["result"=>$kq,
								 "result1"=>$num
								]
								);
				
			}
	}
}
?>