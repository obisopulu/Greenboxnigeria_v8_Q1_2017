<?php include("rab_dbcon.php");$today = date("Y-m-d"); 	extract($_POST); 	extract($_GET);

	if($l){mysqli_query($cxn, "DELETE FROM labels WHERE labelID='$l' LIMIT 1");}
	if($xxxx){mysqli_query($cxn, "UPDATE labels SET labelName='$labelName', labelOwner='$labelOwner', labelFounded='$labelFounded', labelHistory='$labelHistory', labelArtists='$labelArtists', labelProducers='$labelProducers', labelOthers='$labelOthers' WHERE labelID='$xxxx'")or die("hdbfjbdsjbfjds ");}
	if($xxx=='xxx'){
		$labelPic = str_replace(' ','_',"art_".$labelName.".png"); 
		move_uploaded_file($_FILES['labelPic']['tmp_name'], "labelsimg/$labelPic");
		mysqli_query($cxn, "INSERT INTO labels (labelID, labelName, labelPic, labelOwner, labelFounded, labelHistory, labelArtists, labelProducers, labelOthers, dateUpdated) VALUES (NULL, '$labelName', '$labelPic', '$labelOwner', '2000', '$labelHistory', '$labelArtists', '$labelProducers', '$labelOthers', '$today')")or die("hdbfjbdsjbfjds ");}
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

<?php
if ($detect->isMobile()){
?>

<table><tr><td class="tab1">Labels</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM labels WHERE  labelID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr><td>
<input type="text" placeholder="Title" maxlength="300" class="commenter" style="width:97%;"  name="labelName" value="<?php echo $labelName ?>"></td></tr><tr><td>
<input type="text" placeholder="Owner" maxlength="100" class="commenter" style="width:97%;"  name="labelOwner" value="<?php echo $labelOwner ?>"></td></tr><tr><td>
<textarea name='labelHistory' class='widgEditor nothing'  required><?php echo $labelHistory ?></textarea></td></tr><tr><td>
<input type="number" min="1900" max="2050" placeholder="Founded" maxlength="15" class="commenter" style="width:93%;"  name="labelFounded" value="<?php echo $labelFounded ?>"></td></tr><tr><td>
<input type="text" placeholder="Artists" maxlength="300" class="commenter" style="width:93%;"  name="labelArtists" value="<?php echo $labelArtists ?>"></td></tr><tr><td>
<input type="text" placeholder="Producers" maxlength="200" class="commenter" style="width:93%;"  name="labelProducers" value="<?php echo $labelProducers ?>"></td></tr><tr><td>
<input type="text" placeholder="Other Label Members" maxlength="200" class="commenter" style="width:93%;"  name="labelOthers" value="<?php echo $labelOthers ?>"></td></tr><tr><td>

<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>

<input type="hidden" name="xxxx" value="<?php echo $labelID ;?>">
</td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr><td>
<input type="text" placeholder="Title" maxlength="100" class="commenter" style="width:97%;"  name="labelName"></td></tr><tr><td>
Label Logo <input type="file"  name="labelPic" accept="image/*"></td></tr><tr><td>
<input type="text" placeholder="Owner" maxlength="100" class="commenter" style="width:93%;"  name="labelOwner"></td></tr><tr><td bgcolor="#BBB">
<textarea name='labelHistory' class='widgEditor nothing'  required></textarea></td></tr><tr><td>
<input type="number" min="1900" max="2050" placeholder="Founded" class="commenter" style="width:93%;"  name="labelFounded"></td></tr><tr><td>
<input type="text" placeholder="Artists" maxlength="300" class="commenter" style="width:93%;"  name="labelArtists"></td></tr><tr><td>
<input type="text" placeholder="Producers" maxlength="200" class="commenter" style="width:93%;"  name="labelProducers"></td></tr><tr><td>
<input type="text" placeholder="Other Label Members" maxlength="200" class="commenter" style="width:93%;"  name="labelOthers"></td></tr><tr><td>

<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxx" value="xxx">
</td></tr></table>
</form>
<?php }?>
<br><br>
<table style="width:98.7%; font-size:.8em; text-align:left" class="states"><tr>
<td class="stats" width="10%">Time</td>
<td class="stats">Name</td>
<td class="stats" width="5%"></td>
<td class="stats" width="5%"></td>
</tr>
<?php
	$sql = mysqli_query($cxn, "SELECT * FROM labels ORDER BY labelID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;

echo "<tr class='stats1' style='border-bottom:thin solid #CCC'>
<td>$dateUpdated</td>
<td>$labelName</td>
<td style='cursor:pointer; background:#EEE; width:20%' onClick=".'"'."window.open('admin_label.php?edit=$labelID','_self')".'"'." align='center'>EDIT</td>
<td style='cursor:pointer; background:#EEE; height:30px; width:20%' onClick=".'"'."window.open('admin_label.php?l=$labelID','_self')".'"'." align='center'>DELETE</td>
</tr>";}?>
</table>
<br>
</td></tr></table>

<?php }else{?>

<table><tr><td class="tab1">Labels</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM labels WHERE  labelID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr><td colspan="2">
<input type="text" placeholder="Title" maxlength="300" class="commenter" style="width:97%;"  name="labelName" value="<?php echo $labelName ?>"></td><td colspan="2">
<input type="text" placeholder="Owner" maxlength="100" class="commenter" style="width:97%;"  name="labelOwner" value="<?php echo $labelOwner ?>"></td></tr><tr><td colspan="4" bgcolor="#777">
<textarea name='labelHistory' class='widgEditor nothing'  required><?php echo $labelHistory ?></textarea></td></tr><tr><td width="25%">
<input type="number" min="1900" max="2050" placeholder="Founded" maxlength="15" class="commenter" style="width:93%;"  name="labelFounded" value="<?php echo $labelFounded ?>"></td><td width="25%">
<input type="text" placeholder="Artists" maxlength="300" class="commenter" style="width:93%;"  name="labelArtists" value="<?php echo $labelArtists ?>"></td><td width="25%">
<input type="text" placeholder="Producers" maxlength="200" class="commenter" style="width:93%;"  name="labelProducers" value="<?php echo $labelProducers ?>"></td><td width="25%">
<input type="text" placeholder="Other Label Members" maxlength="200" class="commenter" style="width:93%;"  name="labelOthers" value="<?php echo $labelOthers ?>"></td></tr><tr><td colspan="5">

<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>

<input type="hidden" name="xxxx" value="<?php echo $labelID ;?>">
</td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr><td colspan="2">
<input type="text" placeholder="Title" maxlength="100" class="commenter" style="width:97%;"  name="labelName"></td><td>
Article Pic <input type="file"  name="labelPic" accept="image/*"></td><td>
<input type="text" placeholder="Owner" maxlength="100" class="commenter" style="width:93%;"  name="labelOwner"></td></tr><tr><td colspan="4" bgcolor="#999">
<textarea name='labelHistory' class='widgEditor nothing'  required></textarea></td></tr><tr><td width="25%">
<input type="number" min="1900" max="2050" placeholder="Founded" class="commenter" style="width:93%;"  name="labelFounded"></td><td width="25%">
<input type="text" placeholder="Artists" maxlength="300" class="commenter" style="width:93%;"  name="labelArtists"></td><td width="25%">
<input type="text" placeholder="Producers" maxlength="200" class="commenter" style="width:93%;"  name="labelProducers"></td><td width="25%">
<input type="text" placeholder="Other Label Members" maxlength="200" class="commenter" style="width:93%;"  name="labelOthers"></td></tr><tr><td colspan="5">

<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxx" value="xxx">
</td></tr></table>
</form>
<?php }?>

<table style="width:98.7%; font-size:.8em; text-align:left" class="states"><tr>
<td class="stats" width="10%">Time</td>
<td class="stats">Name</td>
<td class="stats">CEO</td>
<td class="stats" width="5%"></td>
<td class="stats" width="5%"></td>
</tr>
<?php
	$sql = mysqli_query($cxn, "SELECT * FROM labels ORDER BY labelID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;

echo "<tr class='stats1' style='border-bottom:thin solid #CCC'>
<td>$dateUpdated</td>
<td>$labelName</td>
<td>$labelOwner</td>
<td style='cursor:pointer; background:#EEE' onClick=".'"'."window.open('admin_label.php?edit=$labelID','_self')".'"'." align='center'>EDIT</td>
<td style='cursor:pointer; background:#EEE' onClick=".'"'."window.open('admin_label.php?l=$labelID','_self')".'"'." align='center'>DELETE</td>
</tr>";}?>
</table>
<br>
</td></tr></table>

<?php } ?>
</body>
</html>