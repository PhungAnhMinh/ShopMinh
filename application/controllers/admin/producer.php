<?php  
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
	class producer extends controller{
		public $model;
		public function __construct(){
			$this->model = $this->models_backend("Mproducer");
		}
		public function index(){
			$arr = $this->getUrl($_GET['url'],'/');
			$row = $this->model->select_producer(1);
			$num = $this->model->select_producer(0);
			if(isset($arr[2])){
				$row = $this->model->select_producer_where_id($arr[2]);
				$status = 0;
				if($row['status']==$status){
					$status = 1;
				}
				$run = $this->model->update_producer_where_id($arr[2],$status);
				$this->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/producer/index','/ShopMinh/producer/index');
			}
			else{	
				$this->views_backend("components/producer/index",[
								"producer"=>$row['producer'],
								"num"=>$num['num'],
				   ]);}
		}
	// insert
		public function insert(){
			$created_by = $_SESSION['row']['fullname']; 
			if(isset($_POST['submit'])){
				$created_at = date('Y-m-d H:i:s');
				$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
				$postCode = filter_var(trim($_POST['code']), FILTER_SANITIZE_STRING);
				$postKeyword = filter_var(trim($_POST['keyword']), FILTER_SANITIZE_STRING);
				$run = $this->model->insert_producer($postName,$postCode,$postKeyword,$created_at,$created_by,1,$_POST['status']);
				$this->echo_run($run,'msg','Thêm nhà cung cấp thành công','Thêm nhà cung cấp thất bại','/ShopMinh/producer/index','/ShopMinh/producer/index');
			}else{$this->views_backend("components/producer/insert", []);}	


		}
		///////////////////////////////// Xử lí xóa producer + thùng rác
	// delete into trash
	public function trash(){
		$trash = 0;
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_producer($trash,$arr[2]);
		$this->echo_run($run,'msg','Xóa nhà cung cấp vào thùng rác thành công','Xóa nhà cung cấp vào thùng rác thất bại','/ShopMinh/producer/index','/ShopMinh/producer/index');
		
	}
	// Thùng rác 
	public function recyclebin(){
		$row = $this->model->select_producer(0);
		$this->views_backend("components/producer/recyclebin",[
							"producer"=>$row['producer'],
						]);
		}
	public function restore(){
		$trash = 1;
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_producer($trash,$arr[2]);
		$this->echo_run($run,'msg','Khôi phục nhà cung cấp thành công','Khôi phục nhà cung cấp thất bại','/ShopMinh/producer/recyclebin','/ShopMinh/producer/recyclebin');
	}
	public function delete(){
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($arr[2]);
		$this->echo_run($run,'msg','Xóa nhà cung cấp thành công','Xóa nhà cung cấp thất bại','/ShopMinh/producer/recyclebin','/ShopMinh/producer/recyclebin');
		
	}
	// update
		public function update(){
			$arr = $this->getUrl($_GET['url'],'/');
			$row = $this->model->select_producer_where_id($arr[2]);
			if(isset($_POST['submit'])){
				$updated_at = date('Y-m-d H:i:s');
				$updated_by = $_SESSION['row']['fullname'];
				$run = $this->model->update_producer($_POST['name'],$_POST['keyword'],$created_at,$created_by,1,$_POST['status'],$arr[2]);
				$this->echo_run($run,'msg','Cập nhật nhà cung cấp thành công','Cập nhật nhà cung cấp thất bại','/ShopMinh/producer/index','/ShopMinh/producer/index');
			}else{
				$this->views_backend("components/producer/update",[
									"row"=>$row
				]);
			}
		
		}
	}
?>