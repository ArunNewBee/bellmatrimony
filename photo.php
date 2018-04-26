<?php
session_start();
	// Connect to database and sanitize incoming $_GET variables
 
	$ident=$_SESSION["id"];
	
	
error_reporting (E_ALL ^ E_NOTICE);

$upload_path = "user/".$_SESSION["id"]."/";				
						
$thumb_width = "150";						
$thumb_height = "150";						


function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,100); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}



if (isset($_POST["upload_thumbnail"])) {

	// Connect to database and sanitize incoming $_GET variables
    include_once("php_includes/db_conx.php");
	$id1 = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	
	$filename = $_POST['filename'];

	$large_image_location = $upload_path.$_POST['filename'];
	$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
	$avatar="thumb_".$_POST['filename'];

	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	include_once("php_includes/db_conx.php");
	$sql = "UPDATE users SET avatar='$avatar' WHERE id='$ident'";
	$query = mysqli_query($db_conx, $sql);
		
	header("Location:congrates.php");
	
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
    $upload_img = cwUpload('image','user/'.$ident.'/','',TRUE,'user/'.$ident.'/','150','150');
    
    //full path of the thumbnail image
    $thumb_src = 'user/'.$ident.'/'.$upload_img;
    
	include_once("php_includes/db_conx.php");
	$sql = "UPDATE users SET avatar='$upload_img' WHERE id='$ident'";
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
<html lang="en">
<head>
<title>Upload File and Crop</title>
<meta name="viewport" content="width=device-width" />
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/cropimage.css" />
<link type="text/css" href="css/imgareaselect-default.css" rel="stylesheet" />
<link type="text/css" href="styles/style.css" rel="stylesheet" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/jquery.imgareaselect.js"></script>

<script type="text/javascript" >
    $(document).ready(function() {
        $('#submitbtn').click(function() {
            $("#viewimage").html('');
            $("#viewimage").html('<img src="images/loading.gif" />');
            $(".uploadform").ajaxForm({
            	url: 'upload.php',
                success:    showResponse 
            }).submit();
        });
    });
    
    function showResponse(responseText, statusText, xhr, $form){

	    if(responseText.indexOf('.')>0){
			$('#thumbviewimage').html('<img src="<?php echo $upload_path; ?>'+responseText+'"   style="position: relative;" alt="Thumbnail Preview" />');
	    	$('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"   id="thumbnail" />');
	    	$('#filename').val(responseText); 
			$('#thumbnail').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview });
		}else{
			$('#thumbviewimage').html(responseText);
	    	$('#viewimage').html(responseText);
		}
    }
    
</script>

<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 

	$('#thumbviewimage > img').css({
		width: Math.round(scaleX * img.width) + 'px', 
		height: Math.round(scaleY * img.height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	
	var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
	var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
	var x2 = Math.round(x1+selection.width);
	var y2 = Math.round(y1+selection.height);
	
	$('#x1').val(x1);
	$('#y1').val(y1);
	$('#x2').val(x2);
	$('#y2').val(y2);	
	
	$('#w').val(Math.round((img.naturalWidth/img.width)*selection.width));
	$('#h').val(Math.round((img.naturalHeight/img.height)*selection.height));
	
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Please Crop and resize your photo");
			return false;
		}else{
			return true;
		}
	});
}); 
</script>



</head>
<body>
<?php include_once("template_pageTop1.php"); ?>
<!-- content -->
<div class="big">
<section>
<div class="container">

	<div class="crop_box">
<form class="uploadform" method="post" enctype="multipart/form-data" action='upload.php' name="photo">	
	<div class="crop_set_upload">
		<div class="crop_upload_label">Upload files: </div>
		<div class="crop_select_image"><div class="file_browser"><input type="file" name="imagefile" id="imagefile" class="hide_broswe" /></div></div>
		<div class="crop_select_image"><input type="submit" value="Preview" class="upload_button" name="submitbtn" id="submitbtn" />
        
        </div>
	</div>
</form>			
		<div class="crop_set_preview">
			<div class="crop_preview_left"> 
				<div class="crop_preview_box_big" id='viewimage' style="cursor:move"> 
					
				</div>
			</div>
			<div class="crop_preview_right">
				Preview (150x150 px)
				<div class="crop_preview_box_small" id='thumbviewimage' style="position:relative; overflow:hidden;"> </div>
				
				<form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<input type="hidden" name="x1" value="" id="x1" />
					<input type="hidden" name="y1" value="" id="y1" />
					<input type="hidden" name="x2" value="" id="x2" />
					<input type="hidden" name="y2" value="" id="y2" />
					<input type="hidden" name="w" value="" id="w" />
					<input type="hidden" name="h" value="" id="h" />
					<input type="hidden" name="wr" value="" id="wr" />
					
					<input type="hidden" name="filename" value="" id="filename" />
                   
					<div class="crop_preview_submit"><input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button" /> 
                   
                    
                    </div>
				</form>
				
			</div>
		</div>
	</div>
	
</div>
</section>
</div>

<div class="small">
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
</div>

<?php include_once("template_pageBottom.php"); ?>
</body>
</html>