<?php  
	class Morders extends DB{
		// index orders
		public function select_orders($trash,$start, $limit){
			$qr = "SELECT * FROM orders WHERE trash=$trash order by orderDate desc limit $start,$limit ";
			$run = mysqli_query($this->con, $qr);
			$orders = array();
			$num= mysqli_num_rows($run);
			while ($row= $run->fetch_array()) {
				$orders[] = $row;
			}
			return $orders;
	 	}

	 	// lien ket 3 bang
	 	public function select_order_product_orderDetail($trash,$id){
			$qr = "SELECT o.*, ol.count,ol.price,p.name FROM (orders o left join order_detail ol on o.id=ol.order_id) left join product p on ol.product_id=p.id WHERE p.trash=1 and o.trash=$trash and o.id=$id";
			$run = mysqli_query($this->con, $qr);
			$order = array();
			while ($row=$run->fetch_array()) {
				$order[] = $row;
			}
			
			return $order;
	 	}
	 	// index orders num
		public function select_orders_num($trash){
			$run = mysqli_query($this->con, "SELECT * FROM orders WHERE trash=$trash");
			$num = mysqli_num_rows($run);
			return $num;
	 	}
	 	// update orders
	 	public function update_orders_where_id($id,$status){
			$qr = "UPDATE orders SET status=$status WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	 	public function select_orders_where_id($id){
			$qr = "select *from orders where id=".$id;
			$run = mysqli_query($this->con, $qr);
			$row = $run->fetch_array();
			return $row;
	 	}
	 	public function recyclebin_orders($trash,$id){
			$qr = "UPDATE orders SET trash=$trash WHERE id=".$id;
			$run = mysqli_query($this->con, $qr);
			return $run;
	 	}
	
	}
?>