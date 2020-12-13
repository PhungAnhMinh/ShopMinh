<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class product extends controller{
	public $model;
	public $model_cate;
	public $model_pr;
	public $extension;
	public $pagination;
	public function __construct(){
		$this->model=$this->models_backend("Mproduct");
		$this->model_cate=$this->models_backend("Mcategory");
		$this->model_pr=$this->models_backend("Mproducer");
		$this->extension = $this->library_backend("extension");
		$this->pagination = $this->library_backend("pagination");
	}

	public function index(){
			$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_product_num(1);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/product/index/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_product(1, $start, $limit);
			$phantrang = $pagination->getPagination();
			$num = $this->model->select_product_num(0);
			
			$this->views_backend("components/product/index",[
								"product"=>$row,
								"phantrang"=>$phantrang,
								"num"=>$num
				   ]);
		}

	// status
		public function status(){
			$url = $this->extension->getUrl($_GET['url'],'/');
			$row = $this->model->select_product_where_id($url[2]);
			$status = 0;
			if($row['status']==$status){
					$status = 1;
			}
			$run = $this->model->update_product_where_id($url[2],$status);
			$this->extension->echo_run($run,'msg','Cập nhật thành công','Cập nhật thất bại','/ShopMinh/product/index','/ShopMinh/product/index');
			
		}
	// Insert
	public function insert(){
		$created_by = $_SESSION['row']['fullname']; 
		$created_at = date('Y-m-d H:i:s');
		if(isset($_POST['submit'])){
			// Xử lí ảnh
			
			if(isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0 && isset($_FILES["img"]) ){
				$this->extension->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["thumbnail"]["tmp_name"],"/ShopMinh/product/insert","../ShopMinh/public/images/products/");
				$this->extension->xu_li_anh_mang($_FILES['img']['name'],$_FILES['img']['tmp_name'],$_FILES['img']['size'],$_FILES['img']['type'],$_FILES['img']['error'],"/ShopMinh/product/insert","../ShopMinh/public/images/products/");
				if(isset($this->extension->thumbnail)&&isset($this->extension->img)){
					$modified = date('Y-m-d H:i:s');
					$alias =$this->extension->str_alias($_POST['name']);
					// xử lí giá bán
					if($_POST['sale']==""){
						$price_sale = $_POST['price'];
						$_POST['sale'] = 0;
					}else{$price_sale = $_POST['price'] - ($_POST['price']*($_POST['sale']/100));}
					// insert in db

					$postName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
					$run = $this->model->insert_product($_POST['category_id'],$postName,$alias,$this->extension->thumbnail,$this->extension->img,$_POST['description'],$_POST['detail'],$_POST['producer_id'],$_POST['number'],$_POST['sale'],$_POST['price'],$price_sale,$created_at,$created_by,$_POST['status'],1);

					$this->extension->echo_run($run,'msg','Thêm sản phẩm thành công','Thêm sản phẩm thất bại','/ShopMinh/product/index','/ShopMinh/product/index');
				}
			}
			else{setcookie('msg','Error: '.$_FILES["thumbnail"]["error"], time()+5) ;
				header("location: /ShopMinh/product/insert");}
		}else{$this->views_backend("components/product/insert",[]);}

	}

	// Thùng rác 
	public function recyclebin(){
		$url = $this->extension->getUrl($_GET['url'],'/');
				// tổng số bản ghi 
			$total_records = $this->model->select_product_num(0);
			$limit =10;

			$param = isset($url[2])?$url[2]:'';
			//Khởi tạo class
			$config = [
			    'total_records' => $total_records, 
			    'limit' => $limit,
			    'fullpage' => false, //bỏ qua nếu không muốn hiển thị full page
			    'param' => $param,
			    'url'=> '/ShopMinh/product/recyclebin/'
			    ];

			$pagination = new $this->pagination($config); 
			// số bản ghi bắt đầu
			$start = ($pagination->getCurrentPage() - 1) * $limit; 
			$row = $this->model->select_product(0, $start, $limit);
			$phantrang = $pagination->getPagination();
			
			$this->views_backend("components/product/recyclebin",[
								"product"=>$row,
								"phantrang"=>$phantrang
				   ]);
		}
	public function restore(){
		$trash = 1;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_product($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Khôi phục sản phẩm thành công','Khôi phục sản phẩm thất bại','/ShopMinh/product/recyclebin','/ShopMinh/product/recyclebin');
	}
	public function delete(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->delete($url[2]);
		$this->extension->echo_run($run,'msg','Xóa sản phẩm thành công','Xóa sản phẩm thất bại','/ShopMinh/product/recyclebin','/ShopMinh/product/recyclebin');
		
	}
	public function trash(){
		$trash = 0;
		$url = $this->extension->getUrl($_GET['url'],'/');
		$run = $this->model->recyclebin_product($trash,$url[2]);
		$this->extension->echo_run($run,'msg','Xóa sản phẩm vào thùng rác thành công','Xóa sản phẩm vào thùng rác thất bại','/ShopMinh/product/index','/ShopMinh/product/index');
	}
	public function update(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$row_where = $this->model->select_product_where_id($url[2]); 
		$imgDB = $this->extension->getUrl($row_where['img'],',');
		$modified = date('Y-m-d H:i:s');
		$modified_by = $_SESSION['row']['fullname'];

		if(isset($_POST['submit'])){
			// Xử lí ảnh
			$alias =$this->extension->str_alias($_POST['name']);
			// xử lí giá bán
			if($_POST['sale']==""){
				$price_sale = $_POST['price'];
				$_POST['sale'] = 0;
			}else{$price_sale = $_POST['price'] - ($_POST['price']*($_POST['sale']/100));}
			$count_error = 0;
			
			for($i=0;$i<count($_FILES['img']['error']);$i++){
				if(in_array(0,$_FILES['img']['error'])){$count_error +=1;}
			}
			if(isset($_FILES["thumbnail"])&& $_FILES["thumbnail"]["error"] == 0){
				// xu li anh dai dien
				$this->extension->xu_li_anh($_FILES["thumbnail"]["name"],$_FILES["thumbnail"]["type"],$_FILES["thumbnail"]["size"],$_FILES["thumbnail"]["tmp_name"],"/ShopMinh/product/update/$url[2]","../ShopMinh/public/images/products/");
				if(isset($this->extension->thumbnail)){$thumbnail =$this->extension->thumbnail;}

			}else{$thumbnail = $row_where['thumbnail'];}

			if(isset($_FILES["img"])&& $count_error==count($_FILES['img']['error'])){
				// xu li anh san pham
				$this->extension->xu_li_anh_mang($_FILES['img']['name'],$_FILES['img']['tmp_name'],$_FILES['img']['size'],$_FILES['img']['type'],$_FILES['img']['error'],"/ShopMinh/product/update/$url[2]","../ShopMinh/public/images/products/");
				if(isset($this->extension->img) ){$img =$this->extension->img;}
			
			}else{$img = $row_where['img'];}
			 

			$run = $this->model->update_product($_POST['category_id'],$_POST['name'],$alias,$thumbnail,$img,$_POST['description'],$_POST['detail'],$_POST['producer_id'],$_POST['sale'],$_POST['price'],$price_sale,$modified,$modified_by,$_POST['status'],$url[2]); 

			$this->extension->echo_run($run,'msg','Cập nhật sản phẩm thành công','Thêm sản phẩm thất bại','/ShopMinh/product/index/'.$url[2],'/ShopMinh/product/update/'.$url[2]);
			
		}else{
			$this->views_backend("components/product/update",[
								"product"=>$row_where,
								"img"=>$imgDB
			]);}
	}
	// Nhap Hang
	public function import(){
		$url = $this->extension->getUrl($_GET['url'],'/');
		$product = $this->model->select_product_where_id($url[2]);
		if(isset($_POST['submit'])){
			if(empty($_POST['number'])){
				setcookie('error', 'Vui lòng nhập số lượng', time()+5);
				header("location: /ShopMinh/product/import/$url[2]");
			}
			else{
				$number = $product['number']+$_POST['number'];
				$run = $this->model->update_number($number,$url[2]);
				$this->extension->echo_run($run,'msg','Nhập hàng thành công','Nhập hàng thất bại','/ShopMinh/product/index/','/ShopMinh/product/index');
			}
		}else{
			$this->views_backend("components/product/import",[
								"product"=>$product,
								
							]);}
	}
		
	
	
}
?>
