<?php include("rab_dbcon.php");

$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','music',NULL,'','','','','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");
?>

<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>

<?php if ($detect->isMobile()){?>

<body>
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="padding-bottom:70px">

<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">A-Z INDEX</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songTitle ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=A-Z index','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ALBUM</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover', '') ORDER BY songAlbum ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	
		$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");
		while($row=mysqli_fetch_assoc($sql2))
		{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songAlbum";echo "<span class='blogtimestamp'><br>$songArtist";?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }
		}?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=album','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ARTIST</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songArtist FROM songs ORDER BY songArtist ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=artist','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">GENRE</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songGenre FROM songs WHERE songGenre NOT IN ('0','') ORDER BY songGenre ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songGenre?>&c=genre','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songGenre"?>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=genre','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">LANGUAGE</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs WHERE songLanguage NOT IN ('0','') ORDER BY songLanguage ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songLanguage?>&c=language','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songLanguage"?>
	</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=language','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>


<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">PRODUCER</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songProducer FROM songs WHERE songProducer NOT IN ('0','') ORDER BY songProducer ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songProducer?>&c=producer','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songProducer"?>
	</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=producer','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">RATING</td></tr></table>


<table class='freshtable' style='border-bottom:thin solid rgba(0,0,0,.2)'>
<tr><td class='freshlabel' onClick="window.open('musiclist.php?t=3&c=rating','_self');top.document.getElementById('intiating').style.top='0';">
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td><td style='text-align:right; padding-right:5px'>&bull;&bull;&bull;</td></tr><tr><td>
<tr><td class='freshlabel' onClick="window.open('musiclist.php?t=4&c=rating','_self');top.document.getElementById('intiating').style.top='0';">
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td><td style='text-align:right; padding-right:5px'>&bull;&bull;&bull;</td></tr><tr><td>
<tr><td class='freshlabel' onClick="window.open('musiclist.php?t=5&c=rating','_self');top.document.getElementById('intiating').style.top='0';">
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td><td style='text-align:right; padding-right:5px'>&bull;&bull;&bull;</td></tr></table>


<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">YEAR</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songYear FROM songs WHERE songYear NOT IN ('0','') ORDER BY songYear ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songYear?>&c=year','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songYear"?>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=year','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
</td></tr></table>


<script>function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';top.document.getElementById('intiating').style.top='-2000';}</script></body></html>

<?php }else{?>

<body style="background:#EEE">

<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">A-Z INDEX</td></tr></table>
<table style="margin:5px 5px 0 0; border-bottom:thin soild #000; font-size:.9em;"><tr valign="middle"><td style="width:30%; padding:5px">TITLE</td><td style="width:20%; padding:5px">ARTIST</td><td style="width:30%; padding:5px">ARTIST FEATURED</td><td style="width:20%; padding:5px">PRODUCER</td></tr>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songTitle ASC LIMIT 10");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<tr style="font-size:.9em;font-size:.8em; border-bottom:thin #DDD solid" onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');" valign="middle" id="highlight"><td style="width:30%; padding:10px"><?php echo $songTitle ?></td><td style="width:20%; padding:5px"><?php echo $songArtist ?></td><td style="width:30%; padding:5px"><?php echo $songArtistFt ?></td><td style="width:20%; padding:5px"><?php echo $songProducer ?></td></tr>
	<?php }?></table>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=A-Z index','_self');">More</div></td></tr></table>

<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ALBUM</td></tr></table>
<table style="margin:5px 5px 0 0; border-bottom:thin soild #000; font-size:.9em;"><tr valign="middle"><td style="width:40%; padding:5px">TITLE</td><td style="width:30%; padding:5px">ARTIST</td><td style="width:30%; padding:5px">YEAR</td></tr>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover', '') ORDER BY songAlbum ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	
		$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");
		while($row=mysqli_fetch_assoc($sql2))
		{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<tr style="font-size:.9em;font-size:.8em; border-bottom:thin #DDD solid" onClick="window.open('albumpreview.php?t=<?php echo $songAlbum?>','_self');" valign="middle" id="highlight"><td style="width:40%; padding:10px"><?php echo $songAlbum ?></td><td style="width:30%; padding:5px"><?php echo $songArtist ?></td><td style="width:30%; padding:5px"><?php echo $songYear ?></td></tr>
	<?php }
		}?></table>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=album','_self');">More</div></td></tr></table>

<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">ARTIST</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songArtist FROM songs ORDER BY songArtist ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table onClick="window.open('musiclist.php?t=<?php echo $songArtist?>&c=artist','_self');;"><tr><td style="padding:10px 0; border-bottom:thin solid #DDD; font-size:.9em">
		
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
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=artist','_self');">More</div></td></tr></table>

<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">GENRE</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songGenre FROM songs WHERE songGenre NOT IN ('0','') ORDER BY songGenre ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
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
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=genre','_self');">More</div></td></tr></table>

<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">LANGUAGE</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs WHERE songLanguage NOT IN ('0','') ORDER BY songLanguage ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songLanguage?>&c=language','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songLanguage"?>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=language','_self');">More</div></td></tr></table>


<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">PRODUCER</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songProducer FROM songs WHERE songProducer NOT IN ('0','') ORDER BY songProducer ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musiclist.php?t=<?php echo $songProducer?>&c=producer','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	&bull;
	</td></tr></table>
	</td>
	<td><?php echo "$songProducer"?>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=producer','_self');">More</div></td></tr></table>

<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">RATING</td></tr></table>


<table class='freshtable' style='border-bottom:thin solid rgba(0,0,0,.2)'>
<tr><td style="border-bottom:thin solid #DDD; " class='freshlabel' onClick="window.open('musiclist.php?t=3&c=rating','_self');">
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td></tr>
<tr><td style="border-bottom:thin solid #DDD; " class='freshlabel' onClick="window.open('musiclist.php?t=4&c=rating','_self');">
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td></tr>
<tr><td style="border-bottom:thin solid #DDD; " class='freshlabel' onClick="window.open('musiclist.php?t=5&c=rating','_self');">
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td></tr></table>


<table><tr><td align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">YEAR</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songYear FROM songs WHERE songYear NOT IN ('0','') ORDER BY songYear ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
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
	<?php }?>

<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiccat.php?c=year','_self');">More</div></td></tr></table>
</td></tr></table>


<script>function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';top.document.getElementById('intiating').style.top='-2000';}</script></body></html>

<?php }?>