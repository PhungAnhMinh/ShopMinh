<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();
class useradmin extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Muser");
	}

	public function index(){
		$url = $this->getUrl($_GET['url'],'/');
		if(isset($url[2])){
			$row = $this->model->select_useradmin_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
				$status = 1;
			}
			$run = $this->model->update_useradmin_where_id($url[2],$status);
			$this->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/useradmin/index','/ShopMinh/useradmin/index');
		}
		else{
			$row = $this->model->select_useradmin(1);
			$num = $this->model->select_useradmin(0);
			$this->views_backend("components/useradmin/index",[
							"useradmin"=>$row['useradmin'],
							"num"=>$num['num']
			   ]);
		}

		
	}

	// Thêm mới useradmin
	public function insert(){
		if(isset($_POST['submit'])){
			// Làm sạch tên người dùng
			$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
			$created_by = $_SESSION['row']['fullname'];
			$created = date('Y-m-d H:i:s');
			$link =$this->str_alias($postName);
			// Xử lí ảnh
			if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
				$this->xu_li_anh($_FILES["img"]["name"],$_FILES["img"]["type"],$_FILES["img"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/useradmin/insert/","../ShopMinh/public/images/banners/");
				if(isset($this->thumbnail)){
					// insert
					$run = $this->model->insert_useradmin($postName, $link, $this->thumbnail, $created, $created_by,1, $_POST['status']);
					$this->echo_run($run,'msg','Thêm tài khoản thành công','Thêm tài khoản thất bại','/ShopMinh/useradmin/index','/ShopMinh/useradmin/index');
				}
			}
			else{
				setcookie('msg','Error: '.$_FILES["img"]["error"], time()+5) ;
				header("location: /ShopMinh/useradmin/insert");
				}
		}else{$this->views_backend("components/useradmin/insert",[]);}			
	}


	// Thùng rác 
	public function recyclebin(){
		$row = $this->model->select_useradmin(0);
		$this->views_backend("components/useradmin/recyclebin",[
							"useradmin"=>$row['useradmin'],
						]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_useradmin($trash,$url[2]);
		$this->echo_run($run,'msg','Khôi phục tài khoản thành công','Khôi phục tài khoản thất bại','/ShopMinh/useradmin/recyclebin','/ShopMinh/useradmin/recyclebin');
	}
	public function delete(){
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->echo_run($run,'msg','Xóa tài khoản thành công','Xóa tài khoản thất bại','/ShopMinh/useradmin/recyclebin','/ShopMinh/useradmin/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_useradmin($trash,$url[2]);
		$this->echo_run($run,'msg','Xóa tài khoản vào thùng rác thành công','Xóa tài khoản vào thùng rác thất bại','/ShopMinh/useradmin/index','/ShopMinh/useradmin/index');
	}

	// Cập nhật useradmin
	public function update(){
		$url = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_useradmin_where_id($url[2]);
		if(isset($_POST['submit'])){
			$modified = date('Y-m-d H:i:s');
			$modified_by = $_SESSION['row']['fullname']; 
			$link =$this->str_alias($_POST['name']);
			// Làm sạch tên người dùng
			$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
			// Xử lí ảnh
			if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
				$this->xu_li_anh($_FILES["img"]["name"],$_FILES["img"]["type"],$_FILES["img"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/useradmin/update/".$url[2],"../ShopMinh/public/images/banners/");
				// ton tai thumnail moi thi update
				if(isset($this->thumbnail)){
					$run = $this->model->update_useradmin($postName, $link, $this->thumbnail, $modified, $modified_by, $_POST['status'], $url[2]);
					$this->echo_run($run,'msg','Cập nhật tài khoản thành công','Cập nhật tài khoản thất bại','/ShopMinh/useradmin/index','/ShopMinh/useradmin/index');
				}
			}else{
				$run = $this->model->update_useradmin($postName, $link, $row['img'], $modified, $modified_by, $_POST['status'], $url[2]); 
				$this->echo_run($run,'msg','Cập nhật tài khoản thành công','Cập nhật tài khoản thất bại','/ShopMinh/useradmin/index','/ShopMinh/useradmin/index');
				}
		}else{
			$this->views_backend("components/useradmin/update",[
								"row"=>$row

			]);
		}
		
	}

}
?>