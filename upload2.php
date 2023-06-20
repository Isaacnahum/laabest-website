<?php require_once("config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style2.css">
	<title>Image Upload in PHP and MYSQL database</title>
</head>
<body>
<div class="container">
	<?php
		if(isset($_POST['form_submit']))
		{	
			$title=$_POST['title'];
$folder = "uploads2/";
$image_file=$_FILES['image']['name'];
 $file = $_FILES['image']['tmp_name'];
 $path = $folder . $image_file;  
 $target_file=$folder.basename($image_file);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
//Set image upload size 
    if ($_FILES["image"]["size"] > 11048576) {
   $error[] = 'Sorry, your image is too large. Upload less than 1 MB KB in size.';
}
if(!isset($error))
{
	// move image in folder 
move_uploaded_file($file,$target_file); 
$result=mysqli_query($db,"INSERT INTO tems(image,title) VALUES('$image_file','$title')"); 
if($result)
{
	header("location:job.php?image_success=1");
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
	?> 
	<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
    <button name="form_submit" class="btn-primary">post</button>
	<br><br><hr><br>
	<label></label>
	<input type="text" name="title" class="form-control" placeholder="write post...">
	<label> </label>
	<input type="file" name="image" accept="image/*" onchange="loadFile(event)" class="form-contra" required >
	<image id="output" width="70%"/>
   <script>
    var loadFile = function(event){
        var image = document.getElementById('output');
        image.src=URL.createObjectURL(event.target.files[0]);
    };
   </script>
</form>
</div>
</div>
</body>
</html>