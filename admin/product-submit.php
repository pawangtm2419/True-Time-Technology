<?php
include("../config/connection.php");
$added_date = date("Y-m-d H:i:s");
	$modified_date = date("Y-m-d H:i:s");
	$retyp = $_POST['retyp'];
	if($_POST['category']==other)
	{
	$category = str_replace(' ', '_', $_POST['retyp']);
	}
	else
	{
	$category = str_replace(' ', '_', $_POST['category']);
	}
	$retype = $_POST['retype'];
	if($_POST['sub_category']==Others)
	{
	$sub_category = $_POST['retype'];
	$title_url = str_replace(' ', '_', $sub_category); 
	}
	else
	{
	$sub_category = $_POST['sub_category'];
	$title_url = str_replace(' ', '_', $sub_category); 
	}
	$product_name = $_POST["product_name"];
	//price
	$reg_price = $_POST["reg_price"]; 
	$sale_price = $_POST["sale_price"]; 
	$reg_cadprice = $reg_price*1.09; 
	$reg_europrice = $reg_price*0.73; 
	$sale_cadprice = $sale_price*1.09; 
	$sale_europrice = $sale_price*0.73; //$sale_europriceeuro = $sale_europrice.EURO;
	//end price
	$overview = $_POST["overview"];
	$specification = $_POST["specification"];
	$wwsdollar = $_POST["wwsdollar"];
	$pricematch = $_POST["pricematch"];
	$shippingfree = $_POST["shippingfree"];
	//waranty
	$sixmonth = $_POST["sixmonth"];
	$sixmonthcad = $sixmonth*1.09;
	$sixmontheuro = $sixmonth*0.73;
	$oneyear = $_POST["oneyear"];
	$oneyearcad = $oneyear*1.09;
	$oneyeareuro = $oneyear*0.73;
	$twoyear = $_POST["twoyear"];
	$twoyearcad = $twoyear*1.09;
	$twoyeareuro = $twoyear*0.73;
	//end waranty
	
    $product_image=$_FILES['product_image']['name'];
	$product_image= str_replace(' ', '_', $product_image);
    $string = str_replace(' ', '_', $category); 
	$string1 = str_replace(' ', '_', $sub_category); 
    @mkdir("../images/products/$string/");
	@mkdir("../images/products/$string/$string1/");
    $photopath = "../images/products/$string/$string1/";
    $target_path = $photopath;	
    $target_path = $target_path.$product_image;
	$hide1 = $_POST['hide1'];
	
if(isset($_POST["update"])){
if($hide1=="")
{
include( 'function.php');
// settings
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// thumbnail sizes
$sizes = array(70 => 70, 250 => 250, 600 => 600);

		$ext = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
		if (in_array($ext, $valid_exts)) {
			/* resize image */
			foreach ($sizes as $w => $h) {
				$files[] = resize($w, $h);
			}

		}
//move_uploaded_file($_FILES['product_image']['tmp_name'], $target_path);
		$insertproduct="insert into product(category, sub_category, title_url, product_name, product_image, image_path, reg_price, sale_price, overview, specification, added_date, modified_date)values('$category', '$sub_category', '$title_url', '$product_name', '$product_image', '$target_path', '$reg_price', '$sale_price', '$overview', '$specification', '$added_date', '$modified_date')";
		mysql_query($insertproduct);
    $selectid="select * from product order by id desc";
    $selectid1=mysql_query($selectid);
    $selectid2=mysql_fetch_array($selectid1);
	$uid = $selectid2['id'];
	$mm = $selectid2['category'];
    $mmn = str_replace(' ', '_', $selectid2['sub_category']);
	@mkdir("../images/products/$mm/");
	@mkdir("../images/products/$mm/$mmn");
	$photopathh = "../images/products/$mm/$mmn/";
	$item_files = $_FILES["item_file"]['name'];
	$item_files = str_replace(' ', '_', $item_files); 
	if(count($item_files)>0) { //check if any file uploaded
		for($j=0; $j < count($item_files); $j++) { //loop the uploaded file array
			$filen = $item_files["$j"]; //file name
			$path = $photopathh.$filen; //generate the destination path
			move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path);
			if($filen!="")
			{
			mysql_query("INSERT INTO multiimage (uid,imagepath) VALUES ('$uid','$path')");
			}
		}
	}
	
	 
	header("Location:product-mgmt.php");
}
else
{
    $selectid="select * from product where id = '$hide1'";
    $selectid1=mysql_query($selectid);
    $selectid2=mysql_fetch_array($selectid1);
	$uid = $selectid2['id'];
	$mm = $selectid2['category'];
	$mmn = str_replace(' ', '_', $selectid2['sub_category']);
	@mkdir("../images/products/$mm/");
	@mkdir("../images/products/$mm/$mmn");
	$photopathh = "../images/products/$mm/$mmn/";
	$item_files = $_FILES["item_file"]['name'];
	$item_files = str_replace(' ', '_', $item_files); 
	if(count($item_files)>0) { //check if any file uploaded
		for($j=0; $j < count($item_files); $j++) { //loop the uploaded file array
			$filen = $item_files["$j"]; //file name
			$path = $photopathh.$filen; //generate the destination path
			move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path);
			if($filen!=""){
			mysql_query("INSERT INTO multiimage (uid,imagepath) VALUES ('$uid','$path')");
			}
		}
	}
	 
		  $update=mysql_query("update `product` set `category`='$category',`sub_category`='$sub_category',`title_url`='$title_url',`product_name`='$product_name',`reg_price`='$reg_price',`sale_price`='$sale_price',`overview`='$overview',`specification`='$specification',`modified_date`='$modified_date' where id='$hide1'");
		  if(!empty($_FILES['product_image']['name']))
			{
			//move_uploaded_file($_FILES['product_image']['tmp_name'], $target_path);
			include( 'function.php');
// settings
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// thumbnail sizes
            $sizes = array(70 => 70, 250 => 250, 600 => 600);

		   $ext = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
		     if (in_array($ext, $valid_exts)) {
			/* resize image */
			foreach ($sizes as $w => $h) {
				$files[] = resize($w, $h);
			  }

		     }
			$update=mysql_query("update `product` set `image_path`='$target_path',`product_image`='$product_image' where id='$hide1'");
			}
			
	}
	header("Location:product-mgmt.php");
}
?>