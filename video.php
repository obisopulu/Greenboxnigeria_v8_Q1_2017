<?php include("rab_dbcon.php");


extract($_GET);
$videoed=str_replace('___', ' ', $videoed);
$videoed=str_replace('__', ' ', $videoed);
$videoed=str_replace('_', ' ', $videoed);
if($videoed){$sql = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle='$videoed' LIMIT 1");}else{
 $sql = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoID='$videoID' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','video',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'video' ,'$id' ,'$date_updated')") or die("result no work 10");}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>

<?php if ($detect->isMobile()){?>

<body style="background:#000; color:#FFF">
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center">

<table align="center" style="background:url(videosimg/<?php echo $videoPic ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2;opacity:.6"><tr><td>
</td></tr></table>
<br>


<table><tr><td align="center">
<table><tr><td class='videoart' style='height:250px; width:100%;cursor:pointer;' align="center">
<iframe width="95%" height="250px" src="<?php echo $videoSRC?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</td></tr>
<tr><td style='font-size:2em; padding:10px 10px 0px 10px; color:#FFF' align="center"><?php echo $videoTitle?><div style="font-size:.6em"><?php echo $videoArtist; if($videoArtistFt){ echo " Ft ".$videoArtistFt;}?></div></td></tr>
<tr><td>
<br>

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
<?php  if($videoRating>3){?>
 <td>
 <table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php }
 if($videoRating>4){?>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
 <?php }?>
</tr></table>
<br>
</td></tr></table>


<table><tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Title</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $videoTitle ?></td></tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Artist</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $videoArtist ?></td></tr>
<?php if($videoArtistFt) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Featured</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $videoArtistFt ?></td></tr><?php }?>
<?php if($videoDirector) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Director</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $videoDirector ?></td></tr><?php }?>
</table>


<?php
$title = $videoTitle." by ".$videoArtist; 
if ($videoArtistFt !=''){$title .= " Ft ".$videoArtistFt;}
if ($videoDirector !=''){$title .= ". Director, ".$videoDirector;}
?>
 
 
<table style="text-align:center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/video-<?php echo str_replace(' ', '_', $title);?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/video-<?php echo str_replace(' ', '_', $videoTitle);?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $videoID ?>"><input type="hidden" name="videoID" value="<?php echo $videoID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='video' AND comment_cat_id='$videoID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;font-size:; border-bottom:thin solid #000; color:#FFF; font-size:.8em'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>

</td></tr></table>
<table style="width:200px"><tr><td>Shares :</td></tr><tr><td align="center"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'video $videoTitle'") or die('xxx2');$shares = mysqli_num_rows($sqls); echo $shares ?></td></tr></table>
<br>
<br>
<br>
<br>
</td></tr></table></td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el);}
function copyToClipboard() {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/video-<?php echo str_replace(' ', '_', $videoTitle);?>-gp");
	_id("service").src = "services/stats.php?copy=video&video=<?php echo $videoTitle ?>";
	_classhere('share')[0].innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=video&video=<?php echo $videoTitle ?>";
	_classhere('share')[0].innerHTML++;
	window.open(url, '_blank')}
function pager(x){
		window.open(x,'_self');
		top.document.getElementById('intiating').style.top='0';
	}
window.onload = function() {
  	_id('title1').innerHTML='Preview of <?php echo $videoTitle.' by '.$videoArtist ?> on GreenboxNigeria.com';
	_id('description').content='<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55) ?>';
	_id('keywords').content='latest Nigerian music videos, fresh Nigerian music videos, new Nigerian music videos, Nigerian music videos, Nigerian songs videos, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
	}
</script>
</body>
</html>

<?php }else{?>

<body style="background:#EEE;">

<table><tr><td align="center">
<table><tr><td class='videoart' style='height:250px; width:100%;cursor:pointer;' align="center">
<iframe width="95%" height="500px" src="<?php echo $videoSRC?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</td></tr>
<tr><td style='padding:10px' align="center"><?php echo $videoTitle?><div><?php echo $videoArtist; if($videoArtistFt){ echo " Ft ".$videoArtistFt;}?></div></td></tr>
<tr><td>
<br>

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
<?php  if($videoRating>3){?>
 <td>
 <table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php }
 if($videoRating>4){?>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
 <?php }?>
</tr></table>
<br>
</td></tr></table>


<table><tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Title</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $videoTitle ?></td></tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Artist</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $videoArtist ?></td></tr>
<?php if($videoArtistFt) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Featured</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $videoArtistFt ?></td></tr><?php }?>
<?php if($videoDirector) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Director</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $videoDirector ?></td></tr><?php }?>
</table>


<?php
$title = $videoTitle." by ".$videoArtist; 
if ($videoArtistFt !=''){$title .= " Ft ".$videoArtistFt;}
if ($videoDirector !=''){$title .= ". Director, ".$videoDirector;}
?>
 
 
<table style="text-align:center; width:400px"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/video-<?php echo str_replace(' ', '_', $title);?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/video-<?php echo str_replace(' ', '_', $videoTitle);?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='video' AND comment_cat_id='$videoID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;font-size:; border-bottom:thin solid #000; color:#FFF; font-size:.8em'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>

</td><td style="padding:10px; width:50%;" align="center">

Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $videoID ?>"><input type="hidden" name="videoID" value="<?php echo $videoID ?>"></form>

</td></tr></table>
<table style="width:200px"><tr><td>Shares :</td></tr><tr><td align="center"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'video $videoTitle'") or die('xxx2');$shares = mysqli_num_rows($sqls); echo $shares ?></td></tr></table>
<br>
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el);}
function copyToClipboard() {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/video-<?php echo str_replace(' ', '_', $videoTitle);?>-gp");
	_id("service").src = "services/stats.php?copy=video&video=<?php echo $videoTitle ?>";
	_classhere('share')[0].innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=video&video=<?php echo $videoTitle ?>";
	_classhere('share')[0].innerHTML++;
	window.open(url, '_blank')}
function pager(x){
		window.open(x,'_self');
		top.document.getElementById('intiating').style.top='0';
	}
window.onload = function() {
  	_id('title1').innerHTML='Preview of <?php echo $videoTitle.' by '.$videoArtist ?> on GreenboxNigeria.com';
	_id('description').content='<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55) ?>';
	_id('keywords').content='latest Nigerian music videos, fresh Nigerian music videos, new Nigerian music videos, Nigerian music videos, Nigerian songs videos, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
	}
</script>
</body>
</html>

<?php }?>