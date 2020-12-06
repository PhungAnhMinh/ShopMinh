<?php 
	class crud_view extends controller{
		function sayhi(){
			$teo = $this->models_backend("Mcontent");
			$this->views_backend("components/crud_view",[

					]);
		}
		
	}
?>