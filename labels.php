<?php include("rab_dbcon.php");

$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','labels',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

$sqllabels1 = mysqli_query ($cxn, "SELECT * FROM labels");
$nr = mysqli_num_rows($sqllabels1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 6;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<div class='pume'>" . $pn . '</div> &nbsp;';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$add1')".'"'.">"."<div class='seemore'>" . $add1 . '</div></div>';
} else if ($pn == $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$sub1')".'"'.">". "<div class='seemore'>".$sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$sub2')".'"'.">".">"."<div class='seemore'>". $sub2 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$sub1')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$add1')".'"'.">"."<div class='seemore'>". $add1 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$add2')".'"'.">"."<div class='seemore'>". $add2 . '</div></div>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$sub1')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume' style='color:#000'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('labels.php?pn=$add1')".'"'.">". "<div class='seemore'>".$add1 . '</div></div>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
$sqllabels = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY labelName $limit");
$paginationDisplay = "";
if ($lastPage != 1){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td><div onClick=".'"'."pager('labels.php?pn=$previous')".'"'.'>'."<div class='seemore'>".'&lang;</div></div> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><div class='paginationnon'></div></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {

        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'><div onClick=".'"'."pager('labels.php?pn=$nextPage')".'"'.'><div'." class='seemore'>&rang;</div></div> ".'</td></tr></table>';} 
	else {$paginationDisplay .= "<td><div class='paginationnon'></div></td></tr></table>";}
}				
?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
<style>
.seemore{padding:15px 0}
.pum{display:inline-block;color:#000}
.pume{display:inline-block;padding:20px;color:#000}
</style>
</head>

<?php if ($detect->isMobile()){ ?>

<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="padding-bottom:70px">
<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">LABELS</td></tr></table>
<?php
while($row=mysqli_fetch_assoc($sqllabels))
	{extract($row);	
		$labelName=trim(htmlspecialchars_decode($labelName));
		$labelOwner=trim(htmlspecialchars_decode($labelOwner));?>
		
          <table onClick="window.open('label.php?labelID=<?php echo $labelID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $labelName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php echo "$labelOwner"?>
          </td></tr></table>
          </td></tr></table>
          </td></tr></table>
		<?php }?>

<div style="width:95%; padding:5px;"><?php echo $paginationDisplay;?></div>

</td></tr></table>
<script>
function pager(x){
		window.open(x,'_self');
		top.document.getElementById('intiating').style.top='0';
	}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music Labels on GreenboxNigeria.com';
	_id('description').content='List Of Nigerian Music Labels';
	_id('keywords').content='latest Nigerian music Labels, fresh Nigerian music labels, new Nigerian music labels, Nigerian music labels, Nigerian songs labels, Nigerian tracks';
	top.document.getElementById('intiating').style.top='-2000';
}
</script>
</body>
</html>

<?php }else{?>

<body style="background:#EEE">
<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700;">LABELS</td></tr></table>

<?php
while($row=mysqli_fetch_assoc($sqllabels))
	{extract($row);
		$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
		$labelHistory=htmlspecialchars_decode($labelHistory);
		$labelArtists=htmlspecialchars_decode($labelArtists);
		$labelProducers=htmlspecialchars_decode($labelProducers);
		$labelOthers=htmlspecialchars_decode($labelOthers);
		?>
		<table onClick="window.open('label.php?labelID=<?php echo $labelID?>','_self');"><tr><td style="padding:10px 0; border-bottom:thin solid #DDD; font-size:.9em">
		
          <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $labelName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php echo "$labelOwner"?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }?>

<?php echo $paginationDisplay;?>

<script>
function pager(x){
		window.open(x,'_self');
	}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music Labels on GreenboxNigeria.com';
	_id('description').content='List Of Nigerian Music Labels';
	_id('keywords').content='latest Nigerian music Labels, fresh Nigerian music labels, new Nigerian music labels, Nigerian music labels, Nigerian songs labels, Nigerian tracks';
}
</script>
</body>
</html>

<?php }?>