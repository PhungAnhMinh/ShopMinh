<?php 
	class Mcategory extends DB{
		// select category where level 1
	 	public function select_category_level($trash){
			$qr = "select *from category where level=1 and trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$category = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$category[] = $row;
			}
			
			return $category;
	 	}
		// index category
		public function select_category($trash, $start, $limit){
			$qr = "SELECT * FROM category WHERE trash=$trash order by created_at desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$category = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$category[] = $row;
			}
			
			return $category;
	 	}
	 	public function select_category_full($trash){
			$qr = "select *from category where trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$category = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$category[] = $row;
			}
			
			return $category;
	 	}
	 	
	 	// index category num
		public function select_category_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM category WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	public function select_category_status($trash){
			$qr = "SELECT * FROM category WHERE status=1 and trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$category = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$category[] = $row;
			}
			
			return array('category'=>$category,'num'=>$num);
	 	}
	 	public function select_category_where_id($id){
			$qr = "select *from category where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row= $run->fetch_array();
			return $row;
	 	}

	 	// insert category
	 	public function insert_category($name,$link,$level,$parent_id,$orders,$created_at,$created_by,$trash,$status){
	 		$qr = "INSERT INTO category(name,link,level,parent_id,orders,created_at,created_by,trash,status) VALUES ('".$name."','".$link."',".$level.",".$parent_id.",".$orders.",'".$created_at."','".$created_by."',".$trash.",".$status.")";
	 		$run = mysqli_query($this->con, $qr);
	 		return $run;
	 	}

	 	// update content
	 	public function update_category_where_id($id,$status){
			$qr = "UPDATE category SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}

	 	//update content
	 	public function update_category($name,$parent_id,$orders,$status,$updated_at,$updated_by,$link,$id){
			$qr = "UPDATE category SET name='".$name."',parent_id=".$parent_id.",orders=".$orders.",status=".$status.",updated_at='".$updated_at."',updated_by='".$updated_by."',link='".$link."' WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $qr;
	 	}

	 	// nem trash vao thung rac
	 	public function recyclebin_category($trash,$id){
			$qr = "UPDATE category SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//delte category
	 	public function delete($id){
	 		$qr = "DELETE FROM category WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	 	public function select_sl_sp($id){
	 		$qr = "SELECT c.*, p.category_id FROM category c LEFT JOIN product p ON c.id = p.category_id WHERE p.category_id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		$num = mysqli_num_rows($run);
	 		return $num;
	 	}
	 }
 ?>