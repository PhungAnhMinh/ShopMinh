<?php 
	class about extends controller{
		function about(){
			$teo = $this->models_frontend("author_model");
			$this->views_frontend("about",[

					]);
		}
	}
?>