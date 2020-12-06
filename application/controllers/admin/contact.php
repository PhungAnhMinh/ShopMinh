<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class contact extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Mcontact");
	}

	public function index(){	
		$url = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_contact(1);
		$num = $this->model->select_contact(0);
		if(isset($url[2])){
			$row = $this->model->select_contact_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
				$status = 1;
			}
			$run = $this->model->update_contact_where_id($url[2],$status);
			$this->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/contact/index','/ShopMinh/contact/index');
		}
		else{	
			$this->views_backend("components/contact/index",[
								"contact"=>$row['contact'],
								"num"=>$num['num'],
				   ]);}

	}
	public function detail(){
		$url = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_contact_where_id($url[2]);
		$this->views_backend("components/contact/detail",[
						"row"=>$row
						]);

	}
	// Thùng rác 
	public function recyclebin(){
		$row = $this->model->select_contact(0);
		$this->views_backend("components/contact/recyclebin",[
							"contact"=>$row['contact'],
						]);
		}
	// delete into trash
	public function trash(){
		$trash = 0;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_contact($trash,$url[2]);
		$this->echo_run($run,'msg','Xóa liên hệ vào thùng rác thành công','Xóa liên hệ vào thùng rác thất bại','/ShopMinh/contact/index','/ShopMinh/contact/index');
		
	}
	public function restore(){
		$trash = 1;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_contact($trash,$url[2]);
		$this->echo_run($run,'msg','Khôi phục liên hệ thành công','Khôi phục liên hệ thất bại','/ShopMinh/contact/recyclebin','/ShopMinh/contact/recyclebin');
	}
	public function delete(){
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->echo_run($run,'msg','Xóa liên hệ thành công','Xóa liên hệ thất bại','/ShopMinh/contact/recyclebin','/ShopMinh/contact/recyclebin');
		
	}
	
}
?>
