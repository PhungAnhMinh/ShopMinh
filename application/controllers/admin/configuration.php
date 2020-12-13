<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class configuration extends controller{
	public $model;
	public $extension;
	public function __construct(){
		$this->model=$this->models_backend("Mconfiguration");
		$this->extension = $this->library_backend("extension");
	}

	public function update(){
		$row = $this->model->select_configuration(1);
		if(isset($_POST['submit'])){
			$modified = date('Y-m-d H:i:s');
			$modified_by = $_SESSION['row']['fullname'];
			$arr = $this->extension->getUrl($_GET['url'],'/');
			$run = $this->model->update_configuration($_POST['mail_smtp'], $_POST['mail_smtp_password'], $_POST['mail_noreply'], $_POST['price_ship'], $_POST['title'], $_POST['description'], $modified,$modified_by,$arr[2]); 
			$this->extension->echo_run($run,'msg','Cập nhật cấu hình thành công','Cập nhật cấu hình thất bại','/ShopMinh/configuration/update','/ShopMinh/configuration/update');
		}
		$this->views_backend("components/configuration/update",[
						"row"=>$row
						]);

	}
	
	
}
?>
