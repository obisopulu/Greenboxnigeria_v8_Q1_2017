<html>
<body onLoad="top.document.getElementById('intiating').style.top='-2000';">
<?php include("../rab_dbcon.php"); 
$today = date("Y-m-d"); 
extract($_GET);
$play=trim($play);
if ($play){
	$querys = mysqli_query($cxn, "SELECT * FROM songs WHERE songID ='$play' LIMIT 1") or die("result no work sha sha");
	extract(mysqli_fetch_assoc($querys));
	$songPlay++;
	mysqli_query($cxn, "UPDATE songs SET songPlay='$songPlay' WHERE songID ='$play' LIMIT 1") or die("result no work sha sha update");

	mysqli_query($cxn, "INSERT INTO  play ( playID, playUser, playSongID, playDate) VALUES  (NULL , '$anonymousName' , '$songID','$today')") or die("Couldn't execute play Reg.111");
	}
elseif ($copy){
	if  ($copy=='music'){
		$querys = mysqli_query($cxn, "SELECT * FROM songs WHERE songID ='$musicID'")	or die("result no work sha sha");
		extract(mysqli_fetch_assoc($querys));
			
		mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP, copyDate) VALUES  (NULL , '$anonymousName' , '$musicID', 'music  $SongArtist - $songTitle  $songArtistFt' ,'$userIP','$today')") or die("Couldn't execute copy Reg.");
		}
	if  ($copy=='album'){
			$today = date("Ymd"); 			
			mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'album $album' ,'$userIP','$today')")or die("Couldn't execute copy Reg.11");
		}
	if  ($copy=='label'){
				
			mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'label $label' ,'$userIP','$today')")or die("Couldn't execute copy Reg.2");
		}
	if  ($copy=='blog'){
				
			mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'blog $blog' ,'$userIP','$today')")or die("Couldn't execute copy Reg.3");
		}
	if  ($copy=='person'){
				
$sql = mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'person $person' ,'$userIP','$today')")or die("Couldn't execute copy Reg.4");
		}
	if  ($copy=='video'){
				
$sql = mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'video $video' , '$userIP','$today')")or die("Couldn't execute copy Reg.5");
		}
	}
if($downID){
$querys = mysqli_query($cxn, "SELECT * FROM songs WHERE songID ='$downID'")
		or die("result no work sha shaq");
	extract(mysqli_fetch_assoc($querys));
	
			$getUser = mysqli_query($cxn, "SELECT *  from anonymous where anonymousIP='$userIP' LIMIT 1")or die("Couldn't execute insert query anonys.");
			extract(mysqli_fetch_assoc($getUser));
			echo $anonymousID;echo $userIP;
			echo $anonymousDownload++;
			echo '<br>'.$downID.' '.$songID;
			mysqli_query($cxn, "UPDATE anonymous SET anonymousDownload='$anonymousDownload' WHERE anonymousID='$anonymousID' LIMIT 1")
			or die("Couldn't execute insert query anon121145.");
			echo '<br>'.$songDownload++;
			
			mysqli_query($cxn, "UPDATE songs SET songDownload='$songDownload' WHERE songID='$downID' LIMIT 1")
			or die("Couldn't execute insert query songs");
			
			mysqli_query($cxn, "INSERT INTO  downloads ( downloadID, downloadUser, downloadSongID, downloadDate) VALUES  (NULL , '$anonymousName' , '$downID' ,'$today')")	or die("Couldn't execute insert query anon12116.");
echo $file = "../songs/$songURL";

    // grab the requested file's name
$file_name = $file;

// make sure it's a file before doing anything!
if(is_file($file_name) and $q=='hq') {

	/*
		Do any processing you'd like here:
		1.  Increment a counter
		2.  Do something with the DB
		3.  Check user permissions
		4.  Anything you want!
	*/

	// required for IE
	if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off');	}

	// get the file mime type using the file extension
	$mime = 'application/force-download';
	header('Pragma: public'); 	// required
	header('Expires: 0');		// no cache
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
	header('Cache-Control: private',false);
	header('Content-Type: '.$mime);
	header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: '.filesize($file_name));	// provide file size
	header('Connection: close');
	readfile($file_name)or die('sdfsdf');		// push it out
	exit();

}
}
if($viddownID){
$querys = mysqli_query($cxn, "SELECT * FROM videos WHERE videoID ='$viddownID'")
		or die("result no work sha shaqds fds fds f ds f");
	extract(mysqli_fetch_assoc($querys));
	
			$getUser = mysqli_query($cxn, "SELECT *  from anonymous where anonymousIP='$userIP' LIMIT 1")or die("Couldn't execute insert query anonys.");
			extract(mysqli_fetch_assoc($getUser));
			mysqli_query($cxn, "UPDATE anonymous SET anonymousDownload='$anonymousDownload' WHERE anonymousID='$anonymousID' LIMIT 1")
			or die("Couldn't execute insert query anon121145.");
			$videoDownload++;
			
			mysqli_query($cxn, "UPDATE videos SET videoDownload='$videoDownload' WHERE videoID='$viddownID' LIMIT 1")
			or die("Couldn't execute insert query songs");

			header("Location: $videoDownloadSRC");
}
else{echo "xxx";}
?>
<script>
window.history.back()
</script>
</body>
</html>