<?php include("rab_dbcon.php");

extract($_GET);
$blogged=str_replace('___', ' ', $blogged);
$blogged=str_replace('__', ' ', $blogged);
$blogged=str_replace('_', ' ', $blogged);
 if($blogged){$sql = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogName='$blogged' LIMIT 1");}elseif($blogID){
	 $sql = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogID='$blogID' LIMIT 1");}else{header("location: index.php");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','blog: $blogName',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'blog' ,'$id' ,'$date_updated')") or die("result no work 10");}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
<style>
.seemore{margin:0 2px; display:inline-block; width:auto}
</style>
</head>
<?php if ($detect->isMobile()){ ?>
<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center">
<?php
echo"
<div class='blogtimestamp' style='text-align:right'>";echo htmlspecialchars_decode($blogTimestamp);echo "</div>
<table align='center' style='background:url(blogimg/$blogPic) center no-repeat; background-size:cover;width:300px; height:300px;><tr valign='middle'><td></td></tr></table><br>
<table><tr><td style='font-size:2em; font-weight:100;text-align:center'>";echo htmlspecialchars_decode($blogName);echo "</td></tr></table>
<table><tr><td><div class='blogwriteup'>";echo htmlspecialchars_decode($blogWriteup);echo "</div><br></td></tr></table>";
?>
<table style="text-align:center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/article-<?php echo str_replace(' ', '_', $blogName );?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-tt')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/article-<?php echo str_replace(' ', '_', $blogName );?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria.com&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>-tb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td></tr></table>



<?php if($blogSource){echo"<table style='width:98%'><tr><td><div class='blogtype'>source:</div>";echo htmlspecialchars_decode($blogSource);echo "</td><td align='right'></td></tr></table>";}?><br>
<table><tr><td align="center">
<?php 
if($blogTag1){?><table onClick="pager('blog.php?key=$blogTag1')" class='seemore'><tr><td><?php echo $blogTag1?></td></tr></table><?php }
if($blogTag2){?><table onClick="pager('blog.php?key=$blogTag2')" class='seemore'><tr><td><?php echo $blogTag2?></td></tr></table><?php }
if($blogTag3){?><table onClick="pager('blog.php?key=$blogTag3')" class='seemore'><tr><td><?php echo $blogTag3?></td></tr></table><?php }
if($blogTag4){?><table onClick="pager('blog.php?key=$blogTag4')" class='seemore'><tr><td><?php echo $blogTag4?></td></tr></table><?php }
if($blogTag5){?><table onClick="pager('blog.php?key=$blogTag5')" class='seemore'><tr><td><?php echo $blogTag5?></td></tr></table><?php }?>
</td></tr></table>
<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top">
<td align="center">
Add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" required  name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/ style="color:#FFF; background:#222"><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  required  name="comment" style="color:#FFF; background:#222">
<br><br>
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $blogID ?>"><input type="hidden" name="blogID" value="<?php echo $blogID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='blog' AND comment_cat_id='$blogID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:98%; margin-top:10px;background:#222;font-size:; border-bottom:thin solid #000; color:#FFF; font-size:.8em'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right;color:#FFF'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px;color:#FFF'>$comment</td></tr></table>
"; }?>
</td></tr></table>
<table style="width:200px"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'blog $blogName'") or die('xxx2');echo mysqli_num_rows($sqls); ?></td></tr></table>
<br>
<br>
<br>
<br>
</td></tr></table>
<script>
function pager(x){
		window.open(x,'_self');
		top.document.getElementById('intiating').style.top='0';
	}
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=blog&blog=<?php echo $blogName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/article-<?php echo str_replace(' ', '_', $blogName );?>-gp");
	_id("service").src = "services/stats.php?copy=blog&blog=<?php echo $blogName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $blogName ?> via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }else{ ?>
	
<body style="background:#EEE">
<?php
echo"
<div class='blogtimestamp' style='text-align:right'>";echo htmlspecialchars_decode($blogTimestamp);echo "</div>
<table align='center' style='background:url(blogimg/$blogPic) center no-repeat; background-size:cover;width:300px; height:300px;><tr valign='middle'><td></td></tr></table><br>
<table><tr><td style='font-size:2em; font-weight:100;text-align:center'>";echo htmlspecialchars_decode($blogName);echo "</td></tr></table>
<table><tr><td><div class='blogwriteup'>";echo htmlspecialchars_decode($blogWriteup);echo "</div><br></td></tr></table>";
?>
<table style="text-align:center; width:400px" align="center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/article-<?php echo str_replace(' ', '_', $blogName );?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-tt')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/article-<?php echo str_replace(' ', '_', $blogName );?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=blogarticle.php?blogged=<?php echo str_replace(' ', '_', $blogName );?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria.com&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>-tb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td></tr></table>



<?php if($blogSource){echo"<table style='width:98%'><tr><td><div class='blogtype'>source:</div>$blogSource</td><td align='right'></td></tr></table>";}?><br>
<table><tr><td align="center">
<?php 
if($blogTag1){?><table onClick="pager('blog.php?key=<?php echo $blogTag1?>')" class='seemore'><tr><td><?php echo $blogTag1?></td></tr></table><?php }
if($blogTag2){?><table onClick="pager('blog.php?key=<?php echo $blogTag2?>')" class='seemore'><tr><td><?php echo $blogTag2?></td></tr></table><?php }
if($blogTag3){?><table onClick="pager('blog.php?key=<?php echo $blogTag3?>')" class='seemore'><tr><td><?php echo $blogTag3?></td></tr></table><?php }
if($blogTag4){?><table onClick="pager('blog.php?key=<?php echo $blogTag4?>')" class='seemore'><tr><td><?php echo $blogTag4?></td></tr></table><?php }
if($blogTag5){?><table onClick="pager('blog.php?key=<?php echo $blogTag5?>')" class='seemore'><tr><td><?php echo $blogTag5?></td></tr></table><?php }?>
</td></tr></table>
<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top">
<td align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='blog' AND comment_cat_id='$blogID' ORDER BY comment_id DESC");
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
<input type="submit" value="Comment" class="commentbutton" style="color:#FFF; background:#222"/><input type="hidden" name="id" value="<?php echo $blogID ?>"><input type="hidden" name="blogID" value="<?php echo $blogID ?>"></form>
</td></tr></table>
<br><br>
<table style="width:200px" align="center"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'blog $blogName'") or die('xxx2');echo mysqli_num_rows($sqls); ?></td></tr></table>
<br>
<script>
function pager(x){
		window.open(x,'_self');
	}
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=blog&blog=<?php echo $blogName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/article-<?php echo str_replace(' ', '_', $blogName );?>-gp");
	_id("service").src = "services/stats.php?copy=blog&blog=<?php echo $blogName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $blogName ?> via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }?>