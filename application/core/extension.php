<?php 
	class extension {
		public $thumbnail;
		public $img = array();
		public function __construct() {
			
  		}
  		// echo nếu rỗng
  		public function error_empty($bien,$name_cookie,$value_cookie,$header){
  			if(empty($bien)){
  				setcookie($name_cookie, $value_cookie1, time()+5);
				header("location: ".$header1);
  			}
  			
  		}
  		public function getUrl($get_url,$kitu){
	  		//loại bỏ khoảng trắng bằng hàm trim và làm sạch bằng hàm filter_var
			$url = filter_var(trim($get_url, '/'));
			//tách chuỗi và nhét vào mảng
			return $arr = explode($kitu, $url);
  		}
  		public function echo_run($run,$name_cookie,$value_cookie1,$value_cookie2,$header1,$header2){
  			if($run){
				setcookie($name_cookie, $value_cookie1, time()+5);
				header("location: ".$header1);
			}else{
				setcookie($name_cookie, $value_cookie2, time()+5);
				header("location: ".$header2);
			}
  		}
// 		//Xử lí file ảnh
// 		
			public function xu_li_anh_mang($filename,$filetmpname,$filesize,$filetype,$fileerror, $url_controller , $url_anh){
				$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
				$thumbnail = array();
				foreach($filename as $key=>$val){
			        $image_name = $filename[$key];
			        $tmp_name   = $filetmpname[$key];
			        $size       = $filesize[$key];
			        $type       = $filetype[$key];
			        $error      = $fileerror[$key]; 
			        // Check whether file type is valid
			        $ext = pathinfo($filename[$key],PATHINFO_EXTENSION);
			        if(!array_key_exists($ext, $allowed)){
			        	setcookie('msg','Error: Vui lòng chọn đúng định dạng file.', time() +5) ; 
		        		header("location:".$url_controller);
			        }else{
			        	 // Xác nhận kích thước file - tối đa 5MB
				        $maxsize = 5 * 1024 * 1024;
				        if($filesize[$key] > $maxsize)
				        setcookie('msg','Error: Kích thước File quá lớn.', time()+5) ;
				        // Xác định loại file
				        //kiểm tra xem giá trị có tồn tại trong mảng không
			       		if(in_array($filetype[$key], $allowed)){    
			            // Store images on the server
			            	if(move_uploaded_file($filetmpname[$key],$url_anh.$filename[$key])){
			                	$thumbnail[] = basename($filename[$key]);
			            	}
			        	}else{
				        	setcookie('msg','Error: Có vấn đề xảy ra trong quá trình Upload. vui lòng thử lại.', time()+5) ;
				        	header("location: ".$url_controller);
				        }
		        	}
				}$this->img = implode(',',$thumbnail);
			}
			public function xu_li_anh($filename,$filetype,$filesize,$filetmpname, $url_controller,$url_anh){
				$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
			    // Xác nhận phần mở rộng của file (đuôi file vd: jpg)
			        $ext = pathinfo($filename, PATHINFO_EXTENSION);
			        // kiểm tra key có trong mảng allowed không
			        if(!array_key_exists($ext, $allowed)){
			        	setcookie('msg','Error: Vui lòng chọn đúng định dạng file.', time() +5) ; 
		        		header("location:".$url_controller);
			        }else{
				        // Xác nhận kích thước file - tối đa 5MB
				        $maxsize = 5 * 1024 * 1024;
				        if($filesize > $maxsize)
				        setcookie('msg','Error: Kích thước File quá lớn.', time()+5) ;
				        // Xác định loại file
				        //kiểm tra xem giá trị có tồn tại trong mảng không
				        if(in_array($filetype, $allowed)){
				        	if(move_uploaded_file($filetmpname,$url_anh.$filename)){
				        		$this->thumbnail = basename($filename);
				        		
			        	}
				        }else{
				        	setcookie('msg','Error: Có vấn đề xảy ra trong quá trình Upload. vui lòng thử lại.', time()+5) ;
				        	header("location: ".$url_controller);
				        }
			   		 }
					}
			        
	/////////////////////////////////////////////////////////// filter user inputs
// set đọ dài chuỗi
	public function strlenString($string,$strlen,$msg,$name_input){
		if(strlen($string)<$strlen){
			return setcookie($msg, $name_input." dài tối thiểu ".$strlen." kí tự !", time()+5);
		}else{return false;}
	}
// check number
	public function filterNumber($post_Number,$number_input,$msg){
			if(empty($post_Number)){
		        return setcookie($msg, $number_input.' không được để trống !', time()+5);
		    }else{return $post_Number;}
		}
	// làm sạch namepost
	public function filterName($post_name,$name_input,$msg){
			if(empty($post_name)){
		        return setcookie($msg, $name_input.' không được để trống !', time()+5);
		    }else{
		        // Làm sạch tên người dùng
			    $field = filter_var(trim($post_name),' ');
			    // Xác thực tên người dùng
			    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
			       return $name = $field; 
			    }else{
			        $name = FALSE;
			    }
		        if($name == FALSE){
		           return setcookie($msg, $name_input.' không hợp lệ !', time()+5);
		        }
		    
		}
	}
	// làm sạch email
	public function filterEmail($post_email,$email_input,$msg){
			if(empty($post_email)){
		        return setcookie($msg, $email_input.' không được để trống !', time()+5);
		    }else{
		        // Làm sạch tên người dùng
			    $field = filter_var(trim($post_email), FILTER_SANITIZE_EMAIL);
			    // Xác thực tên người dùng
			    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
			        $email = $field;
			    }else{
			        $email = FALSE;
			    }
		        if($email == FALSE){
		           return setcookie($msg, $email_input.' không hợp lệ !', time()+5);
		        }
		    
		}
	}

	// làm sạch string
	public function filterString($post_String,$String_input,$msg){
			if(empty($post_String)){
		        return setcookie($msg, $String_input.' không được để trống !', time()+5);
		    }else{
		        // Làm sạch tên người dùng
			    $field = filter_var(trim($post_String), FILTER_SANITIZE_STRING);
			    // Xác thực tên người dùng
			    if(empty($field)){
			      return  $string = $field;
			    }else{
			        $string = FALSE;
			    }
		        if($string == FALSE){
		            return setcookie($msg, $String_input.' không hợp lệ !', time()+5);
		        }
		    
		}
	}
	
	
	////////////////////////////////////////////////////
					
public function str_alias($alias)
    {
        $alias = html_entity_decode( $alias );
        //thay thế chữ thuong
        $alias = preg_replace( "/(å|ä|ā|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|ä|ą)/", 'a', $alias );
        $alias = preg_replace( "/(ß|ḃ)/", "b", $alias );
        $alias = preg_replace( "/(ç|ć|č|ĉ|ċ|¢|©)/", 'c', $alias );
        $alias = preg_replace( "/(đ|ď|ḋ|đ)/", 'd', $alias );
        $alias = preg_replace( "/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ę|ë|ě|ė)/", 'e', $alias );
        $alias = preg_replace( "/(ḟ|ƒ)/", "f", $alias );
        $alias = str_replace( "ķ", "k", $alias );
        $alias = preg_replace( "/(ħ|ĥ)/", "h", $alias );
        $alias = preg_replace( "/(ì|í|î|ị|ỉ|ĩ|ï|î|ī|¡|į)/", 'i', $alias );
        $alias = str_replace( "ĵ", "j", $alias );
        $alias = str_replace( "ṁ", "m", $alias );

        $alias = preg_replace( "/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ö|ø|ō)/", 'o', $alias );
        $alias = str_replace( "ṗ", "p", $alias );
        $alias = preg_replace( "/(ġ|ģ|ğ|ĝ)/", "g", $alias );
        $alias = preg_replace( "/(ü|ù|ú|ū|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ü|ų|ů)/", 'u', $alias );
        $alias = preg_replace( "/(ỳ|ý|ỵ|ỷ|ỹ|ÿ)/", 'y', $alias );
        $alias = preg_replace( "/(ń|ñ|ň|ņ)/", 'n', $alias );
        $alias = preg_replace( "/(ŝ|š|ś|ṡ|ș|ş|³)/", 's', $alias );
        $alias = preg_replace( "/(ř|ŗ|ŕ)/", "r", $alias );
        $alias = preg_replace( "/(ṫ|ť|ț|ŧ|ţ)/", 't', $alias );

        $alias = preg_replace( "/(ź|ż|ž)/", 'z', $alias );
        $alias = preg_replace( "/(ł|ĺ|ļ|ľ)/", "l", $alias );

        $alias = preg_replace( "/(ẃ|ẅ)/", "w", $alias );

        $alias = str_replace( "æ", "ae", $alias );
        $alias = str_replace( "þ", "th", $alias );
        $alias = str_replace( "ð", "dh", $alias );
        $alias = str_replace( "£", "pound", $alias );
        $alias = str_replace( "¥", "yen", $alias );

        $alias = str_replace( "ª", "2", $alias );
        $alias = str_replace( "º", "0", $alias );
        $alias = str_replace( "¿", "?", $alias );

        $alias = str_replace( "µ", "mu", $alias );
        $alias = str_replace( "®", "r", $alias );

        //thay thế chữ hoa
        $alias = preg_replace( "/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Ą|Å|Ā)/", 'A', $alias );
        $alias = preg_replace( "/(Ḃ|B)/", 'B', $alias );
        $alias = preg_replace( "/(Ç|Ć|Ċ|Ĉ|Č)/", 'C', $alias );
        $alias = preg_replace( "/(Đ|Ď|Ḋ)/", 'D', $alias );
        $alias = preg_replace( "/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ę|Ë|Ě|Ė|Ē)/", 'E', $alias );
        $alias = preg_replace( "/(Ḟ|Ƒ)/", "F", $alias );
        $alias = preg_replace( "/(Ì|Í|Ị|Ỉ|Ĩ|Ï|Į)/", 'I', $alias );
        $alias = preg_replace( "/(Ĵ|J)/", "J", $alias );

        $alias = preg_replace( "/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ø)/", 'O', $alias );
        $alias = preg_replace( "/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ū|Ų|Ů)/", 'U', $alias );
        $alias = preg_replace( "/(Ỳ|Ý|Ỵ|Ỷ|Ỹ|Ÿ)/", 'Y', $alias );
        $alias = str_replace( "Ł", "L", $alias );
        $alias = str_replace( "Þ", "Th", $alias );
        $alias = str_replace( "Ṁ", "M", $alias );

        $alias = preg_replace( "/(Ń|Ñ|Ň|Ņ)/", "N", $alias );
        $alias = preg_replace( "/(Ś|Š|Ŝ|Ṡ|Ș|Ş)/", "S", $alias );
        $alias = str_replace( "Æ", "AE", $alias );
        $alias = preg_replace( "/(Ź|Ż|Ž)/", 'Z', $alias );

        $alias = preg_replace( "/(Ř|R|Ŗ)/", 'R', $alias );
        $alias = preg_replace( "/(Ț|Ţ|T|Ť)/", 'T', $alias );
        $alias = preg_replace( "/(Ķ|K)/", 'K', $alias );
        $alias = preg_replace( "/(Ĺ|Ł|Ļ|Ľ)/", 'L', $alias );

        $alias = preg_replace( "/(Ħ|Ĥ)/", 'H', $alias );
        $alias = preg_replace( "/(Ṗ|P)/", 'P', $alias );
        $alias = preg_replace( "/(Ẁ|Ŵ|Ẃ|Ẅ)/", 'W', $alias );
        $alias = preg_replace( "/(Ģ|G|Ğ|Ĝ|Ġ)/", 'G', $alias );
        $alias = preg_replace( "/(Ŧ|Ṫ)/", 'T', $alias );

        if ( empty( $alias ) ) return $alias;
        if ( is_array( $alias ) )
        {
            foreach ( array_keys( $alias ) as $key )
            {
                $alias[$key] = nv_unhtmlspecialchars( $alias[$key] );
            }
        }
        else
        {
            $search = array(
                '&amp;', '&#039;', '&quot;', '&lt;', '&gt;', '&#x005C;', '&#x002F;', '&#40;', '&#41;', '&#42;', '&#91;', '&#93;', '&#33;', '&#x3D;', '&#x23;', '&#x25;', '&#x5E;', '&#x3A;', '&#x7B;', '&#x7D;', '&#x60;', '&#x7E;'
            );
            $replace = array(
                '&', '\'', '"', '<', '>', '\\', '/', '(', ')', '*', '[', ']', '!', '=', '#', '%', '^', ':', '{', '}', '`', '~'
            );
            $alias = str_replace( $search, $replace, $alias );
        }

        //thêm trường hợp các kí tự đặc biệt
        $alias = preg_replace( "/(!|\"|#|$|%|'|̣)/", '', $alias );
        $alias = preg_replace( "/(̀|́|̉|$|>)/", '', $alias );
        $alias = preg_replace( "'<[\/\!]*?[^<>]*?>'si", "", $alias );

        $alias = str_replace( "----", " ", $alias );
        $alias = str_replace( "---", " ", $alias );
        $alias = str_replace( "--", " ", $alias );

        $alias = preg_replace( '/(\W+)/i', '-', $alias );
        $alias = str_replace( array(
            '-8220-', '-8221-', '-7776-'
        ), '-', $alias );
        //$alias = preg_replace( '/[^a-zA-Z0-9\-]+/e', '', $alias );
        $alias = str_replace( array(
            'dAg', 'DAg', 'uA', 'iA', 'yA', 'dA', '--', '-8230'
        ), array(
            'dong', 'Dong', 'uon', 'ien', 'yen', 'don', '-', ''
        ), $alias );
        $alias = preg_replace( '/(\-)$/', '', $alias );
        $alias = preg_replace( '/^(\-)/', '', $alias );
        return strtolower($alias);
    }


}?>