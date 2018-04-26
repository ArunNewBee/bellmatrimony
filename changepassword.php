<?php
include_once("php_includes/check_login_status.php");
// Select the member from the users table
$sql = "SELECT * FROM users WHERE id='$log_id' AND activated='1' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$profile_name = $row["username"];
}
$noti="";

if(isset($_POST['btnsubmit'])){ 
include_once("php_includes/db_conx.php");
$oldpass = $_REQUEST['txtoldpass'];
$newpass = $_REQUEST['txtnewpass'];

$sql = "SELECT id FROM users WHERE password='$oldpass' and id='$log_id' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
    $uname_check = mysqli_num_rows($query);
    
    if ($uname_check < 1) {
		$noti="<p class='hdnoti rc'>Incorrect Password</p><p class='pnoti rc'>The password which you entered is incorrect.</p>";
	}
	else
	{
		$sql1 = "UPDATE users SET password='$newpass' WHERE password='$oldpass' and id='$log_id'";
            $query1 = mysqli_query($db_conx, $sql1);
			
			$noti="<p class='hdnoti gc'>Attempt Successful</p><p class='pnoti gc'>The password is changed successfully</p>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width" />
<title>Bell Matrimony</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function validateForm() 
{
	var oldpass = document.forms["MyForm"]["txtoldpass"].value;
	var newpass = document.forms["MyForm"]["txtnewpass"].value;
	var renewpass = document.forms["MyForm"]["txtrenewpass"].value;
	
	if(oldpass == ""){
		 alert("Enter your present password.Please don't leave empty.");
        return false;
	}
	else if(newpass=="")
	{
		alert("Enter new password.");
        return false;
	}
	else if(renewpass=="")
	{
		alert("Re-enter new password.");
        return false;
	}
	else if(newpass!=renewpass)
	{
		alert("New password is not matching.");
        return false;
	}
}
</script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<?php include_once("template_pageTop2.php"); ?>
<div class="content">
  <div class="subcontent padtb">
  
  <div class="table border">

<div class="regleft">
<p class="userhd" style="margin-top:0px;padding-left:20px;">
Change Password
</p>
<div class="incon">
<p class="frgt">
You can change your password. For this you have to provide presenet password, then you can enter the new password. To confirm the new password you should re-enter the new password again. After that click 'Change password' button.
</p>
<div class="noti">
<?php echo $noti ?>
</div>
<form action="" method="post" name="MyForm" onsubmit="return validateForm()">
<p class="mlhd">
Enter your password <span class="must">*</span>
</p>
<p class="mlbx">
<input name="txtoldpass" type="password" class="txtbx1">
</p>
<p class="mlhd">
Enter New password <span class="must">*</span>
</p>
<p class="mlbx">
<input name="txtnewpass" type="password" class="txtbx1">
</p>
<p class="mlhd">
Re-enter New password <span class="must">*</span>
</p>
<p class="mlbx">
<input name="txtrenewpass" type="password" class="txtbx1">
</p>
<p class="mlbt">
<input name="btnsubmit" type="submit" class="submit" value="Change Password" style="margin-top:20px;">
</p>
</form>



</div>
</div>

<div class="regright">
<?php include_once("right.php"); ?>

</div>

</div>
  
  </div>
</div>
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>