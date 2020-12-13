<?php 
	class Mcontent extends DB{
		// index content
		public function select_content($trash,$start,$limit){
			$qr = "SELECT * FROM content WHERE trash=$trash order by created_at desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$content = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$content[] = $row;
			}
			
			return $content;
	 	}
	 	// index content num
		public function select_content_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM content WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	public function select_content_where_id($id){
			$qr = "select *from content where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	// update content
	 	public function update_content_where_id($id,$status){
			$qr = "UPDATE content SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//update content
	 	public function update_content($title,$description,$fullcontent,$thumbnail,$modifiled,$trash,$status,$modified_by,$id,$alias){
			$qr = "UPDATE content SET title='".$title."',description='".$description."',fullcontent='".addslashes($fullcontent)."',thumbnail='".$thumbnail."',modified='".$modifiled."',trash=".$trash.",status=".$status.",modified_by='".$modified_by."',alias='".$alias."' WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//insert content
	 	public function insert_content($title,$description,$fullcontent,$thumbnail,$created_at,$trash,$status,$created_by,$alias){
	 		$qr = "INSERT INTO content(title,description,fullcontent,thumbnail,created_at,trash,status,created_by,alias) VALUES('".$title."','".$description."','".addslashes($fullcontent)."','".$thumbnail."','".$created_at."',".$trash.",".$status.",'".$created_by."','".$alias."')";
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function recyclebin_content($trash,$id){
			$qr = "UPDATE content SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM content WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	}
?>