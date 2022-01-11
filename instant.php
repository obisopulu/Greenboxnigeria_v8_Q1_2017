<?php include("rab_dbcon.php");
extract($_GET);$today = date("Y-m-d"); 
$keys=$key=trim(htmlspecialchars($key));
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','instant',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$anonymousCountry','$anonymousCity','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

$title = 'Instant Music Search and Download on GreenboxNigeria.com';

$description = "Search and download songs instantly and preview on Greenbox Nigeria. Imagine a platform that brings out all the element of the Nigerian music... most of it tho. Letting you in on the Nigerian music you love...";

$keywords = "latest Nigerian search, fresh Nigerian search, new Nigerian search, Nigerian search, Nigerian songs news, search Nigerian tracks, search, instant, music";
$img = "http://www.gbngr.com/images/logo.png";
$url = "http://www.gbngr.com/instant.php";

if(strlen($description)>200){$description = substr_replace($description,'...',190)."More";}

//if (strpos($b,'musicpreview') !== false) {$item = str_replace('/index.php?1=musicpreview.php?songed=', '', $b);$where ="songs WHERE songURL='$item'";}
//elseif (strpos($b,'person') !== false) {$item = str_replace('/index.php?1=person.php?personed=', '', $b);$where ="persons WHERE personStageName='$item'";}
//elseif (strpos($b,'label') !== false) {$item = str_replace('/index.php?1=label.php?labeled=', '', $b);$where ="labels WHERE labelName='$item'";}
//elseif (strpos($b,'blogarticle') !== false) {$item = str_replace('/index.php?1=blogarticle.php?blogged=', '', $b);$where ="blog WHERE blogName='$item'";}
//elseif (strpos($b,'albumpreview') !== false) {$item = str_replace('/index.php?1=albumpreview.php?albumed=', '', $b);$where='album';}
//elseif (strpos($b,'video') !== false) {$item = str_replace('/index.php?1=video.php?videoed=', '', $b);$where ="songs WHERE songURL='$item'";}

?>
<!DOCTYPE html>
<html>
<head>
<title id='title1'><?php echo $title ?></title>
<meta charset="utf-8" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />
<meta name="viewport" content="user-scalable=no,maximum-scale=1" />
<meta name="MobileOptimized" content="width" />
<meta id='description' name="description" content="Discover The Nigerian Music Industry; the songs, the people, the labels and the news" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta id='keywords' name="keywords" content="Nigerian Music,  Artist, label, song, news" />
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<meta name="description" content="<?php echo $description ?>" />
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="author" content="GreenboxNigeria" />
<meta name="copyright" content="Renegade &copy; <?php echo date("Y"); ?>" />
<meta name="application-name" content="GreenboxNigeria" />
<meta itemprop="name" content="<?php echo $title ?>">
<meta itemprop="description" content="<?php echo $description ?>">
<meta itemprop="image" content="<?php echo $img ?>">
<meta name="twitter:site" value="@greenboxnigeria" />
<meta name="twitter:text:title" content="<?php echo $title ?>" />
<meta name="twitter:text:description" content="<?php echo $description ?>" />
<meta property="twitter:url" content="<?php echo $url ?>" />
<meta property="twitter:title" content="<?php echo $title ?>" />
<meta property="twitter:description" content="<?php echo $description ?>" />
<meta name="author" content="Greenbox Nigeria" />
<meta name="tone" content="feature" id="article-tone" />
<meta name="byl" content="By Greenbox Nigeria" />
<meta name="PT" content="article" />
<meta name="CG" content="arts" />
<meta name="SCG" content="television" />
<meta name="PST" content="Review" />
<meta name="tom" content="Review" />
<meta name="edt" content="Nigeria" />
<meta property="og:image" content="<?php echo $img ?>" />
<meta property="twitter:image:alt" content="<?php echo $title ?>" />
<meta property="twitter:image" content="<?php echo $img ?>" />
<meta name="twitter:card" value="summary_large_image" />
<meta property="article:author" content="http://www.gbngr.com" />
<meta name="twitter:creator" value="@greenboxnigeria" />
<meta property="og:title" content="<?php echo $title ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $url ?>" />
<meta property="og:image" content="<?php echo $img ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:site_name" content="Greenbox Nigeria" />
<meta property="article:published_time" content="<?php echo $timestamp ?>" />
<meta property="article:modified_time" content="<?php echo $timestamp ?>" />
<meta property="article:section" content="Article Section" />
<meta property="article:tag" content="Article Tag" />
<meta property="fb:admins" content="1032329466862501" />
</head>
<style>
a{text-decoration:none; color:#000;}
#downer:hover{color:#00E676}
body{
	color:#000;
	background:none;
  background-image:
    radial-gradient(
      circle closest-side,
      #eee,
      #FFF
    );
}
</style>
</head>
<body style=";text-shadow:0 0 1px #000; font-size:1.1em">
<?php 
if ($detect->isMobile()){?>

<table id="heahing" style="height:100px; background:#000; color:#FFF"><tr><td style="font-size:1.5em;" align="center">Greenbox Nigeria</td></tr><tr><td align="center">@greenboxnigeria<br>
<table align="center" style="width:200px;height:0px; margin-top:20px"><tr>
    <td align="center" title="Facebook"><a target="_blank" href="https://www.facebook.com/Greenbox-Nigeria-1032329466862501/"><div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px;border-radius:10%"></div></a></td>
    <td align="center" title="Twitter"><a target="_blank" href="https://twitter.com/GreenboxNigeria"><div style="background:url(images/tt1.png) center no-repeat;background-size:cover;width:30px;height:30px;border-radius:10%"></div></a></td>
    <td align="center" title="Instagram"><a target="_blank" href="https://www.instagram.com/greenboxnigeria/"><div style="background:url(images/ig.png) center no-repeat;background-size:cover;width:30px;height:30px;border-radius:10%"></div></a></td></tr></table><br><br>
<form method="get">
<table align="center" style="width:80%;"><tr><td style="width:80%;"><input  required placeholder="search.." value="<?php echo $key ?>" name="key" style="padding:5px;width:100%; height:100%;border:none; background:#222; color:#FFF; font-size:1em;font-family:myFirstFont;"/></td></tr></table>

<table align="center" style="width:85%;margin-top:10px"><tr><td align="right"><input style="background:#00E676; padding:15px; ;border:none;font-size:.9em; color:#000" type="submit" value="Search"></td></tr></table><br><br>
</form>

</td></tr></table>
<?php 
if (strlen($key)<1){ 


echo"<table align='center' style='background:#222; height:70px;color:#FFF; margin:0'><tr valign='middle'><td align='center'>HOT 20<div style='font-size:.9em; '>songs</div></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='5' ORDER BY dateUpdated DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		echo"
		<table cellpadding='5' align='center' style='border-bottom:1px solid #000; background:#FFF; margin-bottom:15px'><tr><td colspan='2' align='center'>$songArtist - <span style='font-size:1.1em'>$songTitle</span>"; if($songArtistFt){echo" Ft $songArtistFt";} if($songProducer){echo"<div>Prod. by $songProducer</div>";}echo"</td></tr><tr style='font-size:.9em; background:#EEE; '><td colspan='2' style='' align='center'>".number_format($songSize/1024) ."mb | $songLenght</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' width='50%' style=''  id='downer' onClick=".'"'."download('$songID')".'"'.">Download</td><td align='center' style=''><a href='index.php?1=musicpreview.php?t=$songID'><div>Preview</div></a></td></tr></table>
";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Videos<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM videos ORDER BY videoID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
	$videoTitle=trim(htmlspecialchars_decode($videoTitle));
	$videoArtist=trim(htmlspecialchars_decode($videoArtist));
	$videoDirector=trim(htmlspecialchars_decode($videoDirector));
	$videoArtistFt=trim(htmlspecialchars_decode($videoArtistFt));
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$videoArtist - $videoTitle"; if($videoArtistFt){echo" Ft $videoArtistFt";}echo"</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>"; if($videoDirector){echo"<div>Directed by $videoDirector</div>";}echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=video.php?videoID=$videoID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Blog<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>";echo htmlspecialchars_decode($blogName);echo "</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>";echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',150); echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=blogarticle.php?blogID=$blogID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>People<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM persons ORDER BY personID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
 	$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		$personStageName=trim(htmlspecialchars_decode($personStageName));
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$personStageName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$personProfession1</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=person.php?personID=$personID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Labels<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY labelID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
			$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$labelName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$labelOwner</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=label.php?labelID=$labelID'><div>Preview</div></a></td></tr></table>";}

	}

elseif(strlen($key)<3){echo "<center>Not enough to search for.. keep typing. Your search keyword must be at least three(3) characters long</center><br>";

echo"<table align='center' style='background:#222; height:70px;color:#FFF'><tr valign='middle'><td align='center'>HOT 20<div style='font-size:.9em; '>songs</div></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='5' ORDER BY dateUpdated DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		echo"
		<table cellpadding='5' align='center' style='border-bottom:1px solid #000; background:#FFF; margin-bottom:15px'><tr><td colspan='2' align='center'>$songArtist - <span style='font-size:1.1em'>$songTitle</span>"; if($songArtistFt){echo" Ft $songArtistFt";} if($songProducer){echo"<div>Prod. by $songProducer</div>";}echo"</td></tr><tr style='font-size:.9em; background:#EEE; '><td colspan='2' style='' align='center'>".number_format($songSize/1024) ."mb | $songLenght</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' width='50%' style='' id='downer' onClick=".'"'."download('$songID')".'"'.">Download</td><td align='center' style=''><a href='index.php?1=musicpreview.php?t=$songID'><div>Preview</div></a></td></tr></table>
";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Videos<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM videos ORDER BY videoID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
	$videoTitle=trim(htmlspecialchars_decode($videoTitle));
	$videoArtist=trim(htmlspecialchars_decode($videoArtist));
	$videoDirector=trim(htmlspecialchars_decode($videoDirector));
	$videoArtistFt=trim(htmlspecialchars_decode($videoArtistFt));
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$videoArtist - $videoTitle"; if($videoArtistFt){echo" Ft $videoArtistFt";}echo"</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>"; if($videoDirector){echo"<div>Directed by $videoDirector</div>";}echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=video.php?videoID=$videoID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Blog<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>";echo htmlspecialchars_decode($blogName);echo "</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>";echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',150); echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=blogarticle.php?blogID=$blogID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>People<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM persons ORDER BY personID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
 	$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		$personStageName=trim(htmlspecialchars_decode($personStageName));
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$personStageName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$personProfession1</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=person.php?personID=$personID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Labels<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY labelID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
			$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$labelName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$labelOwner</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=label.php?labelID=$labelID'><div>Preview</div></a></td></tr></table>";}
}else{

$key=explode(' ',$key);

if (strlen($key[0]) > 2){$w1 = $key[0];}else{$w1 = 'greenboxer';}
if (strlen($key[1]) > 2){$w2 = $key[1];}else{$w2 = 'greenboxer';}
if (strlen($key[2]) > 2){$w3 = $key[2];}else{$w3 = 'greenboxer';}
if (strlen($key[3]) > 2){$w4 = $key[3];}else{$w4 = 'greenboxer';}
if (strlen($key[4]) > 2){$w5 = $key[4];}else{$w5 = 'greenboxer';}
if (strlen($key[5]) > 2){$w6 = $key[5];}else{$w6 = 'greenboxer';}
if (strlen($key[6]) > 2){$w7 = $key[6];}else{$w7 = 'greenboxer';}
if (strlen($key[7]) > 2){$w8 = $key[7];}else{$w8 = 'greenboxer';}
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
		
		
$sqlVIDEO = mysqli_query ($cxn, "SELECT * FROM videos WHERE 
		videoTitle LIKE '%".$w1."%' OR videoTitle LIKE '%".$w2."%' OR videoTitle LIKE '%".$w3."%' OR videoTitle LIKE '%".$w4."%' OR videoTitle LIKE '%".$w5."%' OR videoTitle LIKE '%".$w6."%' OR videoTitle LIKE '%".$w7."%' OR videoTitle LIKE '%".$w8."%'  
		
		
		OR videoArtist LIKE '%".$w1."%' OR videoArtist LIKE '%".$w2."%' OR videoArtist LIKE '%".$w3."%' OR videoArtist LIKE '%".$w4."%' OR videoArtist LIKE '%".$w5."%' OR videoArtist LIKE '%".$w6."%' OR videoArtist LIKE '%".$w7."%' OR videoArtist LIKE '%".$w8."%'
		
		
		OR videoArtistFt LIKE '%".$w1."%' OR videoArtistFt LIKE '%".$w2."%' OR videoArtistFt LIKE '%".$w3."%' OR videoArtistFt LIKE '%".$w4."%' OR videoArtistFt LIKE '%".$w5."%' OR videoArtistFt LIKE '%".$w6."%' OR videoArtistFt LIKE '%".$w7."%' OR videoArtistFt LIKE '%".$w8."%' 
		
				
		OR videoDirector LIKE '%".$w1."%' OR videoDirector LIKE '%".$w2."%' OR videoDirector LIKE '%".$w3."%' OR videoDirector LIKE '%".$w4."%' OR videoDirector LIKE '%".$w5."%' OR videoDirector LIKE '%".$w6."%' OR videoDirector LIKE '%".$w7."%' OR videoDirector LIKE '%".$w8."%' ORDER BY RAND()");
?>
<?php
if(mysqli_num_rows($sqlMUSIC)==0 && mysqli_num_rows($sqlBLOG)==0 && mysqli_num_rows($sqlLABEL)==0 && mysqli_num_rows($sqlPERSON)==0 && mysqli_num_rows($sqlVIDEO)==0 && strlen($keys) >2){echo"your search yielded no results<br><br><br>";

echo"<table align='center' style='background:#222; height:70px;color:#FFF'><tr valign='middle'><td align='center'>HOT 20<div style='font-size:.9em; '>songs</div></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='5' ORDER BY dateUpdated DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		echo"
		<table cellpadding='5' align='center' style='border-bottom:1px solid #000; background:#FFF; margin-bottom:15px'><tr><td colspan='2' align='center'>$songArtist - <span style='font-size:1.1em'>$songTitle</span>"; if($songArtistFt){echo" Ft $songArtistFt";} if($songProducer){echo"<div>Prod. by $songProducer</div>";}echo"</td></tr><tr style='font-size:.9em; background:#EEE; '><td colspan='2' style='' align='center'>".number_format($songSize/1024) ."mb | $songLenght</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' width='50%' style='' id='downer' onClick=".'"'."download('$songID')".'"'.">Download</td><td align='center' style=''><a href='index.php?1=musicpreview.php?t=$songID'><div>Preview</div></a></td></tr></table>
";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Videos<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM videos ORDER BY videoID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
	$videoTitle=trim(htmlspecialchars_decode($videoTitle));
	$videoArtist=trim(htmlspecialchars_decode($videoArtist));
	$videoDirector=trim(htmlspecialchars_decode($videoDirector));
	$videoArtistFt=trim(htmlspecialchars_decode($videoArtistFt));
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$videoArtist - $videoTitle"; if($videoArtistFt){echo" Ft $videoArtistFt";}echo"</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>"; if($videoDirector){echo"<div>Directed by $videoDirector</div>";}echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=video.php?videoID=$videoID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Blog<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>";echo htmlspecialchars_decode($blogName);echo "</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>";echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',150); echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=blogarticle.php?blogID=$blogID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>People<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM persons ORDER BY personID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
 	$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		$personStageName=trim(htmlspecialchars_decode($personStageName));
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$personStageName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$personProfession1</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=person.php?personID=$personID'><div>Preview</div></a></td></tr></table>";}

echo"<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Labels<br></td></tr></table>";

	$sql = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY labelID DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
			$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$labelName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$labelOwner</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=label.php?labelID=$labelID'><div>Preview</div></a></td></tr></table>";}

}
elseif(mysqli_num_rows($sqlMUSIC)>0 && mysqli_num_rows($sqBLOG)>0 && mysqli_num_rows($sqlLABEL)>0 && mysqli_num_rows($sqlPERSON)>0 && mysqli_num_rows($sqlVIDEO)>0 && strlen($keys) >2){echo"search results for '$keys'";}
//else{echo"search results for '$key'";}
//elseif{echo"your search yielded no results";}
echo "</td></tr></table>";
?>

<?php if(mysqli_num_rows($sqlMUSIC)>0){
echo "<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Music<br></td></tr></table>";

while($row=mysqli_fetch_assoc($sqlMUSIC))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		echo"
		<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td colspan='2' align='center'><span style='color:#000'>$songArtist - </span>$songTitle<span style='color:#000'>"; if($songArtistFt){echo" Ft by $songProducer";}echo"</span></td></tr><tr style='font-size:.9em; background:#EEE'><td colspan='2' style='' align='center'>".number_format($songSize/1024) ."mb | $songLenght</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' width='50%' style='' id='downer' onClick=".'"'."download('$songID')".'"'.">Download</td><td align='center' style=''><a href='index.php?1=musicpreview.php?t=$songID'><div>Preview</div></a></td></tr></table>
";} }

if(mysqli_num_rows($sqlBLOG)>0){
	echo "<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>News<br></td></tr></table>";

while($row=mysqli_fetch_assoc($sqlBLOG))
	{
		extract($row);	echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>";echo htmlspecialchars_decode($blogName);echo "</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>";echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',150); echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=blogarticle.php?blogID=$blogID'><div>Preview</div></a></td></tr></table>";}
		}

if(mysqli_num_rows($sqlPEOPLE)>0){
echo "<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>People<br></td></tr></table>";

while($row=mysqli_fetch_assoc($sqlPEOPLE))
	{extract($row);	$b=$counter%2;
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$a=$counter%3;echo"
<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$personStageName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$personProfession1</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=person.php?personID=$personID'><div>Preview</div></a></td></tr></table>";$counter++;}
}

if(mysqli_num_rows($sqlLABEL)>0){
echo "<table align='center' style='background:#000; height:70px;color:#FFF'><tr valign='middle'><td align='center'>Labels<br></td></tr></table>";

while($row=mysqli_fetch_assoc($sqlLABEL))
	{extract($row);
		$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
echo"
<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$labelName</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$labelOwner</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=label.php?labelID=$labelID'><div>Preview</div></a></td></tr></table>";
}}

if(mysqli_num_rows($sqlVIDEO)>0){
echo "<table align='center' style='background:#000;color:#FFF'><tr valign='middle'><td align='center'>Video<br><br><br></td></tr></table>";

while($row=mysqli_fetch_assoc($sqlVIDEO))
	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		$a=$counter%2;	echo"<table cellpadding='5' align='center' style='border-bottom:5px solid #000; background:#FFF'><tr><td align=''>$videoTitle</td></tr><tr style='font-size:.9em; background:#EEE'><td style='' align=''>$videoArtist"; if($videoArtistFt){echo" Ft $videoArtistFt";} if($videoDirector){echo"<div>Directed by $videoDirector</div>";}echo"</td></tr><tr style='height:50px; font-weight:bolder'><td align='right' style='padding-right:30px' style=''><a href='index.php?1=video.php?videoID=$videoID'><div>Preview</div></a></td></tr></table>";}?><br>
<?php }}?>

<table height="50px"><tr><td align="center" style="font-size:1.5em"><a href="index.php"><br><br><br>Greenbox Nigeria Library<br>&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</a></td></tr></table><br>
<table><tr><td align="center" style="font-size:.8em">Renegade &copy; <?php echo date("Y"); ?></td></tr></table>


<script>document.getElementById("heahing").style.height=window.innerHeight - (window.innerHeight*0.3) +'px';function download(id) {		document.getElementById("service").src = "services/stats.php?downID="+id;}</script>
<iframe id="service"></iframe>
<?php }else{?> <script> window.open('index.php', '_self')</script><?php }?>
</body>
</html>