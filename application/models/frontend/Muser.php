<?php 
class Muser extends DB{
	public function insert_user($fullname,$email,$username, $password, $phone, $address,$gender,$role,$thumbnail, $status,$created_at,$created_by,$trash){
		$qr = "INSERT INTO user (fullname,email,username, password, phone, address,gender,role,thumbnail, status,created_at,created_by,trash) VALUES ('$fullname','$email','$username', '$password', $phone, '$address',$gender,$role,'$thumbnail',$status,'$created_at','$created_by',$trash)";
		$run= mysqli_query($this->con,$qr);
		return $qr;
	}
	public function select_user_where_user($username){
		$qr = "select *from user where username='$username'";
		$run = mysqli_query($this->con, $qr);
		$num= mysqli_num_rows($run);
		$row= mysqli_fetch_array($run);
		return $arr = array($row,'num'=>$num);
	}
// index user
		public function select_user($trash,$start,$limit){
			$qr = "SELECT user.*, user_gr.name as'name_gr',user_gr.id as'id_gr' FROM user left join user_gr on user.role=user_gr.id WHERE user_gr.trash=1 and user.trash=$trash order by user.created_at desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$user = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$user[] = $row;
			}
			
			return $user;
	 	}
	 	//
	 	public function select_user_full($trash){
			$qr = "SELECT user.*, user_gr.name as'name_gr',user_gr.id as'id_gr' FROM user left join user_gr on user.role=user_gr.id WHERE user_gr.trash=1 and user.trash=$trash";
			$run = mysqli_query($this->con, $qr);
			$user = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$user[] = $row;
			}
			
			return $user;
	 	}
	 	// index user num
		public function select_user_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM user WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	public function select_user_where_id($id){
			$qr = "select *from user where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	// update user
	 	public function update_user_where_id($id,$status){
			$qr = "UPDATE user SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//update user
	 	public function update_user($fullname, $password, $phone, $address,$gender,$thumbnail, $status,$modified,$modified_by,$id){
			$qr = "UPDATE user SET fullname='".$fullname."',password='".$password."',phone=".$phone.",address='".$address."',gender=".$gender.",thumbnail='".$thumbnail."',status=".$status.",modified='".$modified."',modified_by='".$modified_by."' WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $qr;
	 	}
	 	public function recyclebin_user($trash,$id){
			$qr = "UPDATE user SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function delete($id){
	 		$qr = "DELETE FROM user WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}

}?>

 