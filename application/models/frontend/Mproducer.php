<?php  
	class Mproducer extends DB{
		// index producer
		public function select_producer($trash,$start,$limit){
			$qr = "SELECT * FROM producer WHERE trash=$trash order by created_at desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$producer = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$producer[] = $row;
			}
			
			return $producer;
	 	}
	 	// index producer num
		public function select_producer_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM producer WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	// index producer
		public function select_producer_status($trash){
			$qr = "SELECT * FROM producer WHERE status =1 and trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$producer = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$producer[] = $row;
			}
			
			return array('producer'=>$producer,'num'=>$num);
	 	}
	 	public function select_producer_where_id($id){
			$qr = "select *from producer where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	// update producer
	 	public function update_producer_where_id($id,$status){
			$qr = "UPDATE producer SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//update producer
	 	public function update_producer($name,$keyword,$created_at,$created_by,$trash,$status,$id){
			$qr = "UPDATE producer SET name='".$name."',keyword='".$keyword."',created_at='".$created_at."',created_by='".$created_by."',trash=".$trash.",status=".$status." WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//insert producer
	 	public function insert_producer($name,$code,$keyword,$created_at,$created_by,$trash,$status){
	 		$qr = "INSERT INTO producer(name,code,keyword,created_at,created_by,trash,status) VALUES('".$name."','".$code."','".$keyword."','".$created_at."','".$created_by."',".$trash.",".$status.")";
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function recyclebin_producer($trash,$id){
			$qr = "UPDATE producer SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM producer WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	
	}
?>