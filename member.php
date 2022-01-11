<?php include("rab_dbcon.php");

extract($_GET);extract($_POST);
$today = date("Y-m-d"); 
$gbn=date("msimm");
if($_SESSION['memberStageName']){$personPikin=": ".$_SESSION['memberStageName'];}
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','member $personPikin',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($status=='signout'){$_SESSION['member']=$member='no';}

if($emailconfirmation!=''){
$sqlEMAILCONFIRMATION=mysqli_query($cxn, "SELECT * FROM member WHERE memberConfirmation='$emailconfirmation' LIMIT 1");
if(mysqli_num_rows($sqlEMAILCONFIRMATION)>0){
while($row=mysqli_fetch_assoc($sqlEMAILCONFIRMATION))
	{extract($row);}
	
	mysqli_query($cxn, "UPDATE member SET memberConfirmation='' WHERE memberID='$memberID' ");
	$_SESSION['member']=$member='yes'; $_SESSION['memberStageName']=$_SESSION['anonymousName']=$_SESSION['anonymous']=$_SESSION['commenter']=$memberStageName;
	session_start(); 
extract($_SESSION);}else{$login='Wrong Username or Password';}	
	}
if($new=='new'){$username=trim(htmlspecialchars($username));$password=trim(htmlspecialchars($password));
$sqlLOGIN=mysqli_query($cxn, "SELECT * FROM member WHERE memberUsername='$username' AND memberPassword='$password' AND memberConfirmation='' LIMIT 1");

if(mysqli_num_rows($sqlLOGIN)>0){
while($row=mysqli_fetch_assoc($sqlLOGIN))
	{extract($row);}
	$_SESSION['member']=$member='yes'; $_SESSION['memberStageName']=$_SESSION['anonymousName']=$_SESSION['anonymous']=$_SESSION['commenter']=$memberStageName;
session_start(); 
extract($_SESSION);}
else{$login='Wrong Username or Password';}

$sqlLOGIN=mysqli_query($cxn, "SELECT * FROM member WHERE memberUsername='$username' AND memberPassword='$password' AND memberConfirmation NOT IN ('') LIMIT 1");

if(mysqli_num_rows($sqlLOGIN)>0){
$login="Account is yet to be confirmed. follow the link in the email provided <b>[ Check your Spam folder ]</b><br><br>If problem persist let our support team know via <b><a href='mailto:info@greenboxnigeria.com?subject=Enquiry' target='_new'>support@greenboxnigeria.com</a></b>";}
	}
elseif($new=='reg'){
	
	$stagename=trim(htmlspecialchars($stagename));
	$birthname=trim(htmlspecialchars($birthname));
	$genre=trim(htmlspecialchars($genre));
	$birthday=trim(htmlspecialchars($birthday));
	$birthyear=trim(htmlspecialchars($birthyear));
	$placeoforigin=trim(htmlspecialchars($placeoforigin));
	$profession=trim(htmlspecialchars($profession));
	$label=trim(htmlspecialchars($label));
	$bio=trim(htmlspecialchars($bio));
	$email=trim(htmlspecialchars($email));
	$username=trim(htmlspecialchars($username));
	$password=trim(htmlspecialchars($password));
	
	$sqlMEMBER=mysqli_query($cxn, "SELECT * FROM member WHERE memberStageName='$stagename' OR memberEmail='$email' OR memberUsername='$username' ");
	
	if(mysqli_num_rows($sqlMEMBER)>0){$ezege="The Stagename or Email or Username you provide is Taken";}else{
	mysqli_query($cxn, "INSERT INTO member (memberID, memberStageName, memberEmail, memberUsername, memberPassword, memberConfirmation, dateUpdated) VALUES (NULL, '$stagename', '$email', '$username', '$password', '', '$today')") or die("Couldn't execute insert member");

$pic1 = str_replace(' ', '-', $stagename)."1.png"; move_uploaded_file($_FILES["pic1"]["tmp_name"], "personsimg/$pic1")or die("1111111111111111");
$pic2 = str_replace(' ', '-', $stagename)."2.png"; move_uploaded_file($_FILES["pic2"]["tmp_name"], "personsimg/$pic2")or die("2222222222222222");

mysqli_query($cxn, "INSERT INTO persons (personID, personStageName, personBirthName, personFanName, personGenre, personBirthDay, personBirthYear, personPlaceOfOrigin, personProfession1, personProfession2, personProfession3, personProfession4, personCareerStartYear, personLabel, personLifeStory, personPic1, personPic2, personPic3, dateUpdated) VALUES (NULL, '$stagename', '$birthname', NULL, '$genre', '$birthday', '$birthyear', '$placeoforigin', '$profession', NULL, NULL, NULL, '5000', '$label', '$bio', '$pic1', '$pic2', NULL, '$today')") or die("Couldn't execute insert person");
  	
	$_SESSION['member']=$member='yes'; $_SESSION['memberStageName']=$_SESSION['anonymousName']=$_SESSION['anonymous']=$_SESSION['commenter']=$stagename;
	
	$to = $email;
	$subject = 'Greenboxnigeria Membership email confirmation';
	
	$headers = "From: webmaster@greenboxnigeria.com\r\n";
	$headers .= "Reply-To: support@greenboxnigeria.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= "<center><img src='http://www.gbngr.com/images/logo.png' alt='logo' width='50px' height='50px'/>";
	$message .= "<table style='border:none'>";
	$message .= "<tr style='font-size:3em; font-weight:100'><td>Welcome to Greenbox Nigeria<br><br><br></td></tr>";
	$message .= "<tr><td align='right' style='font-size:1em;color:#33'>for support, comments or any question(s) contact our support team <a href='mailto:support@greenboxnigeria.com?subject=Enquiry' target='_new'>support@greenboxnigeria.com</a></td></tr>";
	$message .= "<tr><td align='center' style='font-size:.7em;color:#555'>&copy; 2016 Renegade</td></tr>";
	$message .= "</table></center>";
	$message .= "</body></html>";
	
	mail($to, $subject, $message, $headers);
	
	
	
	$to = "sopusoft@rocketmail.com";
	$subject = 'Greenboxnigeria Membership email confirmation';
	
	$headers = "From: webmaster@greenboxnigeria.com\r\n";
	$headers .= "Reply-To: support@greenboxnigeria.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= "<table style='border:none'>";
	$message .= "<tr style='font-size:3em; font-weight:100'><td>Greenbox Nigeria<br><br><br></td></tr>";
	$message .= "<tr><td align='center'><a style='background:#00E676; color:#FFF;padding:10px 30px;text-decoration:none' href='http://www.gbngr.com/backyard.php'>see</a><br><br><br></td></tr>";
	$message .= "<tr><td align='center' style='font-size:.7em;color:#555'>| stagename - $stagename <br> | 	birthname - $birthname <br> | genre - $genre <br> | birthday - $birthday <br> | birthyear - $birthyear <br> | 	placeoforigin - $placeoforigin <br> | profession - $profession <br> | label - $label <br> | bio - $bio <br> | pic1 - $pic1 <br> | pic2 - $pic2 <br> | email - $email | username - $username <br> | password - $password </td></tr>";
        $message .= "<tr><td>www.gbngr.com/archive/member-$gbn</td></tr>";
	$message .= "<tr><td align='center' style='font-size:.7em;color:#555'>&copy; 2016 Renegade</td></tr>";
	$message .= "</table></center>";
	$message .= "</body></html>";
		
	mail($to, $subject, $message, $headers);
	}}

	
if($member=='yes'){
	$sqlLOGIN=mysqli_query($cxn, "SELECT * FROM member WHERE memberUsername='$username' LIMIT 1");
	while($row=mysqli_fetch_assoc($sqlLOGIN))
	{extract($row);}
	}
	
	?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>

<?php if ($detect->isMobile()){?>

<body<?php  if($member=='yes'){echo " style='background:#000;color:#FFF'";}?>>

<?php if($member!='yes'){ 
	$stagename=trim(htmlspecialchars_decode($stagename));
	$birthname=trim(htmlspecialchars_decode($birthname));
	$genre=trim(htmlspecialchars_decode($genre));
	$birthday=trim(htmlspecialchars_decode($birthday));
	$birthyear=trim(htmlspecialchars_decode($birthyear));
	$placeoforigin=trim(htmlspecialchars_decode($placeoforigin));
	$profession=trim(htmlspecialchars_decode($profession));
	$label=trim(htmlspecialchars_decode($label));
	$bio=trim(htmlspecialchars_decode($bio));
	$pic1=trim(htmlspecialchars_decode($pic1));
	$pic2=trim(htmlspecialchars_decode($pic2));
	$email=trim(htmlspecialchars_decode($email));
	$username=trim(htmlspecialchars_decode($username));?>
<table style="height:500px"><tr valign="top"><td align="center">
<?php if($ezege){echo "<br><br>".$ezege;}?>
<table style="width:70%;"><tr valign="bottom"><td style="padding:150px 0 0 0; width:100%" align="center" id="signin">

<table><tr><td style="padding:0 10px 30px 10px">
        <form method="post"><?php echo $login;?>
            <input required type="text" name="username" placeholder="Username" maxlength="20" class="commenter"/><br><br>
            <input required type="password" name="password" placeholder="Password" maxlength="20" class="commenter"/><br><br>
            <input type="hidden" name="new" value="new">
<tr><td style="background:#000; height:20px" align="center">
<input type="submit" value="Log In" class="commentbutton" style="color:#FFF"/></form>
</td></tr></table>
<div style="font-size:.7em; text-align:right; margin-top:5px;"><a href="mailto:ng.greenbox@gmail.com?subject=Forgot Password [include registered password]" target="_new">forgot password?</a></div>
<div style="font-size:.7em; margin-top:10px;" onClick="togglelogin()">Not a member yet? <div style="font-size:1.3em"><b>Become a Member</b></div></div>
<br>
<table style="width:200px;margin:5px 0"><tr>
<td title="Facebook" align="center"><a target="_blank" href="https://www.facebook.com/Greenbox-Nigeria-1032329466862501/"><div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Twitter" align="center"><a target="_blank" href="https://twitter.com/GreenboxNigeria"><div style="background:url(images/tt1.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Google+" align="center"><a target="_blank" href="https://plus.google.com/u/0/101846096960635449425"><div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="LinkedIn" align="center"><a target="_blank" href="https://www.linkedin.com/company/greenbox-nigeria"><div style="background:url(images/in.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Instagram" align="center"><a target="_blank" href="https://www.instagram.com/greenboxnigeria/"><div style="background:url(images/ig.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td></tr></table>

</td></tr></table>

<table><tr><td style="display:none; margin-bottom:100px" id="signup" align="center">
<div style="font-size:.7em; margin-top:50px;" onClick="togglelogin()">Already a member? <div style="font-size:1.3em; display:inline-block"><b>Login In</b></div></div>
<table style="width:70%;"><tr><td align="center">
<div style="margin:50px 0 20px 0">Become a Member</div>
     <form method="post" enctype="multipart/form-data">
     <input required name="birthname" value="<?php echo $birthname?>" type="text" maxlength="100" placeholder="Birth Name" class="commenter"/><br><br>
     <input required name="stagename" value="<?php echo $stagename?>" maxlength="50" placeholder="Stage Name" class="commenter"/><br><br>
<div class="file_button_container">
    <table><tr valign="middle"><td id="artstatus" style="color:#000; width:50%">Picture One</td><td><input name="pic1" required value="<?php echo $pic1?>" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter"/></td></tr></table>
    </div><br>
    		<div class="file_button_container">
    <table><tr valign="middle"><td id="filestatus" style="color:#000; width:50%">Picture Two</td><td><input name="pic2" value="<?php echo $pic2?>" required type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show()" id="file" class="commenter"/></td></tr></table>
    </div><br>
     <input required name="genre" value="<?php echo $genre?>" type="text" placeholder="Genre, Eg. Pop" maxlength="50" class="commenter"/><br><br>
     <input required name="birthday" value="<?php echo $birthday?>" type="text" placeholder="Birth Day, Eg. March 18" maxlength="15" class="commenter"/><br><br>
     <input required name="birthyear" value="<?php echo $birthyear?>" type="number" placeholder="Birth Year, Eg. 1986" min="1950" max="2020" maxlength="4" class="commenter"/><br><br>
     <input required name="placeoforigin" value="<?php echo $placeoforigin?>" type="text" placeholder="State Of Origin, Eg. Kogi State" maxlength="50" class="commenter"/><br><br>
     <input required name="profession" value="<?php echo $profession?>" type="text" placeholder="Profession, Eg. Producer" maxlength="50" class="commenter"/><br><br>
     <input required name="label" value="<?php echo $label?>" type="text" placeholder="Label/ Group, Eg. Juvenile Records" maxlength="50" class="commenter"/><br><br>
     <textarea required name="bio" placeholder="Bio [ Your Career Story, thus far ]" class="comment"><?php echo $bio?></textarea><br><br>
     <input required name="email" value="<?php echo $email?>" type="email"placeholder="Email" maxlength="50" class="commenter"/><br><br>
     <input required type="text" value="<?php echo $username?>" name="username" placeholder="Username" maxlength="20" class="commenter"/><br><br>
     <input required type="password" name="password" placeholder="Password" maxlength="20" class="commenter"/><br><br>
</td></tr><tr><td style="background:#000; height:20px" align="center">
	<input type="hidden" name="new" value="reg">
     <input type="submit" value="Sign Up" class="commentbutton" style="color:#FFF"/>
     </form>
</td></tr></table>

</td></tr></table>

</td></tr></table>

<script>
function togglelogin(){
		if(document.getElementById("signup").style.display==='none'){
			document.getElementById("signup").style.display='inline-block';
			document.getElementById("signin").style.display='none'
		}else{
			document.getElementById("signup").style.display='none';
			document.getElementById("signin").style.display='inline-block'
		}
	}
function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 20 ){d=d.substr(0, 20);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Picture One.. Loaded - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 20 ){d=d.substr(0, 20);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Picture Two.. Loaded - "+d;}
	}}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Signin or Signup on Greenboxnigeria.com';
	_id('description').content='Become a member';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-200%';
}
</script>


<?php }else{


	$stagename=trim(htmlspecialchars_decode($stagename));
	$birthname=trim(htmlspecialchars_decode($birthname));
	$genre=trim(htmlspecialchars_decode($genre));
	$birthday=trim(htmlspecialchars_decode($birthday));
	$birthyear=trim(htmlspecialchars_decode($birthyear));
	$placeoforigin=trim(htmlspecialchars_decode($placeoforigin));
	$profession=trim(htmlspecialchars_decode($profession));
	$label=trim(htmlspecialchars_decode($label));
	$bio=trim(htmlspecialchars_decode($bio));
	$pic1=trim(htmlspecialchars_decode($pic1));
	$pic2=trim(htmlspecialchars_decode($pic2));
	$email=trim(htmlspecialchars_decode($email));
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$memberStageName' AND personCareerStartYear='5000' LIMIT 1");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}?>
<table align='center' style=' width:;background:url(personsimg/<?php echo $personPic1 ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:700px; position:fixed; z-index:-2;opacity:.4'><tr><td></td></tr></table>

<br><br>
<table align='center' style=' height:250;width:95%;'>
<tr><td align='center' width="25%">
<div style='padding:10px; border-radius:50%;background:url(personsimg/<?php echo $personPic2 ?>) center no-repeat;background-size:cover; width:100px; height:100px;border:thick #333 solid'></div>
</td></tr>
<tr><td style="font-size:.8em; text-align:center">
<b style="font-size:1.5em; font-weight:bolder"><?php echo $personStageName?></b><br>
<?php if($personLabel){echo"<div style='color:#00E676;'>$personLabel</div>";}?>

<?php echo $personProfession1; if($personProfession2){echo " &bull; ".$personProfession2;}
if($personProfession3){echo " &bull; ".$personProfession3;}
if($personProfession4){echo " &bull; ".$personProfession4;}?>
</td></tr></table>

<?php if($personCareerStartYear!='5000'){?>
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
<?php $sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songArtist='$personStageName'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}?>
<?php  if($me>3){?>
 <td>
 <table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php }
 if($me>4){?>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
 <?php }?>
</tr></table>
 <?php }?>
<br>


<table style="text-align:center; font-size:.7em; font-weight:700; height:30px"><tr>
<td style="width:25%;" align='center' onClick="top.document.getElementsByTagName('iframe')[1].src='editprofile.php';top.document.getElementById('intiating').style.top='0'">
EDIT PROFILE
</td>
<td style="font-size:1.2em" align='center' onClick="top.document.getElementsByTagName('iframe')[1].src='songupload.php';top.document.getElementById('intiating').style.top='0'">
UPLOAD SONG
</td>
<td style="width:25%;" align='center' onClick="top.document.getElementsByTagName('iframe')[1].src='member.php?status=signout';top.document.getElementById('intiating').style.top='0';">
LOGOUT
</td></tr></table>

<br>
<table style="text-align:center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>
<br><br>
<table><tr>
<?php
$x=date('Y');
 if($personBirthName) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birth Name</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $personBirthName ?></td></tr><?php }?>
<?php if($personBirthDay) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birthday</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personBirthDay ?></td></tr><?php }?>
<?php if($labelFounded) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Age</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personBirthYear." Years" ?></td></tr><?php }?>
<?php if($personGenre) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Genre</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personGenre ?></td></tr><?php }?>
<?php if($personCareerStartYear AND $personCareerStartYear!='5000'){?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Career Lenght</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personCareerStartYear." Years" ?></td></tr><?php }?>
<?php if($personPlaceOfOrigin) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">State Of Origin</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personPlaceOfOrigin ?></td></tr><?php }?>
</table>
<br>
<?php 
$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$personStageName' OR songProducer='$personStageName' LIMIT 5");

$sql2 = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songArtist='$personStageName' AND songAlbum NOT IN ('mixtape','single','cover','') LIMIT 5");

$sql3 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '$personStageName%' OR songArtistFt LIKE '% $personStageName %' OR songArtistFt LIKE '%$personStageName' LIMIT 5");

$sql4 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '%$personStageName%' OR videoArtist LIKE '%$personStageName%' OR videoArtistFt LIKE '%$personStageName%' OR videoDirector LIKE '%$personStageName%' ORDER BY videoTitle ASC LIMIT 5");
if(mysqli_num_rows($sql1)>0 OR mysqli_num_rows($sql2)>0 OR mysqli_num_rows($sql3)>0 OR mysqli_num_rows($sql4)){
echo "<table style='background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;' class='tab1'><tr><td class='tabheader2'> Discography</td></tr><tr><td>";
if(mysqli_num_rows($sql1)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">SONGS</td></tr></table>
<?php 
while($row=mysqli_fetch_assoc($sql1))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<?php }?>
<?php
if(mysqli_num_rows($sql2)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ALBUMS</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sql2)){extract($row);
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songAlbum";?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php } ?>

<table><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('musiclist.php?t=album','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<?php }
if(mysqli_num_rows($sql3)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">FEATURED</td></tr></table>

<?php $counter=1;
while($row=mysqli_fetch_assoc($sql3))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>
<table align="center"><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artistFt','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<?php } 
if(mysqli_num_rows($sql4)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">VIDEOS</td></tr></table>

<?php 
while($row=mysqli_fetch_assoc($sql4))	
{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('video.php?videoID=<?php echo $videoID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp' style='color:#FFF'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
<?php }?>
<table><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('videos.php','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<?php }

 }?>

<br>
<table><tr><td align="center"><div class="blogwriteup;font-size:1em;"><?php echo htmlspecialchars_decode($personLifeStory)?></div><br></td></tr></table>

<br><br>
<table style="width:200px" align="center"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'person $personStageName'") or die('xxx2');
echo mysqli_num_rows($sqls);?></td></tr></table>
<br>
<br>
<br>
<br>
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gp");
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $personStageName ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($personLifeStory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-200%';
}<?php } ?>
</script>
</body>
</html>

<?php }else{?>
	

<body<?php  if($member=='yes'){echo " style='background:#000;color:#FFF'";}else{echo " style='background:#EEE;color:#000'";}?>>

<?php if($member!='yes'){ 
	$stagename=trim(htmlspecialchars_decode($stagename));
	$birthname=trim(htmlspecialchars_decode($birthname));
	$genre=trim(htmlspecialchars_decode($genre));
	$birthday=trim(htmlspecialchars_decode($birthday));
	$birthyear=trim(htmlspecialchars_decode($birthyear));
	$placeoforigin=trim(htmlspecialchars_decode($placeoforigin));
	$profession=trim(htmlspecialchars_decode($profession));
	$label=trim(htmlspecialchars_decode($label));
	$bio=trim(htmlspecialchars_decode($bio));
	$pic1=trim(htmlspecialchars_decode($pic1));
	$pic2=trim(htmlspecialchars_decode($pic2));
	$email=trim(htmlspecialchars_decode($email));
	$username=trim(htmlspecialchars_decode($username));?>
<table style="height:500px"><tr valign="top"><td align="center">
<?php if($ezege){echo "<br><br>".$ezege;}?>
<table style="width:30%;" align="center"><tr valign="bottom"><td style="padding:150px 0 0 0; width:100%" align="center" id="signin">

<table><tr><td style="padding:0 10px 30px 10px">
        <form method="post"><?php echo $login;?>
            <input required type="text" name="username" placeholder="Username" maxlength="20" class="commenter"/><br><br>
            <input required type="password" name="password" placeholder="Password" maxlength="20" class="commenter"/><br><br>
            <input type="hidden" name="new" value="new">
<tr><td style="background:#000; height:20px" align="center">
<input type="submit" value="Log In" class="commentbutton" style="color:#FFF"/></form>
</td></tr></table>
<div style="font-size:.7em; text-align:right; margin-top:5px;"><a href="mailto:ng.greenbox@gmail.com?subject=Forgot Password [include registered password]" target="_new">forgot password?</a></div>
<div style="font-size:.7em; margin-top:10px;" onClick="togglelogin()">Not a member yet? <div style="font-size:1.3em"><b>Become a Member</b></div></div>
<br>
<table style="width:200px;margin:5px 0"><tr>
<td title="Facebook" align="center"><a target="_blank" href="https://www.facebook.com/Greenbox-Nigeria-1032329466862501/"><div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Twitter" align="center"><a target="_blank" href="https://twitter.com/GreenboxNigeria"><div style="background:url(images/tt1.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Google+" align="center"><a target="_blank" href="https://plus.google.com/u/0/101846096960635449425"><div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="LinkedIn" align="center"><a target="_blank" href="https://www.linkedin.com/company/greenbox-nigeria"><div style="background:url(images/in.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td>
<td title="Instagram" align="center"><a target="_blank" href="https://www.instagram.com/greenboxnigeria/"><div style="background:url(images/ig.png) center no-repeat;background-size:cover;width:20px;height:20px"></div></a></td></tr></table>

</td></tr></table>

<table style="width:50%;" align="center"><tr><td style="display:none; margin-bottom:100px; width:100%" id="signup" align="center">
<div style="font-size:.7em; margin-top:50px;" onClick="togglelogin()">Already a member? <div style="font-size:1.3em; display:inline-block"><b>Login In</b></div></div>
<table><tr><td align="center">
<div style="margin:50px 0 20px 0">Become a Member</div>
     <form method="post" enctype="multipart/form-data">
     <input required name="birthname" value="<?php echo $birthname?>" type="text" maxlength="100" placeholder="Birth Name" class="commenter"/><br><br>
     <input required name="stagename" value="<?php echo $stagename?>" maxlength="50" placeholder="Stage Name" class="commenter"/><br><br>
<div class="file_button_container">
    <table><tr valign="middle"><td id="artstatus" style="color:#000; width:50%">Picture One</td><td><input name="pic1" required value="<?php echo $pic1?>" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter"/></td></tr></table>
    </div><br>
    		<div class="file_button_container">
    <table><tr valign="middle"><td id="filestatus" style="color:#000; width:50%">Picture Two</td><td><input name="pic2" value="<?php echo $pic2?>" required type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show()" id="file" class="commenter"/></td></tr></table>
    </div><br>
     <input required name="genre" value="<?php echo $genre?>" type="text" placeholder="Genre, Eg. Pop" maxlength="50" class="commenter"/><br><br>
     <input required name="birthday" value="<?php echo $birthday?>" type="text" placeholder="Birth Day, Eg. March 18" maxlength="15" class="commenter"/><br><br>
     <input required name="birthyear" value="<?php echo $birthyear?>" type="number" placeholder="Birth Year, Eg. 1986" min="1950" max="2020" maxlength="4" class="commenter"/><br><br>
     <input required name="placeoforigin" value="<?php echo $placeoforigin?>" type="text" placeholder="State Of Origin, Eg. Kogi State" maxlength="50" class="commenter"/><br><br>
     <input required name="profession" value="<?php echo $profession?>" type="text" placeholder="Profession, Eg. Producer" maxlength="50" class="commenter"/><br><br>
     <input required name="label" value="<?php echo $label?>" type="text" placeholder="Label/ Group, Eg. Juvenile Records" maxlength="50" class="commenter"/><br><br>
     <textarea required name="bio" placeholder="Bio [ Your Career Story, thus far ]" class="comment"><?php echo $bio?></textarea><br><br>
     <input required name="email" value="<?php echo $email?>" type="email"placeholder="Email" maxlength="50" class="commenter"/><br><br>
     <input required type="text" value="<?php echo $username?>" name="username" placeholder="Username" maxlength="20" class="commenter"/><br><br>
     <input required type="password" name="password" placeholder="Password" maxlength="20" class="commenter"/><br><br>
</td></tr><tr><td style="background:#000; height:20px" align="center">
	<input type="hidden" name="new" value="reg">
     <input type="submit" value="Sign Up" class="commentbutton" style="color:#FFF"/>
     </form>
</td></tr></table>

</td></tr></table>

<script>
function togglelogin(){
		if(document.getElementById("signup").style.display==='none'){
			document.getElementById("signup").style.display='inline-block';
			document.getElementById("signin").style.display='none'
		}else{
			document.getElementById("signup").style.display='none';
			document.getElementById("signin").style.display='inline-block'
		}
	}
function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 20 ){d=d.substr(0, 20);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Picture One.. Loaded - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 20 ){d=d.substr(0, 20);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Picture Two.. Loaded - "+d;}
	}}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Signin or Signup on Greenboxnigeria.com';
	_id('description').content='Become a member';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-200%';
}
</script>


<?php }else{


	$stagename=trim(htmlspecialchars_decode($stagename));
	$birthname=trim(htmlspecialchars_decode($birthname));
	$genre=trim(htmlspecialchars_decode($genre));
	$birthday=trim(htmlspecialchars_decode($birthday));
	$birthyear=trim(htmlspecialchars_decode($birthyear));
	$placeoforigin=trim(htmlspecialchars_decode($placeoforigin));
	$profession=trim(htmlspecialchars_decode($profession));
	$label=trim(htmlspecialchars_decode($label));
	$bio=trim(htmlspecialchars_decode($bio));
	$pic1=trim(htmlspecialchars_decode($pic1));
	$pic2=trim(htmlspecialchars_decode($pic2));
	$email=trim(htmlspecialchars_decode($email));
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$memberStageName' AND personCareerStartYear='5000' LIMIT 1");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}?>
<table align='center' style=' width:;background:url(personsimg/<?php echo $personPic1 ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:700px; position:fixed; z-index:-2;opacity:.4'><tr><td></td></tr></table>

<br><br>
<table align='center' style=' height:250;width:95%;'>
<tr><td align='center' width="25%">
<div style='padding:10px; border-radius:50%;background:url(personsimg/<?php echo $personPic2 ?>) center no-repeat;background-size:cover; width:100px; height:100px;border:thick #333 solid'></div>
</td></tr>
<tr><td style="font-size:.8em; text-align:center">
<b style="font-size:1.5em; font-weight:bolder"><?php echo $personStageName?></b><br>
<?php if($personLabel){echo"<div style='color:#00E676;'>$personLabel</div>";}?>

<?php echo $personProfession1; if($personProfession2){echo " &bull; ".$personProfession2;}
if($personProfession3){echo " &bull; ".$personProfession3;}
if($personProfession4){echo " &bull; ".$personProfession4;}?>
</td></tr></table>

<?php if($personCareerStartYear!='5000'){?>
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
<?php $sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songArtist='$personStageName'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}?>
<?php  if($me>3){?>
 <td>
 <table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
<?php }
 if($me>4){?>
<td>
<table style="background:#FFF; border-radius:50%; width:30px; height:30px;"><tr><td align="center">
<table style='background:url(images/star1.png) center no-repeat; background-size:cover; width:15px; height:15px;'><tr><td></td></tr></table>
</td></tr></table>
</td>
 <?php }?>
</tr></table>
 <?php }?>
<br>


<table style="text-align:center; font-size:.7em; font-weight:700; height:30px"><tr>
<td style="width:25%;" align='center' onClick="top.document.getElementsByTagName('iframe')[1].src='editprofile.php';">
EDIT PROFILE
</td>
<td style="font-size:1.2em" align='center' onClick="top.document.getElementsByTagName('iframe')[1].src='songupload.php';">
UPLOAD SONG
</td>
<td style="width:25%;" align='center' onClick="top.document.getElementsByTagName('iframe')[1].src='member.php?status=signout';;">
LOGOUT
</td></tr></table>
<br>
<br>
<table style="text-align:center; width:400px" align="center"><tr>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-fb')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/fb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tt&text=<?php echo $title ?> on GreenboxNigeria%20gbngr.com/index.php?1=video.php?videoed=<?php echo str_replace(' ', '_', $videoTitle);?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tt1.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gg')">
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
<div style='width:40px; height:40px' onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-in&title=<?php echo $videoTitle ?> via GreenboxNigeria')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/in.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px'onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-pi&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/pi.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
<td style="width:14%;" align='center'>
<div style='width:40px; height:40px' onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/index.php?1=person.php?personed=<?php echo str_replace(' ', '_', $personStageName);?>-tb&title=<?php echo $videoTitle ?> on GreenboxNigeria&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')">
<table style="width:40px; height:40px; border-radius:50%; box-shadow:0 0 5px rgba(0,0,0,.25); background:#FFF;"><tr><td align="center">
<table style="background:url(images/tb.png) center no-repeat; background-size:contain; width:20px; height:20px"><tr><td style="width:20%"></td></tr></table>
</td></tr></table>
</div>
</td>
</tr></table>
<br><br>
<table><tr>
<?php
$x=date('Y');
 if($personBirthName) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birth Name</td><td>&bull;</td><td style=" width:48%;padding:10px 0; text-align:left"><?php echo $personBirthName ?></td></tr><?php }?>
<?php if($personBirthDay) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Birthday</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personBirthDay ?></td></tr><?php }?>
<?php if($labelFounded) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Age</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personBirthYear." Years" ?></td></tr><?php }?>
<?php if($personGenre) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Genre</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personGenre ?></td></tr><?php }?>
<?php if($personCareerStartYear AND $personCareerStartYear!='5000'){?>
<tr><td style="padding:0 5px; width:48%; text-align:right">Career Lenght</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $x-$personCareerStartYear." Years" ?></td></tr><?php }?>
<?php if($personPlaceOfOrigin) {?>
<tr><td style="padding:0 5px; width:48%; text-align:right">State Of Origin</td><td>&bull;</td><td style="width:48%;padding:10px 0; text-align:left"><?php echo $personPlaceOfOrigin ?></td></tr><?php }?>
</table>
<br>
<?php 
$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$personStageName' OR songProducer='$personStageName' LIMIT 5");

$sql2 = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songArtist='$personStageName' AND songAlbum NOT IN ('mixtape','single','cover','') LIMIT 5");

$sql3 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '$personStageName%' OR songArtistFt LIKE '% $personStageName %' OR songArtistFt LIKE '%$personStageName' LIMIT 5");

$sql4 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '%$personStageName%' OR videoArtist LIKE '%$personStageName%' OR videoArtistFt LIKE '%$personStageName%' OR videoDirector LIKE '%$personStageName%' ORDER BY videoTitle ASC LIMIT 5");
if(mysqli_num_rows($sql1)>0 OR mysqli_num_rows($sql2)>0 OR mysqli_num_rows($sql3)>0 OR mysqli_num_rows($sql4)){
echo "<table style='background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;' class='tab1'><tr><td class='tabheader2'> Discography</td></tr><tr><td>";
if(mysqli_num_rows($sql1)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">SONGS</td></tr></table>
<?php 
while($row=mysqli_fetch_assoc($sql1))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');;"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');;">More</div></td></tr></table>
<?php }?>
<?php
if(mysqli_num_rows($sql2)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ALBUMS</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sql2)){extract($row);
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');;"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songAlbum";?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php } ?>

<table><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('musiclist.php?t=album','_self');;">More</div></td></tr></table>

<?php }
if(mysqli_num_rows($sql3)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">FEATURED</td></tr></table>

<?php $counter=1;
while($row=mysqli_fetch_assoc($sql3))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');;"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; echo "<span class='blogtimestamp' style='color:#FFF'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>
<table align="center"><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artistFt','_self');;">More</div></td></tr></table>

<?php } 
if(mysqli_num_rows($sql4)>0){?>
<table align="center"><td align="center" style="color:#FFF; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">VIDEOS</td></tr></table>

<?php 
while($row=mysqli_fetch_assoc($sql4))	
{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
	<table align="center" style='width:98%; margin:5px 0' onClick="window.open('video.php?videoID=<?php echo $videoID?>','_self');;"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp' style='color:#FFF'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp' style='color:#FFF'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
<?php }?>
<table><tr valign="middle"><td colspan="5" align="right" style='padding-right:10px'><div class="seemore" onClick="window.open('videos.php','_self');;">More</div></td></tr></table>
<?php }

 }?>

<br>
<table><tr><td align="center"><div class="blogwriteup;font-size:1em;"><?php echo htmlspecialchars_decode($personLifeStory)?></div><br></td></tr></table>

<br><br>
<table style="width:200px" align="center"><tr><td>Shares :</td></tr><tr><td align="center" class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'person $personStageName'") or die('xxx2');
echo mysqli_num_rows($sqls);?></td></tr></table>
<br>
<br>
<br>
<br>
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/person-<?php echo str_replace(' ', '_', $personStageName);?>-gp");
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $personStageName ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($personLifeStory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-200%';
}<?php } ?>
</script>
</body>
</html>

<?php }?>
