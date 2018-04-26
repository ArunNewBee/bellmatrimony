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
<?php
include_once("php_includes/db_conx.php");
 
 
 $rel=$_POST["rel"];
 $caste=$_POST["caste"];
 $gender=$_POST["gender"];
 $employ=$_POST["employ"];
 
 $srch="";
 
 if($rel=="All"){$srch="";}
 else{$srch="AND religion='$rel'";}
 
 if($caste=="All"){$srch=$srch."";}
 else{$srch=$srch."AND caste='$caste'";}
 
 $srch=$srch."AND gender='$gender'";
 
 if($employ=="All"){$srch=$srch."";}
 else{$srch=$srch."AND employedin='$employ'";}
 
 
 $result=mysqli_query($db_conx,"SELECT * FROM users where activated='1' $srch");
 $found=mysqli_fetch_row($result);

 if($found>0){
	
    while($row=mysqli_fetch_assoc($result)){
		$dob = $row["dob"];
	$date = new DateTime($dob);
	$today = new DateTime('today');
	$a=$date->diff($today)->y;
	$im=$row['avatar'];
	$gender = $row["gender"];
	$pro="user/$row[id]/$row[avatar]";
	if($gender=='female'){$class='fm';}else if($gender=='male'){$class='ma';}
	
    echo "<li>
	<p class='ithd'>$row[username]</p>
	<div class='tabho'>
	<span class='cr'>created in: $row[signup]&nbsp;&nbsp;&nbsp;last login:$row[lastlogin]</span>
	<div class='ittab'>
	
	<div class='ast'>
	<img src='$pro' class='itim $class'>
	</div>
	<div class='and'>
	<table>
	<tr>
	<td class='onnu'>
	Age/Height
	</td>
	<td>$a / $row[height]</td>
	</tr>
	<tr>
	<td>Religion</td>
	<td>$row[religion]</td>
	</tr>
	<tr>
	<td>Caste</td>
	<td>$row[caste]</td>
	</tr>
	<tr>
	<td>Mother Tongue</td>
	<td>$row[mothertongue]</td>
	</tr>
	<tr>
	<td>State</td>
	<td>$row[state]</td>
	</tr>
	<tr>
	<td>Location</td>
	<td>$row[city]</td>
	</tr>
	<tr>
	<td>Education</td>
	<td>$row[education]</td>
	</tr>
	<tr>
	<td>Profession</td>
	<td>$row[occupation]</td>
	</tr>
	</table>
	</div>
	<div class='ard'>
	<a href='profile.php?id=$row[id]' class='lnk'>VIEW PROFILE</a>
	</div>
	
	</div>
	</div>
	</li>";
    }   
 }else{
    echo "<li>Your search not found<li>";
 }
 
 // ajax search


 
?>