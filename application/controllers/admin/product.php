<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class product extends controller{
	public $model;
	public $model_cate;
	public $model_pr;
	public function __construct(){
		$this->model=$this->models_backend("Mproduct");
		$this->model_cate=$this->models_backend("Mcategory");
		$this->model_pr=$this->models_backend("Mproducer");
	}

	public function index(){
		$url = $this->getUrl($_GET['url'],'/');
		if(isset($url[2])){
			$row = $this->model->select_product_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
				$status = 1;
			}
			$run = $this->model->update_product_where_id($url[2],$status);
			setcookie('msg', 'Cập nhật thành công', time()+5);
			$row = $this->model->select_product(1);
			$num = $this->model->select_product(0);
			$this->views_backend("components/product/index",[
							"product"=>$row['product'],
							"num"=>$num['num']
						]);
		}
		else{
			$row = $this->model->select_product(1);
			$num = $this->model->select_product(0);
			$this->views_backend("components/product/index",[
							"product"=>$row['product'],
							"num"=>$num['num']
			   ]);
		}

	}
	// Insert
	public function insert(){
		$created_by = $_SESSION['row']['fullname']; 
		$created = date('Y-m-d H:i:s');
		if(isset($_POST['submit'])){
			// Xử lí ảnh
			
			if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0 && isset($_FILES["img"]) ){
				$this->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/product/insert","../ShopMinh/public/images/products/");
				$this->xu_li_anh_mang($_FILES['img']['name'],$_FILES['img']['tmp_name'],$_FILES['img']['size'],$_FILES['img']['type'],$_FILES['img']['error'],"/ShopMinh/product/insert","../ShopMinh/public/images/products/");
				if(isset($this->thumbnail)&&isset($this->img)){
					$modified = date('Y-m-d H:i:s');
					$alias =$this->str_alias($_POST['name']);
					// xử lí giá bán
					if($_POST['sale']==""){
						$price_sale = $_POST['price'];
						$_POST['sale'] = 0;
					}else{$price_sale = $_POST['price'] - ($_POST['price']*($_POST['sale']/100));}
					// insert in db

					$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
					$run = $this->model->insert_product($_POST['category_id'],$postName,$alias,$this->thumbnail,$this->img,$_POST['description'],$_POST['detail'],$_POST['producer_id'],$_POST['number'],$_POST['sale'],$_POST['price'],$price_sale,$created,$created_by,$_POST['status'],1);

					$this->echo_run($run,'msg','Thêm sản phẩm thành công','Thêm sản phẩm thất bại','/ShopMinh/product/index','/ShopMinh/product/index');
				}
			}
			else{setcookie('msg','Error: '.$_FILES["thumbnail"]["error"], time()+5) ;
				header("location: /ShopMinh/product/insert");}
		}else{$this->views_backend("components/product/insert",[]);}

	}

	// Thùng rác 
	public function recyclebin(){
		$row = $this->model->select_product(0);
		$this->views_backend("components/product/recyclebin",[
							"product"=>$row['product'],
						]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_product($trash,$url[2]);
		$this->echo_run($run,'msg','Khôi phục sản phẩm thành công','Khôi phục sản phẩm thất bại','/ShopMinh/product/recyclebin','/ShopMinh/product/recyclebin');
	}
	public function delete(){
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->echo_run($run,'msg','Xóa sản phẩm thành công','Xóa sản phẩm thất bại','/ShopMinh/product/recyclebin','/ShopMinh/product/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$url = $this->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_product($trash,$url[2]);
		$this->echo_run($run,'msg','Xóa sản phẩm vào thùng rác thành công','Xóa sản phẩm vào thùng rác thất bại','/ShopMinh/product/index','/ShopMinh/product/index');
	}
	public function update(){
		$url = $this->getUrl($_GET['url'],'/');
		$row_where = $this->model->select_product_where_id($url[2]);
		$img = $this->getUrl($row_where['img'],',');
		$modified = date('Y-m-d H:i:s');
		$modified_by = $_SESSION['row']['fullname'];

		if(isset($_POST['submit'])){
			// Xử lí ảnh
			$alias =$this->str_alias($_POST['name']);
			// xử lí giá bán
			if($_POST['sale']==""){
				$price_sale = $_POST['price'];
				$_POST['sale'] = 0;
			}else{$price_sale = $_POST['price'] - ($_POST['price']*($_POST['sale']/100));}
			$count_error = 0;
			// foreach ($_FILES['img'] as $key => $value) {
			// 	if(in_array(0,$_FILES['img']['error'])){$count_error +=1;}
			// }
			for($i=0;$i<count($_FILES['img']['error']);$i++){
				if(in_array(0,$_FILES['img']['error'])){$count_error +=1;}
			}
			if(isset($_FILES["thumbnail"])&& $_FILES["thumbnail"]["error"] == 0){
				// xu li anh dai dien
				$this->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["img"]["tmp_name"],"/ShopMinh/product/update/$url[2]","../ShopMinh/public/images/products/");
				if(isset($this->thumbnail)){$row_where['thumbnail'] =$this->thumbnail;}
			}elseif(isset($_FILES["img"])&& $count_error==count($_FILES['img']['error'])){
				// xu li anh san pham
				$this->xu_li_anh_mang($_FILES['img']['name'],$_FILES['img']['tmp_name'],$_FILES['img']['size'],$_FILES['img']['type'],$_FILES['img']['error'],"/ShopMinh/product/update/$url[2]","../ShopMinh/public/images/products/");
				if(isset($this->img) ){$row_where['img'] =$this->img;}
			}
			else{
				$run = $this->model->update_product($_POST['category_id'],$_POST['name'],$alias,$row_where['thumbnail'],$row_where['img'],$_POST['description'],$_POST['detail'],$_POST['producer_id'],$_POST['sale'],$_POST['price'],$price_sale,$modified,$modified_by,$_POST['status'],$url[2]);
				$this->echo_run($run,'msg','Cập nhật sản phẩm thành công','Thêm sản phẩm thất bại',"/ShopMinh/product/index/".$url[2],'/ShopMinh/product/update/'.$url[2]);
			}
			$run = $this->model->update_product($_POST['category_id'],$_POST['name'],$alias,$row_where['thumbnail'],$row_where['img'],$_POST['description'],$_POST['detail'],$_POST['producer_id'],$_POST['sale'],$_POST['price'],$price_sale,$modified,$modified_by,$_POST['status'],$url[2]);
			$this->echo_run($run,'msg','Cập nhật sản phẩm thành công','Thêm sản phẩm thất bại','/ShopMinh/product/index/'.$url[2],'/ShopMinh/product/update/'.$url[2]);
			
		}else{
			$this->views_backend("components/product/update",[
								"product"=>$row_where,
								"img"=>$img
			]);}
	}
	// Nhap Hang
	public function import(){
		$url = $this->getUrl($_GET['url'],'/');
		$product = $this->model->select_product_where_id($url[2]);
		if(isset($_POST['submit'])){
			if(empty($_POST['number'])){
				setcookie('error', 'Vui lòng nhập số lượng', time()+5);
				header("location: /ShopMinh/product/import/$url[2]");
			}
			else{
				$number = $product['number']+$_POST['number'];
				$run = $this->model->update_number($number,$url[2]);
				$this->echo_run($run,'msg','Nhập hàng thành công','Nhập hàng thất bại','/ShopMinh/product/index/','/ShopMinh/product/index');
			}
		}else{
			$this->views_backend("components/product/import",[
								"product"=>$product,
								
							]);}
	}
		
	
	
}
?>
