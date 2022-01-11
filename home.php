<?php include("rab_dbcon.php");

$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousCountry,anonymousCity,anonymousTime,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','home',NULL,'','','','$anonymousCountry','','$anonymousTime','$today')") or die("Couldn't execute insert query anon.56");
?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>
<?php if ($detect->isMobile()){?>
<body onLoad="top.document.getElementById('intiating').style.top='-2000';">
<table style="background:url(images/body_bg.png) right bottom no-repeat;background-size:contain;"><tr><td align="center" style="padding-bottom:70px">

<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='Maxx' ORDER BY RAND() LIMIT 1");
while($row=mysqli_fetch_assoc($sql)) 
 
	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		?>
	<table style='width:98%; margin:5px 0' onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr style='border-bottom:thin solid #EEE; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'><span style="font-size:.6em; font-weight:700">SPONSORED</span>
	<table><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($songRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$songTitle"; if($songArtistFt){echo "<span class='blogtimestamp'> ft $songArtistFt</span>";} echo "<span class='blogtimestamp'><br>$songArtist"; if($songProducer){echo " &bull; $songProducer";}?></span>
	</td><td style='text-align:right;'>&bull;&bull;&bull;</td></tr></table>
	</td></tr></table>
<?php }?>
<table><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">TOP SONGS</td></tr></table>
<?php

$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='5' ORDER BY RAND() LIMIT 5");
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

<br><br>
<table class="fresh" align="center"><tr><td align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700" onClick="window.open('musiclist.php?t=new', '_self')">NEW</td></tr></table>

<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY dateUpdated DESC LIMIT 5");
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
<table><tr valign="middle"><td colspan="5" align="right"><div class="seemore" onClick="window.open('musiclist.php?t=new','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<br><br>

<table class="fresh" align="center"><tr><td onClick="linker('videos')" align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">VISUALS</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM videos ORDER BY videoID DESC LIMIT 4");
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

<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('videos.php','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<br><br>

<table class="fresh" align="center"><tr><td onClick="linker('blog')" align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">NEWS FEED</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 4");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogWriteup=trim(htmlspecialchars_decode($blogWriteup));?>
		
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
<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('blog.php','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<br><br>

<table class="fresh" align="center"><tr><td onClick="linker('people')" align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">PEOPLE</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM persons ORDER BY RAND() LIMIT 4");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));?>
		
          <table onClick="window.open('person.php?personID=<?php echo $personID?>','_self');top.document.getElementById('intiating').style.top='0';"><tr><td style="padding:10px 0; border-bottom:thin solid #EEE; font-size:.9em">
		
          <table><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $personStageName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
		<?php echo "$personProfession1 </td><td width='4%'>&bull;</td><td width='48%'>$personLabel" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }?>

<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('people.php','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>
<br><br>

<table class="fresh" align="center"><tr><td onClick="linker('labels')" align="center" style=" background:#FFF; color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">LABELS</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY RAND() LIMIT 5");$counter=1;
while($row=mysqli_fetch_assoc($sql))
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

<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('labels.php','_self');top.document.getElementById('intiating').style.top='0';">More</div></td></tr></table>

</td></tr></table>
<script>
function linker(x){
	top.document.getElementsByTagName("iframe")[1].src=x+'.php';
	top.document.getElementById('intiating').style.top='0'
}
</script>
</body>
</html>

<?php }else{?>

<body style="background:#EEE">
<table><tr><td style="background:EFEFEFcolor:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700" align="center">NEW</td></tr></table>
<table style="margin:5px 5px 0 0; border-bottom:thin soild #000; font-size:.9em;'" valign="middle"><td style="width:30%; padding:5px">TITLE</td><td style="width:20%; padding:5px">ARTIST</td><td style="width:30%; padding:5px">ARTIST FEATURED</td><td style="width:20%; padding:5px">PRODUCER</td></tr>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY dateUpdated DESC LIMIT 10"); $counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt)); $a=$counter%2; ?>
	<tr style="font-size:.9em;font-size:.8em; border-bottom:thin #DDD solid" onClick="window.open('musicpreview.php?t=<?php echo $songID?>','_self');" valign="middle" id="highlight"><td style="width:30%; padding:10px"><?php echo $songTitle ?></td><td style="width:20%; padding:5px"><?php echo $songArtist ?></td><td style="width:30%; padding:5px"><?php echo $songArtistFt ?></td><td style="width:20%; padding:5px"><?php echo $songProducer ?></td></tr>
	<?php $counter++; }?></table>
<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('musiclist.php?t=new','_self');">More</div></td></tr></table>

<table><tr><td style="background:EFEFEFcolor:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700" align="center">VISUALS</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM videos ORDER BY videoID DESC LIMIT 3");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));?>
	<table style='width:98%; margin:5px 0;' onClick="window.open('video.php?videoID=<?php echo $videoID?>','_self');"><tr style='border-bottom:thin solid #DDD; height:50px; font-size:.9em' valign='middle'><td style='padding:10px 0'>
	<table id="highlight"><tr><td style='width:50px; padding:10px 0' align='center'>
	<table style='width:50px; height:50px'><tr><td align='center'>
	<?php if($videoRating == '5'){echo"<div style='background:url(images/star1.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>"; }else{echo "&bull;";}?>
	</td></tr></table>
	</td>
	<td><?php echo "$videoTitle"; if($videoArtistFt){echo "<span class='blogtimestamp'> ft $videoArtistFt</span>";} echo "<br><span class='blogtimestamp'>$videoArtist"; if($videoDirector){echo " &bull; $videoDirector";}?></span>
	</td></tr></table>
     </td></tr></table>
	<?php }?>

<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('videos.php','_self');">More</div></td></tr></table>

<table><tr><td style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700" align="center">NEWS FEED</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 4");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogWriteup=trim(htmlspecialchars_decode($blogWriteup));?>
		<table onClick="window.open('blogarticle.php?blogID=<?php echo $blogID?>','_self');"><tr><td style="padding:10px 0;  font-size:.8em;border-bottom:thin #DDD solid;">
		
          <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:60px; height:60px;margin:10px'><tr><td align="center">&bull;</td></tr></table>
          </td><td><?php echo $blogName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td >
		<?php if($blogSource){echo $blogSource;}else{echo "Featured";}echo  "</td><td width='4%'>&bull;</td><td width='48%'>$blogTimestamp" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table><?php }?>

<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('blog.php','_self');">More</div></td></tr></table>

<table align="center"><tr><td onClick="linker('people')" align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">PEOPLE</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM persons ORDER BY RAND() LIMIT 4");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));?>
		
          <table onClick="window.open('person.php?personID=<?php echo $personID?>','_self');;"><tr><td style="padding:10px 0; border-bottom:thin solid #DDD; font-size:.9em">
		
          <table id="highlight"><tr><td style='width:50px;' align='center' rowspan="2">
          <table style='width:50px; height:50px'><tr><td align='center'>
          &bull;
          </td></tr></table>
          </td>
          <td><?php echo $personStageName ?></td></tr><tr><td>
		<table class='blogtimestamp'><tr><td>
		<?php echo "$personProfession1 </td><td width='4%'>&bull;</td><td width='48%'>$personLabel" ?>
          </td></tr></table>
          </td></tr></table>
          
          </td></tr></table>
		<?php }?>

<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('people.php','_self');">More</div></td></tr></table>
<br><br>

<table align="center"><tr><td onClick="linker('labels')" align="center" style="color:#000; height:50px; border-bottom:solid thin #000; font-size:.8em; font-weight:700">LABELS</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY RAND() LIMIT 5");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$labelName=trim(htmlspecialchars_decode($labelName));
		$labelOwner=trim(htmlspecialchars_decode($labelOwner));?>
		
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

<table><tr><td colspan='5' align="right"><div class="seemore" onClick="window.open('labels.php','_self');">More</div></td></tr></table>

</td></tr></table>
</body>
</html>

<?php }?>