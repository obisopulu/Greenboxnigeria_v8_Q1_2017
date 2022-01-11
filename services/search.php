<?php include("../rab_dbcon.php");

extract($_GET);$today = date("Y-m-d"); 
$key=trim(htmlspecialchars($key));


if ($detect->isMobile()){

if (strlen($key)<1){?>

<center><table style='width:90%; color:#000; margin:20px 0;font-size:.9em; font-weight:700; text-align:center'><tr><td>Type a word or phrase to search</td></tr></table></center>

    	<table align="center" style="color:#000; background:#FFF"><tr><td style=" padding:10px 0; border-bottom:thin solid #AAA; border-top:thin solid #AAA">

	<table align="center" style="width:90%;">
     <tr><td style="padding:5px 0; font-size:.8em; font-weight:700; text-align:left">History :</td></tr>
	<?php
$sqlHistory = mysqli_query($cxn, "SELECT DISTINCT anonymousRating FROM anonymous WHERE anonymousRating LIKE '%search - %' ORDER BY anonymousID DESC LIMIT 10")or die('sdf');while($row=mysqli_fetch_assoc($sqlHistory)){extract($row);
	?>
	<tr><td style="padding:5px 0 0 10px; font-size:.8em; font-weight:700;" onClick="document.getElementById('keyword').value=this.innerHTML; looking(this.innerHTML)"><?php echo  str_ireplace("search - ", "", $anonymousRating); ?></td></tr>
	<?php
}
	?>
	</table>
     </td></tr></table>
	<?php

}elseif(strlen($key)<3){?><center><table style='width:90%; color:#000; margin:20px 0;font-size:.9em; font-weight:700; text-align:center'><tr><td>Not enough to search for.. keep typing</td></tr></table></center>

    	<table align="center" style="color:#000; background:#FFF"><tr><td style=" padding:10px 0; border-bottom:thin solid #AAA; border-top:thin solid #AAA">
     
	<table align="center" style="width:90%;">
     <tr><td style="padding:5px 0; font-size:.8em; font-weight:700; text-align:left">History :</td></tr>
	<?php
$sqlHistory = mysqli_query($cxn, "SELECT DISTINCT anonymousRating FROM anonymous WHERE anonymousRating LIKE '%search - %' ORDER BY anonymousID DESC LIMIT 10")or die('sdf');while($row=mysqli_fetch_assoc($sqlHistory)){extract($row);
	?>
	<tr><td style="padding:5px 0 0 10px; font-size:.8em; font-weight:700;" onClick="document.getElementById('keyword').value=this.innerHTML; looking(this.innerHTML)"><?php echo  str_ireplace("search - ", "", $anonymousRating); ?></td></tr>
	<?php
}
	?>
	</table>
     </td></tr></table>
	<?php

}else{
$keys=$key;

$key=explode(' ',$key);

if (strlen($key[0]) > 2){$w1 = $key[0];}else{$w1 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}
if (strlen($key[1]) > 2){$w2 = $key[1];}else{$w2 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}
if (strlen($key[2]) > 2){$w3 = $key[2];}else{$w3 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}
if (strlen($key[3]) > 2){$w4 = $key[3];}else{$w4 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}
if (strlen($key[4]) > 2){$w5 = $key[4];}else{$w5 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}
if (strlen($key[5]) > 2){$w6 = $key[5];}else{$w6 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}
if (strlen($key[6]) > 2){$w7 = $key[6];}else{$w7 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}
if (strlen($key[7]) > 2){$w8 = $key[7];}else{$w8 = 'efhgiferhighierhgihdfiuhbgklfiuhtrd';}


$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','search - $keys',NULL,'',anonymousPlatform,'','$anonymousCountry','$anonymousCity','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

$limitMusic = 20;

$sqlMUSIC = mysqli_query($cxn, "SELECT * FROM songs WHERE  songTitle ='$keys' OR songArtist ='$keys' OR songArtistFt ='$keys' OR songAlbum ='$keys' OR songProducer ='$keys' LIMIT $limitMusic");

$limitMusic = 20 - mysqli_num_rows($sqlMUSIC);
if($limitMusic<1){$limitMusic = 0;}

$sqlMUSIC2 = mysqli_query ($cxn, "
SELECT * FROM songs WHERE  
songTitle LIKE '%$w1%' OR songTitle LIKE '%$w2%' OR songTitle LIKE '%$w3%' OR songTitle LIKE '%$w4%' OR songTitle LIKE '%$w5%' OR songTitle LIKE '%$w6%' OR songTitle LIKE '%$w7%' OR songTitle LIKE '%$w8%' OR 

songArtist LIKE '%$w1%' OR songArtist LIKE '%$w2%' OR songArtist LIKE '%$w3%' OR songArtist LIKE '%$w4%' OR songArtist LIKE '%$w5%' OR songArtist LIKE '%$w6%' OR songArtist LIKE '%$w7%' OR songArtist LIKE '%$w8%' OR 

songArtistFt LIKE '%$w1%' OR songArtistFt LIKE '%$w2%' OR songArtistFt LIKE '%$w3%' OR songArtistFt LIKE '%$w4%' OR songArtistFt LIKE '%$w5%' OR songArtistFt LIKE '%$w6%' OR songArtistFt LIKE '%$w7%' OR songArtistFt LIKE '%$w8%' OR 

songAlbum LIKE '%$w1%' OR songAlbum LIKE '%$w2%' OR songAlbum LIKE '%$w3%' OR songAlbum LIKE '%$w4%' OR songAlbum LIKE '%$w5%' OR songAlbum LIKE '%$w6%' OR songAlbum LIKE '%$w7%' OR songAlbum LIKE '%$w8%' OR 

songProducer LIKE '%$w1%' OR songProducer LIKE '%$w2%' OR songProducer LIKE '%$w3%' OR songProducer LIKE '%$w4%' OR songProducer LIKE '%$w5%' OR songProducer LIKE '%$w6%' OR songProducer LIKE '%$w7%' OR songProducer LIKE '%$w8%' OR 

songURL LIKE '%$w1%' OR songURL LIKE '%$w2%' OR songURL LIKE '%$w3%' OR songURL LIKE '%$w4%' OR songURL LIKE '%$w5%' OR songURL LIKE '%$w6%' OR songURL LIKE '%$w7%' OR songURL LIKE '%$w8%' OR 

songGenre LIKE '%$w1%' OR songGenre LIKE '%$w2%' OR songGenre LIKE '%$w3%' OR songGenre LIKE '%$w4%' OR songGenre LIKE '%$w5%' OR songGenre LIKE '%$w6%' OR songGenre LIKE '%$w7%' OR songGenre LIKE '%$w8%' OR 

songYear LIKE '%$w1%' OR songYear LIKE '%$w2%' OR songYear LIKE '%$w3%' OR songYear LIKE '%$w4%' OR songYear LIKE '%$w5%' OR songYear LIKE '%$w6%' OR songYear LIKE '%$w7%' OR songYear LIKE '%$w8%' 	OR 

songLanguage LIKE '%$w1%' OR songLanguage LIKE '%$w2%' OR songLanguage LIKE '%$w3%' OR songLanguage LIKE '%$w4%' OR songLanguage LIKE '%$w5%' OR songLanguage LIKE '%$w6%' OR songLanguage LIKE '%$w7%' OR songLanguage LIKE '%$w8%' ORDER BY RAND() LIMIT $limitMusic");


$limitMusic = $limitMusic- mysqli_num_rows($sqlMUSIC2);
if($limitMusic<1){$limitMusic = 0;}

$limitVideo = 20;

$sqlVideo = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle ='$keys' OR videoArtist ='$keys' OR videoArtistFt ='$keys' OR videoDirector ='$keys' LIMIT $limitVideo");

$limitVideo = 20 - mysqli_num_rows($sqlVideo);
if($limitVideo<1){$limitVideo = 0;}

$sqlVideo2 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '%".$w1."%' OR videoTitle LIKE '%".$w2."%' OR videoTitle LIKE '%".$w3."%' OR videoTitle LIKE '%".$w4."%' OR videoTitle LIKE '%".$w5."%' OR videoTitle LIKE '%".$w6."%' OR videoTitle LIKE '%".$w7."%' OR videoTitle LIKE '%".$w8."%'  OR videoArtist LIKE '%".$w1."%' OR videoArtist LIKE '%".$w2."%' OR videoArtist LIKE '%".$w3."%' OR videoArtist LIKE '%".$w4."%' OR videoArtist LIKE '%".$w5."%' OR videoArtist LIKE '%".$w6."%' OR videoArtist LIKE '%".$w7."%' OR videoArtist LIKE '%".$w8."%' OR videoArtistFt LIKE '%".$w1."%' OR videoArtistFt LIKE '%".$w2."%' OR videoArtistFt LIKE '%".$w3."%' OR videoArtistFt LIKE '%".$w4."%' OR videoArtistFt LIKE '%".$w5."%' OR videoArtistFt LIKE '%".$w6."%' OR videoArtistFt LIKE '%".$w7."%' OR videoArtistFt LIKE '%".$w8."%' OR videoDirector LIKE '%".$w1."%' OR videoDirector LIKE '%".$w2."%' OR videoDirector LIKE '%".$w3."%' OR videoDirector LIKE '%".$w4."%' OR videoDirector LIKE '%".$w5."%' OR videoDirector LIKE '%".$w6."%' OR videoDirector LIKE '%".$w7."%' OR videoDirector LIKE '%".$w8."%' ORDER BY RAND() LIMIT $limitVideo");


$limitVideo = $limitVideo- mysqli_num_rows($sqlVideo2);
if($limitVideo<1){$limitVideo = 0;}

$limitPeople = 20;

$sqlPeople = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName ='$keys' OR personBirthName ='$keys' OR personFanName ='$keys' OR personBirthYear ='$keys' OR personPlaceOfOrigin ='$keys' OR personGenre ='$keys' OR personProfession1 ='$keys' OR personProfession2 ='$keys' OR personProfession3 ='$keys' OR personCareerStartYear ='$keys' OR personLabel ='$keys' LIMIT $limitPeople");

$limitPeople = 20 - mysqli_num_rows($sqlPeople);
if($limitPeople<1){$limitPeople = 0;}

$sqlPeople2 = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName LIKE '%".$w1."%' OR personStageName LIKE '%".$w2."%' OR personStageName LIKE '%".$w3."%' OR personStageName LIKE '%".$w4."%' OR personStageName LIKE '%".$w5."%' OR personStageName LIKE '%".$w6."%' OR personStageName LIKE '%".$w7."%' OR personStageName LIKE '%".$w8."%'  OR personBirthName LIKE '%".$w1."%' OR personBirthName LIKE '%".$w2."%' OR personBirthName LIKE '%".$w3."%' OR personBirthName LIKE '%".$w4."%' OR personBirthName LIKE '%".$w5."%' OR personBirthName LIKE '%".$w6."%' OR personBirthName LIKE '%".$w7."%' OR personBirthName LIKE '%".$w8."%' OR personFanName LIKE '%".$w1."%' OR personFanName LIKE '%".$w2."%' OR personFanName LIKE '%".$w3."%' OR personFanName LIKE '%".$w4."%' OR personFanName LIKE '%".$w5."%' OR personFanName LIKE '%".$w6."%' OR personFanName LIKE '%".$w7."%' OR personFanName LIKE '%".$w8."%' OR personBirthYear LIKE '%".$w1."%' OR personBirthYear LIKE '%".$w2."%' OR personBirthYear LIKE '%".$w3."%' OR personBirthYear LIKE '%".$w4."%' OR personBirthYear LIKE '%".$w5."%' OR personBirthYear LIKE '%".$w6."%' OR personBirthYear LIKE '%".$w7."%' OR personBirthYear LIKE '%".$w8."%'  OR personPlaceOfOrigin LIKE '%".$w1."%' OR personPlaceOfOrigin LIKE '%".$w2."%' OR personPlaceOfOrigin LIKE '%".$w3."%' OR personPlaceOfOrigin LIKE '%".$w4."%' OR personPlaceOfOrigin LIKE '%".$w5."%' OR personPlaceOfOrigin LIKE '%".$w6."%' OR personPlaceOfOrigin LIKE '%".$w7."%' OR personPlaceOfOrigin LIKE '%".$w8."%' OR personGenre LIKE '%".$w1."%' OR personGenre LIKE '%".$w2."%' OR personGenre LIKE '%".$w3."%' OR personGenre LIKE '%".$w4."%' OR personGenre LIKE '%".$w5."%' OR personGenre LIKE '%".$w6."%' OR personGenre LIKE '%".$w7."%' OR personGenre LIKE '%".$w8."%'  OR personProfession1 LIKE '%".$w1."%' OR personProfession1 LIKE '%".$w2."%' OR personProfession1 LIKE '%".$w3."%' OR personProfession1 LIKE '%".$w4."%' OR personProfession1 LIKE '%".$w5."%' OR personProfession1 LIKE '%".$w6."%' OR personProfession1 LIKE '%".$w7."%' OR personProfession1 LIKE '%".$w8."%'  OR personProfession2 LIKE '%".$w1."%' OR personProfession2 LIKE '%".$w2."%' OR personProfession2 LIKE '%".$w3."%' OR personProfession2 LIKE '%".$w4."%' OR personProfession2 LIKE '%".$w5."%' OR personProfession2 LIKE '%".$w6."%' OR personProfession2 LIKE '%".$w7."%' OR personProfession2 LIKE '%".$w8."%'  OR personProfession3 LIKE '%".$w1."%' OR personProfession3 LIKE '%".$w2."%' OR personProfession3 LIKE '%".$w3."%' OR personProfession3 LIKE '%".$w4."%' OR personProfession3 LIKE '%".$w5."%' OR personProfession3 LIKE '%".$w6."%' OR personProfession3 LIKE '%".$w7."%' OR personProfession3 LIKE '%".$w8."%'  OR personCareerStartYear LIKE '%".$w1."%' OR personCareerStartYear LIKE '%".$w2."%' OR personCareerStartYear LIKE '%".$w3."%' OR personCareerStartYear LIKE '%".$w4."%' OR personCareerStartYear LIKE '%".$w5."%' OR personCareerStartYear LIKE '%".$w6."%' OR personCareerStartYear LIKE '%".$w7."%' OR personCareerStartYear LIKE '%".$w8."%'  OR personLabel LIKE '%".$w1."%' OR personLabel LIKE '%".$w2."%' OR personLabel LIKE '%".$w3."%' OR personLabel LIKE '%".$w4."%' OR personLabel LIKE '%".$w5."%' OR personLabel LIKE '%".$w6."%' OR personLabel LIKE '%".$w7."%' OR personLabel LIKE '%".$w8."%' LIMIT $limitPeople");

$limitPeople = $limitPeople- mysqli_num_rows($sqlPeople2);
if($limitPeople<1){$limitPeople = 0;}


$limitBlog = 20;

$sqlBlog = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogName ='$keys' OR blogWriteup ='$keys' LIMIT $limitBlog");

$limitBlog = 20 - mysqli_num_rows($sqlBlog);
if($limitBlog<1){$limitBlog = 0;}

$sqlBlog2 = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogName LIKE '%".$w1."%' OR blogName LIKE '%".$w2."%' OR blogName LIKE '%".$w3."%' OR blogName LIKE '%".$w4."%' OR blogName LIKE '%".$w5."%' OR blogName LIKE '%".$w6."%' OR blogName LIKE '%".$w7."%' OR blogName LIKE '%".$w8."%'  OR blogWriteup LIKE '%".$w1."%' OR blogWriteup LIKE '%".$w2."%' OR blogWriteup LIKE '%".$w3."%' OR blogWriteup LIKE '%".$w4."%' OR blogWriteup LIKE '%".$w5."%' OR blogWriteup LIKE '%".$w6."%' OR blogWriteup LIKE '%".$w7."%' OR blogWriteup LIKE '%".$w8."%' LIMIT $limitBlog");

$limitBlog = $limitBlog- mysqli_num_rows($sqlBlog2);
if($limitBlog<1){$limitBlog = 0;}


$limitLabel = 20;

$sqlLabel = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelName ='$keys' OR labelOwner ='$keys' OR labelArtists ='$keys' OR labelOthers ='$keys' OR labelProducers ='$keys' LIMIT $limitLabel");

$limitLabel = 20 - mysqli_num_rows($sqlLabel);
if($limitLabel<1){$limitLabel = 0;}

$sqlLabel2 = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelName LIKE '%".$w1."%' OR labelName LIKE '%".$w2."%' OR labelName LIKE '%".$w3."%' OR labelName LIKE '%".$w4."%' OR labelName LIKE '%".$w5."%' OR labelName LIKE '%".$w6."%' OR labelName LIKE '%".$w7."%' OR labelName LIKE '%".$w8."%'  OR labelOwner LIKE '%".$w1."%' OR labelOwner LIKE '%".$w2."%' OR labelOwner LIKE '%".$w3."%' OR labelOwner LIKE '%".$w4."%' OR labelOwner LIKE '%".$w5."%' OR labelOwner LIKE '%".$w6."%' OR labelOwner LIKE '%".$w7."%' OR labelOwner LIKE '%".$w8."%' OR labelArtists LIKE '%".$w1."%' OR labelArtists LIKE '%".$w2."%' OR labelArtists LIKE '%".$w3."%' OR labelArtists LIKE '%".$w4."%' OR labelArtists LIKE '%".$w5."%' OR labelArtists LIKE '%".$w6."%' OR labelArtists LIKE '%".$w7."%' OR labelArtists LIKE '%".$w8."%'  OR labelOthers LIKE '%".$w1."%' OR labelOthers LIKE '%".$w2."%' OR labelOthers LIKE '%".$w3."%' OR labelOthers LIKE '%".$w4."%' OR labelOthers LIKE '%".$w5."%' OR labelOthers LIKE '%".$w6."%' OR labelOthers LIKE '%".$w7."%' OR labelOthers LIKE '%".$w8."%'  OR labelProducers LIKE '%".$w1."%' OR labelProducers LIKE '%".$w2."%' OR labelProducers LIKE '%".$w3."%' OR labelProducers LIKE '%".$w4."%' OR labelProducers LIKE '%".$w5."%' OR labelProducers LIKE '%".$w6."%' OR labelProducers LIKE '%".$w7."%' OR labelProducers LIKE '%".$w8."%' LIMIT $limitLabel");

$limitLabel = $limitLabel- mysqli_num_rows($sqlLabel2);
if($limitLabel<1){$limitLabel = 0;}
?>

<!--<table class="tab1"><tr><td class="tabheader2">Search Results</td></tr><tr><td align="center">
<?php
// if(mysqli_num_rows($sqlMUSIC)==0 && mysqli_num_rows($sqlBLOG)==0 && mysqli_num_rows($sqlLABEL)==0 && mysqli_num_rows($sqlPERSON)==0 && mysqli_num_rows($sqlVIDEO)==0 && strlen($keys) >2){echo"your search yielded no results<br><br><br><br><br><br>";}
// elseif(mysqli_num_rows($sqlMUSIC)>0 && mysqli_num_rows($sqBLOG)>0 && mysqli_num_rows($sqlLABEL)>0 && mysqli_num_rows($sqlPERSON)>0 && mysqli_num_rows($sqlVIDEO)>0 && strlen($keys) >2){echo"search results for '$keys'";}
//else{echo"search results for '$key'";}
//elseif{echo"your search yielded no results";}
?>
</center>
</td></tr></table>-->

 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style=" background:#FFF; color:#000; height:50px; font-size:.8em; font-weight:700;width:90%">MUSIC</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitMusic;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlMUSIC)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="linkered('musicpreview.php?t=<?php echo $songID?>');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td></tr></table>
	</td></tr></table>
	<?php $musicID.=" ".$songID; }



while($row=mysqli_fetch_assoc($sqlMUSIC2)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		
      if (strpos($musicID,"$songID") !== false) {}else{?>
	<table style='width:98%; margin:5px 0' onClick="linkered('musicpreview.php?t=<?php echo $songID?>');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td></tr></table>
	</td></tr></table>
	<?php }}?>
     

 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style=" background:#FFF; color:#000; height:50px; font-size:.8em; font-weight:700;width:90%">VISUALS</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitVideo;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlVideo))

	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
		<table style='width:98%; margin:5px 0' onClick="linkered('video.php?videoID=<?php echo $videoID?>'); closeLost()"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
	<?php  $visualID.=" ".$videoID; } 

while($row=mysqli_fetch_assoc($sqlVideo2)) 

	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		
		if (strpos($visualID,"$videoID") !== false) {}else{?>
		<table style='width:98%; margin:5px 0' onClick="linkered('video.php?videoID=<?php echo $videoID?>'); closeLost()"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
	<?php }}
	
	
	
?>
 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style=" background:#FFF; color:#000; height:50px; font-size:.8em; font-weight:700;width:90%">PEOPLE</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitPeople;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlPeople))

	{extract($row);	
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));?>
		
          <table onClick="linkered('person.php?personID=<?php echo $personID?>'); closeLost()"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $personStageName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
		<?php echo "$personProfession1 </td><td width='4%'>&bull;</td><td width='48%'>$personLabel" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php $peopleID.=" ".$personID; }

while($row=mysqli_fetch_assoc($sqlPeople2))

	{extract($row);	
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		if (strpos($peopleID,"$personID") !== false) {}else{?>
		
          <table onClick="linkered('person.php?personID=<?php echo $personID?>'); closeLost()"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $personStageName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
		<?php echo "$personProfession1 </td><td width='4%'>&bull;</td><td width='48%'>$personLabel" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }}?>
		
          

 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style=" background:#FFF; color:#000; height:50px; font-size:.8em; font-weight:700;width:90%">NEWS FEED</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitBlog;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlBlog))

	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogWriteup=trim(htmlspecialchars_decode($blogWriteup));?>
		
          <table onClick="linkered('blogarticle.php?blogID=<?php echo $blogID?>'); closeLost()"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $blogName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php if($blogSource){echo $blogSource;}else{echo "Featured";}echo  "</td><td width='4%'>&bull;</td><td width='48%'>$blogTimestamp" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php $newsID.=" ".$blogID; }

while($row=mysqli_fetch_assoc($sqlBlog2))

	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogWriteup=trim(htmlspecialchars_decode($blogWriteup));
		if (strpos($newsID,"$blogID") !== false) {}else{?>
		
          <table onClick="linkered('blogarticle.php?blogID=<?php echo $blogID?>'); closeLost()"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $blogName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php if($blogSource){echo $blogSource;}else{echo "Featured";}echo  "</td><td width='4%'>&bull;</td><td width='48%'>$blogTimestamp" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }}?>
		
          

 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style=" background:#FFF; color:#000; height:50px; font-size:.8em; font-weight:700;width:90%">LABELS</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitLabel;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlLabel))

	{extract($row);
		$labelName=trim(htmlspecialchars_decode($labelName));
		$labelOwner=trim(htmlspecialchars_decode($labelOwner));?>
		
          <table onClick="linkered('label.php?labelID=<?php echo $labelID?>'); closeLost()"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $labelName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php echo "$labelOwner"?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php $houseID.=" ".$labelID; }

while($row=mysqli_fetch_assoc($sqlLabel2))

	{extract($row);
		if (strpos($houseID,"$labelID") !== false) {}else{
		
          $labelName=trim(htmlspecialchars_decode($labelName));
		$labelOwner=trim(htmlspecialchars_decode($labelOwner));?>
		
          <table onClick="linkered('label.php?labelID=<?php echo $labelID?>'); closeLost()"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $labelName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php echo "$labelOwner"?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }}
}?><br /><br /><br />



<?php }else{



if (strlen($key)<1){?>

    	<table align="center" style="color:#000; background:#EEE"><tr><td style=" padding:10px 0;">

	<table align="center" style="width:90%; color:#000; background:#EEE">
     <tr><td style="padding:5px 0; font-size:.8em; font-weight:700; text-align:left">History :</td></tr>
	<?php
$sqlHistory = mysqli_query($cxn, "SELECT DISTINCT anonymousRating FROM anonymous WHERE anonymousRating LIKE '%search - %' ORDER BY anonymousID DESC LIMIT 10")or die('sdf');while($row=mysqli_fetch_assoc($sqlHistory)){extract($row);
	?>
	<tr><td style=" border-bottom:thin solid #DDD;padding:10px; font-size:.8em; font-weight:700;" onClick="document.getElementById('keyword').value=this.innerHTML; looking(this.innerHTML)"><?php echo  str_ireplace("search - ", "", $anonymousRating); ?></td></tr>
	<?php
}
	?>
	</table>
     </td></tr></table>
	<?php

}elseif(strlen($key)<3){?>

    	<table align="center" style="color:#000; background:#EEE"><tr><td style=" padding:10px 0;">
     
	<table align="center" style="width:90%;">
     <tr><td style="padding:5px 0; font-size:.8em; font-weight:700; text-align:left">History :</td></tr>
	<?php
$sqlHistory = mysqli_query($cxn, "SELECT DISTINCT anonymousRating FROM anonymous WHERE anonymousRating LIKE '%search - %' ORDER BY anonymousID DESC LIMIT 10")or die('sdf');while($row=mysqli_fetch_assoc($sqlHistory)){extract($row);
	?>
	<tr><td style=" border-bottom:thin solid #DDD;padding:10px; font-size:.8em; font-weight:700;" onClick="document.getElementById('keyword').value=this.innerHTML; looking(this.innerHTML)"><?php echo  str_ireplace("search - ", "", $anonymousRating); ?></td></tr>
	<?php
}
	?>
	</table>
     </td></tr></table>
	<?php

}else{
$keys=$key;

$key=explode(' ',$key);

if (strlen($key[0]) > 2){$w1 = $key[0];}else{$w1 = 'greenbox';}
if (strlen($key[1]) > 2){$w2 = $key[1];}else{$w2 = 'greenbox';}
if (strlen($key[2]) > 2){$w3 = $key[2];}else{$w3 = 'greenbox';}
if (strlen($key[3]) > 2){$w4 = $key[3];}else{$w4 = 'greenbox';}
if (strlen($key[4]) > 2){$w5 = $key[4];}else{$w5 = 'greenbox';}
if (strlen($key[5]) > 2){$w6 = $key[5];}else{$w6 = 'greenbox';}
if (strlen($key[6]) > 2){$w7 = $key[6];}else{$w7 = 'greenbox';}
if (strlen($key[7]) > 2){$w8 = $key[7];}else{$w8 = 'greenbox';}


$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','search - $keys',NULL,'',anonymousPlatform,'','$anonymousCountry','$anonymousCity','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

$limitMusic = 20;

$sqlMUSIC = mysqli_query($cxn, "SELECT * FROM songs WHERE  songTitle ='$keys' OR songArtist ='$keys' OR songArtistFt ='$keys' OR songAlbum ='$keys' OR songProducer ='$keys' LIMIT $limitMusic");

$limitMusic = 20 - mysqli_num_rows($sqlMUSIC);
if($limitMusic<1){$limitMusic = 0;}

$sqlMUSIC2 = mysqli_query ($cxn, "SELECT * FROM songs WHERE  songTitle LIKE '%".$w1."%' OR songTitle LIKE '%".$w2."%' OR songTitle LIKE '%".$w3."%' OR songTitle LIKE '%".$w4."%' OR songTitle LIKE '%".$w5."%' OR songTitle LIKE '%".$w6."%' OR songTitle LIKE '%".$w7."%' OR songTitle LIKE '%".$w8."%' OR songArtist LIKE '%".$w1."%' OR songArtist LIKE '%".$w2."%' OR songArtist LIKE '%".$w3."%' OR songArtist LIKE '%".$w4."%' OR songArtist LIKE '%".$w5."%' OR songArtist LIKE '%".$w6."%' OR songArtist LIKE '%".$w7."%' OR songArtist LIKE '%".$w8."%' OR songArtistFt LIKE '%".$w1."%' OR songArtistFt LIKE '%".$w2."%' OR songArtistFt LIKE '%".$w3."%' OR songArtistFt LIKE '%".$w4."%' OR songArtistFt LIKE '%".$w5."%' OR songArtistFt LIKE '%".$w6."%' OR songArtistFt LIKE '%".$w7."%' OR songArtistFt LIKE '%".$w8."%' OR songAlbum LIKE '%".$w1."%' OR songAlbum LIKE '%".$w2."%' OR songAlbum LIKE '%".$w3."%' OR songAlbum LIKE '%".$w4."%' OR songAlbum LIKE '%".$w5."%' OR songAlbum LIKE '%".$w6."%' OR songAlbum LIKE '%".$w7."%' OR songAlbum LIKE '%".$w8."%' OR songAlbum LIKE '%".$w1."%' OR songProducer LIKE '%".$w1."%' OR songProducer LIKE '%".$w2."%' OR songProducer LIKE '%".$w3."%' OR songProducer LIKE '%".$w4."%' OR songProducer LIKE '%".$w5."%' OR songProducer LIKE '%".$w6."%' OR songProducer LIKE '%".$w7."%' OR songProducer LIKE '%".$w8."%' OR songURL LIKE '%".$w1."%' OR songURL LIKE '%".$w2."%' OR songURL LIKE '%".$w3."%' OR songURL LIKE '%".$w4."%' OR songURL LIKE '%".$w5."%' OR songURL LIKE '%".$w6."%' OR songURL LIKE '%".$w7."%' OR songURL LIKE '%".$w8."%' OR songGenre LIKE '%".$w1."%' OR songGenre LIKE '%".$w2."%' OR songGenre LIKE '%".$w3."%' OR songGenre LIKE '%".$w4."%' OR songGenre LIKE '%".$w5."%' OR songGenre LIKE '%".$w6."%' OR songGenre LIKE '%".$w7."%' OR songGenre LIKE '%".$w8."%' OR songYear LIKE '%".$w1."%' OR songYear LIKE '%".$w2."%' OR songYear LIKE '%".$w3."%' OR songYear LIKE '%".$w4."%' OR songYear LIKE '%".$w5."%' OR songYear LIKE '%".$w6."%' OR songYear LIKE '%".$w7."%' OR songYear LIKE '%".$w8."%' 	OR songLanguage LIKE '%".$w1."%' OR songLanguage LIKE '%".$w2."%' OR songLanguage LIKE '%".$w3."%' OR songLanguage LIKE '%".$w4."%' OR songLanguage LIKE '%".$w5."%' OR songLanguage LIKE '%".$w6."%' OR songLanguage LIKE '%".$w7."%' OR songLanguage LIKE '%".$w8. "%' ORDER BY RAND() LIMIT $limitMusic");


$limitMusic = $limitMusic- mysqli_num_rows($sqlMUSIC2);
if($limitMusic<1){$limitMusic = 0;}

$limitVideo = 20;

$sqlVideo = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle ='$keys' OR videoArtist ='$keys' OR videoArtistFt ='$keys' OR videoDirector ='$keys' LIMIT $limitVideo");

$limitVideo = 20 - mysqli_num_rows($sqlVideo);
if($limitVideo<1){$limitVideo = 0;}

$sqlVideo2 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '%".$w1."%' OR videoTitle LIKE '%".$w2."%' OR videoTitle LIKE '%".$w3."%' OR videoTitle LIKE '%".$w4."%' OR videoTitle LIKE '%".$w5."%' OR videoTitle LIKE '%".$w6."%' OR videoTitle LIKE '%".$w7."%' OR videoTitle LIKE '%".$w8."%'  OR videoArtist LIKE '%".$w1."%' OR videoArtist LIKE '%".$w2."%' OR videoArtist LIKE '%".$w3."%' OR videoArtist LIKE '%".$w4."%' OR videoArtist LIKE '%".$w5."%' OR videoArtist LIKE '%".$w6."%' OR videoArtist LIKE '%".$w7."%' OR videoArtist LIKE '%".$w8."%' OR videoArtistFt LIKE '%".$w1."%' OR videoArtistFt LIKE '%".$w2."%' OR videoArtistFt LIKE '%".$w3."%' OR videoArtistFt LIKE '%".$w4."%' OR videoArtistFt LIKE '%".$w5."%' OR videoArtistFt LIKE '%".$w6."%' OR videoArtistFt LIKE '%".$w7."%' OR videoArtistFt LIKE '%".$w8."%' OR videoDirector LIKE '%".$w1."%' OR videoDirector LIKE '%".$w2."%' OR videoDirector LIKE '%".$w3."%' OR videoDirector LIKE '%".$w4."%' OR videoDirector LIKE '%".$w5."%' OR videoDirector LIKE '%".$w6."%' OR videoDirector LIKE '%".$w7."%' OR videoDirector LIKE '%".$w8."%' ORDER BY RAND() LIMIT $limitVideo");


$limitVideo = $limitVideo- mysqli_num_rows($sqlVideo2);
if($limitVideo<1){$limitVideo = 0;}

$limitPeople = 20;

$sqlPeople = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName ='$keys' OR personBirthName ='$keys' OR personFanName ='$keys' OR personBirthYear ='$keys' OR personPlaceOfOrigin ='$keys' OR personGenre ='$keys' OR personProfession1 ='$keys' OR personProfession2 ='$keys' OR personProfession3 ='$keys' OR personCareerStartYear ='$keys' OR personLabel ='$keys' LIMIT $limitPeople");

$limitPeople = 20 - mysqli_num_rows($sqlPeople);
if($limitPeople<1){$limitPeople = 0;}

$sqlPeople2 = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName LIKE '%".$w1."%' OR personStageName LIKE '%".$w2."%' OR personStageName LIKE '%".$w3."%' OR personStageName LIKE '%".$w4."%' OR personStageName LIKE '%".$w5."%' OR personStageName LIKE '%".$w6."%' OR personStageName LIKE '%".$w7."%' OR personStageName LIKE '%".$w8."%'  OR personBirthName LIKE '%".$w1."%' OR personBirthName LIKE '%".$w2."%' OR personBirthName LIKE '%".$w3."%' OR personBirthName LIKE '%".$w4."%' OR personBirthName LIKE '%".$w5."%' OR personBirthName LIKE '%".$w6."%' OR personBirthName LIKE '%".$w7."%' OR personBirthName LIKE '%".$w8."%' OR personFanName LIKE '%".$w1."%' OR personFanName LIKE '%".$w2."%' OR personFanName LIKE '%".$w3."%' OR personFanName LIKE '%".$w4."%' OR personFanName LIKE '%".$w5."%' OR personFanName LIKE '%".$w6."%' OR personFanName LIKE '%".$w7."%' OR personFanName LIKE '%".$w8."%' OR personBirthYear LIKE '%".$w1."%' OR personBirthYear LIKE '%".$w2."%' OR personBirthYear LIKE '%".$w3."%' OR personBirthYear LIKE '%".$w4."%' OR personBirthYear LIKE '%".$w5."%' OR personBirthYear LIKE '%".$w6."%' OR personBirthYear LIKE '%".$w7."%' OR personBirthYear LIKE '%".$w8."%'  OR personPlaceOfOrigin LIKE '%".$w1."%' OR personPlaceOfOrigin LIKE '%".$w2."%' OR personPlaceOfOrigin LIKE '%".$w3."%' OR personPlaceOfOrigin LIKE '%".$w4."%' OR personPlaceOfOrigin LIKE '%".$w5."%' OR personPlaceOfOrigin LIKE '%".$w6."%' OR personPlaceOfOrigin LIKE '%".$w7."%' OR personPlaceOfOrigin LIKE '%".$w8."%' OR personGenre LIKE '%".$w1."%' OR personGenre LIKE '%".$w2."%' OR personGenre LIKE '%".$w3."%' OR personGenre LIKE '%".$w4."%' OR personGenre LIKE '%".$w5."%' OR personGenre LIKE '%".$w6."%' OR personGenre LIKE '%".$w7."%' OR personGenre LIKE '%".$w8."%'  OR personProfession1 LIKE '%".$w1."%' OR personProfession1 LIKE '%".$w2."%' OR personProfession1 LIKE '%".$w3."%' OR personProfession1 LIKE '%".$w4."%' OR personProfession1 LIKE '%".$w5."%' OR personProfession1 LIKE '%".$w6."%' OR personProfession1 LIKE '%".$w7."%' OR personProfession1 LIKE '%".$w8."%'  OR personProfession2 LIKE '%".$w1."%' OR personProfession2 LIKE '%".$w2."%' OR personProfession2 LIKE '%".$w3."%' OR personProfession2 LIKE '%".$w4."%' OR personProfession2 LIKE '%".$w5."%' OR personProfession2 LIKE '%".$w6."%' OR personProfession2 LIKE '%".$w7."%' OR personProfession2 LIKE '%".$w8."%'  OR personProfession3 LIKE '%".$w1."%' OR personProfession3 LIKE '%".$w2."%' OR personProfession3 LIKE '%".$w3."%' OR personProfession3 LIKE '%".$w4."%' OR personProfession3 LIKE '%".$w5."%' OR personProfession3 LIKE '%".$w6."%' OR personProfession3 LIKE '%".$w7."%' OR personProfession3 LIKE '%".$w8."%'  OR personCareerStartYear LIKE '%".$w1."%' OR personCareerStartYear LIKE '%".$w2."%' OR personCareerStartYear LIKE '%".$w3."%' OR personCareerStartYear LIKE '%".$w4."%' OR personCareerStartYear LIKE '%".$w5."%' OR personCareerStartYear LIKE '%".$w6."%' OR personCareerStartYear LIKE '%".$w7."%' OR personCareerStartYear LIKE '%".$w8."%'  OR personLabel LIKE '%".$w1."%' OR personLabel LIKE '%".$w2."%' OR personLabel LIKE '%".$w3."%' OR personLabel LIKE '%".$w4."%' OR personLabel LIKE '%".$w5."%' OR personLabel LIKE '%".$w6."%' OR personLabel LIKE '%".$w7."%' OR personLabel LIKE '%".$w8."%' LIMIT $limitPeople");

$limitPeople = $limitPeople- mysqli_num_rows($sqlPeople2);
if($limitPeople<1){$limitPeople = 0;}


$limitBlog = 20;

$sqlBlog = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogName ='$keys' OR blogWriteup ='$keys' LIMIT $limitBlog");

$limitBlog = 20 - mysqli_num_rows($sqlBlog);
if($limitBlog<1){$limitBlog = 0;}

$sqlBlog2 = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogName LIKE '%".$w1."%' OR blogName LIKE '%".$w2."%' OR blogName LIKE '%".$w3."%' OR blogName LIKE '%".$w4."%' OR blogName LIKE '%".$w5."%' OR blogName LIKE '%".$w6."%' OR blogName LIKE '%".$w7."%' OR blogName LIKE '%".$w8."%'  OR blogWriteup LIKE '%".$w1."%' OR blogWriteup LIKE '%".$w2."%' OR blogWriteup LIKE '%".$w3."%' OR blogWriteup LIKE '%".$w4."%' OR blogWriteup LIKE '%".$w5."%' OR blogWriteup LIKE '%".$w6."%' OR blogWriteup LIKE '%".$w7."%' OR blogWriteup LIKE '%".$w8."%' LIMIT $limitBlog");

$limitBlog = $limitBlog- mysqli_num_rows($sqlBlog2);
if($limitBlog<1){$limitBlog = 0;}


$limitLabel = 20;

$sqlLabel = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelName ='$keys' OR labelOwner ='$keys' OR labelArtists ='$keys' OR labelOthers ='$keys' OR labelProducers ='$keys' LIMIT $limitLabel");

$limitLabel = 20 - mysqli_num_rows($sqlLabel);
if($limitLabel<1){$limitLabel = 0;}

$sqlLabel2 = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelName LIKE '%".$w1."%' OR labelName LIKE '%".$w2."%' OR labelName LIKE '%".$w3."%' OR labelName LIKE '%".$w4."%' OR labelName LIKE '%".$w5."%' OR labelName LIKE '%".$w6."%' OR labelName LIKE '%".$w7."%' OR labelName LIKE '%".$w8."%'  OR labelOwner LIKE '%".$w1."%' OR labelOwner LIKE '%".$w2."%' OR labelOwner LIKE '%".$w3."%' OR labelOwner LIKE '%".$w4."%' OR labelOwner LIKE '%".$w5."%' OR labelOwner LIKE '%".$w6."%' OR labelOwner LIKE '%".$w7."%' OR labelOwner LIKE '%".$w8."%' OR labelArtists LIKE '%".$w1."%' OR labelArtists LIKE '%".$w2."%' OR labelArtists LIKE '%".$w3."%' OR labelArtists LIKE '%".$w4."%' OR labelArtists LIKE '%".$w5."%' OR labelArtists LIKE '%".$w6."%' OR labelArtists LIKE '%".$w7."%' OR labelArtists LIKE '%".$w8."%'  OR labelOthers LIKE '%".$w1."%' OR labelOthers LIKE '%".$w2."%' OR labelOthers LIKE '%".$w3."%' OR labelOthers LIKE '%".$w4."%' OR labelOthers LIKE '%".$w5."%' OR labelOthers LIKE '%".$w6."%' OR labelOthers LIKE '%".$w7."%' OR labelOthers LIKE '%".$w8."%'  OR labelProducers LIKE '%".$w1."%' OR labelProducers LIKE '%".$w2."%' OR labelProducers LIKE '%".$w3."%' OR labelProducers LIKE '%".$w4."%' OR labelProducers LIKE '%".$w5."%' OR labelProducers LIKE '%".$w6."%' OR labelProducers LIKE '%".$w7."%' OR labelProducers LIKE '%".$w8."%' LIMIT $limitLabel");

$limitLabel = $limitLabel- mysqli_num_rows($sqlLabel2);
if($limitLabel<1){$limitLabel = 0;}
?>

<!--<table class="tab1"><tr><td class="tabheader2">Search Results</td></tr><tr><td align="center">
<?php
// if(mysqli_num_rows($sqlMUSIC)==0 && mysqli_num_rows($sqlBLOG)==0 && mysqli_num_rows($sqlLABEL)==0 && mysqli_num_rows($sqlPERSON)==0 && mysqli_num_rows($sqlVIDEO)==0 && strlen($keys) >2){echo"your search yielded no results<br><br><br><br><br><br>";}
// elseif(mysqli_num_rows($sqlMUSIC)>0 && mysqli_num_rows($sqBLOG)>0 && mysqli_num_rows($sqlLABEL)>0 && mysqli_num_rows($sqlPERSON)>0 && mysqli_num_rows($sqlVIDEO)>0 && strlen($keys) >2){echo"search results for '$keys'";}
//else{echo"search results for '$key'";}
//elseif{echo"your search yielded no results";}
?>
</center>
</td></tr></table>-->

 <table align="center" style="border-bottom:solid thin #EEE;"><tr><td style="border-bottom:thin solid #DDD;color:#000; height:50px; font-size:.8em; font-weight:700;width:90%; background:#EEE">MUSIC</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitMusic;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlMUSIC)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="lonker('musicpreview.php?t=<?php echo $songID?>');document.getElementById('lost').style.left = '-2000'"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td></tr></table>
	</td></tr></table>
	<?php $musicID.=" ".$songID; }



while($row=mysqli_fetch_assoc($sqlMUSIC2)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		
      if (strpos($musicID,"$songID") !== false) {}else{?>
	<table style='width:98%; margin:5px 0' onClick="lonker('musicpreview.php?t=<?php echo $songID?>');document.getElementById('lost').style.left = '-2000'"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td></tr></table>
	</td></tr></table>
	<?php }}?>
     

 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style="border-bottom:thin solid #DDD;color:#000; height:50px; font-size:.8em; font-weight:700;width:90%; background:#EEE">VISUALS</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitVideo;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlVideo))

	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
		<table style='width:98%; margin:5px 0' onClick="lonker('video.php?videoID=<?php echo $videoID?>'); document.getElementById('lost').style.left = '-2000'"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
	<?php  $visualID.=" ".$videoID; } 

while($row=mysqli_fetch_assoc($sqlVideo2)) 

	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		
		if (strpos($visualID,"$videoID") !== false) {}else{?>
		<table style='width:98%; margin:5px 0' onClick="lonker('video.php?videoID=<?php echo $videoID?>'); document.getElementById('lost').style.left = '-2000'"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
	<?php }}
	
	
	
?>
 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style="border-bottom:thin solid #DDD;color:#000; height:50px; font-size:.8em; font-weight:700;width:90%; background:#EEE">PEOPLE</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitPeople;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlPeople))

	{extract($row);	
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));?>
		
          <table onClick="lonker('person.php?personID=<?php echo $personID?>'); document.getElementById('lost').style.left = '-2000'"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $personStageName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
		<?php echo "$personProfession1 </td><td width='4%'>&bull;</td><td width='48%'>$personLabel" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php $personID.=" ".$personID; }

while($row=mysqli_fetch_assoc($sqlPeople2))

	{extract($row);	
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		if (strpos($peopleID,"$personID") !== false) {}else{?>
		
          <table onClick="lonker('person.php?personID=<?php echo $personID?>'); document.getElementById('lost').style.left = '-2000'"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $personStageName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
		<?php echo "$personProfession1 </td><td width='4%'>&bull;</td><td width='48%'>$personLabel" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }}?>
		
          

 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style="border-bottom:thin solid #DDD;color:#000; height:50px; font-size:.8em; font-weight:700;width:90%; background:#EEE">NEWS FEED</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitBlog;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlBlog))

	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogWriteup=trim(htmlspecialchars_decode($blogWriteup));?>
		
          <table onClick="lonker('blogarticle.php?blogID=<?php echo $blogID?>'); document.getElementById('lost').style.left = '-2000'"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $blogName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php if($blogSource){echo $blogSource;}else{echo "Featured";}echo  "</td><td width='4%'>&bull;</td><td width='48%'>$blogTimestamp" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php $newsID.=" ".$blogID; }

while($row=mysqli_fetch_assoc($sqlBlog2))

	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogWriteup=trim(htmlspecialchars_decode($blogWriteup));
		if (strpos($newsID,"$blogID") !== false) {}else{?>
		
          <table onClick="lonker('blogarticle.php?blogID=<?php echo $blogID?>'); document.getElementById('lost').style.left = '-2000'"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $blogName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php if($blogSource){echo $blogSource;}else{echo "Featured";}echo  "</td><td width='4%'>&bull;</td><td width='48%'>$blogTimestamp" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }}?>
		
          

 <table class="fresh" align="center" style="border-bottom:solid thin #EEE;"><tr><td style="border-bottom:thin solid #DDD;color:#000; height:50px; font-size:.8em; font-weight:700;width:90%; background:#EEE">LABELS</td><td><span style="font-size:.9em; background:#000; padding:0 7px; text-align:center"> <?php
$lout=20 - $limitLabel;
if($lout==0){echo "<span>&bull;</span>";}else{echo "<span style='color:#FFF'>&bull;</span>";}
?> 
 </span></td></tr></table>
 <?php
while($row=mysqli_fetch_assoc($sqlLabel))

	{extract($row);
		$labelName=trim(htmlspecialchars_decode($labelName));
		$labelOwner=trim(htmlspecialchars_decode($labelOwner));?>
		
          <table onClick="lonker('label.php?labelID=<?php echo $labelID?>'); document.getElementById('lost').style.left = '-2000'"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $labelName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php echo "$labelOwner"?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php $houseID.=" ".$labelID; }

while($row=mysqli_fetch_assoc($sqlLabel2))

	{extract($row);
		if (strpos($houseID,"$labelID") !== false) {}else{
		
          $labelName=trim(htmlspecialchars_decode($labelName));
		$labelOwner=trim(htmlspecialchars_decode($labelOwner));?>
		
          <table onClick="lonker('label.php?labelID=<?php echo $labelID?>'); document.getElementById('lost').style.left = '-2000'"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $labelName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php echo "$labelOwner"?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }}
}

}
