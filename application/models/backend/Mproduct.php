<?php 
	class Mproduct extends DB{
		// index product
		public function select_product($trash,$start,$limit){
			$qr = "SELECT pt.*, c.name as 'name_category',pr.name as'name_producer' FROM ((product pt LEFT JOIN category c ON pt.category_id=c.id) LEFT JOIN producer pr ON pt.producer_id=pr.id) WHERE  c.status =1 and pt.trash=$trash order by pt.created_at desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$product = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$product[] = $row;
			}
			return $product;
	 	}
	 	// index product num
		public function select_product_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM product WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	//insert product
	 	public function insert_product($category_id, $name, $alias, $thumbnail, $img, $description, $detail, $producer_id, $number, $sale, $price, $price_sale, $created_at, $created_by, $status, $trash){
	 		$qr = "INSERT INTO product (category_id, name, alias, thumbnail, img, description, detail, producer_id, number, sale, price, price_sale, created_at, created_by, status, trash) VALUES (".$category_id.",'".$name."','".$alias."','".$thumbnail."','".$img."','".$description."','".$detail."',".$producer_id.",".$number.",".$sale.",".$price.",".$price_sale.",'".$created_at."','".$created_by."',".$status.",1)";
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 		public function select_product_where_id($id){
			$qr = "select *from product where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	//update number product
	 	public function update_number($number,$id){
	 		$qr = "UPDATE  product SET number =$number where id=".$id;
	 		$run = mysqli_query($this->con, $qr);
	 		return $run;
	 	}

	 	// update producer
	 	public function update_product_where_id($id,$status){
			$qr = "UPDATE product SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//update producer
	 	public function update_product($category_id, $name, $alias, $thumbnail, $img, $description, $detail, $producer_id, $sale, $price, $price_sale, $modified, $modified_by, $status,$id){
			$qr = "UPDATE product SET category_id=".$category_id.",name='".$name."',alias='".$alias."',thumbnail='".$thumbnail."',img='".$img."',description='".$description."',detail='".$detail."',producer_id=".$producer_id.",sale=".$sale.",price=".$price.",price_sale=".$price_sale.",modified='".$modified."',modified_by='".$modified_by."',status=".$status." WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	// nem vao thung rac
	 	public function recyclebin_product($trash,$id){
			$qr = "UPDATE product SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	//xoa ban ghi
	 	public function delete($id){
	 		$qr = "DELETE FROM product WHERE id=".$id;
	 		$run = mysqli_query($this->con,$qr);
	 		return $run;
	 	}
	}
?>