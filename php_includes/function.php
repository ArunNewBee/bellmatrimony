<?php

include_once('php_includes/db_det.php');

function connect(){
mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('couldnot connect to database'.mysqli_error());	
}


function close(){
mysqli_close();	
}

function query(){
$myData=mysqli_query("select * from year");
while($record=mysqli_fetch_array($myData)){
	echo'<option value="'.$record['item'].'"'.$record['item'].'</option>';
}
}

?>