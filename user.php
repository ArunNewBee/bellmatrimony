<?php include_once("php_includes/check_login_status.php");
$profile_name="";
$age="";

// Select the member from the users table
$sql = "SELECT * FROM users WHERE id='$log_id' AND activated='1' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}

// Fetch the user row from the query above
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$profile_name = $row["username"];
	$profile_id = $row["id"];
	$avatar = $row["avatar"];
	$gender = $row["gender"];
	if($gender=='female'){$class='fm';}else if($gender=='male'){$class='ma';}
	$im="user/".$profile_id."/".$avatar;
    
	$dob = $row["dob"];
	$date = new DateTime($dob);
	$today = new DateTime('today');
    $mstatus = $row["mstatus"];
	$mothertongue = $row["mothertongue"];
	$height = $row["height"];
	$weight = $row["weight"];
	if($weight=="" || $weight==NULL)
	{
		$wei="Don't know";
	}
	else
	{
	$wei=$weight ." Kg";
	}
	$complexion = $row["complexion"];
	if($complexion=="" || $complexion==NULL)
	{
		$complexion="Not Available";
	}
	
	$bodytype = $row["bodytype"];
	if($bodytype=="" || $bodytype==NULL)
	{
		$bodytype="Not Available";
	}
	$food = $row["food"];
	$smoke = $row["smoke"];
	$drink = $row["drink"];
	$physical = $row["physicalstatus"];
	$religion=$row["religion"];
	if($religion!="Hindu")
	{
		$rel='<div style="display:none;">';
		$rel1='<div style="display:block;">';
	}
	else
	{
		$rel='<div style="display:block;">';
		$rel1='<div style="display:none;">';
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
		$star="Not Available";
	}
	$raasi=$row["raasi"];
	if($raasi=="Select" || $raasi=="" || $raasi==NULL)
	{
		$raasi="Don't know";
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
		$fjob="Not Available";
	}
	$mname=$row["mname"];
	if($mname=="" || $mname==NULL)
	{
		$mname="Not Available";
	}
	$mjob=$row["mjob"];
	if($mjob=="Select" || $mjob=="" || $mjob==NULL)
	{
		$mjob="Not Available";
	}
	$famstatus=$row["familystatus"];
	$famtype=$row["familytype"];
	$famvalues=$row["familyvalues"];
	$quali=$row["education"];
	$occup=$row["occupation"];
	$empin=$row["employedin"];
	$income=$row["income"];
	if($income=="" || $income==NULL)
	{
		$income="Not Available";
	}
	$country=$row["country"];
	$state=$row["state"];
	$city=$row["city"];
	$mobile=$row["mobile"];
	$email=$row["email"];
	$aboutme=$row["aboutme"];
	$me=$row["username"];
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
	$ums=$row["umasis"];
	$ms=$row["masis"];
	$umb=$row["umabro"];
	$mb=$row["mabro"];
}





?>



<?php
$friendsHTML = '';
$friends_view_all_link = '';
$sql = "SELECT COUNT(id) FROM friends WHERE user1='$profile_id' AND accepted='1' OR user2='$profile_id' AND accepted='1'";
$query = mysqli_query($db_conx, $sql);
$query_count = mysqli_fetch_row($query);
$friend_count = $query_count[0];
if($friend_count < 1){
	$friendsHTML = $profile_name." has no friends yet";
} else {
	$max = 18;
	$all_friends = array();
	$sql = "SELECT user1 FROM friends WHERE user2='$profile_id' AND accepted='1' ORDER BY RAND() LIMIT $max";
	$query = mysqli_query($db_conx, $sql);
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		array_push($all_friends, $row["user1"]);
	}
	$sql = "SELECT user2 FROM friends WHERE user1='$profile_id' AND accepted='1' ORDER BY RAND() LIMIT $max";
	$query = mysqli_query($db_conx, $sql);
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		array_push($all_friends, $row["user2"]);
	}
	$friendArrayCount = count($all_friends);
	if($friendArrayCount > $max){
		array_splice($all_friends, $max);
	}
	if($friend_count > $max){
		$friends_view_all_link = '<a href="view_friends.php?u='.$profile_name.'">view all</a>';
	}
	$orLogic = '';
	foreach($all_friends as $key => $user){
			$orLogic .= "id='$user' OR ";
	}
	$orLogic = chop($orLogic, "OR ");
	$sql = "SELECT id, username, avatar, gender FROM users WHERE $orLogic";
	$query = mysqli_query($db_conx, $sql);
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$friend_username = $row["username"];
		$friend_id = $row["id"];
		$friend_avatar = $row["avatar"];
		$friend_pic = 'user/'.$friend_id.'/'.$friend_avatar;
		$friend_gender = $row["gender"];
		if($friend_gender=='female'){$class1='fm1';}else if($friend_gender=='male'){$class1='ma1';}
		$friendsHTML .= '<a href="profile.php?id='.$friend_id.'"><img class="friendpics '.$class1.'"  src="'.$friend_pic.'" alt="'.$friend_username.'" title="'.$friend_username.'"></a>';
	}
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>My Profile</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
    $(".fm").error(function(){
        $(this).attr('src', './images/girl.jpg');
    });
	$(".ma").error(function(){
        $(this).attr('src', './images/boy.jpg');
    });
});
</script>
<script>
$(document).ready(function()
{
    $(".fm1").error(function(){
        $(this).attr('src', './images/girl.jpg');
    });
	$(".ma1").error(function(){
        $(this).attr('src', './images/boy.jpg');
    });
});
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
	</script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<?php include_once("template_pageTop2.php"); ?>
<div class="content">
  <div class="subcontent padtb">

<div class="table border">

<div class="regleft">
<div class="cover">
<img src="images/back.jpg" width="100%" height=250px; style="z-index:0;">
</div>
<div class="covmenu">
<div class="table bdrbot">
<div class="covitem">
<div class="dpholder">
<img src="<?php echo $im; ?>" style="width:100%;" class="<?php echo $class; ?>" >
</div>
</div>
<div class="covitem1">
<ul class="minimenu">
<li class="fst"><a href="#about">About</a></li>
<li><a href="#friends">Friends</a></li>
<li><a href="#photo">Photos</a></li>
</ul>
</div>
</div>

<div class="incon">
<p class="username">
<?php echo $me; ?>
</p>
<div class="table" style="padding-top:10px;">
<div class="half">
<table>
<tr class="desk">
<td><a href="upload_crop.php" class="ulnk">Upload profile picture</a></td>
</tr>
<tr class="mob">
<td><a href="mobphoto.php" class="ulnk">Upload profile picture</a></td>
</tr>
<tr>
<td><a href="edit.php" class="ulnk">Edit profile</a></td>
</tr>
<tr>
<td><a href="Additionalphoto.php" class="ulnk">Upload photo</a></td>
</tr>
<tr>
<td><a href="changepassword.php" class="ulnk">Change password</a></td>
</tr>
</table>
</div>
<div class="halfsp"></div>
<div class="halfsp"></div>
<div class="half">

</div>
</div>


<p class="userhd" id="about">
About
</p>
<p class="usersubhd">
About myself
</p>
<table width="100%" style="color:#565656;">
<tr>
<td><?php echo $aboutme; ?></td>
</tr>
</table>
<p class="usersubhd">
Basics & Lifestyle
</p>
<div class="table">
<div class="half"">
<table>
<tr>
<td>Age</td><td><?php echo $date->diff($today)->y; ?></td>
</tr>
<tr>
<td>Date of birth</td><td><?php echo $date->format('d-m-Y'); ?></td>
</tr>
<tr>
<td>Mother Tongue</td>
<td><?php echo $mothertongue; ?></td>
</tr>
<tr>
<td>Marital Status</td><td><?php echo $mstatus; ?></td>
</tr>
<tr>
<td>Height</td><td><?php echo $height; ?></td>
</tr>
<tr>
<td>Weight</td><td><?php echo $wei; ?></td>
</tr>


</table>
</div>
<div class="halfsp"></div>
<div class="halfsp spb"></div>
<div class="half"">
<table>

<tr>
<td>Complexion</td><td><?php echo $complexion; ?></td>
</tr>
<tr>
<td>Body Type</td><td><?php echo $bodytype; ?></td>
</tr>
<tr>
<td>Food</td><td><?php echo $food; ?></td>
</tr>
<tr>
<td>Smoke</td><td><?php echo $smoke; ?></td>
</tr>
<tr>
<td>Drink</td><td><?php echo $drink; ?></td>
</tr>
<tr>
<td>Physical Status</td><td><?php echo $physical; ?></td>
</tr>

</table>
</div>
</div>

<?php echo $rel; ?>
<p class="usersubhd">
Religious Background & Astrology
</p>
<div class="table">
<div class="half"">
<table>
<tr>
<td>Religion</td>
<td><?php echo $religion; ?></td>
</tr>
<tr>
<td>Caste</td>
<td><?php echo $caste; ?></td>
</tr>
<tr>
<td>Sub-caste</td>
<td><?php echo $subcaste; ?></td>
</tr>
<tr>
<td>Gothram</td>
<td><?php echo $gothram; ?></td>
</tr>
<tr>
<td>Date of Birth</td><td><?php echo $date->format('d-m-Y'); ?></td>
</tr>


</table>
</div>
<div class="halfsp"></div>
<div class="halfsp spb"></div>
<div class="half"">
<table>
<tr>
<td>Nakshatra</td><td><?php echo $star; ?></td>
</tr>
<tr>
<td>Raasi</td>
<td><?php echo $raasi; ?></td>
</tr>
<tr>
<td>Shuddham</td><td><?php echo $shuddham; ?></td>
</tr>
<tr>
<td>Dosham</td><td><?php echo $dhosham; ?></td>
</tr>



</table>
</div>
</div>

<div class="table apad">
<div class="half1 bsp">
<table class="grh2">

<tr>
<td>
  <?php echo $gr1;?>
</td>
<td><?php echo $gr2;?></td>
<td><?php echo $gr3;?></td>
<td><?php echo $gr4;?></td>
</tr>

<tr>
<td><?php echo $gr5;?></td>
<td colspan="2" rowspan="2" style="text-align:center" class="centd">Grahanila</td>
<td><?php echo $gr6;?></td>
</tr>

<tr>
<td><?php echo $gr7;?></td>
<td><?php echo $gr8;?></td>
</tr>

<tr>
<td><?php echo $gr9;?></td>
<td><?php echo $gr10;?></td>
<td><?php echo $gr11;?></td>
<td><?php echo $gr12;?></td>
</tr>

</table>
</div>
<div class="halfsp"></div>
<div class="halfsp spb"></div>
<div class="half1"">
<table class="grh2">

<tr>
<td>
  <?php echo $am1;?>
</td>
<td><?php echo $am2;?></td>
<td><?php echo $am3;?></td>
<td><?php echo $am4;?></td>
</tr>

<tr>
<td><?php echo $am5;?></td>
<td colspan="2" rowspan="2" style="text-align:center" class="centd">Navamsakam</td>
<td><?php echo $am6;?></td>
</tr>

<tr>
<td><?php echo $am7;?></td>
<td><?php echo $am8;?></td>
</tr>

<tr>
<td><?php echo $am9;?></td>
<td><?php echo $am10;?></td>
<td><?php echo $am11;?></td>
<td><?php echo $am12;?></td>
</tr>

</table>
</div>
</div>


</div>

<?php echo $rel1; ?>
<p class="usersubhd">
Religious Background
</p>
<div class="table">
<div class="half"">
<table>
<tr>
<td>Religion</td>
<td><?php echo $religion; ?></td>
</tr>
<tr>
<td>Caste</td>
<td><?php echo $caste; ?></td>
</tr>

<tr>




</table>
</div>
<div class="halfsp"></div>
<div class="halfsp spb"></div>
<div class="half"">
<table>
<tr>
<td>Sub-caste</td>
<td><?php echo $subcaste; ?></td>
</tr>
<tr>
<td>Date of Birth</td><td><?php echo $date->format('d-m-Y'); ?></td>
</tr>



</table>
</div>
</div>



</div>


<p class="usersubhd">
Family Details
</p>
<div class="table">
<div class="half"">
<table>
<tr>
<td>Father's Name</td><td><?php echo $fname; ?></td>
</tr>
<tr>
<td>Father's Job</td><td><?php echo $fjob; ?></td>
</tr>
<tr>
<td>Mother's Name</td>
<td><?php echo $mname; ?></td>
</tr>
<tr>
<td>Mother's Job</td><td><?php echo $mjob; ?></td>
</tr>
<tr>
<td>Sisters(unmarried)</td><td><?php echo $ums; ?></td>
</tr>
<tr>
<td>Sisters(married)</td><td><?php echo $ms; ?></td>
</tr>

</table>
</div>
<div class="halfsp"></div>
<div class="halfsp spb"></div>
<div class="half"">
<table>

<tr>
<td>Brothers(unmarried)</td><td><?php echo $umb; ?></td>
</tr>
<tr>
<td>Brothers(married)</td><td><?php echo $mb; ?></td>
</tr>
<tr>
<td>Family Status</td><td><?php echo $famstatus; ?></td>
</tr>
<tr>
<td>Family Type</td><td><?php echo $famtype; ?></td>
</tr>
<tr>
<td>Family Values</td><td><?php echo $famvalues; ?></td>
</tr>


</table>
</div>
</div>

<p class="usersubhd">
Education & Occupation
</p>
<div class="table">
<div class="half"">
<table>
<tr>
<td>Qualification</td><td><?php echo $quali; ?></td>
</tr>
<tr>
<td>Occupation</td><td><?php echo $occup; ?></td>
</tr>


</table>
</div>
<div class="halfsp"></div>
<div class="halfsp spb"></div>
<div class="half"">
<table>

<tr>
<td>Employed in</td><td><?php echo $empin; ?></td>
</tr>
<tr>
<td>Income</td><td><?php echo $income; ?></td>
</tr>


</table>
</div>
</div>

<p class="usersubhd">
Location & Contact Details
</p>
<div class="table">
<div class="half"">
<table>
<tr>
<td>Country living in</td><td><?php echo $country; ?></td>
</tr>
<tr>
<td>Native State</td><td><?php echo $state; ?></td>
</tr>
<tr>
<td>Native City</td><td><?php echo $city; ?></td>
</tr>


</table>
</div>
<div class="halfsp"></div>
<div class="halfsp spb"></div>
<div class="half"">
<table>

<tr>
<td>Mobile</td><td><?php echo $mobile; ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $email; ?></td>
</tr>


</table>
</div>
</div>

<p class="userhd" style="margin-bottom:30px;" id="friends">
Friends
</p>
<p><?php echo $friendsHTML; ?></p>
<p class="userhd" style="margin-bottom:30px;" id="photo">
Photos
</p>
<?php
$qry="SELECT * FROM photos WHERE user='$log_id'";
$result=mysqli_query($db_conx,$qry);
echo "<ul class=mem1>";


while($row=mysqli_fetch_array($result))
{

echo "<li><img src=user/".$row["user"]."/".$row["filename"]." class=po></li>";

}
echo "</ul>";

?>

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