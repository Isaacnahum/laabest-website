<?php require_once("config.php"); $id=$_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style2.css">
	<title>Image Upload and edit2 in PHP and MYSQL database</title>
</head>


	
<body>
<div class="container">
	<?php
		if(isset($_POST['update_submit']))
		{	
			$title=$_POST['title'];
$folder = "uploads4/";
$image_file=$_FILES['image']['name'];
 $file = $_FILES['image']['tmp_name'];
 $path = $folder . $image_file;  
 $target_file=$folder.basename($image_file);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if($file!=''){
//Set image upload size 
    if ($_FILES["image"]["size"] > 1500000) {
   $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
}
//Allow only JPG, JPEG, PNG & GIF 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
}
if(!isset($error))
{
	if($file!='')
	{
		$res=mysqli_query($db,"SELECT* from mata WHERE id=$id limit 1");
if($row=mysqli_fetch_array($res)) 
{
$deleteimage=$row['image']; 
}
unlink($folder.$deleteimage);
move_uploaded_file($file,$target_file); 
$result=mysqli_query($db,"UPDATE mata SET title='$title',image='$image_file' WHERE id=$id"); 
	}
	else 
	{
	$result=mysqli_query($db,"UPDATE mata SET title='$title' WHERE id=$id"); 	
	} 
if($result)
{
 header("location:watch.php?action=saved");
}
else 
{
	echo 'Something went wrong'; 
}
}
		}


if(isset($error)){ 

foreach ($error as $error) { 
	echo '<div class="message">'.$error.'</div><br>'; 	
}

}
$res=mysqli_query($db,"SELECT* from mata WHERE id=$id limit 1");
if($row=mysqli_fetch_array($res)) 
{
$title=$row['title'];
$image=$row['image'];  
}
	?> 
	<div class="container">
		
	<?php if(isset($update_sucess))
		{
		echo '<div class="success">Image Updated successfully</div>'; 
		} ?>
		<h2> &nbsp; Editor </h2>
<form action="" method="POST" enctype="multipart/form-data">

	<button name="update_submit" class="btn-primary">Post </button>
	<br><br><hr>
    <label> </label>
	<input type="text" name="title" value="<?php echo $title;?>" class="form-control">
	<label> </label><br>
	&nbsp; <video src="uploads4/<?php echo $image;?>" height="" width="80%"><br>
	<label></label>
	<input type="file" name="image" class="form-contra">
	
</form>
</div>
	</div>
</body>
</html>