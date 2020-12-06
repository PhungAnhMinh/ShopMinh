<?php  
	class Mcoupon extends DB{
		// index coupon
		public function select_coupon($trash){
			$qr = "SELECT * FROM coupon WHERE trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$coupon = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$coupon[] = $row;
			}
			
			return array('coupon'=>$coupon,'num'=>$num);
	 	}
	 	// index coupon
		public function select_coupon_status($trash){
			$qr = "SELECT * FROM coupon WHERE status =1 and trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$coupon = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$coupon[] = $row;
			}
			
			return array('coupon'=>$coupon,'num'=>$num);
	 	}
	 	public function select_coupon_where_id($id){
			$qr = "select *from coupon where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	// update coupon
	 	public function update_coupon_where_id($id,$status){
			$qr = "UPDATE coupon SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//update coupon
	 	public function update_coupon($code, $discount, $limit_number, $expiration_date, $payment_limit, $description, $status,$id){
			$qr = "UPDATE coupon SET code='".$code."',discount=".$discount.",limit_number=".$limit_number.",expiration_date='".$expiration_date."',payment_limit=".$payment_limit.",description='".$description."',status=".$status." WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//insert coupon
	 	public function insert_coupon($code, $discount, $limit_number, $expiration_date, $payment_limit, $description, $created,  $trash, $status){
	 		$qr = "INSERT INTO coupon(code, discount, limit_number, expiration_date, payment_limit, description, created, trash, status) VALUES ('".$code."',".$discount.",".$limit_number.",'".$expiration_date."',".$payment_limit.",'".$description."','".$created."',".$trash.",".$status.")";
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function recyclebin_coupon($trash,$id){
			$qr = "UPDATE coupon SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM coupon WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	
	}
?>