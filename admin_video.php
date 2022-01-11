<?php include("rab_dbcon.php");$today = date("Y-m-d"); 	extract($_POST); 	extract($_GET);$blogTimestamp=date("h:ia, F j, Y.");
if ($detect->isMobile()){
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_back_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
</head>
<body>

</body>
</html>
<?php }else{


	if($v){mysqli_query($cxn, "DELETE FROM videos WHERE videoID='$v' LIMIT 1");}
	if($xxxx){mysqli_query($cxn, "UPDATE blog SET videoTitle='$videoTitle', videoArtist='$videoArtist', videoArtistFt='$videoArtistFt', videoDirector='$videoDirector', videoRating='$videoRating', videoPic='$videoPic', videoSRC='$videoSRC', videoDownloadSRC='$videoDownloadSRC', videoDescription='$videoDescription' WHERE videoID='$xxxx'")or die("hdbfjbdsjbfjds ");}
	if($xxx=='xxx'){
		$videoPic = str_replace(' ','_',"art_".$videoTitle.".png"); 
		move_uploaded_file($_FILES['videoPic']['tmp_name'], "videosimg/$videoPic");
		mysqli_query($cxn, "INSERT INTO videos (videoID, videoTitle, videoArtist, videoArtistFt, videoDirector, videoRating, videoPic, videoSRC, videoDownloadSRC, videoDownload, videoDescription, dateUpdated) VALUES (NULL, '$videoTitle', '$videoArtist', '$videoArtistFt', '$videoDirector', '$videoRating', '$videoPic', '$videoSRC', '$videoDownloadSRC', '$videoDownload', '$videoDescription', '$today')")or die("hdbfjbdsjbfjds ");}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/back_cascade.css" rel="stylesheet" type="text/css"/>
<style type="text/css" media="all">@import "style/widgEditor.css";</style>
<script type="text/javascript" src="scirpt/widgEditor.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;"><tr><td class="tab1">Videos</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM videos WHERE  videoID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr><td colspan="3">
<input type="text" placeholder="Title" maxlength="200" class="commenter" style="width:97%;"  name="videoTitle" value="<?php echo $videoTitle ;?>"></td><td>
Video Art <input type="file" style="background:#222;width:70%; opacity:	; background:#222"  name="videoPic" accept="image/*" value="<?php echo $videoPic ;?>"></td><td>
<input type="text" placeholder="Artist" maxlength="50" class="commenter" style="width:93%;"  name="videoArtist" value="<?php echo $videoArtist ;?>"></td></tr><tr><td colspan="5">
<textarea name='videoDescription' placeholder="Description" class='widgEditor nothing'  required><?php echo $videoDescription ;?></textarea></td></tr><tr><td width="20%">
<input type="text" placeholder="Artist Featured" maxlength="200" class="commenter" style="width:93%;"  name="videoArtistFt" value="<?php echo $videoArtistFt ;?>"></td><td width="20%">
<input type="text" placeholder="Director" maxlength="100" class="commenter" style="width:93%;"  name="videoDirector" value="<?php echo $videoDirector ;?>"></td><td width="20%">
<input type="number" min="3" max="5" placeholder="Rating" maxlength="1" class="commenter" style="width:93%;"  name="videoRating" value="<?php echo $videoRating ;?>"></td><td width="20%">
<input type="text" placeholder="Link" maxlength="200" class="commenter" style="width:93%;"  name="videoSRC" value="<?php echo $videoSRC ;?>"></td><td width="20%">
<input type="text" placeholder="Download Link" maxlength="1000" class="commenter" style="width:92%;"  name="videoDownloadSRC" value="<?php echo $videoDownloadSRC ;?>"></td></tr><tr><td colspan="5">

<input type="submit" value="Edit" class="commentbutton" style="width:100%;; background:#444"/>
<input type="hidden" name="xxxx" value="<?php echo $videoID ;?>">
</td></tr></table>
</form>
<?php }}else{?>
<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr><td colspan="3">
<input type="text" placeholder="Title" maxlength="200" class="commenter" style="width:97%;"  name="videoTitle"></td><td>
Video Art <input type="file" style="background:#222;width:70%; opacity:	; background:#222"  name="videoPic" accept="image/*"></td><td>
<input type="text" placeholder="Artist" maxlength="50" class="commenter" style="width:93%;"  name="videoArtist"></td></tr><tr><td colspan="5">
<textarea name='videoDescription' placeholder="Description" class='widgEditor nothing'  required></textarea></td></tr><tr><td width="20%">
<input type="text" placeholder="Artist Featured" maxlength="200" class="commenter" style="width:93%;"  name="videoArtistFt"></td><td width="20%">
<input type="text" placeholder="Director" maxlength="100" class="commenter" style="width:93%;"  name="videoDirector"></td><td width="20%">
<input type="number" min="3" max="5" placeholder="Rating" maxlength="1" class="commenter" style="width:93%;"  name="videoRating"></td><td width="20%">
<input type="text" placeholder="Link" maxlength="200" class="commenter" style="width:93%;"  name="videoSRC"></td><td width="20%">
<input type="text" placeholder="Download Link" maxlength="1000" class="commenter" style="width:92%;"  name="videoDownloadSRC"></td></tr><tr><td colspan="5">

<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#444"/>
<input type="hidden" name="xxx" value="xxx">
</td></tr></table>
</form>

<?php }?>

<table style="width:98.7%" class="states"><tr>
<td class="stats">Time</td>
<td class="stats">Title</td>
<td class="stats">Artist</td>
<td class="stats" width="5%">Edit</td>
<td class="stats" width="5%">Delete</td>
</tr>
<?php
	$sql = mysqli_query($cxn, "SELECT * FROM videos ORDER BY videoID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;


if($a==0){echo "<tr class='stats1'>
<td>$dateUpated</td>
<td>$videoTitle</td>
<td>$videoArtist</td>
<td style='height:30px;background:#33F;cursor:pointer' onClick=".'"'."window.open('admin_video.php?edit=$videoID','_self')".'"'.">&raquo;</td>
<td style='height:30px;background:#F33;cursor:pointer' onClick=".'"'."window.open('admin_video.php?v=$videoID','_self')".'"'.">&chi;</td>
</tr>";}else{echo "<tr class='stats'>
<td>$dateUpated</td>
<td>$videoTitle</td>
<td>$videoArtist</td>
<td style='height:30px;background:#33F;cursor:pointer' onClick=".'"'."window.open('admin_video.php?edit=$videoID','_self')".'"'.">&raquo;</td>
<td style='height:30px;background:#F33;cursor:pointer' onClick=".'"'."window.open('admin_video.php?v=$videoID','_self')".'"'.">&chi;</td>
</tr>
";}$counter++;}?>
</table>
<br>
</td></tr></table>
</body>
</html>
<?php } ?>
