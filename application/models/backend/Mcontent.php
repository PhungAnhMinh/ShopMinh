<?php 
	class Mcontent extends DB{
		// index content
		public function select_content($trash){
			$qr = "SELECT * FROM content WHERE trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$content = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$content[] = $row;
			}
			
			return array('content'=>$content,'num'=>$num);
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
	 	public function insert_content($title,$description,$fullcontent,$thumbnail,$modified,$trash,$status,$created_by,$alias){
	 		$qr = "INSERT INTO content(title,description,fullcontent,thumbnail,modified,trash,status,created_by,alias) VALUES('".$title."','".$description."','".addslashes($fullcontent)."','".$thumbnail."','".$modified."',".$trash.",".$status.",'".$created_by."','".$alias."')";
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