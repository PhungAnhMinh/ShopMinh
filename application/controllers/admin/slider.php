<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();
class slider extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Mslider");
	}

	public function index(){
		$url = $this->getUrl($_GET['url'],'/');
		if(isset($url[2])){
			$row = $this->model->select_slider_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
				$status = 1;
			}
			$run = $this->model->update_slider_where_id($url[2],$status);
			$this->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
		}
		else{
			$row = $this->model->select_slider(1);
			$num = $this->model->select_slider(0);
			$this->views_backend("components/slider/index",[
							"slider"=>$row['slider'],
							"num"=>$num['num']
			   ]);
		}

		
	}

	// Thêm mới slider
	public function insert(){
		if(isset($_POST['submit'])){
			// Làm sạch tên người dùng
			$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
			$created_by = $_SESSION['row']['fullname'];
			$created = date('Y-m-d H:i:s');
			$link =$this->str_alias($postName);
			// Xử lí ảnh
			if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
				$this->xu_li_anh($_FILES["img"]["name"],$_FILES["img"]["type"],$_FILES["img"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/slider/insert/","../ShopMinh/public/images/banners/");
				if(isset($this->thumbnail)){
					// insert
					$run = $this->model->insert_slider($postName, $link, $this->thumbnail, $created, $created_by,1, $_POST['status']);
					$this->echo_run($run,'msg','Thêm slider thành công','Thêm slider thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
				}
			}
			else{
				setcookie('msg','Error: '.$_FILES["img"]["error"], time()+5) ;
				header("location: /ShopMinh/slider/insert");
				}
		}else{$this->views_backend("components/slider/insert",[]);}			
	}


	// Thùng rác 
	public function recyclebin(){
		$row = $this->model->select_slider(0);
		$this->views_backend("components/slider/recyclebin",[
							"slider"=>$row['slider'],
						]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_slider($trash,$url[2]);
		$this->echo_run($run,'msg','Khôi phục slider thành công','Khôi phục slider thất bại','/ShopMinh/slider/recyclebin','/ShopMinh/slider/recyclebin');
	}
	public function delete(){
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->echo_run($run,'msg','Xóa slider thành công','Xóa slider thất bại','/ShopMinh/slider/recyclebin','/ShopMinh/slider/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_slider($trash,$url[2]);
		$this->echo_run($run,'msg','Xóa slider vào thùng rác thành công','Xóa slider vào thùng rác thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
	}

	// Cập nhật slider
	public function update(){
		$url = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_slider_where_id($url[2]);
		if(isset($_POST['submit'])){
			$modified = date('Y-m-d H:i:s');
			$modified_by = $_SESSION['row']['fullname']; 
			$link =$this->str_alias($_POST['name']);
			// Làm sạch tên người dùng
			$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
			// Xử lí ảnh
			if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
				$this->xu_li_anh($_FILES["img"]["name"],$_FILES["img"]["type"],$_FILES["img"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/slider/update/".$url[2],"../ShopMinh/public/images/banners/");
				// ton tai thumnail moi thi update
				if(isset($this->thumbnail)){
					$run = $this->model->update_slider($postName, $link, $this->thumbnail, $modified, $modified_by, $_POST['status'], $url[2]);
					$this->echo_run($run,'msg','Cập nhật slider thành công','Cập nhật slider thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
				}
			}else{
				$run = $this->model->update_slider($postName, $link, $row['img'], $modified, $modified_by, $_POST['status'], $url[2]); 
				$this->echo_run($run,'msg','Cập nhật slider thành công','Cập nhật slider thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
				}
		}else{
			$this->views_backend("components/slider/update",[
								"row"=>$row

			]);
		}
		
	}

}
?>