<?php include("rab_dbcon.php");

//mobile
$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','about',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>

<?php if ($detect->isMobile()){?>

<body onLoad="aboutbox('greenbox')">
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center">
<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ABOUT</td></tr></table>
<table style="font-weight:bolder; font-size:.8em; margin-top:20px">
<tr><td class="tag" width="90%" onClick="aboutbox('greenbox')">Greenbox Nigeria</td></tr>
<tr><td class="tag" width="90%" onClick="aboutbox('music')">Nigerian Music</td></tr>
<tr><td class="tag" width="90%" onClick="aboutbox('terms')">Terms of Service</td></tr>
<tr><td class="tag" width="90%" onClick="aboutbox('advert')">Advertise</td></tr>
<tr><td class="tag" width="90%" onClick="aboutbox('help')" style="display:none">Help</td></tr>
</table>
    
<br><center><div style="width:95%;font-size:.9em; text-align:left" id="aboutbox"></div><br></center>


<table style="font-weight:bolder;font-size:.9em"><tr><td align="center">Contact<br></td></tr><tr><td align="center" style="font-weight:bolder;font-size:.9em">

<a href="mailto:ng.greenbox@gmail.com?subject=Song%20Promotion" target="_new">Mail</a><br><a href="tel:2348050634922" target="_new">Call [+234(0)8050634922]</a>
<table style="width:200px;margin:5px 0"><tr>
<td title="Facebook" align="center"><a target="_blank" href="https://www.facebook.com/Greenbox-Nigeria-1032329466862501/"><div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Twitter" align="center"><a target="_blank" href="https://twitter.com/GreenboxNigeria"><div style="background:url(images/tt1.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Google+" align="center"><a target="_blank" href="https://plus.google.com/u/0/101846096960635449425"><div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="LinkedIn" align="center"><a target="_blank" href="https://www.linkedin.com/company/greenbox-nigeria"><div style="background:url(images/in.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Instagram" align="center"><a target="_blank" href="https://www.instagram.com/greenboxnigeria/"><div style="background:url(images/ig.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td></tr></table>
    
<br>

<br><br><br><br>
</td></tr></table>
</td></tr></table>
<script src="scirpt/mob_links.js"></script>
<script>
aboutbox('greenbox');
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='About GreenboxNigeria.com';
	_id('description').content='Learn About Nigerian Music Industry and Greenbox Nigeria';
	_id('keywords').content='About, Terms  of Service, Advert/Publicity, Help';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }else{?>

<body onLoad="aboutbox('greenbox')" style="background:#EEE">

<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ABOUT</td></tr></table>
<table align="center" style="font-weight:bolder; font-size:.8em; margin-top:20px;">
<tr><td class="tag" style="width:100%" onClick="aboutbox('greenbox')">Greenbox Nigeria</td></tr>
<tr><td class="tag" style="width:100%" onClick="aboutbox('music')">Nigerian Music</td></tr>
<tr><td class="tag" style="width:100%" onClick="aboutbox('terms')">Terms of Service</td></tr>
<tr><td class="tag" style="width:100%" onClick="aboutbox('advert')">Advertise</td></tr>
<tr><td class="tag" onClick="aboutbox('help')" style="display:none">Help</td></tr>
</table>
    
<br><center><div style="width:95%;font-size:.9em; text-align:left" id="aboutbox"></div><br></center>


<table style="font-weight:bolder;font-size:.9em"><tr><td align="center">Contact<br></td></tr><tr><td align="center" style="font-weight:bolder;font-size:.9em">

<a href="mailto:ng.greenbox@gmail.com?subject=Song%20Promotion" target="_new">Mail</a><br><a href="tel:2348050634922" target="_new">Call [+234(0)8050634922]</a>
<table style="width:200px;margin:5px 0"><tr>
<td title="Facebook" align="center"><a target="_blank" href="https://www.facebook.com/Greenbox-Nigeria-1032329466862501/"><div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Twitter" align="center"><a target="_blank" href="https://twitter.com/GreenboxNigeria"><div style="background:url(images/tt1.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Google+" align="center"><a target="_blank" href="https://plus.google.com/u/0/101846096960635449425"><div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="LinkedIn" align="center"><a target="_blank" href="https://www.linkedin.com/company/greenbox-nigeria"><div style="background:url(images/in.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Instagram" align="center"><a target="_blank" href="https://www.instagram.com/greenboxnigeria/"><div style="background:url(images/ig.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td></tr></table>
    
<br>

</td></tr></table>
<script src="scirpt/mob_links.js"></script>
<script>
aboutbox('greenbox');
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='About GreenboxNigeria.com';
	_id('description').content='Learn About Nigerian Music Industry and Greenbox Nigeria';
	_id('keywords').content='About, Terms  of Service, Advert/Publicity, Help';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }?>