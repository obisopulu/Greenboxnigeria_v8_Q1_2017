<?php include("rab_dbcon.php");

//mobile
extract($_GET);$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','blog',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");

if($key){$sqlblog1 = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogTag1 ='$key' OR blogTag2 ='$key' OR blogTag3 ='$key' OR blogTag4 ='$key' OR blogTag5 ='$key'");}
else{$sqlblog1 = mysqli_query ($cxn, "SELECT * FROM blog");}
$nr = mysqli_num_rows($sqlblog1);
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
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$add1')".'"'.">"."<div class='seemore'>" . $add1 . '</div></div>';
} else if ($pn == $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$sub1')".'"'.">". "<div class='seemore'>".$sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$sub2')".'"'.">".">"."<div class='seemore'>". $sub2 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$sub1')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$add1')".'"'.">"."<div class='seemore'>". $add1 . '</div></div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$add2')".'"'.">"."<div class='seemore'>". $add2 . '</div></div>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$sub1')".'"'.">"."<div class='seemore'>". $sub1 . '</div></div>';
    $centerPages .= "<div class='pume' style='color:#000'>" . $pn . '</div>';
    $centerPages .= "<div class='pum' "."onClick=".'"'."pager('blog.php?pn=$add1')".'"'.">". "<div class='seemore'>".$add1 . '</div></div>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
if($key){$sqlblog = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogTag1 ='$key' OR blogTag2 ='$key' OR blogTag3 ='$key' OR blogTag4 ='$key' OR blogTag5 ='$key' ORDER BY blogID DESC $limit");}
else{$sqlblog = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC $limit");}
$paginationDisplay = "";
if ($lastPage != 1){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td><div onClick=".'"'."pager('blog.php?pn=$previous')".'"'.'>'."<div class='seemore'>".'&lang;</div></div> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><div class='paginationnon'></div></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {

        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'><div onClick=".'"'."pager('blog.php?pn=$nextPage')".'"'.'><div'." class='seemore'>&rang;</div></div> ".'</td></tr></table>';} 
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

<?php if ($detect->isMobile()){?>

<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="padding-bottom:70px">
<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">NEWS FEED</td></tr></table>
<table><tr valign="top"><td style="padding:20px">
    <?php 
	if(date("w")==4){$sql1 = mysqli_query ($cxn, "SELECT * FROM quotes ORDER BY RAND() LIMIT 1");}else{$sql1 = mysqli_query ($cxn, "SELECT * FROM quotes ORDER BY quoteID DESC LIMIT 1");}
while($row=mysqli_fetch_assoc($sql1))
	{
		extract($row);	
    echo "<table style='color:#000; 'align='center'><tr><td><i>'' $quote ''</i><div style='text-align:right'> - $quoter</div></td></tr></table>";
	}?>
    </td></tr></table>

<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sqlblog))
	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogSource=trim(htmlspecialchars_decode($blogSource));?>
		
          <table onClick="window.open('blogarticle.php?blogID=<?php echo $blogID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td><td><?php echo $blogName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php if($blogSource){echo $blogSource;}else{echo "Featured";}echo  "</td><td width='4%'>&bull;</td><td width='48%'>$blogTimestamp" ?>
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
  	_id('title1').innerHTML='Nigerian Music News on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
	top.document.getElementById('intiating').style.top='-2000'
</script>
</body>
</html>

<?php }else{?>

<body style="background:#EEE">
<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700;">NEWS FEED</td></tr></table>

    <?php 
	if(date("w")==4){$sql1 = mysqli_query ($cxn, "SELECT * FROM quotes ORDER BY RAND() LIMIT 1");}else{$sql1 = mysqli_query ($cxn, "SELECT * FROM quotes ORDER BY quoteID DESC LIMIT 1");}
while($row=mysqli_fetch_assoc($sql1))
	{
		extract($row);	
    echo "<table style='color:#999; font-size:2em;font-family:mysecondFont; float:left'><tr><td>'$quote' - $quoter</td></tr></table>";
	}?>

<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sqlblog))
	{
		extract($row);?>
          <table onClick="window.open('blogarticle.php?blogID=<?php echo $blogID?>','_self');"><tr><td style="padding:10px 0;  font-size:.8em;border-bottom:thin #DDD solid;">
		
          <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:60px; height:60px;margin:10px; background:url(blogimg/<?php echo $blogPic ?>) center no-repeat; background-size:cover'><tr><td align="center">&bull;</td></tr></table>
          </td><td><?php echo $blogName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php if($blogSource){echo $blogSource;}else{echo "Featured";}echo  "</td><td width='4%'>&bull;</td><td width='48%'>$blogTimestamp" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
<table><tr><?php
if($blogTag1){?><td onClick="pager('blog.php?key=$blogTag1')" class='seemore'><?php echo $blogTag1?></td><?php }
if($blogTag2){?><td onClick="pager('blog.php?key=$blogTag2')" class='seemore'><?php echo $blogTag2?></td><?php }
if($blogTag3){?><td onClick="pager('blog.php?key=$blogTag3')" class='seemore'><?php echo $blogTag3?></td><?php }
if($blogTag4){?><td onClick="pager('blog.php?key=$blogTag4')" class='seemore'><?php echo $blogTag4?></td><?php }
if($blogTag5){?><td onClick="pager('blog.php?key=$blogTag5')" class='seemore'><?php echo $blogTag5?></td><?php }?></tr></table>
<?php $counter++;?><br><br><?php }?>

<?php echo $paginationDisplay;?>
  </fieldset>
  
  
</td><td style="width:auto">
</td></tr></table>
<script>
function pager(x){
		window.open(x,'_self');
	}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music News on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
	top.document.getElementById('intiating').style.top='-2000'
</script>
</body>
</html>

<?php }?>