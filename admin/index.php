<?php

if (isset($_GET['erra']))
{
	$er = $_GET['erra'];
	if($er="err_pass")
	{
		echo "<script type='text/javascript'>alert('Invalid email id or password.Please enter email id and password correctly');</script>";
	}
}
if(isset($_POST['btnsub'])){ 
include_once("../php_includes/db_conx.php");
$em = $_REQUEST['txtmail'];
$pa = $_REQUEST['txtpass'];
$ip1 = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

if($em == "" || $pa == ""){
		echo "<script type='text/javascript'>alert('Please enter username and password');</script>";
        exit();
	} else {
		
		// END FORM DATA ERROR HANDLING
		$sql = "SELECT id, username, password FROM admin WHERE username='$em' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
		
		if($pa != $db_pass_str){
		header("Location:login.php?erra=err_pass");
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
			session_start();
			$_SESSION['id'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass_str;
			setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
    		setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE); 
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE admin SET ip='$ip1', lastlogin=now() WHERE id='$db_id'";
            $query = mysqli_query($db_conx, $sql);
			header("Location:verifiedusers.php");
		    exit();
		}
		
	}
	exit();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Login - Bell Matrimony</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function validateForm() 
{
	var user = document.forms["MyForm"]["txtmail"].value;
	var pass = document.forms["MyForm"]["txtpass"].value;
		
	if(user == "" || pass == ""){
		 alert("Fill out all of the form data");
        return false;
	} else if(user == ""){
		alert("Please fill email");
        return false;
	} else if(pass == ""){
		alert("Please fill password");
        return false;
	}
    }
</script>
</head>

<body>
<?php include_once("template_pageTop1.php"); ?>
<div class="content">
  <div class="subcontent padtb">
  
  <div class="logindiv border">
  <div class="incon">
  <form action="" method="post" name="MyForm" onsubmit="return validateForm()">
  <p class="loghd">LOG IN</p>
  <table class="logtable">
  <tr>
  <td class="rtd">Username</td><td><input name="txtmail" type="text" class="txtbx" style="width:100%"></td>
  </tr>
  
  <tr>
  <td class="rtd">Password</td><td><input name="txtpass" type="password" class="txtbx" style="width:100%"></td>
  </tr>
  
  <tr>
  <td class="rtd"></td><td>
  <p class="pbt">
  <input name="btnsub" type="submit" value="Login" class="loginbt">
 
  </p>
  </td>
  </tr>
  
  </table>
  
  </form>
  </div>
  </div>
  
  
  
  </div>
  </div>
  
</body>
</html>