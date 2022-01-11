<?php include("rab_dbcon.php");	extract($_GET);	extract($_POST);
if ($detect->isMobile()){
$today = date("Y-m-d"); 
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
	$today = date("Y-m-d"); 
	if($a){mysqli_query($cxn, "DELETE FROM songs WHERE songAlbum='$a' ");}
	if($xxxx){	
 	$SA=$songArtist; $SAl=$songAlbum; $SY=$songYear;
		$sql = mysqli_query($cxn, "SELECT * FROM songs WHERE  songAlbum='$xxxx'");while($row=mysqli_fetch_assoc($sql)){extract($row);
		mysqli_query($cxn, "UPDATE songs SET songArtist='$SA', songAlbum='$SAl', songYear='$SY' WHERE songID='$songID'")or die("hdbfjbdsjbfjds ");}
		}
	if($xx){
		if($manufactureDate!='new'){$today = '2015-12-12';}	$gbn = date("msi");		
				$picFile = str_replace(' ','_',"art_".$songArtist."_".$songAlbum.".png"); 
				move_uploaded_file($_FILES['picFile']['tmp_name'], "songsimg/$picFile");
		if($songTitle1){

		$songType1 = $_FILES['songFile1']['type']; 
		$songSize1 = $_FILES['songFile1']['size']; 
		$songFile1 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle1.".mp3");
		$songFile1 = str_replace('(','',$songFile1);
		$songFile1 = str_replace(')','',$songFile1);
		if($songYear1==''){$songYear1=$songYear;}
		move_uploaded_file($_FILES['songFile1']['tmp_name'], "songs/$songFile1");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle1', '$songArtist', '$songArtistFt1', '$songAlbum', '$picFile', '$songProducer1', '1', '$songLenght1', '$songType1', '$songSize1', '$songFile1', '$songGenre1', '$songDescription1', '$songYear1', '$songLanguage1', '$songRating1', '0', '0', '$today')") or die("result no work 10");
}
		
		if($songTitle2){

		$songType1 = $_FILES['songFile2']['type']; 
		$songSize1 = $_FILES['songFile2']['size']; 
		$songFile2 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle2.".mp3");
		$songFile2 = str_replace('(','',$songFile2);
		$songFile2 = str_replace(')','',$songFile2);
		if($songYear2==''){$songYear2=$songYear;}
		move_uploaded_file($_FILES['songFile2']['tmp_name'], "songs/$songFile2");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle2', '$songArtist', '$songArtistFt2', '$songAlbum', '$picFile', '$songProducer2', '2', '$songLenght2', '$songType1', '$songSize1', '$songFile2', '$songGenre2', '$songDescription2', '$songYear2', '$songLanguage2', '$songRating2', '0', '0', '$today')") or die("result no work 40");
}
		
		if($songTitle3){

		$songType1 = $_FILES['songFile3']['type']; 
		$songSize1 = $_FILES['songFile3']['size']; 
		$songFile3 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle3.".mp3");
		$songFile3 = str_replace('(','',$songFile3);
		$songFile3 = str_replace(')','',$songFile3);
		if($songYear3==''){$songYear3=$songYear;}
		move_uploaded_file($_FILES['songFile3']['tmp_name'], "songs/$songFile3");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle3', '$songArtist', '$songArtistFt3', '$songAlbum', '$picFile', '$songProducer3', '3', '$songLenght3', '$songType1', '$songSize1', '$songFile3', '$songGenre3', '$songDescription3', '$songYear3', '$songLanguage3', '$songRating3', '0', '0', '$today')") or die("result no work 30");
}


		
		if($songTitle4){

		$songType1 = $_FILES['songFile4']['type']; 
		$songSize1 = $_FILES['songFile4']['size']; 
		$songFile4 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle4.".mp3");
		$songFile4 = str_replace('(','',$songFile4);
		$songFile4 = str_replace(')','',$songFile4);
		if($songYear4==''){$songYear4=$songYear;}
		move_uploaded_file($_FILES['songFile4']['tmp_name'], "songs/$songFile4");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle4', '$songArtist', '$songArtistFt4', '$songAlbum', '$picFile', '$songProducer4', '4', '$songLenght4', '$songType1', '$songSize1', '$songFile4', '$songGenre4', '$songDescription4', '$songYear4', '$songLanguage4', '$songRating4', '0', '0', '$today')") or die("result no work 40");
}

		
		if($songTitle5){

		$songType1 = $_FILES['songFile5']['type']; 
		$songSize1 = $_FILES['songFile5']['size']; 
		$songFile5 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle5.".mp3");
		$songFile5 = str_replace('(','',$songFile5);
		$songFile5 = str_replace(')','',$songFile5);
		if($songYear5==''){$songYear5=$songYear;}
		move_uploaded_file($_FILES['songFile5']['tmp_name'], "songs/$songFile5");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle5', '$songArtist', '$songArtistFt5', '$songAlbum', '$picFile', '$songProducer5', '5', '$songLenght5', '$songType1', '$songSize1', '$songFile5', '$songGenre5', '$songDescription5', '$songYear5', '$songLanguage5', '$songRating5', '0', '0', '$today')") or die("result no work 50");
}


		
		if($songTitle6){

		$songType1 = $_FILES['songFile6']['type']; 
		$songSize1 = $_FILES['songFile6']['size']; 
		$songFile6 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle6.".mp3");
		$songFile6 = str_replace('(','',$songFile6);
		$songFile6 = str_replace(')','',$songFile6);
		if($songYear6==''){$songYear6=$songYear;}
		move_uploaded_file($_FILES['songFile6']['tmp_name'], "songs/$songFile6");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle6', '$songArtist', '$songArtistFt6', '$songAlbum', '$picFile', '$songProducer6', '6', '$songLenght6', '$songType1', '$songSize1', '$songFile6', '$songGenre6', '$songDescription6', '$songYear6', '$songLanguage6', '$songRating6', '0', '0', '$today')") or die("result no work 60");
}
		
		if($songTitle67){

		$songType1 = $_FILES['songFile7']['type']; 
		$songSize1 = $_FILES['songFile7']['size']; 
		$songFile7 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle7.".mp3");
		$songFile7 = str_replace('(','',$songFile7);
		$songFile7 = str_replace(')','',$songFile7);
		if($songYear7==''){$songYear7=$songYear;}
		move_uploaded_file($_FILES['songFile7']['tmp_name'], "songs/$songFile7");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle7', '$songArtist', '$songArtistFt7', '$songAlbum', '$picFile', '$songProducer7', '7', '$songLenght7', '$songType1', '$songSize1', '$songFile7', '$songGenre7', '$songDescription7', '$songYear7', '$songLanguage7', '$songRating7', '0', '0', '$today')") or die("result no work 70");
}
		
		if($songTitle8){

		$songType1 = $_FILES['songFile8']['type']; 
		$songSize1 = $_FILES['songFile8']['size']; 
		$songFile8 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle8.".mp3");
		$songFile8 = str_replace('(','',$songFile8);
		$songFile8 = str_replace(')','',$songFile8);
		if($songYear8==''){$songYear8=$songYear;}
		move_uploaded_file($_FILES['songFile8']['tmp_name'], "songs/$songFile8");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle8', '$songArtist', '$songArtistFt8', '$songAlbum', '$picFile', '$songProducer8', '8', '$songLenght8', '$songType1', '$songSize1', '$songFile8', '$songGenre8', '$songDescription8', '$songYear8', '$songLanguage8', '$songRating8', '0', '0', '$today')") or die("result no work 80");
}
		
		if($songTitle9){

		$songType1 = $_FILES['songFile9']['type']; 
		$songSize1 = $_FILES['songFile9']['size']; 
		$songFile9 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle9.".mp3");
		$songFile9 = str_replace('(','',$songFile9);
		$songFile9 = str_replace(')','',$songFile9);
		if($songYear9==''){$songYear9=$songYear;}
		move_uploaded_file($_FILES['songFile9']['tmp_name'], "songs/$songFile9");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle9', '$songArtist', '$songArtistFt9', '$songAlbum', '$picFile', '$songProducer9', '9', '$songLenght9', '$songType1', '$songSize1', '$songFile9', '$songGenre9', '$songDescription9', '$songYear9', '$songLanguage9', '$songRating9', '0', '0', '$today')") or die("result no work 90");
}
		
		if($songTitle10){

		$songType1 = $_FILES['songFile10']['type']; 
		$songSize1 = $_FILES['songFile10']['size']; 
		$songFile10 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle10.".mp3");
		$songFile10 = str_replace('(','',$songFile10);
		$songFile10 = str_replace(')','',$songFile10);
		if($songYear10==''){$songYear10=$songYear;}
		move_uploaded_file($_FILES['songFile10']['tmp_name'], "songs/$songFile10");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle10', '$songArtist', '$songArtistFt10', '$songAlbum', '$picFile', '$songProducer10', '10', '$songLenght10', '$songType1', '$songSize1', '$songFile10', '$songGenre10', '$songDescription10', '$songYear10', '$songLanguage10', '$songRating10', '0', '0', '$today')") or die("result no work 100");
}
		
		if($songTitle11){

		$songType1 = $_FILES['songFile11']['type']; 
		$songSize1 = $_FILES['songFile11']['size']; 
		$songFile11 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle11.".mp3");
		$songFile11 = str_replace('(','',$songFile11);
		$songFile11 = str_replace(')','',$songFile11);
		if($songYear11==''){$songYear11=$songYear;}
		move_uploaded_file($_FILES['songFile11']['tmp_name'], "songs/$songFile11");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle11', '$songArtist', '$songArtistFt11', '$songAlbum', '$picFile', '$songProducer11', '11', '$songLenght11', '$songType1', '$songSize1', '$songFile11', '$songGenre11', '$songDescription11', '$songYear11', '$songLanguage11', '$songRating11', '0', '0', '$today')") or die("result no work 110");
}
		
		if($songTitle12){

		$songType1 = $_FILES['songFile12']['type']; 
		$songSize1 = $_FILES['songFile12']['size']; 
		$songFile12 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle12.".mp3");
		$songFile12 = str_replace('(','',$songFile12);
		$songFile12 = str_replace(')','',$songFile12);
		if($songYear12==''){$songYear12=$songYear;}
		move_uploaded_file($_FILES['songFile12']['tmp_name'], "songs/$songFile12");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle12', '$songArtist', '$songArtistFt12', '$songAlbum', '$picFile', '$songProducer12', '12', '$songLenght12', '$songType1', '$songSize1', '$songFile12', '$songGenre12', '$songDescription12', '$songYear12', '$songLanguage12', '$songRating12', '0', '0', '$today')") or die("result no work 120");
}

		if($songTitle13){

		$songType1 = $_FILES['songFile13']['type']; 
		$songSize1 = $_FILES['songFile13']['size']; 
		$songFile13 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle13.".mp3");
		$songFile13 = str_replace('(','',$songFile13);
		$songFile13 = str_replace(')','',$songFile13);
		if($songYear13==''){$songYear13=$songYear;}
		move_uploaded_file($_FILES['songFile13']['tmp_name'], "songs/$songFile13");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle13', '$songArtist', '$songArtistFt13', '$songAlbum', '$picFile', '$songProducer13', '13', '$songLenght13', '$songType1', '$songSize1', '$songFile13', '$songGenre13', '$songDescription13', '$songYear13', '$songLanguage13', '$songRating13', '0', '0', '$today')") or die("result no work 130");
}

		if($songTitle14){

		$songType1 = $_FILES['songFile14']['type']; 
		$songSize1 = $_FILES['songFile14']['size']; 
		$songFile14 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle14.".mp3");
		$songFile14 = str_replace('(','',$songFile14);
		$songFile14 = str_replace(')','',$songFile14);
		if($songYear14==''){$songYear14=$songYear;}
		move_uploaded_file($_FILES['songFile14']['tmp_name'], "songs/$songFile14");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle14', '$songArtist', '$songArtistFt14', '$songAlbum', '$picFile', '$songProducer14', '14', '$songLenght14', '$songType1', '$songSize1', '$songFile14', '$songGenre14', '$songDescription14', '$songYear14', '$songLanguage14', '$songRating14', '0', '0', '$today')") or die("result no work 140");
}

		if($songTitle15){

		$songType1 = $_FILES['songFile15']['type']; 
		$songSize1 = $_FILES['songFile15']['size']; 
		$songFile15 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle15.".mp3");
		$songFile15 = str_replace('(','',$songFile15);
		$songFile15 = str_replace(')','',$songFile15);
		if($songYear15==''){$songYear15=$songYear;}
		move_uploaded_file($_FILES['songFile15']['tmp_name'], "songs/$songFile15");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle15', '$songArtist', '$songArtistFt15', '$songAlbum', '$picFile', '$songProducer15', '15', '$songLenght15', '$songType1', '$songSize1', '$songFile15', '$songGenre15', '$songDescription15', '$songYear15', '$songLanguage15', '$songRating15', '0', '0', '$today')") or die("result no work 150");
}

		if($songTitle16	){

		$songType1 = $_FILES['songFile16']['type']; 
		$songSize1 = $_FILES['songFile16']['size']; 
		$songFile16 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle16.".mp3");
		$songFile16 = str_replace('(','',$songFile16);
		$songFile16 = str_replace(')','',$songFile16);
		if($songYear16==''){$songYear16=$songYear;}
		move_uploaded_file($_FILES['songFile16']['tmp_name'], "songs/$songFile16");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle16', '$songArtist', '$songArtistFt16', '$songAlbum', '$picFile', '$songProducer16', '16', '$songLenght16', '$songType1', '$songSize1', '$songFile16', '$songGenre16', '$songDescription16', '$songYear16', '$songLanguage16', '$songRating16', '0', '0', '$today')") or die("result no work 160");
}

		if($songTitle17	){

		$songType1 = $_FILES['songFile17']['type']; 
		$songSize1 = $_FILES['songFile17']['size']; 
		$songFile17 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle17.".mp3");
		if($songYear17==''){$songYear17=$songYear;}
		move_uploaded_file($_FILES['songFile17']['tmp_name'], "songs/$songFile17");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle17', '$songArtist', '$songArtistFt17', '$songAlbum', '$picFile', '$songProducer17', '17', '$songLenght17', '$songType1', '$songSize1', '$songFile17', '$songGenre17', '$songDescription17', '$songYear17', '$songLanguage17', '$songRating17', '0', '0', '$today')") or die("result no work 170");
}

		if($songTitle18	){

		$songType1 = $_FILES['songFile18']['type']; 
		$songSize1 = $_FILES['songFile18']['size']; 
		$songFile18 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle18.".mp3");
		if($songYear18==''){$songYear18=$songYear;}
		move_uploaded_file($_FILES['songFile18']['tmp_name'], "songs/$songFile18");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle18', '$songArtist', '$songArtistFt18', '$songAlbum', '$picFile', '$songProducer18', '18', '$songLenght18', '$songType1', '$songSize1', '$songFile18', '$songGenre18', '$songDescription18', '$songYear18', '$songLanguage18', '$songRating18', '0', '0', '$today')") or die("result no work 180");
}

		if($songTitle19	){

		$songType1 = $_FILES['songFile19']['type']; 
		$songSize1 = $_FILES['songFile19']['size']; 
		$songFile19 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle19.".mp3");
		if($songYear19==''){$songYear19=$songYear;}
		move_uploaded_file($_FILES['songFile19']['tmp_name'], "songs/$songFile19");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle19', '$songArtist', '$songArtistFt19', '$songAlbum', '$picFile', '$songProducer19', '19', '$songLenght19', '$songType1', '$songSize1', '$songFile19', '$songGenre19', '$songDescription19', '$songYear19', '$songLanguage19', '$songRating19', '0', '0', '$today')") or die("result no work 190");
}
		if($songTitle20	){

		$songType1 = $_FILES['songFile20']['type']; 
		$songSize1 = $_FILES['songFile20']['size']; 
		$songFile20 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle20.".mp3");
		if($songYear20==''){$songYear20=$songYear;}
		move_uploaded_file($_FILES['songFile20']['tmp_name'], "songs/$songFile20");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle20', '$songArtist', '$songArtistFt20', '$songAlbum', '$picFile', '$songProducer20', '20', '$songLenght20', '$songType1', '$songSize1', '$songFile20', '$songGenre20', '$songDescription20', '$songYear20', '$songLanguage20', '$songRating20', '0', '0', '$today')") or die("result no work 200");
}

		if($songTitle21	){

		$songType1 = $_FILES['songFile21']['type']; 
		$songSize1 = $_FILES['songFile21']['size']; 
		$songFile21 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle21.".mp3");
		if($songYear21==''){$songYear21=$songYear;}
		move_uploaded_file($_FILES['songFile21']['tmp_name'], "songs/$songFile21");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle21', '$songArtist', '$songArtistFt21', '$songAlbum', '$picFile', '$songProducer21', '21', '$songLenght21', '$songType1', '$songSize1', '$songFile21', '$songGenre21', '$songDescription21', '$songYear21', '$songLanguage21', '$songRating21', '0', '0', '$today')") or die("result no work 210");
}

		if($songTitle22	){

		$songType1 = $_FILES['songFile22']['type']; 
		$songSize1 = $_FILES['songFile22']['size']; 
		$songFile22 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle22.".mp3");
		if($songYear22==''){$songYear22=$songYear;}
		move_uploaded_file($_FILES['songFile22']['tmp_name'], "songs/$songFile22");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle22', '$songArtist', '$songArtistFt22', '$songAlbum', '$picFile', '$songProducer22', '22', '$songLenght22', '$songType1', '$songSize1', '$songFile22', '$songGenre22', '$songDescription22', '$songYear22', '$songLanguage22', '$songRating22', '0', '0', '$today')") or die("result no work 220");
}

		if($songTitle23	){

		$songType1 = $_FILES['songFile23']['type']; 
		$songSize1 = $_FILES['songFile23']['size']; 
		$songFile23 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle23.".mp3");
		if($songYear23==''){$songYear23=$songYear;}
		move_uploaded_file($_FILES['songFile23']['tmp_name'], "songs/$songFile23");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle23', '$songArtist', '$songArtistFt23', '$songAlbum', '$picFile', '$songProducer23', '23', '$songLenght23', '$songType1', '$songSize1', '$songFile23', '$songGenre23', '$songDescription23', '$songYear23', '$songLanguage23', '$songRating23', '0', '0', '$today')") or die("result no work 230");
}


		if($songTitle24	){

		$songType1 = $_FILES['songFile24']['type']; 
		$songSize1 = $_FILES['songFile24']['size']; 
		$songFile24 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle24.".mp3");
		if($songYear24==''){$songYear24=$songYear;}
		move_uploaded_file($_FILES['songFile24']['tmp_name'], "songs/$songFile24");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle24', '$songArtist', '$songArtistFt24', '$songAlbum', '$picFile', '$songProducer24', '24', '$songLenght24', '$songType1', '$songSize1', '$songFile24', '$songGenre24', '$songDescription24', '$songYear24', '$songLanguage24', '$songRating24', '0', '0', '$today')") or die("result no work 240");
}

		if($songTitle25	){

		$songType1 = $_FILES['songFile25']['type']; 
		$songSize1 = $_FILES['songFile25']['size']; 
		$songFile25 = str_replace(' ','_',"gbn".$gbn."_".$songArtist."_".$songTitle25.".mp3");
		if($songYear25==''){$songYear25=$songYear;}
		move_uploaded_file($_FILES['songFile25']['tmp_name'], "songs/$songFile25");

		mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, '$songTitle25', '$songArtist', '$songArtistFt25', '$songAlbum', '$picFile', '$songProducer25', '25', '$songLenght25', '$songType1', '$songSize1', '$songFile25', '$songGenre25', '$songDescription25', '$songYear25', '$songLanguage25', '$songRating25', '0', '0', '$today')") or die("result no work 250");
}


}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/back_cascade.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;"><tr><td class="tab1">Album</td></tr><tr valign="middle"><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM songs WHERE  songAlbum='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr valign="middle"><td width="33.3%">
<input required type="text" placeholder="Album Artist" maxlength="50" class="commenter" style="width:44.755%;" name="songArtist" value="<?php echo $songArtist; ?>"> <input required type="text" placeholder="Album Name" maxlength="100" class="commenter" style="width:44.755%;"  name="songAlbum" value="<?php echo $songAlbum; ?>"></td><td width="33.3%"><input required type="number" min="1900" max="2050" placeholder="Album Year" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear" value="<?php echo $songYear; ?>"> </td></tr>
<tr><td colspan="3"><input type="hidden" name="xxxx" value="<?php echo $songAlbum?>"><input type="submit" value="Edit" class="commentbutton" style="width:100%; background:#444"/></td></tr></table>
<?php }}else{?>

<form method="post" enctype="multipart/form-data">
<table style="width:98.7%;" class="states"><tr valign="middle"><td width="33.3%">
<input required type="text" placeholder="Album Artist" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtist"> <input required type="text" placeholder="Album Name" maxlength="100" class="commenter" style="width:44.755%;"  name="songAlbum"></td><td width="33.3%"><input required type="number" min="1900" max="2050" placeholder="Album Year" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear"> <select name="manufactureDate" class="commenter" style="width:49.25%;" required><option value="new">New</option><option value="old">Old</option></select></td>
<td width="33.3%">Album Art <input type="file" style="background:#222;width:83%; opacity:	; background:#222" required  name="picFile" accept="image/*"></td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 1</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle1"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt1"></td><td width="33.3%">
<select name="songGenre1" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating1" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer1"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker1">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght1"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage1">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription1"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear1"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile1">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 2</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle2"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt2"></td><td width="33.3%">
<select name="songGenre2" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating2" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer2"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker2">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght2"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage2">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription2"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear2"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile2">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 3</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle3"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt3"></td><td width="33.3%">
<select name="songGenre3" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating3" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer3"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker3">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght3"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage3">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription3"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear3"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile3">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 4</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle4"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt4"></td><td width="33.3%">
<select name="songGenre4" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating4" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer4"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker4">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght4"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage4">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription4"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear4"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile4">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 5</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle5"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt5"></td><td width="33.3%">
<select name="songGenre5" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating5" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer5"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker5">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght5"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage5">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription5"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear5"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile5">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 6</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle6"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt6"></td><td width="33.3%">
<select name="songGenre6" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating6" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer6"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker6">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght6"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage6">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription6"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear6"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile6">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 7</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle7"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt7"></td><td width="33.3%">
<select name="songGenre7" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating7" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer7"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker7">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght7"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage7">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription7"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear7"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile7">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 8</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle8"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt8"></td><td width="33.3%">
<select name="songGenre8" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating8" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer8"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker8">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght8"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage8">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription8"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear8"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile8">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 9</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle9"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt9"></td><td width="33.3%">
<select name="songGenre9" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating9" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer9"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker9">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght9"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage9">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription9"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear9"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile9">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 10</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle10"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt10"></td><td width="33.3%">
<select name="songGenre10" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating10" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer10"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker10">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght10"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage10">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription10"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear10"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile10">
</td></tr><tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 11</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle11"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt11"></td><td width="33.3%">
<select name="songGenre11" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating11" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer11"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker11">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght11"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage11">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription11"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear11"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile11">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 12</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle12"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt12"></td><td width="33.3%">
<select name="songGenre12" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating12" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer2"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker12">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght12"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage12">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription12"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear12"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile12">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 13</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle13"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt13"></td><td width="33.3%">
<select name="songGenre13" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating13" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer13"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker13">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght13"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage13">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription13"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear13"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile13">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 14</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle14"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt14"></td><td width="33.3%">
<select name="songGenre14" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating14" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer14"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker14">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght14"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage14">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription14"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear14"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile14">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 15</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle15"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt15"></td><td width="33.3%">
<select name="songGenre15" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating15" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer15"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker15">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght15"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage15">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription15"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear15"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile15">
</td></tr><tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 16</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle16"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt16"></td><td width="33.3%">
<select name="songGenre16" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating16" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer16"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker16">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght16"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage16">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription16"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear16"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile16">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 17</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle17"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt17"></td><td width="33.3%">
<select name="songGenre17" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating17" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer17"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker17">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght17"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage17">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription17"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear17"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile17">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 18</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle18"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt18"></td><td width="33.3%">
<select name="songGenre18" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating18" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer18"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker18">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght18"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage18">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription18"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear18"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile18">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 19</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle19"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt19"></td><td width="33.3%">
<select name="songGenre19" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating19" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer19"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker19">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght19"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage19">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription19"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear19"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile19">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 20</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle20"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt20"></td><td width="33.3%">
<select name="songGenre20" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating20" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer20"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker20">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght20"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage20">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription20"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear20"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile20">
</td></tr><tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 21</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle21"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt21"></td><td width="33.3%">
<select name="songGenre21" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating21" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer21"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker21">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght21"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage21">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription21"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear21"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile21">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 22</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle22"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt22"></td><td width="33.3%">
<select name="songGenre22" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating22" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer22"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker22">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght22"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage22">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription22"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear22"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile22">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 23</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle23"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt23"></td><td width="33.3%">
<select name="songGenre23" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating23" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer23"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker23">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght23"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage23">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription23"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear23"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile23">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 24</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle24"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt24"></td><td width="33.3%">
<select name="songGenre24" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating24" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer24"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker24">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght24"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage24">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription24"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear24"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile24">
</td></tr>
<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3">Track 25</td></tr>
<tr><td width="33.3%">

<input type="text" placeholder="Song Title" maxlength="50" class="commenter" style="width:44.755%;"  name="songTitle25"> <input type="text" placeholder="Song ArtistFt" maxlength="50" class="commenter" style="width:44.755%;"  name="songArtistFt25"></td><td width="33.3%">
<select name="songGenre25" class="commenter" style="width:49.25%;" required><option disabled selected>Song Genre</option><option value="Beats">Beats</option><option value="Dancehall">Dancehall</option><option value="Gospel">Gospel</option><option value="Highlife">Highlife</option><option value="Hip Hop">Hip Hop</option><option value="Juju">Juju</option><option value="Pop">Pop</option><option value="R&amp;B">R&amp;B</option><option value="Rap">Rap</option><option value="Reggae">Reggae</option><option value="Skit">Skit</option><option value="Soul">Soul</option></select>
<select name="songRating25" class="commenter" style="width:49.25%;" required><option disabled selected>Song Rating</option><option value="3">3 Stars</option><option value="4">4 Stars</option><option value="5">5 Stars</option></select></td><td width="33.3%"><input type="text" placeholder="Song Producer" maxlength="50" class="commenter" style="width:94.5%;"  name="songProducer25"> <input style='display:none' type="text" placeholder="Song Beatmaker" maxlength="50" name="songBeatmaker25">
</td></tr><tr><td width="33.3%"><input type="text" placeholder="Song Lenght" maxlength="10" class="commenter" style="width:44.755%;"  name="songLenght25"> <input type="text" placeholder="Song Language" maxlength="100" class="commenter" style="width:44.755%;"  name="songLanguage25">
</td><td width="33.3%">
<input type="text" placeholder="Song Description" maxlength="1000" class="commenter" style="width:44.755%;"  name="songDescription25"> <input type="number" min="1900" max="2050" placeholder="Song Year [<?php echo $today?>]" maxlength="4" class="commenter" style="width:44.755%;"  name="songYear25"></td><td width="33.3%">Song File <input type="file" style="background:#222;width:83%; opacity:	; background:#222"  accept="audio/*" name="songFile25">
</td></tr>

<tr><td colspan="3" height="50px"></td></tr>
<tr><td colspan="3"><input type="hidden" name="xx" value="xx"><input type="submit" value="Add" class="commentbutton" style="width:100%; background:#444"/></td></tr></table>
</form>
<?php }?>

<table style="width:98.7%" class="states"><tr>
<td class="stats">Date</td>
<td class="stats">Name</td>
<td class="stats">Artist</td>
<td class="stats">Track count</td>
<td class="stats" width="5%">Edit</td>
<td class="stats" width="5%">Delete</td>
</tr>
<?php
	$sql = mysqli_query($cxn, "SELECT DISTINCT songAlbum FROM songs ORDER BY songID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;
$sql2 = mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum'");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}
$tracks=mysqli_num_rows($sql2);
if($a==0){echo "<tr class='stats1'>
<td>$dateUpdated</td>
<td>$songAlbum</td>
<td>$songArtist</td>
<td>$tracks</td>
<td style='height:30px;background:#119;cursor:pointer' onClick=".'"'."window.open('admin_album.php?edit=$songAlbum','_self')".'"'.">&raquo;</td>
<td style='height:30px;background:#911;cursor:pointer' onClick=".'"'."window.open('admin_album.php?a=$songAlbum','_self')".'"'.">&chi;</td>
</tr>";}else{echo "<tr class='stats'>
<td>$dateUpdated</td>
<td>$songAlbum</td>
<td>$songArtist</td>
<td>$tracks</td>
<td style='height:30px;background:#117;cursor:pointer' onClick=".'"'."window.open('admin_album.php?edit=$songAlbum','_self')".'"'.">&raquo;</td>
<td style='height:30px;background:#711;cursor:pointer' onClick=".'"'."window.open('admin_album.php?a=$songAlbum','_self')".'"'.">&chi;</td>
</tr>
";}$counter++;}?>
</table>
<br>
</td></tr></table>
</body>
</html>
<?php } ?>