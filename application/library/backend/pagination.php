<?php  
	class pagination {
		public $config=[
			'total_records'=>0,
			'limit'=> 0,
			'fullpage' => true,
			'param'=>'',
			'url'=>''
		];
		public function __construct($config=[]){
			// kiểm tra trong config có total_records có limit đủ điều kiện không
			if(isset($config['limit'])&&$config['limit']<0 || isset($config['total_records'])&&$config['total_records']<0){
				// Nếu không thì dừng chương trình
				die('limit và total không được nhỏ hơn 0');
			}
			if(!isset($config['querystring'])){
				// nếu không thì để mặc định là param
				$config['querystring']='param';
			}
			$this->config = $config;
		}
		// lấy ra tổng số trang
		public function getTotalPage(){
			return ceil($this->config['total_records']/$this->config['limit']);
		}

		// lấy ra trang hiện tại
		public function getCurrentPage(){
			// kiểm tra xem tồn tại querystring và có >=1 không?
			if(empty($this->config['param'])==false && (int)($this->config['param'])>=1){
				// nếu có thì kiểm tra xem có > tổng sô trang không nếu có thì gán bằng tổng số trang
				if($this->config['param']>$this->getTotalPage()){
					return $this->getTotalPage();
				} else{
					return $this->config['param'];
				}

			}else{
				return 1;
			}
		}
		// lấy ra trang phía trước
		public function getPrev(){
			// nếu số trang hiện tại >1 và tổng số trang >1 thì hiển thị  nút quay lại trang trước
			if($this->getCurrentPage()>1 && $this->getTotalPage()>1){
				 return  '<li><a href="'.$this->config['url'].($this->getCurrentPage()-1).'">Trước</a></li>';
			} elseif($this->getTotalPage()>1){
				return '<li class="hidden-xs"><a>Trước</a></li>';
			}
		}
		//lấy ra trang phía sau
		public function getNext(){
			// nếu số trang hiện tại < tổng số trang và tổng số trang >1 thì hiển thị nút next
			if($this->getCurrentPage()<$this->getTotalPage() && $this->getTotalPage()>1){
				return '<li><a href="'.$this->config['url'].($this->getCurrentPage()+1).'">Sau</a></li>';
			}
		}
		// hiển thị về trang đầu
		public function getFirst(){
			if($this->getCurrentPage()>1 && $this->getTotalPage()>1){
				return '<li><a href="'.$this->config['url'].'1">Trang đầu</a></li>';
			} elseif($this->getTotalPage()>1){
				return '<li class="hidden-xs"><a>Trang đầu</a></li>';
			}
		}
		// hiển thị vào trang cuối
		public function getEnd(){
			if($this->getCurrentPage()<$this->getTotalPage() && $this->getTotalPage()>1){
				return '<li><a href="'.$this->config['url'].($this->getTotalPage()).'">Trang cuối</a></li>';
			}
		}
		// hiển thị code html của page
		public function getPagination(){
			// Tạo biến data rỗng
			$data = '';
			if($this->getTotalPage()>1){
				// Kiểm tra người dùng có cần full page không
				 if (isset($this->config['fullpage']) && $this->config['fullpage'] == false) {
		            for ($i = ($this->getCurrentPage() - 2) > 0 ? ($this->getCurrentPage() - 2) : 1; $i <= (($this->getCurrentPage() + 2) > $this->getTotalPage() ? $this->getTotalPage() : ($this->getCurrentPage() + 2)); $i++) {
		                if ($i == $this->getCurrentPage()) {
		                    $data .= '<li class="active" ><a>' . $i . '</a></li>';
		                } else {
		                    $data .= '<li><a href="'.$this->config['url'].$i.'">'.$i.'</a></li>';
		                }
		            }
		        } else {
		            // nếu có thì
		            for ($i = 1; $i <= $this->getTotalPage(); $i++) {
		                if ($i == $this->getCurrentPage()) {
		                    $data .= '<li class="active" ><a >' . $i . '</a></li>';
		                } else {
		                    $data .= '<li><a href="'.$this->config['url'].$i.'">'.$i.'</a></li>';
		                }
		            }
		        }
			} else {$data = '';}
			

        return  $this->getFirst().$this->getPrev() . $data . $this->getNext().$this->getEnd() ;
    }

		
	}
?>