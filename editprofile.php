<?php include("rab_dbcon.php");

extract($_POST);
$today = date("Y-m-d"); 
if($_SESSION['memberStageName']){$personPikin=": ".$_SESSION['memberStageName'];}
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','Edit: $personPikin',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($member=='yes'){
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$memberStageName' AND personCareerStartYear='5000' LIMIT 1");
 while($row=mysqli_fetch_assoc($sql))
	{extract($row);}

if($new=='edit'){
	mysqli_query($cxn, "UPDATE persons SET personBirthName='$birthname', personStageName='$stagename', personGenre='$genre', personProfession1='$profession', personLabel='$label', personLifeStory='$bio' WHERE personID='$personID' ") or die("tell me all");
	mysqli_query($cxn, "UPDATE member SET memberStageName='$stagename' WHERE memberStageName='$personStageName' ") or die("tell me all");

if($_FILES["personPic1"]["name"]!=''){
	$art1 = "art_".str_replace(' ', '-', $personStageName)."1.png";
	move_uploaded_file($_FILES["personPic1"]["tmp_name"], "personsimg/$art1");
	mysqli_query($cxn, "UPDATE persons SET personPic1='$art1' WHERE personID='$personID' ") or die("tell me Pic1");
	}
if($_FILES["personPic2"]["name"]!=''){
	$art2 = "art_".str_replace(' ', '-', $personStageName)."2.png";
	move_uploaded_file($_FILES["personPic2"]["tmp_name"], "personsimg/$art2");
	mysqli_query($cxn, "UPDATE persons SET personPic2='$art2' WHERE personID='$personID' ") or die("tell me Pic2");
	}
	$_SESSION['memberStageName']=$stagename;
echo"<script>top.document.getElementsByTagName('iframe')[1].src='member.php' </script>";
	}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>

<?php if ($detect->isMobile()){?>

<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center">
<table style="width:70%; margin-bottom:50px"><tr><td align="center" colspan="2">
<br><br>
Edit Profile<br><br>
	<form method="post" enctype="multipart/form-data">
    <input autofocus required name="birthname" value="<?php echo $personBirthName?>" type="text" maxlength="100" placeholder="Birth Name" class="commenter"/><br><br>
    <input required name="stagename" value="<?php echo $personStageName?>" maxlength="50" placeholder="Stage Name" class="commenter"/><br><br>
    <div class="file_button_container">
<table><tr valign="middle"><td id="artstatus" style="color:#000; width:50%">Picture One</td><td><input name="personPic1" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter" style="width:100%"/></td></tr></table>
</div><br>
    <div class="file_button_container">
<table><tr valign="middle"><td id="filestatus" style="color:#000; width:50%">Picture Two</td><td><input name="personPic2" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show()" id="file" class="commenter" style="width:100%"/></td></tr></table>
</div><br>
    <input required name="genre" value="<?php echo $personGenre?>" type="text" placeholder="Genre [Afropop, Raggae]" maxlength="50" class="commenter"/><br><br>
    <input required name="profession" value="<?php echo $personProfession1?>" type="text" placeholder="Profession [Producer, Singer And Rapper]" maxlength="50" class="commenter"/><br><br>
	<input required name="label" value="<?php echo $personLabel?>" type="text" placeholder="Label/ Group [Dope Music Group]" maxlength="50" class="commenter"/><br><br>
	<textarea required name="bio" placeholder="Life Story [Bio]" class="comment"><?php echo $personLifeStory?></textarea><br><br>
            <input type="hidden" name="new" value="edit">
</tr><tr><td style="background:#000; height:20px; width:50%; border-right:thin solid #FFF" align="center">
    <input type="submit" value="Edit" class="commentbutton" style="color:#FFF"/>
    </form>
</td><td style="background:#000; height:20px; color:#FFF; font-size:.8em" align="center" onClick="top.document.getElementsByTagName('iframe')[1].src='member.php';top.document.getElementById('intiating').style.top='0'">
Cancel
</td></tr></table>

<script>
function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Picture One.. Loaded - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Picture Two.. Loaded - "+d;}
	}}
window.onload = function() {
  	top.document.getElementById('title1').innerHTML='Edit Profile';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
<br><br>
</td></tr></table>
<script src="scirpt/mob_links.js"></script>
</body>
</html>

<?php }else{?>
	
<body style="background:#EEE">
<table align="center" style="width:70%; margin-bottom:50px"><tr><td align="center" colspan="2">
<br><br>
Edit Profile<br><br>
	<form method="post" enctype="multipart/form-data">
    <input autofocus required name="birthname" value="<?php echo $personBirthName?>" type="text" maxlength="100" placeholder="Birth Name" class="commenter"/><br><br>
    <input required name="stagename" value="<?php echo $personStageName?>" maxlength="50" placeholder="Stage Name" class="commenter"/><br><br>
    <div class="file_button_container">
<table><tr valign="middle"><td id="artstatus" style="color:#000; width:50%">Picture One</td><td><input name="personPic1" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter" style="width:100%"/></td></tr></table>
</div><br>
    <div class="file_button_container">
<table><tr valign="middle"><td id="filestatus" style="color:#000; width:50%">Picture Two</td><td><input name="personPic2" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show()" id="file" class="commenter" style="width:100%"/></td></tr></table>
</div><br>
    <input required name="genre" value="<?php echo $personGenre?>" type="text" placeholder="Genre [Afropop, Raggae]" maxlength="50" class="commenter"/><br><br>
    <input required name="profession" value="<?php echo $personProfession1?>" type="text" placeholder="Profession [Producer, Singer And Rapper]" maxlength="50" class="commenter"/><br><br>
	<input required name="label" value="<?php echo $personLabel?>" type="text" placeholder="Label/ Group [Dope Music Group]" maxlength="50" class="commenter"/><br><br>
	<textarea required name="bio" placeholder="Life Story [Bio]" class="comment"><?php echo $personLifeStory?></textarea><br><br>
            <input type="hidden" name="new" value="edit">
</tr><tr><td style="background:#000; height:20px; width:50%; border-right:thin solid #FFF" align="center">
    <input type="submit" value="Edit" class="commentbutton" style="color:#FFF"/>
    </form>
</td><td style="background:#000; height:20px; color:#FFF; font-size:.8em" align="center" onClick="top.document.getElementsByTagName('iframe')[1].src='member.php';">
Cancel
</td></tr></table>

<script>
function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Picture One.. Loaded - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Picture Two.. Loaded - "+d;}
	}}
window.onload = function() {
  	top.document.getElementById('title1').innerHTML='Edit Profile';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
<script src="scirpt/mob_links.js"></script>
</body>
</html>
<?php }?>

<?php }else{header("Location: member.php");}?>

