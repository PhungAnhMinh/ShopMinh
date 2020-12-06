<?php 
class configuration extends controller{
	public $model;
	public function __construct(){
		$this->model=$this->models_backend("Mcontent");
	}

	public function update(){
		$this->views_backend("components/configuration/update",
						[
						]
					);

	}
	
	
}
?>
