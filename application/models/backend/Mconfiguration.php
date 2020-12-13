<?php 
class Mconfiguration extends DB{
// index configuration
		public function select_configuration($status){
			$qr = "SELECT *from configuration where status=".$status;
			$run = mysqli_query($this->con, $qr);
			$row = mysqli_fetch_array($run);
			return $row;
	 	}
	 	//update configuration
	 	public function update_configuration($mail_smtp, $mail_smtp_password, $mail_noreply, $price_ship, $title, $description, $modified,$modified_by,$id){
	 		$qr = "UPDATE configuration SET mail_smtp='$mail_smtp', mail_smtp_password='$mail_smtp_password', mail_noreply='$mail_noreply', price_ship=$price_ship, title='$title', description='$description', modified='$modified', modified_by='$modified_by' where id=".$id;
	 		$run = mysqli_query($this->con, $qr);
	 		return $run;
	 	}

}?>

 