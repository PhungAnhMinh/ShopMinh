<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();
class user extends controller{
	public $model;
	public $model_cate;
	public $extension;
	public $pagination;
	public function __construct(){
		$this->model=$this->models_backend("Muser");
		$this->model_cate = $this->models_backend("Mcategory");
		$this->extension = $this->library_backend("extension");
		$this->pagination = $this->library_backend("pagination");
	}
	// login 
	public function login(){
		if(isset($_POST['submit'])){
			// kiểm tra độ dài chuỗi
				$strlenCode = $this->extension->strlenString($_POST['username'],5,'error_username','Tên đăng nhập');
				if($strlenCode==false){
					if(empty($_POST['username'])||empty($_POST['pass'])){ 
						setcookie('msg', 'Bạn chưa nhập dữ liệu!!', time()+5);
						header("location: /ShopMinh/user/login");
					}
					else{
						$kq= $this->model->select_user_where_user($_POST['username']);
						$num=$kq['num'];
						$arr=$kq[0];
						if($num==1){ 
							if(password_verify($_POST['pass'],$arr['password'])){
								$_SESSION['is_Login'] = true;
								$_SESSION['row'] = $arr;
								
								setcookie('msg', 'Đăng nhập thành công', time()+5);
								header("location: /ShopMinh/user/index");
							}else{
								setcookie('msg', 'Mật khẩu không đúng', time()+5);
								header("location: /ShopMinh/user/login");
							}
												
						}else{
							setcookie('msg', 'Tên đăng nhập không đúng', time()+5);
							header("location: /ShopMinh/user/login");
						}
					}
				}else{$this->extension->strlenString($_POST['username'],5,'error_username','Tên đăng nhập');
						header("location: /ShopMinh/user/insert");}
			
		}
		else{
			$this->views_backend("components/user/login",[
						// 'thumbnail'=>$thumbnail,

						]);
		}
		
	}
// đăng xuất
	public function logout(){
		session_destroy();
		header('location:/ShopMinh/user/login');
	}
// hiển thị tài khoản
	public function index(){
			$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_user_num(1);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/user/index/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_user(1, $start, $limit);
			$phantrang = $pagination->getPagination();
			$num = $this->model->select_user_num(0);
			
			$this->views_backend("components/user/index",[
								"user"=>$row,
								"phantrang"=>$phantrang,
								"num"=>$num
				   ]);
		}

	// status
		public function status(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_user_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
					$status = 1;
			}
			$run = $this->model->update_user_where_id($url[2],$status);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/user/index','/ShopMinh/user/index');
			
		}

	// Thêm mới user
	public function insert(){
		$row = $this->model->select_user_full(1);
		if(isset($_POST['submit'])){
			// Làm sạch tên người dùng
			$fullname = filter_var(trim($_POST['fullname']), FILTER_SANITIZE_STRING);
			$created_by = $_SESSION['row']['fullname'];
			$created_at = date('Y-m-d H:i:s');
			$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
				// kiểm tra độ dài chuỗi
				$strlenUsername = $this->extension->strlenString($_POST['username'],5,'error_username','Tên đăng nhập');
				if($strlenUsername==false){
					// Làm sạch tên người dùng
					$username = $this->extension->filterString($_POST['username']);
					// Xác thực tên người dùng
					if($username!=false){
						$username = str_replace(" ", "", $username);
						if($_POST['password']==$_POST['repassword']){
							$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
						}else{
							setcookie('error_pass','Mật khẩu không khớp! vui lòng nhập lại!', time()+5);
							header('location: /ShopMinh/user/insert');
						}

						// Xử lí ảnh
						if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0){
							$this->extension->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["thumbnail"]["tmp_name"],"/ShopMinh/user/insert/","../ShopMinh/public/images/admin/");
							
							if(isset($this->extension->thumbnail)){
								// insert
								$run = $this->model->insert_user($fullname,$email,$username, $password, $_POST['phone'], $_POST['address'],$_POST['gender'],$_POST['role'],$this->extension->thumbnail, $_POST['status'],$created_at,$created_by,1);
								$this->extension->echo_run($run,'msg','Thêm tài khoản thành công','Thêm tài khoản thất bại','/ShopMinh/user/index','/ShopMinh/user/index');
							}

						}
						else{
							setcookie('msg','Error: '.$_FILES["thumbnail"]["error"], time()+5) ;
							header("location: /ShopMinh/user/insert");
							}
					} else{
						setcookie('error_username', 'Tên đăng nhập không hợp lệ !', time()+5);
						header("location: /ShopMinh/user/insert");}
				}else{
						$this->extension->strlenString($_POST['username'],5,'error_username','Tên đăng nhâp');
						header("location: /ShopMinh/user/insert");
					}
		}else{$this->views_backend("components/user/insert",[
									"user"=>$row,
		]);}			
	}


	// Thùng rác 
	public function recyclebin(){
		$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_user_num(0);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/user/recyclebin/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_user(0, $start, $limit);
			$phantrang = $pagination->getPagination();
			
			$this->views_backend("components/user/recyclebin",[
								"user"=>$row,
								"phantrang"=>$phantrang
				   ]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_user($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Khôi phục tài khoản thành công','Khôi phục tài khoản thất bại','/ShopMinh/user/recyclebin','/ShopMinh/user/recyclebin');
	}
	public function delete(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->extension->echo_run($run,'msg','Xóa tài khoản thành công','Xóa tài khoản thất bại','/ShopMinh/user/recyclebin','/ShopMinh/user/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_user($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Xóa tài khoản vào thùng rác thành công','Xóa tài khoản vào thùng rác thất bại','/ShopMinh/user/index','/ShopMinh/user/index');
	}

	// Cập nhật user
	public function update(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$row = $this->model->select_user_where_id($url[2]);
		if(isset($_POST['submit'])){
			$modified = date('Y-m-d H:i:s');
			$modified_by = $_SESSION['row']['fullname'];
			if($_POST['password']=="" && $_POST['repassword']==""){
				$password = $row['password'];
				// xu li password
			}elseif($_POST['password']==$_POST['repassword']){
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				}else{
					setcookie('error_pass','Mật khẩu không khớp! vui lòng nhập lại!', time()+5);
					header('location: /ShopMinh/user/update/'.$url[2]);
				}
			// Xử lí ảnh
			if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0){
				$this->extension->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["thumbnail"]["tmp_name"],"/ShopMinh/user/update/".$url[2],"../ShopMinh/public/images/admin/");
						// ton tai thumnail moi thi update
				if(isset($this->extension->thumbnail)){$thumbnail =$this->extension->thumbnail; }
			}else{$thumbnail =$row['thumbnail']; }
				
			$run = $this->model->update_user($_POST['fullname'], $password, $_POST['phone'], $_POST['address'],$_POST['gender'],$thumbnail,$_POST['status'],$modified,$modified_by, $url[2]); 
			$this->extension->echo_run($run,'msg','Cập nhật tài khoản thành công','Cập nhật tài khoản thất bại','/ShopMinh/user/index','/ShopMinh/user/index');
		}else{
			$this->views_backend("components/user/update",[
								"row"=>$row

		]);}
		
	}

}
?>