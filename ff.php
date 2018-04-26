
<?php
$date = date("Y-m-d");
$newdate = strtotime ( '-18 year' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d' , $newdate );
 
echo $newdate;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="styles/style.css">
<script>

function validateForm1() 
{
	var em = document.forms["loginform"]["txtloginemail"].value;
	var pa = document.forms["loginform"]["txtloginpassword"].value;
	if(em == ""){
		alert("Please enter email id");
        return false;
	}else if(pa == ""){
		alert("Please enter password");
        return false;
	}
}




function validateForm() 
{
	var u = document.forms["MyForm"]["txtname"].value;
	var mob = document.forms["MyForm"]["txtmob"].value;
	var e = document.forms["MyForm"]["txtmail"].value;
	var p = document.forms["MyForm"]["txtpassword"].value;
	var r = document.forms["MyForm"]["ddlrel"].value;
	var c = document.forms["MyForm"]["ddlcaste"].value;
	var t = document.forms["MyForm"]["radioterm"].value;

	
	if(u == "" || e == "" || p == "" || mob == ""){
		 alert("Fill out all of the form data");
        return false;
	}else if(r == "Select Religion"){
		alert("Please select Religion");
        return false;
	}else if(c == "Select Caste"){
		alert("Please select Caste");
        return false;
	} else if(t == "decline"){
		alert("You are not agreed to terms and conditions.Please select agree.");
        return false;
	} else{
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
</head>

<body>
<div class="content">
  <div class="subcontent padtb">
  <div class="table">
  <div class="two1left">
  
  </div>
  <div class="twosp"></div>
  <div class="two1right">
  <form action="" method="post" name="MyForm" onsubmit="return validateForm()">
  <table class="regtable">
  <tr>
  <td class="tdlef">
  Matrimony profile for
  </td>
  <td class="tdrig">
  <select name="ddlprofor" placeholder="Select" class="list">
  <option>Myself</option>
  <option>Son</option>
  <option>Daughter</option>
  <option>Brother</option>
  <option>Sister</option>
  <option>Relative</option>
  <option>Friend</option>
  </select>
  </td>
  </tr>
  
  <tr>
  <td class="tdlef">
  Name <span class="must">*</span>
  </td>
  <td class="tdrig">
  <input name="txtname" type="text" class="txtbx">
  </td>
  </tr>
  
  
  <tr>
  <td class="tdlef">
  Gender <span class="must">*</span>
  </td>
  <td class="tdrig">
  <input type="radio" name="gender" value="male" style="margin-left:0px;" checked>Male
  <input type="radio" name="gender" value="female" > Female
  </td>
  </tr>
  
  
  <tr>
  <td class="tdlef">
  Date of birth <span class="must">*</span>
  </td>
  <td class="tdrig">
  <input type="date" name="bday" id="bday" max="<?php echo $newdate;?>">
  
  </td>
  </tr>
  
  
  <tr>
  <td class="tdlef">
  Religion <span class="must">*</span>
  </td>
  <td class="tdrig">
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
		
    });
});
  </script>
  <select id="rel" name="ddlrel" placeholder="Select" class="list">
  
  <option selected>Select Religion</option>
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
  </td>
  </tr>
  
  
  <tr>
  <td class="tdlef">
  Mother tongue <span class="must">*</span>
  </td>
  <td class="tdrig">
  <select name="ddlmt" class="list">
  <option>Assamese</option>
  <option >Bengali</option>
  <option>English</option>
  <option>Gujarati</option>
  <option>Hindi</option>
  <option>Kannada</option>
  <option>Konkani</option>
  <option selected="">Malayalam</option>
  <option>Marathi</option>
  <option>Marwari</option>
  <option>Oriya</option>
  <option>Punjabi</option>
  <option>Sindhi</option>
  <option>Tamil</option>
  <option>Telugu</option>
  <option>Urdu</option>  
  <option>Angika</option>
  <option>Arunachali</option>
  <option>Awadhi</option>
  <option>Bhojpuri</option>
  <option>Brij</option>
  <option>Bihari</option>
  <option>Badaga</option>
  <option>Chatisgarhi</option>
  <option>Dogri</option>
  <option>French</option>
  <option>Garhwali</option>
  <option>Garo</option>
  <option>Haryanvi</option>
  <option>Himachali/Pahari</option>
  <option>Kanauji</option>
  <option>Kashmiri</option>
  <option>Khandesi</option>
  <option>Khasi</option>
  <option>Koshali</option>
  <option>Kumaoni</option>
  <option>Kutchi</option>
  <option>Lepcha</option>
  <option>Ladacki</option>
  <option >Magahi</option>
  <option>Maithili</option>
  <option>Manipuri</option>
  <option>Miji</option>
  <option>Mizo</option>
  <option>Monpa</option>
  <option>Nicobarese</option>
  <option>Nepali</option>
  <option>Rajasthani</option>
  <option>Sanskrit</option>
  <option>Santhali</option>
  <option>Sourashtra</option>
  <option>Tripuri</option>
  <option>Tulu</option>
  </select>
  </td>
  </tr>
  
  
  <tr>
  <td class="tdlef">
  Caste/Division <span class="must">*</span>
  </td>
  <td class="tdrig">
  <select id="caste" name="ddlcaste" class="list">
  <option>Select Caste</option>
  </select>
  </td>
  </tr>
  <tr>
  <td class="tdlef">
  Country living in <span class="must">*</span>
  </td>
  
  <td class="tdrig">
<select name="ddlcountry" class="list">

<option selected="selected">India</option>
<option>United States of America</option>
<option>Pakistan</option>
<option>United Arab Emirates</option>
<option>United Kingdom</option>
<option>Australia</option>
<option>Saudi Arabia</option>
<option>Bangladesh</option>
<option>Canada</option>
<option>Afghanistan</option>
<option>Albania</option>
<option>Algeria</option>
<option>American Samoa</option>
<option>Andorra</option>
<option>Angola</option>
<option>Anguilla</option>
<option>Antarctica</option>
<option>Antigua and Barbuda</option>
<option>Argentina</option>
<option>Armenia</option>
<option>Aruba</option>
<option>Austria</option>
<option>Azerbaijan</option>
<option>Bahamas</option>
<option>Bahrain</option>
<option>Barbados</option>
<option>Belarus</option>
<option>Belgium</option>
<option>Belize</option>
<option>Benin</option>
<option>Bermuda</option>
<option>Bhutan</option>
<option>Bolivia</option>
<option>Bosnia and Herzegovina</option>
<option>Botswana</option>
<option>Bouvet Island</option>
<option>Brazil</option>
<option>British Indian Ocean Territory</option>
<option>Brunei</option>
<option>Bulgaria</option>
<option>Burkina Faso</option>
<option>Burundi</option>
<option>Cambodia</option>
<option>Cameroon</option>
<option>Cape Verde</option>
<option>Cayman Islands</option>
<option>Central African Republic</option>
<option>Chad</option>
<option>Chile</option>
<option>China</option>
<option>Christmas Island</option>
<option >Cocos Islands</option>
<option>Colombia</option>
<option>Comoros</option>
<option>Congo</option>
<option>Cook Islands</option>
<option>Costa Rica</option>
<option>Cote D Ivoire</option>
<option>Croatia</option>
<option>Cuba</option>
<option>Cyprus</option>
<option>Czech Republic</option>
<option>Denmark</option>
<option>Djibouti</option>
<option>Dominica</option>
<option>Dominican Republic</option>
<option>East Timor</option>
<option>Ecuador</option>
<option>Egypt</option>
<option>El Salvador</option>
<option>Equatorial Guinea</option>
<option>Eritrea</option>
<option>Estonia</option>
<option>Ethiopia</option>
<option>Falkland Islands</option>
<option>Faroe Islands</option>
<option>Fiji</option>
<option>Finland</option>
<option>France</option>
<option>France Metropolitan</option>
<option>French Guiana</option>
<option>French Polynesia</option>
<option>French Southern Territories</option>
<option>Gabon</option>
<option>Gambia</option>
<option>Georgia</option>
<option>Germany</option>
<option>Ghana</option>
<option>Gibraltar</option>
<option>Greece</option>
<option>Greenland</option>
<option>Grenada</option>
<option>Guadeloupe</option>
<option>Guam</option>
<option>Guatemala</option>
<option>Guinea</option>
<option>Guinea Bissau</option>
<option>Guyana</option>
<option>Haiti</option>
<option>Heard and McDonald Islands</option>
<option>Honduras</option>
<option>Hong Kong</option>
<option>Hungary</option>
<option>Iceland</option>
<option>Indonesia</option>
<option>Iran</option>
<option>Iraq</option>
<option>Ireland</option>
<option>Israel</option>
<option>Italy</option>
<option>Ivory Coast</option>
<option>Jamaica</option>
<option>Japan</option>
<option>Jordan</option>
<option>Kazakhstan</option>
<option>Kenya</option>
<option>Kiribati</option>
<option>Korea North</option>
<option>Korea South</option>
<option>Kuwait</option>
<option>Kyrgyzstan</option>
<option>Laos</option>
<option>Latvia</option>
<option>Lebanon</option>
<option>Lesotho</option>
<option>Liberia</option>
<option>Libya</option>
<option>Liechtenstein</option>
<option>Lithuania</option>
<option>Luxembourg</option>
<option>Macau</option>
<option>Macedonia Former Yugoslav</option>
<option>Madagascar</option>
<option>Malaysia</option>
<option>Maldives</option>
<option>Mali</option>
<option>Malta</option>
<option>Marshall Islands</option>
<option>Martinique</option>
<option>Mauritania</option>
<option>Mauritius</option>
<option>Mayotte</option>
<option>Mexico</option>
<option>Micronesia Federated States of</option>
<option>Moldova</option>
<option>Monaco</option>
<option>Mongolia</option>
<option>Montserrat</option>
<option>Morocco</option>
<option>Mozambique</option>
<option>Myanmar</option>
<option>Namibia</option>
<option>Nauru</option>
<option>Nepal</option>
<option>Netherlands</option>
<option>Netherlands Antilles</option>
<option>New Caledonia</option>
<option>New Zealand</option>
<option>Nicaragua</option>
<option>Niger</option>
<option>Nigeria</option>
<option>Niue</option>
<option>Norfolk Island</option>
<option>North Korea</option>
<option>Northern Mariana Islands</option>
<option>Norway</option>
<option>Oman</option>
<option>Other African Countries</option>
<option>Other American countries</option>
<option>Other Asian Countries</option>
<option>Other European Countries</option>
<option>Other Gulf Countries</option>
<option>Others</option>
<option>Palau</option>
<option>Panama</option>
<option>Papua New Guinea</option>
<option>Paraguay</option>
<option>Peru</option>
<option>Philippines</option>
<option>Pitcairn Island</option>
<option>Poland</option>
<option>Portugal</option>
<option>Puerto Rico</option>
<option>Qatar</option>
<option>Reunion</option>
<option>Romania</option>
<option>Russia</option>
<option>Rwanda</option>
<option>S. Georgia and S. Sandwich Isls.</option>
<option>Saint Kitts & Nevis</option>
<option>Saint Lucia</option>
<option>Saint Vincent and The Grenadines</option>
<option>Samoa</option>
<option>San Marino</option>
<option>Sao Tome and Principe</option>
<option>Senegal</option>
<option>Seychelles</option>
<option>Sierra Leone</option>
<option>Singapore</option>
<option>Slovakia</option>
<option>Slovenia</option>
<option>Solomon Islands</option>
<option>Somalia</option>
<option>South Africa</option>
<option>South Georgia and S S Islands</option>
<option>South Korea</option>
<option>Spain</option>
<option>Sri Lanka</option>
<option>St. Helena</option>
<option>St. Pierre and Miquelon</option>
<option>Sudan</option>
<option>Suriname</option>
<option>Svalbard and Jan Mayen Islands</option>
<option>Swaziland</option>
<option>Sweden</option>
<option>Switzerland</option>
<option>Syria</option>
<option>Taiwan</option>
<option>Tajikistan</option>
<option>Tanzania</option>
<option>Thailand</option>
<option>Togo</option>
<option>Tokelau</option>
<option>Tonga</option>
<option>Trinidad and Tobago</option>
<option>Tunisia</option>
<option>Turkey</option>
<option>Turkmenistan</option>
<option>Turks and Caicos Islands</option>
<option>Tuvalu</option>
<option>Uganda</option>
<option>Ukraine</option>
<option>United States Minor Outlying Islands</option>
<option>Uruguay</option>
<option>Uzbekistan</option>
<option>Vanuatu</option>
<option>Vatican City</option>
<option>Venezuela</option>
<option>Vietnam</option>
<option>Virgin Islands</option>
<option>Virgin Islands  British</option>
<option>Virgin Islands  US</option>
<option>Wallis and Futuna Islands</option>
<option>Western Sahara</option>
<option>Yemen</option>
<option>Yugoslavia  Former</option>
<option>Zaire</option>
<option>Zambia</option>
<option>Zimbabwe</option>
		
</select>

  </td>
  </tr>
  
  <tr>
  <td class="tdlef">
  Mobile <span class="must">*</span>
  </td>
  
  <td class="tdrig"><input name="txtmob" id="mobile" type="text" class="txtbx">

  </td>
  </tr>
  
  <tr>
  <td class="tdlef">
  Email <span class="must">*</span>
  </td>
  
  <td class="tdrig">
  <input name="txtmail" type="email" class="txtbx">
  </td>
  </tr>
  
  <tr>
  <td class="tdlef">
  Password <span class="must">*</span>
  </td>
  
  <td class="tdrig">
  <input name="txtpassword" type="password" class="txtbx">
  </td>
  </tr>
  
  <tr>
  <td class="tdlef">
  <a class="terms" href="#">Terms & Conditions</a> <span class="must">*</span>
  </td>
  
  <td class="tdrig">
  <input type="radio" name="radioterm" value="accept">I agree
  <input type="radio" name="radioterm" value="decline" checked>Not agree
  </td>
  </tr>
  
  <tr>
  <td class="tdlef">
  
  </td>
  
  <td class="tdrig" style="text-align:right;">
  <input name="btnsubmit" type="submit" value="REGISTER FREE" class="submit" />
  
  </td>
  </tr>
  
  </table>
  </form>
  </div>
  </div>
  
  </div>
</div>
</body>
</html>