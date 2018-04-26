
<?php 
if (isset($_GET['id'])) {
include_once("php_includes/db_conx.php");	
$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
$sql = "SELECT * FROM freead WHERE id='$id' AND activation='1' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "This Ad does not exist or is not yet activated, press back";
    exit();	
}

// Fetch the user row from the query above
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	
	$id1 = $row["id"];
	$cname = $row["cname"];
	$dsc = $row["description"];
	$cname = $row["cname"];
	$pic="advertise/".$id1.".jpg";
}
}
if(isset($_POST['btnsend'])){ 
include_once("php_includes/db_conx.php");
$name = $_REQUEST['name'];
$moblnum = $_REQUEST['moblnum'];
$mail = $_REQUEST['mail'];
$mycity = $_REQUEST['mycity'];
$pin = $_REQUEST['pin'];

$to = "bellmatrimony@gmail.com";							 
		$from = "auto_responder@bellmatrimony.com";
		$subject = 'bellmatrimony.com Directory Enquiry';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>bellmatrimony.com Message</title></head><body>Enquiry for ('.$id1.') ,<a href="http://www.bellmatrimony.com/vendordetails.php?id='.$id.'">'.$cname.'</a><br /><br />Name : '.$name.'<br />Mobile number : '.$moblnum.'<br />Email : '.$mail.'<br />City : '.$mycity.'<br />Pincode : '.$pin.'</body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		
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
<script>
$(document).ready(function()
{
    $(".vim").error(function(){
        $(this).attr('src', './images/back.jpg');
    });
	
});
</script>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<?php include_once("template_pageTopFreead.php"); ?>
<div class="content">
  <div class="subcontent padtb">
  <a href="vendorlist.php" class="dir"><< directory</a>
  <div class="border incon">
  <p class="venhd"><?php echo $cname; ?></p>
  <div class="table">
  
  <div class="twov">
    <img src="<?php echo $pic ?>" class="vim" width="100%" style="margin-bottom:20px;">
    <?php echo $dsc; ?>
    </div>
  
  <div class="twovsp"></div>
  
  <div class="twov">
  <p class="venp">Contact</p>
  <form method="post">
  <table class="ventab">
  <tr>
    <td class="btd">Name</td>
    <td><input name="name" type="text" class="vendetxt" required></td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td><input name="moblnum" type="text" maxlength="10"  pattern="[0-9]{10}" class="vendetxt" required></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="mail" type="email" class="vendetxt" required></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input name="mycity" type="text" class="vendetxt" required></td>
  </tr>
  <tr>
    <td>Pincode</td>
    <td><input name="pin" type="text" class="vendetxt" pattern="[0-9]{6}" required></td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:center;"><input name="btnsend" type="submit" class="loginbt"></td>
  </tr>
</table>
</form>
  </div>
  
  </div>
  
</div>
</div>
</div>
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>