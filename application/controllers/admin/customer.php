<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class customer extends controller{
	public $model;
	public $extension;
	public $pagination;
	public function __construct(){
		$this->model=$this->models_backend("Mcustomer");
		$this->extension = $this->library_backend("extension");
		$this->pagination = $this->library_backend("pagination");
	}

	public function index(){
			$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_customer_num(1);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/customer/index/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_customer(1, $start, $limit);
			$phantrang = $pagination->getPagination();
			$num = $this->model->select_customer_num(0);
			
			$this->views_backend("components/customer/index",[
								"customer"=>$row,
								"phantrang"=>$phantrang,
								"num"=>$num
				   ]);
		}

	// status
		public function status(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_customer_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
					$status = 1;
			}
			$run = $this->model->update_customer_where_id($url[2],$status);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/customer/index','/ShopMinh/customer/index');
			
		}
	public function detail(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$row = $this->model->select_customer_where_id($url[2]);
		$this->views_backend("components/customer/detail",[
						"row"=>$row
						]);

	}
		// Thùng rác 
	public function recyclebin(){
		$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_customer_num(0);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/customer/recyclebin/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_customer(0, $start, $limit);
			$phantrang = $pagination->getPagination();
			
			$this->views_backend("components/customer/recyclebin",[
								"customer"=>$row,
								"phantrang"=>$phantrang
				   ]);
		}
	// delete into trash
	public function trash(){
		$trash = 0;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_customer($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Xóa tài khoản vào thùng rác thành công','Xóa tài khoản vào thùng rác thất bại','/ShopMinh/customer/index','/ShopMinh/customer/index');
		
	}
	public function restore(){
		$trash = 1;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_customer($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Khôi phục tài khoản thành công','Khôi phục tài khoản thất bại','/ShopMinh/customer/recyclebin','/ShopMinh/customer/recyclebin');
	}
	public function delete(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->extension->echo_run($run,'msg','Xóa tai khoản thành công','Xóa tài khoản thất bại','/ShopMinh/customer/recyclebin','/ShopMinh/customer/recyclebin');
		
	}
	
}
?>
