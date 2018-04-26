<?php 
$noti="";
if(isset($_POST['btnsubmit'])){ 
include_once("php_includes/db_conx.php");
$email = $_REQUEST['txtemail'];

$sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
    $uname_check = mysqli_num_rows($query);
    
    if ($uname_check < 1) {
		
		$noti="<p class='hdnoti rc'>Incorrect Email id</p><p class='pnoti rc'>The Email id which you entered is not registered in this website.</p>";
		
	}
	else
	{
		$sql1 = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $query1 = mysqli_query($db_conx, $sql1); 
	while ($row = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
	$pass = $row["password"];
	$us = $row["username"];
	$mail = $row["email"];
	$to = "$email";							 
		$from = "auto_responder@bellmatrimony.com";
		$subject = 'bellmatrimony.com Password Recovery';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>bellmatrimony.com Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.bellmatrimony.com"><img src="http://www.bellmatrimony.com/images/logo.png" width="36" height="30" alt="bellmatrimony" style="border:none; float:left;"></a>bellmatrimony.com Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$us.',<br /><br />Your login id: '.$mail.' <br />Password: '.$pass.'</div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		$noti="<p class='hdnoti gc'>Recovered Password</p><p class='pnoti gc'>The password is recovered and send to $email. Please check your email. Thank you</p>";
	}
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
	var mail = document.forms["MyForm"]["txtemail"].value;
	
	if(mail == ""){
		 alert("Email id is mandatory.Please don't leave empty.");
        return false;
	}
}
</script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<?php include_once("template_pageTop1.php"); ?>
<div class="content">
  <div class="subcontent padtb">
  
  <div class="table border">

<div class="regleft">
<p class="userhd" style="margin-top:0px;padding-left:20px;">
Forgot Password?
</p>
<div class="incon">
<p class="frgt">
To recover password you have to provide email id which you have registered in this website.
</p>
<p class="mlhd">
Enter Email id <span class="must">*</span>
</p>
<form action="" method="post" name="MyForm" onsubmit="return validateForm()">
<p class="mlbx">
<input name="txtemail" type="email" class="txtbx1">
</p>
<p class="mlbt">
<input name="btnsubmit" type="submit" class="submit">
</p>
</form>

<div class="noti">
<?php echo $noti ?>
</div>

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