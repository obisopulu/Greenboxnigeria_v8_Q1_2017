<?php include("rab_dbcon.php");

extract($_GET);
$labeled=str_replace('___', ' ', $labeled);
$labeled=str_replace('__', ' ', $labeled);
$labeled=str_replace('_', ' ', $labeled);
 if($labeled){$sql = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelName='$labeled' LIMIT 1");}else{
 $sql = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelID='$labelID' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
{extract($row);}
$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','label: $labelName',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'label' ,'$id' ,'$date_updated')") or die("result no work 10");}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>

<?php if ($detect->isMobile()){ ?>

<body style="background:#000;color:#FFF">
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center">

<table align="center" style="background:url(labelsimg/<?php echo $labelPic ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2;opacity:.4"><tr><td>
</td></tr></table>
<br>
<?php
		$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
		$labelHistory=htmlspecialchars_decode($labelHistory);
		$labelArtists=htmlspecialchars_decode($labelArtists);
		$labelProducers=htmlspecialchars_decode($labelProducers);
		$labelOthers=htmlspecialchars_decode($labelOthers);
	?>
<table><tr valign="middle" align="center"><td><div style="border:none;background:url(labelsimg/<?php echo $labelPic ?>) center no-repeat; background-size:contain;height:350px; width:80%; padding:0px 10px;cursor:pointer;filter:labelsimg/<?php echo $labelPic ?>"></div></td></tr></table>

<table><tr><td style='font-size:2em; padding:10px 10px 0px 10px; ' align="center"><?php echo $labelName?></td></tr></table>
<br>

<table><tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Founder</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $labelOwner ?></td></tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Artists</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $labelArtists?></td></tr>
<?php if($labelProducers) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Producers</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $labelProducers ?></td></tr><?php }?>
<?php if($labelOthers) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Others</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $labelOthers ?></td></tr><?php }?>
<?php if($labelFounded) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Founded</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $labelFounded ?></td></tr><?php }?>
</table>


<table style="text-align:center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/label-<?php echo str_replace(' ', '_', $labelName );?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/label-<?php echo str_replace(' ', '_', $labelName );?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>

<br><br>
<table align="center" class="fresh"><tr><td>
<br>
<table><tr><td><div style="text-indent:100px;"><?php echo $labelHistory?></div></td></tr></table>
</td></tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $labelID ?>"><input type="hidden" name="labelID" value="<?php echo $labelID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='label' AND comment_cat_id='$labelID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;font-size:; border-bottom:thin solid #000; color:#FFF; font-size:.8em'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>

</td></tr></table>
<br><br>
<table style="width:200px"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'label $labelName'") or die('xxx2');$shares = mysqli_num_rows($sqls); echo $shares ?></td></tr></table>
<br>
<br>
<br>
<br>
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=label&label=<?php echo $labelName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/label-<?php echo str_replace(' ', '_', $labelName );?>-gp");
	_id("service").src = "services/stats.php?copy=label&label=<?php echo $labelName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $labelName ?> via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($labelHistory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }else{?>
	
<body style="background:#000;color:#FFF">

<table align="center" style="background:url(labelsimg/<?php echo $labelPic ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2;opacity:.4"><tr><td>
</td></tr></table>
<br>
<?php
		$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
		$labelHistory=htmlspecialchars_decode($labelHistory);
		$labelArtists=htmlspecialchars_decode($labelArtists);
		$labelProducers=htmlspecialchars_decode($labelProducers);
		$labelOthers=htmlspecialchars_decode($labelOthers);
	?>
<table><tr valign="middle" align="center"><td><div style="border:none;background:url(labelsimg/<?php echo $labelPic ?>) center no-repeat; background-size:contain;height:350px; width:80%; padding:0px 10px;cursor:pointer;filter:labelsimg/<?php echo $labelPic ?>"></div></td></tr></table>

<table><tr><td style='font-size:2em; padding:10px 10px 0px 10px; ' align="center"><?php echo $labelName?></td></tr></table>
<br>

<table><tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Founder</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $labelOwner ?></td></tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Artists</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $labelArtists?></td></tr>
<?php if($labelProducers) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Producers</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $labelProducers ?></td></tr><?php }?>
<?php if($labelOthers) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Others</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $labelOthers ?></td></tr><?php }?>
<?php if($labelFounded) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Founded</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $labelFounded ?></td></tr><?php }?>
</table>


<table style="text-align:center; width:400px" align="center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/label-<?php echo str_replace(' ', '_', $labelName );?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/label-<?php echo str_replace(' ', '_', $labelName );?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=label.php?labeled=<?php echo str_replace(' ', '_', $labelName );?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>

<br><br>
<table align="center" class="fresh"><tr><td>
<br>
<table><tr><td><div style="text-indent:100px;"><?php echo $labelHistory?></div></td></tr></table>
</td></tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $labelID ?>"><input type="hidden" name="labelID" value="<?php echo $labelID ?>"></form>
</td><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='label' AND comment_cat_id='$labelID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;font-size:; border-bottom:thin solid #000; color:#FFF; font-size:.8em'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>

</td></tr></table>
<br><br>
<table style="width:200px" align="center"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'label $labelName'") or die('xxx2');$shares = mysqli_num_rows($sqls); echo $shares ?></td></tr></table>
<br>

<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=label&label=<?php echo $labelName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/label-<?php echo str_replace(' ', '_', $labelName );?>-gp");
	_id("service").src = "services/stats.php?copy=label&label=<?php echo $labelName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $labelName ?> via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($labelHistory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>


<?php }?>