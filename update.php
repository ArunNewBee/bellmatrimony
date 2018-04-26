<?php

	
	include_once("php_includes/db_conx.php");
	$mstatus = $_REQUEST['mstatus'];
	$txtsubcaste = $_REQUEST['txtsubcaste'];
	$txtgothram = $_REQUEST['txtgothram'];
	$ddlstate = $_REQUEST['ddlstate'];
	$txtcity = $_REQUEST['txtcity'];
	$ddlheight = $_REQUEST['ddlheight'];
	$ddlweight = $_REQUEST['ddlweight'];
	$ddlbtype = $_REQUEST['ddlbtype'];
	$ddlcomplexion = $_REQUEST['ddlcomplexion'];
	$btype = $_REQUEST['btype'];
	$ddledu = $_REQUEST['ddledu'];
	$ddloccup = $_REQUEST['ddloccup'];
	$radioemp = $_REQUEST['radioemp'];
	$txtincome = $_REQUEST['txtincome'];
	$radiofood = $_REQUEST['radiofood'];
	$radiosmoke = $_REQUEST['radiosmoke'];
	$radiodrink = $_REQUEST['radiodrink'];
	$radioshuddha = $_REQUEST['radioshuddha'];
	$radiodosham = $_REQUEST['radiodosham'];
	$ddlstar = $_REQUEST['ddlstar'];
	$ddlraasi = $_REQUEST['ddlraasi'];
	$txtgr1 = $_REQUEST['txtgr1'];
	$txtgr2 = $_REQUEST['txtgr2'];
	$txtgr3 = $_REQUEST['txtgr3'];
	$txtgr4 = $_REQUEST['txtgr4'];
	$txtgr5 = $_REQUEST['txtgr5'];
	$txtgr6 = $_REQUEST['txtgr6'];
	$txtgr7 = $_REQUEST['txtgr7'];
	$txtgr8 = $_REQUEST['txtgr8'];
	$txtgr9 = $_REQUEST['txtgr9'];
	$txtgr10 = $_REQUEST['txtgr10'];
	$txtgr11 = $_REQUEST['txtgr11'];
	$txtgr12 = $_REQUEST['txtgr12'];
	$txtam1 = $_REQUEST['txtam1'];
	$txtam2 = $_REQUEST['txtam2'];
	$txtam3 = $_REQUEST['txtam3'];
	$txtam4 = $_REQUEST['txtam4'];
	$txtam5 = $_REQUEST['txtam5'];
	$txtam6 = $_REQUEST['txtam6'];
	$txtam7 = $_REQUEST['txtam7'];
	$txtam8 = $_REQUEST['txtam8'];
	$txtam9 = $_REQUEST['txtam9'];
	$txtam10 = $_REQUEST['txtam10'];
	$txtam11 = $_REQUEST['txtam11'];
	$txtam12 = $_REQUEST['txtam12'];
	$radiofstatus = $_REQUEST['radiofstatus'];
	$radioftype = $_REQUEST['radioftype'];
	$radiofvalues = $_REQUEST['radiofvalues'];
	$txtaboutme = $_REQUEST['txtaboutme'];
	$txtid = $_REQUEST['txtid'];
	$fname= $_REQUEST['txtfname'];
	$fjob= $_REQUEST['ddlfatheroccup'];
	$mname= $_REQUEST['txtmname'];
	$mjob= $_REQUEST['ddlmotheroccup'];
	$umasis= $_REQUEST['txtumasis'];
	$masis= $_REQUEST['txtmasis'];
	$umabro= $_REQUEST['txtumabro'];
	$mabro= $_REQUEST['txtmabro'];
	$prabt = preg_replace("/[^a-zA-Z0-9,. ]+/", "", html_entity_decode($txtaboutme));
	
	
	
	
	$sql = "UPDATE users SET mstatus='$mstatus',subcaste='$txtsubcaste',gothram='$txtgothram',state='$ddlstate',city='$txtcity',height='$ddlheight',weight='$ddlweight',bodytype='$ddlbtype',complexion='$ddlcomplexion',physicalstatus='$btype',education='$ddledu',occupation='$ddloccup',employedin='$radioemp',income='$txtincome',food='$radiofood',smoke='$radiosmoke',drink='$radiodrink',shuddham='$radioshuddha',dhosham='$radiodosham',star='$ddlstar',raasi='$ddlraasi',gr1='$txtgr1',gr2='$txtgr2',gr3='$txtgr3',gr4='$txtgr4',gr5='$txtgr5',gr6='$txtgr6',gr7='$txtgr7',gr8='$txtgr8',gr9='$txtgr9',gr10='$txtgr10',gr11='$txtgr11',gr12='$txtgr12',am1='$txtam1',am2='$txtam2',am3='$txtam3',am4='$txtam4',am5='$txtam5',am6='$txtam6',am7='$txtam7',am8='$txtam8',am9='$txtam9',am10='$txtam10',am11='$txtam11',am12='$txtam12',familystatus='$radiofstatus',familytype='$radioftype',familyvalues='$radiofvalues',aboutme='$prabt',fname='$fname', fjob='$fjob', mname='$mname', mjob='$mjob', umasis='$umasis', masis='$masis', umabro='$umabro', mabro='$mabro' WHERE id='$txtid'";
    $query = mysqli_query($db_conx, $sql);
	if (mysqli_query($db_conx, $sql)) {
		session_start();
    $_SESSION["id"] = $txtid;
			setcookie("id", $txtid, strtotime( '+30 days' ), "/", "", "", TRUE);
			header("location:upload_crop_register.php");
} else {
    echo "Error updating record: " . mysqli_error($db_conx);
}



?>