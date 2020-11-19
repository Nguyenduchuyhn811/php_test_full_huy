<?php

function mysql($sql)
	{
	    $mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$sqlweb	  = $sql;
		$result   = mysqli_query($mysql,$sqlweb);
		$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $products;
	}	

function add_customer($post,$priceall,$city,$distric,$commune)
	{
		// echo "<br>";
		// print_r($city);
		// echo $city[0]['name'];
		$khachhang = $post['tenkhachhang'];echo $khachhang;
		$email = $post['email'];
		$sodienthoai = $post['sodienthoai'];
		$diachi = $post['diachi'] . ", " . $commune[0]['name'] . ", " . $distric[0]['name'] . ", " . $city[0]['name'];
		$sp = $post['sp'];
		$price = $priceall;
		$date = date("Y-m-d h:i:s");
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		mysqli_query($mysql,"INSERT INTO customer(tenkhachhang,email,sodienthoai,diachi,sp,price,date)
			VAlUES ('$khachhang','$email','$sodienthoai','$diachi','$sp','$price','$date')");
		header('location: http://localhost:81/occko/webdong/html/thongbao.php?');
	}

function showDistric($post)
	{
		if (!isset($post) || $post == '') {
			$tp = 1;
		}else{
			$tp = $post['data_city'];
		}
		// print_r($tp);
	    $mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$sqlweb	  = "SELECT * FROM devvn_quanhuyen WHERE matp=$tp";
		// echo $sqlweb;
		$result   = mysqli_query($mysql,$sqlweb);
		$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $products;
	}

function loadimg($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$img = basename($post['img_name']);
		return $img;
	}

function add_product()
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$d = '';
			$target_dir = "../../../img/";
			$target_file = $target_dir . basename($_FILES["img"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
			$target_nameimg = basename($_FILES["img"]["name"], "." . $imgType);
			// echo $target_nameimg;
			// echo "<br>";

			$imgFinalName = $target_dir . $target_nameimg . "--time--" .time() . ".".  $imageFileType;
			// echo $imgFinalName;
			// echo "<br>";



			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    if (!empty($_POST['img'])) {
			    	$check = getimagesize($_FILES["img"]["tmp_name"]);
				    var_dump($check);
				    if($check !== false) {
				        // echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        // echo "File is not an image.";
				        $uploadOk = 0;
				    }
			    }
			}
			// Check if file already exists
			// if (file_exists($imgFinalName)) {
			//     echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }

			// Check file size
			if ($_FILES["img"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" && $imageFileType != "jfif") {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["img"]["tmp_name"], $imgFinalName)) {
			        // echo "The file ". basename($imgFinalName). " has been uploaded.";
			        $d = basename($imgFinalName);
			    } else {
			        // echo "Sorry, there was an error uploading your file.";
			    }
			}
			
			$b = $_POST['name']; 
			$c = $_POST['price'];
			
			$e = $_POST['num'];
			$f = $_POST['url']; 
			$g = $_POST['weight']; 
			if (!empty($_POST['list'])) {
				$h = $_POST['list']; 
			}else{
				$h ='';
			}
			// $a7 = $_POST['check_list']; 
			 
			var_dump($_POST);

			// echo "<br>"."	".$b."	".$c."	".$d."	".$e."	".$f."	".$g."	".$h;

			// INSERT INTO
			mysqli_query($mysql,"INSERT INTO products(name,price,pic,num,url,weight,type)
				VAlUES ('$b','$c','$d','$e','$f','$g','$h')");

			if (isset($_POST['move'])) { 
				header("Location: http://localhost:81/occko/webdong/html/quantri/sanpham/danhsach.php");
			}
	}

function updateProduct()
	{
		$d = '';
		$target_dir = "../../../img/";
		$target_file = $target_dir . basename($_FILES["img"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
		$target_nameimg = basename($_FILES["img"]["name"], "." . $imgType);
		// echo $target_nameimg;
		// echo "<br>";

		$imgFinalName = $target_dir . $target_nameimg . "--time--" .time() . ".".  $imageFileType;
		// echo $imgFinalName;
		// echo "<br>";



		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    if (!empty($_POST['img'])) {
		    	$check = getimagesize($_FILES["img"]["tmp_name"]);
			    var_dump($check);
			    if($check !== false) {
			        // echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        // echo "File is not an image.";
			        $uploadOk = 0;
			    }
		    }
		}
		// Check if file already exists
		// if (file_exists($imgFinalName)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["img"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "jfif") {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["img"]["tmp_name"], $imgFinalName)) {
		        // echo "The file ". basename($imgFinalName). " has been uploaded.";
		        $d = basename($imgFinalName);
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		    
		}


		$a = $_GET['id'];
		$b = $_POST['name']; 
		$c = $_POST['price'];
		
		$e = $_POST['num'];
		$f = $_POST['url']; 
		$g = $_POST['weight']; 
		if (!empty($_POST['type'])) {
			$h = $_POST['type']; 
		}else{
			$h ='8';
		} 
		 
		 
		$mysql = mysqli_connect('localhost','root','','v2bnc002420');
		// echo "<br>".$a."	".$b."	".$c."	".$d."	".$e."	".$f."	".$g."	".$h;

		// Update
		mysqli_query($mysql,"UPDATE products 
			SET name ='$b', 
				price ='$c', 
				pic = '$d', 
				num = '$e', 
				url = '$f', 
				weight = '$g', 
				type = '$h' 
			WHERE id = '$a';
			");
	}

function updateStatusProductList($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$id = $post['data_id'];
		$status = $post['data_status'];
		mysqli_query($mysql,"UPDATE products
		SET status = $status
		WHERE id = $id;
		");
	}	

function addCategory()
	{
		$b = $_POST['name']; 
		$c = $_POST['discription'];
		$e = $_POST['parent_id'];

		// $f = $_POST['url']; 
		// $g = $_POST['weight']; 
		$h = $_POST['shortened_name']; 
		if (!empty($_POST['check_list'][0])) {
			$d = $_POST['check_list'][0]; 
		}else{
			$d ='';
		}
		 
		$mysql = mysqli_connect('localhost','root','','v2bnc002420');
		// echo "<br>".$b."	".$c."	".$h."	".$d;

		// INSERT INTO
		mysqli_query($mysql,"INSERT INTO product_type (name,shortened_name,discription,status,parent_id)
			VAlUES ('$b','$h','$c','$d','$e')");

		if (isset($_POST['submit'])) { 
				header("Location: http://localhost:81/occko/webdong/html/quantri/sanpham/quantridanhmucsp.php");
			}
	} 

function updateCategory()
	{
		$a = $_POST['id'];	
		$b = $_POST['name']; 
		$c = $_POST['discription'];
		$e = $_POST['parent_id'];

		// $f = $_POST['url']; 
		// $g = $_POST['weight']; 
		$h = $_POST['shortened_name']; 
		if (!empty($_POST['check_list'][0])) {
			$d = $_POST['check_list'][0]; 
		}else{
			$d ='';
		}
		 
		$mysql = mysqli_connect('localhost','root','','v2bnc002420');
		// echo "<br>".$b."	".$c."	".$h."	".$d;

		mysqli_query($mysql,"UPDATE products 
			SET name ='$b', 
				shortened_name ='$h', 
				discription = '$c', 
				status = '$d', 
				parent_id = '$e', 
			WHERE id = '$a';
			");
	}

function insertDiscount()
	{
		$code = $_POST['code']; 
		$time = $_POST['time'];
		
		$min = $_POST['min'];
		$value = $_POST['value']; 
		$type = $_POST['type']; 
		$status = $_POST['status'];

		// INSERT INTO
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		mysqli_query($mysql,"INSERT INTO discount(code,value,type,min,time,status)
			VAlUES ('$code','$value','$type','$min','$time','$status')");
		
		if (isset($_POST['move'])) { 
				header("Location: http://localhost:81/occko/webdong/html/quantri/sanpham/danhsach.php");
			}
	}

function updateDiscount($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$id = $post['data_id'];
		$status = $post['data_status'];
		$ressult = mysqli_query($mysql,"UPDATE discount 
		SET status = $status
		WHERE id = $id;
		");
	}	

function updateStatusProduct($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$id = $post['data_id'];
		$status = $post['data_status'];
		mysqli_query($mysql,"UPDATE product_type
		SET status = $status
		WHERE id = $id;
		");
	}	

function getCurURL()
	{
	    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
	        $pageURL = "https://";	
	    } else {
	        $pageURL = 'http://';
	    }
	    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
	        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	    } else {
	        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	    }
	    return $pageURL;
	}

function deleteProduct($sql)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$sqlweb	  = $sql;
		mysqli_query($mysql,$sql);
	}

function insertNews()
	{
		$target_dir = "../../../img/";
		$target_file = $target_dir . basename($_FILES["img"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
		$target_nameimg = basename($_FILES["img"]["name"], "." . $imgType);
		// echo $target_nameimg;
		// echo "<br>";

		$imgFinalName = $target_dir . $target_nameimg . "--time--" .time() . ".".  $imageFileType;
		// echo $imgFinalName;
		// echo "<br>";



		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    if (!empty($_POST['img'])) {
		    	$check = getimagesize($_FILES["img"]["tmp_name"]);
			    var_dump($check);
			    if($check !== false) {
			        // echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        // echo "File is not an image.";
			        $uploadOk = 0;
			    }
		    }
		}

		// Check file size
		if ($_FILES["img"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "jfif") {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["img"]["tmp_name"], $imgFinalName)) {
		        // echo "The file ". basename($imgFinalName). " has been uploaded.";
		        $img = basename($imgFinalName);
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}


		$name = $_POST['name']; 
		$name_discription = $_POST['name_discription'];
		$discription = $_POST['discription'];
		$list = $_POST['list']; 
		$status = $_POST['status']; 
		$date = date(" jS \of F Y ");

		// INSERT INTO
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		mysqli_query($mysql,"INSERT INTO news(name,name_discription,discription,date,list,status,img)
			VAlUES ('$name','$name_discription','$discription','$date','$list','$status','$img')");
	}

function updateStatusNews($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$id = $post['data_id'];
		$status = $post['data_status'];
		mysqli_query($mysql,"UPDATE news
		SET status = $status
		WHERE id = $id;
		");
	}	

function addNews_type()
	{
		$b = $_POST['name']; 
		$c = $_POST['discription'];
		$e = $_POST['parent_id'];

		// $f = $_POST['url']; 	
		// $g = $_POST['weight']; 
		// $h = $_POST['shortened_name']; 
		if (!empty($_POST['check_list'][0])) {
			$d = $_POST['check_list'][0]; 
		}else{
			$d ='';
		}
		 
		$mysql = mysqli_connect('localhost','root','','v2bnc002420');
		// echo "<br>".$b."	".$c."	".$h."	".$d;

		// INSERT INTO
		mysqli_query($mysql,"INSERT INTO news_type (name,discription,status,parent_id)
			VAlUES ('$b','$c','$d','$e')");
	} 

function insertAlbum()
	{
		$target_dir = "../../../img/";
		$target_file = $target_dir . basename($_FILES["img"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
		$target_nameimg = basename($_FILES["img"]["name"], "." . $imgType);
		// echo $target_nameimg;
		// echo "<br>";

		$imgFinalName = $target_dir . $target_nameimg . "--time--" .time() . ".".  $imageFileType;
		echo $imgFinalName;

		foreach ($_FILES["img"]["name"] as $key => $value) {
			echo $value;	
		}
		// echo "<br>";
		die();



		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    if (!empty($_POST['img'])) {
		    	$check = getimagesize($_FILES["img"]["tmp_name"]);
			    var_dump($check);
			    if($check !== false) {
			        // echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        // echo "File is not an image.";
			        $uploadOk = 0;
			    }
		    }
		}

		// Check file size
		if ($_FILES["img"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "jfif") {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["img"]["tmp_name"], $imgFinalName)) {
		        // echo "The file ". basename($imgFinalName). " has been uploaded.";
		        $img = basename($imgFinalName);
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}


		$name = $_POST['name']; 
		$discription = $_POST['discription'];
		$category = $_POST['category']; 
		$status = $_POST['status']; 

		// INSERT INTO
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		// mysqli_query($mysql,"INSERT INTO albums(name,discription,category,status,img)
		// 	VAlUES ('$name','$discription','$category','$status','$img')");
		// chú ý mai làm nốt
	} //cần phải sưa rất nhiều

function addAlbums_type()
	{
		$b = $_POST['name']; 
		$c = $_POST['discription'];
		$e = $_POST['parent_id'];

		// $f = $_POST['url']; 	
		// $g = $_POST['weight']; 
		// $h = $_POST['shortened_name']; 
		if (!empty($_POST['check_list'][0])) {
			$d = $_POST['check_list'][0]; 
		}else{
			$d ='';
		}
		 
		$mysql = mysqli_connect('localhost','root','','v2bnc002420');
		// echo "<br>".$b."	".$c."	".$h."	".$d;

		// INSERT INTO
		mysqli_query($mysql,"INSERT INTO albums_type (name,discription,status,parent_id)
			VAlUES ('$b','$c','$d','$e')");
	} 

function insertVideo()
	{
		$img = '';
		$target_dir = "../../../img/";
		$target_file = $target_dir . basename($_FILES["img"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
		$target_nameimg = basename($_FILES["img"]["name"], "." . $imgType);
		// echo $imgType;
		// echo "<br>";

		$imgFinalName = $target_dir . $target_nameimg . "--time--" .time() . ".".  $imageFileType;
		// echo $imgFinalName;
		// echo "<br>";


		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    if (!empty($_POST['img'])) {
		    	$check = getimagesize($_FILES["img"]["name"]);
			    var_dump($check);
			    if($check !== false) {
			        // echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        // echo "File is not an image.";
			        $uploadOk = 0;
			    }
		    }
		}

		// Check file size
		if ($_FILES["img"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "jfif") {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["img"]["tmp_name"], $imgFinalName)) {
		        echo "The file ". basename($imgFinalName). " has been uploaded.";
		        $d = basename($imgFinalName);
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}


		$name = $_POST['name']; 
		$name_discription = $_POST['name_discription'];
		$discription = $_POST['discription'];
		$link = $_POST['link'];
		$category = $_POST['category']; 
		$status = $_POST['status']; 

		// INSERT INTO
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		mysqli_query($mysql,"INSERT INTO video(name,name_discription,discription,link,category,img,status)
			VAlUES ('$name','$name_discription','$discription','$link','$category','$img','$status')");
	}

function updateStatusVideo($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$id = $post['data_id'];
		$status = $post['data_status'];
		mysqli_query($mysql,"UPDATE news
		SET status = $status
		WHERE id = $id;
		");
	}	

function addVideo_type()
	{
		$b = $_POST['name']; 
		$c = $_POST['discription'];
		$e = $_POST['parent_id'];

		// $f = $_POST['url']; 	
		// $g = $_POST['weight']; 
		// $h = $_POST['shortened_name']; 
		if (!empty($_POST['check_list'][0])) {
			$d = $_POST['check_list'][0]; 
		}else{
			$d ='';
		}
		 
		$mysql = mysqli_connect('localhost','root','','v2bnc002420');
		// echo "<br>".$b."	".$c."	".$h."	".$d;

		// INSERT INTO
		mysqli_query($mysql,"INSERT INTO video_type (name,discription,status,parent_id)
			VAlUES ('$b','$c','$d','$e')");
	} 

function insertPanerTop()
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$d = '';
			$target_dir = "../../../img/";
			$target_file = $target_dir . basename($_FILES["img"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$imgType = pathinfo($target_file,PATHINFO_EXTENSION);
			$target_nameimg = basename($_FILES["img"]["name"], "." . $imgType);
			// echo $target_nameimg;
			// echo "<br>";

			$imgFinalName = $target_dir . $target_nameimg . "--time--" .time() . ".".  $imageFileType;
			// echo $imgFinalName;
			// echo "<br>";



			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    if (!empty($_POST['img'])) {
			    	$check = getimagesize($_FILES["img"]["tmp_name"]);
				    var_dump($check);
				    if($check !== false) {
				        // echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        // echo "File is not an image.";
				        $uploadOk = 0;
				    }
			    }
			}
			// Check if file already exists
			// if (file_exists($imgFinalName)) {
			//     echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }

			// Check file size
			// if ($_FILES["img"]["size"] > 500000) {
			//     echo "Sorry, your file is too large.";
			//     $uploadOk = 0;
			// }

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" && $imageFileType != "jfif") {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["img"]["tmp_name"], $imgFinalName)) {
			        // echo "The file ". basename($imgFinalName). " has been uploaded.";
			        $d = basename($imgFinalName);
			    } else {
			        // echo "Sorry, there was an error uploading your file.";
			    }
			}
			
			$b = $_POST['name']; 
			// $c = $_POST['price'];
			
			// $e = $_POST['num'];
			// $f = $_POST['url']; 
			// $g = $_POST['weight']; 
			// if (!empty($_POST['list'])) {
			// 	$h = $_POST['list']; 
			// }else{
			// 	$h ='';
			// }
			$a7 = $_POST['check_list']; 
			 
			var_dump($_POST);

			// echo "<br>"."	".$b."	".$c."	".$d."	".$e."	".$f."	".$g."	".$h;

			// INSERT INTO
			mysqli_query($mysql,"INSERT INTO panertop(name,img,status)
				VAlUES ('$b','$d','$a7')");

			if (isset($_POST['move'])) { 
				header("Location: http://localhost:81/occko/webdong/html/quantri/quangcao/quanliqc.php");
			}
	}

function updateStatusQc($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$id = $post['data_id'];
		$status = $post['data_status'];
		mysqli_query($mysql,"UPDATE panertop
		SET status = $status
		WHERE id = $id;
		");
	}	

function autoComplete($post)
	{
		$mysql    = mysqli_connect('localhost','root','','v2bnc002420');
		$keyword = $post['keyword'];
		$sql = "SELECT id,name FROM products WHERE name Like '%$keyword%'";  
		$result=mysql($sql);
		foreach ($result as $key => $value) {
			echo "<li><a href='http://localhost:81/occko/webdong/html/sanpham/sanphamcon/product_item001.php?id=" . $value['id'] . "'>" . $value['name'] . "</a></li>";
		};
	}	  

?>