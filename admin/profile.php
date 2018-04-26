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
	$profile_name = $row["username"];
	$profile_id = $row["id"];
	$avatar = $row["avatar"];
	$gender = $row["gender"];
	$im="../user/".$profile_id."/".$avatar;
    if($gender=='female'){$class1='fm1';}else if($gender=='male'){$class1='ma1';}
	$dob = $row["dob"];
	$date = new DateTime($dob);
	$today = new DateTime('today');
    $mstatus = $row["mstatus"];
	$mothertongue = $row["mothertongue"];
	$height = $row["height"];
	$weight = $row["weight"];
	
	$complexion = $row["complexion"];
	if($complexion=="" || $complexion==NULL)
	{
		$complexion="";
	}
	
	$bodytype = $row["bodytype"];
	if($bodytype=="" || $bodytype==NULL)
	{
		$bodytype="";
	}
	$food = $row["food"];
	$smoke = $row["smoke"];
	$drink = $row["drink"];
	$physical = $row["physicalstatus"];
	$religion=$row["religion"];
	if($religion!="Hindu")
	{
		$rel='</table><table class="edtable" style="display:none;">';
	}
	else
	{
		$rel='';
	}
	$caste=$row["caste"];
	$subcaste=$row["subcaste"];
	if($subcaste=="" || $subcaste==NULL)
	{
		$subcaste="Don't know";
	}
	$gothram=$row["gothram"];
	if($gothram=="" || $gothram==NULL)
	{
		$gothram="Don't know";
	}
	$star=$row["star"];
	if($star=="" || $star==NULL)
	{
		$star="";
	}
	$raasi=$row["raasi"];
	if($raasi=="Select" || $raasi=="" || $raasi==NULL)
	{
		$raasi="";
	}
	$shuddham=$row["shuddham"];
	$dhosham=$row["dhosham"];
	$fname=$row["fname"];
	if($fname=="" || $fname==NULL)
	{
		$fname="Not Available";
	}
	$fjob=$row["fjob"];
	if($fjob=="Select" || $fjob=="" || $fjob==NULL)
	{
		$fjob="";
	}
	$mname=$row["mname"];
	if($mname=="" || $mname==NULL)
	{
		$mname="Not Available";
	}
	$mjob=$row["mjob"];
	if($mjob=="Select" || $mjob=="" || $mjob==NULL)
	{
		$mjob="";
	}
	$famstatus=$row["familystatus"];
	$famtype=$row["familytype"];
	$famvalues=$row["familyvalues"];
	$quali=$row["education"];
	$job=$row["occupation"];
	$empin=$row["employedin"];
	$income=$row["income"];
	if($income=="" || $income==NULL)
	{
		$income="";
	}
	$country=$row["country"];
	$state=$row["state"];
	$city=$row["city"];
	$mobile=$row["mobile"];
	$email=$row["email"];
	$aboutme=$row["aboutme"];
	$gr1=$row["gr1"];
	$gr2=$row["gr2"];
	$gr3=$row["gr3"];
	$gr4=$row["gr4"];
	$gr5=$row["gr5"];
	$gr6=$row["gr6"];
	$gr7=$row["gr7"];
	$gr8=$row["gr8"];
	$gr9=$row["gr9"];
	$gr10=$row["gr10"];
	$gr11=$row["gr11"];
	$gr12=$row["gr12"];
	$am1=$row["am1"];
	$am2=$row["am2"];
	$am3=$row["am3"];
	$am4=$row["am4"];
	$am5=$row["am5"];
	$am6=$row["am6"];
	$am7=$row["am7"];
	$am8=$row["am8"];
	$am9=$row["am9"];
	$am10=$row["am10"];
	$am11=$row["am11"];
	$am12=$row["am12"];
	$umasis=$row["umasis"];
	$masis=$row["masis"];
	$umabro=$row["umabro"];
	$mabro=$row["mabro"];
	$activated=$row["activated"];
}

if(isset($_POST['btnsubmit'])){ 
include_once("../php_includes/db_conx.php");
$emstatus = $_REQUEST['mstatus'];
$eheight = $_REQUEST['ddlheight'];
$eweight = $_REQUEST['ddlweight'];
if($eweight=="Select")
{
	$eweight = "";
}
$ecomplexion = $_REQUEST['ddlcomplexion'];
if($ecomplexion=="Select")
{
	$ecomplexion = "";
}
$ebodytype = $_REQUEST['ddlbtype'];
if($ebodytype=="Select")
{
	$ebodytype = "";
}
$efood = $_REQUEST['radiofood'];
$esmoke = $_REQUEST['radiosmoke'];
$edrink = $_REQUEST['radiodrink'];
$ephysical = $_REQUEST['btype'];
$esubcaste = $_REQUEST['txtsubcaste'];
$efname = $_REQUEST['txtfname'];
$efjob = $_REQUEST['ddlfatheroccup'];
if($efjob=="Select")
{
	$efjob = "";
}
$emname = $_REQUEST['txtmname'];
$emjob = $_REQUEST['ddlmotheroccup'];
if($emjob=="Select")
{
	$emjob = "";
}
$efamstatus = $_REQUEST['radiofstatus'];
$efamtype = $_REQUEST['radioftype'];
$efamvalues = $_REQUEST['radiofvalues'];
$equali = $_REQUEST['ddledu'];
$eoccup = $_REQUEST['ddloccup'];
$eempin = $_REQUEST['radioemp'];
$eincome = $_REQUEST['txtincome'];
$ecountry = $_REQUEST['ddlcountry'];
$estate = $_REQUEST['ddlstate'];
$ecity = $_REQUEST['txtcity'];
$emob = $_REQUEST['txtmob'];
$eaboutme = $_REQUEST['txtaboutme'];
    $egr1= $_REQUEST['txtgr1'];
	$egr2= $_REQUEST['txtgr2'];
	$egr3= $_REQUEST['txtgr3'];
	$egr4= $_REQUEST['txtgr4'];
	$egr5= $_REQUEST['txtgr5'];
	$egr6= $_REQUEST['txtgr6'];
	$egr7= $_REQUEST['txtgr7'];
	$egr8= $_REQUEST['txtgr8'];
	$egr9= $_REQUEST['txtgr9'];
	$egr10= $_REQUEST['txtgr10'];
	$egr11= $_REQUEST['txtgr11'];
	$egr12= $_REQUEST['txtgr12'];
	$eam1= $_REQUEST['txtam1'];
	$eam2= $_REQUEST['txtam2'];
	$eam3= $_REQUEST['txtam3'];
	$eam4= $_REQUEST['txtam4'];
	$eam5= $_REQUEST['txtam5'];
	$eam6= $_REQUEST['txtam6'];
	$eam7= $_REQUEST['txtam7'];
	$eam8= $_REQUEST['txtam8'];
	$eam9= $_REQUEST['txtam9'];
	$eam10= $_REQUEST['txtam10'];
	$eam11= $_REQUEST['txtam11'];
	$eam12= $_REQUEST['txtam12'];
	$eumasis= $_REQUEST['txtumasis'];
	$emasis= $_REQUEST['txtmasis'];
	$eumabro= $_REQUEST['txtumabro'];
	$emabro= $_REQUEST['txtmabro'];
	$eactivated= $_REQUEST['radioactivated'];
	
	$prabt = preg_replace("/[^a-zA-Z0-9,. ]+/", "", html_entity_decode($eaboutme));

$sql = "UPDATE users SET mstatus='$emstatus',height='$eheight',weight='$eweight',complexion='$ecomplexion',bodytype='$ebodytype',food='$efood',smoke='$esmoke',drink='$edrink',physicalstatus='$ephysical',subcaste='$esubcaste',fname='$efname',fjob='$efjob',mname='$emname',mjob='$emjob',familystatus='$efamstatus',familytype='$efamtype',familyvalues='$efamvalues',education='$equali',occupation='$eoccup',employedin='$eempin',income='$eincome',country='$ecountry',state='$estate',city='$ecity',mobile='$emob',aboutme='$prabt',gr1='$egr1',gr2='$egr2',gr3='$egr3',gr4='$egr4',gr5='$egr5',gr6='$egr6',gr7='$egr7',gr8='$egr8',gr9='$egr9',gr10='$egr10',gr11='$egr11',gr12='$egr12',am1='$eam1',am2='$eam2',am3='$eam3',am4='$eam4',am5='$eam5',am6='$eam6',am7='$eam7',am8='$eam8',am9='$eam9',am10='$eam10',am11='$eam11',am12='$eam12',umasis='$eumasis',masis='$emasis',umabro='$eumabro',mabro='$emabro',activated='$eactivated' WHERE id='$profile_id'";
    if ($db_conx->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db_conx->error;
}
header("Location:verifiedusers.php");
}
if(isset($_POST['btnacti'])){ 
include_once("../php_includes/db_conx.php");
$sql = "UPDATE users SET activated='0' WHERE id='$profile_id'";
    if ($db_conx->query($sql) === TRUE) {
    header("Location:verifiedusers.php");
} else {
    echo "Error updating record: " . $db_conx->error;
}

}
if(isset($_POST['btndelete'])){ 
include_once("../php_includes/db_conx.php");
$sql="DELETE FROM users WHERE id='$profile_id'";
$query = mysqli_query($db_conx, $sql);
			$userFolder = "../user/$profile_id";
	  if(is_dir($userFolder)) {
          rmdir($userFolder);
      }

	header("Location:verifiedusers.php");
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
	
	var con = document.forms["MyForm"]["ddlcountry"].value;
	var sta = document.forms["MyForm"]["ddlstate"].value;
	var city = document.forms["MyForm"]["txtcity"].value;
	var mob = document.forms["MyForm"]["txtmob"].value;
	var e = document.forms["MyForm"]["txtmail"].value;
	var h = document.forms["MyForm"]["ddlheight"].value;
	var edu = document.forms["MyForm"]["ddledu"].value;
	var occ = document.forms["MyForm"]["ddloccup"].value;
	var emp = document.forms["MyForm"]["radioemp"].value;
	
	if(city == "" || mob == "" || e == ""){
		 alert("Fill out all of the form data");
        return false;
	}else if(sta == "Select"){
		alert("Please select state");
        return false;
	}else if(city == ""){
		alert("Please enter city");
        return false;
	}else if(mob == ""){
		alert("Please enter mobile number");
        return false;
	}else if(e == ""){
		alert("Please enter email");
        return false;
	}else if(h == "Select"){
		alert("Please select your height.");
        return false;
	}else if(edu == "Select"){
		alert("Please select your highest educational qualification.");
        return false;
	}else if(occu == "Select"){
		alert("Please select your occupation.");
        return false;
	}else{
		var mobile = document.getElementById("mobile").value;
        var pattern = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
        if (pattern.test(mobile)) {
            alert("Your mobile number : "+mobile);
            return true;
        }
        alert("It is not valid mobile number");
        return false;
	}
}
</script>
<script>
$(document).ready(function()
{
    $(".fm1").error(function(){
        $(this).attr('src', '../images/girl.jpg');
    });
	$(".ma1").error(function(){
        $(this).attr('src', '../images/boy.jpg');
    });
});
</script>
</head>

<body>
<?php include_once("template_pageTop2.php"); ?>

<div class="content">
  <div class="subcontent padtb">

<div class="table border">

<div class="regleft">

<div class="covmenu">

<p class="userhd" style="margin-top:0px;padding-left:20px;">
Edit
</p>
<div class="incon">

<img src="<?php echo $im; ?>" class="<?php echo $class1; ?>" >
<table>
<tr>
<td><a href="Additionalphoto.php?id=<?php echo $profile_id; ?>" class="ulnk">View photos</a></td>
</tr>
<tr>
<td><a href="tarrif.php?id=<?php echo $profile_id; ?>" class="ulnk">Change Plan</a></td>
</tr>
</table>

<form action="" method="post" name="MyForm" onsubmit="return validateForm()">

<p class="usersubhd">
About myself
</p>
<table width="100%" style="color:#565656;">
<tr>
<td>
<script type="text/javascript">
function LimtCharacters(txtMsg, CharLength, indicator) {
chars = txtMsg.value.length;
document.getElementById(indicator).innerHTML = CharLength - chars;
if (chars > CharLength) {
txtMsg.value = txtMsg.value.substring(0, CharLength);
}
}
</script>
<textarea name="txtaboutme" cols="" rows="" class="abm"onkeyup="LimtCharacters(this,200,'lblcount');"><?php echo $aboutme; ?></textarea>
<br/>
Number of Characters Left:
<label id="lblcount" style="background-color:#FFF;color:Red;font-weight:bold;">200</label>
</td>
</tr>
</table>

<p class="usersubhd">
Basics & Lifestyle
</p>

<table class="edtable">
<tr>
<td class="fs">Age</td><td><?php echo $date->diff($today)->y; ?></td>
</tr>
<tr>
<td class="fs">Date of birth</td><td>

<?php echo $date->format('d-m-Y'); ?>

</td>
</tr>
<tr>
<td class="fs">Mother Tongue</td>
<td><?php echo $mothertongue; ?></td>
</tr>
<tr>
<td class="fs">Marital Status</td><td>
<input name="mstatus" type="radio" value="Never Married" <?php echo ($mstatus=='Never Married')?'checked':'' ?> style="margin-left:0px;">Never Married
<input name="mstatus" type="radio" value="Widower" <?php echo ($mstatus=='Widower')?'checked':'' ?>>Widower
<input name="mstatus" type="radio" value="Divorced" <?php echo ($mstatus=='Divorced')?'checked':'' ?>>Divorced
<input name="mstatus" type="radio" value="Awaiting divorce" <?php echo ($mstatus=='Awaiting divorce')?'checked':'' ?>>Awaiting divorce
</td>
</tr>
<tr>
<td class="fs">Height</td><td>
<select name="ddlheight" class="list4">
<option <?php echo ($height == "4ft 6in" ? "selected" : ""); ?>>4ft 6in</option>
<option <?php echo ($height == "4ft 7in" ? "selected" : ""); ?>>4ft 7in</option>
<option <?php echo ($height == "4ft 8in" ? "selected" : ""); ?>>4ft 8in</option>
<option <?php echo ($height == "4ft 9in" ? "selected" : ""); ?>>4ft 9in</option>
<option <?php echo ($height == "4ft 10in" ? "selected" : ""); ?>>4ft 10in</option>
<option <?php echo ($height == "4ft 11in" ? "selected" : ""); ?>>4ft 11in</option>
<option <?php echo ($height == "5ft" ? "selected" : ""); ?>>5ft</option>
<option <?php echo ($height == "5ft 1in" ? "selected" : ""); ?>>5ft 1in</option>
<option <?php echo ($height == "5ft 2in" ? "selected" : ""); ?>>5ft 2in</option>
<option <?php echo ($height == "5ft 3in" ? "selected" : ""); ?>>5ft 3in</option>
<option <?php echo ($height == "5ft 4in" ? "selected" : ""); ?>>5ft 4in</option>
<option <?php echo ($height == "5ft 5in" ? "selected" : ""); ?>>5ft 5in</option>
<option  <?php echo ($height == "5ft 6in" ? "selected" : ""); ?>>5ft 6in</option>
<option <?php echo ($height == "5ft 7in" ? "selected" : ""); ?>>5ft 7in</option>
<option <?php echo ($height == "5ft 8in" ? "selected" : ""); ?>>5ft 8in</option>
<option <?php echo ($height == "5ft 9in" ? "selected" : ""); ?>>5ft 9in</option>
<option <?php echo ($height == "5ft 10in" ? "selected" : ""); ?>>5ft 10in</option>
<option <?php echo ($height == "5ft 11in" ? "selected" : ""); ?>>5ft 11in</option>
<option <?php echo ($height == "6ft" ? "selected" : ""); ?>>6ft</option>
<option <?php echo ($height == "6ft 1in" ? "selected" : ""); ?>>6ft 1in</option>
<option <?php echo ($height == "6ft 2in" ? "selected" : ""); ?>>6ft 2in</option>
<option <?php echo ($height == "6ft 3in" ? "selected" : ""); ?>>6ft 3in</option>
<option <?php echo ($height == "6ft 4in" ? "selected" : ""); ?>>6ft 4in</option>
<option <?php echo ($height == "6ft 5in" ? "selected" : ""); ?>>6ft 5in</option>
<option <?php echo ($height == "6ft 6in" ? "selected" : ""); ?>>6ft 6in</option>
<option <?php echo ($height == "6ft 7in" ? "selected" : ""); ?>>6ft 7in</option>
<option <?php echo ($height == "6ft 8in" ? "selected" : ""); ?>>6ft 8in</option>
<option <?php echo ($height == "6ft 9in" ? "selected" : ""); ?>>6ft 9in</option>
<option <?php echo ($height == "6ft 10in" ? "selected" : ""); ?>>6ft 10in</option>
<option <?php echo ($height == "6ft 11in" ? "selected" : ""); ?>>6ft 11in</option>
<option <?php echo ($height == "7ft" ? "selected" : ""); ?>>7ft</option>
</select>
</td>
</tr>
<tr>
<td class="fs">Weight</td><td>
<select name="ddlweight" class="list4">

<option value="" <?php echo ($weight == "" ? "selected" : ""); ?>>Select</option>
<OPTION VALUE="41" <?php echo ($weight == "41" ? "selected" : ""); ?>>41 kg</OPTION>
<OPTION VALUE="42" <?php echo ($weight == "42" ? "selected" : ""); ?>>42 kg</OPTION>
<OPTION VALUE="43" <?php echo ($weight == "43" ? "selected" : ""); ?>>43 kg</OPTION>
<OPTION VALUE="44" <?php echo ($weight == "44" ? "selected" : ""); ?>>44 kg</OPTION>
<OPTION VALUE="45" <?php echo ($weight == "45" ? "selected" : ""); ?>>45 kg</OPTION>
<OPTION VALUE="46" <?php echo ($weight == "46" ? "selected" : ""); ?>>46 kg</OPTION>
<OPTION VALUE="47" <?php echo ($weight == "47" ? "selected" : ""); ?>>47 kg</OPTION>
<OPTION VALUE="48" <?php echo ($weight == "48" ? "selected" : ""); ?>>48 kg</OPTION>
<OPTION VALUE="49" <?php echo ($weight == "49" ? "selected" : ""); ?>>49 kg</OPTION>
<OPTION VALUE="50" <?php echo ($weight == "50" ? "selected" : ""); ?>>50 kg</OPTION>
<OPTION VALUE="51" <?php echo ($weight == "51" ? "selected" : ""); ?>>51 kg</OPTION>
<OPTION VALUE="52" <?php echo ($weight == "52" ? "selected" : ""); ?>>52 kg</OPTION>
<OPTION VALUE="53" <?php echo ($weight == "53" ? "selected" : ""); ?>>53 kg</OPTION>
<OPTION VALUE="54" <?php echo ($weight == "54" ? "selected" : ""); ?>>54 kg</OPTION>
<OPTION VALUE="55" <?php echo ($weight == "55" ? "selected" : ""); ?>>55 kg</OPTION>
<OPTION VALUE="56" <?php echo ($weight == "56" ? "selected" : ""); ?>>56 kg</OPTION>
<OPTION VALUE="57" <?php echo ($weight == "57" ? "selected" : ""); ?>>57 kg</OPTION>
<OPTION VALUE="58" <?php echo ($weight == "58" ? "selected" : ""); ?>>58 kg</OPTION>
<OPTION VALUE="59" <?php echo ($weight == "59" ? "selected" : ""); ?>>59 kg</OPTION>
<OPTION VALUE="60" <?php echo ($weight == "60" ? "selected" : ""); ?>>60 kg</OPTION>
<OPTION VALUE="61" <?php echo ($weight == "61" ? "selected" : ""); ?>>61 kg</OPTION>
<OPTION VALUE="62" <?php echo ($weight == "62" ? "selected" : ""); ?>>62 kg</OPTION>
<OPTION VALUE="63" <?php echo ($weight == "63" ? "selected" : ""); ?>>63 kg</OPTION>
<OPTION VALUE="64" <?php echo ($weight == "64" ? "selected" : ""); ?>>64 kg</OPTION>
<OPTION VALUE="65" <?php echo ($weight == "65" ? "selected" : ""); ?>>65 kg</OPTION>
<OPTION VALUE="66" <?php echo ($weight == "66" ? "selected" : ""); ?>>66 kg</OPTION>
<OPTION VALUE="67" <?php echo ($weight == "67" ? "selected" : ""); ?>>67 kg</OPTION>
<OPTION VALUE="68" <?php echo ($weight == "68" ? "selected" : ""); ?>>68 kg</OPTION>
<OPTION VALUE="69" <?php echo ($weight == "69" ? "selected" : ""); ?>>69 kg</OPTION>
<OPTION VALUE="70" <?php echo ($weight == "70" ? "selected" : ""); ?>>70 kg</OPTION>
<OPTION VALUE="71" <?php echo ($weight == "71" ? "selected" : ""); ?>>71 kg</OPTION>
<OPTION VALUE="72" <?php echo ($weight == "72" ? "selected" : ""); ?>>72 kg</OPTION>
<OPTION VALUE="73" <?php echo ($weight == "73" ? "selected" : ""); ?>>73 kg</OPTION>
<OPTION VALUE="74" <?php echo ($weight == "74" ? "selected" : ""); ?>>74 kg</OPTION>
<OPTION VALUE="75" <?php echo ($weight == "75" ? "selected" : ""); ?>>75 kg</OPTION>
<OPTION VALUE="76" <?php echo ($weight == "76" ? "selected" : ""); ?>>76 kg</OPTION>
<OPTION VALUE="77" <?php echo ($weight == "77" ? "selected" : ""); ?>>77 kg</OPTION>
<OPTION VALUE="78" <?php echo ($weight == "78" ? "selected" : ""); ?>>78 kg</OPTION>
<OPTION VALUE="79" <?php echo ($weight == "79" ? "selected" : ""); ?>>79 kg</OPTION>
<OPTION VALUE="80" <?php echo ($weight == "80" ? "selected" : ""); ?>>80 kg</OPTION>
<OPTION VALUE="81" <?php echo ($weight == "81" ? "selected" : ""); ?>>81 kg</OPTION>
<OPTION VALUE="82" <?php echo ($weight == "82" ? "selected" : ""); ?>>82 kg</OPTION>
<OPTION VALUE="83" <?php echo ($weight == "83" ? "selected" : ""); ?>>83 kg</OPTION>
<OPTION VALUE="84" <?php echo ($weight == "84" ? "selected" : ""); ?>>84 kg</OPTION>
<OPTION VALUE="85" <?php echo ($weight == "85" ? "selected" : ""); ?>>85 kg</OPTION>
<OPTION VALUE="86" <?php echo ($weight == "86" ? "selected" : ""); ?>>86 kg</OPTION>
<OPTION VALUE="87" <?php echo ($weight == "87" ? "selected" : ""); ?>>87 kg</OPTION>
<OPTION VALUE="88" <?php echo ($weight == "88" ? "selected" : ""); ?>>88 kg</OPTION>
<OPTION VALUE="89" <?php echo ($weight == "89" ? "selected" : ""); ?>>89 kg</OPTION>
<OPTION VALUE="90" <?php echo ($weight == "90" ? "selected" : ""); ?>>90 kg</OPTION>
<OPTION VALUE="91" <?php echo ($weight == "91" ? "selected" : ""); ?>>91 kg</OPTION>
<OPTION VALUE="92" <?php echo ($weight == "92" ? "selected" : ""); ?>>92 kg</OPTION>
<OPTION VALUE="93" <?php echo ($weight == "93" ? "selected" : ""); ?>>93 kg</OPTION>
<OPTION VALUE="94" <?php echo ($weight == "94" ? "selected" : ""); ?>>94 kg</OPTION>
<OPTION VALUE="95" <?php echo ($weight == "95" ? "selected" : ""); ?>>95 kg</OPTION>
<OPTION VALUE="96" <?php echo ($weight == "96" ? "selected" : ""); ?>>96 kg</OPTION>
<OPTION VALUE="97" <?php echo ($weight == "97" ? "selected" : ""); ?>>97 kg</OPTION>
<OPTION VALUE="98" <?php echo ($weight == "98" ? "selected" : ""); ?>>98 kg</OPTION>
<OPTION VALUE="99" <?php echo ($weight == "99" ? "selected" : ""); ?>>99 kg</OPTION>
<OPTION VALUE="100" <?php echo ($weight == "100" ? "selected" : ""); ?>>100 kg</OPTION>
<OPTION VALUE="101" <?php echo ($weight == "101" ? "selected" : ""); ?>>101 kg</OPTION>
<OPTION VALUE="102" <?php echo ($weight == "102" ? "selected" : ""); ?>>102 kg</OPTION>
<OPTION VALUE="103" <?php echo ($weight == "103" ? "selected" : ""); ?>>103 kg</OPTION>
<OPTION VALUE="104" <?php echo ($weight == "104" ? "selected" : ""); ?>>104 kg</OPTION>
<OPTION VALUE="105" <?php echo ($weight == "105" ? "selected" : ""); ?>>105 kg</OPTION>
<OPTION VALUE="106" <?php echo ($weight == "106" ? "selected" : ""); ?>>106 kg</OPTION>
<OPTION VALUE="107" <?php echo ($weight == "107" ? "selected" : ""); ?>>107 kg</OPTION>
<OPTION VALUE="108" <?php echo ($weight == "108" ? "selected" : ""); ?>>108 kg</OPTION>
<OPTION VALUE="109" <?php echo ($weight == "109" ? "selected" : ""); ?>>109 kg</OPTION>
<OPTION VALUE="110" <?php echo ($weight == "110" ? "selected" : ""); ?>>110 kg</OPTION>
<OPTION VALUE="111" <?php echo ($weight == "111" ? "selected" : ""); ?>>111 kg</OPTION>
<OPTION VALUE="112" <?php echo ($weight == "112" ? "selected" : ""); ?>>112 kg</OPTION>
<OPTION VALUE="113" <?php echo ($weight == "113" ? "selected" : ""); ?>>113 kg</OPTION>
<OPTION VALUE="114" <?php echo ($weight == "114" ? "selected" : ""); ?>>114 kg</OPTION>
<OPTION VALUE="115" <?php echo ($weight == "115" ? "selected" : ""); ?>>115 kg</OPTION>
<OPTION VALUE="116" <?php echo ($weight == "116" ? "selected" : ""); ?>>116 kg</OPTION>
<OPTION VALUE="117" <?php echo ($weight == "117" ? "selected" : ""); ?>>117 kg</OPTION>
<OPTION VALUE="118" <?php echo ($weight == "118" ? "selected" : ""); ?>>118 kg</OPTION>
<OPTION VALUE="119" <?php echo ($weight == "119" ? "selected" : ""); ?>>119 kg</OPTION>
<OPTION VALUE="120" <?php echo ($weight == "120" ? "selected" : ""); ?>>120 kg</OPTION>
<OPTION VALUE="121" <?php echo ($weight == "121" ? "selected" : ""); ?>>121 kg</OPTION>
<OPTION VALUE="122" <?php echo ($weight == "122" ? "selected" : ""); ?>>122 kg</OPTION>
<OPTION VALUE="123" <?php echo ($weight == "123" ? "selected" : ""); ?>>123 kg</OPTION>
<OPTION VALUE="124" <?php echo ($weight == "124" ? "selected" : ""); ?>>124 kg</OPTION>
<OPTION VALUE="125" <?php echo ($weight == "125" ? "selected" : ""); ?>>125 kg</OPTION>
<OPTION VALUE="126" <?php echo ($weight == "126" ? "selected" : ""); ?>>126 kg</OPTION>
<OPTION VALUE="127" <?php echo ($weight == "127" ? "selected" : ""); ?>>127 kg</OPTION>
<OPTION VALUE="128" <?php echo ($weight == "128" ? "selected" : ""); ?>>128 kg</OPTION>
<OPTION VALUE="129" <?php echo ($weight == "129" ? "selected" : ""); ?>>129 kg</OPTION>
<OPTION VALUE="130" <?php echo ($weight == "130" ? "selected" : ""); ?>>130 kg</OPTION>
<OPTION VALUE="131" <?php echo ($weight == "131" ? "selected" : ""); ?>>131 kg</OPTION>
<OPTION VALUE="132" <?php echo ($weight == "132" ? "selected" : ""); ?>>132 kg</OPTION>
<OPTION VALUE="133" <?php echo ($weight == "133" ? "selected" : ""); ?>>133 kg</OPTION>
<OPTION VALUE="134" <?php echo ($weight == "134" ? "selected" : ""); ?>>134 kg</OPTION>
<OPTION VALUE="135" <?php echo ($weight == "135" ? "selected" : ""); ?>>135 kg</OPTION>
<OPTION VALUE="136" <?php echo ($weight == "136" ? "selected" : ""); ?>>136 kg</OPTION>
<OPTION VALUE="137" <?php echo ($weight == "137" ? "selected" : ""); ?>>137 kg</OPTION>
<OPTION VALUE="138" <?php echo ($weight == "138" ? "selected" : ""); ?>>138 kg</OPTION>
<OPTION VALUE="139" <?php echo ($weight == "139" ? "selected" : ""); ?>>139 kg</OPTION>
<OPTION VALUE="140" <?php echo ($weight == "140" ? "selected" : ""); ?>>140 kg</OPTION>

</select>
</td>
</tr>
<tr>
<td class="fs">Complexion</td><td>
<select name="ddlcomplexion" class="list4">
<option value="" <?php echo ($complexion == "" ? "selected" : ""); ?>>Select</option>
<option <?php echo ($complexion == "Very Fair" ? "selected" : ""); ?>>Very Fair</option>
<option <?php echo ($complexion == "Fair" ? "selected" : ""); ?>>Fair</option>
<option <?php echo ($complexion == "Wheatish" ? "selected" : ""); ?>>Wheatish</option>
<option <?php echo ($complexion == "Wheatish brown" ? "selected" : ""); ?>>Wheatish brown</option>
<option <?php echo ($complexion == "Dark" ? "selected" : ""); ?>>Dark</option>
</select>
</td>
</tr>
<tr>
<td class="fs">Body Type</td><td>
<select name="ddlbtype" class="list4">

<option value="" <?php echo ($bodytype == "" ? "selected" : ""); ?>>Select</option>
<option <?php echo ($bodytype == "Slim" ? "selected" : ""); ?>>Slim</option>
<option <?php echo ($bodytype == "Average" ? "selected" : ""); ?>>Average</option>
<option <?php echo ($bodytype == "Athletic" ? "selected" : ""); ?>>Athletic</option>
<option <?php echo ($bodytype == "Heavy" ? "selected" : ""); ?>>Heavy</option>
</select>
</td>
</tr>
<tr>
<td class="fs">Food</td><td>
<input name="radiofood" value="Vegetarian" type="radio" <?php echo ($food=='Vegetarian')?'checked':'' ?> style="margin-left:0px;"/>Vegetarian				
<input name="radiofood" value="Non-Vegetarian" type="radio"  <?php echo ($food=='Non-Vegetarian')?'checked':'' ?>/>Non-Vegetarian					
<input name="radiofood" value="Eggetarian" type="radio" <?php echo ($food=='Eggetarian')?'checked':'' ?>/>Eggetarian
</td>
</tr>
<tr>
<td class="fs">Smoke</td><td>
<input name="radiosmoke" value="No" type="radio" style="margin-left:0px;" <?php echo ($smoke=='No')?'checked':'' ?>/>No				
<input name="radiosmoke" value="Occationally" type="radio" <?php echo ($smoke=='Occationally')?'checked':'' ?>/>Occationally					
<input name="radiosmoke" value="Yes" type="radio" <?php echo ($smoke=='Yes')?'checked':'' ?>/>Yes	

</td>
</tr>
<tr>
<td class="fs">Drink</td><td>
<input name="radiodrink" value="No" type="radio" <?php echo ($drink=='No')?'checked':'' ?> style="margin-left:0px;"/>No				
<input name="radiodrink" value="Drinks Socially" type="radio" <?php echo ($drink=='Drinks Socially')?'checked':'' ?>/>Drinks Socially					
<input name="radiodrink" value="Yes" type="radio" <?php echo ($drink=='Yes')?'checked':'' ?>/>Yes
</td>
</tr>
<tr>
<td class="fs">Physical Status</td><td>
<input name="btype" type="radio" value="Normal" style="margin-left:0px;" <?php echo ($physical=='Normal')?'checked':'' ?>>Normal
<input name="btype" type="radio" value="Physically challenged" <?php echo ($physical=='Physically challenged')?'checked':'' ?>>Physically challenged
</td>
</tr>

</table>


<?php echo $rel; ?>
<p class="usersubhd">
Religious Background
</p>

<table class="edtable">
<tr>
<td class="fs">Religion</td>
<td><?php echo $religion; ?></td>
</tr>
<tr>
<td>Caste</td>
<td><?php echo $caste; ?></td>
</tr>
<tr>
<td>Sub-caste</td>
<td>
<input name="txtsubcaste" type="text" value="<?php echo $subcaste; ?>" class="txtbx1" maxlength="35"></td>
</tr>
<?php echo $rel; ?>
<tr>
<td>Gothram</td>
<td>
<input name="txtgothram" type="text" value="<?php echo $gothram; ?>" class="txtbx1"  maxlength="35">
</td>
</tr>
<tr>
<td>Nakshatra</td><td>
<select name="ddlstar" id="star" class="list4">
<option value="" <?php echo ($star == "" ? "selected" : ""); ?>>Select</option>
<option <?php echo ($star == "Aswathi" ? "selected" : ""); ?>>Aswathi</option>
<option <?php echo ($star == "Bharani" ? "selected" : ""); ?>>Bharani</option>
<option <?php echo ($star == "Karthiga" ? "selected" : ""); ?>>Karthiga</option>
<option <?php echo ($star == "Rohini" ? "selected" : ""); ?>>Rohini</option>
<option <?php echo ($star == "Makayiram" ? "selected" : ""); ?>>Makayiram</option>
<option <?php echo ($star == "Thiruvathira" ? "selected" : ""); ?>>Thiruvathira</option>
<option <?php echo ($star == "Punartham" ? "selected" : ""); ?>>Punartham</option>
<option <?php echo ($star == "Pooyam" ? "selected" : ""); ?>>Pooyam</option>
<option <?php echo ($star == "Ayilyam" ? "selected" : ""); ?>>Ayilyam</option>
<option <?php echo ($star == "Magam" ? "selected" : ""); ?>>Magam</option>
<option <?php echo ($star == "Pooram" ? "selected" : ""); ?>>Pooram</option>
<option <?php echo ($star == "Uthram" ? "selected" : ""); ?>>Uthram</option>
<option <?php echo ($star == "Atham" ? "selected" : ""); ?>>Atham</option>
<option <?php echo ($star == "Chithira" ? "selected" : ""); ?>>Chithira</option>
<option <?php echo ($star == "Chothi" ? "selected" : ""); ?>>Chothi</option>
<option <?php echo ($star == "Visakham" ? "selected" : ""); ?>>Visakham</option>
<option <?php echo ($star == "Anizham" ? "selected" : ""); ?>>Anizham</option>
<option <?php echo ($star == "Thriketta" ? "selected" : ""); ?>>Thriketta</option>
<option <?php echo ($star == "Moolam" ? "selected" : ""); ?>>Moolam</option>
<option <?php echo ($star == "Pooradam" ? "selected" : ""); ?>>Pooradam</option>
<option <?php echo ($star == "Uthiradam" ? "selected" : ""); ?>>Uthiradam</option>
<option <?php echo ($star == "Thiruvonam" ? "selected" : ""); ?>>Thiruvonam</option>
<option <?php echo ($star == "Avittam" ? "selected" : ""); ?>>Avittam</option>
<option <?php echo ($star == "Chadayam" ? "selected" : ""); ?>>Chadayam</option>
<option <?php echo ($star == "Pooruttathi" ? "selected" : ""); ?>>Pooruttathi</option>
<option <?php echo ($star == "Uthirattathi" ? "selected" : ""); ?>>Uthirattathi</option>
<option <?php echo ($star == "Revathi" ? "selected" : ""); ?>>Revathi</option>
</select></td>
</tr>
<tr>
<td>Raasi</td>
<td>
<select name="ddlraasi" id="raasi" class="list4">
<option value="" <?php echo ($raasi == "" ? "selected" : ""); ?>>Select</option>
<option <?php echo ($raasi == "Medam (Aries)" ? "selected" : ""); ?>>Medam (Aries)</option>
<option <?php echo ($raasi == "Edavam (Taurus)" ? "selected" : ""); ?>>Edavam (Taurus)</option>
<option <?php echo ($raasi == "Mithunam (Gemini)" ? "selected" : ""); ?>>Mithunam (Gemini)</option>
<option <?php echo ($raasi == "Karkidakam (Cancer)" ? "selected" : ""); ?>>Karkidakam (Cancer)</option>
<option <?php echo ($raasi == "Chingam (Leo)" ? "selected" : ""); ?>>Chingam (Leo)</option>
<option <?php echo ($raasi == "Kanni (Virgo)" ? "selected" : ""); ?>>Kanni (Virgo)</option>
<option <?php echo ($raasi == "Thulam (Libra)" ? "selected" : ""); ?>>Thulam (Libra)</option>
<option <?php echo ($raasi == "Vrischigam (Scorpio)" ? "selected" : ""); ?>>Vrischigam (Scorpio)</option>
<option <?php echo ($raasi == "Dhanu (Sagittarius)" ? "selected" : ""); ?>>Dhanu (Sagittarius)</option>
<option <?php echo ($raasi == "Makaram (Capricorn)" ? "selected" : ""); ?>>Makaram (Capricorn)</option>
<option <?php echo ($raasi == "Kumbam (Aquarius)" ? "selected" : ""); ?>>Kumbam (Aquarius)</option>
<option <?php echo ($raasi == "Meenam (Pisces)" ? "selected" : ""); ?>>Meenam (Pisces)</option>
</select></td>
</tr>
<tr>
<td>Shuddham</td><td>
<input name="radioshuddha" value="Yes" type="radio" style="margin-left:0px;" <?php echo ($shuddham=='Yes')?'checked':'' ?>/>Yes			
<input name="radioshuddha" value="No" type="radio" <?php echo ($shuddham=='No')?'checked':'' ?>/>No				
<input name="radioshuddha" value="Dont know" type="radio" <?php echo ($shuddham=='Dont know')?'checked':'' ?>/>Don't know
</td>
</tr>
<tr>
<td>Dosham</td><td>
<input name="radiodosham" value="Yes" type="radio" style="margin-left:0px;" <?php echo ($dhosham=='Yes')?'checked':'' ?>/>Yes			
<input name="radiodosham" value="No" type="radio" <?php echo ($dhosham=='No')?'checked':'' ?>/>No				
<input name="radiodosham" value="Dont know" type="radio" <?php echo ($dhosham=='Dont know')?'checked':'' ?>/>Don't know
</td>
</tr>
<tr>
<td valign="top">Grahanila</td>
<td>
<table class="grh">

<tr>
<td>
  <input type="text" name="txtgr1" class="gr" value="<?php echo $gr1;?>" >
</td>
<td><input type="text" name="txtgr2" class="gr" value="<?php echo $gr2;?>" ></td>
<td><input type="text" name="txtgr3" class="gr" value="<?php echo $gr3;?>" ></td>
<td><input type="text" name="txtgr4" class="gr" value="<?php echo $gr4;?>" ></td>
</tr>

<tr>
<td><input type="text" name="txtgr5" class="gr" value="<?php echo $gr5;?>" ></td>
<td colspan="2" rowspan="2" style="text-align:center" class="centd">Grahanila</td>
<td><input type="text" name="txtgr6" class="gr" value="<?php echo $gr6;?>" ></td>
</tr>

<tr>
<td><input type="text" name="txtgr7" class="gr" value="<?php echo $gr7;?>" ></td>
<td><input type="text" name="txtgr8" class="gr" value="<?php echo $gr8;?>" ></td>
</tr>

<tr>
<td><input type="text" name="txtgr9" class="gr" value="<?php echo $gr9;?>" ></td>
<td><input type="text" name="txtgr10" class="gr" value="<?php echo $gr10;?>" ></td>
<td><input type="text" name="txtgr11" class="gr" value="<?php echo $gr11;?>" ></td>
<td><input type="text" name="txtgr12" class="gr" value="<?php echo $gr12;?>" ></td>
</tr>

</table>
</td>
</tr>
<tr>
<td valign="top">Navamsakam</td>
<td>
<table class="grh">

<tr>
<td>
  <input type="text" name="txtam1" class="gr" value="<?php echo $am1;?>" >
</td>
<td><input type="text" name="txtam2" class="gr" value="<?php echo $am2;?>" ></td>
<td><input type="text" name="txtam3" class="gr" value="<?php echo $am3;?>" ></td>
<td><input type="text" name="txtam4" class="gr" value="<?php echo $am4;?>" ></td>
</tr>

<tr>
<td><input type="text" name="txtam5" class="gr" value="<?php echo $am5;?>" ></td>
<td colspan="2" rowspan="2" style="text-align:center" class="centd">Navamsakam</td>
<td><input type="text" name="txtam6" class="gr" value="<?php echo $am6;?>" ></td>
</tr>

<tr>
<td><input type="text" name="txtam7" class="gr" value="<?php echo $am7;?>" ></td>
<td><input type="text" name="txtam8" class="gr" value="<?php echo $am8;?>" ></td>
</tr>

<tr>
<td><input type="text" name="txtam9" class="gr" value="<?php echo $am9;?>" ></td>
<td><input type="text" name="txtam10" class="gr" value="<?php echo $am10;?>" ></td>
<td><input type="text" name="txtam11" class="gr" value="<?php echo $am11;?>" ></td>
<td><input type="text" name="txtam12" class="gr" value="<?php echo $am12;?>" ></td>
</tr>

</table>
</td>
</tr>
</table>






<p class="usersubhd">
Family Details
</p>

<table class="edtable">
<tr>
<td class="fs">Father's Name</td><td>
<input name="txtfname" type="text" value="<?php echo $fname; ?>" class="txtbx1" maxlength="35"></td>
</tr>
<tr>
<td>Father's Job</td><td>
<select name="ddlfatheroccup" class="list4">

<option value="" <?php echo ($fjob == "" ? "selected" : ""); ?>>Select</option>

<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- ADMIN --' class='a' ><option <?php echo ($fjob == "Manager" ? "selected" : ""); ?>>Manager</option>
<option <?php echo ($fjob == "Supervisor" ? "selected" : ""); ?>>Supervisor</option>
<option <?php echo ($fjob == "Officer" ? "selected" : ""); ?>>Officer</option>
<option <?php echo ($fjob == "Administrative Professional" ? "selected" : ""); ?>>Administrative Professional</option>
<option <?php echo ($fjob == "Executive" ? "selected" : ""); ?>>Executive</option>
<option <?php echo ($fjob == "Clerk" ? "selected" : ""); ?>>Clerk</option>
<option <?php echo ($fjob == "Human Resources Professional" ? "selected" : ""); ?>>Human Resources Professional</option>
</optgroup><optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AGRICULTURE --' class='a' >
<option <?php echo ($fjob == "Agriculture & Farming Professional" ? "selected" : ""); ?>>Agriculture & Farming Professional</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AIRLINE --' class='a' ><option <?php echo ($fjob == "Pilot" ? "selected" : ""); ?>>Pilot</option>
<option <?php echo ($fjob == "Air Hostess" ? "selected" : ""); ?>>Air Hostess</option>
<option <?php echo ($fjob == "Airline Professional" ? "selected" : ""); ?>>Airline Professional</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- ARCHITECT & DESIGN --' class='a' >
<option <?php echo ($fjob == "Architect" ? "selected" : ""); ?>>Architect</option>
<option <?php echo ($fjob == "Interior Designer" ? "selected" : ""); ?>>Interior Designer</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- BANKING & FINANCE --' class='a' >
<option <?php echo ($fjob == "Chartered Accountant" ? "selected" : ""); ?>>Chartered Accountant</option>
<option <?php echo ($fjob == "Company Secretary" ? "selected" : ""); ?>>Company Secretary</option>
<option <?php echo ($fjob == "Accounts/Finance Professional" ? "selected" : ""); ?>>Accounts/Finance Professional</option>
<option <?php echo ($fjob == "Banking Service Professional" ? "selected" : ""); ?>>Banking Service Professional</option>
<option <?php echo ($fjob == "Auditor" ? "selected" : ""); ?>>Auditor</option>
<option <?php echo ($fjob == "Financial Accountant" ? "selected" : ""); ?>>Financial Accountant</option>
<option <?php echo ($fjob == "Financial Analyst / Planning" ? "selected" : ""); ?>>Financial Analyst / Planning</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- BEAUTY & FASHION --' class='a' >
<option <?php echo ($fjob == "Fashion Designer" ? "selected" : ""); ?>>Fashion Designer</option>
<option <?php echo ($fjob == "Beautician" ? "selected" : ""); ?>>Beautician</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- CIVIL SERVICES --' class='a' >
<option <?php echo ($fjob == "Civil Services (IAS/IPS/IRS/IES/IFS)" ? "selected" : ""); ?>>Civil Services (IAS/IPS/IRS/IES/IFS)</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEFENCE --' class='a' ><option <?php echo ($fjob == "Army" ? "selected" : ""); ?>>Army</option>
<option <?php echo ($fjob == "Navy" ? "selected" : ""); ?>>Navy</option>
<option <?php echo ($fjob == "Airforce" ? "selected" : ""); ?>>Airforce</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- EDUCATION --' class='a' ><option <?php echo ($fjob == "Professor / Lecturer" ? "selected" : ""); ?>>Professor / Lecturer</option>
<option <?php echo ($fjob == "Teaching / Academician" ? "selected" : ""); ?>>Teaching / Academician</option>
<option <?php echo ($fjob == "Education Professional" ? "selected" : ""); ?>>Education Professional</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- HOSPITALITY --' class='a' ><option <?php echo ($fjob == "Hotel / Hospitality Professional" ? "selected" : ""); ?>>Hotel / Hospitality Professional</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- IT & ENGINEERING --' class='a' >
<option <?php echo ($fjob == "Software Professional" ? "selected" : ""); ?>>Software Professional</option>
<option <?php echo ($fjob == "Hardware Professional" ? "selected" : ""); ?>>Hardware Professional</option>
<option <?php echo ($fjob == "Engineer - Non IT" ? "selected" : ""); ?>>Engineer - Non IT</option>
<option <?php echo ($fjob == "Designer" ? "selected" : ""); ?>>Designer</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- LEGAL --' class='a' ><option <?php echo ($fjob == "Lawyer & Legal Professional" ? "selected" : ""); ?>>Lawyer & Legal Professional</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- LAW ENFORCEMENT --' class='a' >
<option <?php echo ($fjob == "Law Enforcement Officer" ? "selected" : ""); ?>>Law Enforcement Officer</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MEDICAL --' class='a' ><option <?php echo ($fjob == "Doctor" ? "selected" : ""); ?>>Doctor</option>
<option <?php echo ($fjob == "Health Care Professional" ? "selected" : ""); ?>>Health Care Professional</option>
<option <?php echo ($fjob == "Paramedical Professional" ? "selected" : ""); ?>>Paramedical Professional</option>
<option <?php echo ($fjob == "Nurse" ? "selected" : ""); ?>>Nurse</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MARKETING & SALES --' class='a' >
<option <?php echo ($fjob == "Marketing Professional" ? "selected" : ""); ?>>Marketing Professional</option>
<option <?php echo ($fjob == "Sales Professional" ? "selected" : ""); ?>>Sales Professional</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MEDIA & ENTERTAINMENT --' class='a' >
<option <?php echo ($fjob == "Journalist" ? "selected" : ""); ?>>Journalist</option>
<option <?php echo ($fjob == "Media Professional" ? "selected" : ""); ?>>Media Professional</option>
<option <?php echo ($fjob == "Entertainment Professional" ? "selected" : ""); ?>>Entertainment Professional</option>
<option <?php echo ($fjob == "Event Management Professional" ? "selected" : ""); ?>>Event Management Professional</option>
<option <?php echo ($fjob == "Advertising / PR Professional" ? "selected" : ""); ?>>Advertising / PR Professional</option>
<option <?php echo ($fjob == "Designer" ? "selected" : ""); ?>>Designer</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MERCHANT NAVY --' class='a' >
<option <?php echo ($fjob == "Mariner / Merchant Navy" ? "selected" : ""); ?>>Mariner / Merchant Navy</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- SCIENTIST --' class='a' ><option <?php echo ($fjob == "Scientist / Researcher" ? "selected" : ""); ?>>Scientist / Researcher</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- TOP MANAGEMENT --' class='a' >
<option <?php echo ($fjob == "CXO / President, Director, Chairman" ? "selected" : ""); ?>>CXO / President, Director, Chairman</option>
<option <?php echo ($fjob == "Business Analyst" ? "selected" : ""); ?>>Business Analyst</option>
</optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- OTHERS --' class='a' ><option <?php echo ($fjob == "Consultant" ? "selected" : ""); ?>>Consultant</option>
<option <?php echo ($fjob == "Customer Care Professional" ? "selected" : ""); ?>>Customer Care Professional</option>
<option <?php echo ($fjob == "Social Worker" ? "selected" : ""); ?>>Social Worker</option>
<option <?php echo ($fjob == "Sportsman" ? "selected" : ""); ?>>Sportsman</option>
<option <?php echo ($fjob == "Technician" ? "selected" : ""); ?>>Technician</option>
<option <?php echo ($fjob == "Arts & Craftsman" ? "selected" : ""); ?>>Arts & Craftsman</option>
<option <?php echo ($fjob == "Student" ? "selected" : ""); ?>>Student</option>
<option <?php echo ($fjob == "Librarian" ? "selected" : ""); ?>>Librarian</option>
<option <?php echo ($fjob == "Not Working" ? "selected" : ""); ?>>Not Working</option>
</optgroup>
</select></td>
</tr>
<tr>
<td>Mother's Name</td>
<td>
<input name="txtmname" type="text" value="<?php echo $mname; ?>" class="txtbx1" maxlength="35"></td>
</tr>
<tr>
<td>Mother's Job</td><td><select name="ddlmotheroccup" class="list4">
  <option value="" <?php echo ($mjob == "" ? "selected" : ""); ?>>Select</option>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- ADMIN --' class='a' >
  <option <?php echo ($mjob == "Manager" ? "selected" : ""); ?>>Manager</option>
  <option <?php echo ($mjob == "Supervisor" ? "selected" : ""); ?>>Supervisor</option>
  <option <?php echo ($mjob == "Officer" ? "selected" : ""); ?>>Officer</option>
  <option <?php echo ($mjob == "Administrative Professional" ? "selected" : ""); ?>>Administrative Professional</option>
  <option <?php echo ($mjob == "Executive" ? "selected" : ""); ?>>Executive</option>
  <option <?php echo ($mjob == "Clerk" ? "selected" : ""); ?>>Clerk</option>
  <option <?php echo ($mjob == "Human Resources Professional" ? "selected" : ""); ?>>Human Resources Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AGRICULTURE --' class='a' >
  <option <?php echo ($mjob == "Agriculture & Farming Professional" ? "selected" : ""); ?>>Agriculture & Farming Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AIRLINE --' class='a' >
  <option <?php echo ($mjob == "Pilot" ? "selected" : ""); ?>>Pilot</option>
  <option <?php echo ($mjob == "Air Hostess" ? "selected" : ""); ?>>Air Hostess</option>
  <option <?php echo ($mjob == "Airline Professional" ? "selected" : ""); ?>>Airline Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- ARCHITECT & DESIGN --' class='a' >
  <option <?php echo ($mjob == "Architect" ? "selected" : ""); ?>>Architect</option>
  <option <?php echo ($mjob == "Interior Designer" ? "selected" : ""); ?>>Interior Designer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- BANKING & FINANCE --' class='a' >
  <option <?php echo ($mjob == "Chartered Accountant" ? "selected" : ""); ?>>Chartered Accountant</option>
  <option <?php echo ($mjob == "Company Secretary" ? "selected" : ""); ?>>Company Secretary</option>
  <option <?php echo ($mjob == "Accounts/Finance Professional" ? "selected" : ""); ?>>Accounts/Finance Professional</option>
  <option <?php echo ($mjob == "Banking Service Professional" ? "selected" : ""); ?>>Banking Service Professional</option>
  <option <?php echo ($mjob == "Auditor" ? "selected" : ""); ?>>Auditor</option>
  <option <?php echo ($mjob == "Financial Accountant" ? "selected" : ""); ?>>Financial Accountant</option>
  <option <?php echo ($mjob == "Financial Analyst / Planning" ? "selected" : ""); ?>>Financial Analyst / Planning</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- BEAUTY & FASHION --' class='a' >
  <option <?php echo ($mjob == "Fashion Designer" ? "selected" : ""); ?>>Fashion Designer</option>
  <option <?php echo ($mjob == "Beautician" ? "selected" : ""); ?>>Beautician</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- CIVIL SERVICES --' class='a' >
  <option <?php echo ($mjob == "Civil Services (IAS/IPS/IRS/IES/IFS)" ? "selected" : ""); ?>>Civil Services (IAS/IPS/IRS/IES/IFS)</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEFENCE --' class='a' >
  <option <?php echo ($mjob == "Army" ? "selected" : ""); ?>>Army</option>
  <option <?php echo ($mjob == "Navy" ? "selected" : ""); ?>>Navy</option>
  <option <?php echo ($mjob == "Airforce" ? "selected" : ""); ?>>Airforce</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- EDUCATION --' class='a' >
  <option <?php echo ($mjob == "Professor / Lecturer" ? "selected" : ""); ?>>Professor / Lecturer</option>
  <option <?php echo ($mjob == "Teaching / Academician" ? "selected" : ""); ?>>Teaching / Academician</option>
  <option <?php echo ($mjob == "Education Professional" ? "selected" : ""); ?>>Education Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- HOSPITALITY --' class='a' >
  <option <?php echo ($mjob == "Hotel / Hospitality Professional" ? "selected" : ""); ?>>Hotel / Hospitality Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- IT & ENGINEERING --' class='a' >
  <option <?php echo ($mjob == "Software Professional" ? "selected" : ""); ?>>Software Professional</option>
  <option <?php echo ($mjob == "Hardware Professional" ? "selected" : ""); ?>>Hardware Professional</option>
  <option <?php echo ($mjob == "Engineer - Non IT" ? "selected" : ""); ?>>Engineer - Non IT</option>
  <option <?php echo ($mjob == "Designer" ? "selected" : ""); ?>>Designer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- LEGAL --' class='a' >
  <option <?php echo ($mjob == "Lawyer & Legal Professional" ? "selected" : ""); ?>>Lawyer & Legal Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- LAW ENFORCEMENT --' class='a' >
  <option <?php echo ($mjob == "Law Enforcement Officer" ? "selected" : ""); ?>>Law Enforcement Officer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MEDICAL --' class='a' >
  <option <?php echo ($mjob == "Doctor" ? "selected" : ""); ?>>Doctor</option>
  <option <?php echo ($mjob == "Health Care Professional" ? "selected" : ""); ?>>Health Care Professional</option>
  <option <?php echo ($mjob == "Paramedical Professional" ? "selected" : ""); ?>>Paramedical Professional</option>
  <option <?php echo ($mjob == "Nurse" ? "selected" : ""); ?>>Nurse</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MARKETING & SALES --' class='a' >
  <option <?php echo ($mjob == "Marketing Professional" ? "selected" : ""); ?>>Marketing Professional</option>
  <option <?php echo ($mjob == "Sales Professional" ? "selected" : ""); ?>>Sales Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MEDIA & ENTERTAINMENT --' class='a' >
  <option <?php echo ($mjob == "Journalist" ? "selected" : ""); ?>>Journalist</option>
  <option <?php echo ($mjob == "Media Professional" ? "selected" : ""); ?>>Media Professional</option>
  <option <?php echo ($mjob == "Entertainment Professional" ? "selected" : ""); ?>>Entertainment Professional</option>
  <option <?php echo ($mjob == "Event Management Professional" ? "selected" : ""); ?>>Event Management Professional</option>
  <option <?php echo ($mjob == "Advertising / PR Professional" ? "selected" : ""); ?>>Advertising / PR Professional</option>
  <option <?php echo ($mjob == "Designer" ? "selected" : ""); ?>>Designer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MERCHANT NAVY --' class='a' >
  <option <?php echo ($mjob == "Mariner / Merchant Navy" ? "selected" : ""); ?>>Mariner / Merchant Navy</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- SCIENTIST --' class='a' >
  <option <?php echo ($mjob == "Scientist / Researcher" ? "selected" : ""); ?>>Scientist / Researcher</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- TOP MANAGEMENT --' class='a' >
  <option <?php echo ($mjob == "CXO / President, Director, Chairman" ? "selected" : ""); ?>>CXO / President, Director, Chairman</option>
  <option <?php echo ($mjob == "Business Analyst" ? "selected" : ""); ?>>Business Analyst</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- OTHERS --' class='a' >
  <option <?php echo ($mjob == "Consultant" ? "selected" : ""); ?>>Consultant</option>
  <option <?php echo ($mjob == "Customer Care Professional" ? "selected" : ""); ?>>Customer Care Professional</option>
  <option <?php echo ($mjob == "Social Worker" ? "selected" : ""); ?>>Social Worker</option>
  <option <?php echo ($mjob == "Sportsman" ? "selected" : ""); ?>>Sportsman</option>
  <option <?php echo ($mjob == "Technician" ? "selected" : ""); ?>>Technician</option>
  <option <?php echo ($mjob == "Arts & Craftsman" ? "selected" : ""); ?>>Arts & Craftsman</option>
  <option <?php echo ($mjob == "Student" ? "selected" : ""); ?>>Student</option>
  <option <?php echo ($mjob == "Librarian" ? "selected" : ""); ?>>Librarian</option>
  <option <?php echo ($mjob == "Not Working" ? "selected" : ""); ?>>Not Working</option>
  </optgroup>
  </select>
</td>
</tr>
<tr>
<td class="lf">Sisters</td>
<td class="rt">
	<input name="txtumasis" type="Number" min="0" max="10" class="mm" value="<?php echo $umasis;?>">Unmarried
    <input name="txtmasis" type="Number" min="0" max="10" class="mm" value="<?php echo $masis;?>">Married
</td>

</tr>

<tr>
<td class="lf">Brothers</td>
<td class="rt">
	<input name="txtumabro" type="Number" min="0" max="10" class="mm" value="<?php echo $umabro;?>">Unmarried
    <input name="txtmabro" type="Number" min="0" max="10" class="mm" value="<?php echo $mabro;?>">Married
</td>

</tr>
<tr>
<td>Family Status</td><td>
<input name="radiofstatus" value="Middle class" type="radio" style="margin-left:0px;" <?php echo ($famstatus=='Middle class')?'checked':'' ?>/>Middle class				
<input name="radiofstatus" value="Upper middle class" type="radio" <?php echo ($famstatus=='Upper middle class')?'checked':'' ?>/>Upper middle class				
<input name="radiofstatus" value="Rich" type="radio" <?php echo ($famstatus=='Rich')?'checked':'' ?>/>Rich
<input name="radiofstatus" value="Affluent" type="radio" <?php echo ($famstatus=='Affluent')?'checked':'' ?>/>Affluent

</td>
</tr>
<tr>
<td>Family Type</td><td>
<input name="radioftype" value="Joint" type="radio" style="margin-left:0px;" <?php echo ($famtype=='Joint')?'checked':'' ?>/>Joint			
<input name="radioftype" value="Nuclear" type="radio" <?php echo ($famtype=='Nuclear')?'checked':'' ?>/>Nuclear
</td>
</tr>
<tr>
<td>Family Values</td><td>
<input name="radiofvalues" value="Orthodox" type="radio" style="margin-left:0px;" <?php echo ($famvalues=='Orthodox')?'checked':'' ?>/>Orthodox				
<input name="radiofvalues" value="Traditional" type="radio" <?php echo ($famvalues=='Traditional')?'checked':'' ?>/>Traditional					
<input name="radiofvalues" value="Moderate" type="radio" <?php echo ($famvalues=='Moderate')?'checked':'' ?>/>Moderate
<input name="radiofvalues" value="Liberal" type="radio" <?php echo ($famvalues=='Liberal')?'checked':'' ?>/>Liberal
</td>
</tr>


</table>


<p class="usersubhd">
Education & Occupation
</p>

<table class="edtable">
<tr>
<td class="fs">Qualification</td><td>
<select name="ddledu" class="list4">


<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Bachelors in Engineering / Computers --'>
<option <?php echo ($quali == "Aeronautical Engineering" ? "selected" : ""); ?>>Aeronautical Engineering</option>
<option <?php echo ($quali == "B.Arch" ? "selected" : ""); ?>>B.Arch</option>
<option <?php echo ($quali == "BCA" ? "selected" : ""); ?>>BCA</option>
<option <?php echo ($quali == "BE" ? "selected" : ""); ?>>BE</option>
<option <?php echo ($quali == "B.Plan" ? "selected" : ""); ?>>B.Plan</option>
<option <?php echo ($quali == "B.Sc IT/ Computer Science" ? "selected" : ""); ?>>B.Sc IT/ Computer Science</option>
<option <?php echo ($quali == "B.Tech." ? "selected" : ""); ?>>B.Tech.</option>
<option <?php echo ($quali == "Other Bachelor Degree in Engineering / Computers" ? "selected" : ""); ?>>Other Bachelor Degree in Engineering / Computers</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Masters in Engineering / Computers --'>
<option <?php echo ($quali == "M.Arch." ? "selected" : ""); ?>>M.Arch.</option>
<option <?php echo ($quali == "MCA" ? "selected" : ""); ?>>MCA</option>
<option <?php echo ($quali == "ME" ? "selected" : ""); ?>>ME</option>
<option <?php echo ($quali == "M.Sc. IT / Computer Science" ? "selected" : ""); ?>>M.Sc. IT / Computer Science</option>
<option <?php echo ($quali == "M.S.(Engg.)" ? "selected" : ""); ?>>M.S.(Engg.)</option>
<option <?php echo ($quali == "M.Tech." ? "selected" : ""); ?>>M.Tech.</option>
<option <?php echo ($quali == "PGDCA" ? "selected" : ""); ?>>PGDCA</option>
<option <?php echo ($quali == "Other Masters Degree in Engineering / Computers" ? "selected" : ""); ?>>Other Masters Degree in Engineering / Computers</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Bachelors in Arts / Science / Commerce --'>
<option <?php echo ($quali == "Aviation Degree" ? "selected" : ""); ?>>Aviation Degree</option>
<option <?php echo ($quali == "B.A." ? "selected" : ""); ?>>B.A.</option>
<option <?php echo ($quali == "B.Com." ? "selected" : ""); ?>>B.Com.</option>
<option <?php echo ($quali == "B.Ed." ? "selected" : ""); ?>>B.Ed.</option>
<option <?php echo ($quali == "BFA" ? "selected" : ""); ?>>BFA</option>
<option <?php echo ($quali == "BFT" ? "selected" : ""); ?>>BFT</option>
<option <?php echo ($quali == "BLIS" ? "selected" : ""); ?>>BLIS</option>
<option <?php echo ($quali == "B.M.M." ? "selected" : ""); ?>>B.M.M.</option>
<option <?php echo ($quali == "B.Sc." ? "selected" : ""); ?>>B.Sc.</option>
<option <?php echo ($quali == "B.S.W" ? "selected" : ""); ?>>B.S.W</option>
<option <?php echo ($quali == "B.Phil." ? "selected" : ""); ?>>B.Phil.</option>
<option <?php echo ($quali == "Other Bachelor Degree in Arts / Science / Commerce" ? "selected" : ""); ?>>Other Bachelor Degree in Arts / Science / Commerce</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Masters in Arts / Science / Commerce --'>
<option <?php echo ($quali == "M.A." ? "selected" : ""); ?>>M.A.</option>
<option <?php echo ($quali == "MCom" ? "selected" : ""); ?>>MCom</option>
<option <?php echo ($quali == "M.Ed." ? "selected" : ""); ?>>M.Ed.</option>
<option <?php echo ($quali == "MFA" ? "selected" : ""); ?>>MFA</option>
<option <?php echo ($quali == "MLIS" ? "selected" : ""); ?>>MLIS</option>
<option <?php echo ($quali == "M.Sc." ? "selected" : ""); ?>>M.Sc.</option>
<option <?php echo ($quali == "MSW" ? "selected" : ""); ?>>MSW</option>
<option <?php echo ($quali == "M.Phil." ? "selected" : ""); ?>>M.Phil.</option>
<option <?php echo ($quali == "Other Master Degree in Arts / Science / Commerce" ? "selected" : ""); ?>>Other Master Degree in Arts / Science / Commerce</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Bachelors in Management --'>
<option <?php echo ($quali == "BBA" ? "selected" : ""); ?>>BBA</option>
<option <?php echo ($quali == "BFM (Financial Management)" ? "selected" : ""); ?>>BFM (Financial Management)</option>
<option <?php echo ($quali == "BHM (Hotel Management)" ? "selected" : ""); ?>>BHM (Hotel Management)</option>
<option <?php echo ($quali == "Other Bachelor Degree in Management" ? "selected" : ""); ?>>Other Bachelor Degree in Management</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Masters in Management --'>
<option <?php echo ($quali == "MBA" ? "selected" : ""); ?>>MBA</option>
<option <?php echo ($quali == "MFM (Financial Management)" ? "selected" : ""); ?>>MFM (Financial Management)</option>
<option <?php echo ($quali == "MHM  (Hotel Management)" ? "selected" : ""); ?>>MHM  (Hotel Management)</option>
<option <?php echo ($quali == "MHRM (Human Resource Management)" ? "selected" : ""); ?>>MHRM (Human Resource Management)</option>
<option <?php echo ($quali == "PGDM" ? "selected" : ""); ?>>PGDM</option>
<option <?php echo ($quali == "Other Master Degree in Management" ? "selected" : ""); ?>>Other Master Degree in Management</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Bachelors in Medicine in General / Dental / Surgeon --'>
<option <?php echo ($quali == "B.A.M.S." ? "selected" : ""); ?>>B.A.M.S.</option>
<option <?php echo ($quali == "BDS" ? "selected" : ""); ?>>BDS</option>
<option <?php echo ($quali == "BHMS" ? "selected" : ""); ?>>BHMS</option>
<option <?php echo ($quali == "BSMS" ? "selected" : ""); ?>>BSMS</option>
<option <?php echo ($quali == "BPharm" ? "selected" : ""); ?>>BPharm</option>
<option <?php echo ($quali == "BPT" ? "selected" : ""); ?>>BPT</option>
<option <?php echo ($quali == "BUMS" ? "selected" : ""); ?>>BUMS</option>
<option <?php echo ($quali == "BVSc" ? "selected" : ""); ?>>BVSc</option>
<option <?php echo ($quali == "MBBS" ? "selected" : ""); ?>>MBBS</option>
<option <?php echo ($quali == "B.Sc. Nursing" ? "selected" : ""); ?>>B.Sc. Nursing</option>
<option <?php echo ($quali == "Other Bachelor Degree in Medicine" ? "selected" : ""); ?>>Other Bachelor Degree in Medicine</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Masters in Medicine - General / Dental / Surgeon --'>
<option <?php echo ($quali == "MDS" ? "selected" : ""); ?>>MDS</option>
<option <?php echo ($quali == "MD / MS (Medical)" ? "selected" : ""); ?>>MD / MS (Medical)</option>
<option <?php echo ($quali == "M.Pharm" ? "selected" : ""); ?>>M.Pharm</option>
<option <?php echo ($quali == "MPT" ? "selected" : ""); ?>>MPT</option>
<option <?php echo ($quali == "MVSc" ? "selected" : ""); ?>>MVSc</option>
<option <?php echo ($quali == "Other Master Degree in Medicine" ? "selected" : ""); ?>>Other Master Degree in Medicine</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Bachelors in Legal --'>
<option <?php echo ($quali == "BGL" ? "selected" : ""); ?>>BGL</option>
<option <?php echo ($quali == "B.L." ? "selected" : ""); ?>>B.L.</option>
<option <?php echo ($quali == "LL.B." ? "selected" : ""); ?>>LL.B.</option>
<option <?php echo ($quali == "Other Bachelor Degree in Legal" ? "selected" : ""); ?>>Other Bachelor Degree in Legal</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Masters in Legal --'>
<option <?php echo ($quali == "LL.M." ? "selected" : ""); ?>>LL.M.</option>
<option <?php echo ($quali == "M.L." ? "selected" : ""); ?>>M.L.</option>
<option <?php echo ($quali == "Other Master Degree in  Legal" ? "selected" : ""); ?>>Other Master Degree in  Legal</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Financial Qualification - ICWAI / CA / CS/ CFA --'>
<option <?php echo ($quali == "CA" ? "selected" : ""); ?>>CA</option>
<option <?php echo ($quali == "CFA (Chartered Financial Analyst)" ? "selected" : ""); ?>>CFA (Chartered Financial Analyst)</option>
<option <?php echo ($quali == "CS" ? "selected" : ""); ?>>CS</option>
<option <?php echo ($quali == "ICWA" ? "selected" : ""); ?>>ICWA</option>
<option <?php echo ($quali == "Other Degree in Finance" ? "selected" : ""); ?>>Other Degree in Finance</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Service - IAS / IPS / IRS / IES / IFS  --'>
<option <?php echo ($quali == "IAS" ? "selected" : ""); ?>>IAS</option>
<option <?php echo ($quali == "IES" ? "selected" : ""); ?>>IES</option>
<option <?php echo ($quali == "IFS" ? "selected" : ""); ?>>IFS</option>
<option <?php echo ($quali == "IRS" ? "selected" : ""); ?>>IRS</option>
<option <?php echo ($quali == "IPS" ? "selected" : ""); ?>>IPS</option>
<option <?php echo ($quali == "Other Degree in Service" ? "selected" : ""); ?>>Other Degree in Service</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Ph.D. --'>
<option <?php echo ($quali == "Ph.D." ? "selected" : ""); ?>>Ph.D.</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Any Diploma --'>
<option <?php echo ($quali == "Diploma" ? "selected" : ""); ?>>Diploma</option>
<option <?php echo ($quali == "Polytechnic" ? "selected" : ""); ?>>Polytechnic</option>
<option <?php echo ($quali == "Trade School" ? "selected" : ""); ?>>Trade School</option>
<option <?php echo ($quali == "Others in Diploma" ? "selected" : ""); ?>>Others in Diploma</option>
</optgroup>
<optgroup class='a' label='&nbsp;&nbsp;&nbsp;&nbsp;-- Higher Secondary / Secondary --'>
<option <?php echo ($quali == "Higher Secondary School / High School" ? "selected" : ""); ?>>Higher Secondary School / High School</option>
</optgroup>
</select>
</td>
</tr>
<tr>
<td>Occupation</td><td>

<select name="ddloccup" class="list4">
 
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- ADMIN --' class='a' >
  <option <?php echo ($job == "Manager" ? "selected" : ""); ?>>Manager</option>
  <option <?php echo ($job == "Supervisor" ? "selected" : ""); ?>>Supervisor</option>
  <option <?php echo ($job == "Officer" ? "selected" : ""); ?>>Officer</option>
  <option <?php echo ($job == "Administrative Professional" ? "selected" : ""); ?>>Administrative Professional</option>
  <option <?php echo ($job == "Executive" ? "selected" : ""); ?>>Executive</option>
  <option <?php echo ($job == "Clerk" ? "selected" : ""); ?>>Clerk</option>
  <option <?php echo ($job == "Human Resources Professional" ? "selected" : ""); ?>>Human Resources Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AGRICULTURE --' class='a' >
  <option <?php echo ($job == "Agriculture & Farming Professional" ? "selected" : ""); ?>>Agriculture & Farming Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AIRLINE --' class='a' >
  <option <?php echo ($job == "Pilot" ? "selected" : ""); ?>>Pilot</option>
  <option <?php echo ($job == "Air Hostess" ? "selected" : ""); ?>>Air Hostess</option>
  <option <?php echo ($job == "Airline Professional" ? "selected" : ""); ?>>Airline Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- ARCHITECT & DESIGN --' class='a' >
  <option <?php echo ($job == "Architect" ? "selected" : ""); ?>>Architect</option>
  <option <?php echo ($job == "Interior Designer" ? "selected" : ""); ?>>Interior Designer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- BANKING & FINANCE --' class='a' >
  <option <?php echo ($job == "Chartered Accountant" ? "selected" : ""); ?>>Chartered Accountant</option>
  <option <?php echo ($job == "Company Secretary" ? "selected" : ""); ?>>Company Secretary</option>
  <option <?php echo ($job == "Accounts/Finance Professional" ? "selected" : ""); ?>>Accounts/Finance Professional</option>
  <option <?php echo ($job == "Banking Service Professional" ? "selected" : ""); ?>>Banking Service Professional</option>
  <option <?php echo ($job == "Auditor" ? "selected" : ""); ?>>Auditor</option>
  <option <?php echo ($job == "Financial Accountant" ? "selected" : ""); ?>>Financial Accountant</option>
  <option <?php echo ($job == "Financial Analyst / Planning" ? "selected" : ""); ?>>Financial Analyst / Planning</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- BEAUTY & FASHION --' class='a' >
  <option <?php echo ($job == "Fashion Designer" ? "selected" : ""); ?>>Fashion Designer</option>
  <option <?php echo ($job == "Beautician" ? "selected" : ""); ?>>Beautician</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- CIVIL SERVICES --' class='a' >
  <option <?php echo ($job == "Civil Services (IAS/IPS/IRS/IES/IFS)" ? "selected" : ""); ?>>Civil Services (IAS/IPS/IRS/IES/IFS)</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEFENCE --' class='a' >
  <option <?php echo ($job == "Army" ? "selected" : ""); ?>>Army</option>
  <option <?php echo ($job == "Navy" ? "selected" : ""); ?>>Navy</option>
  <option <?php echo ($job == "Airforce" ? "selected" : ""); ?>>Airforce</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- EDUCATION --' class='a' >
  <option <?php echo ($job == "Professor / Lecturer" ? "selected" : ""); ?>>Professor / Lecturer</option>
  <option <?php echo ($job == "Teaching / Academician" ? "selected" : ""); ?>>Teaching / Academician</option>
  <option <?php echo ($job == "Education Professional" ? "selected" : ""); ?>>Education Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- HOSPITALITY --' class='a' >
  <option <?php echo ($job == "Hotel / Hospitality Professional" ? "selected" : ""); ?>>Hotel / Hospitality Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- IT & ENGINEERING --' class='a' >
  <option <?php echo ($job == "Software Professional" ? "selected" : ""); ?>>Software Professional</option>
  <option <?php echo ($job == "Hardware Professional" ? "selected" : ""); ?>>Hardware Professional</option>
  <option <?php echo ($job == "Engineer - Non IT" ? "selected" : ""); ?>>Engineer - Non IT</option>
  <option <?php echo ($job == "Designer" ? "selected" : ""); ?>>Designer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- LEGAL --' class='a' >
  <option <?php echo ($job == "Lawyer & Legal Professional" ? "selected" : ""); ?>>Lawyer & Legal Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- LAW ENFORCEMENT --' class='a' >
  <option <?php echo ($job == "Law Enforcement Officer" ? "selected" : ""); ?>>Law Enforcement Officer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MEDICAL --' class='a' >
  <option <?php echo ($job == "Doctor" ? "selected" : ""); ?>>Doctor</option>
  <option <?php echo ($job == "Health Care Professional" ? "selected" : ""); ?>>Health Care Professional</option>
  <option <?php echo ($job == "Paramedical Professional" ? "selected" : ""); ?>>Paramedical Professional</option>
  <option <?php echo ($job == "Nurse" ? "selected" : ""); ?>>Nurse</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MARKETING & SALES --' class='a' >
  <option <?php echo ($job == "Marketing Professional" ? "selected" : ""); ?>>Marketing Professional</option>
  <option <?php echo ($job == "Sales Professional" ? "selected" : ""); ?>>Sales Professional</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MEDIA & ENTERTAINMENT --' class='a' >
  <option <?php echo ($job == "Journalist" ? "selected" : ""); ?>>Journalist</option>
  <option <?php echo ($job == "Media Professional" ? "selected" : ""); ?>>Media Professional</option>
  <option <?php echo ($job == "Entertainment Professional" ? "selected" : ""); ?>>Entertainment Professional</option>
  <option <?php echo ($job == "Event Management Professional" ? "selected" : ""); ?>>Event Management Professional</option>
  <option <?php echo ($job == "Advertising / PR Professional" ? "selected" : ""); ?>>Advertising / PR Professional</option>
  <option <?php echo ($job == "Designer" ? "selected" : ""); ?>>Designer</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- MERCHANT NAVY --' class='a' >
  <option <?php echo ($job == "Mariner / Merchant Navy" ? "selected" : ""); ?>>Mariner / Merchant Navy</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- SCIENTIST --' class='a' >
  <option <?php echo ($job == "Scientist / Researcher" ? "selected" : ""); ?>>Scientist / Researcher</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- TOP MANAGEMENT --' class='a' >
  <option <?php echo ($job == "CXO / President, Director, Chairman" ? "selected" : ""); ?>>CXO / President, Director, Chairman</option>
  <option <?php echo ($job == "Business Analyst" ? "selected" : ""); ?>>Business Analyst</option>
  </optgroup>
  <optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- OTHERS --' class='a' >
  <option <?php echo ($job == "Consultant" ? "selected" : ""); ?>>Consultant</option>
  <option <?php echo ($job == "Customer Care Professional" ? "selected" : ""); ?>>Customer Care Professional</option>
  <option <?php echo ($job == "Social Worker" ? "selected" : ""); ?>>Social Worker</option>
  <option <?php echo ($job == "Sportsman" ? "selected" : ""); ?>>Sportsman</option>
  <option <?php echo ($job == "Technician" ? "selected" : ""); ?>>Technician</option>
  <option <?php echo ($job == "Arts & Craftsman" ? "selected" : ""); ?>>Arts & Craftsman</option>
  <option <?php echo ($job == "Student" ? "selected" : ""); ?>>Student</option>
  <option <?php echo ($job == "Librarian" ? "selected" : ""); ?>>Librarian</option>
  <option <?php echo ($job == "Not Working" ? "selected" : ""); ?>>Not Working</option>
  </optgroup>
</select>
</td>
</tr>
<tr>
<td>Employed in</td><td>
<input name="radioemp" value="Government" type="radio" style="margin-left:0px;" <?php echo ($empin=='Government')?'checked':'' ?>/>Government				
<input name="radioemp" value="Private" type="radio" <?php echo ($empin=='Private')?'checked':'' ?>/>Private					
<input name="radioemp" value="Business" type="radio" <?php echo ($empin=='Business')?'checked':'' ?>/>Business<br />				
<input name="radioemp" value="Defence" type="radio" style="margin-left:0px;" <?php echo ($empin=='Defence')?'checked':'' ?>/>Defence
<input name="radioemp" value="Self Employed" type="radio" <?php echo ($empin=='Self Employed')?'checked':'' ?>/>Self Employed
</td>
</tr>
<tr>
<td>Income</td><td>
<input name="txtincome" type="text" value="<?php echo $income; ?>" class="txtbx1" maxlength="25">
</td>
</tr>


</table>


<p class="usersubhd">
Location & Contact Details
</p>

<table class="edtable">
<tr>
<td class="fs">Country living in</td><td>
<select name="ddlcountry" class="list4">

<option <?php echo ($country == "India" ? "selected" : ""); ?>>India</option>
<option <?php echo ($country == "United States of America" ? "selected" : ""); ?>>United States of America</option>
<option <?php echo ($country == "Pakistan" ? "selected" : ""); ?>>Pakistan</option>
<option <?php echo ($country == "United Arab Emirates" ? "selected" : ""); ?>>United Arab Emirates</option>
<option <?php echo ($country == "United Kingdom" ? "selected" : ""); ?>>United Kingdom</option>
<option <?php echo ($country == "Australia" ? "selected" : ""); ?>>Australia</option>
<option <?php echo ($country == "Saudi Arabia" ? "selected" : ""); ?>>Saudi Arabia</option>
<option <?php echo ($country == "Bangladesh" ? "selected" : ""); ?>>Bangladesh</option>
<option <?php echo ($country == "Canada" ? "selected" : ""); ?>>Canada</option>
<option <?php echo ($country == "Afghanistan" ? "selected" : ""); ?>>Afghanistan</option>
<option <?php echo ($country == "Albania" ? "selected" : ""); ?>>Albania</option>
<option <?php echo ($country == "Algeria" ? "selected" : ""); ?>>Algeria</option>
<option <?php echo ($country == "American Samoa" ? "selected" : ""); ?>>American Samoa</option>
<option <?php echo ($country == "Andorra" ? "selected" : ""); ?>>Andorra</option>
<option <?php echo ($country == "Angola" ? "selected" : ""); ?>>Angola</option>
<option <?php echo ($country == "Anguilla" ? "selected" : ""); ?>>Anguilla</option>
<option <?php echo ($country == "Antarctica" ? "selected" : ""); ?>>Antarctica</option>
<option <?php echo ($country == "Antigua and Barbuda" ? "selected" : ""); ?>>Antigua and Barbuda</option>
<option <?php echo ($country == "Argentina" ? "selected" : ""); ?>>Argentina</option>
<option <?php echo ($country == "Armenia" ? "selected" : ""); ?>>Armenia</option>
<option <?php echo ($country == "Aruba" ? "selected" : ""); ?>>Aruba</option>
<option <?php echo ($country == "Austria" ? "selected" : ""); ?>>Austria</option>
<option <?php echo ($country == "Azerbaijan" ? "selected" : ""); ?>>Azerbaijan</option>
<option <?php echo ($country == "Bahamas" ? "selected" : ""); ?>>Bahamas</option>
<option <?php echo ($country == "Bahrain" ? "selected" : ""); ?>>Bahrain</option>
<option <?php echo ($country == "Barbados" ? "selected" : ""); ?>>Barbados</option>
<option <?php echo ($country == "Belarus" ? "selected" : ""); ?>>Belarus</option>
<option <?php echo ($country == "Belgium" ? "selected" : ""); ?>>Belgium</option>
<option <?php echo ($country == "Belize" ? "selected" : ""); ?>>Belize</option>
<option <?php echo ($country == "Benin" ? "selected" : ""); ?>>Benin</option>
<option <?php echo ($country == "Bermuda" ? "selected" : ""); ?>>Bermuda</option>
<option <?php echo ($country == "Bhutan" ? "selected" : ""); ?>>Bhutan</option>
<option <?php echo ($country == "Bolivia" ? "selected" : ""); ?>>Bolivia</option>
<option <?php echo ($country == "Bosnia and Herzegovina" ? "selected" : ""); ?>>Bosnia and Herzegovina</option>
<option <?php echo ($country == "Botswana" ? "selected" : ""); ?>>Botswana</option>
<option <?php echo ($country == "Bouvet Island" ? "selected" : ""); ?>>Bouvet Island</option>
<option <?php echo ($country == "Brazil" ? "selected" : ""); ?>>Brazil</option>
<option <?php echo ($country == "British Indian Ocean Territory" ? "selected" : ""); ?>>British Indian Ocean Territory</option>
<option <?php echo ($country == "Brunei" ? "selected" : ""); ?>>Brunei</option>
<option <?php echo ($country == "Bulgaria" ? "selected" : ""); ?>>Bulgaria</option>
<option <?php echo ($country == "Burkina Faso" ? "selected" : ""); ?>>Burkina Faso</option>
<option <?php echo ($country == "Burundi" ? "selected" : ""); ?>>Burundi</option>
<option <?php echo ($country == "Cambodia" ? "selected" : ""); ?>>Cambodia</option>
<option <?php echo ($country == "Cameroon" ? "selected" : ""); ?>>Cameroon</option>
<option <?php echo ($country == "Cape Verde" ? "selected" : ""); ?>>Cape Verde</option>
<option <?php echo ($country == "Cayman Islands" ? "selected" : ""); ?>>Cayman Islands</option>
<option <?php echo ($country == "Central African Republic" ? "selected" : ""); ?>>Central African Republic</option>
<option <?php echo ($country == "Chad" ? "selected" : ""); ?>>Chad</option>
<option <?php echo ($country == "Chile" ? "selected" : ""); ?>>Chile</option>
<option <?php echo ($country == "China" ? "selected" : ""); ?>>China</option>
<option <?php echo ($country == "Christmas Island" ? "selected" : ""); ?>>Christmas Island</option>
<option <?php echo ($country == "Cocos Islands" ? "selected" : ""); ?>>Cocos Islands</option>
<option <?php echo ($country == "Colombia" ? "selected" : ""); ?>>Colombia</option>
<option <?php echo ($country == "Comoros" ? "selected" : ""); ?>>Comoros</option>
<option <?php echo ($country == "Congo" ? "selected" : ""); ?>>Congo</option>
<option <?php echo ($country == "Cook Islands" ? "selected" : ""); ?>>Cook Islands</option>
<option <?php echo ($country == "Costa Rica" ? "selected" : ""); ?>>Costa Rica</option>
<option <?php echo ($country == "Cote D Ivoire" ? "selected" : ""); ?>>Cote D Ivoire</option>
<option <?php echo ($country == "Croatia" ? "selected" : ""); ?>>Croatia</option>
<option <?php echo ($country == "Cuba" ? "selected" : ""); ?>>Cuba</option>
<option <?php echo ($country == "Cyprus" ? "selected" : ""); ?>>Cyprus</option>
<option <?php echo ($country == "Czech Republic" ? "selected" : ""); ?>>Czech Republic</option>
<option <?php echo ($country == "Denmark" ? "selected" : ""); ?>>Denmark</option>
<option <?php echo ($country == "Djibouti" ? "selected" : ""); ?>>Djibouti</option>
<option <?php echo ($country == "Dominica" ? "selected" : ""); ?>>Dominica</option>
<option <?php echo ($country == "Dominican Republic" ? "selected" : ""); ?>>Dominican Republic</option>
<option <?php echo ($country == "East Timor" ? "selected" : ""); ?>>East Timor</option>
<option <?php echo ($country == "Ecuador" ? "selected" : ""); ?>>Ecuador</option>
<option <?php echo ($country == "Egypt" ? "selected" : ""); ?>>Egypt</option>
<option <?php echo ($country == "El Salvador" ? "selected" : ""); ?>>El Salvador</option>
<option <?php echo ($country == "Equatorial Guinea" ? "selected" : ""); ?>>Equatorial Guinea</option>
<option <?php echo ($country == "Eritrea" ? "selected" : ""); ?>>Eritrea</option>
<option <?php echo ($country == "Estonia" ? "selected" : ""); ?>>Estonia</option>
<option <?php echo ($country == "Ethiopia" ? "selected" : ""); ?>>Ethiopia</option>
<option <?php echo ($country == "Falkland Islands" ? "selected" : ""); ?>>Falkland Islands</option>
<option <?php echo ($country == "Faroe Islands" ? "selected" : ""); ?>>Faroe Islands</option>
<option <?php echo ($country == "Fiji" ? "selected" : ""); ?>>Fiji</option>
<option <?php echo ($country == "Finland" ? "selected" : ""); ?>>Finland</option>
<option <?php echo ($country == "France" ? "selected" : ""); ?>>France</option>
<option <?php echo ($country == "France Metropolitan" ? "selected" : ""); ?>>France Metropolitan</option>
<option <?php echo ($country == "French Guiana" ? "selected" : ""); ?>>French Guiana</option>
<option <?php echo ($country == "French Polynesia" ? "selected" : ""); ?>>French Polynesia</option>
<option <?php echo ($country == "French Southern Territories" ? "selected" : ""); ?>>French Southern Territories</option>
<option <?php echo ($country == "Gabon" ? "selected" : ""); ?>>Gabon</option>
<option <?php echo ($country == "Gambia" ? "selected" : ""); ?>>Gambia</option>
<option <?php echo ($country == "Georgia" ? "selected" : ""); ?>>Georgia</option>
<option <?php echo ($country == "Germany" ? "selected" : ""); ?>>Germany</option>
<option <?php echo ($country == "Ghana" ? "selected" : ""); ?>>Ghana</option>
<option <?php echo ($country == "Gibraltar" ? "selected" : ""); ?>>Gibraltar</option>
<option <?php echo ($country == "Greece" ? "selected" : ""); ?>>Greece</option>
<option <?php echo ($country == "Greenland" ? "selected" : ""); ?>>Greenland</option>
<option <?php echo ($country == "Grenada" ? "selected" : ""); ?>>Grenada</option>
<option <?php echo ($country == "Guadeloupe" ? "selected" : ""); ?>>Guadeloupe</option>
<option <?php echo ($country == "Guam" ? "selected" : ""); ?>>Guam</option>
<option <?php echo ($country == "Guatemala" ? "selected" : ""); ?>>Guatemala</option>
<option <?php echo ($country == "Guinea" ? "selected" : ""); ?>>Guinea</option>
<option <?php echo ($country == "Guinea Bissau" ? "selected" : ""); ?>>Guinea Bissau</option>
<option <?php echo ($country == "Guyana" ? "selected" : ""); ?>>Guyana</option>
<option <?php echo ($country == "Haiti" ? "selected" : ""); ?>>Haiti</option>
<option <?php echo ($country == "Heard and McDonald Islands" ? "selected" : ""); ?>>Heard and McDonald Islands</option>
<option <?php echo ($country == "Honduras" ? "selected" : ""); ?>>Honduras</option>
<option <?php echo ($country == "Hong Kong" ? "selected" : ""); ?>>Hong Kong</option>
<option <?php echo ($country == "Hungary" ? "selected" : ""); ?>>Hungary</option>
<option <?php echo ($country == "Iceland" ? "selected" : ""); ?>>Iceland</option>
<option <?php echo ($country == "Indonesia" ? "selected" : ""); ?>>Indonesia</option>
<option <?php echo ($country == "Iran" ? "selected" : ""); ?>>Iran</option>
<option <?php echo ($country == "Iraq" ? "selected" : ""); ?>>Iraq</option>
<option <?php echo ($country == "Ireland" ? "selected" : ""); ?>>Ireland</option>
<option <?php echo ($country == "Israel" ? "selected" : ""); ?>>Israel</option>
<option <?php echo ($country == "Italy" ? "selected" : ""); ?>>Italy</option>
<option <?php echo ($country == "Ivory Coast" ? "selected" : ""); ?>>Ivory Coast</option>
<option <?php echo ($country == "Jamaica" ? "selected" : ""); ?>>Jamaica</option>
<option <?php echo ($country == "Japan" ? "selected" : ""); ?>>Japan</option>
<option <?php echo ($country == "Jordan" ? "selected" : ""); ?>>Jordan</option>
<option <?php echo ($country == "Kazakhstan" ? "selected" : ""); ?>>Kazakhstan</option>
<option <?php echo ($country == "Kenya" ? "selected" : ""); ?>>Kenya</option>
<option <?php echo ($country == "Kiribati" ? "selected" : ""); ?>>Kiribati</option>
<option <?php echo ($country == "Korea North" ? "selected" : ""); ?>>Korea North</option>
<option <?php echo ($country == "Korea South" ? "selected" : ""); ?>>Korea South</option>
<option <?php echo ($country == "Kuwait" ? "selected" : ""); ?>>Kuwait</option>
<option <?php echo ($country == "Kyrgyzstan" ? "selected" : ""); ?>>Kyrgyzstan</option>
<option <?php echo ($country == "Laos" ? "selected" : ""); ?>>Laos</option>
<option <?php echo ($country == "Latvia" ? "selected" : ""); ?>>Latvia</option>
<option <?php echo ($country == "Lebanon" ? "selected" : ""); ?>>Lebanon</option>
<option <?php echo ($country == "Lesotho" ? "selected" : ""); ?>>Lesotho</option>
<option <?php echo ($country == "Liberia" ? "selected" : ""); ?>>Liberia</option>
<option <?php echo ($country == "Libya" ? "selected" : ""); ?>>Libya</option>
<option <?php echo ($country == "Liechtenstein" ? "selected" : ""); ?>>Liechtenstein</option>
<option <?php echo ($country == "Lithuania" ? "selected" : ""); ?>>Lithuania</option>
<option <?php echo ($country == "Luxembourg" ? "selected" : ""); ?>>Luxembourg</option>
<option <?php echo ($country == "Macau<" ? "selected" : ""); ?>>Macau</option>
<option <?php echo ($country == "Macedonia Former Yugoslav" ? "selected" : ""); ?>>Macedonia Former Yugoslav</option>
<option <?php echo ($country == "Madagascar" ? "selected" : ""); ?>>Madagascar</option>
<option <?php echo ($country == "Malaysia" ? "selected" : ""); ?>>Malaysia</option>
<option <?php echo ($country == "Maldives" ? "selected" : ""); ?>>Maldives</option>
<option <?php echo ($country == "Mali" ? "selected" : ""); ?>>Mali</option>
<option <?php echo ($country == "Malta" ? "selected" : ""); ?>>Malta</option>
<option <?php echo ($country == "Marshall Islands" ? "selected" : ""); ?>>Marshall Islands</option>
<option <?php echo ($country == "Martinique" ? "selected" : ""); ?>>Martinique</option>
<option <?php echo ($country == "Mauritania" ? "selected" : ""); ?>>Mauritania</option>
<option <?php echo ($country == "Mauritius" ? "selected" : ""); ?>>Mauritius</option>
<option <?php echo ($country == "Mayotte" ? "selected" : ""); ?>>Mayotte</option>
<option <?php echo ($country == "Mexico" ? "selected" : ""); ?>>Mexico</option>
<option <?php echo ($country == "Micronesia Federated States of" ? "selected" : ""); ?>>Micronesia Federated States of</option>
<option <?php echo ($country == "Moldova" ? "selected" : ""); ?>>Moldova</option>
<option <?php echo ($country == "Monaco" ? "selected" : ""); ?>>Monaco</option>
<option <?php echo ($country == "Mongolia" ? "selected" : ""); ?>>Mongolia</option>
<option <?php echo ($country == "Montserrat" ? "selected" : ""); ?>>Montserrat</option>
<option <?php echo ($country == "Morocco" ? "selected" : ""); ?>>Morocco</option>
<option <?php echo ($country == "Mozambique" ? "selected" : ""); ?>>Mozambique</option>
<option <?php echo ($country == "Myanmar" ? "selected" : ""); ?>>Myanmar</option>
<option <?php echo ($country == "Namibia" ? "selected" : ""); ?>>Namibia</option>
<option <?php echo ($country == "Nauru" ? "selected" : ""); ?>>Nauru</option>
<option <?php echo ($country == "Nepal" ? "selected" : ""); ?>>Nepal</option>
<option <?php echo ($country == "Netherlands" ? "selected" : ""); ?>>Netherlands</option>
<option <?php echo ($country == "Netherlands Antilles" ? "selected" : ""); ?>>Netherlands Antilles</option>
<option <?php echo ($country == "New Caledonia" ? "selected" : ""); ?>>New Caledonia</option>
<option <?php echo ($country == "New Zealand" ? "selected" : ""); ?>>New Zealand</option>
<option <?php echo ($country == "Nicaragua" ? "selected" : ""); ?>>Nicaragua</option>
<option <?php echo ($country == "Niger" ? "selected" : ""); ?>>Niger</option>
<option <?php echo ($country == "Nigeria" ? "selected" : ""); ?>>Nigeria</option>
<option <?php echo ($country == "Niue" ? "selected" : ""); ?>>Niue</option>
<option <?php echo ($country == "Norfolk Island" ? "selected" : ""); ?>>Norfolk Island</option>
<option <?php echo ($country == "North Korea" ? "selected" : ""); ?>>North Korea</option>
<option <?php echo ($country == "Northern Mariana Islands" ? "selected" : ""); ?>>Northern Mariana Islands</option>
<option <?php echo ($country == "Norway" ? "selected" : ""); ?>>Norway</option>
<option <?php echo ($country == "Oman" ? "selected" : ""); ?>>Oman</option>
<option <?php echo ($country == "Other African Countries" ? "selected" : ""); ?>>Other African Countries</option>
<option <?php echo ($country == "Other American countries" ? "selected" : ""); ?>>Other American countries</option>
<option <?php echo ($country == "Other Asian Countries" ? "selected" : ""); ?>>Other Asian Countries</option>
<option <?php echo ($country == "Other European Countries" ? "selected" : ""); ?>>Other European Countries</option>
<option <?php echo ($country == "Other Gulf Countries" ? "selected" : ""); ?>>Other Gulf Countries</option>
<option <?php echo ($country == "Others" ? "selected" : ""); ?>>Others</option>
<option <?php echo ($country == "Palau" ? "selected" : ""); ?>>Palau</option>
<option <?php echo ($country == "Panama" ? "selected" : ""); ?>>Panama</option>
<option <?php echo ($country == "Papua New Guinea" ? "selected" : ""); ?>>Papua New Guinea</option>
<option <?php echo ($country == "Paraguay" ? "selected" : ""); ?>>Paraguay</option>
<option <?php echo ($country == "Peru" ? "selected" : ""); ?>>Peru</option>
<option <?php echo ($country == "Philippines" ? "selected" : ""); ?>>Philippines</option>
<option <?php echo ($country == "Pitcairn Island" ? "selected" : ""); ?>>Pitcairn Island</option>
<option <?php echo ($country == "Poland" ? "selected" : ""); ?>>Poland</option>
<option <?php echo ($country == "Portugal" ? "selected" : ""); ?>>Portugal</option>
<option <?php echo ($country == "Puerto Rico" ? "selected" : ""); ?>>Puerto Rico</option>
<option <?php echo ($country == "Qatar" ? "selected" : ""); ?>>Qatar</option>
<option <?php echo ($country == "Reunion" ? "selected" : ""); ?>>Reunion</option>
<option <?php echo ($country == "Romania" ? "selected" : ""); ?>>Romania</option>
<option <?php echo ($country == "Russia" ? "selected" : ""); ?>>Russia</option>
<option <?php echo ($country == "Rwanda" ? "selected" : ""); ?>>Rwanda</option>
<option <?php echo ($country == "S. Georgia and S. Sandwich Isls." ? "selected" : ""); ?>>S. Georgia and S. Sandwich Isls.</option>
<option <?php echo ($country == "Saint Kitts & Nevis" ? "selected" : ""); ?>>Saint Kitts & Nevis</option>
<option <?php echo ($country == "Saint Lucia" ? "selected" : ""); ?>>Saint Lucia</option>
<option <?php echo ($country == "Saint Vincent and The Grenadines" ? "selected" : ""); ?>>Saint Vincent and The Grenadines</option>
<option <?php echo ($country == "Samoa" ? "selected" : ""); ?>>Samoa</option>
<option <?php echo ($country == "San Marino" ? "selected" : ""); ?>>San Marino</option>
<option <?php echo ($country == "Sao Tome and Principe" ? "selected" : ""); ?>>Sao Tome and Principe</option>
<option <?php echo ($country == "Senegal" ? "selected" : ""); ?>>Senegal</option>
<option <?php echo ($country == "Seychelles" ? "selected" : ""); ?>>Seychelles</option>
<option <?php echo ($country == "Sierra Leone" ? "selected" : ""); ?>>Sierra Leone</option>
<option <?php echo ($country == "Singapore" ? "selected" : ""); ?>>Singapore</option>
<option <?php echo ($country == "Slovakia" ? "selected" : ""); ?>>Slovakia</option>
<option <?php echo ($country == "Slovenia" ? "selected" : ""); ?>>Slovenia</option>
<option <?php echo ($country == "Solomon Islands" ? "selected" : ""); ?>>Solomon Islands</option>
<option <?php echo ($country == "Somalia" ? "selected" : ""); ?>>Somalia</option>
<option <?php echo ($country == "South Africa" ? "selected" : ""); ?>>South Africa</option>
<option <?php echo ($country == "South Georgia and S S Islands" ? "selected" : ""); ?>>South Georgia and S S Islands</option>
<option <?php echo ($country == "South Korea" ? "selected" : ""); ?>>South Korea</option>
<option <?php echo ($country == "Spain" ? "selected" : ""); ?>>Spain</option>
<option <?php echo ($country == "Sri Lanka" ? "selected" : ""); ?>>Sri Lanka</option>
<option <?php echo ($country == "St. Helena" ? "selected" : ""); ?>>St. Helena</option>
<option <?php echo ($country == "St. Pierre and Miquelon" ? "selected" : ""); ?>>St. Pierre and Miquelon</option>
<option <?php echo ($country == "Sudan" ? "selected" : ""); ?>>Sudan</option>
<option <?php echo ($country == "Suriname" ? "selected" : ""); ?>>Suriname</option>
<option <?php echo ($country == "Svalbard and Jan Mayen Islands" ? "selected" : ""); ?>>Svalbard and Jan Mayen Islands</option>
<option <?php echo ($country == "Swaziland" ? "selected" : ""); ?>>Swaziland</option>
<option <?php echo ($country == "Sweden" ? "selected" : ""); ?>>Sweden</option>
<option <?php echo ($country == "Switzerland" ? "selected" : ""); ?>>Switzerland</option>
<option <?php echo ($country == "Syria" ? "selected" : ""); ?>>Syria</option>
<option <?php echo ($country == "Taiwan" ? "selected" : ""); ?>>Taiwan</option>
<option <?php echo ($country == "Tajikistan" ? "selected" : ""); ?>>Tajikistan</option>
<option <?php echo ($country == "Tanzania" ? "selected" : ""); ?>>Tanzania</option>
<option <?php echo ($country == "Thailand" ? "selected" : ""); ?>>Thailand</option>
<option <?php echo ($country == "Togo" ? "selected" : ""); ?>>Togo</option>
<option <?php echo ($country == "Tokelau" ? "selected" : ""); ?>>Tokelau</option>
<option <?php echo ($country == "Tonga" ? "selected" : ""); ?>>Tonga</option>
<option <?php echo ($country == "Trinidad and Tobago" ? "selected" : ""); ?>>Trinidad and Tobago</option>
<option <?php echo ($country == "Tunisia" ? "selected" : ""); ?>>Tunisia</option>
<option <?php echo ($country == "Turkey" ? "selected" : ""); ?>>Turkey</option>
<option <?php echo ($country == "Turkmenistan" ? "selected" : ""); ?>>Turkmenistan</option>
<option <?php echo ($country == "Turks and Caicos Islands" ? "selected" : ""); ?>>Turks and Caicos Islands</option>
<option <?php echo ($country == "Tuvalu" ? "selected" : ""); ?>>Tuvalu</option>
<option <?php echo ($country == "Uganda" ? "selected" : ""); ?>>Uganda</option>
<option <?php echo ($country == "Ukraine" ? "selected" : ""); ?>>Ukraine</option>
<option <?php echo ($country == "United States Minor Outlying Islands" ? "selected" : ""); ?>>United States Minor Outlying Islands</option>
<option <?php echo ($country == "Uruguay" ? "selected" : ""); ?>>Uruguay</option>
<option <?php echo ($country == "Uzbekistan" ? "selected" : ""); ?>>Uzbekistan</option>
<option <?php echo ($country == "Vanuatu" ? "selected" : ""); ?>>Vanuatu</option>
<option <?php echo ($country == "Vatican City" ? "selected" : ""); ?>>Vatican City</option>
<option <?php echo ($country == "Venezuela" ? "selected" : ""); ?>>Venezuela</option>
<option <?php echo ($country == "Vietnam" ? "selected" : ""); ?>>Vietnam</option>
<option <?php echo ($country == "Virgin Islands" ? "selected" : ""); ?>>Virgin Islands</option>
<option <?php echo ($country == "Virgin Islands  British" ? "selected" : ""); ?>>Virgin Islands  British</option>
<option <?php echo ($country == "Virgin Islands  US" ? "selected" : ""); ?>>Virgin Islands  US</option>
<option <?php echo ($country == "Wallis and Futuna Islands" ? "selected" : ""); ?>>Wallis and Futuna Islands</option>
<option <?php echo ($country == "Western Sahara" ? "selected" : ""); ?>>Western Sahara</option>
<option <?php echo ($country == "Yemen" ? "selected" : ""); ?>>Yemen</option>
<option <?php echo ($country == "Yugoslavia  Former" ? "selected" : ""); ?>>Yugoslavia  Former</option>
<option <?php echo ($country == "Zaire" ? "selected" : ""); ?>>Zaire</option>
<option <?php echo ($country == "Zambia" ? "selected" : ""); ?>>Zambia</option>
<option <?php echo ($country == "Zimbabwe" ? "selected" : ""); ?>>Zimbabwe</option>
		
</select>
</td>
</tr>
<tr>
<td>Native State</td><td>
<script>
  $(document).ready(function () {
    $("#state").change(function () {
        var val = $(this).val();
        if (val == "Andaman and Nicobar") {
            $("#city").html("<option>Bombooflat</option><option>Car Nicobar</option><option>Garacharma</option><option>Port Blair</option>");
			}
            else if (val == "Andhra Pradesh") {
            $("#city").html("<option>Anantapur</option><option>Bheemavaram</option><option>Chittoor</option><option>Eluru</option><option>Guntur</option><option>Hyderabad</option><option>Kadapa</option><option>Kakinada</option><option>Karimnagar</option><option>Khammam</option><option>Kurnool</option><option>Machilipatnam</option><option>Nellore</option><option>Nizamabad</option><option>Rajahmundry</option><option>Vijayawada</option><option>Vishakhapatnam</option><option>Warangal</option><option>Adilabad</option><option>Adoni</option><option>Akkarampalle</option><option>Akkayapalle</option><option>Alwal</option><option>Amadalavalasa</option><option>Amalapuram</option><option>Anakapalle</option><option>Asifabad</option><option>Badepalle</option><option>Bandarulanka</option><option>Bapatla</option><option>Bellampalle</option><option>Bestavaripeta</option><option>Bethamcheria</option><option>Bhadrachalam</option><option>Bhainsa</option><option>Bheemunipatnam</option><option>Bhongir</option><option>Bobbili</option><option>Bodhan</option><option>Bollaram</option><option>Bugganipalle</option><option>Chandur - Nalgonda</option><option>Chatakonda</option><option>Chemmumiahpet</option><option>Chilakaluripet</option><option>Chinnachowk</option><option>Chintalavalasa</option><option>Chirala</option><option>Choutuppal</option><option>Chunchupalle</option><option>Cudappah</option><option>Dasnapur</option><option>Devarakonda</option><option>Dharmavaram</option><option>Dommara Nandyal</option><option>Dowleswaram</option><option>Eddumailaram</option><option>Ekambara kuppam</option><option>Farooqnagar</option><option>Gaddi annaram</option><option>Gadwal</option><option>Gajapathinagaram</option><option>Gajularega</option><option>Gajuwaka</option><option>Ghatkeser</option><option>Gooty</option><option>Gudivada - Krishna</option><option>Gudivada - Vishakhapatna</option><option>Gudur</option><option>Guntakal</option><option>Hindupur</option><option>Ichchapuram</option><option>Isnapur</option><option>Jaggayyapet</option><option>Jagtial</option><option>Jallaram Kamanpur</option><option>Jammalamadugu</option><option>Jangaon</option><option>Jarjapupeta</option><option>Kadiri</option><option>Kaghaznagar</option><option>Kallur</option><option>Kalyandurg</option><option>Kamareddy</option><option>Kanapaka</option><option>Kandukur</option><option>Kantabamsuguda</option><option>Kanuru</option><option>Kapra</option><option>Kavali</option><option>Kazipet</option><option>Koratla</option><option>Kothagudem</option><option>Kothavalasa</option><option>Kovurpalle</option><option>Kovvur</option><option>Kukatpalle</option><option>Kuppam</option><option>Kyathampalle</option><option>L.B. Nagar</option><option>Macherla</option><option>Madanapalle</option><option>Madaram</option><option>Mahbubnagar</option><option>Malkajgiri</option><option>Mancherial</option><option>Mandamarri</option><option>Mandapeta</option><option>Mangalagiri</option><option>Manugur</option><option>Markapur</option><option>Medak</option><option>Meerpet</option><option>Miryalguda</option><option>Moragudi</option><option>Nagari</option><option>Nagarkurnool</option><option>Nalgonda</option><option>Nandyal</option><option>Narasaraopet</option><option>Narayanavanam</option><option>Narayanpet</option><option>Narsapur</option><option>Narsingi</option><option>Narsipatnam</option><option>Naspur</option><option>Nellimaria</option><option>Nidadavole</option><option>Nirmal</option><option>Nuzvid</option><option>Omerkhan daira</option><option>Ongole</option><option>Palacole</option><option>Palakurthi</option><option>Palasa (Kasibugga)</option><option>Palwancha</option><option>Pamur</option><option>Papampeta</option><option>Parvathipuram</option><option>Patancheru</option><option>Pedana</option><option>Peddapuram</option><option>Pitapuram</option><option>Ponnur</option><option>Proddatur</option><option>Punganur</option><option>Puttur - Chittoor</option><option>Quthbullapur</option><option>Rajam</option><option>Rajendranagar</option><option>Ramachandrapuram - Godavari</option><option>Ramachandrapuram - Medak</option><option>Ramachandrapuram-Bhel Township</option><option>Ramagundam</option><option>Ramanayyapeta</option><option>Ramapuram - Kurnool</option><option>Rameswaram - Cuddapah</option><option>Rampachodavaram</option><option>Rayachoti</option><option>Rayadurg</option><option>Renigunta</option><option>Repalle</option><option>Sadasivpet</option><option>Salur</option><option>Samalkota</option><option>Sangareddy</option><option>Sarapaka</option><option>Sattenapalle</option><option>Secunderabad</option><option>Serilingampalle</option><option>Siddipet</option><option>Singapur</option><option>Singarayakonda</option><option>Sirsilla</option><option>Sompeta</option><option>Srikakulam</option><option>Srikalahasti</option><option>Sriramnagar</option><option>Srisailam Project (RFC) Township</option><option>Srisailamgudem Devasthanam</option><option>Suryapet</option><option>Suryaraopeta</option><option>Tadepalligudem</option><option>Tadpatri</option><option>Tallapalle</option><option>Tandur</option><option>Tanuku</option><option>Teegalapahad</option><option>Tenali</option><option>Tiruchanur</option><option>Tirumala</option><option>Tirupati</option><option>Tuni</option><option>Uppal Kalan</option><option>Upper Sileru Project Site Camp</option><option>Uravakonda</option><option>Vaparala</option><option>Venkatagiri</option><option>Vepagunta</option><option>Vetapalem</option><option>Vicarabad</option><option>Vijayapuri (North)</option><option>Vinukonda</option><option>Vizianagaram</option><option>Wanaparthi</option><option>Warrangal</option><option>Yadagirigutta</option><option>Yellandu</option><option>Yemmiganur</option><option>Yerraguntla</option><option>Zahirabad</option>");
}
else if (val == "Arunachal Pradesh")
{
	 $("#city").html("<option>Along</option><option>Basar</option><option>Bomdila</option><option>Changlang</option><option>Daporijo</option><option>Deomali</option><option>Itanagar</option><option>Jairampur</option><option>Khonsa</option><option>Kurung Kumey</option><option>Naharlagun</option><option>Namsai</option><option>Pasighat</option><option>Roing</option><option>Seppa</option><option>Tawang</option><option>Tezu</option><option>Ziro</option>");
}

else if (val == "Assam")
{
	 $("#city").html("<optionAbhayapuri</option><option>Ambikapur Part-X - Cachar</option><option>Amguri</option><option>Anand Nagar</option><option>Badarpur</option><option>Badarpur Rly Town</option><option>Bahbari Gaon</option><option>Bamun Sualkuchi</option><option>Barbari (AMC Area)</option><option>Barpathar</option><option>Barpeta</option><option>Barpeta Road</option><option>Basugaon</option><option>Bihpuria</option><option>Bijni</option><option>Bilasipara</option><option>Biswanath Chariali</option><option>Bohari</option><option>Bokajan</option><option>Bokakhat</option><option>Bongaigaon</option><option>Bongaigaon, Refinery &amp; Petro-chemical Ltd. Township</option><option>Borgolai Grant No.11</option><option>Chabua</option><option>Chandrapur Bagicha</option><option>Chapar</option><option>Chekonidhara</option><option>Choto Haibor</option><option>Dergaon</option><option>Dharapur</option><option>Dhekiajuli</option><option>Dhemaji</option><option>Dhing</option><option>Dhubri</option><option>Dibrugarh</option><option>Digboi</option><option>Digboi Oil Town</option><option>Dimaruguri</option><option>Diphu</option><option>Doboka</option><option>Dokmoka</option><option>Donkamokam</option><option>Doom Dooma</option><option>Duliajan No.1</option><option>Duliajan Oil Town</option><option>Durga Nagar</option><option>Gauripur</option><option>Goalpara</option><option>Gohpur</option><option>Golaghat</option><option>Golokganj</option><option>Gossaigaon</option><option>Guwahati</option><option>Haflong</option><option>Hailakandi</option><option>Hamren</option><option>Hindustan Paper Corporation Ltd. Township Area Panchgram</option><option>Hojai</option><option>Howli</option><option>Howraghat</option><option>Jagiroad</option><option>Jonai Bazar</option><option>Jorhat</option><option>Kampur Town</option><option>Kanakpur</option><option>Karimganj</option><option>Kharijapikon</option><option>Kharupatia</option><option>Kochpara</option><option>Kokrajhar</option><option>Kumar Kaibarta Gaon</option><option>Lakhipur - Cachar</option><option>Lakhipur - Goalpara</option><option>Lala</option><option>Lanka</option><option>Lido Tikok</option><option>Lido Town</option><option>Lumding</option><option>Lumding Rly Colony</option><option>Mahur</option><option>Maibong</option><option>Majgaon</option><option>Makum</option><option>Mangaldoi</option><option>Mankachar</option><option>Margherita</option><option>Mariani</option><option>Marigaon</option><option>Moran Town</option><option>Moranhat</option><option>Nagaon</option><option>Naharkatiya</option><option>Nalbari</option><option>Namrup</option><option>Naubaisa Gaon</option><option>Nazira</option><option>New Bongaigaon Rly. Colony</option><option>North Guwahati</option><option>North Lakhimpur</option><option>Numaligarh Refinery Township</option><option>Palasbari</option><option>Pathsala</option><option>Rangapara</option><option>Rangia</option><option>Salakati</option><option>Sapatgram</option><option>Sarbhog</option><option>Sarthebari</option><option>Sarupathar</option><option>Sarupathar Bengali</option><option>Senchoa Gaon</option><option>Sibsagar</option><option>Silapathar</option><option>Silchar</option><option>Silchar Part</option><option>Sonari</option><option>Sualkuchi</option><option>Tangla</option><option>Tezpur</option><option>Tihu</option><option>Tinsukia</option><option>Titabor Town</option><option>Udalguri</option><option>Umrangso</option><option>Uttar Krishnapur</option>");
}

else if (val == "Bihar")
{
	 $("#city").html("<option>Amarpur - Banka</option><option>Araria</option><option>Areraj</option><option>Arrah</option><option>Asarganj</option><option>Aurangabad</option><option>Bagaha</option><option>Bahadurganj - Kishanganj</option><option>Bairgania</option><option>Banka</option><option>Banmankhi Bazar</option><option>Barahiya</option><option>Barauli</option><option>Barauni IOC Township</option><option>Barbigha</option><option>Begusarai</option><option>Behea</option><option>Belsand</option><option>Bettiah</option><option>Bhabua</option><option>Bhagalpur</option><option>Bihar</option><option>Bikramganj</option><option>Birpur</option><option>Bodh Gaya</option><option>Buxar</option><option>Chakia - Purba Champaran</option><option>Chanpatia</option><option>Chapra</option><option>Colgong</option><option>Dalsinghsarai</option><option>Darbhanga</option><option>Daudnagar</option><option>Dehri</option><option>Dhaka</option><option>Dighwara</option><option>Dumra</option><option>Dumraon</option><option>Forbesganj</option><option>Gaya</option><option>Ghoghardiha</option><option>Gogri Jamalpur</option><option>Gopalganj</option><option>Habibpur</option><option>Hajipur - Vaishali</option><option>Hilsa</option><option>Hisua</option><option>Islampur - Nalanda</option><option>Jagdishpur</option><option>Jainagar</option><option>Jamalpur</option><option>Jamhaur</option><option>Jamui</option><option>Janakpur Road</option><option>Jehanabad</option><option>Jhajha</option><option>Jhanjharpur</option><option>Jogbani</option><option>Kanti</option><option>Kasba - Purnia</option><option>Kataiya</option><option>Katihar</option><option>Khagaria</option><option>Kharagpur - Munger</option><option>Kishanganj</option><option>Koath</option><option>Koilwar</option><option>Lakhisarai</option><option>Lalganj - Vaishali</option><option>Lauthaha</option><option>Madhepura</option><option>Madhubani</option><option>Maharajganj</option><option>Mahnar Bazar</option><option>Mairwa</option><option>Makhdumpur</option><option>Manihari</option><option>Marhaura</option><option>Mirganj - Gopalganj</option><option>Mohiuddinagar</option><option>Motihari</option><option>Motipur</option><option>Munger</option><option>Murliganj</option><option>Muzaffarpur</option><option>Nabinagar</option><option>Narkatiaganj</option><option>Naugachhia</option><option>Nawada</option><option>Nirmali</option><option>Nokha - Rohtas</option><option>Paharpur</option><option>Patna</option><option>Piro</option><option>Purnia</option><option>Rafiganj</option><option>Raghunathpur - Katihar</option><option>Rajgir</option><option>Ramnagar - Pashchim Champaran</option><option>Raxaul Bazar</option><option>Revelganj</option><option>Rosera</option><option>Saharsa</option><option>Samastipur</option><option>Sasaram</option><option>Shahpur - Bhojpur</option><option>Sheikhpura</option><option>Sheohar</option><option>Sherghati</option><option>Silao</option><option>Sitamarhi</option><option>Siwan</option><option>Sonepur</option><option>Sugauli</option><option>Sultanganj</option><option>Supaul</option><option>Tekari</option><option>Thakurganj</option><option>Warisaliganj</option>");
}

else if (val == "Chandigarh")
{
	 $("#city").html("<option>Chandigarh</option>");
}

else if (val == "Chhattisgarh")
{
	 $("#city").html("<option>Ahiwara</option><option>Akaltara</option><option>Ambagarh Chowki</option><option>Ambikapur - Surguja</option><option>Bade Bacheli</option><option>Bagbahara</option><option>Baikunthpur - Koriya</option><option>Balod</option><option>Baloda</option><option>Basna</option><option>Bemetra</option><option>Bhilai Charoda</option><option>Bhilai Nagar</option><option>Bilaspur</option><option>Bilha</option><option>Bodri</option><option>Champa</option><option>Chharchha</option><option>Chhuikhadan</option><option>Chirmiri</option><option>Dalli-Rajhara</option><option>Dantewada</option><option>Deori - Bilaspur</option><option>Dhamdha</option><option>Dhamtari</option><option>Dharamjaigarh</option><option>Dipka</option><option>Dongargaon</option><option>Dongragarh</option><option>Durg</option><option>Frezarpur</option><option>Gandai</option><option>Gaurella</option><option>Geedam</option><option>Gharghoda</option><option>Hatkachora</option><option>Jagdalpur</option><option>Jamul</option><option>Jashpur nagar</option><option>Jhagrakhand</option><option>Kanker</option><option>Katghora</option><option>Kawardha</option><option>Khairagarh</option><option>Khamhria</option><option>Kharod</option><option>Kharsia</option><option>Khongapani</option><option>Kirandul</option><option>Kondagaon</option><option>Korba</option><option>Kota - Bilaspur</option><option>Kumhari</option><option>Kurud</option><option>Lingiyadih</option><option>Lormi</option><option>Mahasamund</option><option>Manendragarh</option><option>Mehmand</option><option>Mungeli</option><option>Naila Janjgir</option><option>Namna Kalan</option><option>Naya Baradwar</option><option>Pandariya</option><option>Patan - Durg</option><option>Pathalgaon</option><option>Pendra</option><option>Phunderdihari</option><option>Pithora</option><option>Raigarh</option><option>Raipur</option><option>Rajgamar</option><option>Rajnandgaon</option><option>Ramanujganj</option><option>Ratanpur</option><option>Sakti</option><option>Saraipali</option><option>Sarangarh</option><option>Shivrinarayan</option><option>Sirgiti</option><option>Surajpur</option><option>Takhatpur</option><option>Telgaon</option><option>Vishrampur</option>");
}

else if (val == "Dadra & Nagar Haveli")
{
	 $("#city").html("<option>Amli</option><option>Naroli</option><option>Silvassa</option>");
}

else if (val == "Daman & Diu")
{
	 $("#city").html("<option>Daman</option><option>Diu</option><option>Moti Daman</option>");
}

else if (val == "Delhi")
{
	 $("#city").html("<option>Bhiwadi</option><option>Delhi</option><option>Delhi Janakpuri</option><option>Delhi Mathura Road</option><option>Dwarka</option><option>Ghaziabad</option>");
}

else if (val == "Goa")
{
	 $("#city").html("<option>Air Port Dabolim</option><option>Aldona</option><option>Altoporiorim Alto Beetim</option><option>Anjuna</option><option>Aquem</option><option>Arambol</option><option>Arpora</option><option>Assoaera</option><option>Assolna</option><option>Bambolim</option><option>Bambolim Complex</option><option>Bandora</option><option>Benaliom</option><option>Benaulim</option><option>Betim</option><option>Betul - Goa</option><option>Bicholim</option><option>Bicholum Industrial Estate</option><option>Bogmalo</option><option>Calangute</option><option>Calapor</option><option>Canacona</option><option>Cancona</option><option>Candolim</option><option>Cansalim</option><option>Carapur</option><option>Carmana</option><option>Carona</option><option>Caudolim</option><option>Chandor</option><option>Chicalim</option><option>Chikhli (Goa)</option><option>Chimbel</option><option>Chinchinim</option><option>Choaro</option><option>Collem</option><option>Colva</option><option>Colvade</option><option>Colvale</option><option>Concolim</option><option>Corcalim</option><option>Cotlin Industrial Estate</option><option>Cuchoram</option><option>Cuncolim</option><option>Curchorem Cacora</option><option>Curti</option><option>Curtorim</option><option>Davorlim</option><option>Dramapur</option><option>Fatorda</option><option>Goa</option><option>Goa Valha</option><option>Guirim</option><option>Loliem</option><option>Loutulim</option><option>Majorda</option><option>Mandrel</option><option>Mapusa</option><option>Marcela</option><option>Mardol</option><option>Margao</option><option>Mormugao</option><option>Naval Base Verem</option><option>Navelim</option><option>Neura</option><option>Nuvem</option><option>Orlim Goa</option><option>Pale</option><option>Panaji</option><option>Parcem</option><option>Parra</option><option>Parvarim</option><option>Penha-de-Franca</option><option>Pernem</option><option>Piedade</option><option>Ponda</option><option>Quepem</option><option>Queula</option><option>Raia</option><option>Reis Magos</option><option>Sada</option><option>Saligao</option><option>Sana Lawrence</option><option>Sancoale</option><option>Sanquelim</option><option>Santa Estevam (St. Estevam)</option><option>Sanvoedem</option><option>Sao Jose-de-Areal</option><option>Semrachol</option><option>Sinquerim</option><option>Siolim</option><option>Siradae</option><option>Siroda</option><option>Socorro (Serula)</option><option>St. Joseda Azeal</option><option>Tirim Industrial Estate</option><option>Tisea</option><option>Tivim</option><option>Usgaon</option><option>Valpai</option><option>Varca</option><option>Vasco-da-Gama</option><option>Velhegave (Valhegao)</option><option>Velim</option><option>Verna</option>");
}

else if (val == "Gujarat")
{
	 $("#city").html("<option>Aadityana</option><option>Aambaliyasan</option><option>Aantaliya</option><option>Aarambhada</option><option>Abrama</option><option>Ahmedabad</option><option>Alang</option><option>Ambaji</option><option>Amreli</option><option>Anand</option><option>Andada</option><option>Anjar</option><option>Anklav</option><option>Anklesvar</option><option>Atul</option><option>Bagasara</option><option>Bajva</option><option>Balasinor</option><option>Bantwa</option><option>Bardoli</option><option>Bavla</option><option>Bedi</option><option>Bhachau</option><option>Bhanvad</option><option>Bharuch</option><option>Bhavnagar</option><option>Bhayavadar</option><option>Bhuj</option><option>Bilimora</option><option>Bodeli</option><option>Bopal</option><option>Boriavi</option><option>Borsad</option><option>Botad</option><option>Chaklasi</option><option>Chala - Valsad</option><option>Chalala</option><option>Chalthan</option><option>Chanasma</option><option>Chandlodiya</option><option>Chanod</option><option>Chhaprabhatha</option><option>Chhaya</option><option>Chhota Udaipur</option><option>Chikhli - Navsari</option><option>Chorvad</option><option>Dabhoi</option><option>Dakor</option><option>Damnagar</option><option>Deesa</option><option>Devgadbaria</option><option>Devsar</option><option>Dhandhuka</option><option>Dhanera</option><option>Dharampur</option><option>Dhola</option><option>Dholka</option><option>Dhoraji</option><option>Dhrangadhra</option><option>Dhrol</option><option>Digvijaygram</option><option>Dohad</option><option>Dungra</option><option>Dwarka</option><option>Freelandgunj</option><option>Gadhada</option><option>Gandevi</option><option>Gandhidham</option><option>Gandhinagar</option><option>Gariadhar</option><option>Ghatlodiya</option><option>Ghogha</option><option>Godhra</option><option>Gondal</option><option>Gota</option><option>Hajira</option><option>Halol</option><option>Halvad</option><option>Harij</option><option>Himatnagar</option><option>Ichchhapor</option><option>Idar</option><option>Jafrabad</option><option>Jalalpore</option><option>Jam Jodhpur</option><option>Jambusar</option><option>Jamnagar</option><option>Jasdan</option><option>Jawaharnagar (Gujarat Refinery)</option><option>Jetpur Navagadh</option><option>Jodhpur - Ahmedabad</option><option>Joshipura</option><option>Junagadh</option><option>Kadi</option><option>Kadodara</option><option>Kalavad</option><option>Kali</option><option>Kalol</option><option>Kandla</option><option>Kanodar</option><option>Kapadvanj</option><option>Karachiya</option><option>Karamsad</option><option>Karjan</option><option>Katpar</option><option>Keshod</option><option>Kevadiya</option><option>Khambhalia</option><option>Khambhat</option><option>Kharaghoda</option><option>Kheda</option><option>Khedbrahma</option><option>Kheralu</option><option>Kodinar</option><option>Kosamba</option><option>Kutiyana</option><option>Lambha</option><option>Lathi</option><option>Limbdi</option><option>Limla</option><option>Lunawada</option><option>Mahemdavad</option><option>Mahesana</option><option>Mahudha</option><option>Mahuva</option><option>Mahuvar</option><option>Makarba</option><option>Maktampur</option><option>Malpur</option><option>Manavadar</option><option>Mandvi</option><option>Mangrol - Junagadh</option><option>Meghraj</option><option>Memnagar</option><option>Mithapur</option><option>Modasa</option><option>Mogravadi</option><option>Morvi</option><option>Mundra</option><option>Nadiad</option><option>Nanakvada</option><option>Nandej</option><option>Nandesari</option><option>NavagamGhed</option><option>Navsari</option><option>Ode</option><option>Okha port</option><option>Paddhari</option><option>Padra</option><option>Palanpur</option><option>Palej</option><option>Palitana</option><option>Pardi</option><option>Parnera</option><option>Parvat</option><option>Patan</option><option>Petlad</option><option>Porbandar</option><option>Prantij</option><option>Radhanpur</option><option>Rajkot</option><option>Rajpipla</option><option>Rajula</option><option>Ramol</option><option>Ranavav</option><option>Ranip</option><option>Ranoli</option><option>Rapar</option><option>Sachin</option><option>Salaya</option><option>Sanand</option><option>Santrampur</option><option>Sarigam</option><option>Sarkhej-Okaf</option><option>Savarkundla</option><option>Sayan</option><option>Sidhpur</option><option>Sihor</option><option>Sikka</option><option>Singarva</option><option>Songadh</option><option>Surajkaradi</option><option>Surat</option><option>Surendranagar Dudhrej</option><option>Talaja</option><option>Talod</option><option>Tarsali</option><option>Thaltej</option><option>Thangadh</option><option>Tharad</option><option>The Dangs</option><option>Ukai</option><option>Umbergaon</option><option>Umreth</option><option>Un - Surat</option><option>Una - Junagadh</option><option>Unjha</option><option>Upleta</option><option>Utran</option><option >Vadia</option><option>Vadnagar</option><option>Vadodara</option><option>Vaghodia</option><option>Vallabh Vidhyanagar</option><option>Valsad</option><option>Vanthali</option><option>Vapi</option><option>Vartej</option><option>Vasna Borsad</option><option>Vastral</option><option>Vastrapur</option><option>Vejalpur</option><option>Veraval</option><option>Vijalpor</option><option>Viramgam</option><option>Visavadar</option><option>Visnagar</option><option>Vitthal Udyognagar</option><option>Vyara</option><option>Wadhwan</option><option>Wankaner</option><option>Zalod</option>");
}

else if (val == "Haryana")
{
	 $("#city").html("<option>Ambala</option><option>Ambala Cantt.</option><option>Ambala Sadar</option><option>Asan Khurd</option><option>Assandh</option><option>Ateli</option><option>Babiyal</option><option>Bahadurgarh</option><option>Barwala</option><option>Bawal</option><option>Bawani Khera</option><option>Beri</option><option>Bhiwani</option><option>Bilaspur - Yamunanagar</option><option>Buria</option><option>Charkhi Dadri</option><option>Cheeka</option><option>Chhachhrauli</option><option>Dharuhera</option><option>Dundahera</option><option>Ellenabad</option><option>Farakhpur</option><option>Faridabad</option><option>Farrukhnagar</option><option>Fatehabad</option><option>Ferozepur Jhirka</option><option>Ganaur</option><option>Gharaunda</option><option>Gohana</option><option>Gurgaon</option><option>Gurgaon Rural</option><option>Haileymandi</option><option>Hansi</option><option>Hassanpur</option><option>Hathin</option><option>Hisar</option><option>Hodal</option><option>Indri</option><option>Jagadhri</option><option>Jakhal Mandi</option><option>Jhajjar</option><option>Jind</option><option>Julana</option><option>Kaithal</option><option>Kalan Wali</option><option>Kalanaur - Rohtak</option><option>Kalayat</option><option>Kalka</option><option>Kanina</option><option>Kansepur</option><option>Kardhan</option><option>Karnal</option><option>Kharkhoda - Sonipat</option><option>Kurukshetra</option><option>Ladrawan</option><option>Ladwa</option><option>Loharu</option><option>Maham</option><option>Mahendragarh</option><option>Mandi Dabwali</option><option>Mustafabad</option><option>Nagai Chaudhry</option><option>Naraingarh</option><option>Narnaul</option><option>Narnaund</option><option>Narwana</option><option>Nilokheri</option><option>Nuh</option><option>Palwal</option><option>Panchkula</option><option>Panchkula Urban Estate</option><option>Panipat</option><option>Panipat Taraf Ansar</option><option>Panipat Taraf Rajputan</option><option>Panipt Taraf Makhdum Zadgan</option><option>Pataudi</option><option>Pehowa</option><option>Pinjore</option><option>Punahana</option><option>Pundri</option><option>Radaur</option><option>Raipur Rani</option><option>Rania</option><option>Ratia</option><option>Rewari</option><option>Rewari (Rural)</option><option>Rohtak</option><option>Sadaura</option><option>Safidon</option><option>Samalkha</option><option>Sankhol</option><option>Sasauli</option><option>Shahbad</option><option>Sirsa</option><option>Siwani</option><option>Sohna</option><option>Sonipat</option><option>Sukhrali</option><option>Taoru</option><option>Taraori</option><option>Thanesar</option><option>Tilpat</option><option>Tohana</option><option>Tosham</option><option>Uchana</option><option>Uklanamandi</option><option>Uncha Siwana</option><option>Yamunanagar</option>");
}

else if (val == "Himachal Pradesh")
{
	 $("#city").html("<option>Arki</option><option>Baddi</option><option>Bakloh</option><option>Banjar</option><option>Bhota</option><option>Bhuntar</option><option>Bilaspur</option><option>Chamba</option><option>Chuari Khas</option><option>Dagshai</option><option>Dalhousie</option><option>Daulatpur - Una</option><option>Dera Gopipur</option><option>Dharmsala</option><option>Gagret</option><option>Ghumarwin</option><option>Hamirpur</option><option>Jawalamukhi</option><option>Jogindarnagar</option><option>Kalpa</option><option>Kangra</option><option>Kasauli</option><option>Kaza</option><option>Keylong</option><option>Kullu</option><option>Manali - Kullu</option><option>Mandi</option><option>Mant Khas</option><option>Mehatpur Basdehra</option><option>Nadaun</option><option>Nagrota Bagwan</option><option>Nahan</option><option>Naina Devi</option><option>Nalagarh</option><option>Nichar</option><option>Nurpur</option><option>Palampur</option><option>Paonta Sahib</option><option>Parwanoo</option><option>Pooh</option><option>Rajgarh - Sirmaur</option><option>Rawalsar</option><option>Sabathu</option><option>Santokhgarh</option><option>Sarkaghat</option><option>Shimla</option><option>Solan</option><option>Sundarnagar</option><option>Talai</option><option>Tira Sujanpur</option><option>Udaipur - Lahaul &amp; Spiti</option><option>Una</option><option>Yol</option>");
}

else if (val == "Jammu & Kashmir")
{
	 $("#city").html("<option>Achabal</option><option>Anantnag</option><option>Awantipora</option><option>Badgam</option><option>Bandipore</option><option>Banihal</option><option>Baramula</option><option>Bashohli</option><option>Batote</option><option>Beerwah</option><option>Bhaderwah</option><option>Bijbehara</option><option>Billawar</option><option>Charari Sharief</option><option>Chenani</option><option>Doda</option><option>Duru-Verinag</option><option>Gulmarg</option><option>Hajan</option><option>Handwara</option><option>Hiranagar</option><option>Jammu</option><option>Kargil</option><option>Kathua</option><option>Katra - Udhampur</option><option>Khan Sahib</option><option>Khrew</option><option>Kishtwar</option><option>Kud</option><option>Kukernag</option><option>Kulgam</option><option>Kunzer</option><option>Kupwara</option><option>Lakhenpur</option><option>Leh</option><option>Magam</option><option>Mattan</option><option>Nowshehra</option><option>Pahalgam</option><option>Pampore</option><option>Parole</option><option>Pattan</option><option>Pulwama</option><option>Punch</option><option>Qazigund</option><option>Rajauri</option><option>Ramban</option><option>Ramnagar - Udhampur</option><option>Reasi</option><option>Rehambal</option><option>Shupiyan</option><option>Sopore</option><option>Srinagar</option><option>Sumbal</option><option>Sunderbani</option><option>Talwara - Udhampur</option><option>Thanamandi</option><option>Tral</option><option>Udhampur</option><option>Uri</option>");
}

else if (val == "Jharkhand")
{
	 $("#city").html("<option>Adityapur</option><option>Amlabad</option><option>Angarpathar</option><option>Ara</option><option>Babua Kalan</option><option>Bagbera</option><option>Baliari</option><option>Balkundra</option><option>Bandhgora</option><option>Barajamda</option><option>Barhi - Hazaribag</option><option>Barkakana</option><option>Barughutu</option><option>Barwadih</option><option>Basaria</option><option>Basia</option><option>Basukinath</option><option>Bermo</option><option>Bhagatdih</option><option>Bherno</option><option>Bhojudih</option><option>Bhowrah</option><option>Bhuli</option><option>Bishunpur</option><option>Bokaro</option><option>Bokaro Steel City</option><option>Chaibasa</option><option>Chainpur</option><option>Chakradharpur</option><option>Chakulia</option><option>Chandaur</option><option>Chandil</option><option>Chandrapura</option><option>Chas</option><option>Chatra</option><option>Chhatatanr</option><option>Chhota Gobindpur</option><option>Chhotaputki</option><option>Chiria</option><option>Chirkunda</option><option>Daltonganj</option><option>Danguwapasi</option><option>Dari</option><option>Deoghar</option><option>Deorikalan</option><option>Dhanbad</option><option>Dhanwar</option><option>Dhaunsar</option><option>Dugda</option><option>Dumarkunda</option><option>Dumka</option><option>Dumri</option><option>Egarkunr</option><option>Gadhra</option><option>Gamharia</option><option>Garhwa</option><option>Ghaghra</option><option>Ghatshila</option><option>Ghorabandha</option><option>Gidi</option><option>Giridih</option><option>Gobindpur</option><option>Godda</option><option>Godhar</option><option>Gomoh</option><option>Gua</option><option>Gumia</option><option>Gumla</option><option>Haludbani</option><option>Hazaribag</option><option>Hesla</option><option>Hussainabad</option><option>Ichagarh</option><option>Isri</option><option>Jadugora</option><option>Jamadoba</option><option>Jamshedpur</option><option>Jamtara</option><option>Jaridih Bazar</option><option>Jasidih</option><option>Jena</option><option>Jharia</option><option>Jharia Khas</option><option>Jhinkpani</option><option>Jhumri Tilaiya</option><option>Jorapokhar</option><option>Jugsalai</option><option>Kailudih</option><option>Kalikapur</option><option>Kandra</option><option>Katras</option><option>Kedla</option><option>Kenduadih</option><option>Kharkhari</option><option>Kharsawan</option><option>Kimdara</option><option>Kiriburu</option><option>Kodarma</option><option>Kuchai</option><option>Kuju</option><option>Kurpania</option><option>Kustai</option><option>Lakarka</option><option>Lapanga</option><option>Latehar</option><option>Lohardaga</option><option>Loyabad</option><option>Madhupur</option><option>Maithon</option><option>Malkera</option><option>Mango</option><option>Marma</option><option>Meghahatuburu Forest village</option><option>Mera</option><option>Meru</option><option>Mihijam</option><option>Mugma</option><option>Musabani</option><option>Nagri Kalan</option><option>Nimdih</option><option>Nirsa</option><option>Noamundi</option><option>Okni NO.II</option><option>Orla</option><option>Pakaur</option><option>Palawa</option><option>Palkot</option><option>Panchet</option><option>Paratdih</option><option>Pathardih</option><option>Patratu</option><option>Phusro</option><option>Pondar Kanali</option><option>Raidih</option><option>Rajmahal</option><option>Rajnagar - Seraikela</option><option>Ramgarh Cantonment</option><option>Ranchi</option><option>Religara alias Pachhiari</option><option>Rohraband</option><option>Sahibganj</option><option>Sahnidih</option><option>Saraidhela</option><option>Sarjamda</option><option>Saunda</option><option>Seraikela</option><option>Sewai</option><option>Sijhua</option><option>Sijua</option><option>Simdega</option><option>Sindri</option><option>Sinduria</option><option>Sini</option><option>Sirka</option><option>Sisai</option><option>Siuliban</option><option>Tenu Dam-cum- Kathhara</option><option>Tisra</option><option>Topa</option><option>Topchanchi</option>");
}

else if (val == "Karnataka")
{
	 $("#city").html("<option>Bangalore</option><option>Belgaum</option><option>Davanagere</option><option>Hosur</option><option>Hubli</option><option>Mangalore</option><option>Mysore</option><option>Adityapatna</option><option>Adyar</option><option>Afzalpur</option><option>Aland</option><option>Alnavar</option><option>Alur - Hassan</option><option>Ambikanagara</option><option>Ankola</option><option>Annigeri</option><option>Arkalgud</option><option>Arsikere</option><option>Athni</option><option>Aurad</option><option>Badami</option><option>Bagalkot</option><option>Bagepalli</option><option>Bail Hongal</option><option>Bajala</option><option>Bajpe</option><option>Bangarapet</option><option>Bankapura</option><option>Bannur</option><option>Bantwal</option><option>Basavakalyan</option><option>Basavana Bagevadi</option><option>Belgaum Cantonment</option><option>Bellary</option><option>Beltangadi</option><option>Belur - Hassan</option><option>Belvata</option><option>Bhadravati - Shimoga</option><option>Bhalki</option><option>Bhatkal</option><option>Bhimarayanagudi</option><option>Bhogadi</option><option>Bidar</option><option>Bijapur</option><option>Bilgi</option><option>Birur</option><option>Byadgi</option><option>Challakere</option><option>Chamrajnagar</option><option>Channagiri</option><option>Channarayapattana</option><option>Chickmagalur</option><option>Chik Ballapur</option><option>Chiknayakanhalli</option><option>Chikodi</option><option>Chincholi</option><option>Chintamani</option><option>Chitapur</option><option>Chitgoppa</option><option>Chitradurga</option><option>Dandeli</option><option>Devadurga</option><option>Donimalai Township</option><option>Gadag-Betigeri</option><option>Gajendragarh</option><option>Gangawati</option><option>Gauribidanur</option><option>Gokak</option><option>Gokak Falls</option><option>Gonikoppal</option><option>Gubbi</option><option>Gudibanda</option><option>Gulbarga</option><option>Guledgudda</option><option>Gundlupet</option><option>Gurmatkal</option><option>Haliyal</option><option>Hangal</option><option>Harihar</option><option>Harpanahalli</option><option>Hassan</option><option>Hatti</option><option>Hatti Gold Mines</option><option>Haveri</option><option>Hebbalu</option><option>Heggadadevanakote</option><option>Hindalgi</option><option>Hirekerur</option><option>Hiriyur</option><option>Holalkere</option><option>Holenarsipur</option><option>Homnabad</option><option>Honavar</option><option>Honnali</option><option>Hoovina Hadagalli</option><option>Hosanagara</option><option>Hosdurga</option><option>Hospet</option><option>Hubli-Dharwad</option><option>Hukeri</option><option>Hungund</option><option>Hunsur</option><option>Ilkal</option><option>Indi</option><option>Jagalur</option><option>Jamkhandi</option><option>Jevargi</option><option>Jog Falls</option><option>Kadur</option><option>Kalghatgi</option><option>Kamalapuram</option><option>Kampli</option><option>Kangrali (BK)</option><option>Kangrali (KH)</option><option>Kannur - Dakshin Kannada</option><option>Karkal</option><option>Karwar</option><option>Kerur</option><option>Khanapur</option><option>Kodiyal</option><option>Kolar</option><option>Kollegal</option><option>Konnur</option><option>Koppa</option><option>Koppal</option><option>Koratagere</option><option>Kotekara</option><option>Kotturu</option><option>Krishnarajanagar</option><option>Krishnarajasagara</option><option>Krishnarajpet</option><option>Kudchi</option><option>Kudligi</option><option>Kudremukh</option><option>Kumta</option><option>Kundapura</option><option>Kundgol</option><option>Kunigal</option><option>Kurgunta</option><option>Kushalnagar</option><option>Kushtagi</option><option>Lakshmeshwar</option><option>Lingsugur</option><option>Londa</option><option>Maddur</option><option>Madhugiri</option><option>Madikeri</option><option>Mahalingpur</option><option>Malavalli</option><option>Mallar</option><option>Malur</option><option>Mandya</option><option>Manvi</option><option>Molakalmuru</option><option>Mudalgi</option><option>Mudbidri</option><option>Muddebihal</option><option>Mudgal</option><option>Mudhol</option><option>Mudigere</option><option>Mudushedde</option><option>Mulbagal</option><option>Mulgund</option><option>Mulki</option><option>Mulur</option><option>Mundargi</option><option>Mundgod</option><option>Munirabad Project Area</option><option>Munnur</option><option>Nagamangala</option><option>Nanjangud</option><option>Narasimharajapura</option><option>Naregal</option><option>Nargund</option><option>Navalgund</option><option>Nipani</option><option>Pandavapura</option><option>Pavagada</option><option>Piriyapatna</option><option>Pudu</option><option>Puttur - Dakshin Kannada</option><option>Rabkavi Banhatti</option><option>Raichur</option><option>Ramdurg</option><option>Ramnagaram</option><option>Ranibennur</option><option>Raybag</option><option>Robertson Pet</option><option>Ron</option><option>Sadalgi</option><option>Sagar - Shimoga</option><option>Sakleshpur</option><option>Saligram</option><option>Sandur</option><option>Sankeshwar</option><option>Sathyamangala</option><option>Saundatti-Yellamma</option><option>Savanur</option><option>Sedam</option><option>Shahabad - Gulbarga</option><option>Shahabad ACC</option><option>Shahpur - Gulbarga</option><option>Shaktinagar</option><option>Shiggaon</option><option>Shikarpur - Shimoga</option><option>Shimoga</option><option>Shirhatti</option><option>Shorapur</option><option>Shrirangapattana</option><option>Siddapur</option><option>Sidlaghatta</option><option>Sindgi</option><option>Sindhnur</option><option>Sira</option><option>Siralkoppa</option><option>Sirsi - Uttar Kannada</option><option>Siruguppa</option><option>Someshwar</option><option>Somvarpet</option><option>Sorab</option><option>Sringeri</option><option>Srinivaspur</option><option>Sulya</option><option>Talikota</option><option>Tarikere</option><option>Tekkalakota</option><option>Terdal</option><option>Thokur-62</option><option>Thumbe</option><option>Tiptur</option><option>Tirthahalli</option><option>Tirumakudal-Narsipur</option><option>Tumkur</option><option>Turuvekere</option><option>Udupi</option><option>Ullal</option><option>Venkatapura</option><option>Virajpet</option><option>Wadi - Gulbarga</option><option>Wadi ACC</option><option>Yadgir</option><option>Yelandur</option><option>Yelbarga</option><option>Yellapur</option><option>Yenagudde</option>");
}

else if (val == "Kerala")
{
	 $("#city").html("<option>Adoor</option><option>Alappuzha</option><option>Aluva</option><option>Angamaly</option><option>Anthoor</option><option>Attingal</option><option>Chalakkudy</option><option>Changanacherry</option><option>Chavakkad</option><option>Chengannur</option><option>Cherpulassery</option><option>Cherthala</option><option>Chittur-Tattamangalam</option><option>Eloor</option><option>Erattupetta</option><option>Ettumanoor</option><option>Feroke</option><option>Guruvayoor</option><option>Haripad</option><option>Irinjalakuda</option><option>Iritty</option><option>Kalamassery</option><option>Kalpetta</option><option>Kanhangad</option><option>Kannur</option><option>Karunagapally</option><option>Kasaragod</option><option>Kattappana</option><option>Kayamkulam</option><option>Kochi</option><option>Kodungallur</option><option>Koduvally</option><option>Kollam</option><option>Kondotty</option><option>Koothattukulam</option><option>Koothuparamba</option><option>Kothamangalam</option><option>Kottakkal</option><option>Kottarakkara</option><option>Kottayam</option><option>Koyilandy</option><option>Kozhikode</option><option>Kunnamkulam</option><option>Malappuram</option><option>Mananthavadi</option><option>Manjeri</option><option>Mannarkkad</option><option>Maradu</option><option>Mattannur</option><option>Mavelikkara</option><option>Mukkam</option><option>Muvattupuzha</option><option>Nedumangad</option><option>Neyyattinkara</option><option>Nilambur</option><option>Nileshwaram</option><option>North Paravoor</option><option>Ottappalam</option><option>Palai</option><option>Palakkad</option><option>Pandalam</option><option>Panoor</option><option>Parappanangadi</option><option>Paravur</option><option>Pathanamthitta</option><option>Pattambi</option><option>Payyannur</option><option>Payyoli</option><option>Perinthalmanna</option><option>Perumbavoor</option><option>Piravom</option><option>Ponnani</option><option>Punalur</option><option>Ramanattukara</option><option>Shornur</option><option>Sreekandapuram</option><option>Sultan Bathery</option><option>Tanur</option><option>Thalassery</option><option>Thaliparamba</option><option>Thodupuzha</option><option>Thrikkakara</option><option>Thripunithura</option><option>Thrissur</option><option>Tirur</option><option>Tirurangadi</option><option>Tiruvalla</option><option>Trivandrum</option><option>Vadakara</option><option>Vaikom</option><option>Valanchery</option><option>Varkala</option><option>Wadakkancheri</option>");
}

else if (val == "Lakshadweep")
{
	 $("#city").html("<option>Amini</option><option>Kavaratti</option><option>Minicoy</option>");
}

else if (val == "Madhya Pradesh")
{
	 $("#city").html("<option>Agar</option><option>Ajaigarh</option><option>Akoda</option><option>Akodia</option><option>Alampur</option><option>Alirajpur</option><option>Alot</option><option>Amanganj</option><option>Amarkantak</option><option>Amarpatan</option><option>Amarwara</option><option>Ambada</option><option>Ambah</option><option>Amla</option><option>Amlai</option><option>Anjad</option><option>Antari</option><option>Anuppur</option><option>Aron</option><option>Ashok Nagar</option><option>Ashta - Sehore</option><option>Babai</option><option>Bada Malhera</option><option>Badagaon</option><option>Badagoan</option><option>Badarwas</option><option>Badawada</option><option>Badi</option><option>Badkuhi</option><option>Badnagar</option><option>Badnawar</option><option>Badod</option><option>Badoda</option><option>Badra</option><option>Bagh</option><option>Bagli</option><option>Baihar</option><option>Baikunthpur - Rewa</option><option>Balaghat</option><option>Baldeogarh</option><option>Bamhani</option><option>Bamor</option><option>Bamora</option><option>Banda - Sagar</option><option>Bandhavgarh</option><option>Bangawan</option><option>Bansatar Kheda</option><option>Baraily</option><option>Barela</option><option>Barghat</option><option>Barhi - Katni</option><option>Barigarh</option><option>Barwaha</option><option>Barwani</option><option>Basoda</option><option>Begamganj</option><option>Beohari</option><option>Betma</option><option>Betul</option><option>Bhainsdehi</option><option>Bhamodi</option><option>Bhander</option><option>Bhanpura</option><option>Bharveli</option><option>Bhaurasa</option><option>Bhavra</option><option>Bhedaghat</option><option>Bhikangaon</option><option>Bhilakhedi</option><option>Bhind</option><option>Bhitarwar</option><option>Bhopal</option><option>Biaora</option><option>Bijawar</option><option>Bijeypur</option><option>Bijuri</option><option>Bilaua</option><option>Bilpura</option><option>Bina Etawa</option><option>Bina Rly Colony</option><option>Birsinghpur</option><option>Boda</option><option>Budhni</option><option>Burhanpur</option><option>Burhar</option><option>Buxwaha</option><option>Chachaura-Binaganj</option><option>Chakghat</option><option>Chandameta-Butaria</option><option>Chanderi</option><option>Chandia</option><option>Chandla</option><option>Chaurai Khas</option><option>Chhatarpur</option><option>Chhindwara</option><option>Chhota Chhindwara (Gotegaon)</option><option>Chichli</option><option>Chitrakoot</option><option>Churhat</option><option>Daboh</option><option>Dabra</option><option>Damoh</option><option>Damua</option><option>Datia</option><option>Deodara</option><option>Deori - Sagar</option><option>Deori - Shahdol</option><option>Depalpur</option><option>Devendranagar</option><option>Devhara</option><option>Dewas</option><option>Dhamnod</option><option>Dhana</option><option>Dhanpuri</option><option>Dhar</option><option>Dharampuri</option><option>Dighawani</option><option>Diken</option><option>Dindori</option><option>Dola</option><option>Dongar Parasia</option><option>Dumar Kachhar</option><option>G.C.F Jabalpur</option><option>Gadarwara</option><option>Gairatganj</option><option>Garhakota</option><option>Garhi-Malhara</option><option>Garoth</option><option>Ghansor</option><option>Ghuwara</option><option>Gogapur</option><option>Gohad</option><option>Gormi</option><option>Govindgarh - Rewa</option><option>Guna</option><option>Gurh</option><option>Gwalior</option><option>Hanumana</option><option>Harda</option><option>Harpalpur</option><option>Harrai</option><option>Harsud</option><option>Hatod</option><option>Hatpipalya</option><option>Hatta</option><option>Hindoria</option><option>Hirapur</option><option>Hoshangabad</option><option>Ichhawar</option><option>Iklehra</option><option>Indergarh</option><option>Indore</option><option>Indore Suburb</option><option>Isagarh</option><option>Itarsi</option><option>Jabalpur</option><option>Jabalpur Cantt.</option><option>Jaisinghnagar</option><option>Jaithari</option><option>Jaitwara</option><option>Jamai</option><option>Jaora</option><option>Jata Chhapar</option><option>Jatara</option><option>Jawad</option><option>Jawar</option><option>Jeron Khalsa</option><option>Jhabua</option><option>Jhundpura</option><option>Jiran</option><option>Jirapur</option><option>Jobat</option><option>Joura</option><option>Kailaras</option><option>Kakarhati</option><option>Kali Chhapar</option><option>Kanad</option><option>Kannod</option><option>Kantaphod</option><option>Kareli</option><option>Karera</option><option>Kari</option><option>Karnawad</option><option>Karrapur</option><option>Kasrawad</option><option>Katangi - Balaghat</option><option>Katangi - Jabalpur</option><option>Kelhauri(chachai)</option><option>Khachrod</option><option>Khajuraho</option><option>Khaknar</option><option>Khand(Bansagar)</option><option>Khandwa</option><option>Khaniyadhana</option><option>Khargapur</option><option>Khargone</option><option>Khategaon</option><option>Khetia</option><option>Khilchipur</option><option>Khirkiya</option><option>Khujner</option><option>Khurai</option><option>Kolaras</option><option>Kotar</option><option>Kothi</option><option>Kotma</option><option>Kukshi</option><option>Kumbhraj</option><option>Kurwai</option><option>Kymore</option><option>Lahar</option><option>Lakhnadon</option><option>Lateri</option><option>Laundi</option><option>Lidhorakhas</option><option>Lodhikheda</option><option>Loharda</option><option>Machalpur</option><option>Maharajpur</option><option>Maheshwar</option><option>Mahidpur</option><option>Maihar</option><option>Majholi</option><option>Makronia</option><option>Maksi</option><option>Malaj Khand</option><option>Malhargarh</option><option>Manasa</option><option>Manawar</option><option>Mandav</option><option>Mandideep</option><option>Mandla</option><option>Mandleshwar</option><option>Mandsaur</option><option>Manegaon</option><option>Mangawan</option><option>Manglaya Sadak</option><option>Manpur</option><option>Mau</option><option>Mauganj</option><option>Meghnagar</option><option>Mehara Gaon</option><option>Mehgaon</option><option>Mhow Cantt.</option><option>Mhowgaon</option><option>Mihona</option><option>Mohgaon</option><option>Morar Cantt.</option><option>Morena</option><option>Multai</option><option>Mundi</option><option>Mungaoli</option><option>Murwara (Katni)</option><option>Nagda</option><option>Nagod</option><option>Nagri</option><option>Nai Garhi</option><option>Nainpur</option><option>Nalkheda</option><option>Namli</option><option>Narayangarh</option><option>Narsimhapur</option><option>Narsinghgarh</option><option>Narwar</option><option>Nasrullaganj</option><option>Naudhia</option><option>Neemuch</option><option>Nepanagar</option><option>Neuton Chikhli Kalan</option><option>Niwari - Tikamgarh</option><option>Nowgaon</option><option>Nowrozabad(Khodargama)</option><option>O.F.Khamaria</option><option>Obedullaganj</option><option>Omkareshwar</option><option>Orachha</option><option>Ordinance Factory Itarsi</option><option>Pachmarhi Cantt</option><option>Pachore</option><option>Pal Chourai</option><option>Palda</option><option>Palera</option><option>Pali - Umaria</option><option>Panagar</option><option>Panara</option><option>Pandhana</option><option>Pandhurna</option><option>Panna</option><option>Pansemal</option><option>Pasan</option><option>Patan - Jabalpur</option><option>Patharia</option><option>Pawai</option><option>Petlawad</option><option>Phuphkalan</option><option>Pichhore - Gwalior</option><option>Pichhore - Shivpuri</option><option>Pipariya - Hoshangabad</option><option>Pipariya - Jabalpur</option><option>Piploda</option><option>Piplya Mandi</option><option>Pithampur</option><option>Polay Kalan</option><option>Porsa</option><option>Prithvipur</option><option>Pushprajgarh</option><option>Raghogarh -Vijaypur</option><option>Rahatgarh</option><option>Raisen</option><option>Rajakhedi</option><option>Rajgarh - Dhar</option><option>Rajgarh - Rajgarh</option><option>Rajnagar - Chhatarpur</option><option>Rajpur</option><option>Rampur Baghelan</option><option>Rampur Naikin</option><option>Rampura - Neemuch</option><option>Ranapur</option><option>Ratangarh - Neemuch</option><option>Ratlam</option><option>Ratlam Rly. Colony (Ratlam Kasba)</option><option>Rau</option><option>Rehli</option><option>Rehti</option><option>Rewa</option><option>Runji Gautampura</option><option>Sabalgarh</option><option>Sagar - Sagar</option><option>Sagar Cantt.</option><option>Sailana</option><option>Sanawad</option><option>Sanchi</option><option>Sarangpur</option><option>Sardarpur</option><option>Sarni</option><option>Satai</option><option>Satna</option><option>Satwas</option><option>Sausar</option><option>Sawer</option><option>Sehore</option><option>Semaria</option><option>Sendhwa</option><option>Seondha</option><option>Seoni</option><option>Seoni Malwa</option><option>Sethia</option><option>Shahdol</option><option>Shahgarh</option><option>Shahpur - Betul</option><option>Shahpur - Khandwa</option><option>Shahpur - Sagar</option><option>Shahpura - Dindori</option><option>Shahpura - Jabalpur</option><option>Shajapur</option><option>Shamgarh</option><option>Sheopur</option><option>Shivpuri</option><option>Shujalpur</option><option>Sidhi</option><option>Sihora</option><option>Singoli</option><option>Singrauli</option><option>Sinhasa</option><option>Sirgora</option><option>Sirmaur</option><option>Sironj</option><option>Sitamau</option><option>Sohagpur</option><option>Sonkatch</option><option>Soyatkalan</option><option>Suhagi</option><option>Sultanpur - Raisen</option><option>Susner</option><option>Suthaliya</option><option>Tal</option><option>Talen</option><option>Tarana</option><option>Taricharkalan</option><option>Tekanpur</option><option>Tendu Kheda</option><option>Teonthar</option><option>Thandla</option><option>Tikamgarh</option><option>Timarni</option><option>Tirodi</option><option>Udaipura</option><option>Ujjain</option><option>Ukwa</option><option>Umaria</option><option>Unchehara</option><option>Unhel</option><option>Vehicle Fac. Jabalpur</option><option>Vidisha</option><option>Vijayraghavgarh</option><option>Wara Seoni</option>");
}

else if (val == "Manipur")
{
	 $("#city").html("<option>Bishnupur</option><option>Chingai</option><option>Churachandpur</option><option>Henglep</option><option>Heriok</option><option>Imphal</option><option>Kakching</option><option>Kakching Khunou</option><option>Kamjong</option><option>Kangpokpi</option><option>Kasom</option><option>Kumbi</option><option>Kwakta</option><option>Lilong (Thoubal)</option><option>Mao-maram</option><option>Moirang</option><option>Moreh</option><option>Nambol</option><option>Ningthoukhong</option><option>Nungba</option><option>Oinam</option><option>Paomata</option><option>Parbung</option><option>Phunyar</option><option>Purul</option><option>Saikul</option><option>Saitu-gamphazol</option><option>Samurou</option><option>Sikhong Sekmai</option><option>Singngat</option><option>Sugnu</option><option>Tamei</option><option>Tamenglong</option><option>Thanlon</option><option>Thoubal</option><option>Tousem</option><option>Ukhrul</option><option>Wangjing</option><option>Yairipok</option>");
}

else if (val == "Meghalaya")
{
	 $("#city").html("<option>Baghmara</option><option>Cherapunjee</option><option>Jawai</option><option>Madanrting</option><option>Mairang</option><option>Mawlai</option><option>Nongmynsong</option><option>Nongpoh</option><option>Nongstoin</option><option>Nongthymmai</option><option>Pynthorumkhrah</option><option>Resubelpara</option><option>Shillong</option><option>Tura</option><option>Williamnagar</option>");
}

else if (val == "Mizoram")
{
	 $("#city").html("<option>Aizawl</option><option>Bairabi</option><option>Biate</option><option>Champhai</option><option>Chawngte</option><option>Hnahthial</option><option>Khawhai</option><option>Khawzawl</option><option>Kolasib</option><option>Lawngtlai</option><option>Lengpui</option><option>Lunglei</option><option>Mamit</option><option>N. Vanlaiphai</option><option>N.Kawnpui</option><option>Saiha</option><option>Serchhip</option><option>Thenzawl</option><option>Tlabung</option><option>Vairengte</option><option>Zawlnuam</option>");
}

else if (val == "Nagaland")
{
	 $("#city").html("<option>Chumukedima</option><option>Dimapur</option><option>Kohima</option><option>Mokokchung</option><option>Mon</option><option>Phek</option><option>Tuensang</option><option>Wokha</option><option>Zunheboto</option>");
}

else if (val == "Orissa")
{
	 $("#city").html("<option>Anandapur</option><option>Anugul</option><option>Asika</option><option>Athagad</option><option>Athmallik</option><option>Balagoda (Bolani)</option><option>Balangir</option><option>Baleshwar</option><option>Balimela</option><option>Balugaon</option><option>Banapur</option><option>Bangura</option><option>Banki - Cuttack</option><option>Barapali</option><option>Barbil</option><option>Bargarh</option><option>Baripada</option><option>Basudebpur</option><option>Baudhgarh</option><option>Belagachhia</option><option>Bellaguntha</option><option>Belpahar</option><option>Bhadrak</option><option>Bhanjanagar</option><option>Bhawanipatna</option><option>Bhuban</option><option>Bhubaneswar</option><option>Binika</option><option>Biramitrapur</option><option>Bishama Katek</option><option>Brahmapur</option><option>Brajarajnagar</option><option>Buguda</option><option>Burla</option><option>Byasanagar</option><option>Champua</option><option>Chandapur</option><option>Chandili</option><option>Charibatia</option><option>Chhatrapur</option><option>Chikiti</option><option>Choudwar</option><option>Cuttack</option><option>Dadhapatna</option><option>Daitari</option><option>Damanjodi</option><option>Debagarh</option><option>Deracolliery Township</option><option>Dhamanagar</option><option>Dhenkanal</option><option>Digapahandi</option><option>Dungamal</option><option>Fertilzer Corporation of IndiaTownship</option><option>G. Udayagiri</option><option>Ganjam</option><option>Ghantapada</option><option>Gopalpur - Ganjam</option><option>Gudari</option><option>Gunupur</option><option>Hatibandha</option><option>Hinjilicut</option><option>Hirakud</option><option>Jagatsinghapur</option><option>Jajapur</option><option>Jalda</option><option>Jaleswar</option><option>Jatani</option><option>Jeypur</option><option>Jharsuguda</option><option>Jhumpura</option><option>Joda</option><option>Junagarh</option><option>Kamakshyanagar</option><option>Kantabanji</option><option>Kantilo</option><option>Karanjia</option><option>Kashinagara</option><option>Kavisuryanagar</option><option>Kendrapara</option><option>Kendujhar</option><option>Kesinga</option><option>Khaliapali</option><option>Khalikote</option><option>Khandapada</option><option>Khariar</option><option>Khariar Road</option><option>Khatiguda</option><option>Khordha</option><option>Kochinda</option><option>Kodala</option><option>Konark</option><option>Koraput</option><option>Kotpad</option><option>Lattikata</option><option>Makundapur</option><option>Malkangiri</option><option>Mukhiguda</option><option>NALCO</option><option>Nabarangapur</option><option>Nayagarh</option><option>Nilagiri</option><option>Nimapada</option><option>Nuapatna</option><option>OCL Industrialship</option><option>Padmapur</option><option>Panposh</option><option>Paradip</option><option>Parlakhemundi</option><option>Patnagarh</option><option>Pattamundai</option><option>Phulabani</option><option>Pipili</option><option>Polasara</option><option>Pratapsasan</option><option>Puri</option><option>Purusottampur</option><option>Rairangpur</option><option>Rajagangapur</option><option>Rambha</option><option>Raurkela</option><option>Raurkela Industrialship</option><option>Rayagada</option><option>Redhakhol</option><option>Remuna</option><option>Rengali Dam Projectship</option><option>Sambalpur</option><option>Sonapur</option><option>Soro</option><option>Sunabeda</option><option>Sundargarh</option><option>Surada</option><option>Talcher</option><option>Talcher Thermal Power Station Township</option><option>Tarbha</option><option>Tensa</option><option>Titlagarh</option><option>Udala</option><option>Umarkote</option>");
}

else if (val == "Pondicherry")
{
	 $("#city").html("<option>Karaikal</option><option>Mahe - Pondicherry</option><option>Pondicherry</option><option>Yanam - Pondicherry</option>");
}

else if (val == "Punjab")
{
	 $("#city").html("<option>Abohar</option><option>Adampur</option><option>Ahmedgarh</option><option>Ajnala</option><option>Akalgarh</option><option>Alawalpur</option><option>Amloh</option><option>Amritsar</option><option>Amritsar Cantt.</option><option>Anandpur Sahib</option><option>Badhni Kalan</option><option>Bagha Purana</option><option>Balachaur</option><option>Banaur</option><option>Banga</option><option>Baretta</option><option>Bariwala</option><option>Barnala</option><option>Bassi Pathana</option><option>Batala</option><option>Bathinda</option><option>Begowal</option><option>Bhabat</option><option>Bhadaur</option><option>Bhankharpur</option><option>Bharoli Kalan</option><option>Bhawanigarh</option><option>Bhikhi</option><option>Bhikhiwind</option><option>Bhisiana</option><option>Bhogpur</option><option>Bhucho Mandi</option><option>Bhulath</option><option>Budha Theh</option><option>Budhlada</option><option>Cheema</option><option>Chohal</option><option>Daroha</option><option>Dasua</option><option>Daulatpur - Gurdaspur</option><option>Dera Baba Nanak</option><option>Dera Bassi</option><option>Dhanaula</option><option>Dharamkot</option><option>Dhariwal</option><option>Dhilwan</option><option>Dhuri</option><option>Dina Nagar</option><option>Dirba</option><option>Faridkot</option><option>Fatehgarh Churian</option><option>Fazilka</option><option>Fiozpur</option><option>Firozpur Cantt</option><option>Gardhiwala</option><option>Garhshanker</option><option>Ghagga</option><option>Ghanaur</option><option>Gidderbaha</option><option>Gobindgarh</option><option>Goniana</option><option>Goraya</option><option>Greater Mohali</option><option>Gurdaspur</option><option>Guru Har Sahai</option><option>Hajipur - Hoshiarpur</option><option>Handiaya</option><option>Hariana</option><option>Hoshiarpur</option><option>Hussainpur</option><option>Jagraon</option><option>Jaitu</option><option>Jalalabad - Firozpur</option><option>Jalandhar</option><option>Jalandhar Cantt.</option><option>Jandiala - Amritsar</option><option>Jandiala - Jalandhar</option><option>Jugial</option><option>Kalanaur - Gurdaspur</option><option>Kapurthala</option><option>Karoran</option><option>Kartarpur</option><option>Khamanon</option><option>Khanauri</option><option>Khanna</option><option>Kharar</option><option>Kharar - Greater Mohali</option><option>Kharar - Rupnagar</option><option>Khem Karan</option><option>Kot Fatta</option><option>Kot Kapura</option><option>Kurali</option><option>Lehragaga</option><option>Lodhian Khas</option><option>Longowal</option><option>Ludhiana</option><option>Machhiwara</option><option>Mahilpur</option><option>Majitha</option><option>Makhu</option><option>Malerkotla</option><option>Maloud</option><option>Malout</option><option>Mansa</option><option>Maur</option><option>Moga</option><option>Mohali</option><option>Moonak</option><option>Morinda</option><option>Mukerian</option><option>Muktsar</option><option>Mullanpur Dakha</option><option>Mullanpur- Garibdas</option><option>Nabha</option><option>Nakodar</option><option>Nangal</option><option>Nawanshahr</option><option>Nehon</option><option>Noor Mahal</option><option>Pathankot</option><option>Patiala</option><option>Patti - Amritsar</option><option>Pattran</option><option>Payal</option><option>Phagwara</option><option>Phillaur</option><option>Qadian</option><option>Rahon</option><option>Raikot</option><option>Rajasansi</option><option>Rajpura</option><option>Raman</option><option>Ramdass</option><option>Rampura Phul</option><option>Rayya</option><option>Rupnagar</option><option>Rurki Kasba</option><option>S.A.S. Nagar (Mohali)</option><option>Sahnewal</option><option>Samana</option><option>Samrala</option><option>Sanaur</option><option>Sangat</option><option>Sangrur</option><option>Sansarpur</option><option>Sardulgarh</option><option>Shahkot</option><option>Shamchaurasi</option><option>Shekhpura</option><option>Sirhind -Fategarh</option><option>Sri Hargobindpur</option><option>Sujanpur</option><option>Sultanpur Lodhi</option><option>Sunam</option><option>Talwandi Bhai</option><option>Talwara - Hoshiarpur</option><option>Tappa</option><option>Tarn Taran</option><option>Urmar Tanda</option><option>Zira</option><option>Zirakpur</option>");
}

else if (val == "Rajasthan")
{
	 $("#city").html("<option>Abu Road</option><option>Ajmer</option><option>Aklera</option><option>Alwar</option><option>Amet</option><option>Antah</option><option>Anupgarh</option><option>Asind</option><option>Baggar</option><option>Bakani</option><option>Bali</option><option>Balotra</option><option>Bandikui</option><option>Banswara</option><option>Baran</option><option>Bari</option><option>Bari Sadri</option><option>Barmer</option><option>Basni Belima</option><option>Bayana</option><option>Beawar</option><option>Beejoliya Kalan</option><option>Begun</option><option>Behror</option><option>Bhadra</option><option>Bhalariya</option><option>Bharatpur</option><option>Bhawani Mandi</option><option>Bhilwara</option><option>Bhinder</option><option>Bhinmal</option><option>Bhusawar</option><option>Bidasar</option><option>Bikaner</option><option>Bilara</option><option>Bissau</option><option>Budhpura</option><option>Bundi</option><option>Chechat</option><option>Chhabra</option><option>Chhapar</option><option>Chhipabarod</option><option>Chhoti Sadri</option><option>Chirawa</option><option>Chittaurgarh</option><option>Churu</option><option>Dariba</option><option>Dausa</option><option>Deeg</option><option>Deoli - Tonk</option><option>Deshnoke</option><option>Devgarh</option><option>Dhariawad</option><option>Dhaulpur</option><option>Didwana</option><option>Dungargarh</option><option>Dungarpur</option><option>Fatehnagar</option><option>Fatehpur - Sikar</option><option>Gajsinghpur</option><option>Galiakot</option><optionGanganagar</option><option>Gangapur - Bhilwara</option><option>Gangapur City</option><option>Goredi Chancha</option><option>Gothra</option><option>Govindgarh - Alwar</option><option>Gulabpura</option><option>Hanumangarh</option><option>Hindaun</option><option>Indragarh</option><option>Jahazpur</option><option>Jaipur</option><option>Jaisalmer</option><option>Jaitaran</option><option>Jalor</option><option>Jhalawar</option><option>Jhalrapatan</option><option>Jhunjhunun</option><option>Jodhpur</option><option>Kaithoon</option><option>Kaman</option><option>Kanor</option><option>Kapasan</option><option>Kaprain</option><option>Karanpur</option><option>Karauli</option><option>Kekri</option><option>Keshoraipatan</option><option>Kesrisinghpur</option><option>Khairthal</option><option>Khandela</option><option>Kherli</option><option>Kherliganj</option><option>Kherwara Chhaoni</option><option>Khetri</option><option>Kiranipura</option><option>Kishangarh - Ajmer</option><option>Kishangarh - Alwar</option><option>Kolvi Mandi Rajendra pura</option><option>Kota - Kota</option><option>Kuchaman City</option><option>Kuchera</option><option>Kumbhkot</option><option>Kumher</option><option>Kushalgarh</option><option>Lachhmangarh</option><option>Ladnu</option><option>Lakheri</option><option>Lalsot</option><option>Losal</option><option>Mahu Kalan</option><option>Mahwa</option><option>Makrana</option><option>Malpura</option><option>Mandalgarh</option><option>Mandawa</option><option>Mandawar - Dausa</option><option>Mangrol - Baran</option><option>Manohar Thana</option><option>Marwar Junction</option><option>Merta City</option><option>Modak</option><option>Mount Abu</option><option>Mukandgarh</option><option>Mundwa</option><option>Nadbai</option><option>Nagar</option><option>Nagaur</option><option>Nainwa</option><option>Nasirabad</option><option>Nathdwara</option><option>Nawa</option><option>Nawalgarh</option><option>Neem-Ka-Thana</option><option>Newa Talai</option><option>Nimbahera</option><option>Niwai</option><option>Nohar</option><option>Nokha - Bikaner</option><option>Padampur</option><option>Pali</option><option>Parbatsar</option><option>Partapur</option><option>Phalna</option><option>Phalodi</option><option>Pilani</option><option>Pilibanga</option><option>Pindwara</option><option>Piparcity</option><option>Pirawa</option><option>Pokaran</option><option>Pratapgarh - Chittaurgarh</option><option>Pushkar</option><option>Raisinghnagar</option><option>Rajakhera</option><option>Rajaldesar</option><option>Rajgarh - Alwar</option><option>Rajgarh - Churu</option><option>Rajsamand</option><option>Ramganj Mandi</option><option>Ramgarh</option><option>Rani</option><option>Ratangarh - Churu</option><option>Ratannagar</option><option>Rawatbhata</option><option>Rawatsar</option><option>Reengus</option><option>Rikhabdeo</option><option>Sadri</option><option>Sadulshahar</option><option>Sagwara</option><option>Salumbar</option><option>Sanchore</option><option>Sangaria</option><option>Sangod</option><option>Sardarshahar</option><option>Sarwar</option><option>Satalkheri</option><option>Sawai Madhopur</option><option>Shahpura - Bhilwara</option><option>Sheoganj</option><option>Sikar</option><option>Sirohi</option><option>Sogariya</option><option>Sojat</option><option>Sojat Road</option><option>Sri Madhopur</option><option>Sujangarh</option><option>Suket</option><option>Sumerpur - Pali</option><option>Surajgarh</option><option>Suratgarh</option><option>Takhatgarh</option><option>Taranagar</option><option>Tijara</option><option>Todabhim</option><option>Todaraisingh</option><option>Todra</option><option>Tonk</option><option>Udaipur</option><option>Udaipurwati</option><option>Udpura</option><option>Uniara</option><option>Vanasthali</option><option>Vidyavihar</option><option>Vijainagar - Ajmer</option><option>Vijainagar - Ganganagar</option><option>Weir</option>");
}

else if (val == "Sikkim")
{
	 $("#city").html("<option>Gangtok</option><option>Gyalshing</option><option>Jorethang</option><option>Mangan</option><option>Namchi</option><option>Nayabazar</option><option>Rangpo</option><option>Singtam</option><option>Upper Tadong</option>");
}

else if (val == "Tamilnadu")
{
	 $("#city").html("<option>Chengalpattu</option><option>Chennai</option><option>Chidambaram</option><option>Coimbatore</option><option>Dharmapuri</option><option>Dindigul</option><option>Erode</option><option>Hosur</option><option>Kancheepuram</option><option>Karur</option><option>Madurai</option><option>Nagercoil</option><option>Pollachi</option><option>Rajapalayam</option><option>Salem</option><option>Thanjavur</option><option>Thiruvallur</option><option>Tiruchirappalli</option><option>Tirunelveli</option><option>Tiruppur</option><option>Vellore</option><option>Viluppuram</option<option>A.Thirumuruganpoondi</option><option>A.Vellalapatti</option><option>Abiramam</option><option>Achampudur</option><option>Acharapakkam</option><option>Acharipallam</option><option>Achipatti</option><option>Adikaratti</option><option>Adiramapattinam</option><option>Aduthurai alias Maruthuvakudi</option><option>Agaram</option><option>Agastheeswaram</option><option>Alagappapuram</option><option>Alampalayam</option><option>Alandur</option><option>Alanganallur</option><option>Alangayam</option><option>Alangudi</option><option>Alangulam - Tirunelveli</option><option>Alangulam - Virudhunagar</option><option>Alanthurai</option><option>Alapakkam</option><option>Allapuram</option><option>Alur - Kanyakumari</option><option>Alwarkurichi</option><option>Alwarthirunagiri</option><option>Ambasamudram</option><option>Ambur</option><option>Ammainaickanur</option><option>Ammapettai - Erode</option><option>Ammapettai - Thanjavur</option><option>Ammavarikuppam</option><option>Ammoor</option><option>Anaimalai</option><option>Anaiyur - Madurai</option><option>Anaiyur - Virudhunagar</option><option>Anakaputhur</option><option>Ananthapuram</option><option>Andipalayam</option><option>Andipatti Jakkampatti</option><option>Anjugramam</option><option>Annamalai Nagar</option><option>Annavasal</option><option>Annur</option><option>Anthiyur</option><option>Appakudal</option><option>Arachalur</option><option>Arakandanallur</option><option>Arakonam</option><option>Aralvaimozhi</option><option>Arani - Thiruvallur</option><option>Arani - Tiruvanamalai</option><option>Aranthangi</option><option>Arasiramani</option><option>Aravakurichi</option><option>Aravankad</option><option>Arcot</option><option>Arimalam</option><option>Ariyalur</option><option>Ariyappampalayam</option><option>Ariyur</option><option>Arumanai</option><option>Arumbavur</option><option>Arumuganeri</option><option>Aruppukkottai</option><option>Ashokapuram</option><option>Athani</option><option>Athanur</option><option>Athimarapatti</option><option>Athipattu</option><option>Athur - Selam</option><option>Athur(Tiruvattar) - Kanyakumari</option><option>Attayampatti</option><option>Attur</option><option>Avadattur</option><option>Avalpoondurai</option><option>Avanashi</option><option>Avaniapuram</option><option>Ayakudi</option><option>Aygudi</option><option>Ayothiapattinam</option><option>Ayyalur</option><option>Ayyampalayam</option><option>Ayyampettai</option><option>Azhagiapandiapuram</option><option>B. Mallapuram</option><option>B. Meenakshipuram</option><option>Balakrishnampatti</option><option>Balakrishnapuram</option><option>Balapallam</option><option>Balasamudram</option><option>Bargur</option><option>Batlagundu</option><option>Belur - Salem</option><option>Bhavani</option><option>Bhavanisagar</option><option>Bhuvanagiri</option><option>Bikketti</option><option>Bodinayakkanur</option><option>Boothapandi</option><option>Boothipuram</option><option>Brahmana Periya-Agraharam</option><option>Chengam</option><option>Chennasamudram</option><option>Chennimalai</option><option>Cheranmadevi</option><option>Chetpet</option><option>Chettiarpatti</option><option>Chettipalayam</option><option>Chettithangal</option><option>Chinna Anuppanadi</option><option>Chinnakkampalayam</option><option>Chinnalapatti</option><option>Chinnamanur</option><option>Chinnampalayam</option><option>Chinnasalem</option><option>Chinnasekkadu</option><option>Chinnavedampatti</option><option>Chithode</option><option>Chitlapakkam</option><option>Cholapuram</option><option>Coimbatore Suburb</option><option>Coonoor</option><option>Courtallam</option><option>Cuddalore</option><option>Cumbum</option><option>Dalavaipatti</option><option>Denkanikottai</option><option>Desur</option><option>Devadanapatti</option><option>Devakottai</option><option>Devanangurichi</option><option>Devarshola</option><option>Dhalavoipuram</option><option>Dhali</option><option>Dhaliyur</option><option>Dharapadavedu</option><option>Dharapuram</option><option>Dharasuram</option><option>Dusi</option><option>Edaganasalai</option><option>Edaikodu</option><option>Edakalinadu</option><option>Edappadi</option><option>Elathur</option><option>Elayirampannai</option><option>Elumalai</option><option>Eral</option><option>Eraniel</option><option>Eriodu</option><option>Erumaipatti</option><option>Eruvadi</option><option>Ethapur</option><option>Ettayapuram</option><option>Ettimadai</option><option>Ezhudesam</option><option>Ganapathipuram</option><option>Gandhi Nagar(Katpadi Ext.)</option><option>Gangaikondan</option><option>Gangavalli</option><option>Ganguvarpatti</option><option>Gingee</option><option>Gobichettipalayam</option><option>Gopalasamudram</option><option>Goundampalayam</option><option>Gudalur - Coimbatore</option><option>Gudalur - The Nilgiris</option><option>Gudalur - Theni</option><option>Gudiyatham</option><option>Hanumanthampatti</option><option>Harur</option><option>Harveypatti</option><option>Highways</option><option>Hubbathala</option><option>Huligal</option><option>Idikarai</option><option>Ilampillai</option><option>Ilanji</option><option>Iluppaiyurani</option><option>Iluppur</option><option>Inam Karur</option><option>Injambakkam</option><option>Irugur</option><option>Jaffrabad</option><option>Jagathala</option><option>Jalakandapuram</option><option>Jalladiampet</option><option>Jambai</option><option>Jayankondam</option><option>Jolarpet</option><option>Kadambur</option><option>Kadathur</option><option>Kadayal</option><option>Kadayampatti</option><option>Kadayanallur</option><option>Kalakkad</option><option>Kalambur</option><option>Kalapatti</option><option>Kalappanaickenpatti</option><option>Kalavai</option><option>Kalinjur</option><option>Kaliyakkavilai</option><option>Kalladaikurichi</option><option>Kallakkurichi</option><option>Kallakudi</option><option>Kallukuttam</option><option>Kalugumalai</option><option>Kamayagoundanpatti</option><option>Kambainallur</option><option>Kamuthi</option><option>Kanadukathan</option><option>Kanakkampalayam</option><option>Kanam</option><option>Kandanur</option><option>Kangayampalayam</option><option>Kangeyam</option><option>Kangeyanallur</option><option>Kaniyur</option><option>Kanjikoil</option><option>Kannadendal</option><option>Kannamangalam</option><option>Kannampalayam</option><option>Kannankurichi</option><option>Kannivadi - Dindigul</option><option>Kannivadi - Erode</option><option>Kanyakumari</option><option>Kappiyarai</option><option>Karaikkudi</option><option>Karamadai</option><option>Karambakkam</option><option>Karambakkudi</option><option>Kariamangalam</option><option>Kariapatti</option><option>Karugampattur</option><option>Karumandi Chellipalayam</option><option>Karumathampatti</option><option>Karungal</option><option>Karunguzhi</option><option>Karuppur</option><option>Kasipalayam (E)</option><option>Kasipalayam (G)</option><option>Kathujuganapalli</option><option>Katpadi</option><option>Kattivakkam</option><option>Kattumannarkoil</option><option>Kattuputhur</option><option>Kaveripakkam</option><option>Kaveripattinam</option><option>Kayalpattinam</option><option>Kayatharu</option><option>Keelakarai</option><option>Keeramangalam</option><option>Keeranur - Dindigul</option><option>Keeranur - Pudukkottai</option><option>Keeripatti</option><option>Keezhapavur</option><option>Kelamangalam</option><option>Kembainaickenpalayam</option><option>Kethi</option><option>Kilampadi</option><option>Kilkulam</option><option>Kilkunda</option><option>Killiyur</option><option>Killlai</option><option>Kilpennathur</option><option>Kilvelur</option><option>Kinathukadavu</option><option>Kodaikanal</option><option>Kodavasal</option><option>Kodumudi</option><option>Kolachal</option><option>Kolappalur</option><option>Kolathupalayam</option><option>Kolathur</option><option>Kollankodu</option><option>Kollankoil</option><option>Komaralingam</option><option>Kombai</option><option>Konavattam</option><option>Kondalampatti</option><option>Konganapuram</option><option>Kooraikundu</option><option>Koothappar</option><option>Koradacheri</option><option>Kotagiri</option><option>Kothinallur</option><option>Kottaiyur</option><option>Kottakuppam</option><option>Kottaram</option><option>Kottivakkam</option><option>Kottur</option><option>Kouthanallur</option><option>Kovilpatti</option><option>Krishnagiri</option><option>Krishnarayapuram</option><option>Krishnasamudram</option><option>Kuchanur</option><option>Kuhalur</option><option>Kulasekarapuram</option><option>Kulithalai</option><option>Kumarapalayam</option><option>Kumarapuram</option><option>Kumbakonam</option><option>Kundrathur</option><option>Kuniyamuthur</option><option>Kunnathur</option><option>Kurichi</option><option>Kurinjipadi</option><option>Kurudampalayam</option><option>Kurumbalur</option><option>Kuthalam</option><option>Kuzhithurai</option><option>Labbaikudikadu</option><option>Lakkampatti</option><option>Lalgudi</option><option>Lalpet</option><option>Llayangudi</option><option>Madambakkam</option><option>Madathukulam</option><option>Madavaram</option><option>Madippakkam</option><option>Madukkarai</option><option>Madukkur</option><option>Maduranthakam</option><option>Maduravoyal</option><option>Mallamooppampatti</option><option>Mallankinaru</option><option>Mallasamudram</option><option>Mallur</option><option>Mamallapuram</option><option>Mamsapuram</option><option>Manachanallur</option><option>Manali - Thiruvallur</option><option>Manalmedu</option><option>Manalurpet</option><option>Manamadurai</option><option>Manapakkam</option><option>Manapparai</option><option>Manavalakurichi</option><option>Mandaikadu</option><option>Mandapam</option><option>Mangadu</option><option>Mangalam</option><option>Mangalampet</option><option>Manimutharu</option><option>Mannargudi</option><option>Mappilaiurani</option><option>Maraimalainagar</option><option>Marakkanam</option><option>Maramangalathupatti</option><option>Marandahalli</option><option>Markayankottai</option><option>Marudur</option><option>Marungur</option><option>Mathigiri</option><option>Mayiladuthurai</option><option>Mecheri</option><option>Meenambakkam</option><option>Melacheval</option><option>Melachokkanathapuram</option><option>Melagaram</option><option>Melamadai</option><option>Melamaiyur</option><option>Melathiruppanthuruthi</option><option>Melattur</option><option>Melpattampakkam</option><option>Melur</option><option>Melvisharam</option><option>Mettupalayam - Tiruchirappalli</option><option>Mettupalayam Coimbatore</option><option>Mettur</option><option>Minjur</option><option>Modakurichi</option><option>Mohanur</option><option>Moolakaraipatti</option><option>Moovarasampettai</option><option>Mopperipalayam</option><option>Mudukulathur</option><option>Mukasipidariyur</option><option>Mukkudal</option><option>Mulagumudu</option><option>Mulanur</option><option>Muruganpalayam</option><option>Musiri</option><option>Muthupet</option><option>Muthur</option><option>Muttayyapuram</option><option>Myladi</option><option>Naduvattam</option><option>Nagapattinam</option><option>Nagavakulam</option><option>Nagojanahalli</option><option>Nallampatti</option><option>Nallur</option><option>Namagiripettai</option><option>Namakkal</option><option>Nambiyur</option><option>Nandambakkam</option><option>Nandivaram-Guduvancheri</option><option>Nangavalli</option><option>Nangavaram</option><option>Nanguneri</option><option>Nanjikottai</option><option>Nannilam</option><option>Naranammalpuram</option><option>Naranapuram</option><option>Narasimhanaickenpalayam</option><option>Narasingapuram - Salem</option><option>Narasingapuram - Vellore</option><option>Naravarikuppam</option><option>Nasiyanur</option><option>Natham</option><option>Nathampannai</option><option>Natrampalli</option><option>Nattapettai</option><option>Nattarasankottai</option><option>Navalpattu</option><option>Nazerath</option><option>Needamangalam</option><option>Neelankarai</option><option>Neikkarapatti</option><option>Neiyyur</option><option>Nellikuppam</option><option>Nelliyalam</option><option>Nemili</option><option>Neripperichal</option><option>Nerkunram</option><option>Nerkuppai</option><option>Nerunjipettai</option><option>Neykkarappatti</option><option>Neyveli</option><option>Nilakkottai</option><option>Nilgiris</option><option>Odaipatti</option><option>Odaiyakulam</option><option>Oddanchatram</option><option>Odugathur</option><option>Oggiyamduraipakkam</option><option>Olagadam</option><option>Omalur</option><option>Ooty</option><option>Orathanadu (Mukthambalpuram)</option><option>Othakadai</option><option>Othakalmandapam</option><option>Ottapparai</option><option>P. J. Cholapuram</option><option>P.Mettupalayam</option><option>P.N.Patti</option><option>Pacode</option><option>Padaiveedu</option><option>Padianallur</option><option>Padirikuppam</option><option>Padmanabhapuram</option><option>Palaganangudy</option><option>Palakkodu</option><option>Palamedu</option><option>Palani</option><option>Palani Chettipatti</option><option>Palavakkam</option><option>Palavansathu</option><option>Palayam</option><option>Palladam</option><option>Pallapalayam - Coimbatore</option><option>Pallapalayam - Erode</option><option>Pallapatti - Dindigul</option><option>Pallapatti - Karur</option><option>Pallapatti - Virudhunagar</option><option>Pallathur</option><option>Pallavaram</option><option>Pallikaranai</option><option>Pallikonda</option><option>Pallipalayam</option><option>Pallipalayam Agraharam</option><option>Pallipattu</option><option>Pammal</option><option>Panagudi</option><option>Panaimarathupatti</option><option>Panapakkam</option><option>Panboli</option><option>Pandamangalam</option><option>Pannaikadu</option><option>Pannaipuram</option><option>Panruti</option><option>Papanasam</option><option>Pappankurichi</option><option>Papparapatti - Dharmapuri</option><option>Papparapatti - Salem</option><option>Pappireddipatti</option><option>Paramakudi</option><option>Paramathi</option><option>Parangipettai</option><option>Paravai</option><option>Pasur</option><option>Pathamadai</option><option>Pattinam</option><option>Pattiveeranpatti</option><option>Pattukkottai</option><option>Pazhugal</option><option>Peerkankaranai</option><option>Pennadam</option><option>Pennagaram</option><option>Pennathur</option><option>Peraiyur</option><option>Peralam</option><option>Perambalur</option><option>Peranamallur</option><option>Peravurani</option><option>Periya Negamam</option><option>Periyakodiveri</option><option>Periyakulam</option><option>Periyanaickenpalayam</option><option>Periyapatti</option><option>Periyasemur</option><option>Pernampattu</option><option>Perumagalur</option><option>Perumandi</option><option>Perumuchi</option><option>Perundurai</option><option>Perungalathur</option><option>Perungudi</option><option>Perungulam</option><option>Perur</option><option>Pethampalayam</option><option>Pethanaickenpalayam</option><option>Pillanallur</option><option>Polichalur</option><option>Polur</option><option>Ponmani</option><option>Ponnamaravathi</option><option>Ponnampatti</option><option>Ponneri</option><option>Poolambadi</option><option>Poolampatti</option><option>Pooluvapatti</option><option>Poonamallee</option><option>Pothanur</option><option>Pothatturpettai</option><option>Pudukadai</option><option>Pudukkottai</option><option>Pudupalaiyam Aghraharam</option><option>Pudupalayam</option><option>Pudupatti - Theni</option><option>Pudupatti - Virudhunagar</option><option>Pudupattinam</option><option>Pudur (S)</option><option>Puduvayal</option><option>Puliyankudi</option><option>Puliyur</option><option>Pullampadi</option><option>Punjai Thottakurichi</option><option>Punjaipugalur</option><option>Punjaipuliampatti</option><option>Puthalam</option><option>Puvalur</option><option>Puzhal</option><option>Puzhithivakkam (Ullagaram)</option><option>R.Pudupatti</option><option>R.S.Mangalam</option><option>Ramanathapuram</option><option>Ramapuram - Thiruvallur</option><option>Rameswaram - Ramanathapuram</option><option>Ranipettai</option><option>Rasipuram</option><option>Rayagiri</option><option>Reethapuram</option><option>Rosalpatti</option><option>Rudravathi</option><option>S. Kannanur</option><option>S.Kodikulam</option><option>S.Nallur</option><option>Salangapalayam</option><option>Samalapuram</option><option>Samathur</option><option>Sambavar Vadagarai</option><option>Sankaramanallur</option><option>Sankarankoil</option><option>Sankarapuram</option><option>Sankari</option><option>Sankarnagar</option><option>Saravanampatti</option><option>Sarcarsamakulam</option><option>Sathankulam</option><option>Sathiyavijayanagaram</option><option>Sathuvachari</option><option>Sathyamangalam</option><option>Sattur</option><option>Sayalgudi</option><option>Sayapuram</option><option>Seerapalli</option><option>Seevur</option><option>Seithur</option><option>Sembakkam</option><option>Semmipalayam</option><option>Senthamangalam</option><option>Sentharapatti</option><option>Senur</option><option>Sethiathoppu</option><option>Sevilimedu</option><option>Sevugampatti</option><option>Shenbakkam</option><option>Shenkottai</option><option>Sholavandan</option><option>Sholingur</option><option>Sholur</option><option>Sikkarayapuram</option><option>Singampuneri</option><option>Singaperumalkoil</option><option>Sirkali</option><option>Sirugamani</option><option>Sirumugai</option><option>Sithayankottai</option><option>Sithurajapuram</option><option>Sivaganga</option><option>Sivagiri - Erode</option><option>Sivagiri - Tirunelveli</option><option>Sivakasi</option><option>Sivanthipuram</option><option>Srimushnam</option><option>Sriperumbudur</option><option>Sriramapuram</option><option>Srivaikuntam</option><option>Srivilliputhur</option><option>Suchindram</option><option>Suleeswaranpatti</option><option>Sulur</option><option>Sundarapandiam</option><option>Sundarapandiapuram</option><option>Surampatti</option><option>Surandai</option><option>Suriyampalayam</option><option>Swamimalai</option><option>T.Kallupatti</option><option>TNPL Pugalur</option><option>Tambaram</option><option>Tayilupatti</option><option>Tenkasi</option><option>Thadikombu</option><option>Thakkolam</option><option>Thalainayar</option><option>Thalakudi</option><option>Thamaraikulam</option><option>Thammampatti</option><option>Thanthoni</option><option>Tharamangalam</option><option>Tharangambadi</option><option>Thathaiyangarpet</option><option>Thedavur</option><option>Thenambakkam</option><option>Thengampudur</option><option>Theni</option><option>Theni Allinagaram</option><option>Thenkarai - Coimbatore</option><option>Thenkarai - Theni</option><option>Thenthamaraikulam</option><option>Thenthiruperai</option><option>Thesur</option><option>Thevaram</option><option>Thevur</option><option>Thiagadurgam</option><option>Thingalnagar</option><option>Thirukarungudi</option><option>Thirukattupalli</option><option>Thirumalayampalayam</option><option>Thirumangalam</option><option>Thirumazhisai</option><option>Thirunagar</option><option>Thirunageswaram</option><option>Thiruneermalai</option><option>Thirunindravur</option><option>Thiruparankundram</option><option>Thiruparappu</option><option>Thiruporur</option><option>Thiruppanandal</option><option>Thirupuvanam - Sivaganga</option><option>Thirupuvanam - Thanjavur</option><option>Thiruthangal</option><option>Thiruthuraipoondi</option><option>Thiruvaiyaru</option><option>Thiruvalam</option><option>Thiruvarur</option><option>Thiruvattaru</option><option>Thiruvenkatam</option><option>Thiruvennainallur</option><option>Thiruverumbur</option><option>Thiruvidaimarudur</option><option>Thiruvithankodu</option><option>Thisayanvilai</option><option>Thittacheri</option><option>Thondamuthur</option><option>Thondi</option><option>Thoothukkudi</option><option>Thorapadi - Cuddalore</option><option>Thorapadi - Vellore</option><option>Thottipalayam</option><option>Thottiyam</option><option>Thudiyalur</option><option>Thuraiyur</option><option>Thuthipattu</option><option>Thuvakudi</option><option>Timiri</option><option>Tindivanam</option><option>Tiruchendur</option><option>Tiruchengode</option><option>Tirukalukundram</option><option>Tirukkoyilur</option><option>Tirupathur - Sivaganga</option><option>Tirupathur - Vellore</option><option>Tirusulam</option><option>Tiruttani</option><option>Tiruvannamalai</option><option>Tiruverkadu</option><option>Tiruvethipuram</option><option>Tiruvottiyur</option><option>Tittakudi</option><option>Udangudi</option><option>Udayarpalayam</option><option>Udumalaipettai</option><option>Ullur</option><option>Ulundurpettai</option><option>Unjalaur</option><option>Unnamalaikadai</option><option>Uppidamangalam</option><option>Uppiliapuram</option><option>Urapakkam</option><option>Usilampatti</option><option>Uthamapalayam</option><option>Uthangarai</option><option>Uthayendram</option><option>Uthiramerur</option><option>Uthukkottai</option><option>Uthukuli</option><option>V. Pudur</option><option>Vadakarai Keezhpadugai</option><option>Vadakkanandal</option><option>Vadakkuvalliyur</option><option>Vadalur</option><option>Vadamadurai</option><option>Vadavalli</option><option>Vadipatti</option><option>Vadugapatti - Erode</option><option>Vadugapatti - Theni</option><option>Vaitheeswarankoil</option><option>Valangaiman</option><option>Valasaravakkam</option><option>Valavanur</option><option>Vallam</option><option>Valparai</option><option>Valvaithankoshtam</option><option>Vanavasi</option><option>Vandalur</option><option>Vandavasi</option><option>Vandiyur</option><option>Vaniputhur</option><option>Vaniyambadi</option><option>Varadarajanpettai</option><option>Vasudevanallur</option><option>Vathirairuppu</option><option>Vazhapadi</option><option>Vedapatti</option><option>Vedaranyam</option><option>Vedasandur</option><option>Veeraganur</option><option>Veerakeralam</option><option>Veerakkalpudur</option><option>Veerapandi - Coimbatore</option><option>Veerapandi - Theni</option><option>Veerappanchatram</option><option>Veeravanallur</option><option>Velampalayam</option><option>Velankanni</option><option>Vellakinar</option><option>Vellakoil</option><option>Vellalur</option><option>Vellimalai</option><option>Vellottamparappu</option><option>Velur</option><option>Vengampudur</option><option>Vengathur</option><option>Venkarai</option><option>Vennanthur</option><option>Veppathur</option><option>Verkilambi</option><option>Vettaikaranpudur</option><option>Vettavalam</option><option>Vijayapuri</option><option>Vikramasingapuram</option><option>Vikravandi</option><option>Vilangudi</option><option>Vilankurichi</option><option>Vilapakkam</option><option>Vilathikulam</option><option>Vilavur</option><option>Villukuri</option><option>Virudhachalam</option><option>Virudhunagar</option><option>Virupakshipuram</option><option>Viswanatham</option><option>Walajabad</option><option>Walajapet</option><option>Wellington</option><option>Yelagiri</option><option>Zamin Uthukuli</option>");
}

else if (val == "Tripura")
{
	 $("#city").html("<option>Agartala</option><option>Amarpur - Tripura</option><option>Ambassa</option><option>Badharghat</option><option>Belonia</option><option>Dharmanagar</option><option>Gakulnagar</option><option>Gandhigram</option><option>Indranagar</option><option>Jogendranagar</option><option>Kailasahar</option><option>Kamalpur</option><option>Kanchanpur</option><option>Khowai</option><option>Kumarghat</option><option>Kunjaban</option><option>Narsingarh</option><option>Pratapgarh - Tripura</option><option>Ranirbazar</option><option>Sabroom</option><option>Sonamura</option><option>Teliamura</option><option>Udaipur - Tripura</option>");
}

else if (val == "Uttar Pradesh")
{
	 $("#city").html("<option>Achhalda</option><option>Achhnera</option><option>Adari</option><option>Afzalgarh</option><option>Agarwal Mandi</option><option>Agra</option><option>Ahraura</option><option>Ailum</option><option>Air Force Area</option><option>Ajhuwa</option><option>Akbarpur - Ambedaker Nagar</option><option>Akbarpur - Kanpur Dehat</option><option>Aliganj</option><option>Aligarh</option><option>Allahabad</option><option>Allahganj</option><option>Allapur</option><option>Amanpur</option><option>Ambehta</option><option>Amethi</option><option>Amila</option><option>Amilo</option><option>Aminagar Sarai</option><option>Aminagar Urf Bhurbaral</option><option>Amraudha</option><option>Amroha</option><option>Anandnagar</option><option>Anpara</option><option>Antu</option><option>Anupshahr</option><option>Aonla</option><option>Armapur Estate</option><option>Ashrafpur Kichhauchha</option><option>Atarra</option><option>Atasu</option><option>Atrauli</option><option>Atraulia</option><option>Auraiya</option><option>Aurangabad - Bulandshahr</option><option>Aurangabad Bangar</option><option>Auras</option><option>Awagarh</option><option>Ayodhya</option><option>Azamgarh</option><option>Azizpur</option><option>Azmatgarh</option><option>Babarpur Ajitmal</option><option>Baberu</option><option>Babina</option><option>Babrala</option><option>Babugarh</option><option>Bachhraon</option><option>Bachhrawan</option><option>Bad</option><option>Baghpat</option><option>Bah</option><option>Bahadurganj - Ghazipur</option><option>Baheri</option><option>Bahjoi</option><option>Bahraich</option><option>Bahsuma</option><option>Bahuwa</option><option>Bajna</option><option>Bakewar</option><option>Bakiabad</option><option>Baldeo</option><option>Ballia</option><option>Balrampur</option><option>Banat</option><option>Banda</option><option>Bangarmau</option><option>Banki - Barabanki</option><option>Bansdih</option><option>Bansgaon</option><option>Bansi</option><option>Baragaon - Jhansi</option><option>Baragaon - Varanasi</option><option>Baraut</option><option>Bareilly</option><option>Barhalganj</option><option>Barhani Bazar</option><option>Barkhera</option><option>Barsana</option><option>Barua Sagar</option><option>Barwar</option><option>Basti</option><option>Begumabad Budhana</option><option>Behta Hajipur</option><option>Bela Pratapgarh</option><option>Belthara Road</option><option>Beniganj</option><option>Beswan</option><option>Bewar</option><option>Bhadarsa</option><option>Bhadohi</option><option>Bhagwant Nagar</option><option>Bharatganj</option><option>Bhargain</option><option>Bharthana</option><option>Bharuhana</option><option>Bharwari</option><option>Bhatni Bazar</option><option>Bhatpar Rani</option><option>Bhawan Bahadur Nagar</option><option>Bhinga</option><option>Bhogaon</option><option>Bhojpur Dharampur</option><option>Bhokarhedi</option><option>Bhulepur</option><option>Bidhuna</option><option>Bighapur</option><option>Bijnor</option><option>Bijpur</option><option>Bikapur</option><option>Bilari</option><option>Bilariaganj</option><option>Bilaspur - Gautam Buddha Nagar</option><option>Bilaspur - Rampur</option><option>Bilgram</option><option>Bilhaur</option><option>Bilram</option><option>Bilsanda</option><option>Bilsi</option><option>Bindki</option><option>Bisalpur</option><option>Bisanda Buzurg</option><option>Bisauli</option><option>Bisharatganj</option><option>Bisokhar</option><option>Biswan</option><option>Bithoor</option><option>Budaun</option><option>Budhana</option><option>Bugrasi</option><option>Bulandshahr</option><option>Chail</option><option>Chak Imam Ali</option><option>Chakeri</option><option>Chakia - Chandauli</option><option>Chandauli</option><option>Chandausi</option><option>Chandpur - Bijnor</option><option>Charkhari</option><option>Charthaval</option><option>Chaumuhan</option><option>Chhaprauli</option><option>Chharra Rafatpur</option><option>Chhata</option><option>Chhatari</option><option>Chhibramau</option><option>Chhutmalpur</option><option>Chilkana Sultanpur</option><option>Chirgaon</option><option>Chitbara Gaon</option><option>Chitrakoot Dham (Karwi)</option><option>Chopan</option><option>Choubepur Kalan</option><option>Chunar</option><option>Churk Ghurma</option><option>Colonelganj</option><option>Dadri</option><option>Dalmau</option><option>Dankaur</option><option>Dariyabad</option><option>Dasna</option><option>Dataganj</option><option>Daurala</option><option>Dayalbagh</option><option>Deoband</option><option>Deoranian</option><option>Deoria</option><option>Dewa</option><option>Dhampur</option><option>Dhanauha</option><option>Dhanauli</option><option>Dhanaura</option><option>Dharoti Khurd</option><option>Dhaura Tanda</option><option>Dhaurehra</option><option>Dibai</option><option>Dibiyapur</option><option>Dildarnagar Fatehpur Bazar</option><option>Doghat</option><option>Dohrighat</option><option>Dostpur</option><option>Dudhi</option><option>Dulhipur</option><option>Ekdil</option><option>Erich</option><option>Etah</option><option>Etawah</option><option>Etmadpur</option><option>Faizabad</option><option>Faizganj</option><option>Farah</option><option>Faridnagar</option><option>Faridpur</option><option>Fariha</option><option>Farrukhabad-cum-Fatehgarh</option><option>Fatehabad - Agra</option><option>Fatehganj Pashchimi</option><option>Fatehganj Purvi</option><option>Fatehgarh</option><option>Fatehpur - Barabanki</option><option>Fatehpur Chaurasi</option><option>Fatehpur Sikri</option><option>Firozabad</option><option>Gajraula</option><option>Gangaghat</option><option>Gangapur - Varanasi</option><option>Gangoh</option><option>Ganj Dundawara</option><option>Ganj Muradabad</option><option>Garautha</option><option>Garhi Pukhta</option><option>Garhmukteshwar</option><option>Gaura Barhaj</option><option>Gauri Bazar</option><option>Gausganj</option><option>Gawan</option><option>Ghatampur</option><option>Ghaziabad</option><option>Ghazipur</option><option>Ghiraur</option><option>Ghorawal</option><option>Ghosi</option><option>Ghosia Bazar</option><option>Ghughuli</option><option>Gohand</option><option>Gokul</option><option>Gola Bazar</option><option>Gola Gokarannath</option><option>Gonda</option><option>Gopamau</option><option>Gopiganj</option><option>Gorakhpur</option><option>Gosainganj</option><option>Govardhan</option><option>Greater Noida</option><option>Gulaothi</option><option>Gularia Bhindara</option><option>Gulariya</option><option>Gunnaur</option><option>Gursahaiganj</option><option>Gursarai</option><option>Gyanpur</option><option>Hafizpur</option><option>Haidergarh</option><option>Haldaur</option><option>Hamirpur</option><option>Handia</option><option>Hapur</option><option>Hardoi</option><option>Harduaganj</option><option>Hargaon</option><option>Hariharpur</option><option>Harraiya</option><option>Hasanpur</option><option>Hasayan</option><option>Hastinapur</option><option>Hata</option><option>Hathras</option><option>Hyderabad - Unnao</option><option>Ibrahimpur</option><option>Iglas</option><option>Ikauna</option><option>Iltifatganj Bazar</option><option>Indian Telephone Industry, Mankapur (Sp. Village)</option><option>Islamnagar</option><option>Jafarabad</option><option>Jagner</option><option>Jahanabad</option><option>Jahangirabad</option><option>Jahangirpur</option><option>Jais</option><option>Jaithara</option><option>Jalalabad - Bijnor</option><option>Jalalabad - Muzaffarnagar</option><option>Jalalabad - Shahjahanpur</option><option>Jalali</option><option>Jalalpur</option><option>Jalaun</option><option>Jalesar</option><option>Jamshila</option><option>Jangipur - Ghazipur</option><option>Jansath</option><option>Jarwal</option><option>Jasrana</option><option>Jaswantnagar</option><option>Jatari</option><option>Jaunpur</option><option>Jewar</option><option>Jhalu</option><option>Jhansi</option><option>Jhansi Rly. Settlement</option><option>Jhinjhak</option><option>Jhinjhana</option><option>Jhusi</option><option>Jhusi Kohna</option><option>Jiyanpur</option><option>Joya</option><option>Jyoti Khuria</option><option>Kabrai</option><option>Kachhauna Patseni</option><option>Kachhla</option><option>Kachhwa</option><option>Kadaura</option><option>Kadipur</option><option>Kailashpur</option><option>Kaimganj</option><option>Kairana</option><option>Kakgaina</option><option>Kakod</option><option>Kakrala</option><option>Kalinagar</option><option>Kalpi</option><option>Kamalganj</option><option>Kampil</option><option>Kandhla</option><option>Kandwa</option><option>Kannauj</option><option>Kanpur</option><option>Kanth - Moradabad</option><option>Kanth - Shahjahanpur</option><option>Kaptanganj</option><option>Karari</option><option>Karhal</option><option>Karnawal</option><option>Kasganj</option><option>Katariya</option><option>Katghar Lalganj</option><option>Kathera</option><option>Katra - Gonda</option><option>Katra - Shahjahanpur</option><option>Katra Medniganj</option><option>Kauriaganj</option><option>Kemri</option><option>Kerakat</option><option>Khadda</option><option>Khaga</option><option>Khailar</option><option>Khair</option><option>Khairabad - Mau</option><option>Khairabad - Sitapur</option><option>Khalilabad</option><option>Khamaria</option><option>Khanpur</option><option>Kharela</option><option>Khargupur</option><option>Khariya</option><option>Kharkhoda - Meerut</option><option>Khatauli</option><option>Khatauli Rural</option><option>Khekada</option><option>Kheragarh</option><option>Kheri</option><option>Kheta Sarai</option><option>Khudaganj</option><option>Khurja</option><option>Khutar</option><option>Kiraoli</option><option>Kiratpur</option><option>Kishni</option><option>Kishunpur</option><option>Kithaur</option><option>Koeripur</option><option>Konch</option><option>Kopaganj</option><option>Kora Jahanabad</option><option>Koraon</option><option>Korwa</option><option>Kosi Kalan</option><option>Kota - Sonbhadra</option><option>Kotra</option><option>Kotwa</option><option>Kul Pahar</option><option>Kunda</option><option>Kundarki</option><option>Kunwargaon</option><option>Kuraoli</option><option>Kurara</option><option>Kursath - Hardoi</option><option>Kursath - Unnao</option><option>Kurthi Jafarpur</option><option>Kushinagar</option><option>Kusmara</option><option>Laharpur</option><option>Lakhimpur</option><option>Lakhna</option><option>Lal Gopalganj Nindaura</option><option>Lalganj - Rae Bareli</option><option>Lalitpur</option><option>Lar</option><option>Lawar NP</option><option>Ledwa Mahua</option><option>Lohta</option><option>Loni</option><option>Lucknow</option><option>Machhlishahr</option><option>Madhoganj</option><option>Madhogarh</option><option>Maghar</option><option>Mahaban</option><option>Mahmudabad</option><option>Mahoba</option><option>Maholi</option><option>Mahrajganj - Azamgarh</option><option>Mahrajganj - Maharajganj</option><option>Mahrajganj - Rae Bareli</option><option>Mahroni</option><option>Mailani</option><option>Mainpuri</option><option>Majhara Pipar Ehatmali</option><option>Majhauli Raj</option><option>Mallawan</option><option>Mandawar - Bijnor</option><option>Manikpur - Pratapgarh</option><option>Manikpur Sarhat</option><option>Maniyar</option><option>Manjhanpur</option><option>Mankapur</option><option>Marehra</option><option>Mariahu</option><option>Maruadih Rly. Settlement</option><option>Maswasi</option><option>Mataundh</option><option>Mathura</option><option>Mau Aima</option><option>Maudaha</option><option>Maunath Bhanjan</option><option>Mauranipur</option><option>Maurawan</option><option>Mawana</option><option>Meerut</option><option>Mehdawal</option><option>Mehnagar</option><option>Mendu</option><option>Milak</option><option>Miranpur</option><option>Mirganj - Bareilly</option><option>Mirzapur-cum-Vindhyachal</option><option>Misrikh-cum-Neemsar</option><option>Modinagar</option><option>Mogra Badshahpur</option><option>Mohammadabad - Farrukhabad</option><option>Mohammadabad - Ghazipur</option><option>Mohammadi</option><option>Mohan</option><option>Mohanpur</option><option>Mohiuddinpur</option><option>Moradabad</option><option>Moth</option><option>Mubarakpur</option><option>Mughalsarai</option><option>Mughalsarai Rly. Settlement</option><option>Muhammadabad</option><option>Mukrampur Khema</option><option>Mundera Bazar</option><option>Mundia</option><option>Muradnagar</option><option>Mursan</option><option>Musafirkhana</option><option>Muzaffarnagar</option><option>Nadigaon</option><option>Nagina</option><option>Nai Bazar</option><option>Nainana Jat</option><option>Najibabad</option><option>Nakur</option><option>Nanauta</option><option>Nandgaon - Mathura</option><option>Nanpara</option><option>Naraini</option><option>Narauli</option><option>Naraura</option><option>Naugawan Sadat</option><option>Nautanwa</option><option>Nawabganj - Barabanki</option><option>Nawabganj - Bareilly</option><option>Nawabganj - Gonda</option><option>Nawabganj - Unnao</option><option>Nehtaur</option><option>Nichlaul</option><option>Nidhauli Kalan</option><option>Niwari - Ghaziabad</option><option>Nizamabad - Azamgarh</option><option>Noida</option><option>Noorpur</option><option>Northern Rly. Colony</option><option>Nyoria Husainpur</option><option>Nyotini</option><option>Obra</option><option>Oel Dhakwa</option><option>Orai</option><option>Oran</option><option>Ordnance Factory Muradnagar</option><option>Pachperwa</option><option>Padrauna</option><option>Pahasu</option><option>Paintepur</option><option>Pali - Hardoi</option><option>Pali - Lalitpur</option><option>Palia Kalan</option><option>Parasi</option><option>Parichha</option><option>Parikshitgarh</option><option>Parsadepur</option><option>Patala</option><option>Patiyali</option><option>Patti - Pratapgarh</option><option>Phalauda</option><option>Phaphund</option><option>Phulpur - Allahabad</option><option>Phulpur - Azamgarh</option><option>Phulwaria</option><option>Pihani</option><option>Pilibhit</option><option>Pilkhana</option><option>Pilkhuwa</option><option>Pinahat</option><option>Pipalsana Chaudhari</option><option>Pipiganj</option><option>Pipraich</option><option>Pipri</option><option>Powayan</option><option>Pratapgarh City</option><option>Pukhrayan</option><option>Puranpur</option><option>Purdilnagar</option><option>Purquazi</option><option>Purwa</option><option>Qasimpur Power House Colony</option><option>Rabupura</option><option>Radhakund</option><option>Rae Bareli</option><option>Raja Ka Rampur</option><option>Rajapur - Chitrakoot</option><option>Ramkola</option><option>Ramnagar - Barabanki</option><option>Ramnagar - Varanasi</option><option>Rampur</option><option>Rampur Bhawanipur</option><option>Rampur Karkhana</option><option>Rampur Maniharan</option><option>Rampura - Jalaun</option><option>Ranipur</option><option>Rashidpur Garhi</option><option>Rasra</option><option>Rasulabad</option><option>Rath</option><option>Raya</option><option>Renukoot</option><option>Reoti</option><option>Richha</option><option>Risia Bazar</option><option>Rithora</option><option>Rly. Settlement Roza</option><option>Robertsganj</option><option>Rudauli</option><option>Rudayan</option><option>Rudrapur - Deoria</option><option>Rura</option><option>Rustamnagar Sahaspur</option><option>Sadabad</option><option>Sadat</option><option>Safipur</option><option>Sahanpur</option><option>Saharanpur</option><option>Sahaspur</option><option>Sahaswan</option><option>Sahatwar</option><option>Sahawar</option><option>Sahjanwa</option><option>Sahpau NP</option><option>Saidpur - Budaun</option><option>Saidpur - Ghazipur</option><option>Sainthal</option><option>Saiyad Raja</option><option>Sakhanu</option><option>Sakit</option><option>Salarpur Khadar</option><option>Salempur</option><option>Salon</option><option>Sambhal</option><option>Samdhan</option><option>Samthar</option><option>Sandi</option><option>Sandila</option><option>Sarai Aquil</option><option>Sarai Mir</option><option>Sardhana</option><option>Sarila</option><option>Sarsawan</option><option>Sasni</option><option>Satrikh</option><option>Saunkh</option><option>Saurikh</option><option>Seohara</option><option>Sewalkhas</option><option>Sewarhi</option><option>Shahabad - Hardoi</option><option>Shahabad - Rampur</option><option>Shahganj</option><option>Shahi</option><option>Shahjahanpur</option><option>Shahpur - Muzaffarnagar</option><option>Shamli</option><option>Shamsabad - Agra</option><option>Shamsabad - Farrukhabad</option><option>Shankargarh</option><option>Shergarh</option><option>Sherkot</option><option>Shikarpur - Bulandshahr</option><option>Shikohabad</option><option>Shishgarh</option><option>Shivdaspur</option><option>Shivli</option><option>Shivrajpur</option><option>Shohratgarh</option><option>Siana</option><option>Siddhaur</option><option>Sidhauli</option><option>Sidhpura</option><option>Sikanderpur - Ballia</option><option>Sikanderpur - Kannauj</option><option>Sikandra</option><option>Sikandra Rao</option><option>Sikandrabad</option><option>Singahi Bhiraura</option><option>Sirathu</option><option>Sirauli</option><option>Sirsa - Allahabad</option><option>Sirsaganj</option><option>Sirsi - Moradabad</option><option>Sisauli</option><option>Siswa Bazar</option><option>Sitapur</option><option>Som</option><option>Soron</option><option>Suar</option><option>Sukhmalpur Nizamabad</option><option>Sultanpur - Sultanpur</option><option>Sumerpur - Hamirpur</option><option>Suriyawan</option><option>Swamibagh</option><option>Talbehat</option><option>Talgram</option><option>Tambaur-cum-Ahmedabad</option><option>Tanda - Ambedaker Nagar</option><option>Tanda - Rampur</option><option>Tatarpur Lallu</option><option>Tetri Bazar</option><option>Thakurdwara</option><option>Thana Bhawan</option><option>Thiriya Nizamat Khan</option><option>Tikait Nagar</option><option>Tikri</option><option>Tilhar</option><option>Tindwari</option><option>Tirwaganj</option><option>Titron</option><option>Tondi Fatehpur</option><option>Tulsipur</option><option>Tundla</option><option>Tundla Kham</option><option>Tundla Rly. Colony</option><option>Ugu</option><option>Ujhani</option><option>Ujhari</option><option>Umri</option><option>Umri Kalan</option><option>Un - Muzaffarnagar</option><option>Unchahar</option><option>Unnao</option><option>Usawan</option><option>Usehat</option><option>Utraula</option><option>Varanasi</option><option>Vijaigarh</option><option>Vrindavan</option><option>Warhapur</option><option>Wazirganj</option><option>Zaidpur</option><option>Zamania</option>");
}

else if (val == "Uttaranchal")
{
	 $("#city").html("<option>Almora</option><option>Badrinathpuri</option><option>Bageshwar</option><option>Bajpur</option><option>Banbasa</option><option>Bandia</option><option>Barkot</option><option>Bharat Heavy Electrical Limited Ranipur</option><option>Bhimtal</option><option>Bhowali</option><option>Chamba - Tehri Garhwal</option><option>Chamoli Gopeshwar</option><option>Champawat</option><option>Dehradun</option><option>Dev Prayag - Pauri Garhwal</option><option>Dev Prayag - Tehri Garhwal</option><option>Dhaluwala</option><option>Dhandera</option><option>Dharchula</option><option>Dharchula Dehat</option><option>Didihat</option><option>Dineshpur</option><option>Dogadda</option><option>Dwarahat</option><option>Gadarpur</option><option>Gangotri</option><option>Gochar</option><option>Haldwani-cum-Kathgodam</option><option>Hardwar</option><option>Jaspur</option><option>Jhabrera</option><option>Joshimath</option><option>Kachnal Gosain</option><option>Kaladungi</option><option>Karn Prayag</option><option>Kashipur</option><option>Kashirampur</option><option>Kedarnath</option><option>Kela Khera</option><option>Khatima</option><option>Kichha</option><option>Kirtinagar</option><option>Kotdwara</option><option>Laksar</option><option>Lalkuan</option><option>Landaura</option><option>Lansdowne</option><option>Lohaghat</option><option>Mahua Dabra Haripura</option><option>Mahua Kheraganj</option><option>Manglaur</option><option>Mohanpur Mohammadpur</option><option>Muni Ki Reti</option><option>Nagla</option><option>Nainital</option><option>Nand Prayag</option><option>Narendra Nagar</option><option>Pauri</option><option>Pithoragarh</option><option>Ramnagar - Nainital</option><option>Ranikhet</option><option>Rishikesh</option><option>Roorkee</option><option>Rudra Prayag</option><option>Rudrapur - Udham Singh Nagar</option><option>Shaktigarh</option><option>Sitarganj</option><option>Srinagar - Pauri Garhwal</option><option>Sultanpur - Udham Singh Nagar</option><option>Tanakpur</option><option>Tehri</option><option>Uttarakhand</option><option>Uttarkashi</option>");
}

else if (val == "West Bengal")
{
	 $("#city").html("<option>Howrah</option><option>Kolkata</option></optgroup><option>Adra</option><option>Ahmadpur - Birbhum</option><option>Aiho</option><option>Aistala</option><option>Alipurduar</option><option>Alipurduar Rly.Jnc.</option><option>Alpur</option><option>Amkula</option><option>Amodghata</option><option>Amtala</option><option>Andul</option><option>Anksa</option><option>Ankurhati</option><option>Anup Nagar</option><option>Arambag</option><option>Argari</option><option>Arra</option><option>Asansol</option><option>Ashoknagar Kalyangarh</option><option>Aurangabad - Murshidabad</option><option>Bablari Dewanganj</option><option>Badhagachhi</option><option>Baduria</option><option>Bagnan</option><option>Baharampur</option><option>Bahirgram</option><option>Bahula</option><option>Baidyabati</option><option>Bairatisal</option><option>Balaram Pota</option><option>Balarampur - 24 Parganas</option><option>Balarampur - Puruliya</option><option>Balichak</option><option>Ballavpur</option><option>Bally</option><option>Balurghat</option><option>Bamunari</option><option>Banarhat Tea Garden</option><option>Bangaon</option><option>Bankra</option><option>Bankura</option><option>Bansberia</option><option>Banshra</option><option>Banupur</option><option>Bara Bamonia</option><option>Barabazar</option><option>Baranagar</option><option>Barasat</option><option>Barddhaman</option><option>Barijhati</option><option>Barjora</option><option>Barrackpur</option><option>Barrackpur Cantonment</option><option>Baruihuda</option><option>Baruipur</option><option>Basirhat</option><option>Baska</option><option>Begampur</option><option>Beldanga</option><option>Beldubi</option><option>Belebathan</option><option>Beliatore</option><option>Bhadreswar</option><option>Bhandardaha</option><option>Bhangar Raghunathpur</option><option>Bhangri Pratham Khanda</option><option>Bhanowara</option><option>Bhatpara</option><option>Bholar Dabri</option><option>Bidhan Nagar</option><option>Bikihakola</option><option>Bilandapur</option><option>Bilpahari</option><option>Bipra Noapara</option><option>Birlapur</option><option>Birnagar</option><option>Bishnupur - 24 Parganas</option><option>Bishnupur - Bankura</option><option>Bolpur</option><option>Bowali</option><option>Budge Budge</option><option>Cart Road</option><option>Chachanda</option><option>Chak Bankola</option><option>Chak Bansberia</option><option>Chak Enayetnagar</option><option>Chak Kashipur</option><option>Chakapara</option><option>Chakdaha</option><option>Champdani</option><option>Chamrail</option><option>Chandannagar</option><option>Chandpur - 24 Parganas</option><option>Chandrakona</option><option>Chapari</option><option>Chapui</option><option>Char Brahmanagar</option><option>Char Maijdia</option><option>Charka</option><option>Chata Kalikapur</option><option>Chechakhata</option><option>Chelad</option><option>Chhora</option><option>Chikrand</option><option>Chittaranjan</option><option>Contai</option><option>Cooch Behar</option><option>Dafahat</option><option>Dainhat</option><option>Dakshin Baguan</option><option>Dakshin Jhapardaha</option><option>Dakshin Rajyadharpur</option><option>Dalkhola</option><option>Dalurband</option><option>Darappur</option><option>Darjiling</option><option>Debipur</option><option>Deuli</option><option>Dhakuria</option><option>Dhandadihi</option><option>Dhanyakuria</option><option>Dharmapur</option><option>Dhatrigram</option><option>Dhuilya</option><option>Dhulian</option><option>Dhupguri</option><option>Dhusaripara</option><option>Diamond Harbour</option><option>Dignala</option><option>Dinhata</option><option>Domjur</option><option>Dubrajpur</option><option>Dumdum</option><option>Durgapur - Barddhaman</option><option>Durllabhganj</option><option>Egra</option><option>Eksara</option><option>English Bazar</option><option>Falakata</option><option>Farrakka Barrage Township</option><option>Fatellapur</option><option>Gabberia</option><option>Gairkata</option><option>Gangarampur</option><option>Garalgachha</option><option>Garshyamnagar</option><option>Garulia</option><option>Gayespur</option><option>Ghatal</option><option>Ghorsala</option><option>Goaljan</option><option>Goasafat</option><option>Gobardanga</option><option>Gopalpur - Nadia</option><option>Gopinathpur</option><option>Gora Bazar</option><option>Guma</option><option>Guriahati</option><option>Guskara</option><option>Habra</option><option>Haldia</option><option>Haldibari</option><option>Halisahar</option><option>Harharia Chak</option><option>Haripur</option><option>Harishpur</option><option>Hatgachha</option><option>Hatsimla</option><option>Hijuli</option><option>Hindusthan Cables Town</option><option>Hooghly</option><option>Hugli-Chinsurah</option><option>Ichhapur Defence Estate</option><option>Islampur - Uttar Dinajpur</option><option>Jafarpur</option><option>Jagadanandapur</option><option>Jagadishpur</option><option>Jagtaj</option><option>Jala Kendua</option><option>Jalpaiguri</option><option>Jamuria</option><option>Jangipur - Murshidabad</option><option>Jaygaon</option><option>Jaynagar Mazilpur</option><option>Jemari</option><option>Jemari (J.K. Nagar Township)</option><option>Jetia</option><option>Jhalda</option><option>Jhargram</option><option>Jhorhat</option><option>Jiaganj Azimganj</option><option>Jot Kamal</option><option>Kachu Pukur</option><option>Kajora</option><option>Kakdihi</option><option>Kalara</option><option>Kaliaganj</option><option>Kalimpong</option><option>Kalna</option><option>Kalyani</option><option>Kamarhati</option><option>Kanaipur</option><option>Kanchrapara</option><option>Kandi</option><option>Kankuria</option><option>Kantlia</option><option>Kanyanagar</option><option>Karimpur</option><option>Kasba - Uttar Dinajpur</option><option>Kasim Bazar</option><option>Katwa</option><option>Kaugachhi</option><option>Kenda</option><option>Kendra Khottamdi</option><option>Kendua</option><option>Kesabpur</option><option>Khagrabari</option><option>Khalia</option><option>Khalor</option><option>Khandra</option><option>Khantora</option><option>Kharagpur - Medinipur</option><option>Kharagpur Rly. Settlement</option><option>Kharar - Medinipur</option><option>Khardaha</option><option>Kharimala Khagrabari</option><option>Kharsarai</option><option>Khodarampur</option><option>Koch Bihar</option><option>Kodalia</option><option>Kolaghat</option><option>Konardihi</option><option>Konnagar</option><option>Krishnanagar</option><option>Krishnapur</option><option>Kshidirpur</option><option>Kshirpai</option><option>Kulihanda</option><option>Kulti</option><option>Kunustara</option><option>Kurseong</option><option>Madanpur</option><option>Madhusudanpur</option><option>Madhyamgram</option><option>Maheshtala</option><option>Mahiari</option><option>Mahira</option><option>Mainaguri</option><option>Makardaha</option><option>Mal</option><option>Mandarbani</option><option>Manikpur - Haora</option><option>Mansinhapur</option><option>Maslandapur</option><option>Mathabhanga</option><option>Medinipur</option><option>Mekliganj</option><option>Memari</option><option>Midnapore</option><option>Mirik</option><option>Monoharpur</option><option>Mrigala</option><option>Muragachha</option><option>Murgathaul</option><option>Murshidabad</option><option>Nabadwip</option><option>Nabagram</option><option>Nabagram Colony</option><option>Nabgram</option><option>Nachhratpur Katabari</option><option>Naihati</option><option>Nasra</option><option>Natibpur</option><option>Naupala</option><option>Nebadhai Duttapukur</option><option>New Barrackpur</option><option>Nibra</option><option>Nokpul</option><option>North Barrackpur</option><option>North Dumdum</option><option>Old Maldah</option><option>Ondal</option><option>Pairagachha</option><option>Palashban</option><option>Panchla</option><option>Panchpara</option><option>Pandua</option><option>Pangachhiya (B)</option><option>Paniara</option><option>Panihati</option><option>Panuhat</option><option>Par Beliya</option><option>Parashkol</option><option>Parasia</option><option>Parbbatipur</option><option>Paschim Jitpur</option><option>Paschim Punropara</option><option>Pattabong Tea Garden</option><option>Patuli</option><option>Patulia</option><option>Phulia</option><option>Podara</option><option>Prayagpur</option><option>Pujali</option><option>Purba Tajpur</option><option>Puruliya</option><option>Raghudebbati</option><option>Raghunathchak</option><option>Raghunathpur - Hugli</option><option>Raghunathpur - Puruliya</option><option>Raigachhi</option><option>Raiganj</option><option>Rajarhat Gopalpur</option><option>Rajpur Sonarpur</option><option>Ramchandrapur</option><option>Ramjibanpur</option><option>Ramnagar - Barddhaman</option><option>Rampurhat</option><option>Ranaghat</option><option>Raniganj</option><option>Ratibati</option><option>Rishra</option><option>Ruiya</option><option>S.T. Power Project Town</option><option>Sadpur</option><option>Sahajadpur</option><option>Sahapur</option><option>Sainthia</option><option>Salap</option><option>Sankarpur</option><option>Sankrail</option><option>Santipur</option><option>Santoshpur</option><option>Sarenga</option><option>Sarpi</option><option>Satigachha</option><option>Serampore</option><option>Serpur</option><option>Shankhanagar</option><option>Siduli</option><option>Siliguri - Darjiling</option><option>Siliguri - Jalpaiguri</option><option>Simla</option><option>Singur</option><option>Sirsha</option><option>Sobhaganj</option><option>Sonamukhi</option><option>Sonatikiri</option><option>South Dumdum</option><option>Srikantabati</option><option>Srirampur</option><option>Sukdal</option><option>Suri</option><option>Taherpur</option><option>Taki</option><option>Talbandha</option><option>Tamluk</option><option>Tarakeswar</option><option>Tentulkuli</option><option>Titagarh</option><option>Tufanganj</option><option>Ukhra</option><option>Uluberia</option><option>Uttar Bagdogra</option><option>Uttar Durgapur</option><option>Uttar Goara</option><option>Uttar Kalas</option><option>Uttar Kamakhyaguri</option><option>Uttar Latabari</option><option>Uttar Mahammadpur</option><option>Uttar Pirpur</option><option>Uttar Raypur</option><option>Uttarpara Kotrung</option>");
}
		
    });
});
  </script>
  <select name="ddlstate" class="list4" id="state">
<option><?php echo $state ?></option>
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

</td>
</tr>
<tr>
<td>Native City</td><td>


<select name="txtcity" class="list4" id="city">
     <option><?php echo $city ?></option>
     </select>
</td>
</tr>
<tr>
<td>Mobile</td><td>
<input name="txtmob" type="text" value="<?php echo $mobile; ?>" class="txtbx1" maxlength="35">

</td>
</tr>
<tr>
<td>Email</td><td>
<?php echo $email; ?>
</td>
</tr>


</table>

<table class="edtable">

<tr>
<td></td><td>
<br /><br />
<input name="btnacti" type="submit" value="Deactivate" class="submit" style="background-color:#ff0000;">
<input name="btnsubmit" type="submit" value="Update" class="submit" style="background-color:#ff0000;">
&nbsp;&nbsp;
<input name="btndelete" type="submit" value="Delete" class="submit" style="background-color:#ff0000;" onclick="return confirm('Are you sure you would like to accept this reply as your favor?');">

</td>
</tr>
</table>
</form>

</div>






</div>
 </div>
<div class="regright">

</div>

</div>

</div>
</div>
</div>


</body>
</html>