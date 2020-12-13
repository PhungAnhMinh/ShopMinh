<?php  
	class Mcustomer extends DB{
		// index customer
		public function select_customer($trash,$start,$limit){
			$qr = "SELECT * FROM customer WHERE trash=$trash order by created_at desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$customer = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$customer[] = $row;
			}
			return $customer;
	 	}
	 	// index customer num
		public function select_customer_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM customer WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	// update customer
	 	public function update_customer_where_id($id,$status){
			$qr = "UPDATE customer SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function select_customer_where_id($id){
			$qr = "select *from customer where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	public function recyclebin_customer($trash,$id){
			$qr = "UPDATE customer SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM customer WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	
	}
?>