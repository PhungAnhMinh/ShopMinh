<?php 
class login_model extends DB{
	
	public function select_author($email){
		$qr = "select *from admin where email='$email'";

		$run = mysqli_query($this->con, $qr);
		$num= mysqli_num_rows($run);
		$row= mysqli_fetch_array($run);
		
		
		
		return $arr = array($row,'num'=>$num);
		
	}
	
 }
 ?>