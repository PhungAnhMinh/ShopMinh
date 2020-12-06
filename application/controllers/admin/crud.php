<?php 
class crud extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Mcontent");
	}

	public function crud_view(){
		$this->views_backend("components/crud/crud_view",
						[
						]
					);

	}
	

	
	
}
?>
