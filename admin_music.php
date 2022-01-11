<?php include("rab_dbcon.php");	extract($_GET);	extract($_POST);

	$today = date("Y-m-d"); 
	if($s){mysqli_query($cxn, "DELETE FROM songs WHERE songID='$s' LIMIT 1");}
	if($xxxx){	
		mysqli_query($cxn, "UPDATE songs SET songTitle='$songTitle', songArtist='$songArtist', songArtistFt='$songArtistFt', songAlbum='$songAlbum', songProducer='$songProducer', songBeatmaker='$songBeatmaker', songLenght='$songLenght', songGenre='$songGenre', songRating='$songRating', songDescription='$songDescription', songYear='$songYear', songLanguage='$songLanguage', dateUpdated='$dateUpdated' WHERE songID='$xxxx'")or die("hdbfjbdsjbfjds ");}
	if($xx){

		if($manufactureDate!='new'){$today = '2015-12-12';}	$gbn = date("msi");
		$songType = $_FILES['songFile']['type']; 
		$songSize = $_FILES['songFile']['size']; 
		$picFile = str_replace(' ','_',"art_".$songTitle."_".$songArtist.".png"); 
		$songFile = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle.".mp3");
		$songFile = str_replace('(','',$songFile);
		$songFile = str_replace(')','',$songFile);
		
		move_uploaded_file($_FILES['picFile']['tmp_name'], "songsimg/$picFile");
		move_uploaded_file($_FILES['songFile']['tmp_name'], "songs/$songFile");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle', '$songArtist', '$songArtistFt', '$songAlbum', '$picFile', '$songProducer', '$songBeatmaker', '$songLenght', '$songType', '$songSize', '$songFile', '$songGenre', '$songDescription', '$songYear', '$songLanguage', '$songRating', '0', '0', '$today')") or die("result no work 10");
}
/*picFile
songFile
songType
songSize*/
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>

<?php if ($detect->isMobile()){?>


<body>
<table style="width:98.7%;" class="states"><tr><td>Music</td></tr></table>
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM songs WHERE  songID='$edit' ORDER BY songID DESC LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr valign="middle"><td width="33.3%"><br>
<input type="text" required placeholder="Song Title" maxlength="50" class="commenter" style="width:95%;"  name="songTitle" value="<?php echo $songTitle?>"></td></tr>
<tr><td><br><input type="text" placeholder="Song Artist" maxlength="50" class="commenter" style="width:95%;"  name="songArtist" value="<?php echo $songArtist?>"></td></tr>
<tr><td><br><input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:95%;"  name="songArtistFt" value="<?php echo $songArtistFt?>"></td></tr>
<tr><td><br><input type="text" placeholder="Song Album" maxlength="100" class="commenter" style="width:95%;"  name="songAlbum" value="<?php echo $songAlbum?>"></td></tr>
<tr><td><br><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:95%;"  name="songProducer" value="<?php echo $songProducer?>"></td></tr>
<tr><td><br><input type="text" placeholder="Track Number" maxlength="50" class="commenter" style="width:95%;"  name="songBeatmaker" value="<?php echo $songBeatmaker?>"></td></tr>
<tr><td><br><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:95%;"  name="songLenght" value="<?php echo $songLenght?>"></td></tr>
<tr><td><br><select name="songGenre" class="commenter" style="width:49.25%;" required>
<option value="Beats" <?php if($songGenre=='Beats'){echo 'selected';}?>>Beats</option>
<option value="Gospel" <?php if($songGenre=='Gospel'){echo 'selected';}?>>Gospel</option>
<option value="Highlife" <?php if($songGenre=='Highlife'){echo 'selected';}?>>Highlife</option>
<option value="Hip Hop" <?php if($songGenre=='Hip Hop'){echo 'selected';}?>>Hip Hop</option>
<option value="Juju" <?php if($songGenre=='Juju'){echo 'selected';}?>>Juju</option>
<option value="Pop" <?php if($songGenre=='Pop'){echo 'selected';}?>>Pop</option>
<option value="R&amp;B" <?php if($songGenre=='R&amp;B'){echo 'selected';}?>>R&amp;B</option>
<option value="Rap" <?php if($songGenre=='Rap'){echo 'selected';}?>>Rap</option>
<option value="Reggae" <?php if($songGenre=='Reggae'){echo 'selected';}?>>Reggae</option>
<option value="Skit" <?php if($songGenre=='Skit'){echo 'selected';}?>>Skit</option>
<option value="Soul" <?php if($songGenre=='Soul'){echo 'selected';}?>>Soul</option></select></td></tr>
<tr><td><br><select name="songRating" class="commenter" style="width:49.25%;" required>
<option value="3" <?php if($songRating=='3'){echo 'selected';}?>>3 Stars</option>
<option value="4" <?php if($songRating=='4'){echo 'selected';}?>>4 Stars</option>
<option value="5" <?php if($songRating=='5'){echo 'selected';}?>>5 Stars</option></select></td></tr>
<tr><td><br><input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:95%;"  name="songDescription" value="<?php echo $songDescription?>"></td></tr>
<tr><td><br><input type="number" min="1900" max="2050" placeholder="Song Year" maxlength="4" class="commenter" style="width:95%;"  name="songYear" value="<?php echo $songYear?>"></td></tr>
<tr><td><br><input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:95%;"  name="songLanguage" value="<?php echo $songLanguage?>"></td></tr>
<tr><td><br><input type="text" name="dateUpdated" class="commenter" maxlength="10" style="width:95%;" value="<?php echo $dateUpdated?>"></td></tr>
<tr><td><br><input type="hidden" name="xxxx" value="<?php echo $songID?>"></td></tr>
<tr><td><br><input type="submit" value="Edit" class="commentbutton" style="width:100%; background:#000; color:#FFF"/></td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states" align="center"><tr valign="middle"><td><br>
<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:95%;"  name="songTitle"></td></tr>
<tr><td><br><input type="text" placeholder="Song Artist" maxlength="50" class="commenter" style="width:95%;"  name="songArtist"></td></tr>
<tr><td><br><input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:95%;"  name="songArtistFt"></td></tr>
<tr><td><br><input type="text" placeholder="Song Album" maxlength="100" class="commenter" style="width:95%;"  name="songAlbum"></td></tr>
<tr><td><br><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:95%;"  name="songProducer"></td></tr>
<tr><td><br><input type="text" placeholder="Track Number" maxlength="50" class="commenter" style="width:95%;"  name="songBeatmaker"></td></tr>
<tr><td><br><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:95%;"  name="songLenght"></td></tr>
<tr><td><br><select name="songGenre" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select></td></tr>
<tr><td><br><select name="songRating" class="commenter" style="width:49.25%;" required>
<option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td></tr>
<tr><td><br><input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:95%;"  name="songDescription"></td></tr>
<tr><td><br><input type="number" min="1900" max="2050" placeholder="Song Year" maxlength="4" class="commenter" style="width:95%;"  name="songYear"></td></tr>
<tr><td><br><input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:95%;"  name="songLanguage"></td></tr>
<tr><td><br><select name="manufactureDate" class="commenter" style="width:99.5%;" required><option value="new">New</option><option value="old">Old</option></select></td></tr>
<tr><td><br>Song Art <input type="file"  name="picFile" accept="image/*"></td></tr>
<tr><td><br>Song File <input type="file"  name="songFile" accept="audio/*"><input type="hidden" name="xx" value="xx"></td></tr>
<tr><td><br><input type="submit" value="Add" class="commentbutton" style="width:100%; background:#000; color:#FFF"/></td></tr></table>
</form>
<?php }?>

<br><br>

<?php
$counter=1;
$sql = mysqli_query($cxn, "SELECT * FROM songs ORDER BY songID DESC LIMIT 20");while($row=mysqli_fetch_assoc($sql)){extract($row);?>

	<table style='width:98%; margin:5px 0'><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<?php echo $counter;?>
	</td>
	<td><?php echo "$songArtist - $songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";}  if($songProducer){echo " &bull; $songProducer";}?></span>
	</td></tr></table>
     <?php echo "<table><tr style='height:30px;background:#EEE;'>
	<td onClick=".'"'."window.open('admin_music.php?edit=$songID','_self')".'"'." align='center'>EDIT</td>
	<td onClick=".'"'."window.open('admin_music.php?s=$songID','_self')".'"'." align='center'>DELETE</td>
	</tr></table>";?>
	</td></tr></table>

<?php $counter++;}?>





<?php }else{?>





<body>
<table><tr><td>Music</td></tr><tr valign="middle"><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM songs WHERE  songID='$edit' ORDER BY songID DESC LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr valign="middle"><td width="33.3%">
<input type="text" required placeholder="Song Title" maxlength="50" class="commenter" style="width:95%;"  name="songTitle" value="<?php echo $songTitle?>">
</td><td width="33.3%">
<input type="text" placeholder="Song Artist" maxlength="50" class="commenter" style="width:95%;"  name="songArtist" value="<?php echo $songArtist?>">
</td><td width="33.3%">
<input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:95%;"  name="songArtistFt" value="<?php echo $songArtistFt?>">
</td></tr><tr><td width="33.3%">
<input type="text" placeholder="Song Album" maxlength="100" class="commenter" style="width:95%;"  name="songAlbum" value="<?php echo $songAlbum?>">
</td><td width="33.3%">
<input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:95%;"  name="songProducer" value="<?php echo $songProducer?>">
</td><td width="33.3%">
<input type="text" placeholder="Track Number" maxlength="50" class="commenter" style="width:95%;"  name="songBeatmaker" value="<?php echo $songBeatmaker?>">
</td></tr><tr><td width="33.3%">
<input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:95%;"  name="songLenght" value="<?php echo $songLenght?>">
</td><td width="33.3%">
<select name="songGenre" class="commenter" style="width:49.25%;" required>
<option value="Beats" <?php if($songGenre=='Beats'){echo 'selected';}?>>Beats</option>
<option value="Gospel" <?php if($songGenre=='Gospel'){echo 'selected';}?>>Gospel</option>
<option value="Highlife" <?php if($songGenre=='Highlife'){echo 'selected';}?>>Highlife</option>
<option value="Hip Hop" <?php if($songGenre=='Hip Hop'){echo 'selected';}?>>Hip Hop</option>
<option value="Juju" <?php if($songGenre=='Juju'){echo 'selected';}?>>Juju</option>
<option value="Pop" <?php if($songGenre=='Pop'){echo 'selected';}?>>Pop</option>
<option value="R&amp;B" <?php if($songGenre=='R&amp;B'){echo 'selected';}?>>R&amp;B</option>
<option value="Rap" <?php if($songGenre=='Rap'){echo 'selected';}?>>Rap</option>
<option value="Reggae" <?php if($songGenre=='Reggae'){echo 'selected';}?>>Reggae</option>
<option value="Skit" <?php if($songGenre=='Skit'){echo 'selected';}?>>Skit</option>
<option value="Soul" <?php if($songGenre=='Soul'){echo 'selected';}?>>Soul</option></select>

<select name="songRating" class="commenter" style="width:49.25%;" required>
<option value="3" <?php if($songRating=='3'){echo 'selected';}?>>3 Stars</option>
<option value="4" <?php if($songRating=='4'){echo 'selected';}?>>4 Stars</option>
<option value="5" <?php if($songRating=='5'){echo 'selected';}?>>5 Stars</option></select>
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:95%;"  name="songDescription" value="<?php echo $songDescription?>">
</td></tr><tr><td width="33.3%">
<input type="number" min="1900" max="2050" placeholder="Song Year" maxlength="4" class="commenter" style="width:95%;"  name="songYear" value="<?php echo $songYear?>">
</td><td width="33.3%">
<input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:95%;"  name="songLanguage" value="<?php echo $songLanguage?>">
</td><td width="33.3%">
<input type="text" name="dateUpdated" class="commenter" maxlength="10" style="width:95%;" value="<?php echo $dateUpdated?>">
</td></tr><tr>
<input type="hidden" name="xxxx" value="<?php echo $songID?>">
<td colspan="3"><input type="submit" value="Edit" class="commentbutton" style="width:100%; background:#000; color:#FFF"/></td></tr></table>
</form>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr valign="middle"><td width="33.3%">
<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:95%;"  name="songTitle"></td><td width="33.3%">
<input type="text" placeholder="Song Artist" maxlength="50" class="commenter" style="width:95%;"  name="songArtist"></td><td width="33.3%">
<input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:95%;"  name="songArtistFt"></td></tr><tr><td width="33.3%">
<input type="text" placeholder="Song Album" maxlength="100" class="commenter" style="width:95%;"  name="songAlbum"></td><td width="33.3%">
<input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:95%;"  name="songProducer"></td><td width="33.3%">
<input type="text" placeholder="Track Number" maxlength="50" class="commenter" style="width:95%;"  name="songBeatmaker"></td></tr><tr><td width="33.3%">
<input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:95%;"  name="songLenght"></td><td width="33.3%">
<select name="songGenre" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select>
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:95%;"  name="songDescription"></td></tr><tr><td width="33.3%">
<input type="number" min="1900" max="2050" placeholder="Song Year" maxlength="4" class="commenter" style="width:95%;"  name="songYear"></td><td width="33.3%">
<input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:95%;"  name="songLanguage"></td><td width="33.3%">
<select name="manufactureDate" class="commenter" style="width:99.5%;" required><option value="new">New</option><option value="old">Old</option></select>
</td></tr><tr><td width="33.3%">Song Art <input type="file"  name="picFile" accept="image/*"></td>
<td colspan="">Song File <input type="file"  name="songFile" accept="audio/*"><input type="hidden" name="xx" value="xx">
<td width="33.3%" colspan="3"><input type="submit" value="Add" class="commentbutton" style="width:100%; background:#000; color:#FFF"/></td></tr></table>
</form>
<?php }?>

<table style="width:98.7%; text-align:left; font-size:.8em; margin-top:50px" class="states"><tr>
<td width="10%">Date</td>
<td width="30%">Title</td>
<td >Artist</td>
<td >Artist Featured</td>
<td  width="5%"></td>
<td  width="5%"></td>
</tr>
<?php date("F n, Y");
	$sql = mysqli_query($cxn, "SELECT * FROM songs ORDER BY songID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;

echo "
<tr style='border-bottom:solid thin #EEE'>
<td>$dateUpdated</td>
<td>$songTitle</td>
<td>$songArtist</td>
<td>$songArtistFt</td>
<td style='height:30px;cursor:pointer; background:#EEE' onClick=".'"'."window.open('admin_music.php?edit=$songID','_self')".'"'." align='center'>EDIT</td>
<td style='height:30px;cursor:pointer; background:#EEE' onClick=".'"'."window.open('admin_music.php?s=$songID','_self')".'"'." align='center'>DELETE</td>
</tr>
";$counter++;}?>
</table>
<br>
</td></tr></table>

</body>
</html>
<?php } ?>