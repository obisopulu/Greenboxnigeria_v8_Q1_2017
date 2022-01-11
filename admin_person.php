<?php include("rab_dbcon.php");$today = date("Y-m-d"); 	extract($_POST); 	extract($_GET);?>

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
	if($p){mysqli_query($cxn, "DELETE FROM persons WHERE personID='$p' LIMIT 1");}
	if($xxxx){mysqli_query($cxn, "UPDATE persons SET personStageName='$personStageName', 'personBirthName=$personBirthName', 'personFanName=$personFanName', 'personGenre=$personGenre', 'personBirthDay=$personBirthDay', 'personBirthYear=$personBirthYear', 'personPlaceOfOrigin=$personPlaceOfOrigin', 'personProfession1=$personProfession1', 'personProfession2=$personProfession2', 'personProfession3=$personProfession3', 'personProfession4=$personProfession4', 'personCareerStartYear=$personCareerStartYear', 'personLabel=$personLabel', 'personLifeStory=$personLifeStory' WHERE personID='$xxxx'")or die("hdbfjbdsjbfjds ");}
	if($xxx=='xxx'){
		$personPic1 = str_replace(' ','_',"art_".$personStageName."1.png"); 
		move_uploaded_file($_FILES['personPic1']['tmp_name'], "personsimg/$personPic1");
		$personPic2 = str_replace(' ','_',"art_".$personStageName."2.png"); 
		move_uploaded_file($_FILES['personPic2']['tmp_name'], "personsimg/$personPic2");
		$personPic3 = str_replace(' ','_',"art_".$personStageName."3.png"); 
		move_uploaded_file($_FILES['personPic3']['tmp_name'], "personsimg/$personPic3");
		
		mysqli_query($cxn, "INSERT INTO persons (personID, personStageName, personBirthName, personFanName, personGenre, personBirthDay, personBirthYear, personPlaceOfOrigin, personProfession1, personProfession2, personProfession3, personProfession4, personCareerStartYear, personLabel, personLifeStory, personPic1, personPic2, personPic3, dateUpdated) VALUES (NULL, '$personStageName', '$personBirthName', '$personFanName', '$personGenre', '$personBirthDay', '$personBirthYear', '$personPlaceOfOrigin', '$personProfession1', '$personProfession2', '$personProfession3', '$personProfession4', '$personCareerStartYear', '$personLabel', '$personLifeStory', '$personPic1', '$personPic2', '$personPic3', '$today')")or die("hdbfjbdsjbfjds ");}
		
if ($detect->isMobile()){
?>

<table><tr><td>People</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM persons WHERE  personID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td>
<input type="text" placeholder="Stage Name" maxlength="100" class="commenter" style="width:92%;" name="personStageName" value="<?php echo $personStageName; ?>"></td></tr><tr><td>
<input type="text" placeholder="Birth Name" maxlength="100" class="commenter" style="width:92%;" name="personBirthName" value="<?php echo $personBirthName; ?>"></td></tr><tr><td>
<input type="text" placeholder="Fan Name" maxlength="100" class="commenter" style="width:92%;" name="personFanName" value="<?php echo $personFanName; ?>"></td></tr><tr><td>
<input type="text" placeholder="Birth Day" maxlength="100" class="commenter" style="width:62.5%;" name="personBirthDay" value="<?php echo $personBirthDay; ?>">
<input type="number" max="2055" min="1900" placeholder="Birth Year" maxlength="100" class="commenter" style="width:22%;"  name="personBirthYear" value="<?php echo $personBirthYear; ?>"></td></tr><tr><td>
<input type="text" placeholder="Profession 1" maxlength="100" class="commenter" style="width:92%;"  name="personProfession1" value="<?php echo $personProfession1; ?>"></td></tr><tr><td>
<input type="text" placeholder="Profession 2" maxlength="100" class="commenter" style="width:92%;"  name="personProfession2" value="<?php echo $personProfession2; ?>"></td></tr><tr><td>
<input type="text" placeholder="Profession 3" maxlength="100" class="commenter" style="width:92%;"  name="personProfession3" value="<?php echo $personProfession3; ?>"></td></tr><tr><td>
<input type="text" placeholder="Profession 4" maxlength="100" class="commenter" style="width:92%;"  name="personProfession4" value="<?php echo $personProfession4; ?>"></td></tr><tr><td>
<input type="text" placeholder="Genre" maxlength="100" class="commenter" style="width:92%;"  name="personGenre" value="<?php echo $personGenre; ?>"></td></tr><tr><td>
<input type="number" max="2055" min="1900" placeholder="Career Start Year" maxlength="100" class="commenter" style="width:92%;"  name="personCareerStartYear" value="<?php echo $personCareerStartYear; ?>"></td></tr><tr><td>
<input type="text" placeholder="Label" maxlength="100" class="commenter" style="width:92%;"  name="personLabel" value="<?php echo $personLabel; ?>"></td></tr><tr><td>
<input type="text" placeholder="Place Of Origin" maxlength="100" class="commenter" style="width:92%;"  name="personPlaceOfOrigin" value="<?php echo $personPlaceOfOrigin; ?>"></td></tr><tr><td style="background:#AAA">
<textarea name='personLifeStory' class='widgEditor nothing'  required><?php echo $personLifeStory; ?></textarea></td></tr><tr><td><br><input type="submit" value="Edit" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxxx" value="<?php echo $personID ;?>">
</td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td>
<input type="text" placeholder="Stage Name" maxlength="100" class="commenter" style="width:92%;"  name="personStageName"></td></tr><tr><td>
<input type="text" placeholder="Birth Name" maxlength="100" class="commenter" style="width:92%;"  name="personBirthName"></td></tr><tr><td>
<input type="text" placeholder="Fan Name" maxlength="100" class="commenter" style="width:92%;"  name="personFanName"></td></tr><tr><td>
<input type="text" placeholder="Birth Day" maxlength="100" class="commenter" style="width:62.5%;"  name="personBirthDay">
<input type="number" max="2055" min="1900" placeholder="Birth Year" maxlength="100" class="commenter" style="width:22%;"  name="personBirthYear"></td></tr><tr><td>
<input type="text" placeholder="Profession 1" maxlength="100" class="commenter" style="width:92%;"  name="personProfession1"></td></tr><tr><td>
<input type="text" placeholder="Profession 2" maxlength="100" class="commenter" style="width:92%;"  name="personProfession2"></td></tr><tr><td>
<input type="text" placeholder="Profession 3" maxlength="100" class="commenter" style="width:92%;"  name="personProfession3"></td></tr><tr><td>
<input type="text" placeholder="Profession 4" maxlength="100" class="commenter" style="width:92%;"  name="personProfession4"></td></tr><tr><td>
<input type="text" placeholder="Genre" maxlength="100" class="commenter" style="width:92%;"  name="personGenre"></td></tr><tr><td>
<input type="number" max="2055" min="1900" placeholder="Career Start Year" maxlength="100" class="commenter" style="width:92%;"  name="personCareerStartYear"></td></tr><tr><td>
<input type="text" placeholder="Label" maxlength="100" class="commenter" style="width:92%;"  name="personLabel"></td></tr><tr><td>
<input type="text" placeholder="Place Of Origin" maxlength="100" class="commenter" style="width:92%;"  name="personPlaceOfOrigin"></td></tr><tr><td style="background:#AAA">
<textarea name='personLifeStory' class='widgEditor nothing'  required></textarea></td></tr><tr><td>
Person Pic 1 <input type="file" style=";width:70%; opacity:	; "  name="personPic1" accept="image/*"></td></tr><tr><td>
Person Pic 2 <input type="file" style=";width:70%; opacity:	; "  name="personPic2" accept="image/*"></td></tr><tr><td>
Person Pic 3 <input type="file" style=";width:70%; opacity:	; "  name="personPic3" accept="image/*"></td></tr><tr><td><br>
<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxx" value="xxx">
</td></tr></table>
</form>
<br><br>
<?php }?>

<table style="width:98.7%; text-align:left; font-size:.8em"><tr>
<td class="stats">Time</td>
<td class="stats">Name</td>
<td class="stats" width="5%"></td>
<td class="stats" width="5%"></td>
</tr>
<?php
	$sql = mysqli_query($cxn, "SELECT * FROM persons ORDER BY personID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;

echo "<tr class='stats1'>
<td>$dateUpdated</td>
<td>$personStageName</td>
<td style='height:30px;background:#EEE;cursor:pointer; width:15%' onClick=".'"'."window.open('admin_person.php?edit=$personID','_self')".'"'." align='center'> EDIT </td>
<td style='height:30px;background:#EEE;cursor:pointer; width:20%' onClick=".'"'."window.open('admin_person.php?p=$personID','_self')".'"'." align='center'> DELETE </td>
</tr>";}?>
</table>
<br>
</td></tr></table>


<?php }else{

?>
<table><tr><td>People</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM persons WHERE  personID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td>
<input type="text" placeholder="Stage Name" maxlength="100" class="commenter" style="width:92%;" name="personStageName" value="<?php echo $personStageName; ?>"></td><td>
<input type="text" placeholder="Birth Name" maxlength="100" class="commenter" style="width:92%;" name="personBirthName" value="<?php echo $personBirthName; ?>"></td><td>
<input type="text" placeholder="Fan Name" maxlength="100" class="commenter" style="width:92%;" name="personFanName" value="<?php echo $personFanName; ?>"></td><td>
<input type="text" placeholder="Birth Day" maxlength="100" class="commenter" style="width:62.5%;" name="personBirthDay" value="<?php echo $personBirthDay; ?>">
<input type="number" max="2055" min="1900" placeholder="Birth Year" maxlength="100" class="commenter" style="width:22%;"  name="personBirthYear" value="<?php echo $personBirthYear; ?>"></td></tr><tr><td>
<input type="text" placeholder="Profession 1" maxlength="100" class="commenter" style="width:92%;"  name="personProfession1" value="<?php echo $personProfession1; ?>"></td><td>
<input type="text" placeholder="Profession 2" maxlength="100" class="commenter" style="width:92%;"  name="personProfession2" value="<?php echo $personProfession2; ?>"></td><td>
<input type="text" placeholder="Profession 3" maxlength="100" class="commenter" style="width:92%;"  name="personProfession3" value="<?php echo $personProfession3; ?>"></td><td>
<input type="text" placeholder="Profession 4" maxlength="100" class="commenter" style="width:92%;"  name="personProfession4" value="<?php echo $personProfession4; ?>"></td></tr><tr><td>
<input type="text" placeholder="Genre" maxlength="100" class="commenter" style="width:92%;"  name="personGenre" value="<?php echo $personGenre; ?>"></td><td>
<input type="number" max="2055" min="1900" placeholder="Career Start Year" maxlength="100" class="commenter" style="width:92%;"  name="personCareerStartYear" value="<?php echo $personCareerStartYear; ?>"></td><td>
<input type="text" placeholder="Label" maxlength="100" class="commenter" style="width:92%;"  name="personLabel" value="<?php echo $personLabel; ?>"></td><td>
<input type="text" placeholder="Place Of Origin" maxlength="100" class="commenter" style="width:92%;"  name="personPlaceOfOrigin" value="<?php echo $personPlaceOfOrigin; ?>"></td></tr><tr><td colspan="4" style="background:#AAA">
<textarea name='personLifeStory' class='widgEditor nothing'  required><?php echo $personLifeStory; ?></textarea></td></tr><tr><td colspan="4"><br><input type="submit" value="Edit" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxxx" value="<?php echo $personID ;?>">
</td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td>
<input type="text" placeholder="Stage Name" maxlength="100" class="commenter" style="width:92%;"  name="personStageName"></td><td>
<input type="text" placeholder="Birth Name" maxlength="100" class="commenter" style="width:92%;"  name="personBirthName"></td><td>
<input type="text" placeholder="Fan Name" maxlength="100" class="commenter" style="width:92%;"  name="personFanName"></td><td>
<input type="text" placeholder="Birth Day" maxlength="100" class="commenter" style="width:62.5%;"  name="personBirthDay">
<input type="number" max="2055" min="1900" placeholder="Birth Year" maxlength="100" class="commenter" style="width:22%;"  name="personBirthYear"></td></tr><tr><td>
<input type="text" placeholder="Profession 1" maxlength="100" class="commenter" style="width:92%;"  name="personProfession1"></td><td>
<input type="text" placeholder="Profession 2" maxlength="100" class="commenter" style="width:92%;"  name="personProfession2"></td><td>
<input type="text" placeholder="Profession 3" maxlength="100" class="commenter" style="width:92%;"  name="personProfession3"></td><td>
<input type="text" placeholder="Profession 4" maxlength="100" class="commenter" style="width:92%;"  name="personProfession4"></td></tr><tr><td>
<input type="text" placeholder="Genre" maxlength="100" class="commenter" style="width:92%;"  name="personGenre"></td><td>
<input type="number" max="2055" min="1900" placeholder="Career Start Year" maxlength="100" class="commenter" style="width:92%;"  name="personCareerStartYear"></td><td>
<input type="text" placeholder="Label" maxlength="100" class="commenter" style="width:92%;"  name="personLabel"></td><td>
<input type="text" placeholder="Place Of Origin" maxlength="100" class="commenter" style="width:92%;"  name="personPlaceOfOrigin"></td></tr><tr><td rowspan="3" colspan="3" style="background:#AAA">
<textarea name='personLifeStory' class='widgEditor nothing'  required></textarea></td><td>
Person Pic 1 <input type="file" style=";width:70%; opacity:	; "  name="personPic1" accept="image/*"></td></tr><tr><td>
Person Pic 2 <input type="file" style=";width:70%; opacity:	; "  name="personPic2" accept="image/*"></td></tr><tr><td>
Person Pic 3 <input type="file" style=";width:70%; opacity:	; "  name="personPic3" accept="image/*"></td></tr><tr><td colspan="4"><br>
<input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/>
<input type="hidden" name="xxx" value="xxx">
</td></tr></table>
</form>
<br>
<?php }?>

<table style="width:98.7%; text-align:left; font-size:.8em"><tr>
<td class="stats">Time</td>
<td class="stats">Name</td>
<td class="stats">Label</td>
<td class="stats" width="5%"></td>
<td class="stats" width="5%"></td>
</tr>
<?php
	$sql = mysqli_query($cxn, "SELECT * FROM persons ORDER BY personID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;

echo "<tr class='stats1'>
<td>$dateUpdated</td>
<td>$personStageName</td>
<td>$personLabel</td>
<td style='height:30px;background:#EEE;cursor:pointer' onClick=".'"'."window.open('admin_person.php?edit=$personID','_self')".'"'." align='center'>EDIT</td>
<td style='height:30px;background:#EEE;cursor:pointer' onClick=".'"'."window.open('admin_person.php?p=$personID','_self')".'"'." align='center'>DELETE</td>
</tr>";}?>
</table>
<br>
</td></tr></table>

<?php } ?>

</body>
</html>