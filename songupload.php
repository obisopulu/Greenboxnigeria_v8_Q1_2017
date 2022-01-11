<?php include("rab_dbcon.php");$gbn=date("msi");

extract($_POST);
$title=trim(htmlspecialchars($title));
$artistft=trim(htmlspecialchars($artistft));
$producer=trim(htmlspecialchars($producer));
$genre=trim(htmlspecialchars($genre));
$language=trim(htmlspecialchars($language));
$description=trim(htmlspecialchars($description));
$today = date("Y-m-d"); 
$y=date("Y");
if($_SESSION['memberStageName']){$personPikin=": ".$_SESSION['memberStageName'];}
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','Edit: $personPikin',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($member=='yes'){
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$memberStageName' AND personCareerStartYear='5000' LIMIT 1");
 while($row=mysqli_fetch_assoc($sql))
	{extract($row);}

if($upload=='Upload'){
	
$sql=mysqli_query ($cxn, "SELECT * FROM songs WHERE songURL='$memberStageName.mp3' ORDER BY songID DESC  LIMIT 1")or die("=1=");
 while($row=mysqli_fetch_assoc($sql))
	{extract($row);}

	$art =str_replace(' ','_',"art_".$personStageName."_".$title.".png");
	move_uploaded_file($_FILES["art"]["tmp_name"], "songsimg/$art");
	$size=round(filesize("songs/$songURL"));
	mysqli_query($cxn, "UPDATE songs SET songTitle = '$title', songArtist = '$personStageName', songArtistFt = '$artistft', songAlbum = 'Single', songArt = '$art', songProducer = '$producer',  songLenght = '3432', songSize = '$size', songGenre = '$genre', songDescription = '$description', songYear = '2016', songLanguage = '$language' WHERE songID = $songID")or die("==");
$ezege ="<table style='font-size:2em'><tr><td align='center'>$title Uploaded</td></tr></table>";

  $song = str_replace(' ','_',"gbn".$gbn."_".$personStageName."_".$title.".mp3");
		$song = str_replace('(','',$song);
		$song = str_replace(')','',$song);
rename("songs/$songURL","songs/$song");
mysqli_query($cxn, "UPDATE songs SET songURL = '$song' WHERE songID = $songID");
header("Location: member.php");
	}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<script>
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file").files[0];
	var formdata = new FormData();
	formdata.append("file", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "services/publicupload.php");
	ajax.send(formdata);
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 99.2;
	_("progressBar").style.width = Math.round(percent)+'%';
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
	document.forms['pump'].submit();
	_("loaded_n_total").innerHTML = "Finishing up...";
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
</head>

<?php if ($detect->isMobile()){?>

<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain; color:#000"><tr><td align="center">
<table style="width:70%; margin-bottom:50px"><tr><td align="center">
<br><br>
Muisc Upload
<br>
    <?php echo $ezege;?>
    <table><tr valign="top"><td width="95%" align="center" colspan="2"><br>
	<form enctype="multipart/form-data" method="post" id="pump">
    <input name="title" required maxlength="50" type="text" placeholder="Title, Eg. God of the earth" class="commenter" autofocus/><br><br>
    <input name="artistft" required maxlength="100" type="text" placeholder=" Artist(s) Featured, Eg. 2Baba and Faze" class="commenter"/><br><br>
    <input name="producer" required maxlength="50" type="text" placeholder="Producer, Eg. Del B" class="commenter"/><br><br>
    <input name="genre" required maxlength="50" type="text" placeholder="Genre, Eg. Beats" class="commenter"/><br><br>
    <input name="duration" required maxlength="10" type="text" placeholder="Duration, Eg. 4:01" class="commenter"/><br><br>
    <input name="year" required type="num" max="<?php echo date("Y") ?>" min="1999" placeholder="Year, Eg. <?php echo date("Y") ?>" class="commenter"/><br><br>
    <input name="language" required maxlength="100" type="text" placeholder="Language, Eg. Igbo, Yoruba, Pidgin, English and French ]" class="commenter"/><br><br>
	<textarea name="description" required placeholder="Description [ Describe your song ]" class="comment"></textarea>
    <input type="hidden" name="upload" value="Upload">
    
<br>
    <div class="file_button_container">
    <table><tr valign="middle"><td id="artstatus" style="color:#000; width:50%; font-size:.7em">Song Art</td><td><input name="art" required type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter"/></td></tr></table>
    </div></form>
    <h1 id="status"></h1>
  <p id="loaded_n_total"></p>
<table width="95%" style="background:rgba(0,0,0,.1)"><tr><td id="progressBar" style="background:#FFF; height:4px; width:1%"></td><td></td></tr></table>
	<form enctype="multipart/form-data" method="post">
    <div class="file_button_container">
    <table><tr valign="middle"><td id="filestatus" style="color:#000; width:50%; font-size:.7em">Song File</td><td><input accept="audio/*" required type="file" name="file" id="file" onChange="show()" class="commenter"/></td></tr></table>
    </div><br><br>

</td></tr><tr><td style="background:#000; height:20px; width:50%; border-right:thin solid #FFF" align="center">
	<input type="button" onclick="uploadFile()" value="Upload" class="commentbutton" style="color:#FFF;"/>
    </form>
</td><td style="background:#000; height:20px; color:#FFF; font-size:.8em" align="center" onClick="top.document.getElementsByTagName('iframe')[1].src='member.php';top.document.getElementById('intiating').style.top='0'">
Cancel
</td></tr><tr><td colspan="2"><br><br>
<div style="font-size:1.2em; text-align:center">Hint</div>
<div style="font-size:.8em; font-weight:100">&bull; The first song Uploaded in a day will appear in the new tab ahead of the rest.</div>
<br>
<div style="font-size:1.2em; text-align:center">Note</div>
<div style="font-size:.8em; font-weight:100">&bull; All Fields are required.. except *Artist(s) Featured*<br>&bull; Your Song Art <b>MUST</b> be a custom art of the Song File to be uploaded.<br> &bull; The Song File <b>MUST</b> have been customed with the Song Art, Title, Artist, Artist(s) Featured, Genre and Year.</div>
<br>
<div style="font-size:1.2em; text-align:center">Promotion</div>
<div style="font-size:.8em; font-weight:100">Take advantage of this platform to promote your song on our Home/Landing page, Music Player and Social Media pages to show your art to our Audience. Contact our agents;<br><br><table style="width:200px;height:0px"><tr><td>Contacts<br><a href="mailto:ng.greenbox@gmail.com?subject=Song%20Promotion" target="_new" style="font-weight:bolder; font-size:1.2em">Mail</a><br><a href="tel:2348050634922" target="_new" style="font-weight:bolder; font-size:1.2em">Call [+234(0)8050634922]</a>
</td></tr></table></div><br>
</td></tr></table><br>

</td></tr></table>

</td></tr></table>
<script>function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Song art - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Song File - "+d;}
	}}
window.onload = function() {
  	top.document.getElementById('title1').innerHTML='Song Upload';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }else{?>
	
<body style="background:#EEE">
<table align="center" style="width:70%; margin-bottom:50px"><tr><td align="center">
<br><br>
Muisc Upload
<br>
    <?php echo $ezege;?>
    <table align="center"><tr valign="top"><td width="95%" align="center" colspan="2"><br>
	<form enctype="multipart/form-data" method="post" id="pump">
    <input name="title" required maxlength="50" type="text" placeholder="Title, Eg. God of the earth" class="commenter" autofocus/><br><br>
    <input name="artistft" required maxlength="100" type="text" placeholder=" Artist(s) Featured, Eg. 2Baba and Faze" class="commenter"/><br><br>
    <input name="producer" required maxlength="50" type="text" placeholder="Producer, Eg. Del B" class="commenter"/><br><br>
    <input name="genre" required maxlength="50" type="text" placeholder="Genre, Eg. Beats" class="commenter"/><br><br>
    <input name="duration" required maxlength="10" type="text" placeholder="Duration, Eg. 4:01" class="commenter"/><br><br>
    <input name="year" required type="num" max="<?php echo date("Y") ?>" min="1999" placeholder="Year, Eg. <?php echo date("Y") ?>" class="commenter"/><br><br>
    <input name="language" required maxlength="100" type="text" placeholder="Language, Eg. Igbo, Yoruba, Pidgin, English and French ]" class="commenter"/><br><br>
	<textarea name="description" required placeholder="Description [ Describe your song ]" class="comment"></textarea>
    <input type="hidden" name="upload" value="Upload">
    
<br>
    <div class="file_button_container">
    <table><tr valign="middle"><td id="artstatus" style="color:#000; width:50%; font-size:.7em">Song Art</td><td><input name="art" required type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter"/></td></tr></table>
    </div></form>
    <h1 id="status"></h1>
  <p id="loaded_n_total"></p>
<table width="95%" style="background:rgba(0,0,0,.1)"><tr><td id="progressBar" style="background:#FFF; height:4px; width:1%"></td><td></td></tr></table>
	<form enctype="multipart/form-data" method="post">
    <div class="file_button_container">
    <table><tr valign="middle"><td id="filestatus" style="color:#000; width:50%; font-size:.7em">Song File</td><td><input accept="audio/*" required type="file" name="file" id="file" onChange="show()" class="commenter"/></td></tr></table>
    </div><br><br>

</td></tr><tr><td style="background:#000; height:20px; width:50%; border-right:thin solid #FFF" align="center">
	<input type="button" onclick="uploadFile()" value="Upload" class="commentbutton" style="color:#FFF;"/>
    </form>
</td><td style="background:#000; height:20px; color:#FFF; font-size:.8em" align="center" onClick="top.document.getElementsByTagName('iframe')[1].src='member.php';">
Cancel
</td></tr><tr><td colspan="2"><br><br>
<div style="font-size:1.2em; text-align:center">Hint</div>
<div style="font-size:.8em; font-weight:100">&bull; The first song Uploaded in a day will appear in the new tab ahead of the rest.</div>
<br>
<div style="font-size:1.2em; text-align:center">Note</div>
<div style="font-size:.8em; font-weight:100">&bull; All Fields are required.. except *Artist(s) Featured*<br>&bull; Your Song Art <b>MUST</b> be a custom art of the Song File to be uploaded.<br> &bull; The Song File <b>MUST</b> have been customed with the Song Art, Title, Artist, Artist(s) Featured, Genre and Year.</div>
<br>
<div style="font-size:1.2em; text-align:center">Promotion</div>
<div style="font-size:.8em; font-weight:100">Take advantage of this platform to promote your song on our Home/Landing page, Music Player and Social Media pages to show your art to our Audience. Contact our agents;<br><br><table style="width:200px;height:0px"><tr><td>Contacts<br><a href="mailto:ng.greenbox@gmail.com?subject=Song%20Promotion" target="_new" style="font-weight:bolder; font-size:1.2em">Mail</a><br><a href="tel:2348050634922" target="_new" style="font-weight:bolder; font-size:1.2em">Call [+234(0)8050634922]</a>
</td></tr></table></div><br>
</td></tr></table><br>

</td></tr></table>

</td></tr></table>
<script>function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Song art - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Song File - "+d;}
	}}
window.onload = function() {
  	top.document.getElementById('title1').innerHTML='Song Upload';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
<?php }?>

<?php }else{header("Location: member.php");}?>