<?php  
	class Mcontact extends DB{
		// index contact
		public function select_contact($trash){
			$qr = "SELECT * FROM contact WHERE trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$contact = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$contact[] = $row;
			}
			return array('contact'=>$contact,'num'=>$num);
	 	}
	 	// update contact
	 	public function update_contact_where_id($id,$status){
			$qr = "UPDATE contact SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function select_contact_where_id($id){
			$qr = "select *from contact where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	public function recyclebin_contact($trash,$id){
			$qr = "UPDATE contact SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM contact WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	
	}
?>