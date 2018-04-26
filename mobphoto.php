<?php
include_once("php_includes/check_login_status.php");
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


function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){

    //folder path setup
    $target_path = $target_folder;
    $thumb_path = $thumb_folder;
    
    //file name setup
    $filename_err = explode(".",$_FILES[$field_name]['name']);
    $filename_err_count = count($filename_err);
    $file_ext = $filename_err[$filename_err_count-1];
    if($file_name != ''){
        $fileName = $file_name.'.'.$file_ext;
    }else{
        $fileName = $_FILES[$field_name]['name'];
    }
    
    //upload image path
    $upload_image = $target_path.basename($fileName);
    
    //upload image
    if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
    {
        //thumbnail creation
        if($thumb == TRUE)
        {
            $thumbnail = $thumb_path.$fileName;
            list($width,$height) = getimagesize($upload_image);
            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
            switch($file_ext){
                case 'jpg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;
                case 'jpeg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;

                case 'png':
                    $source = imagecreatefrompng($upload_image);
                    break;
                case 'gif':
                    $source = imagecreatefromgif($upload_image);
                    break;
                default:
                    $source = imagecreatefromjpeg($upload_image);
            }

            imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
            switch($file_ext){
                case 'jpg' || 'jpeg':
                    imagejpeg($thumb_create,$thumbnail,100);
                    break;
                case 'png':
                    imagepng($thumb_create,$thumbnail,100);
                    break;

                case 'gif':
                    imagegif($thumb_create,$thumbnail,100);
                    break;
                default:
                    imagejpeg($thumb_create,$thumbnail,100);
            }

        }

        return $fileName;
    }
    else
    {
        return false;
    }
}



if(!empty($_FILES['image']['name'])){
    $file_type=$_FILES['image']['type'];
$filename = $_FILES['image']['name'];
$filetempname = $_FILES['image']['tmp_name'];
$file_size =$_FILES['image']['size'];

	if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg")  
	{
		$thumb_src = '';
    $message = '';
    echo "<script type='text/javascript'>alert('Invalid file format. Only jpg and png files can be uploaded.');</script>";
	
}
else
{
    //call thumbnail creation function and store thumbnail name
    $upload_img = cwUpload('image','user/'.$log_id.'/','',TRUE,'user/'.$log_id.'/','150','150');
    
    //full path of the thumbnail image
    $thumb_src = 'user/'.$log_id.'/'.$upload_img;
    
	include_once("php_includes/db_conx.php");
	$sql = "UPDATE users SET avatar='$upload_img' WHERE id='$log_id'";
	$query = mysqli_query($db_conx, $sql);
	
    //set success and error messages
    $message = $upload_img?"<span style='color:#008000;'>Image have been uploaded successfully.</span>":"<span style='color:#F00000;'>Some error occurred, please try again.</span>";
}

}else{
    
    //if form is not submitted, below variable should be blank
    $thumb_src = '';
    $message = '';
}


?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Upload profile picture</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
<?php include_once("template_pageTop2.php"); ?>
<div class="content">
  <div class="subcontent padtb">
  <p class="req">
  Please upload square shape image.
  </p>
  <form method="post" enctype="multipart/form-data">
    <p style="margin:0px;text-align:center;"><input type="file" name="image" class="upim"/></p>
    <p style="margin:0px;text-align:center;"><input type="submit" name="submit" value="Upload" class="submit"/></p>
</form>
<?php if($thumb_src != ''){ ?>
<br />
<img src="<?php echo $thumb_src; ?>" alt="" class="prom">
<br />
<?php echo $message; ?>
<?php } ?>
  </div>
  </div>
 
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>