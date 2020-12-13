<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();
class slider extends controller{
	public $model;
	public $extension;
	public $pagination;
	public function __construct(){
		$this->model=$this->models_backend("Mslider");
		$this->extension = $this->library_backend("extension");
		$this->pagination = $this->library_backend("pagination");
	}

	public function index(){
			$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_slider_num(1);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/slider/index/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_slider(1, $start, $limit);
			$phantrang = $pagination->getPagination();
			$num = $this->model->select_slider_num(0);
			
			$this->views_backend("components/slider/index",[
								"slider"=>$row,
								"phantrang"=>$phantrang,
								"num"=>$num
				   ]);
		}

	// status
		public function status(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_slider_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
					$status = 1;
			}
			$run = $this->model->update_slider_where_id($url[2],$status);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
			
		}

	// Thêm mới slider
	public function insert(){
		if(isset($_POST['submit'])){
			// Làm sạch tên người dùng
			$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
			$created_by = $_SESSION['row']['fullname'];
			$created_at = date('Y-m-d H:i:s');
			$link =$this->extension->str_alias($postName);
			// Xử lí ảnh
			if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
				$this->extension->xu_li_anh($_FILES["img"]["name"],$_FILES["img"]["type"],$_FILES["img"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/slider/insert/","../ShopMinh/public/images/banners/");
				if(isset($this->extension->thumbnail)){
					// insert
					$run = $this->model->insert_slider($postName, $link, $this->extension->thumbnail, $created_at, $created_by,1, $_POST['status']);
					$this->extension->echo_run($run,'msg','Thêm slider thành công','Thêm slider thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
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
		$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_slider_num(0);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/slider/recyclebin/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_slider(0, $start, $limit);
			$phantrang = $pagination->getPagination();
			
			$this->views_backend("components/slider/recyclebin",[
								"slider"=>$row,
								"phantrang"=>$phantrang
				   ]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_slider($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Khôi phục slider thành công','Khôi phục slider thất bại','/ShopMinh/slider/recyclebin','/ShopMinh/slider/recyclebin');
	}
	public function delete(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->extension->echo_run($run,'msg','Xóa slider thành công','Xóa slider thất bại','/ShopMinh/slider/recyclebin','/ShopMinh/slider/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_slider($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Xóa slider vào thùng rác thành công','Xóa slider vào thùng rác thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
	}

	// Cập nhật slider
	public function update(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$row = $this->model->select_slider_where_id($url[2]);
		if(isset($_POST['submit'])){
			$modified = date('Y-m-d H:i:s');
			$modified_by = $_SESSION['row']['fullname']; 
			$link =$this->extension->str_alias($_POST['name']);
			// Làm sạch tên người dùng
			$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
			// Xử lí ảnh
			if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
				$this->extension->xu_li_anh($_FILES["img"]["name"],$_FILES["img"]["type"],$_FILES["img"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/slider/update/".$url[2],"../ShopMinh/public/images/banners/");
				// ton tai thumnail moi thi update
				if(isset($this->extension->thumbnail)){
					$run = $this->model->update_slider($postName, $link, $this->extension->thumbnail, $modified, $modified_by, $_POST['status'], $url[2]);
					$this->extension->echo_run($run,'msg','Cập nhật slider thành công','Cập nhật slider thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
				}
			}else{
				$run = $this->model->update_slider($postName, $link, $row['img'], $modified, $modified_by, $_POST['status'], $url[2]); 
				$this->extension->echo_run($run,'msg','Cập nhật slider thành công','Cập nhật slider thất bại','/ShopMinh/slider/index','/ShopMinh/slider/index');
				}
		}else{
			$this->views_backend("components/slider/update",[
								"row"=>$row

			]);
		}
		
	}

}
?>