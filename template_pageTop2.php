<?php 
include_once("php_includes/db_conx.php");
$sql = "SELECT * FROM friends WHERE user2='$log_id' AND accepted='0' ORDER BY datemade ASC";
$query = mysqli_query($db_conx, $sql);
$numrows = mysqli_num_rows($query);
 ?>
<header>
  <div class="subheader">
  <div class="table">
  <div class="logoholder">
    <a href="index.php"><img src="images/bell-matrimony.png" class="logo" alt="bell_logo"/></a></div>
    <div class="menuholder">
    <ul>
    <li><a href="notification.php"><img src="images/bell-matrimony-notification.jpg" width="18" alt="notification" /><span class="notnum"><?php if ($numrows=="0") {}else {echo $numrows;} ?></span></a></li>
    <li><a href="user.php"><?php echo $log_username; ?></a></li>
    <li><a href="find.php">Matches</a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
  </div>
  </div>
</header>