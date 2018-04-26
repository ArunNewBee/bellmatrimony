<?php
include_once("php_includes/check_login_status.php");
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
	$gender = $row["gender"];
	$profile_name = $row["username"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>My Profile</title>
<meta name="description" content="BellMatrimony - The most modern matrimonial website.We can register and use free" />
<meta name="keywords" content="Bell Matrimonial, Bell Matrimonials, Bell Matrimony, Kerala Matrimony, Matrimony websites, matrimonial, matrimony, matrimonials, indian matrimonials, marriage, marriage sites, matchmaking" />
<meta name="Author" content="BellMatrimony.com Bell Matrimonial Team" />
<meta name="copyright" content="Bellmatrimony.com Matrimonials" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
            $(document).ready(function(){
                  
                 function search(){
 
                      var title=$("#search").val();
                      var rel=$("#rel").val();
                      var caste=$("#caste").val();
                      var gender=$("#gender").val();
                      var employ=$("#employ").val();
 
                      if(title!=""){
                        
                         $.ajax({
                            type:"post",
                            url:"search.php",
                            data:{title:title,rel:rel,caste:caste,gender:gender,employ:employ},
                            success:function(data){
                                $("#result").html(data);
                                $("#search").val("");
                             }
                          });
                      }
                       
 
                      
                 }
 
                  $("#button").click(function(){
                     search();
                  });
                  $("#body").on("mouseenter", function(){
    search();
});
 
                  $('#search').keyup(function(e) {
                     if(e.keyCode == 13) {
                        search();
                      }
                  });
            });
        </script>  
</head>

<body id="body">
<?php include_once("analyticstracking.php") ?>
<?php include_once("template_pageTop2.php"); ?>
<div class="content">
  <div class="subcontent padtb">

<div class="table border">

<div class="regleft">
   
<div class="incon boad">
<div class="table">
<div class="srlef">
<p class="srp">Religion</p>
<script>
  $(document).ready(function () {
    $("#rel").change(function () {
        var val = $(this).val();
        if (val == "Hindu") {
            $("#caste").html("<option value='Adiyan'>Adiyan</option><option value='Adiyodi'>Adiyodi</option><option value='Aiyer'>Aiyer</option><option value='Ambalavasi'>Ambalavasi</option><option value='Araya'>Araya</option><option value='Arunthadiyar'>Arunthadiyar</option><option value='Arya Vysya'>Arya Vysya</option><option value='Ayyanavar'>Ayyanavar</option><option value='Bharathar'>Bharathar</option><option value='Brahmin'>Brahmin</option><option value='Carpenter'>Carpenter</option><option value='Chaklala Nair'>Chaklala Nair</option><option value='Chakayan'>Chakayan</option><option value='Chavalakaran'>Chavalakaran</option><option value='Cheramar'>Cheramar</option><option value='Cheruman'>Cheruman</option><option value='Chettiyar'>Chettiyar</option><option value='Chetty'>Chetty</option><option value='Coorgi'>Coorgi</option><option value='Cowndar'>Cowndar</option><option value='Devender'>Devender</option><option value='Dheevara'>Dheevara</option><option value='Elayathu'>Elayathu</option><option value='Embrandiri'>Embrandiri</option><option value='Ezhava'>Ezhava</option><option value='Ezhavathy'>Ezhavathy</option><option value='Ezhuthachan'>Ezhuthachan</option><option value='Ganaka'>Ganaka</option><option value='Gaudasar Brahamin'>Gaudasar Brahamin</option><option value='Gold Smith'>Gold Smith</option><option value='Gupthan'>Gupthan</option><option value='Guruckal'>Guruckal</option><option value='Haveega Brahmin'>Haveega Brahmin</option><option value='Ilayath'>Ilayath</option><option value='Iyengar'>Iyengar</option><option value='Iyer'>Iyer</option><option value='Jain'>Jain</option><option value='Kadaiyan'>Kadaiyan</option><option value='Kaimal'>Kaimal</option><option value='Kakklan'>Kakklan</option><option value='Kalari Kuruppu'>Kalari Kuruppu</option><option value='Kalari Panicker'>Kalari Panicker</option><option value='Kanakkan'>Kanakkan</option><option value='Kani'>Kani</option><option value='Kaniyan'>Kaniyan</option><option value='Kartha'>Kartha</option><option value='Karuvan'>Karuvan</option><option value='Kavaida'>Kavaida</option><option value='Kavuthiyya'>Kavuthiyya</option><option value='Kitaran'>Kitaran</option><option value='Kshathriya'>Kshathriya</option><option value='Kudumbi'>Kudumbi</option><option value='Kulala'>Kulala</option><option value='Kumbaran'>Kumbaran</option><option value='Kunbi'>Kunbi</option><option value='Kuruva'>Kuruva</option><option value='Kurmi'>Kurmi</option><option value='Kuruba'>Kuruba</option><option value='Kuvukkal'>Kuvukkal</option><option value='Kuruppu'>Kuruppu</option><option value='Malayan'>Malayan</option><option value='Malayarayan'>Malayarayan</option><option value='Maniyani Nair'>Maniyani Nair</option><option value='Mannadiar'>Mannadiar</option><option value='Mannan'>Mannan</option><option value='Marar'>Marar</option><option value='Maruthuvar'>Maruthuvar</option><option value='Mason'>Mason</option><option value='Menon'>Menon</option><option value='Moger'>Moger</option><option value='Mooppanar'>Mooppanar</option><option value='Moosari'>Moosari</option><option value='Moosath'>Moosath</option><option value='Moothan'>Moothan</option><option value='Mukkuva'>Mukkuva</option><option value='Muthaliyar'>Muthaliyar</option><option value='Muthuvan'>Muthuvan</option><option value='Nadar'>Nadar</option><option value='Naidu'>Naidu</option><option value='Nair'>Nair</option><option value='Nambeesan'>Nambeesan</option><option value='Nambiar'>Nambiar</option><option value='Nambidi'>Nambidi</option><option value='Namboothiri'>Namboothiri</option><option value='Odan'>Odan</option><option value='Oorali'>Oorali</option><option value='Padanna'>Padanna</option><option value='Panan'>Panan</option><option value='Pandithar'>Pandithar</option><option value='Panicker'>Panicker</option><option value='Paravar'>Paravar</option><option value='Paraya'>Paraya</option><option value='Pattarya'>Pattarya</option><option value='Perumannan'>Perumannan</option><option value='Peruvannan'>Peruvannan</option><option value='Pillai'>Pillai</option><option value='Pisharody'>Pisharody</option><option value='Poduval'>Poduval</option><option value='Potti'>Potti</option><option value='Prajapati'>Prajapati</option><option value='Pulaya'>Pulaya</option><option value='Pushpakaunni'>Pushpakaunni</option><option value='Rai'>Rai</option><option value='Reddy'>Reddy</option><option value='SC/ST'>SC/ST</option><option value='Suliya'>Suliya</option><option value='Salva Pillai'>Salva Pillai</option><option value='Samantha'>Samantha</option><option value='Sambava'>Sambava</option><option value='Shetty'>Shetty</option><option value='Sidhanar'>Sidhanar</option><option value='Tamil Yadava'>Tamil Yadava</option><option value='Telugu Brahmin'>Telugu Brahmin</option><option value='Thakur'>Thakur</option><option value='Thandan'>Thandan</option><option value='Thevar'>Thevar</option><option value='Thiyya'>Thiyya</option><option value='Thulu Brahmin'>Thulu Brahmin</option><option value='Udayar'>Udayar</option><option value='Unnithan'>Unnithan</option><option value='V Nair'>V Nair</option><option value='Vaishnav'>Vaishnav</option><option value='Valluvan'>Valluvan</option><option value='Vania'>Vania</option><option value='Vanniyar'>Vanniyar</option><option value='Vannan'>Vannan</option><option value='Varma'>Varma</option><option value='Vedan'>Vedan</option><option value='Veera Shaiva'>Veera Shaiva</option><option value='Velan'>Velan</option><option value='Vellala Pillai'>Vellala Pillai</option><option value='Vellalar'>Vellalar</option><option value='Vellama'>Vellama</option><option value='Veluthedathu Nair'>Veluthedathu Nair</option><option value='Venniar'>Venniar</option><option value='Vettuva'>Vettuva</option><option value='Vilakkithala Nair'>Vilakkithala Nair</option><option value='Villkuruppu'>Villkuruppu</option><option value='Viswa Brahmin'>Viswa Brahmin</option><option value='Viswakarma'>Viswakarma</option><option value='Vyshya'>Vyshya</option><option value='Warrier'>Warrier</option><option value='Yadava'>Yadava</option><option value='Yogi Gurukkal'>Yogi Gurukkal</option><option value='Others'>Others</option>");
        } else if (val == "Muslim - Shia") {
            $("#caste").html("<option value='Muslim - Ansari'>Muslim - Ansari</option><option value='Muslim - Arain'>Muslim - Arain</option><option value='Muslim - Awan'>Muslim - Awan</option><option value='Muslim - Bohra'>Muslim - Bohra</option><option value='Muslim - Dekkani'>Muslim - Dekkani</option><option value='Muslim - Dudekula'>Muslim - Dudekula</option><option value='Muslim - Hanafi'>Muslim - Hanafi</option><option value='Muslim - Jat'>Muslim - Jat</option><option value='Muslim - Khoja'>Muslim - Khoja</option><option value='Muslim - Lebbai'>Muslim - Lebbai</option><option value='Muslim - Malik'>Muslim - Malik</option><option value='Muslim - Mapila'>Muslim - Mapila</option><option value='Muslim - Maraicar'>Muslim - Maraicar</option><option value='Muslim - Memon'>Muslim - Memon</option><option value='Muslim - Mughal'>Muslim - Mughal</option><option value='Muslim - Pathan'>Muslim - Pathan</option><option value='Muslim - Qureshi'>Muslim - Qureshi</option><option value='Muslim - Rajput'>Muslim - Rajput</option><option value='Muslim - Rowther'>Muslim - Rowther</option><option value='Muslim - Shafi'>Muslim - Shafi</option><option value='Muslim - Sheikh'>Muslim - Sheikh</option><option value='Muslim - Siddiqui'>Muslim - Siddiqui</option><option value='Muslim - Syed'>Muslim - Syed</option><option value='Muslim - Others'>Muslim - Others</option>");
        } else if (val == "Muslim - Sunni") {
            $("#caste").html("<option value='Muslim - Ansari'>Muslim - Ansari</option><option value='Muslim - Arain'>Muslim - Arain</option><option value='Muslim - Awan'>Muslim - Awan</option><option value='Muslim - Bohra'>Muslim - Bohra</option><option value='Muslim - Dekkani'>Muslim - Dekkani</option><option value='Muslim - Dudekula'>Muslim - Dudekula</option><option value='Muslim - Hanafi'>Muslim - Hanafi</option><option value='Muslim - Jat'>Muslim - Jat</option><option value='Muslim - Khoja'>Muslim - Khoja</option><option value='Muslim - Lebbai'>Muslim - Lebbai</option><option value='Muslim - Malik'>Muslim - Malik</option><option value='Muslim - Mapila'>Muslim - Mapila</option><option value='Muslim - Maraicar'>Muslim - Maraicar</option><option value='Muslim - Memon'>Muslim - Memon</option><option value='Muslim - Mughal'>Muslim - Mughal</option><option value='Muslim - Pathan'>Muslim - Pathan</option><option value='Muslim - Qureshi'>Muslim - Qureshi</option><option value='Muslim - Rajput'>Muslim - Rajput</option><option value='Muslim - Rowther'>Muslim - Rowther</option><option value='Muslim - Shafi'>Muslim - Shafi</option><option value='Muslim - Sheikh'>Muslim - Sheikh</option><option value='Muslim - Siddiqui'>Muslim - Siddiqui</option><option value='Muslim - Syed'>Muslim - Syed</option><option value='Muslim - Others'>Muslim - Others</option>");
        }
		else if (val == "Muslim - Others") {
            $("#caste").html("<option value='Muslim - Ansari'>Muslim - Ansari</option><option value='Muslim - Arain'>Muslim - Arain</option><option value='Muslim - Awan'>Muslim - Awan</option><option value='Muslim - Bohra'>Muslim - Bohra</option><option value='Muslim - Dekkani'>Muslim - Dekkani</option><option value='Muslim - Dudekula'>Muslim - Dudekula</option><option value='Muslim - Hanafi'>Muslim - Hanafi</option><option value='Muslim - Jat'>Muslim - Jat</option><option value='Muslim - Khoja'>Muslim - Khoja</option><option value='Muslim - Lebbai'>Muslim - Lebbai</option><option value='Muslim - Malik'>Muslim - Malik</option><option value='Muslim - Mapila'>Muslim - Mapila</option><option value='Muslim - Maraicar'>Muslim - Maraicar</option><option value='Muslim - Memon'>Muslim - Memon</option><option value='Muslim - Mughal'>Muslim - Mughal</option><option value='Muslim - Pathan'>Muslim - Pathan</option><option value='Muslim - Qureshi'>Muslim - Qureshi</option><option value='Muslim - Rajput'>Muslim - Rajput</option><option value='Muslim - Rowther'>Muslim - Rowther</option><option value='Muslim - Shafi'>Muslim - Shafi</option><option value='Muslim - Sheikh'>Muslim - Sheikh</option><option value='Muslim - Siddiqui'>Muslim - Siddiqui</option><option value='Muslim - Syed'>Muslim - Syed</option><option value='Muslim - Others'>Muslim - Others</option>");
        }
		else if (val == "Christian - Catholic") {
            $("#caste").html("<option value='Christian - Born Again'>Christian - Born Again</option><option value='Christian - Bretheren'>Christian - Bretheren</option><option value='Christian - Church of South India'>Christian - Church of South India</option><option value='Christian - Evangelist'>Christian - Evangelist</option><option value='Christian - Jacobite'>Christian - Jacobite</option><option value='Christian - Knanaya'>Christian - Knanaya</option><option value='Christian - Knanaya Catholic'>Christian - Knanaya Catholic</option><option value='Christian - Knanaya Jacobite'>Christian - Knanaya Jacobite</option><option value='Christian - Latin Catholic'>Christian - Latin Catholic</option><option value='Christian - Malangara'>Christian - Malangara</option><option value='Christian - Marthoma'>Christian - Marthoma</option><option value='Christian - Pentecost'>Christian - Pentecost</option><option value='Christian - Roman Catholic'>Christian - Roman Catholic</option><option value='Christian - Seventh-day Adventist'>Christian - Seventh-day Adventist</option><option value='Christian - Syrian Catholic'>Christian - Syrian Catholic</option><option value='Christian - Syrian Jacobite'>Christian - Syrian Jacobite</option><option value='Christian - Syrian Orthodox'>Christian - Syrian Orthodox</option><option value='Christian - Syro Malabar'>Christian - Syro Malabar</option><option value='Christian - Syrian Catholic'>Christian - Others</option>");
        }
		else if (val == "Christian - Orthodox") {
            $("#caste").html("<option value='Christian - Born Again'>Christian - Born Again</option><option value='Christian - Bretheren'>Christian - Bretheren</option><option value='Christian - Church of South India'>Christian - Church of South India</option><option value='Christian - Evangelist'>Christian - Evangelist</option><option value='Christian - Jacobite'>Christian - Jacobite</option><option value='Christian - Knanaya'>Christian - Knanaya</option><option value='Christian - Knanaya Catholic'>Christian - Knanaya Catholic</option><option value='Christian - Knanaya Jacobite'>Christian - Knanaya Jacobite</option><option value='Christian - Latin Catholic'>Christian - Latin Catholic</option><option value='Christian - Malangara'>Christian - Malangara</option><option value='Christian - Marthoma'>Christian - Marthoma</option><option value='Christian - Pentecost'>Christian - Pentecost</option><option value='Christian - Roman Catholic'>Christian - Roman Catholic</option><option value='Christian - Seventh-day Adventist'>Christian - Seventh-day Adventist</option><option value='Christian - Syrian Catholic'>Christian - Syrian Catholic</option><option value='Christian - Syrian Jacobite'>Christian - Syrian Jacobite</option><option value='Christian - Syrian Orthodox'>Christian - Syrian Orthodox</option><option value='Christian - Syro Malabar'>Christian - Syro Malabar</option><option value='Christian - Syrian Catholic'>Christian - Others</option>");
        }
		else if (val == "Christian - Protestant") {
            $("#caste").html("<option value='Christian - Born Again'>Christian - Born Again</option><option value='Christian - Bretheren'>Christian - Bretheren</option><option value='Christian - Church of South India'>Christian - Church of South India</option><option value='Christian - Evangelist'>Christian - Evangelist</option><option value='Christian - Jacobite'>Christian - Jacobite</option><option value='Christian - Knanaya'>Christian - Knanaya</option><option value='Christian - Knanaya Catholic'>Christian - Knanaya Catholic</option><option value='Christian - Knanaya Jacobite'>Christian - Knanaya Jacobite</option><option value='Christian - Latin Catholic'>Christian - Latin Catholic</option><option value='Christian - Malangara'>Christian - Malangara</option><option value='Christian - Marthoma'>Christian - Marthoma</option><option value='Christian - Pentecost'>Christian - Pentecost</option><option value='Christian - Roman Catholic'>Christian - Roman Catholic</option><option value='Christian - Seventh-day Adventist'>Christian - Seventh-day Adventist</option><option value='Christian - Syrian Catholic'>Christian - Syrian Catholic</option><option value='Christian - Syrian Jacobite'>Christian - Syrian Jacobite</option><option value='Christian - Syrian Orthodox'>Christian - Syrian Orthodox</option><option value='Christian - Syro Malabar'>Christian - Syro Malabar</option><option value='Christian - Syrian Catholic'>Christian - Others</option>");
        }
		else if (val == "Christian - Others") {
            $("#caste").html("<option value='Christian - Born Again'>Christian - Born Again</option><option value='Christian - Bretheren'>Christian - Bretheren</option><option value='Christian - Church of South India'>Christian - Church of South India</option><option value='Christian - Evangelist'>Christian - Evangelist</option><option value='Christian - Jacobite'>Christian - Jacobite</option><option value='Christian - Knanaya'>Christian - Knanaya</option><option value='Christian - Knanaya Catholic'>Christian - Knanaya Catholic</option><option value='Christian - Knanaya Jacobite'>Christian - Knanaya Jacobite</option><option value='Christian - Latin Catholic'>Christian - Latin Catholic</option><option value='Christian - Malangara'>Christian - Malangara</option><option value='Christian - Marthoma'>Christian - Marthoma</option><option value='Christian - Pentecost'>Christian - Pentecost</option><option value='Christian - Roman Catholic'>Christian - Roman Catholic</option><option value='Christian - Seventh-day Adventist'>Christian - Seventh-day Adventist</option><option value='Christian - Syrian Catholic'>Christian - Syrian Catholic</option><option value='Christian - Syrian Jacobite'>Christian - Syrian Jacobite</option><option value='Christian - Syrian Orthodox'>Christian - Syrian Orthodox</option><option value='Christian - Syro Malabar'>Christian - Syro Malabar</option><option value='Christian - Syrian Catholic'>Christian - Others</option>");
        }
		else if (val == "Sikh") {
            $("#caste").html("<option value='Sikh - Ahluwalia'>Sikh - Ahluwalia</option><option value='Sikh - Arora'>Sikh - Arora</option><option value='Sikh - Bhatia'>Sikh - Bhatia</option><option value='Sikh - Bhatra'>Sikh - Bhatra</option><option value='Sikh - Ghumar'>Sikh - Ghumar</option><option value='Sikh - Intercaste'>Sikh - Intercaste</option><option value='Sikh - Jat'>Sikh - Jat</option><option value='Sikh - Kamboj'>Sikh - Kamboj</option><option value='Sikh - Khatri'>Sikh - Khatri</option><option value='Sikh - Kshatriya'>Sikh - Kshatriya</option><option value='Sikh - Lubana'>Sikh - Lubana</option><option value='Sikh - Majabi'>Sikh - Majabi</option><option value='Sikh - Nai'>Sikh - Nai</option><option value='Sikh - Rajput'>Sikh - Rajput</option><option value='Sikh - Ramdasia'>Sikh - Ramdasia</option><option value='Sikh - Ramgharia'>Sikh - Ramgharia</option><option value='Sikh - Ravidasia'>Sikh - Ravidasia</option><option value='Sikh - Saini'>Sikh - Saini</option><option value='Sikh - Tong Kshatriya'>Sikh - Tong Kshatriya</option><option value='Sikh - Unspecified'>Sikh - Unspecified</option><option value='Sikh - Others'>Sikh - Others</option>");
        }
		else if (val == "Jain - Digambar") {
            $("#caste").html("<option value='Jain - Agarwal'>Jain - Agarwal</option><option value='Jain - Bania'>Jain - Bania</option><option value='Jain - Intercaste'>Jain - Intercaste</option><option value='Jain - Jaiswal'>Jain - Jaiswal</option><option value='Jain - KVO'>Jain - KVO</option><option value='Jain - Kandelwal'>Jain - Kandelwal</option><option value='Jain - Kutchi'>Jain - Kutchi</option><option value='Jain - Oswal'>Jain - Oswal</option><option value='Jain - Porrwal'>Jain - Porwal</option><option value='Jain - Vaishya'>Jain - Vaishya</option><option value='Jain - Others'>Jain - Others</option>");
        }
		else if (val == "Jain - Shwetambar") {
            $("#caste").html("<option value='Jain - Agarwal'>Jain - Agarwal</option><option value='Jain - Bania'>Jain - Bania</option><option value='Jain - Intercaste'>Jain - Intercaste</option><option value='Jain - Jaiswal'>Jain - Jaiswal</option><option value='Jain - KVO'>Jain - KVO</option><option value='Jain - Kandelwal'>Jain - Kandelwal</option><option value='Jain - Kutchi'>Jain - Kutchi</option><option value='Jain - Oswal'>Jain - Oswal</option><option value='Jain - Porrwal'>Jain - Porwal</option><option value='Jain - Vaishya'>Jain - Vaishya</option><option value='Jain - Others'>Jain - Others</option>");
        }
		else if (val == "Jain - Others") {
            $("#caste").html("<option value='Jain - Agarwal'>Jain - Agarwal</option><option value='Jain - Bania'>Jain - Bania</option><option value='Jain - Intercaste'>Jain - Intercaste</option><option value='Jain - Jaiswal'>Jain - Jaiswal</option><option value='Jain - KVO'>Jain - KVO</option><option value='Jain - Kandelwal'>Jain - Kandelwal</option><option value='Jain - Kutchi'>Jain - Kutchi</option><option value='Jain - Oswal'>Jain - Oswal</option><option value='Jain - Porrwal'>Jain - Porwal</option><option value='Jain - Vaishya'>Jain - Vaishya</option><option value='Jain - Others'>Jain - Others</option>");
        }
		else if (val == "Parsi") {
            $("#caste").html("<option value='Intercaste'>Intercaste</option><option value='Irani'>Irani</option><option value='Parsi'>Parsi</option><option value='Dont wish to specify'>Dont wish to specify</option>");
        }
		else if (val == "Buddhist") {
            $("#caste").html("<option value='Intercaste'>Buddhist</option>");
        }
		else if (val == "Buddhist") {
            $("#caste").html("<option value='Intercaste'>Buddhist</option>");
        }
		else if (val == "Inter-Religion") {
            $("#caste").html("<option value='Inter-Religion'>Inter-Religion</option>");
        }
		else if (val == "No Religious Belief") {
            $("#caste").html("<option value='No Religious Belief'>No Religious Belief</option>");
        }
        else if (val == "All") {
            $("#caste").html("<option value='All'>All</option>");
        }
    });
});
  </script>
<select id="rel" name="ddlrel" placeholder="Select" class="list">
  
  <option selected>All</option>
  <option>Hindu</option>
  <option>Muslim - Shia</option>
  <option>Muslim - Sunni</option>
  <option>Muslim - Others</option>
  <option>Christian - Catholic</option>
  <option>Christian - Orthodox</option>
  <option>Christian - Protestant</option>
  <option>Christian - Others</option>
  <option>Sikh</option>
  <option>Jain - Digambar</option>
  <option>Jain - Shwetambar</option>
  <option>Jain - Others</option>
  <option>Parsi</option>
  <option>Buddhist</option>
  <option>Inter-Religion</option>
  <option>No Religious Belief</option>
  </option>
  </select>

</div>
<div class="srsp"></div>
<div class="srrig">
<p class="srp">Caste</p>
<select id="caste" name="ddlcaste" class="list">
  <option>All</option>
  </select>
</div>

</div>
<div class="table ptsr">

<div class="srlef">
<p class="srp">Searching for</p>
<select id="gender" name="ddlgender" class="list">
  <option value="female"  <?php echo ($gender == "male" ? "selected" : ""); ?>>Bride</option>
  <option value="male"  <?php echo ($gender == "female" ? "selected" : ""); ?>>Groom</option>
  </select>

</div>
<div class="srsp"></div>
<div class="srrig">
<p class="srp">Employed in</p>
<select id="employ" name="ddlage" class="list">
<option>All</option>
  <option>Government</option>
  <option>Private</option>
  <option>Business</option>
  <option>Defence</option>
  <option>Self Employed</option>
  </select>
</div>

</div>
<p class="srbth">
<input type="button" id="button" value="Search" class="srbtn"/>
</p>             
</div>
<div class="incon">
 <ul id="result"></ul> 
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
