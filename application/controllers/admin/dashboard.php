<?php 
session_start();
	class dashboard extends controller{
		function sayhi(){
			$teo = $this->models_backend("Mcontent");
			$this->views_backend("components/dashboard/index",[

					]);
		}
		
	}
?>