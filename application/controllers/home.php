<?php 
	class home extends controller{
		function sayhi(){
			$teo = $this->models_frontend("author_model");
			$this->views_frontend("components/trangchu/index",[

					]);
		}
		
	}
?>