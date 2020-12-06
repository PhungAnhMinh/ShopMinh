<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class customer extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Mcustomer");
	}

	public function index(){	
		$url = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_customer(1);
		$num = $this->model->select_customer(0);
		if(isset($url[2])){
			$row = $this->model->select_customer_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
				$status = 1;
			}
			$run = $this->model->update_customer_where_id($url[2],$status);
			$this->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/customer/index','/ShopMinh/customer/index');
		}
		else{	
			$this->views_backend("components/customer/index",[
								"customer"=>$row['customer'],
								"num"=>$num['num'],
				   ]);}

	}
	public function detail(){
		$url = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_customer_where_id($url[2]);
		$this->views_backend("components/customer/detail",[
						"row"=>$row
						]);

	}
	// Thùng rác 
	public function recyclebin(){
		$row = $this->model->select_customer(0);
		$this->views_backend("components/customer/recyclebin",[
							"customer"=>$row['customer'],
						]);
		}
	// delete into trash
	public function trash(){
		$trash = 0;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_customer($trash,$url[2]);
		$this->echo_run($run,'msg','Xóa tài khoản vào thùng rác thành công','Xóa tài khoản vào thùng rác thất bại','/ShopMinh/customer/index','/ShopMinh/customer/index');
		
	}
	public function restore(){
		$trash = 1;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_customer($trash,$url[2]);
		$this->echo_run($run,'msg','Khôi phục tài khoản thành công','Khôi phục tài khoản thất bại','/ShopMinh/customer/recyclebin','/ShopMinh/customer/recyclebin');
	}
	public function delete(){
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->echo_run($run,'msg','Xóa tai khoản thành công','Xóa tài khoản thất bại','/ShopMinh/customer/recyclebin','/ShopMinh/customer/recyclebin');
		
	}
	
}
?>
