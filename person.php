<?php include("rab_dbcon.php");

extract($_GET);
$personed=str_replace('___', ' ', $personed);
$personed=str_replace('__', ' ', $personed);
$personed=str_replace('_', ' ', $personed);
 if($personed){$sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$personed' LIMIT 1");}else{
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personID='$personID' LIMIT 1");}$person=str_replace('---', ' ', $person);
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}	
$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','person: $personStageName',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'person' ,'$id' ,'$date_updated')") or die("result no work 10");}?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<?php
$personStageName=htmlspecialchars_decode($personStageName);
$personBirthName=htmlspecialchars_decode($personBirthName);
$personFanName=htmlspecialchars_decode($personFanName);
$personGenre=htmlspecialchars_decode($personGenre);
$personBirthDay=htmlspecialchars_decode($personBirthDay);
$personBirthYear=htmlspecialchars_decode($personBirthYear);
$personPlaceOfOrigin=htmlspecialchars_decode($personPlaceOfOrigin);
$personProfession1=htmlspecialchars_decode($personProfession1);
$personProfession2=htmlspecialchars_decode($personProfession2);
$personProfession3=htmlspecialchars_decode($personProfession3);
$personProfession4=htmlspecialchars_decode($personProfession4);
$personLabel=htmlspecialchars_decode($personLabel);
$personLifeStory=htmlspecialchars_decode($personLifeStory);
$personPic1=htmlspecialchars_decode($personPic1);
$personPic2=htmlspecialchars_decode($personPic2);
$personPic3=htmlspecialchars_decode($personPic3);?>

<?php if ($detect->isMobile()){?>

<body style="background:#000;color:#FFF">
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center">

<table align='center' style=' width:;background:url(personsimg/<?php echo $personPic1 ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:700px; position:fixed; z-index:-2;opacity:.4'><tr><td></td></tr></table>


<table align='center' style=' height:300px;width:95%;'>
<tr><td style="font-size:.8em;">
<b style="font-size:1.5em; font-weight:bolder"><?php echo $personStageName?></b><br>
<?php if($personLabel){echo"<div style='color:#00E676;'>$personLabel</div>";}?>

<?php echo $personProfession1; if($personProfession2){echo " &bull; ".$personProfession2;}
if($personProfession3){echo " &bull; ".$personProfession3;}
if($personProfession4){echo " &bull; ".$personProfession4;}?>
</td><td align='center' width="25%">
<div style='padding:10px; border-radius:50%;background:url(personsimg/<?php echo $personPic2 ?>) center no-repeat;background-size:cover; width:100px; height:100px;border:thick #000 solid'></div>
</td></tr></table>

<?php if($personCareerStartYear!='5000'){?>
<table style="width:20%" align="center"><tr><td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php $sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songArtist='$personStageName'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}?>
<?php  if($me>3){?>
 <td>
 <table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php }
 if($me>4){?>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
 <?php }?>
</tr></table>
 <?php }?>
<br>

<table style="text-align:center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gg')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/gg.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td align='center'>
<div style='width:50px; height:50px'onclick="copyToClipboard()">
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;" align="center"><tr><td align="center">
<table style="background:url(images/url.png) center no-repeat; background-size:contain; width:40px; height:40px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>
<br><br>
<table><tr>
<?php
$x=date('Y');
 if($personBirthName) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birth Name</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $personBirthName ?></td></tr><?php }?>
<?php if($personBirthDay) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birthday</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personBirthDay ?></td></tr><?php }?>
<?php if($labelFounded) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Age</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personBirthYear." Years" ?></td></tr><?php }?>
<?php if($personGenre) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Genre</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personGenre ?></td></tr><?php }?>
<?php if($personCareerStartYear AND $personCareerStartYear!='5000'){?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Career Lenght</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personCareerStartYear." Years" ?></td></tr><?php }?>
<?php if($personPlaceOfOrigin) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">State Of Origin</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personPlaceOfOrigin ?></td></tr><?php }?>
</table>
<br>
<?php 
$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$personStageName' OR songProducer='$personStageName' LIMIT 5");

$sql2 = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songArtist='$personStageName' AND songAlbum NOT IN ('mixtape','single','cover','') LIMIT 5");

$sql3 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '$personStageName%' OR songArtistFt LIKE '% $personStageName %' OR songArtistFt LIKE '%$personStageName' LIMIT 5");

$sql4 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '%$personStageName%' OR videoArtist LIKE '%$personStageName%' OR videoArtistFt LIKE '%$personStageName%' OR videoDirector LIKE '%$personStageName%' ORDER BY videoTitle ASC LIMIT 5");
if(mysqli_num_rows($sql1)>0 OR mysqli_num_rows($sql2)>0 OR mysqli_num_rows($sql3)>0 OR mysqli_num_rows($sql4)){
echo "<table><tr><td class='tabheader2'> Discography</td></tr><tr><td>";
if(mysqli_num_rows($sql1)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">SONGS</td></tr></table>
<?php 
while($row=mysqli_fetch_assoc($sql1))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<?php }?>
<?php
if(mysqli_num_rows($sql2)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ALBUMS</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sql2)){extract($row);
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songAlbum";?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php } ?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=album','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<?php }
if(mysqli_num_rows($sql3)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">FEATURED</td></tr></table>

<?php $counter=1;
while($row=mysqli_fetch_assoc($sql3))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>
<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artistFt','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<?php } 
if(mysqli_num_rows($sql4)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">VIDEOS</td></tr></table>

<?php 
while($row=mysqli_fetch_assoc($sql4))	
{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('video.php?videoID=<?php echo $videoID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp' style='color:#FFF'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
<?php }?>
<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('videos.php','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<?php }

 }?>

<br>
<table><tr><td align="center"><div class="blogwriteup;font-size:1em;"><?php echo htmlspecialchars_decode($personLifeStory)?></div><br></td></tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $personID ?>"><input type="hidden" name="personID" value="<?php echo $personID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='person' AND comment_cat_id='$personID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;font-size:; border-bottom:thin solid #000; color:#FFF; font-size:.8em'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>

</td></tr></table>
<br><br>
<table style="width:200px" align="center"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'person $personStageName'") or die('xxx2');
echo mysqli_num_rows($sqls);?></td></tr></table>
<br>
<br>
<br>
<br>
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gp");
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $personStageName ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($personLifeStory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }else{?>
	
<body style="background:#000;color:#FFF">

<table align='center' style=' width:;background:url(personsimg/<?php echo $personPic1 ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:700px; position:fixed; z-index:-2;opacity:.4'><tr><td></td></tr></table>

<br>
<table align='center' style=' height:300px;width:95%;'>
<tr><td style="font-size:1em;">
<b style="font-size:2em; font-weight:bolder"><?php echo $personStageName?></b><br>
<?php if($personLabel){echo"<div style='color:#00E676;'>$personLabel</div>";}?>

<?php echo $personProfession1; if($personProfession2){echo " &bull; ".$personProfession2;}
if($personProfession3){echo " &bull; ".$personProfession3;}
if($personProfession4){echo " &bull; ".$personProfession4;}?>
</td><td align='center' width="25%">
<div style='padding:10px; border-radius:50%;background:url(personsimg/<?php echo $personPic2 ?>) center no-repeat;background-size:cover; width:300px; height:300px;border:thick #000 solid'></div>
</td></tr></table>

<?php if($personCareerStartYear!='5000'){?>
<table style="width:20%" align="center"><tr><td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php $sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songArtist='$personStageName'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}?>
<?php  if($me>3){?>
 <td>
 <table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php }
 if($me>4){?>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
 <?php }?>
</tr></table>
 <?php }?>
<br>

<table align="center" style="text-align:center;width:400px"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gg')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/gg.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td align='center'>
<div style='width:50px; height:50px'onclick="copyToClipboard()">
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;" align="center"><tr><td align="center">
<table style="background:url(images/url.png) center no-repeat; background-size:contain; width:40px; height:40px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>
<br><br>
<table><tr>
<?php
$x=date('Y');
 if($personBirthName) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birth Name</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $personBirthName ?></td></tr><?php }?>
<?php if($personBirthDay) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birthday</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personBirthDay ?></td></tr><?php }?>
<?php if($labelFounded) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Age</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personBirthYear." Years" ?></td></tr><?php }?>
<?php if($personGenre) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Genre</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personGenre ?></td></tr><?php }?>
<?php if($personCareerStartYear AND $personCareerStartYear!='5000'){?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Career Lenght</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personCareerStartYear." Years" ?></td></tr><?php }?>
<?php if($personPlaceOfOrigin) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">State Of Origin</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personPlaceOfOrigin ?></td></tr><?php }?>
</table>
<br>
<?php 
$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$personStageName' OR songProducer='$personStageName' LIMIT 5");

$sql2 = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songArtist='$personStageName' AND songAlbum NOT IN ('mixtape','single','cover','') LIMIT 5");

$sql3 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '$personStageName%' OR songArtistFt LIKE '% $personStageName %' OR songArtistFt LIKE '%$personStageName' LIMIT 5");

$sql4 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '%$personStageName%' OR videoArtist LIKE '%$personStageName%' OR videoArtistFt LIKE '%$personStageName%' OR videoDirector LIKE '%$personStageName%' ORDER BY videoTitle ASC LIMIT 5");
if(mysqli_num_rows($sql1)>0 OR mysqli_num_rows($sql2)>0 OR mysqli_num_rows($sql3)>0 OR mysqli_num_rows($sql4)){
echo "<table><tr><td class='tabheader2'> Discography</td></tr><tr><td>";
if(mysqli_num_rows($sql1)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">SONGS</td></tr></table>
<?php 
while($row=mysqli_fetch_assoc($sql1))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<?php }?>
<?php
if(mysqli_num_rows($sql2)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ALBUMS</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sql2)){extract($row);
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songAlbum";?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php } ?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=album','_self');">More</div></td></tr></table>

<?php }
if(mysqli_num_rows($sql3)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">FEATURED</td></tr></table>

<?php $counter=1;
while($row=mysqli_fetch_assoc($sql3))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>
<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artistFt','_self');">More</div></td></tr></table>

<?php } 
if(mysqli_num_rows($sql4)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">VIDEOS</td></tr></table>

<?php 
while($row=mysqli_fetch_assoc($sql4))	
{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('video.php?videoID=<?php echo $videoID?>','_self');"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp' style='color:#FFF'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
<?php }?>
<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('videos.php','_self');">More</div></td></tr></table>
<?php }

 }?>

<br>
<table><tr><td align="center"><div class="blogwriteup" style="font-size:1em; padding:0 20px; text-align:left"><?php echo htmlspecialchars_decode($personLifeStory)?></div><br></td></tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $personID ?>"><input type="hidden" name="personID" value="<?php echo $personID ?>"></form>
</td><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='person' AND comment_cat_id='$personID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;font-size:; border-bottom:thin solid #000; color:#FFF; font-size:.8em'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>

</td></tr></table>
<br><br>
<table style="width:200px" align="center"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'person $personStageName'") or die('xxx2');
echo mysqli_num_rows($sqls);?></td></tr></table>
<br>

  
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gp");
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $personStageName ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($personLifeStory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }?>