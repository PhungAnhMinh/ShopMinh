<?php 
class Muser extends DB{
	public function insert_user($passMH,$user_name, $email, $phone, $gender, $address, $birthday){
		$qr = "INSERT INTO `admin`(`password`, `name`, `email`, `phone`, `gender`, `address`, `birthday`) VALUES ('$passMH','$user_name','$email',$phone,'$gender','$address','$birthday')";
		$result = false;
		if(mysqli_query($this->con, $qr)){
			$result= true;
		}
		return $result;
	}
	public function select_user($username){
		$qr = "select *from user where username='$username'";
		$run = mysqli_query($this->con, $qr);
		$num= mysqli_num_rows($run);
		$row= mysqli_fetch_array($run);
		return $arr = array($row,'num'=>$num);
	}
// index useradmin
		public function select_useradmin($trash){
			$qr = "SELECT * FROM user WHERE trash=".$trash;
			$run = mysqli_query($this->con, $qr);
			$useradmin = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$useradmin[] = $row;
			}
			
			return array('useradmin'=>$useradmin,'num'=>$num);
	 	}
	 	public function select_useradmin_where_id($id){
			$qr = "select *from user where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	// update useradmin
	 	public function update_useradmin_where_id($id,$status){
			$qr = "UPDATE user SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//update useradmin
	 	public function update_useradmin($name, $link, $img, $modified, $modified_by, $status,$id){
			$qr = "UPDATE user SET name='".$name."',link='".$link."',img='".$img."',modified='".$modified."',modified_by='".$modified_by."',status=".$status." WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//insert useradmin
	 	public function insert_useradmin($name, $link, $img, $created, $created_by,$trash, $status){
	 		$qr = "INSERT INTO user(name, link, img, created, created_by,trash, status) VALUES('".$name."','".$link."','".$img."','".$created."','".$created_by."',".$trash.",".$status.")";
			$run = mysqli_query($this->con, $qr);
			return $qr;
	 	}
	 	public function recyclebin_useradmin($trash,$id){
			$qr = "UPDATE user SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM user WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	}	
 
 ?>

 