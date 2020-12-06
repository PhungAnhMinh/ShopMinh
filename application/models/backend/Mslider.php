<?php 
	class Mslider extends DB{
		// index slider
		public function select_slider($trash){
			$qr = "SELECT * FROM slider WHERE trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$slider = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$slider[] = $row;
			}
			
			return array('slider'=>$slider,'num'=>$num);
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
	 	public function insert_slider($name, $link, $img, $created, $created_by,$trash, $status){
	 		$qr = "INSERT INTO slider(name, link, img, created, created_by,trash, status) VALUES('".$name."','".$link."','".$img."','".$created."','".$created_by."',".$trash.",".$status.")";
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