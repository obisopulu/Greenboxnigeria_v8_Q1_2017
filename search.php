<?php include("rab_dbcon.php");
if ($detect->isMobile()){

extract($_GET);$today = date("Y-m-d"); 
$keys=$key=trim(htmlspecialchars($key));
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','search',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$anonymousCountry','$anonymousCity','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");
?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>

<?php 
if (strlen($key)<1){echo "<center>Type a key to search for</center>";}
elseif(strlen($key)<3){echo "<center>Not enough to search for.. keep typing</center>";}else{

$key=explode(' ',$key);

if (strlen($key[0]) > 2){$w1 = $key[0];}else{$w1 = 'greenbox';}
if (strlen($key[1]) > 2){$w2 = $key[1];}else{$w2 = 'greenbox';}
if (strlen($key[2]) > 2){$w3 = $key[2];}else{$w3 = 'greenbox';}
if (strlen($key[3]) > 2){$w4 = $key[3];}else{$w4 = 'greenbox';}
if (strlen($key[4]) > 2){$w5 = $key[4];}else{$w5 = 'greenbox';}
if (strlen($key[5]) > 2){$w6 = $key[5];}else{$w6 = 'greenbox';}
if (strlen($key[6]) > 2){$w7 = $key[6];}else{$w7 = 'greenbox';}
if (strlen($key[7]) > 2){$w8 = $key[7];}else{$w8 = 'greenbox';}
$sqlMUSIC = mysqli_query ($cxn, "SELECT * FROM songs WHERE  songTitle LIKE '%".$w1."%' OR songTitle LIKE '%".$w2."%' OR songTitle LIKE '%".$w3."%' OR songTitle LIKE '%".$w4."%' OR songTitle LIKE '%".$w5."%' OR songTitle LIKE '%".$w6."%' OR songTitle LIKE '%".$w7."%' OR songTitle LIKE '%".$w8."%'  
		
		
		OR songArtist LIKE '%".$w1."%' OR songArtist LIKE '%".$w2."%' OR songArtist LIKE '%".$w3."%' OR songArtist LIKE '%".$w4."%' OR songArtist LIKE '%".$w5."%' OR songArtist LIKE '%".$w6."%' OR songArtist LIKE '%".$w7."%' OR songArtist LIKE '%".$w8."%'
		
		
		OR songArtistFt LIKE '%".$w1."%' OR songArtistFt LIKE '%".$w2."%' OR songArtistFt LIKE '%".$w3."%' OR songArtistFt LIKE '%".$w4."%' OR songArtistFt LIKE '%".$w5."%' OR songArtistFt LIKE '%".$w6."%' OR songArtistFt LIKE '%".$w7."%' OR songArtistFt LIKE '%".$w8."%' 
		
		
		OR songAlbum LIKE '%".$w1."%' OR songAlbum LIKE '%".$w2."%' OR songAlbum LIKE '%".$w3."%' OR songAlbum LIKE '%".$w4."%' OR songAlbum LIKE '%".$w5."%' OR songAlbum LIKE '%".$w6."%' OR songAlbum LIKE '%".$w7."%' OR songAlbum LIKE '%".$w8."%' OR songAlbum LIKE '%".$w1."%' 
		
		
		OR songProducer LIKE '%".$w1."%' OR songProducer LIKE '%".$w2."%' OR songProducer LIKE '%".$w3."%' OR songProducer LIKE '%".$w4."%' OR songProducer LIKE '%".$w5."%' OR songProducer LIKE '%".$w6."%' OR songProducer LIKE '%".$w7."%' OR songProducer LIKE '%".$w8."%' 
		
		
		OR songType LIKE '%".$w1."%' OR songType LIKE '%".$w2."%' OR songType LIKE '%".$w3."%' OR songType LIKE '%".$w4."%' OR songType LIKE '%".$w5."%' OR songType LIKE '%".$w6."%' OR songType LIKE '%".$w7."%' OR songType LIKE '%".$w8."%' 
		
		
		OR songURL LIKE '%".$w1."%' OR songURL LIKE '%".$w2."%' OR songURL LIKE '%".$w3."%' OR songURL LIKE '%".$w4."%' OR songURL LIKE '%".$w5."%' OR songURL LIKE '%".$w6."%' OR songURL LIKE '%".$w7."%' OR songURL LIKE '%".$w8."%' 
		
		
		OR songGenre LIKE '%".$w1."%' OR songGenre LIKE '%".$w2."%' OR songGenre LIKE '%".$w3."%' OR songGenre LIKE '%".$w4."%' OR songGenre LIKE '%".$w5."%' OR songGenre LIKE '%".$w6."%' OR songGenre LIKE '%".$w7."%' OR songGenre LIKE '%".$w8."%' 
		
		
		OR songYear LIKE '%".$w1."%' OR songYear LIKE '%".$w2."%' OR songYear LIKE '%".$w3."%' OR songYear LIKE '%".$w4."%' OR songYear LIKE '%".$w5."%' OR songYear LIKE '%".$w6."%' OR songYear LIKE '%".$w7."%' OR songYear LIKE '%".$w8."%' 
		
		OR songLanguage LIKE '%".$w1."%' OR songLanguage LIKE '%".$w2."%' OR songLanguage LIKE '%".$w3."%' OR songLanguage LIKE '%".$w4."%' OR songLanguage LIKE '%".$w5."%' OR songLanguage LIKE '%".$w6."%' OR songLanguage LIKE '%".$w7."%' OR songLanguage LIKE '%".$w8. "%' ORDER BY RAND() LIMIT 20");
		
		
$sqlPEOPLE = mysqli_query ($cxn, "SELECT * FROM persons WHERE 
		personStageName LIKE '%".$w1."%' OR personStageName LIKE '%".$w2."%' OR personStageName LIKE '%".$w3."%' OR personStageName LIKE '%".$w4."%' OR personStageName LIKE '%".$w5."%' OR personStageName LIKE '%".$w6."%' OR personStageName LIKE '%".$w7."%' OR personStageName LIKE '%".$w8."%'  
		
		
		OR personBirthName LIKE '%".$w1."%' OR personBirthName LIKE '%".$w2."%' OR personBirthName LIKE '%".$w3."%' OR personBirthName LIKE '%".$w4."%' OR personBirthName LIKE '%".$w5."%' OR personBirthName LIKE '%".$w6."%' OR personBirthName LIKE '%".$w7."%' OR personBirthName LIKE '%".$w8."%'
		
		
		OR personFanName LIKE '%".$w1."%' OR personFanName LIKE '%".$w2."%' OR personFanName LIKE '%".$w3."%' OR personFanName LIKE '%".$w4."%' OR personFanName LIKE '%".$w5."%' OR personFanName LIKE '%".$w6."%' OR personFanName LIKE '%".$w7."%' OR personFanName LIKE '%".$w8."%' 
		
		
		OR personBirthYear LIKE '%".$w1."%' OR personBirthYear LIKE '%".$w2."%' OR personBirthYear LIKE '%".$w3."%' OR personBirthYear LIKE '%".$w4."%' OR personBirthYear LIKE '%".$w5."%' OR personBirthYear LIKE '%".$w6."%' OR personBirthYear LIKE '%".$w7."%' OR personBirthYear LIKE '%".$w8."%' 
		
		
		OR personPlaceOfOrigin LIKE '%".$w1."%' OR personPlaceOfOrigin LIKE '%".$w2."%' OR personPlaceOfOrigin LIKE '%".$w3."%' OR personPlaceOfOrigin LIKE '%".$w4."%' OR personPlaceOfOrigin LIKE '%".$w5."%' OR personPlaceOfOrigin LIKE '%".$w6."%' OR personPlaceOfOrigin LIKE '%".$w7."%' OR personPlaceOfOrigin LIKE '%".$w8."%'
		
		
		OR personGenre LIKE '%".$w1."%' OR personGenre LIKE '%".$w2."%' OR personGenre LIKE '%".$w3."%' OR personGenre LIKE '%".$w4."%' OR personGenre LIKE '%".$w5."%' OR personGenre LIKE '%".$w6."%' OR personGenre LIKE '%".$w7."%' OR personGenre LIKE '%".$w8."%' 
		
		
		OR personProfession1 LIKE '%".$w1."%' OR personProfession1 LIKE '%".$w2."%' OR personProfession1 LIKE '%".$w3."%' OR personProfession1 LIKE '%".$w4."%' OR personProfession1 LIKE '%".$w5."%' OR personProfession1 LIKE '%".$w6."%' OR personProfession1 LIKE '%".$w7."%' OR personProfession1 LIKE '%".$w8."%' 
		
		OR personProfession2 LIKE '%".$w1."%' OR personProfession2 LIKE '%".$w2."%' OR personProfession2 LIKE '%".$w3."%' OR personProfession2 LIKE '%".$w4."%' OR personProfession2 LIKE '%".$w5."%' OR personProfession2 LIKE '%".$w6."%' OR personProfession2 LIKE '%".$w7."%' OR personProfession2 LIKE '%".$w8."%' 
		OR personProfession3 LIKE '%".$w1."%' OR personProfession3 LIKE '%".$w2."%' OR personProfession3 LIKE '%".$w3."%' OR personProfession3 LIKE '%".$w4."%' OR personProfession3 LIKE '%".$w5."%' OR personProfession3 LIKE '%".$w6."%' OR personProfession3 LIKE '%".$w7."%' OR personProfession3 LIKE '%".$w8."%' 
		
		OR personCareerStartYear LIKE '%".$w1."%' OR personCareerStartYear LIKE '%".$w2."%' OR personCareerStartYear LIKE '%".$w3."%' OR personCareerStartYear LIKE '%".$w4."%' OR personCareerStartYear LIKE '%".$w5."%' OR personCareerStartYear LIKE '%".$w6."%' OR personCareerStartYear LIKE '%".$w7."%' OR personCareerStartYear LIKE '%".$w8."%' 
		
		
		OR personLabel LIKE '%".$w1."%' OR personLabel LIKE '%".$w2."%' OR personLabel LIKE '%".$w3."%' OR personLabel LIKE '%".$w4."%' OR personLabel LIKE '%".$w5."%' OR personLabel LIKE '%".$w6."%' OR personLabel LIKE '%".$w7."%' OR personLabel LIKE '%".$w8."%' ORDER BY RAND() LIMIT 20");
		
		
$sqlBLOG = mysqli_query ($cxn, "SELECT * FROM blog WHERE 
		blogName LIKE '%".$w1."%' OR blogName LIKE '%".$w2."%' OR blogName LIKE '%".$w3."%' OR blogName LIKE '%".$w4."%' OR blogName LIKE '%".$w5."%' OR blogName LIKE '%".$w6."%' OR blogName LIKE '%".$w7."%' OR blogName LIKE '%".$w8."%'  
		
		
		OR blogWriteup LIKE '%".$w1."%' OR blogWriteup LIKE '%".$w2."%' OR blogWriteup LIKE '%".$w3."%' OR blogWriteup LIKE '%".$w4."%' OR blogWriteup LIKE '%".$w5."%' OR blogWriteup LIKE '%".$w6."%' OR blogWriteup LIKE '%".$w7."%' OR blogWriteup LIKE '%".$w8."%' ORDER BY RAND() LIMIT 20");
		
		
$sqlLABEL = mysqli_query ($cxn, "SELECT * FROM labels WHERE 
		labelName LIKE '%".$w1."%' OR labelName LIKE '%".$w2."%' OR labelName LIKE '%".$w3."%' OR labelName LIKE '%".$w4."%' OR labelName LIKE '%".$w5."%' OR labelName LIKE '%".$w6."%' OR labelName LIKE '%".$w7."%' OR labelName LIKE '%".$w8."%'  
		
		
		OR labelOwner LIKE '%".$w1."%' OR labelOwner LIKE '%".$w2."%' OR labelOwner LIKE '%".$w3."%' OR labelOwner LIKE '%".$w4."%' OR labelOwner LIKE '%".$w5."%' OR labelOwner LIKE '%".$w6."%' OR labelOwner LIKE '%".$w7."%' OR labelOwner LIKE '%".$w8."%'
		
		OR labelArtists LIKE '%".$w1."%' OR labelArtists LIKE '%".$w2."%' OR labelArtists LIKE '%".$w3."%' OR labelArtists LIKE '%".$w4."%' OR labelArtists LIKE '%".$w5."%' OR labelArtists LIKE '%".$w6."%' OR labelArtists LIKE '%".$w7."%' OR labelArtists LIKE '%".$w8."%' 
		
		OR labelOthers LIKE '%".$w1."%' OR labelOthers LIKE '%".$w2."%' OR labelOthers LIKE '%".$w3."%' OR labelOthers LIKE '%".$w4."%' OR labelOthers LIKE '%".$w5."%' OR labelOthers LIKE '%".$w6."%' OR labelOthers LIKE '%".$w7."%' OR labelOthers LIKE '%".$w8."%' 
		
		
		OR labelProducers LIKE '%".$w1."%' OR labelProducers LIKE '%".$w2."%' OR labelProducers LIKE '%".$w3."%' OR labelProducers LIKE '%".$w4."%' OR labelProducers LIKE '%".$w5."%' OR labelProducers LIKE '%".$w6."%' OR labelProducers LIKE '%".$w7."%' OR labelProducers LIKE '%".$w8."%' ORDER BY RAND() LIMIT 20");
		
		
$sqlVIDEO = mysqli_query ($cxn, "SELECT * FROM videos WHERE 
		videoTitle LIKE '%".$w1."%' OR videoTitle LIKE '%".$w2."%' OR videoTitle LIKE '%".$w3."%' OR videoTitle LIKE '%".$w4."%' OR videoTitle LIKE '%".$w5."%' OR videoTitle LIKE '%".$w6."%' OR videoTitle LIKE '%".$w7."%' OR videoTitle LIKE '%".$w8."%'  
		
		
		OR videoArtist LIKE '%".$w1."%' OR videoArtist LIKE '%".$w2."%' OR videoArtist LIKE '%".$w3."%' OR videoArtist LIKE '%".$w4."%' OR videoArtist LIKE '%".$w5."%' OR videoArtist LIKE '%".$w6."%' OR videoArtist LIKE '%".$w7."%' OR videoArtist LIKE '%".$w8."%'
		
		
		OR videoArtistFt LIKE '%".$w1."%' OR videoArtistFt LIKE '%".$w2."%' OR videoArtistFt LIKE '%".$w3."%' OR videoArtistFt LIKE '%".$w4."%' OR videoArtistFt LIKE '%".$w5."%' OR videoArtistFt LIKE '%".$w6."%' OR videoArtistFt LIKE '%".$w7."%' OR videoArtistFt LIKE '%".$w8."%' 
		
				
		OR videoDirector LIKE '%".$w1."%' OR videoDirector LIKE '%".$w2."%' OR videoDirector LIKE '%".$w3."%' OR videoDirector LIKE '%".$w4."%' OR videoDirector LIKE '%".$w5."%' OR videoDirector LIKE '%".$w6."%' OR videoDirector LIKE '%".$w7."%' OR videoDirector LIKE '%".$w8."%' ORDER BY RAND() LIMIT 20");
?>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td>
<table class="tab1"><tr><td class="tabheader2">Search Results</td></tr><tr><td align="center">
<?php
if(mysqli_num_rows($sqlMUSIC)==0 && mysqli_num_rows($sqlBLOG)==0 && mysqli_num_rows($sqlLABEL)==0 && mysqli_num_rows($sqlPERSON)==0 && mysqli_num_rows($sqlVIDEO)==0 && strlen($keys) >2){echo"your search yielded no results<br><br><br><br><br><br>";}
elseif(mysqli_num_rows($sqlMUSIC)>0 && mysqli_num_rows($sqBLOG)>0 && mysqli_num_rows($sqlLABEL)>0 && mysqli_num_rows($sqlPERSON)>0 && mysqli_num_rows($sqlVIDEO)>0 && strlen($keys) >2){echo"search results for '$keys'";}
//else{echo"search results for '$key'";}
//elseif{echo"your search yielded no results";}
?>
</center>
</td></tr></table>
<?php if(mysqli_num_rows($sqlMUSIC)>0){?>
<table class="tab1"><tr><td class="tabheader2">Music</td></tr><tr><td>
<?php
while($row=mysqli_fetch_assoc($sqlMUSIC))
	{extract($row);echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable' style='border-bottom:thin solid rgba(0,0,0,.2)'><tr valign='middle'><td class='freshlabel'>"; if(strlen($songTitle)>40){echo substr_replace($songTitle,'..',40);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>40){echo substr_replace($songArtist,'..',40);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>40){echo substr_replace($songArtistFt,'..',40);}else{echo $songArtistFt;} echo "</span>";} echo"</td><td style='font-weight:bold;text-align:right; padding-right:5px'>&bull;&bull;&bull;</td></tr></table></a>";}?>
<br>
</td></tr></table>
<?php }
if(mysqli_num_rows($sqlBLOG)>0){?>
<table class="tab1"><tr><td class="tabheader2">Blog</td></tr><tr><td>
<?php
while($row=mysqli_fetch_assoc($sqlBLOG))
	{
		extract($row);	echo"<table class='fresh' align='center'><tr><td><br>
<a href='blogarticle.php?blogID=$blogID'><table class='blogtable' style='border-bottom:thin solid rgba(0,0,0,.2)'><tr valign='bottom'><td>
<div class='blogtimestamp'>$blogTimestamp	</div><div class='blogtopic' style='color:#000;'>$blogName</div><div class='blogwriteup'>";echo substr_replace($blogWriteup,'...',170); echo"</div></td></tr></table></a>
<table><tr><td><div class='blogtype'>"; if($blogSource==''){echo 'Featured';}echo"</div></td></tr></table><br></td></tr></table>";}?><br>
</td></tr></table>
<?php }
if(mysqli_num_rows($sqlPEOPLE)>0){?>
<table class="tab1"><tr><td class="tabheader2">People</td></tr><tr><td>
<?php
while($row=mysqli_fetch_assoc($sqlPEOPLE))
	{extract($row);	$b=$counter%2;
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$a=$counter%3;echo"
<a href='person.php?personID=$personID'><table class='peopletable' style='border-bottom:thin solid rgba(0,0,0,.2)'><tr><td class='peoplename'>$personStageName<div class='peoplelabel'>$personProfession1</div></td><td style='font-weight:bold;text-align:right; padding-right:5px'>&bull;&bull;&bull;</td></tr></table></a>";$counter++;}?><br>
</td></tr></table>
<?php }
if(mysqli_num_rows($sqlLABEL)>0){?>
<table class="tab1"><tr><td class="tabheader2">Label</td></tr><tr><td>
<?php
while($row=mysqli_fetch_assoc($sqlLABEL))
	{extract($row);
		$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
		$labelHistory=htmlspecialchars_decode($labelHistory);
		$labelArtists=htmlspecialchars_decode($labelArtists);
		$labelProducers=htmlspecialchars_decode($labelProducers);
		$labelOthers=htmlspecialchars_decode($labelOthers);
echo"
<a href='label.php?labelID=$labelID'><table class='freshtable' style='border-bottom:thin solid rgba(0,0,0,.2)'>
<tr><td class='freshlabel'>$labelName<div class='freshartist'>$labelOwner</div></td></tr></table></a>";
}?><br>
</td></tr></table>
<?php }
if(mysqli_num_rows($sqlVIDEO)>0){?>
<table class="tab1"><tr><td class="tabheader2">Video</td></tr><tr><td>
<?php
while($row=mysqli_fetch_assoc($sqlVIDEO))
	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		$a=$counter%2;	echo"
<a href='video.php?videoID=$videoID'><table class='videotable' style='border-bottom:thin solid rgba(0,0,0,.2)'><tr><td class='videoart'></td></tr>
<tr><td class='videoname'>$videoTitle<div class='videoartist'>$videoArtist</div></td></tr></table></a>";}?><br>
<?php }}?>
</td></tr></table>

</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music Search via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian search, fresh Nigerian search, new Nigerian search, Nigerian search, Nigerian songs news, search Nigerian tracks';}
</script>
</body>
</html>

<?php }else{
	
extract($_GET);$today = date("Y-m-d"); 
$keys=$key=trim(htmlspecialchars($key));
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','search',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$anonymousCountry','$anonymousCity','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");
?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table><tr><td style="width:auto;">
</td><td style="width:750px">
<fieldset>
    <legend>Search Results </legend>
<center>
<?php 
if (strlen($key)<1){echo "Type a key to search for";}
elseif(strlen($key)<3){echo "Not enough to search for.. keep typing";}

$key=explode(' ',$key);

if (strlen($key[0]) > 2){$w1 = $key[0];}else{$w1 = 'greenbox';}
if (strlen($key[1]) > 2){$w2 = $key[1];}else{$w2 = 'greenbox';}
if (strlen($key[2]) > 2){$w3 = $key[2];}else{$w3 = 'greenbox';}
if (strlen($key[3]) > 2){$w4 = $key[3];}else{$w4 = 'greenbox';}
if (strlen($key[4]) > 2){$w5 = $key[4];}else{$w5 = 'greenbox';}
if (strlen($key[5]) > 2){$w6 = $key[5];}else{$w6 = 'greenbox';}
if (strlen($key[6]) > 2){$w7 = $key[6];}else{$w7 = 'greenbox';}
if (strlen($key[7]) > 2){$w8 = $key[7];}else{$w8 = 'greenbox';}
$sqlMUSIC = mysqli_query ($cxn, "SELECT * FROM songs WHERE  songTitle LIKE '%".$w1."%' OR songTitle LIKE '%".$w2."%' OR songTitle LIKE '%".$w3."%' OR songTitle LIKE '%".$w4."%' OR songTitle LIKE '%".$w5."%' OR songTitle LIKE '%".$w6."%' OR songTitle LIKE '%".$w7."%' OR songTitle LIKE '%".$w8."%'  
		
		
		OR songArtist LIKE '%".$w1."%' OR songArtist LIKE '%".$w2."%' OR songArtist LIKE '%".$w3."%' OR songArtist LIKE '%".$w4."%' OR songArtist LIKE '%".$w5."%' OR songArtist LIKE '%".$w6."%' OR songArtist LIKE '%".$w7."%' OR songArtist LIKE '%".$w8."%'
		
		
		OR songArtistFt LIKE '%".$w1."%' OR songArtistFt LIKE '%".$w2."%' OR songArtistFt LIKE '%".$w3."%' OR songArtistFt LIKE '%".$w4."%' OR songArtistFt LIKE '%".$w5."%' OR songArtistFt LIKE '%".$w6."%' OR songArtistFt LIKE '%".$w7."%' OR songArtistFt LIKE '%".$w8."%' 
		
		
		OR songAlbum LIKE '%".$w1."%' OR songAlbum LIKE '%".$w2."%' OR songAlbum LIKE '%".$w3."%' OR songAlbum LIKE '%".$w4."%' OR songAlbum LIKE '%".$w5."%' OR songAlbum LIKE '%".$w6."%' OR songAlbum LIKE '%".$w7."%' OR songAlbum LIKE '%".$w8."%' OR songAlbum LIKE '%".$w1."%' 
		
		
		OR songProducer LIKE '%".$w1."%' OR songProducer LIKE '%".$w2."%' OR songProducer LIKE '%".$w3."%' OR songProducer LIKE '%".$w4."%' OR songProducer LIKE '%".$w5."%' OR songProducer LIKE '%".$w6."%' OR songProducer LIKE '%".$w7."%' OR songProducer LIKE '%".$w8."%' 
		
		
		OR songType LIKE '%".$w1."%' OR songType LIKE '%".$w2."%' OR songType LIKE '%".$w3."%' OR songType LIKE '%".$w4."%' OR songType LIKE '%".$w5."%' OR songType LIKE '%".$w6."%' OR songType LIKE '%".$w7."%' OR songType LIKE '%".$w8."%' 
		
		
		OR songURL LIKE '%".$w1."%' OR songURL LIKE '%".$w2."%' OR songURL LIKE '%".$w3."%' OR songURL LIKE '%".$w4."%' OR songURL LIKE '%".$w5."%' OR songURL LIKE '%".$w6."%' OR songURL LIKE '%".$w7."%' OR songURL LIKE '%".$w8."%' 
		
		
		OR songGenre LIKE '%".$w1."%' OR songGenre LIKE '%".$w2."%' OR songGenre LIKE '%".$w3."%' OR songGenre LIKE '%".$w4."%' OR songGenre LIKE '%".$w5."%' OR songGenre LIKE '%".$w6."%' OR songGenre LIKE '%".$w7."%' OR songGenre LIKE '%".$w8."%' 
		
		
		OR songYear LIKE '%".$w1."%' OR songYear LIKE '%".$w2."%' OR songYear LIKE '%".$w3."%' OR songYear LIKE '%".$w4."%' OR songYear LIKE '%".$w5."%' OR songYear LIKE '%".$w6."%' OR songYear LIKE '%".$w7."%' OR songYear LIKE '%".$w8."%' 
		
		OR songLanguage LIKE '%".$w1."%' OR songLanguage LIKE '%".$w2."%' OR songLanguage LIKE '%".$w3."%' OR songLanguage LIKE '%".$w4."%' OR songLanguage LIKE '%".$w5."%' OR songLanguage LIKE '%".$w6."%' OR songLanguage LIKE '%".$w7."%' OR songLanguage LIKE '%".$w8. "%' ORDER BY RAND()");
		
		
$sqlPEOPLE = mysqli_query ($cxn, "SELECT * FROM persons WHERE 
		personStageName LIKE '%".$w1."%' OR personStageName LIKE '%".$w2."%' OR personStageName LIKE '%".$w3."%' OR personStageName LIKE '%".$w4."%' OR personStageName LIKE '%".$w5."%' OR personStageName LIKE '%".$w6."%' OR personStageName LIKE '%".$w7."%' OR personStageName LIKE '%".$w8."%'  
		
		
		OR personBirthName LIKE '%".$w1."%' OR personBirthName LIKE '%".$w2."%' OR personBirthName LIKE '%".$w3."%' OR personBirthName LIKE '%".$w4."%' OR personBirthName LIKE '%".$w5."%' OR personBirthName LIKE '%".$w6."%' OR personBirthName LIKE '%".$w7."%' OR personBirthName LIKE '%".$w8."%'
		
		
		OR personFanName LIKE '%".$w1."%' OR personFanName LIKE '%".$w2."%' OR personFanName LIKE '%".$w3."%' OR personFanName LIKE '%".$w4."%' OR personFanName LIKE '%".$w5."%' OR personFanName LIKE '%".$w6."%' OR personFanName LIKE '%".$w7."%' OR personFanName LIKE '%".$w8."%' 
		
		
		OR personBirthYear LIKE '%".$w1."%' OR personBirthYear LIKE '%".$w2."%' OR personBirthYear LIKE '%".$w3."%' OR personBirthYear LIKE '%".$w4."%' OR personBirthYear LIKE '%".$w5."%' OR personBirthYear LIKE '%".$w6."%' OR personBirthYear LIKE '%".$w7."%' OR personBirthYear LIKE '%".$w8."%' 
		
		
		OR personPlaceOfOrigin LIKE '%".$w1."%' OR personPlaceOfOrigin LIKE '%".$w2."%' OR personPlaceOfOrigin LIKE '%".$w3."%' OR personPlaceOfOrigin LIKE '%".$w4."%' OR personPlaceOfOrigin LIKE '%".$w5."%' OR personPlaceOfOrigin LIKE '%".$w6."%' OR personPlaceOfOrigin LIKE '%".$w7."%' OR personPlaceOfOrigin LIKE '%".$w8."%'
		
		
		OR personGenre LIKE '%".$w1."%' OR personGenre LIKE '%".$w2."%' OR personGenre LIKE '%".$w3."%' OR personGenre LIKE '%".$w4."%' OR personGenre LIKE '%".$w5."%' OR personGenre LIKE '%".$w6."%' OR personGenre LIKE '%".$w7."%' OR personGenre LIKE '%".$w8."%' 
		
		
		OR personProfession1 LIKE '%".$w1."%' OR personProfession1 LIKE '%".$w2."%' OR personProfession1 LIKE '%".$w3."%' OR personProfession1 LIKE '%".$w4."%' OR personProfession1 LIKE '%".$w5."%' OR personProfession1 LIKE '%".$w6."%' OR personProfession1 LIKE '%".$w7."%' OR personProfession1 LIKE '%".$w8."%' 
		
		OR personProfession2 LIKE '%".$w1."%' OR personProfession2 LIKE '%".$w2."%' OR personProfession2 LIKE '%".$w3."%' OR personProfession2 LIKE '%".$w4."%' OR personProfession2 LIKE '%".$w5."%' OR personProfession2 LIKE '%".$w6."%' OR personProfession2 LIKE '%".$w7."%' OR personProfession2 LIKE '%".$w8."%' 
		OR personProfession3 LIKE '%".$w1."%' OR personProfession3 LIKE '%".$w2."%' OR personProfession3 LIKE '%".$w3."%' OR personProfession3 LIKE '%".$w4."%' OR personProfession3 LIKE '%".$w5."%' OR personProfession3 LIKE '%".$w6."%' OR personProfession3 LIKE '%".$w7."%' OR personProfession3 LIKE '%".$w8."%' 
		
		OR personCareerStartYear LIKE '%".$w1."%' OR personCareerStartYear LIKE '%".$w2."%' OR personCareerStartYear LIKE '%".$w3."%' OR personCareerStartYear LIKE '%".$w4."%' OR personCareerStartYear LIKE '%".$w5."%' OR personCareerStartYear LIKE '%".$w6."%' OR personCareerStartYear LIKE '%".$w7."%' OR personCareerStartYear LIKE '%".$w8."%' 
		
		
		OR personLabel LIKE '%".$w1."%' OR personLabel LIKE '%".$w2."%' OR personLabel LIKE '%".$w3."%' OR personLabel LIKE '%".$w4."%' OR personLabel LIKE '%".$w5."%' OR personLabel LIKE '%".$w6."%' OR personLabel LIKE '%".$w7."%' OR personLabel LIKE '%".$w8."%' ORDER BY RAND()");
		
		
$sqlBLOG = mysqli_query ($cxn, "SELECT * FROM blog WHERE 
		blogName LIKE '%".$w1."%' OR blogName LIKE '%".$w2."%' OR blogName LIKE '%".$w3."%' OR blogName LIKE '%".$w4."%' OR blogName LIKE '%".$w5."%' OR blogName LIKE '%".$w6."%' OR blogName LIKE '%".$w7."%' OR blogName LIKE '%".$w8."%'  
		
		
		OR blogWriteup LIKE '%".$w1."%' OR blogWriteup LIKE '%".$w2."%' OR blogWriteup LIKE '%".$w3."%' OR blogWriteup LIKE '%".$w4."%' OR blogWriteup LIKE '%".$w5."%' OR blogWriteup LIKE '%".$w6."%' OR blogWriteup LIKE '%".$w7."%' OR blogWriteup LIKE '%".$w8."%' ORDER BY RAND()");
		
		
$sqlLABEL = mysqli_query ($cxn, "SELECT * FROM labels WHERE 
		labelName LIKE '%".$w1."%' OR labelName LIKE '%".$w2."%' OR labelName LIKE '%".$w3."%' OR labelName LIKE '%".$w4."%' OR labelName LIKE '%".$w5."%' OR labelName LIKE '%".$w6."%' OR labelName LIKE '%".$w7."%' OR labelName LIKE '%".$w8."%'  
		
		
		OR labelOwner LIKE '%".$w1."%' OR labelOwner LIKE '%".$w2."%' OR labelOwner LIKE '%".$w3."%' OR labelOwner LIKE '%".$w4."%' OR labelOwner LIKE '%".$w5."%' OR labelOwner LIKE '%".$w6."%' OR labelOwner LIKE '%".$w7."%' OR labelOwner LIKE '%".$w8."%'
		
				
		OR labelArtists LIKE '%".$w1."%' OR labelArtists LIKE '%".$w2."%' OR labelArtists LIKE '%".$w3."%' OR labelArtists LIKE '%".$w4."%' OR labelArtists LIKE '%".$w5."%' OR labelArtists LIKE '%".$w6."%' OR labelArtists LIKE '%".$w7."%' OR labelArtists LIKE '%".$w8."%' 
		
		OR labelOthers LIKE '%".$w1."%' OR labelOthers LIKE '%".$w2."%' OR labelOthers LIKE '%".$w3."%' OR labelOthers LIKE '%".$w4."%' OR labelOthers LIKE '%".$w5."%' OR labelOthers LIKE '%".$w6."%' OR labelOthers LIKE '%".$w7."%' OR labelOthers LIKE '%".$w8."%' 
		
		
		OR labelProducers LIKE '%".$w1."%' OR labelProducers LIKE '%".$w2."%' OR labelProducers LIKE '%".$w3."%' OR labelProducers LIKE '%".$w4."%' OR labelProducers LIKE '%".$w5."%' OR labelProducers LIKE '%".$w6."%' OR labelProducers LIKE '%".$w7."%' OR labelProducers LIKE '%".$w8."%' ORDER BY RAND()");
		
		
$sqlVIDEO = mysqli_query ($cxn, "SELECT * FROM labels WHERE 
		videoTitle LIKE '%".$w1."%' OR videoTitle LIKE '%".$w2."%' OR videoTitle LIKE '%".$w3."%' OR videoTitle LIKE '%".$w4."%' OR videoTitle LIKE '%".$w5."%' OR videoTitle LIKE '%".$w6."%' OR videoTitle LIKE '%".$w7."%' OR videoTitle LIKE '%".$w8."%'  
		
		
		OR videoArtist LIKE '%".$w1."%' OR videoArtist LIKE '%".$w2."%' OR videoArtist LIKE '%".$w3."%' OR videoArtist LIKE '%".$w4."%' OR videoArtist LIKE '%".$w5."%' OR videoArtist LIKE '%".$w6."%' OR videoArtist LIKE '%".$w7."%' OR videoArtist LIKE '%".$w8."%'
		
		
		OR videoArtistFt LIKE '%".$w1."%' OR videoArtistFt LIKE '%".$w2."%' OR videoArtistFt LIKE '%".$w3."%' OR videoArtistFt LIKE '%".$w4."%' OR videoArtistFt LIKE '%".$w5."%' OR videoArtistFt LIKE '%".$w6."%' OR videoArtistFt LIKE '%".$w7."%' OR videoArtistFt LIKE '%".$w8."%' 
		
				
		OR videoDirector LIKE '%".$w1."%' OR videoDirector LIKE '%".$w2."%' OR videoDirector LIKE '%".$w3."%' OR videoDirector LIKE '%".$w4."%' OR videoDirector LIKE '%".$w5."%' OR videoDirector LIKE '%".$w6."%' OR videoDirector LIKE '%".$w7."%' OR videoDirector LIKE '%".$w8."%' ORDER BY RAND()");

if(mysqli_num_rows($sqlMUSIC)==0 && mysqli_num_rows($sqlBLOG)==0 && mysqli_num_rows($sqlLABEL)==0 && mysqli_num_rows($sqlPERSON)==0 && mysqli_num_rows($sqlVIDEO)==0 && strlen($keys) >2){echo"your search yielded no results";}
elseif(mysqli_num_rows($sqlMUSIC)>0 && mysqli_num_rows($sqBLOG)>0 && mysqli_num_rows($sqlLABEL)>0 && mysqli_num_rows($sqlPERSON)>0 && mysqli_num_rows($sqlVIDEO)>0 && strlen($keys) >2){echo"search results for '$keys'";}
//else{echo"search results for '$key'";}
//elseif{echo"your search yielded no results";}
?>
</center>
</fieldset>
<?php if(mysqli_num_rows($sqlMUSIC)>0){?>
<fieldset>
    <legend>Music </legend>
<table style="font-weight:100"><tr style="color:#00E676">
<td width="30%">Title</td>
<td width="25%">Artist</td>
<td width="40%">Artist featured</td>
<td width="5%">Year</td>
</tr></table>
<?php
while($row=mysqli_fetch_assoc($sqlMUSIC))
	{extract($row);echo"
<a href='musicpreview.php?t=$songID'><table style='font-weight:100'><tr bgcolor='#111'>
<td width='30%'>$songTitle</td>
<td width='25%'>$songArtist</td>
<td width='40%'>$songArtistFt</td>
<td width='5%'>$songYear</td>
</tr></table></a>";}?>
<br>
</fieldset>
<?php }
if(mysqli_num_rows($sqlBLOG)>0){?>
<fieldset>
    <legend>Blog </legend>
<table style="font-weight:100"><tr style="color:#00E676">
<td width="90%">Topic</td>
<td width="10%">Date</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sqlBLOG))
	{extract($row);echo"
<a href='blogarticle.php?blogID=$blogID'><table style='font-weight:100'><tr bgcolor='#111'>
<td width='90%'>$blogName</td>
<td width='10%'>$blogTimestamp</td></tr></table></a>";}?><br>
</fieldset>
<?php }
if(mysqli_num_rows($sqlPEOPLE)>0){?>
<fieldset>
    <legend>People </legend>
<table style="font-weight:100"><tr style="color:#00E676">
<td width="60%">Person</td>
<td width="40%">Label</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sqlPEOPLE))
	{extract($row);echo"
<a href='person.php?personID=$personID'><table style='font-weight:100'><tr bgcolor='#111' align='cener'>
<td width='60%'>$personStageName</td>
<td width='40%'>$personProfession1</td></tr></table></a>";}?><br>
</fieldset>
<?php }
if(mysqli_num_rows($sqlLABEL)>0){?>
<fieldset>
    <legend>Label </legend>
<table style="font-weight:100"><tr style="color:#00E676">
<td width="60%">Label</td>
<td width="40%">Founder</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sqlLABEL))
	{extract($row);echo"
<a href='label.php?labelID=$labelID'><table style='font-weight:100'><tr bgcolor='#111' align='cener'>
<td width='60%'>$labelName</td>
<td width='40%'>$labelOwner</td></tr></table></a>";}?><br>
</fieldset>
<?php }
if(mysqli_num_rows($sqlVIDEO)>0){?>
<fieldset>
    <legend>Video </legend>
<table style="font-weight:100"><tr style="color:#00E676">
<td width="60%">Video</td>
<td width="40%">Artist</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sqlVIDEO))
	{extract($row);echo"
<a href='video.php?videoID=$videoID'><table style='font-weight:100'><tr bgcolor='#111' align='cener'>
<td width='60%'>God of the Earth</td>
<td width='40%'>Maxx</td></tr></table></a>";}?><br>
<?php }?>
  </fieldset>
</td><td style="width:auto">
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music Search via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian search, fresh Nigerian search, new Nigerian search, Nigerian search, Nigerian songs news, search Nigerian tracks';}
</script>
</body>
</html>

<?php }?>