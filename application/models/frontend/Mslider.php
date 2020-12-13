<?php 
	class Mslider extends DB{
		// index slider
		public function select_slider($trash,$start,$limit){
			$qr = "SELECT * FROM slider WHERE trash=$trash order by created_at desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$slider = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$slider[] = $row;
			}
			
			return $slider;
	 	}
	 	// index slider num
		public function select_slider_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM slider WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	public function select_slider_where_id($id){
			$qr = "select *from slider where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	// update slider
	 	public function update_slider_where_id($id,$status){
			$qr = "UPDATE slider SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//update slider
	 	public function update_slider($name, $link, $img, $modified, $modified_by, $status,$id){
			$qr = "UPDATE slider SET name='".$name."',link='".$link."',img='".$img."',modified='".$modified."',modified_by='".$modified_by."',status=".$status." WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//insert slider
	 	public function insert_slider($name, $link, $img, $created_at, $created_by,$trash, $status){
	 		$qr = "INSERT INTO slider(name, link, img, created_at, created_by,trash, status) VALUES('".$name."','".$link."','".$img."','".$created_at."','".$created_by."',".$trash.",".$status.")";
			$run = mysqli_query($this->con, $qr);
			return $qr;
	 	}
	 	public function recyclebin_slider($trash,$id){
			$qr = "UPDATE slider SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM slider WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	}
?>