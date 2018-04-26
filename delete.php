<?php
include_once("php_includes/check_login_status.php");
if($user_ok != true || $log_username == "") {
	exit();
}
?>

<?php
if (isset($_GET['id']))
{
	include_once("php_includes/db_conx.php");
	$id = $_GET['id'];
	$sql = "SELECT * FROM photos WHERE id='$id'";
	$query = mysqli_query($db_conx, $sql);
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$filename=$row["filename"];
		$user=$row["user"];
	}
	$userFolder = "user/$user/$filename";
	 
          if(file_exists($userFolder))
		  {
			  unlink($userFolder); 
		  }
		  $sql1="DELETE FROM photos WHERE id='$id'";
$query1 = mysqli_query($db_conx, $sql1); 
?>
<script><?php echo("location.href = 'Additionalphoto.php';");?></script>
<?php
}