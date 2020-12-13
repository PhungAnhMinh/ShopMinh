<?php  
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
	class coupon extends controller{
		public $model;
		public $extension;
		public $pagination;
		public function __construct(){
			$this->model = $this->models_backend("Mcoupon");
			$this->extension = $this->library_backend("extension");
			$this->pagination = $this->library_backend("pagination");
		}
		public function index(){
			$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_coupon_num(1);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/coupon/index/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_coupon(1, $start, $limit);
			$phantrang = $pagination->getPagination();
			$num = $this->model->select_coupon_num(0);
			
			$this->views_backend("components/coupon/index",[
								"coupon"=>$row,
								"phantrang"=>$phantrang,
								"num"=>$num
				   ]);
		}

	// status
		public function status(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_coupon_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
					$status = 1;
			}
			$run = $this->model->update_coupon_where_id($url[2],$status);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/coupon/index','/ShopMinh/coupon/index');
			
		}
	// insert
		public function insert(){ 
			if(isset($_POST['submit'])){
				if(empty($_POST['code'])==false && empty($_POST['limit_number'])==false && empty($_POST['discount'])==false){
					// kiểm tra độ dài chuỗi
					$strlenCode = $this->extension->strlenString($_POST['code'],5,'error_code','Tên mã giảm giá');
					if($strlenCode==false){
						 // Làm sạch tên người dùng
					    $field = filter_var(trim($_POST['code']), FILTER_SANITIZE_STRING);
					    // Xác thực tên người dùng
					    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
					        $code = str_replace(" ", "", strtoupper($field));
					        $created_at = date('Y-m-d H:i:s');
							$run = $this->model->insert_coupon($code, $_POST['discount'], $_POST['limit_number'], $_POST['expiration_date'], $_POST['payment_limit'], $_POST['description'], $created_at, 1, $_POST['status']);
							$this->extension->echo_run($run,'msg','Thêm mã giảm giá thành công','Thêm mã giảm giá thất bại','/ShopMinh/coupon/index','/ShopMinh/coupon/index');

					    } else{
					    	setcookie('error_code', 'Mã giảm giá không hợp lệ !', time()+5);
							header("location: /ShopMinh/coupon/insert");}
					}else{$this->extension->strlenString($_POST['code'],5,'error_code','Tên mã giảm giá');
						header("location: /ShopMinh/coupon/insert");}
				}else{
					$this->extension->strlenString($_POST['code'],5,'error_code','Tên mã giảm giá');
					// $this->filterName($_POST['code'],'Tên mã giảm giá','error_code');
					// $this->filterNumber($_POST['limit_number'],'Số lần giới hạn nhập','error_limit_number');
					// $this->filterNumber($_POST['discount'],'Số tiền giảm giá','error_discount');
					header("location: /ShopMinh/coupon/insert");
				}
			}else{$this->views_backend("components/coupon/insert", []);}	
		}
		///////////////////////////////// Xử lí xóa coupon + thùng rác
	// delete into trash
	public function trash(){
		$trash = 0;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_coupon($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Xóa mã giảm giá vào thùng rác thành công','Xóa mã giảm giá vào thùng rác thất bại','/ShopMinh/coupon/index','/ShopMinh/coupon/index');
		
	}
	// Thùng rác 
	public function recyclebin(){
		$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_coupon_num(0);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/coupon/recyclebin/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_coupon(0, $start, $limit);
			$phantrang = $pagination->getPagination();
			
			$this->views_backend("components/coupon/recyclebin",[
								"coupon"=>$row,
								"phantrang"=>$phantrang
				   ]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_coupon($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Khôi phục mã giảm giá thành công','Khôi phục mã giảm giá thất bại','/ShopMinh/coupon/recyclebin','/ShopMinh/coupon/recyclebin');
	}
	public function delete(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->extension->echo_run($run,'msg','Xóa mã giảm giá thành công','Xóa mã giảm giá thất bại','/ShopMinh/coupon/recyclebin','/ShopMinh/coupon/recyclebin');
		
	}
	// update
		public function update(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_coupon_where_id($url[2]);
			if(isset($_POST['submit'])){
				// Làm sạch tên người dùng
				$field = filter_var(trim($_POST['code']), FILTER_SANITIZE_STRING);
				// Xác thực tên người dùng
				if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
					$code = str_replace(" ", "", strtoupper($field));
					$run = $this->model->update_coupon($code, $_POST['discount'], $_POST['limit_number'], $_POST['expiration_date'], $_POST['payment_limit'], $_POST['description'],$_POST['status'],$url[2]);
					
					$this->extension->echo_run($run,'msg','Cập nhật mã giảm giá thành công','Cập nhật mã giảm giá thất bại','/ShopMinh/coupon/index','/ShopMinh/coupon/index');
				}else{
					setcookie('error_code', 'Mã giảm giá không hợp lệ !', time()+5);
					header("location: /ShopMinh/coupon/update");
				}
			}else{
				$this->views_backend("components/coupon/update",[
									"row"=>$row
				]);
			}
		
		}
	}
?>