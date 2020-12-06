<?php 
class author_model extends DB{
	public function insert_author($passMH,$user_name, $email, $phone, $gender, $address, $birthday){
		$qr = "INSERT INTO `admin`(`password`, `name`, `email`, `phone`, `gender`, `address`, `birthday`) VALUES ('$passMH','$user_name','$email',$phone,'$gender','$address','$birthday')";
		$result = false;
		if(mysqli_query($this->con, $qr)){
			$result= true;
		}
		return $result;
	}
	public function select_author($email){
		$qr = "select *from admin where email='$email'";
		$run = mysqli_query($this->con, $qr);
		$num= mysqli_num_rows($run);
		return $num;
	}
	
 }
 ?>

 