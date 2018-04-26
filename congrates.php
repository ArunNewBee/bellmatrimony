<?php

session_start();
	// Connect to database and sanitize incoming $_GET variables
 
	$ident=$_SESSION["id"];
	include_once("php_includes/db_conx.php");
	$sql1 = "SELECT * FROM users WHERE id='$ident'";
    $query1 = mysqli_query($db_conx, $sql1);
	while ($row = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
	$profile_name = $row["username"];
	$activated=$row["activated"];
	$email=$row["email"];	
	if($activated=="1")
	{
		$act="<p class='act1'>Your account has been activated. Now you can login with your email and password.</p>";
	}
	else if($activated=="0")
	{
		$act="<p class='act'>Please activate your account by clicking the link, that has send to $email</p><p class='plz'>Only activated members can be able to login into your account.So please activate your account before clicking '<b>continue</b>' button</p>";
	}
	}
	
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bell Matrimony</title>
<meta name="viewport" content="width=device-width" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<?php include_once("template_pageTop1.php"); ?>
<div class="content">
  <div class="subcontent padtb">


<p class="conghd">Welcome <?php echo $profile_name; ?></p>
<p class="congsbhd">
Now you are a member of bellmatrimony.com
</p>
<p class="congp">
Thanks for creating bellmatrimony account. Use it to search your best life partner.
</p>

<?php echo $act ?>

<p class="continuepara">
<a class="continue" href="login.php">
CONTINUE
</a>
</p>


</div>
</div>
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>