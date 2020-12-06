<?php 
	class DB{
		public $con;
		protected $server_name = "localhost";
		protected $user_name = "root";
		protected $password = "";
		protected $db_name = "shopminh";

		function __construct(){
			$this->con = mysqli_connect($this->server_name, $this->user_name, $this->password);
			mysqli_select_db($this->con, $this->db_name);
			mysqli_query($this->con, "SET_NAMES 'utf8'");
		}

	}
?>