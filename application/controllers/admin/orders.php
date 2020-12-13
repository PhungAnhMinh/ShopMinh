<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
	class orders extends controller{
	public $model;
	public $extension;
	public $pagination;
	public function __construct(){
		$this->model=$this->models_backend("Morders");
		$this->extension = $this->library_backend("extension");
		$this->pagination = $this->library_backend("pagination");
	}

	public function index(){
			$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_orders_num(1);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/orders/index/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_orders(1, $start, $limit); 
			$phantrang = $pagination->getPagination();
			$num = $this->model->select_orders_num(0);
			
			$this->views_backend("components/orders/index",[
								"orders"=>$row,
								"phantrang"=>$phantrang,
								"num"=>$num
				   ]);
		}

	// status
		public function status(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_orders_where_id($url[2]);
			$status = $row['status'] + 1;

			$run = $this->model->update_orders_where_id($url[2],$status);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/orders/index','/ShopMinh/orders/index');
			
		}
	// cancel_order
		public function cancelOrder(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$run = $this->model->update_orders_where_id($url[2],4);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/orders/index','/ShopMinh/orders/index');
			
		}
	public function detail(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$row_id = $this->model->select_orders_where_id($url[2]);
		$row = $this->model->select_order_product_orderDetail(1,$url[2]); 
		$this->views_backend("components/orders/detail",[
						"row"=>$row_id,
						"order"=>$row
						]);

	}

	public function view(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$row_id = $this->model->select_orders_where_id($url[2]);
		$row = $this->model->select_order_product_orderDetail(0,$url[2]); 
		$this->views_backend("components/orders/detail",[
						"row"=>$row_id,
						"order"=>$row
						]);

	}
	
	// delete into trash
	public function trash(){
		$trash = 0;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_orders($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Xóa liên hệ vào thùng rác thành công','Xóa liên hệ vào thùng rác thất bại','/ShopMinh/orders/index','/ShopMinh/orders/index');
		
	}
	// Thùng rác 
	public function recyclebin(){
		$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_orders_num(0);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/orders/recyclebin/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_orders(0, $start, $limit);
			$phantrang = $pagination->getPagination();
			
			$this->views_backend("components/orders/recyclebin",[
								"orders"=>$row,
								"phantrang"=>$phantrang
				   ]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_orders($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Khôi phục liên hệ thành công','Khôi phục liên hệ thất bại','/ShopMinh/orders/recyclebin','/ShopMinh/orders/recyclebin');
	}
		
	}
?>