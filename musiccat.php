<?php include("rab_dbcon.php");

extract($_GET);$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','musiccat: $c',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if ($c=='artist'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songArtist FROM songs");}
elseif ($c=='genre'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songGenre FROM songs");}
elseif ($c=='producer'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songProducer FROM songs");}
elseif ($c=='language'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs");}
elseif ($c=='year'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songYear FROM songs");}
$nr = mysqli_num_rows($sql1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 10;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<div class='pume'>" . $pn . '</div> &nbsp;';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$add1&c=$c')".'"'.">"."<div class='seemore'>" . $add1 . '</div></div>';
} else if ($pn == $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$sub1&c=$c')".'"'.">". "<div class='seemore'>".$sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$sub2&c=$c')".'"'.">".">"."<div class='seemore'>". $sub2 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$sub1&c=$c')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$add1&c=$c')".'"'.">"."<div class='seemore'>". $add1 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$add2&c=$c')".'"'.">"."<div class='seemore'>". $add2 . '</div></div>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$sub1&c=$c')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume' style='color:#000'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('musiccat.php?pn=$add1&c=$c')".'"'.">". "<div class='seemore'>".$add1 . '</div></div>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
if ($c=='artist'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songArtist FROM songs ORDER BY songArtist $limit");}
elseif ($c=='genre'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songGenre FROM songs ORDER BY songGenre $limit");}
elseif ($c=='genre'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs ORDER BY songLanguage $limit");}
elseif ($c=='producer'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songProducer FROM songs ORDER BY songProducer $limit");}
elseif ($c=='language'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs ORDER BY songLanguage $limit");}
elseif ($c=='year'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songYear FROM songs ORDER BY songYear $limit");}
$paginationDisplay = "";
if ($lastPage != 1){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td><div onClick=".'"'."pager('musiccat.php?pn=$previous&c=$c')".'"'.'>'."<div class='seemore'>".'&lang;</div></div> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><div class='paginationnon'></div></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {

        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'><div onClick=".'"'."pager('musiccat.php?pn=$nextPage&c=$c')".'"'.'><div'." class='seemore'>&rang;</div></div> ".'</td></tr></table>';} 
	else {$paginationDisplay .= "<td><div class='paginationnon'></div></td></tr></table>";}
}		
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<style>
.seemore{padding:15px 0}
.pum{display:inline-block;color:#000}
.pume{display:inline-block;padding:20px;color:#000}
</style>
</head>

<?php if ($detect->isMobile()){?>

<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="padding-bottom:70px">
<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700; text-transform:uppercase">
<?php echo $c;?>
</td></tr></table>

<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songGenre=trim(htmlspecialchars_decode($songGenre));
		$songLanguage=trim(htmlspecialchars_decode($songLanguage));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		$a=$counter%5;
		if($c=='artist'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songArtist='$songArtist' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }
     
		elseif($c=='genre'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songGenre='$songGenre' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
			<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songGenre?>&c=genre','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songGenre"?>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>			 		
<?php }
		elseif($c=='language'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songLanguage='$songLanguage' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songLanguage?>&c=language','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songLanguage"?>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table> 		
<?php }
		elseif($c=='producer'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songProducer='$songProducer' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
          <table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songProducer?>&c=producer','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songProducer"?>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>			
<?php } 		
		elseif($c=='year'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songYear='$songYear' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songYear?>&c=year','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songYear"?>
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
<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700;text-transform:capitalize"><?php echo $c;?></td></tr></table>

<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songGenre=trim(htmlspecialchars_decode($songGenre));
		$songLanguage=trim(htmlspecialchars_decode($songLanguage));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		$a=$counter%5;
		if($c=='artist'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songArtist='$songArtist' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
		<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	
     <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $songArtist ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
          </td></tr></table>
          </td></tr></table>
          
	</td></tr></table>

<?php }			 		
		
		elseif($c=='genre'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songGenre='$songGenre' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
		<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songGenre?>&c=genre','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	
     <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $songGenre ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
          </td></tr></table>
          </td></tr></table>
          
	</td></tr></table>

<?php }			 		
		elseif($c=='language'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songLanguage='$songLanguage' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
		<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songLanguage?>&c=language','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	
     <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $songLanguage ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
          </td></tr></table>
          </td></tr></table>
          
	</td></tr></table>

<?php }
 		
		elseif($c=='producer'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songProducer='$songProducer' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
			 <table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songProducer?>&c=producer','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	
     <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $songProducer ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
          </td></tr></table>
          </td></tr></table>
          
	</td></tr></table>

<?php }
 		
		elseif($c=='year'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songYear='$songYear' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}?>
          <table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songYear?>&c=year','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	
     <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $songYear ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
          </td></tr></table>
          </td></tr></table>
          
	</td></tr></table>
<?php }}?>
</td></tr></table>

<?php echo $paginationDisplay;?>
  </fieldset>
  
</td><td style="width:auto"></td></tr></table><script>function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}</script></body></html>

<?php }?>
