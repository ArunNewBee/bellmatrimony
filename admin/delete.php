<?php
include_once("../php_includes/check_login_status1.php");
if($user_ok != true || $log_username == "") {
	exit();
}
echo $log_username;
if (isset($_GET['id']) && isset($_GET['pr']))
{
	include_once("../php_includes/db_conx.php");
	$id = $_GET['id'];
	$pr=$_GET['pr'];
	$sql = "SELECT * FROM photos WHERE id='$id'";
	$query = mysqli_query($db_conx, $sql);
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$filename=$row["filename"];
		$user=$row["user"];
	}
	$userFolder = "../user/$user/$filename";
	 
          if(file_exists($userFolder))
		  {
			  unlink($userFolder);
			  echo "deleted"; 
		  }
		  $sql1="DELETE FROM photos WHERE id='$id'";
$query1 = mysqli_query($db_conx, $sql1);
header("Location:Additionalphoto.php?id=".$pr);
     
		
}