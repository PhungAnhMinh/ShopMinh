<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class category extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Mcategory");
	}

	public function index(){
		$arr = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_category(1);
		$num = $this->model->select_category(0);
		if(isset($arr[2])){
			$row = $this->model->select_category_where_id($arr[2]);
			$status = 0;
			if($row['status']==$status){
				$status = 1;
			}
			$run = $this->model->update_category_where_id($arr[2],$status);
			$this->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/category/index','/ShopMinh/category/index');
		}
		else{	
			$this->views_backend("components/category/index",[
							"category"=>$row['category'],
							"num"=>$num['num'],
			   ]);}

	}
	public function insert(){
		if(isset($_POST['submit'])){
			// Làm sạch tên người dùng
			$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
			// Xác thực tên người dùng
				$created_by = $_SESSION['row']['fullname']; 
				$link =$this->str_alias($_POST['name']);
				$created_at = date('Y-m-d H:i:s');

				if($_POST['parent_id']==0){
					$level = 1;
				}else{
					$row = $this->model->select_category_where_id($_POST['parent_id']);
					$level = $row['level']+1;
				}
				$run = $this->model->insert_category($postName,$link,$level,$_POST['parent_id'],$_POST['orders'],$created_at,$created_by,1,$_POST['status']);
				$this->echo_run($run,'msg','Thêm danh mục thành công','Thêm danh mục thất bại','/ShopMinh/category/index','/ShopMinh/category/index');
		}else{
			$row = $this->model->select_category(1);
			$this->views_backend("components/category/insert",[
							"category"=>$row['category'],
							
						]);
		}
	}
	// update category
	public function update(){ 
		$arr = $this->getUrl($_GET['url'],'/');
		$row_where = $this->model->select_category_where_id($arr[2]);
		$row = $this->model->select_category(1);
		if(isset($_POST['submit'])){
			$updated_at = date('Y-m-d H:i:s');
			$updated_by = $_SESSION['row']['fullname'];
			$link =$this->str_alias($_POST['name']);
			$run = $this->model->update_category($_POST['name'],$_POST['parent_id'],$_POST['orders'],$_POST['status'],$updated_at,$updated_by,$link,$arr[2]);
			$this->echo_run($run,'msg','Cập nhật danh mục thành công','Cập nhật danh mục thất bại','/ShopMinh/category/index','/ShopMinh/category/index');
		}else{
			$this->views_backend("components/category/update",[
								"category"=>$row_where,
								"row"=>$row['category']
			]);
		}
		
	}
///////////////////////////////// Xử lí xóa category + thùng rác
	// delete into trash
	public function trash(){
		$trash = 0;
		$arr = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_category(1);
		$num =$this->model->select_sl_sp($arr[2]);
		foreach ($row['category'] as $kq) {
			$parent_id[] = $kq['parent_id'];
		}
		if(in_array($arr[2],$parent_id)==true){
			setcookie('msg','Danh mục này còn danh mục con bên trong, Không thể thực hiện!', time()+5);
			header("location: /ShopMinh/category/index");
		}elseif($num>0){
			setcookie('msg','Danh mục còn sản phẩm bên trong, hãy xóa sản phẩm trước!', time()+5);
			header("location: /ShopMinh/category/index");
		}else{
			$run = $this->model->recyclebin_category($trash,$arr[2]);
			$this->echo_run($run,'msg','Xóa danh mục vào thùng rác thành công','Xóa danh mục vào thùng rác thất bại','/ShopMinh/category/index','/ShopMinh/category/index');
		}
		
	}
	// Thùng rác 
	public function recyclebin(){
		$row = $this->model->select_category(0);
		$this->views_backend("components/category/recyclebin",[
							"category"=>$row['category'],
						]);
		}
	public function restore(){
		$trash = 1;
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_category($trash,$arr[2]);
		$this->echo_run($run,'msg','Khôi phục danh mục thành công','Khôi phục danh mục thất bại','/ShopMinh/category/recyclebin','/ShopMinh/category/recyclebin');
	}
	public function delete(){
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($arr[2]);
		$this->echo_run($run,'msg','Xóa danh mục thành công','Xóa danh mục thất bại','/ShopMinh/category/recyclebin','/ShopMinh/category/recyclebin');
		
	}
	
}
?>
