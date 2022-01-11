<?php include("rab_dbcon.php");

$today = date("Y-m-d"); 
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>
<?php if ($detect->isMobile()){?>

<body style="font-size:.8em">
<table style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000" align="center"><tr><td class="tab2">TRAFFIC REPORT<br><br></td></tr></table>
<table style="width:98.7%" align="center"><tr><td width="25%" align="center">

<table class="states"><tr><td class="stats">USERS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous"))?></td></tr></table>

<table class="states"><tr><td class="stats">MEMBERS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT memberID from member"))?></td></tr></table>

<table class="states"><tr><td class="stats">PAGE VISITS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT anonymousID from anonymous"))?></td></tr></table>

<table class="states"><tr><td class="stats">DAYS ACTIVE</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousRegDate from anonymous"))?> Days</td></tr></table>

<table><tr><td class="tab2" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000">STOCK<br><br></td></tr></table>

<table class="states"><tr><td class="stats">MUSIC</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from songs"))?></td></tr></table>

<table class="states"><tr><td class="stats">ALBUMS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT songAlbum from songs WHERE songAlbum NOT IN ('', 'cover', 'single', 'mixtape')"))?></td></tr></table>

<table class="states"><tr><td class="stats">VIDEOS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from videos"))?></td></tr></table>

<table class="states"><tr><td class="stats">PEOPLE</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from persons"))?></td></tr></table>

<table class="states"><tr><td class="stats">LABELS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from labels"))?></td></tr></table>

<table class="states"><tr><td class="stats">NEWS FEED</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from blog"))?></td></tr></table>


<table><tr><td align="center"><br>
<?php $platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop'"))?>
<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr><td colspan="2" class="stats" align="center">Platform<br><br></td></tr><tr><td class="stats1">Mobile</td></tr><tr><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile'"))/$platforms)*100)?>%</td></tr><tr><td class="stats1"><br>Desktop</td></tr><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop'"))/$platforms)*100)?>%</td></tr></table>

</td></tr><tr><td colspan="2" align="center"><br>
<?php
$morning=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1' AND '1100' ");
$afternoon=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1101' AND '1601' ");
$evening=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1601' AND '2359' ");

$morning=mysqli_num_rows($morning);
$afternoon=mysqli_num_rows($afternoon);
$evening=mysqli_num_rows($evening);

$times=$morning+$afternoon+$evening;

$morning=round(($morning/$times)*100);
$afternoon=round(($afternoon/$times)*100);
$evening=round(($evening/$times)*100);
?>
<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr><td class="stats" colspan="3" align="center"><br>Time of the day<br><br></td></tr><tr><td class="stats1">Morning</td></tr><tr><td class="stats2"><?php echo $morning ?>%</td></tr><tr><td class="stats1">Afternoon</td></tr><tr><td class="stats2"><?php echo $afternoon ?>%</td></tr><tr><td class="stats1">Evening</td></tr><tr><td class="stats2"><?php echo $evening ?>%</td></tr></table>

</td></tr><tr><td align="center"><br>

<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr><td class="stats" align="center"><br>Users Today<br><br></td></tr><tr><td class="stats1"><?php echo date("F j, Y") ?></td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$today'"))?> User(s)</td></tr></table>
</td></tr></table>
<br>
<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr valign="top"><td width="33%" class="stats" align="center"><br>Device<br><br></td></tr><tr valign="top"><td class="stats" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousDevice, COUNT(*) FROM anonymous Group BY anonymousDevice ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
	
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' ";echo"><tr><td> ";if(!$anonymousDevice){echo"Not Assigned";}else{echo substr_replace($anonymousDevice,'',20);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousDevice='$anonymousDevice'"))."</td></tr></table>";$counter++;
	}	?><br>
</td></tr><tr><td width="33%" class="stats" align="center" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><br>Country<br><br></td></tr><tr><td class="stats" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCountry, COUNT(*) FROM anonymous Group BY anonymousCountry ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
	
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px;' "; echo"><tr><td> ";if(!$anonymousCountry){echo"Not Assigned";}else{echo substr_replace($anonymousCountry,'',20);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCountry='$anonymousCountry'"))."</td></tr></table>";$counter++;
	}	?><br>
 </td></tr><tr><td width="33%" class="stats" align="center" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><br>City<br><br></td></tr><tr><td class="stats" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCity, COUNT(*) FROM anonymous Group BY anonymousCity ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;$sql2=mysqli_query($cxn, "SELECT anonymousCountry from anonymous WHERE anonymousCity='$anonymousCity' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);
	
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' "; echo"><tr><td> ";if(!$anonymousCity){echo"Not Assigned";}else{echo substr_replace($anonymousCity,'',20);}echo" [$anonymousCountry]</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCity='$anonymousCity'"))."</td></tr></table>";}$counter++;
	}	?><br>
</td></tr></table>

<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000 "><tr><td width="25%" colspan="2" align="center" style="padding:5px">
<table class="states"><tr><td class="stats" width="50%" align="center">Pages Visited<br><br></td></tr><tr valign="top"><td class="stats1" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousRating, COUNT(*) FROM anonymous Group BY anonymousRating ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' "; echo"><tr><td style='width:90%;'> ";if(!$anonymousRating){echo"Not Assigned";}else{echo substr_replace($anonymousRating,'',80);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRating='$anonymousRating'"))."</td></tr></table>";$counter++;
	}	?><br>
</td></tr><tr><td class="stats" align="center" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000 ">Traffic Source<br><br></td></tr><tr><td class="stats1" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousFrom, COUNT(*) FROM anonymous Group BY anonymousFrom ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' "; echo"><tr><td style='width:90%;'> ";if(!$anonymousFrom){echo"Not Assigned";}else{echo substr_replace($anonymousFrom,'',80);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousFrom='$anonymousFrom'"))."</td></tr></table>";$counter++;
	}	?><br>
</td></tr></table></td></tr></table>
<br>
</td></tr></table>
</body>
</html>

<?php }else{?>
<body style="font-size:.8em">
<table align="center"><tr><td align="center">
<table style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000" align="center"><tr><td class="tab2">TRAFFIC REPORT<br><br></td></tr></table>
<table style="width:98.7%" align="center"><tr><td width="25%" align="center">

<table class="states"><tr><td class="stats">USERS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous"))?></td></tr></table>

</td><td width="25%" align="center">

<table class="states"><tr><td class="stats">MEMBERS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT memberID from member"))?></td></tr></table>

</td><td width="25%" align="center">

<table class="states"><tr><td class="stats">PAGE VISITS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT anonymousID from anonymous"))?></td></tr></table>

</td><td width="25%" align="center">

<table class="states"><tr><td class="stats">DAYS ACTIVE</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousRegDate from anonymous"))?> Days</td></tr></table>

</td></tr><tr><td colspan="4">
<table><tr><td class="tab2" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000">STOCK<br><br></td></tr></table>
<table><tr><td width="16%">
<table class="states"><tr><td class="stats">MUSIC</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from songs"))?></td></tr></table>

</td><td width="16%" align="center">

<table class="states"><tr><td class="stats">ALBUMS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT songAlbum from songs WHERE songAlbum NOT IN ('', 'cover', 'single', 'mixtape')"))?></td></tr></table>

</td><td width="16%" align="center">

<table class="states"><tr><td class="stats">VIDEOS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from videos"))?></td></tr></table>

</td><td width="16%" align="center">

<table class="states"><tr><td class="stats">PEOPLE</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from persons"))?></td></tr></table>

</td><td width="16%" align="center">

<table class="states"><tr><td class="stats">LABELS</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from labels"))?></td></tr></table>

</td><td width="16%" align="center">

<table class="states"><tr><td class="stats">NEWS FEED</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from blog"))?></td></tr></table>
</td></tr></table>

</td></tr><tr><td width="25%" align="center"><br>
<?php $platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop'"))?>
<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr><td colspan="2" class="stats" align="center">Platform<br><br></td></tr><tr><td class="stats1">Mobile</td><td class="stats1">Desktop</td></tr><tr><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile'"))/$platforms)*100)?>%</td><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop'"))/$platforms)*100)?>%</td></tr></table>

</td><td width="25%" colspan="2" align="center"><br>
<?php
$morning=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1' AND '1100' ");
$afternoon=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1101' AND '1601' ");
$evening=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1601' AND '2359' ");

$morning=mysqli_num_rows($morning);
$afternoon=mysqli_num_rows($afternoon);
$evening=mysqli_num_rows($evening);

$times=$morning+$afternoon+$evening;

$morning=round(($morning/$times)*100);
$afternoon=round(($afternoon/$times)*100);
$evening=round(($evening/$times)*100);
?>
<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr><td class="stats" colspan="3" align="center">Time of the day<br><br></td></tr><tr><td class="stats1">Morning</td><td class="stats1">Afternoon</td><td class="stats1">Evening</td></tr><tr><td class="stats2"><?php echo $morning ?>%</td><td class="stats2"><?php echo $afternoon ?>%</td><td class="stats2"><?php echo $evening ?>%</td></tr></table>

</td><td width="25%" align="center"><br>

<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr><td class="stats" align="center">Users Today<br><br></td></tr><tr><td class="stats1"><?php echo date("F j, Y") ?></td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$today'"))?> User(s)</td></tr></table>
</td></tr></table>
<br>
<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr valign="top"><td width="33%" class="stats" align="center">Device<br><br></td><td width="33%" class="stats" align="center">Country<br><br></td><td width="33%" class="stats" align="center">City<br><br></td></tr><tr valign="top"><td class="stats" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousDevice, COUNT(*) FROM anonymous Group BY anonymousDevice ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
	
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' ";echo"><tr><td> ";if(!$anonymousDevice){echo"Not Assigned";}else{echo substr_replace($anonymousDevice,'',20);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousDevice='$anonymousDevice'"))."</td></tr></table>";$counter++;
	}	?><br>
</td><td class="stats" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCountry, COUNT(*) FROM anonymous Group BY anonymousCountry ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
	
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px;' "; echo"><tr><td> ";if(!$anonymousCountry){echo"Not Assigned";}else{echo substr_replace($anonymousCountry,'',20);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCountry='$anonymousCountry'"))."</td></tr></table>";$counter++;
	}	?><br>
 </td><td class="stats" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCity, COUNT(*) FROM anonymous Group BY anonymousCity ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;$sql2=mysqli_query($cxn, "SELECT anonymousCountry from anonymous WHERE anonymousCity='$anonymousCity' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);
	
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' "; echo"><tr><td> ";if(!$anonymousCity){echo"Not Assigned";}else{echo substr_replace($anonymousCity,'',20);}echo" [$anonymousCountry]</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCity='$anonymousCity'"))."</td></tr></table>";}$counter++;
	}	?><br>
</td></tr></table>

<table class="states" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000 "><tr><td width="25%" colspan="2" align="center" style="padding:5px">
<table class="states"><tr><td class="stats" width="50%" align="center">Pages Visited<br><br></td><td class="stats" align="center">Traffic Source<br><br></td></tr><tr valign="top"><td class="stats1" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousRating, COUNT(*) FROM anonymous Group BY anonymousRating ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' "; echo"><tr><td style='width:90%;'> ";if(!$anonymousRating){echo"Not Assigned";}else{echo substr_replace($anonymousRating,'',80);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRating='$anonymousRating'"))."</td></tr></table>";$counter++;
	}	?><br>
</td><td class="stats1" align="center">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousFrom, COUNT(*) FROM anonymous Group BY anonymousFrom ORDER BY COUNT(*) DESC LIMIT 20");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		
	echo "<table style='border-bottom:thin solid #000; width:70%; margin-top:10px' "; echo"><tr><td style='width:90%;'> ";if(!$anonymousFrom){echo"Not Assigned";}else{echo substr_replace($anonymousFrom,'',80);}echo"</td><td style='text-align:right'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousFrom='$anonymousFrom'"))."</td></tr></table>";$counter++;
	}	?><br>
</td></tr></table></td></tr></table>
<br>
</td></tr></table>
</body>
</html>

<?php }?>