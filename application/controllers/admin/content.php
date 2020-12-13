<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();
class content extends controller{
	public $model;
	public $extension;
	public $pagination;
	public function __construct(){
		$this->model=$this->models_backend("Mcontent");
		$this->extension = $this->library_backend("extension");
		$this->pagination = $this->library_backend("pagination");
	}

	public function index(){
			$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_content_num(1);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/content/index/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_content(1, $start, $limit);
			$phantrang = $pagination->getPagination();
			$num = $this->model->select_content_num(0);
			
			$this->views_backend("components/content/index",[
								"content"=>$row,
								"phantrang"=>$phantrang,
								"num"=>$num
				   ]);
		}

	// status
		public function status(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_content_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
					$status = 1;
			}
			$run = $this->model->update_content_where_id($url[2],$status);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
			
		}
	// Thêm mới bài viết
	public function insert(){
		$created_by = $_SESSION['row']['fullname']; 
		if(isset($_POST['submit'])){
			// Xử lí ảnh
			$alias =$this->extension->str_alias($_POST['title']);
			if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0){
				$this->extension->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/content/insert/","../ShopMinh/public/images/posts/");
				if(isset($this->extension->thumbnail)){
					$created_at = date('Y-m-d H:i:s');
					$run = $this->model->insert_content($_POST['title'],$_POST['description'],$_POST['fullcontent'],$this->extension->thumbnail,$created_at,1,$_POST['status'],$created_by,$alias);
					
					$this->extension->echo_run($run,'msg','Thêm bài viết thành công','Thêm bài viết thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
				}
			}
			else{
				setcookie('msg','Error: '.$_FILES["thumbnail"]["error"], time()+5) ;
				header("location: /ShopMinh/content/insert");
				}
		}else{$this->views_backend("components/content/insert",[]);}			
	}


	
		// Thùng rác 
	public function recyclebin(){
		$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_content_num(0);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/content/recyclebin/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_content(0, $start, $limit);
			$phantrang = $pagination->getPagination();
			
			$this->views_backend("components/content/recyclebin",[
								"content"=>$row,
								"phantrang"=>$phantrang
				   ]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_content($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Khôi phục bài viết thành công','Khôi phục bài viết thất bại','/ShopMinh/content/recyclebin','/ShopMinh/content/recyclebin');
	}
	public function delete(){
		$arr = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->delete($arr[2]);
		$this->extension->echo_run($run,'msg','Xóa bài viết thành công','Xóa bài viết thất bại','/ShopMinh/content/recyclebin','/ShopMinh/content/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$arr = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_content($trash,$arr[2]);
		$this->extension->echo_run($run,'msg','Xóa bài viết vào thùng rác thành công','Xóa bài viết vào thùng rác thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
	}

	// Cập nhật bài viết
	public function update(){
		$modified = date('Y-m-d H:i:s');
		$modified_by = $_SESSION['row']['fullname']; 
		$arr = $this->extension->getUrl($_GET['url'],'/');
		$row = $this->model->select_content_where_id($arr[2]);
		if(isset($_POST['submit'])){
			$alias =$this->extension->str_alias($_POST['title']);
			// Xử lí ảnh
			if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0){
				$this->extension->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/content/update/$id","../ShopMinh/public/images/posts/");
				if(isset($this->extension->thumbnail)){
					$run = $this->model->update_content($_POST['title'],$_POST['description'],$_POST['fullcontent'],$this->extension->thumbnail,$modified,1,$_POST['status'],$modified_by,$arr[2],$alias);
					$this->extension->echo_run($run,'msg','Cập nhật bài viết thành công','Cập nhật bài viết thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
				}
			}else{
				$run = $this->model->update_content($_POST['title'],$_POST['description'],$_POST['fullcontent'],$row['thumbnail'],$modified,1,$_POST['status'],$modified_by,$arr[2],$alias);
				$this->extension->echo_run($run,'msg','Cập nhật bài viết thành công','Cập nhật bài viết thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
				}
		}else{
			$this->views_backend("components/content/update",[
								"content"=>$row

			]);
		}
		
	}

}
?>