<?php
if(isset($_POST['btnok'])){
	$s= $_REQUEST['state'];
$i= $_REQUEST['item']; 
header("location: adunverified.php?s=$s&i=$i");
}
if (isset($_GET['s'])&&isset($_GET['i']))
{
	
	$st=$_GET['s'];
	$it=$_GET['i'];
	$sq=" AND state='$st' AND catagory='$it'";
}
if (!isset($_GET['s'])&&isset($_GET['i']))
{
	$it=$_GET['i'];
	$sq=" AND catagory='$it'";
}
if (!isset($_GET['s'])&&!isset($_GET['i']))
{
	$sq="";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bell Matrimony</title>
<meta name="viewport" content="width=device-width" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
    $(".liimg").error(function(){
        $(this).attr('src', '../images/back.jpg');
    });
	
});
</script>
<script>

function validateForm()
{
	var state = document.forms["MyForm"]["state"].value;
	var itm = document.forms["MyForm"]["item"].value;
	
	if(state == "Select state"){
		alert("Please Select a state");
        return false;
	}else if(itm == "Select item"){
		alert("Please select an item");
        return false;
	}

}


</script>
</head>
<body>
<?php include_once("template_pageTop3.php"); ?>
<div class="content">
  <div class="subcontent padtb">
  <div class="border incon">
  <div class="lstitm">
<form action="" method="post" name="MyForm" onsubmit="return validateForm()">
<select name="state" class="venl">
<option>Select state</option>
<option>Andaman and Nicobar</option>
<option>Andhra Pradesh</option>
<option>Arunachal Pradesh</option>
<option>Assam</option>
<option>Bihar</option>
<option>Chandigarh</option>
<option>Chhattisgarh</option>
<option>Dadra & Nagar Haveli</option>
<option>Daman & Diu</option>
<option>Delhi</option>
<option>Goa</option>
<option>Gujarat</option>
<option>Haryana</option>
<option>Himachal Pradesh</option>
<option>Jammu & Kashmir</option>
<option>Jharkhand</option>
<option>Karnataka</option>
<option>Kerala</option>
<option>Lakshadweep</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Manipur</option>
<option>Meghalaya</option>
<option>Mizoram</option>
<option>Nagaland</option>
<option>Orissa</option>
<option>Pondicherry</option>
<option>Punjab</option>
<option>Rajasthan</option>
<option>Sikkim</option>
<option>Tamilnadu</option>
<option>Tripura</option>
<option>Uttar Pradesh</option>
<option>Uttaranchal</option>
<option>West Bengal</option>
  </select>
<select name="item" class="venl">
<option>Select item</option>
<option>Air Tickets</option>
<option>Astrologer</option>
<option>Auditorium</option>

<option>Backery</option>
<option>Balloon Decoration</option>
<option>Beauty Parlour</option>
<option>Boutique</option>

<option>Catering</option>
<option>Chef</option>
<option>Cleaning</option>


<option>Event Management</option>

<option>Flower Shop</option>
<option>Footwear</option>

<option>Henna Designers</option>
<option>Hotel Booking</option>

<option>Jewellery</option>

<option>Light &amp; Sound</option>

<option>Photographer</option>
<option>Priest</option>

<option>Rent A Car</option>
<option>Resorts</option>
<option>Restaurants</option>

<option>Security Service</option>
<option>Shopping Mall</option>
<option>Stage Decoration</option>

<option>Textiles</option>
<option>Transporting</option>
</select>
<input name="btnok" type="submit" value="Search" class="search">
</form>
  </div>
<?php
  
 include_once("../php_includes/db_conx.php");
 $sql = "SELECT * FROM freead WHERE activation='1' $sq ORDER BY id DESC";
    $query = mysqli_query($db_conx, $sql); 
//$row=mysql_fetch_array($result);

echo "<ul class=venul>";
while($row=mysqli_fetch_array($query))
{
	$cname = $row["cname"];
	$city = $row["city"];
	$ud = $row["id"];
	$dsc = $row["description"];
	$im="advertise/".$ud.".jpg";
	
echo "<li><div class=table><div class=lilef><a href=vendordetails.php?id=".$row["id"]."><div class=imho><img
src=".$im." class=liimg /></div></a></div><div class=lirig><p class=vp>".substr($cname, 0, 15)." ...</p><p class=plc>".$city."</p><p class=ddp>".substr($dsc, 0, 100)." ...</p><div class=alb><a href=vendordetails.php?id=".$ud." class=aven>CONTACT</a></div></div></div></li>";
}
echo "</ul>";
  
  
  ?>

</div>
</div>
</div>
</body>
</html>