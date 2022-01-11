<?php include("rab_dbcon.php");$today = date("Y-m-d"); 	extract($_POST); 	extract($_GET);$blogTimestamp=date("F j, Y.");


	$blogName = htmlspecialchars($blogName);
	$blogWriteup = htmlspecialchars($blogWriteup);
	$blogTag1 = htmlspecialchars($blogTag1);
	$blogTag2 = htmlspecialchars($blogTag2);
	$blogTag3 = htmlspecialchars($blogTag3);
	$blogTag4 = htmlspecialchars($blogTag4);
	$blogTag5 = htmlspecialchars($blogTag5);
	if($b){mysqli_query($cxn, "DELETE FROM blog WHERE blogID='$b' LIMIT 1");}
	if($xxxx){mysqli_query($cxn, "UPDATE blog SET blogName='$blogName', blogWriteup='$blogWriteup', blogTag1='$blogTag1', blogTag2='$blogTag2', blogTag3='$blogTag3', blogTag4='$blogTag4', blogTag5='$blogTag5', blogSource='$blogSource' WHERE blogID='$xxxx'")or die("hdbfjbdsjbfjds ");}
	if($xxx=='xxx'){
		$blogPic = str_replace(' ','_',"art_".$blogName.".png"); 
		move_uploaded_file($_FILES['blogPic']['tmp_name'], "blogimg/$blogPic");
		
		mysqli_query($cxn, "INSERT INTO blog (blogID, blogName, blogPic, blogWriteup, blogTag1, blogTag2, blogTag3, blogTag4, blogTag5, blogSource, blogTimestamp, dateUpdated) VALUES (NULL, '$blogName', '$blogPic', '$blogWriteup', '$blogTag1', '$blogTag2', '$blogTag3', '$blogTag4', '$blogTag5', '$blogSource', '$blogTimestamp', '$today')")or die("hdbfjbdsjbfjds ");}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<style type="text/css" media="all">@import "style/widgEditor.css";</style>
<script type="text/javascript" src="scirpt/widgEditor.js"></script>
</head>
<body>

<?php if ($detect->isMobile()){?>

<table><tr><td>&nbsp;&nbsp;&nbsp;Blog</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM blog WHERE  blogID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td>
<input type="text" placeholder="Title" maxlength="300" class="commenter" style="width:97%;"  name="blogName" value="<?php echo $blogName ;?>">
</td></tr><tr><td>
<input type="text" placeholder="Source" maxlength="100" class="commenter" style="width:96%;"  name="blogSource" value="<?php echo $blogSource ;?>">
</td></tr><tr><td style=" background:#787878">
<textarea name='blogWriteup' class='widgEditor nothing'  required><?php echo $blogWriteup ;?></textarea></td></tr><tr><td width="20%">
<input type="text" placeholder="Tag 1" maxlength="15" class="commenter" style="width:93%;"  name="blogTag1" value="<?php echo $blogTag1 ;?>">
</td></tr><tr><td>
<input type="text" placeholder="Tag 2" maxlength="15" class="commenter" style="width:93%;"  name="blogTag2" value="<?php echo $blogTag2 ;?>">
</td></tr><tr><td>
<input type="text" placeholder="Tag 3" maxlength="15" class="commenter" style="width:93%;"  name="blogTag3" value="<?php echo $blogTag3 ;?>">
</td></tr><tr><td>
<input type="text" placeholder="Tag 4" maxlength="15" class="commenter" style="width:93%;"  name="blogTag4" value="<?php echo $blogTag4 ;?>">
</td></tr><tr><td>
<input type="text" placeholder="Tag 5" maxlength="15" class="commenter" style="width:93%;"  name="blogTag5" value="<?php echo $blogTag5 ;?>">
</td></tr><tr><td>

<input type="submit" value="Edit" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxxx" value="<?php echo $blogID ;?>">
</td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td>
<input type="text" placeholder="Title" maxlength="300" class="commenter" style="width:97%;"  name="blogName">
</td></tr><tr><td>
Article Pic <input type="file" style="width:70%;"  name="blogPic" accept="image/*">
</td></tr><tr><td>
<input type="text" placeholder="Source" maxlength="100" class="commenter" style="width:92%;"  name="blogSource"></td></tr><tr><td style=" background:#787878">
<textarea name='blogWriteup' class='widgEditor nothing'  required></textarea></td></tr><tr><td>
<input type="text" placeholder="Tag 1" maxlength="15" class="commenter" style="width:93%;"  name="blogTag1"></td></tr><tr><td>
<input type="text" placeholder="Tag 2" maxlength="15" class="commenter" style="width:93%;"  name="blogTag2"></td></tr><tr><td>
<input type="text" placeholder="Tag 3" maxlength="15" class="commenter" style="width:93%;"  name="blogTag3"></td></tr><tr><td>
<input type="text" placeholder="Tag 4" maxlength="15" class="commenter" style="width:93%;"  name="blogTag4"></td></tr><tr><td>
<input type="text" placeholder="Tag 5" maxlength="15" class="commenter" style="width:93%;"  name="blogTag5"></td></tr><tr><td>

<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxx" value="xxx">
</td></tr></table>
</form>

<?php }?>
<br>
<table style="width:98.7%; font-size:.8em;text-align:center">
<?php
	$sql = mysqli_query($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;
$blogTimestamp = htmlspecialchars_decode($blogTimestamp);
$blogName = htmlspecialchars_decode($blogName);
$blogSource = htmlspecialchars_decode($blogSource);
if($a==0){?><tr style='border-bottom:thin solid #AAA; font-size:.8em'><?php echo "
<td>$blogTimestamp<br><span style='font-size:1.4em'>$blogName</span><br>$blogSource</td>
<td style='width:20%; cursor:pointer' onClick=".'"'."window.open('admin_blog.php?edit=$blogID','_self')".'"'.">EDIT</td>
<td style='height:30px;cursor:pointer' onClick=".'"'."window.open('admin_blog.php?b=$blogID','_self')".'"'.">DELETE</td>
</tr>
";}$counter++;}?>
</table>
<br>
</td></tr></table>

<?php }else{?>

<table><tr><td>&nbsp;&nbsp;&nbsp;Blog</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM blog WHERE  blogID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td colspan="3">
<input type="text" placeholder="Title" maxlength="300" class="commenter" style="width:97%;"  name="blogName" value="<?php echo $blogName ;?>">
</td><td colspan="2">
<input type="text" placeholder="Source" maxlength="100" class="commenter" style="width:96%;"  name="blogSource" value="<?php echo $blogSource ;?>">
</td></tr><tr><td colspan="5">
<textarea name='blogWriteup' class='widgEditor nothing'  required><?php echo $blogWriteup ;?></textarea></td></tr><tr><td width="20%">
<input type="text" placeholder="Tag 1" maxlength="15" class="commenter" style="width:93%;"  name="blogTag1" value="<?php echo $blogTag1 ;?>">
</td><td width="20%">
<input type="text" placeholder="Tag 2" maxlength="15" class="commenter" style="width:93%;"  name="blogTag2" value="<?php echo $blogTag2 ;?>">
</td><td width="20%">
<input type="text" placeholder="Tag 3" maxlength="15" class="commenter" style="width:93%;"  name="blogTag3" value="<?php echo $blogTag3 ;?>">
</td><td width="20%">
<input type="text" placeholder="Tag 4" maxlength="15" class="commenter" style="width:93%;"  name="blogTag4" value="<?php echo $blogTag4 ;?>">
</td><td width="20%">
<input type="text" placeholder="Tag 5" maxlength="15" class="commenter" style="width:93%;"  name="blogTag5" value="<?php echo $blogTag5 ;?>">
</td></tr><tr><td colspan="5">

<input type="submit" value="Edit" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxxx" value="<?php echo $blogID ;?>">
</td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td colspan="3">
<input type="text" placeholder="Title" maxlength="300" class="commenter" style="width:97%;"  name="blogName"></td><td>
Article Pic <input type="file" style="width:70%;"  name="blogPic" accept="image/*"></td><td>
<input type="text" placeholder="Source" maxlength="100" class="commenter" style="width:92%;"  name="blogSource"></td></tr><tr><td colspan="5" style=" background:#787878">
<textarea name='blogWriteup' class='widgEditor nothing'  required></textarea></td></tr><tr><td width="20%">
<input type="text" placeholder="Tag 1" maxlength="15" class="commenter" style="width:93%;"  name="blogTag1"></td><td width="20%">
<input type="text" placeholder="Tag 2" maxlength="15" class="commenter" style="width:93%;"  name="blogTag2"></td><td width="20%">
<input type="text" placeholder="Tag 3" maxlength="15" class="commenter" style="width:93%;"  name="blogTag3"></td><td width="20%">
<input type="text" placeholder="Tag 4" maxlength="15" class="commenter" style="width:93%;"  name="blogTag4"></td><td width="20%">
<input type="text" placeholder="Tag 5" maxlength="15" class="commenter" style="width:93%;"  name="blogTag5"></td></tr><tr><td colspan="5">

<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxx" value="xxx">
</td></tr></table>
</form>

<?php }?>

<table style="width:98.7%; font-size:.8em"><tr>
<td>Time</td>
<td>Title</td>
<td>Source</td>
<td width="5%">Edit</td>
<td width="5%">Delete</td>
</tr>
<?php
	$sql = mysqli_query($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;
$blogTimestamp = htmlspecialchars_decode($blogTimestamp);
$blogName = htmlspecialchars_decode($blogName);
$blogSource = htmlspecialchars_decode($blogSource);
if($a==0){echo "<tr style='border-bottom:thin solid #AAA'>
<td>$blogTimestamp</td>
<td>$blogName</td>
<td>$blogSource</td>
<td style='height:30px;background:#33F;cursor:pointer' onClick=".'"'."window.open('admin_blog.php?edit=$blogID','_self')".'"'.">&raquo;</td>
<td style='height:30px;background:#F33;cursor:pointer' onClick=".'"'."window.open('admin_blog.php?b=$blogID','_self')".'"'.">&chi;</td>
</tr>
";}$counter++;}?>
</table>
<br>
</td></tr></table>

<?php } ?>


</body>
</html>