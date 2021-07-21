<?php
/**
 * Image resize while uploading
 * @author Resalat Haque
 * @link http://www.w3bees.com/2013/03/resize-image-while-upload-using-php.html
 */
 
/**
 * Image resize
 * @param int $width
 * @param int $height
 */
function resize($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['product_image']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
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
	}
	else
	{
	$sub_category = $_POST['sub_category'];
	}
	$product_image=$_FILES['product_image']['name'];
	$product_image= str_replace(' ', '_', $product_image);
    $string = str_replace(' ', '_', $category); 
	$string1 = str_replace(' ', '_', $sub_category); 
    @mkdir("../images/products/$string/");
	@mkdir("../images/products/$string/$string1/");
    $photopath = "../images/products/$string/$string1/";
	$path = $photopath.$width.'+'.$height.'_'.$product_image;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['product_image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['product_image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
?>