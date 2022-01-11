<?php include("rab_dbcon.php");

extract($_GET);$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','musiclist: $c - $t',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if ($t=='new'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs LIMIT 40");}
elseif ($c=='artist'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$t'");}
elseif ($c=='artistFt'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '%$t%'");}
elseif ($c=='genre'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songGenre='$t'");}
elseif ($c=='language'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songLanguage='$t'");}
elseif ($c=='producer'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songProducer='$t'");}
elseif ($c=='rating'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='$t'");}
elseif ($c=='year'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songYear='$t'");}
elseif ($t=='album'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover','')");}
else {$sql1 = mysqli_query ($cxn, "SELECT * FROM songs");}
$nr = mysqli_num_rows($sql1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 20;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<div class='pume'>" . $pn . '</div> &nbsp;';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$add1&t=$t&c=$c')".'"'.">"."<div class='seemore'>" . $add1 . '</div></div>';
} else if ($pn == $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$sub1&t=$t&c=$c')".'"'.">". "<div class='seemore'>".$sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$sub2&t=$t&c=$c')".'"'.">".">"."<div class='seemore'>". $sub2 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$sub1&t=$t&c=$c')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$add1&t=$t&c=$c')".'"'.">"."<div class='seemore'>". $add1 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$add2&t=$t&c=$c')".'"'.">"."<div class='seemore'>". $add2 . '</div></div>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$sub1&t=$t&c=$c')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume' style='color:#000'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiclist.php?pn=$add1&t=$t&c=$c')".'"'.">". "<div class='seemore'>".$add1 . '</div></div>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
if ($t=='new'){$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY dateUpdated DESC $limit");}
elseif ($c=='artist'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$t' ORDER BY songArtist $limit");}
elseif ($c=='artistFt'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '%$t%' ORDER BY songArtist $limit");}
elseif ($c=='genre'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songGenre='$t' ORDER BY songGenre $limit");}
elseif ($c=='language'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songLanguage='$t' ORDER BY songLanguage $limit");}
elseif ($c=='producer'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songProducer='$t' ORDER BY songProducer $limit");}
elseif ($c=='rating'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='$t' ORDER BY songTitle $limit");}
elseif ($c=='year'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songYear='$t' ORDER BY songTitle $limit");}
elseif ($t=='album'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover','') ORDER BY songAlbum $limit");}else{$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songTitle $limit");}
$paginationDisplay = "";
if ($lastPage != 1){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td><div onClick=".'"'."pager('musiclist.php?pn=$previous&t=$t&c=$c')".'"'.'>'."<div class='seemore'>".'<</div></div> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><div class='paginationnon'></div></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {

        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'><div onClick=".'"'."pager('musiclist.php?pn=$nextPage&t=$t&c=$c')".'"'.'><div'." class='seemore'>></div></div> ".'</td></tr></table>';} 
	else {$paginationDisplay .= "<td><div class='paginationnon'></div></td></tr></table>";}
}				

?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<style>
.seemore{padding:15px 0}
.pum{display:inline-block;color:#000}
.pume{display:inline-block;padding:15px;color:#000}
</style>
</head>

<?php if ($detect->isMobile()){ ?>
<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="padding-bottom:70px">
<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700; text-transform:uppercase">
<?php if($c=='year'){echo " Year ";} if($t=='RandB'){$t='R&amp;B';} echo $t; if($c=='rating'){echo " Star Rated";}?>
</td></tr></table>

<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		$a=$counter%2;if ($t=='album'){
			$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");while($row=mysqli_fetch_assoc($sql2)){extract($row);?>
	<table style='width:98%; margin:5px 0' onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songAlbum";echo "<span class='blogtimestamp'><br>$songArtist";?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table><?php }
}else{?>
<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
<?php }}?>


<div style="width:95%; padding:5px;"><?php echo $paginationDisplay;?></div>
</td></tr></table>
  
<script>
function pager(x){
		window.open(x,'_self');
		top.document.getElementById('intiating').style.top='0';
	}
function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';top.document.getElementById('intiating').style.top='-2000';}</script></body></html>

<?php }else{?>

<body style="background:#EEE">
<table><tr><td align="center" style=" background:#EEE; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700; text-transform:uppercase">
<?php if($c=='year'){echo " Year ";} if($t=='RandB'){$t='R&amp;B';} echo $t; if($c=='rating'){echo " Star Rated";}?>
</td></tr></table>

<?php 
if ($t=='album'){?>
<table style="margin:5px 5px 0 0; border-bottom:thin soild #000; font-size:.9em;"><tr valign="middle"><td style="width:40%; padding:5px">TITLE</td><td style="width:30%; padding:5px">ARTIST</td><td style="width:30%; padding:5px">YEAR</td></tr>
<?php }else{?>
<table style="margin:5px 5px 0 0; border-bottom:thin soild #000; font-size:.9em;"><tr valign="middle"><td style="width:30%; padding:5px">TITLE</td><td style="width:20%; padding:5px">ARTIST</td><td style="width:30%; padding:5px">ARTIST FEATURED</td><td style="width:20%; padding:5px">PRODUCER</td></tr>
<?php }
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		$a=$counter%2;if ($t=='album'){
			$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");while($row=mysqli_fetch_assoc($sql2)){extract($row);?>
	<tr style="font-size:.9em;font-size:.8em; border-bottom:thin #DDD solid" onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');" valign="middle" id="highlight"><td style="width:40%; padding:10px"><?php echo $songAlbum ?></td><td style="width:30%; padding:5px"><?php echo $songArtist ?></td><td style="width:30%; padding:5px"><?php echo $songYear ?></td></tr><?php }
}else{?>
<tr style="font-size:.9em;font-size:.8em; border-bottom:thin #DDD solid" onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');" valign="middle" id="highlight"><td style="width:30%; padding:10px"><?php echo $songTitle ?></td><td style="width:20%; padding:5px"><?php echo $songArtist ?></td><td style="width:30%; padding:5px"><?php echo $songArtistFt ?></td><td style="width:20%; padding:5px"><?php echo $songProducer ?></td></tr>
<?php }}?>
</table>

<?php echo $paginationDisplay;?>
  
<script>
function pager(x){
		window.open(x,'_self');
	}
function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}</script></body></html>

<?php }?>