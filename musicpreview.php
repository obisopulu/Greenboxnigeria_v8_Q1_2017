<?php include("rab_dbcon.php");

extract($_GET);

 if($songed){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songURL='$songed' LIMIT 1");}else{
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songID='$t' LIMIT 1");if($t==''){header("location: index.php");}}
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','music: $songArtist - $songTitle',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'music' ,'$id' ,'$date_updated')") or die("result no work 10");}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>

<?php if ($detect->isMobile()){?>

<body style="background:#000">
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center">

<table align="center" style="background:url(songsimg/<?php echo $songArt ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2;opacity:.6"><tr><td>
</td></tr></table>
<br><br>

<table align="center" style=" height:300px;width:95%; font-size:.8em; font-weight:700; border-radius:50%; font-weight:700">

<tr valign="middle"><td align="center">

<table style="height:300px; width:300px;background:url(songsimg/<?php echo $songArt ?>) center no-repeat; background-size:cover; box-shadow:0 0 15px #000"><tr><td>

<table style="height:300px; width:300px;background:rgba(0,0,0,.5)">
<tr valign="middle"><td align="center" style="height:20px; background: #FFF">
<table style="background:url(images/logo.png) center no-repeat; background-size:contain; height:15px"><tr><td></td></tr></table>
</td></tr>
<tr valign="bottom"><td align="center">

<table style="color:#FFF; font-size:2.5em; font-weight:800; width:auto">
<tr><td align="center" style="border-bottom:thin solid #FFF"><?php echo $songArtist ?></span></td></tr>
<tr><td align="center"><?php echo $songTitle ?></span></td></tr>
</table>

</td></tr>
<tr><td style="color:#FFF; padding:0 10px; text-align:right; font-size:1.5em; height:70px">
<?php if($songArtistFt) {?><?php if($songArtistFt) echo "<br> $songArtistFt" ?><?php }?>
<?php if($songProducer) { if($songProducer) echo "<br> $songProducer" ?>
<?php }?>
</td></tr>

<tr valign="middle" style="height:20px; background:#FFF"><td align="center">
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<?php if($songRating>3){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div> ";} ?>
<?php if($songRating>4){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>";} ?>
</td></tr></table>

</td></tr></table>



</td></tr>


<tr valign="middle"><td align="center">

<table style="color:##FFF"><tr>
<?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

if( $iPod || $iPhone || $iPad){
}else{?>
<td style="width:30%;" align="right">
<br>
<a href='<?php echo "songs/$songURL"; ?>' download><div onClick="download('<?php echo $songID; ?>', 'lq');">
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF; margin-top:20px"><tr><td align="center">
<table style="background:url(images/download.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%" id="played"></td></tr></table>
</td></tr></table></div></a>
<span style="color:#FFF; font-size:.6em; font-weight:900">DOWNLOAD I</span>
</td>
<?php }?>
<td align="center"onClick="play('<?php echo $songTitle; ?>','<?php echo "songs/".$songURL; ?>','<?php echo "songsimg/".$songArt; ?>','<?php echo $songArtist; ?>','<?php echo $songArtistFt; ?>','<?php echo $songProducer; ?>','<?php echo $songAlbum; ?>','<?php echo $songID; ?>','<?php echo $songYear; ?>')">

<table style="width:70px; height:70px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF; margin-top:20px"><tr><td align="center">
<table style="background:url(images/play.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%" id="played"></td></tr></table>
</td></tr></table>
</td>

<?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

if( $iPod || $iPhone || $iPad){
}else{?>
<td style="width:30%" align="left">
<br>
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF; margin-top:20px"onClick="download('<?php echo $songID; ?>', 'hq')"><tr><td align="center">
<table style="background:url(images/download.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"  id="played"></td></tr></table>
</td></tr></table>
<span style="color:#FFF; font-size:.6em; font-weight:900">DOWNLOAD II</span>
</td>
<?php }?>
</tr></table>

</td></tr>

<tr><td align="center" style="color:#FFF"><br>

<table><tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Title</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $songTitle ?></td></tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Artist</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songArtist ?></td></tr>
<?php if($songArtistFt) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Featured</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $songArtistFt ?></td></tr><?php }?>
<?php if($songProducer) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Producer</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songProducer?>&c=producer','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songProducer ?></td></tr><?php }?>

<?php if($songAlbum != '' && $songAlbum != 'single' && $songAlbum != 'cover' && $songAlbum != 'mixtape'){?>
<td style="padding:0 5px; width:48%; text-align:right">Album</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songAlbum ?></td></tr><?php }?>
<?php if ($songGenre=='RandB'){$songGenre='R&amp;B';}?>
<?php if($songGenre) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Genre</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songGenre?>&c=genre','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songGenre ?></td></tr><?php }?>
<?php if($songLanguage) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Language</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songLanguage?>&c=language','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songLanguage ?></td></tr><?php }?>

<tr><td style="padding:0 5px; width:48%; text-align:right">Duration</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $songLenght ?></td></tr>
<?php if($songYear) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Year</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songYear?>&c=year','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songYear ?></td></tr><?php }?>

<tr><td style="padding:0 5px; width:48%; text-align:right">Size</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php  echo number_format($songSize/1024/1024) ."mb" ?></td>
</tr></table>

<?php
$pagetitle="Preview $songArtist - $songTitle";
if($songArtistFt){$pagetitle.=" ft songArtistFt";}
if($songProducer){$pagetitle.=", Prod. by $songProducer";}
$pagetitle."= on GreenboxNigeria%20";

str_replace(' ', '-', $pagetitle);
$songdesc=substr_replace($songDescription,'..',50)
?>



<table style="text-align:center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/music-<?php echo $songURL ?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>&text=<?php echo $pagetitle ?>%20gbngr.com/archive/music-<?php echo $songURL ?>-tt')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/music-<?php echo $songURL ?>-gg')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/gg.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td align='center'>
<div style='width:50px; height:50px'onclick="copyToClipboard('gbngr.com/archive/music-<?php echo $songURL ?>-gp')">
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;" align="center"><tr><td align="center">
<table style="background:url(images/url.png) center no-repeat; background-size:contain; width:40px; height:40px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>-in&title=<?php echo $pagetitle ?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/songsimg/<?php echo $songArt?>&url=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>-pi&is_video=false&description=<?php echo $songdesc?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>-tb&title=<?php echo $pagetitle ?>&caption=<?php echo $songdesc?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>


<table><tr><td align="center"><br><div class="blogwriteup;font-size:1em;"><?php echo $songDescription ?></div><br></td></tr></table>
<table><tr><td><br>Comments</td></tr></table>
<table><tr><td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $songID ?>"><input type="hidden" name="t" value="<?php echo $songID ?>"></form>
</td></tr><tr valign="top"><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='music' AND comment_cat_id='$songID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%;margin-top:10px;background:#222; border-bottom:thin solid #000; color:#FFF'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>
<br>
</td></tr></table>
<?php
$sqls = mysqli_query($cxn, "select * from copy where copySongID = '$songID' AND copySong LIKE  '%$music%'  ") or die('xxx2');
$shares = mysqli_num_rows($sqls);
?>

<table><tr><td width="33%">Plays :</td><td>Downloads :</td><td width="33%">Shares :</td></tr>
<tr><td class="plays" align="center" style="background:none; color:#FFF"><?php echo $songPlay?></td>
<td class="plays" align="center" style="background:none; color:#FFF"><?php echo $songDownload ?></td>
<td class="share" align="center"><?php echo $shares ?></td></tr></table>
<br>
<br>
<br>
<br>
<br>
<br>
</td></tr></table></td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _class(el){return top.document.getElementsByClassName(el)[0];}
function __class(el){return top.document.getElementsByClassName(el)[1];}
function _classhere(el){return document.getElementsByClassName(el);}
function play(title, url, art,  artist, artistft, producer, album, id, year){
  	_id('title1').innerHTML='streaming <?php echo $songTitle.' By '.$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }  if($songProducer){echo " Prod by ".$songProducer; }?>- on GreenboxNigeria.com';
	_id('description').content='Preview, lsiten and download <?php echo $songTitle." By ".$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }; if($songProducer){echo ", Prod by ".$songProducer; } ?>';
	_id('keywords').content='latest , fresh, new, Nigerian music, Nigerian songs, Nigerian tracks,<?php echo $songTitle.', '.$songArtist; if($songArtistFt){echo ",".$songArtistFt; }  if($songProducer){echo ", ".$songProducer; }?>';
		_id('player2').src= url;
		_class('playerart').style.background = 'url('+art+') center no-repeat';
		_class('playerart').style.backgroundSize = 'cover';
		__class('playerart').style.background = 'url('+art+') center no-repeat';
		__class('playerart').style.backgroundSize = 'cover';
		xxx="<table style='text-align:center; font-size:.8em; font-weight:700;height:20px'><tr><td colspan='2'><?php echo $songTitle ?></td></tr><tr><td><?php echo $songArtist ?><?php if($songArtistFt){echo " ft ".$songArtistFt;} ?></td></tr><tr><td colspan='2'><?php echo $songProducer ?></td></tr></table>";
		_class('playertitle').innerHTML = __class('playertitle').innerHTML = xxx;
		_id('playerrating').innerHTML="<table style='width:100px' align='center'><tr><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><?php if($songRating>3){?><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><?php }?><?php if($songRating>4){?><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><?php }?></tr></table>";
		_id('played1').style.background = 'url(images/buffer1.png) center no-repeat';
		_id('played1').style.backgroundSize = 'contain'
		_id('played').style.background = 'url(images/buffer1.png) center no-repeat';
		_id('played').style.backgroundSize = 'contain'
		_id('art').value=id;
		_id("service").src = "services/stats.php?play="+id;
		_classhere('plays')[0].innerHTML++;
		_id("playerplay").value=1;		
		_id('player2').autoplay = true;
		_class('sidenav').style.left='0';}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	_id("service").src = "services/stats.php?copy=music&musicID=<?php echo $songID ?>";
	_classhere('share')[0].innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=music&musicID=<?php echo $songID ?>";
	_classhere('share')[0].innerHTML++;
	window.open(url, '_blank')}
function download(id,q) {
	if(q!='hq'){_id('intiating').style.top='0';}
	_classhere('plays')[1].innerHTML++;
	_id("service").src = "services/stats.php?downID="+id+"&q="+q;}
window.onload = function() {
  	_id('title1').innerHTML='Preview of <?php echo $songTitle.' By '.$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }  if($songProducer){echo " Prod by ".$songProducer; }?>- on GreenboxNigeria.com';
	_id('description').content='Preview, lsiten and download <?php echo $songTitle." By ".$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }; if($songProducer){echo ", Prod by ".$songProducer; } ?>';
	_id('keywords').content='latest , fresh, new, Nigerian music, Nigerian songs, Nigerian tracks,<?php echo $songTitle.', '.$songArtist; if($songArtistFt){echo ",".$songArtistFt; }  if($songProducer){echo ", ".$songProducer; }?>';
	top.document.getElementById('intiating').style.top='-2000';
	}
</script>
</body>
</html>

<?php }else{?>

<body style="background:#000; color:#FFF">

<table align="center" style=" width:;background:url(songsimg/<?php echo $songArt ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2; opacity:.4"><tr><td>
</td></tr></table>
<div style="font-size:2em; text-align:center"><?php echo $songTitle ?> - <?php echo $songArtist ?>
<div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<?php if($songRating>3){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div> ";} ?>
<?php if($songRating>4){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>";} ?>
</div></div>
<table align="center" style=" height:300px;width:750px;"><tr valign="middle"><td align="center">

<div style="padding:10px;background:url(songsimg/<?php echo $songArt ?>) center no-repeat;background-size:cover; width:300px; height:300px; vertical-align:middle"></div>
<table style="color:##FFF"><tr>

<td style="width:30%;" align="right">
<br>
<a href='<?php echo "songs/$songURL"; ?>' download><div onClick="download('<?php echo $songID; ?>', 'lq');">
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF; margin-top:20px"><tr><td align="center">
<table style="background:url(images/download.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%" id="played"></td></tr></table>
</td></tr></table></div></a>
<span style="color:#FFF; font-size:.6em; font-weight:900">DOWNLOAD I</span>
</td>
<td align="center"onClick="play('<?php echo $songTitle; ?>','<?php echo "songs/".$songURL; ?>','<?php echo "songsimg/".$songArt; ?>','<?php echo $songArtist; ?>','<?php echo $songArtistFt; ?>','<?php echo $songProducer; ?>','<?php echo $songAlbum; ?>','<?php echo $songID; ?>','<?php echo $songYear; ?>')">

<table style="width:70px; height:70px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF; margin-top:20px"><tr><td align="center">
<table style="background:url(images/play.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%" id="played"></td></tr></table>
</td></tr></table>
</td>

<td style="width:30%" align="left">
<br>
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF; margin-top:20px"onClick="download('<?php echo $songID; ?>', 'hq')"><tr><td align="center">
<table style="background:url(images/download.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"  id="played"></td></tr></table>
</td></tr></table>
<span style="color:#FFF; font-size:.6em; font-weight:900">DOWNLOAD II</span>
</td>
</tr></table>


</td>
<td>


<table style="font-size:.8em"><tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Title</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $songTitle ?></td></tr>
<tr><td style="padding:0 5px; width:48%; text-align:right">Artist</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songArtist ?></td></tr>
<?php if($songArtistFt) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Featured</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $songArtistFt ?></td></tr><?php }?>
<?php if($songProducer) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Producer</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songProducer?>&c=producer','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songProducer ?></td></tr><?php }?>

<?php if($songAlbum != '' && $songAlbum != 'single' && $songAlbum != 'cover' && $songAlbum != 'mixtape'){?>
<td style="padding:0 5px; width:48%; text-align:right">Album</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songAlbum ?></td></tr><?php }?>
<?php if ($songGenre=='RandB'){$songGenre='R&amp;B';}?>
<?php if($songGenre) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Genre</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songGenre?>&c=genre','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songGenre ?></td></tr><?php }?>
<?php if($songLanguage) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Language</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songLanguage?>&c=language','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songLanguage ?></td></tr><?php }?>

<tr><td style="padding:0 5px; width:48%; text-align:right">Duration</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $songLenght ?></td></tr>
<?php if($songYear) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Year</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left" onClick="window.open('musiclist.php?t=<?php echo $songYear?>&c=year','_self');top.document.getElementById('intiating').style.top='0';"><?php echo $songYear ?></td></tr><?php }?>

<tr><td style="padding:0 5px; width:48%; text-align:right">Size</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php  echo number_format($songSize/1024/1024) ."mb" ?></td>
</tr></table>

</td></tr></table>
<br><br><br><br><br>

<?php
$pagetitle="Preview $songArtist - $songTitle";
if($songArtistFt){$pagetitle.=" ft songArtistFt";}
if($songProducer){$pagetitle.=", Prod. by $songProducer";}
$pagetitle."= on GreenboxNigeria%20";

str_replace(' ', '-', $pagetitle);
$songdesc=substr_replace($songDescription,'..',50)
?>

<table style="text-align:center; width:500px" align="center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/music-<?php echo $songURL ?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>&text=<?php echo $pagetitle ?>%20gbngr.com/archive/music-<?php echo $songURL ?>-tt')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/music-<?php echo $songURL ?>-gg')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/gg.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td align='center'>
<div style='width:50px; height:50px'onclick="copyToClipboard('gbngr.com/archive/music-<?php echo $songURL ?>-gp')">
<table style="width:50px; height:50px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;" align="center"><tr><td align="center">
<table style="background:url(images/url.png) center no-repeat; background-size:contain; width:40px; height:40px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>-in&title=<?php echo $pagetitle ?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/songsimg/<?php echo $songArt?>&url=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>-pi&is_video=false&description=<?php echo $songdesc?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=musicpreview.php?songed=<?php echo $songURL ?>-tb&title=<?php echo $pagetitle ?>&caption=<?php echo $songdesc?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>

<br><div style="font-size:.9em; text-align:center"><?php echo $songDescription ?></div><br>

<table><tr><td><br>Comments</td></tr></table>
<table style="padding:10px; width:98%;"><tr valign="top"><td style="padding:10px; width:50%;">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='music' AND comment_cat_id='$songID'");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:90%; height:;color:#FFF;margin-top:10px;background:#222;font-size:.8em;'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px'>$comment</td></tr></table>
"; }?>

</td><td align="right">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous_desktop' OR $anonymousName!='anonymous_mobile')echo $anonymousName?>" class="commenter" style="color:#FFF; background:#222"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $songID ?>"><input type="hidden" name="t" value="<?php echo $songID ?>"></form>
<br><br>

<table><tr><td width="33%">Plays :</td><td>Downloads :</td><td width="33%">Shares :</td></tr>
<tr><td class="plays" align="center" style="background:none; color:#FFF"><?php echo $songPlay?></td>
<td class="plays" align="center" style="background:none; color:#FFF"><?php echo $songDownload ?></td>
<td class="share" align="center"><?php echo $shares ?></td></tr></table>
<br>
</td></tr></table>


<script>
function _id(el){return top.document.getElementById(el);}
function _class(el){return top.document.getElementsByClassName(el)[0];}
function __class(el){return top.document.getElementsByClassName(el)[1];}
function _classhere(el){return document.getElementsByClassName(el);}
function play(title, url, art,  artist, artistft, producer, album, id, year){
  	_id('title1').innerHTML='streaming <?php echo $songTitle.' By '.$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }  if($songProducer){echo " Prod by ".$songProducer; }?>- on GreenboxNigeria.com';
	_id('description').content='Preview, lsiten and download <?php echo $songTitle." By ".$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }; if($songProducer){echo ", Prod by ".$songProducer; } ?>';
	_id('keywords').content='latest , fresh, new, Nigerian music, Nigerian songs, Nigerian tracks,<?php echo $songTitle.', '.$songArtist; if($songArtistFt){echo ",".$songArtistFt; }  if($songProducer){echo ", ".$songProducer; }?>';
		_id('player2').src= url;
		_class('playerart').style.background = 'url('+art+') center no-repeat';
		_class('playerart').style.backgroundSize = 'cover';
		__class('playerart').style.background = 'url('+art+') center no-repeat';
		__class('playerart').style.backgroundSize = 'cover';
		xxx="<table style='text-align:center; font-size:.8em; font-weight:700;height:20px'><tr><td colspan='2'><?php echo $songTitle ?></td></tr><tr><td><?php echo $songArtist ?><?php if($songArtistFt){echo " ft ".$songArtistFt;} ?></td></tr><tr><td colspan='2'><?php echo $songProducer ?></td></tr></table>";
		_class('playertitle').innerHTML = __class('playertitle').innerHTML = xxx;
		_id('playerrating').innerHTML="<table style='width:100px' align='center'><tr><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><?php if($songRating>3){?><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><?php }?><?php if($songRating>4){?><td style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;'></td><?php }?></tr></table>";
		_id('played1').style.background = 'url(images/buffer1.png) center no-repeat';
		_id('played1').style.backgroundSize = 'contain'
		_id('played').style.background = 'url(images/buffer1.png) center no-repeat';
		_id('played').style.backgroundSize = 'contain'
		_id('art').value=id;
		_id("service").src = "services/stats.php?play="+id;
		_classhere('plays')[0].innerHTML++;
		_id("playerplay").value=1;		
		_id('player2').autoplay = true;
		_class('sidenav').style.left='0';}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	_id("service").src = "services/stats.php?copy=music&musicID=<?php echo $songID ?>";
	_classhere('share')[0].innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=music&musicID=<?php echo $songID ?>";
	_classhere('share')[0].innerHTML++;
	window.open(url, '_blank')}
function download(id,q) {
	if(q!='hq'){_id('intiating').style.top='0';}
	_classhere('plays')[1].innerHTML++;
	_id("service").src = "services/stats.php?downID="+id+"&q="+q;}
window.onload = function() {
  	_id('title1').innerHTML='Preview of <?php echo $songTitle.' By '.$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }  if($songProducer){echo " Prod by ".$songProducer; }?>- on GreenboxNigeria.com';
	_id('description').content='Preview, lsiten and download <?php echo $songTitle." By ".$songArtist; if($songArtistFt){echo "Ft".$songArtistFt; }; if($songProducer){echo ", Prod by ".$songProducer; } ?>';
	_id('keywords').content='latest , fresh, new, Nigerian music, Nigerian songs, Nigerian tracks,<?php echo $songTitle.', '.$songArtist; if($songArtistFt){echo ",".$songArtistFt; }  if($songProducer){echo ", ".$songProducer; }?>';
	}
</script>

</body>
</html>

<?php }?>