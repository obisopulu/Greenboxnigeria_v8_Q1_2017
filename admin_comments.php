<?php include("rab_dbcon.php");
	extract($_GET);
	if($c){mysqli_query($cxn, "DELETE FROM comment WHERE comment_id='$c' LIMIT 1");}
	$today = date("Y-m-d"); 
	$sql = mysqli_query($cxn, "SELECT * FROM member ORDER BY memberID DESC LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);}
	$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE  personStageName='$memberStageName' ORDER BY personID DESC LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);}
	?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php 
$today = date("Y-m-d"); 
if ($detect->isMobile()){
?>
<table><tr><td>Comments</td></tr><tr><td align="center">

<table style="width:98.7%">
<?php date("F n, Y");
	$sql = mysqli_query($cxn, "SELECT * FROM comment ORDER BY comment_id DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;
if($comment_cat=='music'){$sql1 = mysqli_query($cxn, "SELECT * FROM songs WHERE songID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$songTitle - $songArtist";}
if($comment_cat=='label'){$sql1 = mysqli_query($cxn, "SELECT * FROM labels WHERE labelID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$labelName";}
if($comment_cat=='album'){
	$title="$comment_cat_id";}
if($comment_cat=='blog'){$sql1 = mysqli_query($cxn, "SELECT * FROM blog WHERE blogID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$blogName";}
if($comment_cat=='person'){$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE personID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$personStageName";}
if($comment_cat=='video'){$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE personID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$videoTitle - $videoArtist";}


echo "<tr class='stats1' style='border-bottom:thin solid #DDD'>
<td style='padding-top:20px'>$comment_timestamp<br>$title<br>
$commenter<br>
$comment<br>
$comment_cat

<div style='background:#EEE' onClick=".'"'."window.open('admin_comments.php?c=$comment_id','_self')".'"'." align='center'>DELETE</div></td>
</tr>";}?>
</table>
<br>
</td></tr></table>

<?php }else{

?>
<table style="font-size:.8em"><tr><td class="tab1">Comments</td></tr><tr><td align="center">

<table style="width:98.7%"><tr>
<td class="stats">Date</td>
<td class="stats">Commenter</td>
<td class="stats" style="width:30%">Comment</td>
<td class="stats">Where</td>
<td class="stats">Title</td>
<td class="stats"></td>
</tr>
<?php date("F n, Y");
	$sql = mysqli_query($cxn, "SELECT * FROM comment ORDER BY comment_id DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;
if($comment_cat=='music'){$sql1 = mysqli_query($cxn, "SELECT * FROM songs WHERE songID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$songTitle - $songArtist";}
if($comment_cat=='label'){$sql1 = mysqli_query($cxn, "SELECT * FROM labels WHERE labelID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$labelName";}
if($comment_cat=='album'){
	$title="$comment_cat_id";}
if($comment_cat=='blog'){$sql1 = mysqli_query($cxn, "SELECT * FROM blog WHERE blogID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$blogName";}
if($comment_cat=='person'){$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE personID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$personStageName";}
if($comment_cat=='video'){$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE personID='$comment_cat_id' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);} $title="$videoTitle - $videoArtist";}


echo "<tr class='stats1' style='border-bottom:thin solid #DDD'>
<td>$comment_timestamp</td>
<td>$commenter</td>
<td>$comment</td>
<td>$comment_cat_id</td>
<td>$title</td>
<td style='height:100%;background:#EEE' onClick=".'"'."window.open('admin_comments.php?c=$comment_id','_self')".'"'." align='center'>DELETE</td>
</tr>";}?>
</table>
<br>
</td></tr></table>
<?php } ?>
</body>
</html>