<?php 
if (isset($_GET['id'])) {
include_once("../php_includes/check_login_status1.php");
$profile_name="";
$age="";
include_once("../php_includes/db_conx.php");
$id = $_GET['id'];

// Select the member from the users table
$sql = "SELECT * FROM users WHERE id='$id' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}



if(!empty($_FILES['image']['name'])){
	
	$file_type=$_FILES['image']['type'];
$filename = $_FILES['image']['name'];
$filetempname = $_FILES['image']['tmp_name'];
$file_size =$_FILES['image']['size'];

	if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg")  
	{
		$thumb_src = '';
    $message = '';
    echo "<script type='text/javascript'>alert('Invalid file format. Only jpg and png files can be uploaded.');</script>";
	
}
else
{
	if ($file_size < (2048 * 1024)) 
	{
		include_once("../php_includes/db_conx.php");
		
		$sql2 = "SELECT id FROM photos WHERE user='$id'";
    $query2 = mysqli_query($db_conx, $sql2); 
    $uname_check = mysqli_num_rows($query2);
    
    if ($uname_check < 10) {
		
		
		move_uploaded_file($filetempname,'../user/'.$id.'/'.$filename); 
	
	$sql3 = "INSERT INTO photos (user, filename, uploaddate)  VALUES('$id','$filename',now())";
		$query3 = mysqli_query($db_conx, $sql3); 
		
	echo "<script type='text/javascript'>alert('Success');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Only 10 photos can be uploaded');</script>";
	}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Image size must be less than 2 MB.');</script>";
	}
	
}
	
}
}
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Photo</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../styles/style.css">
</head>

<body>
<?php include_once("template_pageTop2.php"); ?>

<div class="content">
  <div class="subcontent padtb">
  <div class="table">
  <div class="regleft">
  <a href="profile.php?id=<?php echo $id ?>">Profile</a>
  <form method="post" enctype="multipart/form-data">
    <p class="fl"><input type="file" name="image" class="upim"/>
    <input type="submit" name="submit" value="Upload" class="submit"/></p>
</form>


<?php
include_once("../php_includes/db_conx.php");
$qry="SELECT * FROM photos WHERE user='$id'";
$result=mysqli_query($db_conx,$qry);
echo "<ul class=mem1>";

while($row=mysqli_fetch_array($result))
{

echo "<li><div class=podiv><a href=delete.php?id=".$row["id"]."&pr=".$id." class=poa>Delete</a></div><img src=../user/".$row["user"]."/".$row["filename"]." class=po></li>";

}
echo "</ul>";

?>


  </div>
  
  
  
  <div class="regright">
  
  </div>
  
  </div>
  </div>
  </div>

</body>
</html>