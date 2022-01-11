<?php include("rab_dbcon.php");

$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','videos',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

$sqlvideos1 = mysqli_query ($cxn, "SELECT * FROM videos");
$nr = mysqli_num_rows($sqlvideos1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 5;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<div class='pume'>" . $pn . '</div> &nbsp;';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$add1')".'"'.">"."<div class='seemore'>" . $add1 . '</div></div>';
} else if ($pn == $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$sub1')".'"'.">". "<div class='seemore'>".$sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$sub2')".'"'.">".">"."<div class='seemore'>". $sub2 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$sub1')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$add1')".'"'.">"."<div class='seemore'>". $add1 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$add2')".'"'.">"."<div class='seemore'>". $add2 . '</div></div>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$sub1')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume' style='color:#000'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('videos.php?pn=$add1')".'"'.">". "<div class='seemore'>".$add1 . '</div></div>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
$sql = mysqli_query ($cxn, "SELECT * FROM videos ORDER BY videoID DESC $limit");
$paginationDisplay = "";
if ($lastPage != 1){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td><div onClick=".'"'."pager('videos.php?pn=$previous')".'"'.'>'."<div class='seemore'>".'&lang;</div></div> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><div class='paginationnon'></div></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {

        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'><div onClick=".'"'."pager('videos.php?pn=$nextPage')".'"'.'><div'." class='seemore'>&rang;</div></div> ".'</td></tr></table>';} 
	else {$paginationDisplay .= "<td><div class='paginationnon'></div></td></tr></table>";}
}			

?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
<style>
.seemore{padding:15px 0}
.pum{display:inline-block;color:#000}
.pume{display:inline-block;padding:15px;color:#000}
</style>
</head>
<?php if ($detect->isMobile()){?>
<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="padding-bottom:70px">
<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">VIDEOS</td></tr></table>
<table class='fresh'><tr><td>
<?php
$counter=1;
while($row=mysqli_fetch_assoc($sql))
{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('video.php?videoID=<?php echo $videoID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td
	></tr></table>
     </td></tr></table>
	<?php }?>

</td></tr></table>
<div style="width:95%; padding:5px;"><?php echo $paginationDisplay;?></div>

</td></tr></table>
<script>
function pager(x){
		window.open(x,'_self');
		top.document.getElementById('intiating').style.top='0';
	}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music Videos on GreenboxNigeria.com';
	_id('description').content='All Nigerian Music Videos';
	_id('keywords').content='latest Nigerian music videos, fresh Nigerian music videos, new Nigerian music videos, Nigerian music videos, Nigerian songs videos, Nigerian tracks';}
	top.document.getElementById('intiating').style.top='-2000';
</script>
</body>
</html>

<?php }else{?>

<body style="background:#EEE">
<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">VIDEOS</td></tr></table>
<table class='fresh'><tr><td>
<?php
$counter=1;
while($row=mysqli_fetch_assoc($sql))
{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		?>
	<table id="highlight" style='width:98%; margin:5px 0;' onClick="window.open('video.php?videoID=<?php echo $videoID?>','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td></tr></table>
     </td></tr></table>
	<?php }?>

</td></tr></table>
<?php echo $paginationDisplay;?>

<script>
function pager(x){
		window.open(x,'_self');
	}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music Videos on GreenboxNigeria.com';
	_id('description').content='All Nigerian Music Videos';
	_id('keywords').content='latest Nigerian music videos, fresh Nigerian music videos, new Nigerian music videos, Nigerian music videos, Nigerian songs videos, Nigerian tracks';}
</script>
</body>
</html>

<?php }?>