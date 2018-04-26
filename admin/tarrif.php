<?php 
if (isset($_GET['id'])) {
include_once("../php_includes/check_login_status1.php");
// Select the member from the users table
$sql = "SELECT * FROM admin WHERE username='$log_username' AND activated='1' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}
$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
$sql1 = "SELECT * FROM users WHERE id='$id' AND activated='1' LIMIT 1";
$user_query1 = mysqli_query($db_conx, $sql1);
// Fetch the user row from the query above
while ($row = mysqli_fetch_array($user_query1, MYSQLI_ASSOC)) {
	$plan = $row["userlevel"];
	$planstartdate = $row["planstartdate"];
	$validity = $row["planperiod"];
	$expirydate = $row["expirydate"];
	$expirydate = new DateTime($expirydate);
	if($plan=="a")
	{
		$validity="";
		$expirydate="Unlimited";
	}
}
if(isset($_POST['btnok'])){ 
include_once("../php_includes/db_conx.php");
$plan = $_REQUEST['radioplan'];
$validity = $_REQUEST['ddlvalidity'];
$startdate = date("Y-m-d");
$expirydate1 = date("Y-m-d", strtotime(" +$validity"));
if($plan=="a" || $validity=="Life time")
{
	$expirydate1="";
}
$sql1 = "UPDATE users SET userlevel='$plan',planstartdate='$startdate',planperiod='$validity',expirydate='$expirydate1' WHERE id='$id'";
            $query1 = mysqli_query($db_conx, $sql1);
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
<link rel="stylesheet" href="../styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function validateForm() 
{
	var plan = document.forms["MyForm"]["radioplan"].value;
	var validity = document.forms["MyForm"]["ddlvalidity"].value;
	if(plan != "a" && validity == ""){
		 alert("Fill out all of the form data");
        return false;
	}
}
</script>
</head>

<body>
<?php include_once("template_pageTop2.php"); ?>

<div class="content">
  <div class="subcontent padtb">
<a href="profile.php?id=<?php echo $id ?>">Profile</a>
<div class="table border">

<div class="regleft">
<p class="userhd" style="margin-top:0px;padding-left:20px;">
Tarrif Plan
</p>
<div class="incon">
 <form action="" method="post" name="MyForm" onsubmit="return validateForm()">
 <table class="edtable">
<tr>
<td class="fs">Current Plan</td><td>
<input name="radioplan" value="a" type="radio" <?php echo ($plan=='a')?'checked':'' ?> style="margin-left:0px;"/>Free Member				
<input name="radioplan" value="b" type="radio"  <?php echo ($plan=='b')?'checked':'' ?>/>Golden Member<br />				
<input name="radioplan" value="c" type="radio" <?php echo ($plan=='c')?'checked':'' ?> style="margin-left:0px;"/>Diamond Member
<input name="radioplan" value="d" type="radio" <?php echo ($plan=='d')?'checked':'' ?>/>Platinum Member
</td>
</tr>
<tr>
<td class="fs">Validity</td>
<td>
<select name="ddlvalidity" class="list4">
<option value="" <?php echo ($validity == "" ? "selected" : ""); ?>>Select</option>
<option <?php echo ($validity == "1 month" ? "selected" : ""); ?>>1 month</option>
<option <?php echo ($validity == "3 months" ? "selected" : ""); ?>>3 months</option>
<option <?php echo ($validity == "6 months" ? "selected" : ""); ?>>6 months</option>
<option <?php echo ($validity == "12 months" ? "selected" : ""); ?>>12 months</option>
</select>


</td>
</tr>
<tr>
<td class="fs">Expiry Date</td>
<td>
<?php echo $expirydate->format('d-m-Y'); ?>
</td>
</tr>
<tr>
<tr>
<td class="fs" colspan="2" style="text-align:center">
<input name="btnok" type="submit" value="Update Changes">
</td>
</tr>
<tr>

</table>
 
 
 </form> 
  </div>
</div>

<div class="regright">
<?php include_once("right.php"); ?>

</div>

</div>

</div>
</div>


</body>
</html>