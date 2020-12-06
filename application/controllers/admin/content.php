<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();
class content extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Mcontent");
	}

	public function index(){
		$arr = $this->getUrl($_GET['url'],'/');
		if(isset($arr[2])){
			$row = $this->model->select_content_where_id($arr[2]);
			$status = 0;
			if($row['status']==$status){
				$status = 1;
			}
			$run = $this->model->update_content_where_id($arr[2],$status);
			$this->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
		}
		else{
			$row = $this->model->select_content(1);
			$num = $this->model->select_content(0);
			$this->views_backend("components/content/index",[
							"content"=>$row['content'],
							"num"=>$num['num']
			   ]);
		}

		
	}

	// Thêm mới bài viết
	public function insert(){
		$created_by = $_SESSION['row']['fullname']; 
		if(isset($_POST['submit'])){
			// Xử lí ảnh
			$alias =$this->str_alias($_POST['title']);
			if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0){
				$this->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/content/insert/","../ShopMinh/public/images/posts/");
				if(isset($this->thumbnail)){
					$created = date('Y-m-d H:i:s');
					$run = $this->model->insert_content($_POST['title'],$_POST['description'],$_POST['fullcontent'],$this->thumbnail,$created,1,$_POST['status'],$created_by,$alias);
					
					$this->echo_run($run,'msg','Thêm bài viết thành công','Thêm bài viết thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
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
		$row = $this->model->select_content(0);
		$this->views_backend("components/content/recyclebin",[
							"content"=>$row['content'],
						]);
		}
	public function restore(){
		$trash = 1;
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_content($trash,$arr[2]);
		$this->echo_run($run,'msg','Khôi phục bài viết thành công','Khôi phục bài viết thất bại','/ShopMinh/content/recyclebin','/ShopMinh/content/recyclebin');
	}
	public function delete(){
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($arr[2]);
		$this->echo_run($run,'msg','Xóa bài viết thành công','Xóa bài viết thất bại','/ShopMinh/content/recyclebin','/ShopMinh/content/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$arr = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_content($trash,$arr[2]);
		$this->echo_run($run,'msg','Xóa bài viết vào thùng rác thành công','Xóa bài viết vào thùng rác thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
	}

	// Cập nhật bài viết
	public function update(){
		$modified = date('Y-m-d H:i:s');
		$modified_by = $_SESSION['row']['fullname']; 
		$arr = $this->getUrl($_GET['url'],'/');
		$row = $this->model->select_content_where_id($arr[2]);
		if(isset($_POST['submit'])){
			$alias =$this->str_alias($_POST['title']);
			// Xử lí ảnh
			if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0){
				$this->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/content/update/$id","../ShopMinh/public/images/posts/");
				if(isset($this->thumbnail)){
					$run = $this->model->update_content($_POST['title'],$_POST['description'],$_POST['fullcontent'],$this->thumbnail,$modified,1,$_POST['status'],$modified_by,$arr[2],$alias);
					$this->echo_run($run,'msg','Cập nhật bài viết thành công','Cập nhật bài viết thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
				}
			}else{
				$run = $this->model->update_content($_POST['title'],$_POST['description'],$_POST['fullcontent'],$row['thumbnail'],$modified,1,$_POST['status'],$modified_by,$arr[2],$alias);
				$this->echo_run($run,'msg','Cập nhật bài viết thành công','Cập nhật bài viết thất bại','/ShopMinh/content/index','/ShopMinh/content/index');
				}
		}else{
			$this->views_backend("components/content/update",[
								"content"=>$row

			]);
		}
		
	}

}
?>