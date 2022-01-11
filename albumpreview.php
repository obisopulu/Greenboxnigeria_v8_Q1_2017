<?php include("rab_dbcon.php");
if ($detect->isMobile()){

//mobile
extract($_GET);$today = date("Y-m-d");
if($t==''){header("location: index.php");}
$albumed=str_replace('___', ' ', $albumed);
$albumed=str_replace('__', ' ', $albumed);
$albumed=str_replace('_', ' ', $albumed);
if($albumed){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$albumed' LIMIT 1");}else{
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$t' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row); } 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','album: $songAlbum',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "UPDATE anonymous SET anonymousName='$commenter' WHERE anonymousIP='$userIP'") or die("result no work 10");
	
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'album' ,'$id' ,'$date_updated')") or die("result no work 10");}?>            
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body style="background:#000; color:#FFF">
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="">

<table align="center" style=" width:;background:url(songsimg/<?php echo $songArt ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2; opacity:.5"><tr><td></td></tr></table>

<table style="background:url(songsimg/<?php echo $songArt ?>) center no-repeat; background-size:cover;" id="arter" onClick="showart()"><tr><td align="center">
<input type="hidden" id="arterid" value="0">
<table style="background:rgba(0,0,0,.5);height:200px; box-shadow:0 0 5px #000" id="artered">
<tr valign="middle"><td align="center">
<div style="font-size:2em;text-align:center"><?php echo $songAlbum ?></div>
<div style="font-weight:700;text-align:center;font-size:.8em;"><?php echo $songArtist ?></div>
<div style="font-weight:700;text-align:center;font-size:.8em;"><?php echo $songYear ?></div>
<br><br>
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
<?php $sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songAlbum='$t'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}
 if($me>3){?>
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
&bull;&bull;&bull;
</td></tr></table>
</td></tr></table>
<?php $songAlbum1=str_replace(' ', '_', $songAlbum);?>
<br>
<table style="text-align:center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/album-<?php echo $songAlbum1 ?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>-tt&text=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?> Preview <?php echo $songAlbum." By ".$songArtist ?> on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/track-<?php echo $songURL ?>-gg')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/gg.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td align='center'>
<div style='width:50px; height:50px' onclick="copyToClipboard('gbngr.com/archive/album-<?php echo $songAlbum1 ?>-gp')">
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;" align="center"><tr><td align="center">
<table style="background:url(images/url.png) center no-repeat; background-size:contain; width:40px; height:40px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>-in&title=<?php echo $songAlbum." By ".$songArtist ?>-  Preview on GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/songsimg/<?php echo $songArt?>&url=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>-pi&is_video=false&description=<?php echo substr_replace(htmlspecialchars_decode($songDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>-tb&title=<?php echo $songAlbum." By ".$songArtist ?>-  Preview on GreenboxNigeria.com&caption=Preview of <?php echo $songAlbum." Album by ".$songArtist ?> on GreenboxNigeria.com')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>
<br>
<table><tr><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #FFF; font-size:.8em; font-weight:700">TRACKLIST</td></tr></table>

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' ORDER BY songBeatmaker LIMIT 5");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #555; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr valign="top"><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:30px; height:30px; background:#FFF; border-radius:50%'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp' style='color:#FFF'>"; if($songProducer){echo " <br>$songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<?php
$sqls = mysqli_query($cxn, "select * from copy where copySong = 'album $songAlbum'") or die('xxx2');
$shares = mysqli_num_rows($sqls);
?>

<br><br><br>

<table><tr><td>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $songAlbum ?>"><input type="hidden" name="t" value="<?php echo $songAlbum ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='album' AND comment_cat_id='$songAlbum' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;border-bottom:thin solid #000; font-size:.8em;color:#FFF'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>

</td></tr></table>
<table style="width:200px"><tr><td>Shares :</td></tr><tr><td align="center"><?php echo $shares ?></td></tr></table>
<br>
<br>
<br>
<br>
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}

function showart() {
		if(document.getElementById('arterid').value=='0'){
				document.getElementById('arter').style.height=window.innerWidth+'px';
				document.getElementById('artered').style.height='10px';
				document.getElementById('artered').style.visibility='hidden';
				document.getElementById('arterid').value='1'
			}else{
				document.getElementById('arter').style.height='200px'
				document.getElementById('artered').style.height='200px'
				document.getElementById('artered').style.visibility='visible';
				document.getElementById('arterid').value='0'
			}
	}
function copyToClipboard(text) {
	_id("service").src = "services/stats.php?copy=album&album=<?php echo $songAlbum ?>";
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	_classhere('share').innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=album&album=<?php echo $songAlbum ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
window.onload = function() {
  	_id('title1').innerHTML='Preview <?php echo $songAlbum." By ".$songArtist ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo $songAlbum." By ".$songArtist ?>';
	_id('keywords').content='latest Nigerian music, fresh Nigerian music, new Nigerian music, Nigerian music, Nigerian songs, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
	}
</script>
</body>
</html>

<?php }else{

//desktop=
extract($_GET);$today = date("Y-m-d");
$albumed=str_replace('___', ' ', $albumed);
$albumed=str_replace('__', ' ', $albumed);
$albumed=str_replace('_', ' ', $albumed);
if($albumed){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$albumed' LIMIT 1");}else{
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$t' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row); } 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','album preview $songAlbum',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$anonymousCountry','$anonymousCity','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");
///////echo $_SERVER['HTTP_USER_AGENT'];
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "UPDATE anonymous SET anonymousName='$commenter' WHERE anonymousIP='$userIP'") or die("result no work 10");
	
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'album' ,'$id' ,'$date_updated')") or die("result no work 10");}?>            
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table><tr><td style="width:auto">
</td><td style="width:750px">

<table align="center" style=" width:;background:url(songsimg/<?php echo $songArt ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2; opacity:.5"><tr><td>
</td></tr></table>
<br>
<table align="center" style=" height:300px;top:10px; left:0; right:0;width:750px;"><tr></tr>
<tr valign="top"><td width="350px" align="center"><div style="padding:10px;background:url(songsimg/<?php echo $songArt ?>) center no-repeat;background-size:cover; width:300px; height:300px; vertical-align:middle"></div>
<div style="font-size:1.2em;text-align:center"><?php echo $songAlbum ?></div>
<div style="color:#00E676;text-align:center"><?php echo $songArtist ?></div>
<div style="text-align:center">
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<?php $sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songAlbum='$t'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}
 if($me>3){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div> ";} 
 if($me>4){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>";}?>
</div></td>
<td>

<table style="font-size:.8em" cellpadding="1">
<?php
$counter=1;
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$t' ORDER BY 	songBeatmaker DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
$songAlbum1=str_replace(' ', '_', $songAlbum);?>
<tr><td><?php echo $counter ?></td><td><?php echo $songTitle ?></td><td><?php echo $songArtistFt ?></td><td width='5%'><input type='button' class='play' title='play' 
onClick="play('<?php echo $songTitle; ?>','<?php echo "songs/".$songURL; ?>','<?php echo "songsimg/".$songArt; ?>','<?php echo $songArtist; ?>','<?php echo $songArtistFt; ?>','<?php echo $songProducer; ?>','<?php echo $songAlbum; ?>','<?php echo $songID; ?>','<?php echo $songRating; ?>','<?php echo $songYear; ?>')"></td><?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

//do something with this information
if( $iPod || $iPhone ){
    //browser reported as an iPhone/iPod touch -- do something here
}else if($iPad){
    //browser reported as an iPad -- do something here
}else{?>
<td width='5%'><input type='button' class='download' title='download' onClick="download('<?php echo $songID; ?>')"></td><?php }?><td width='5%'><form action='musicpreview.php'><input type='hidden' name='t' value='<?php echo $songID ?>'><input value='' type='submit' class='options' title='preview'></form></td></tr>
<?php $counter++;}?>
</table>
<?php
$sql = mysqli_query($cxn, "select * from play where playSongID = '$songID'") or die('xxx1');
$plays = mysqli_num_rows($sql);

$sqls = mysqli_query($cxn, "select * from copy where copySong = 'album $songAlbum'") or die('xxx2');
$shares = mysqli_num_rows($sqls);
?>
</td>

</tr></table>
<div style="width:750px; padding:20px; margin-top:20px"><table><tr>
<td>Share <div class="share"><?php echo $shares ?></div></td>
<td align="centr">
<span class="pagination" onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/album-<?php echo $songAlbum1 ?>')">Facebook</span>
<span class="pagination" onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>&text=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?> Preview <?php echo $songAlbum." By ".$songArtist ?> on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')">Twitter</span>
<span class="pagination" onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>&title=<?php echo $songAlbum." By ".$songArtist ?>-  Preview on GreenboxNigeria.com')">LinkedIn</span>
<span class="pagination" onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/album-<?php echo $songAlbum1 ?>')">Google+</span>
<span class="pagination" onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/songsimg/<?php echo $songArt?>&url=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>&is_video=false&description=<?php echo substr_replace(htmlspecialchars_decode($songDescription),'...',55)?>')">Pinterest</span>
<span class="pagination" onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=albumpreview.php?albumed=<?php echo $songAlbum1 ?>&title=<?php echo $songAlbum." By ".$songArtist ?>-  Preview on GreenboxNigeria.com&caption=Preview of <?php echo $songAlbum." Album by ".$songArtist ?> on GreenboxNigeria.com')">Tumblr</span>
<span class="pagination" onclick="copyToClipboard('gbngr.com/archive/album-<?php echo $songAlbum1 ?>')">copy URL</span>
</td></tr></table></div>
  </fieldset>
  <fieldset>
    <legend></legend>
<table><tr><td>Comments</td></tr></table>
<table><tr valign="top"><td style="padding:10px; width:50%;">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='album' AND comment_cat_id='$songAlbum'");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:90%; height:;color:#FFF;margin-top:10px;background:#222;font-size:.8em;'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px'>$comment</td></tr></table>
"; }?>

</td><td align="right">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous_desktop' OR $anonymousName!='anonymous_mobile')echo $anonymousName?>" class="commenter"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $songAlbum ?>"><input type="hidden" name="t" value="<?php echo $songAlbum ?>"></form>
</td></tr></table>
  </fieldset>
  
</td><td style="width:auto">
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _class(el){return top.document.getElementsByClassName(el)[0];}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function play(title, url, art,  artist, artistft, producer, album, id, rating, year){
  	_id('title1').innerHTML='<?php echo $songAlbum." By ".$songArtist ?>-  streaming live via GreenboxNigeria.com';
	_id('description').content='Listen to '+title+'<?php echo " By ".$songArtist ?>';
	_id('keywords').content='latest , fresh, all Music, old School Nigerian, new Jams, Nigerian music, Nigerian songs, Nigerian tracks';
		_id('player2').src= url;
		_id('player2').autoplay = true;
		_class('playerart').style.background = 'url('+art+') center no-repeat';
		_class('playerart').style.backgroundSize = 'cover'
		if(artistft =='' ){_class('playertitle').innerHTML = title;}
		else if(title.length+artistft.length > 24 ){_class('playertitle').innerHTML ="<marquee scrollamount='4'>"+title+" Ft "+artistft+"</marquee>";}
		else{_class('playertitle').innerHTML = title+" Ft "+artistft;}
		_class('playerartist').innerHTML = artist;
		_class('playerproducer').innerHTML = producer;
		_class('payeralbum').innerHTML = album;
		_class('playeryear').innerHTML = year;
		_class('rating').innerHTML ="<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:10px; height:10px;display:inline-block'></div> <div style='background:url(images/star.png) left no-repeat; background-size:cover; width:10px; height:10px;display:inline-block'></div> <div style='background:url(images/star.png) left no-repeat; background-size:cover; width:10px; height:10px;display:inline-block'></div> ";
		if (rating > 3){_class('rating').innerHTML +="<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:10px; height:10px;display:inline-block'></div> "}
		if (rating > 4){_class('rating').innerHTML +="<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:10px; height:10px;display:inline-block'></div>"}
		_id('art').value=id;
		_id("service").src = "services/stats.php?play="+id;
		_id("playerplay").value=1;
		_id("played").style.background = 'url(images/pause.png) center no-repeat';
		_id("played").style.backgroundSize = 'cover'}
function copyToClipboard(text) {
	_id("service").src = "services/stats.php?copy=album&album=<?php echo $songAlbum ?>";
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	_classhere('share').innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=album&album=<?php echo $songAlbum ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function download(id) {
	_id("service").src = "services/stats.php?downID="+id;}
window.onload = function() {
  	_id('title1').innerHTML='Preview <?php echo $songAlbum." By ".$songArtist ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo $songAlbum." By ".$songArtist ?>';
	_id('keywords').content='latest Nigerian music, fresh Nigerian music, new Nigerian music, Nigerian music, Nigerian songs, Nigerian tracks';}
</script>
</body>
</html>

<?php }?>