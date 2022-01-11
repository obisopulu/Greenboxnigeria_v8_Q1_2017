<?php include("rab_dbcon.php");
extract($_GET);
$sql = mysqli_query($cxn, "SELECT anonymousRegDate FROM anonymous WHERE anonymousRegDate='$date'");while($row=mysqli_fetch_assoc($sql)){extract($row);}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
if ($detect->isMobile()){

?>


<table><tr><td class="tab1">Traffic</td></tr><tr><td align="center" style="font-size:.8em">
<table><tr><td class="tab2">Activities On <span style="font-size:1.5em"><?php echo $anonymousRegDate; ?></span><br><br></td></tr></table>
<table style="width:98.7%"><tr><td align="center">

<table class="states"><tr><td class="stats">Users</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$anonymousRegDate' "))?></td></tr></table>

</td></tr><tr><td align="center">

<table class="states"><tr><td class="stats">Page Visits</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT anonymousID from anonymous WHERE anonymousRegDate='$anonymousRegDate' "))?></td></tr></table>

</td></tr><tr><td align="center"><br>
<?php $platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"))?>
<table class="states"><tr><td colspan="2" class="stats">Platform</td></tr><tr><td class="stats1">Mobile</td><td class="stats1">Desktop</td></tr><tr><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100)?>%</td><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100)?>%</td></tr></table>

</td></tr><tr><td align="center"><br>
<?php
$morning=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1' AND '1100' AND anonymousRegDate='$anonymousRegDate' ");
$afternoon=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1101' AND '1601'  AND anonymousRegDate='$anonymousRegDate'");
$evening=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1601' AND '2359' AND anonymousRegDate='$anonymousRegDate' ");

$morning=mysqli_num_rows($morning);
$afternoon=mysqli_num_rows($afternoon);
$evening=mysqli_num_rows($evening);

$times=$morning+$afternoon+$evening;

$morning=round(($morning/$times)*100);
$afternoon=round(($afternoon/$times)*100);
$evening=round(($evening/$times)*100);
?>
<table class="states"><tr><td class="stats" colspan="3">Time of the day</td></tr><tr><td class="stats1">Morning</td></tr><tr><td class="stats2"><?php echo $morning ?>%</td></tr><tr><td class="stats1">Afternoon</td></tr><tr><td class="stats2"><?php echo $afternoon ?>%</td></tr><tr><td class="stats1">Evening</td></tr><tr><td class="stats2"><?php echo $evening ?>%</td></tr></table>

</td></tr></table>
<br>
<table style="width:98.7%" class="states"><tr valign="top"><td width="33%" class="stats">Device</td></tr>
<tr valign="top"><td class="stats" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousDevice, COUNT(*) FROM anonymous WHERE anonymousRegDate='$anonymousRegDate' Group BY anonymousDevice ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousDevice){
	echo "<table ";if($a==0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousDevice</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousDevice='$anonymousDevice' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
		}}	?><br>
</td></tr>
<tr><td width="33%" class="stats">Country</td></tr>
<tr><td class="stats" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCountry, COUNT(*) FROM anonymous  WHERE anonymousRegDate='$anonymousRegDate'  Group BY anonymousCountry ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousCountry){
	echo "<table ";if($a!=0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousCountry</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCountry='$anonymousCountry' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
	}}	?><br>
 </td></tr>
<tr><td width="33%" class="stats">City</td></tr><tr><td class="stats" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCity, COUNT(*) FROM anonymous  WHERE anonymousRegDate='$anonymousRegDate' Group BY anonymousCity ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;$sql2=mysqli_query($cxn, "SELECT anonymousCountry from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$anonymousRegDate'  LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);
		if(!$anonymousCity){
	echo "<table ";if($a==0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousCity [$anonymousCountry]</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";}$counter++;
	}}	?><br>
</td></tr></table>

<table class="states" style="width:98.7%"><tr><td width="25%" colspan="2" align="center">
<table class="states"><tr><td class="stats" width="50%">Pages Visited</td></tr><tr valign="top"><td class="stats1" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousRating, COUNT(*) FROM anonymous WHERE anonymousRegDate='$anonymousRegDate'  Group BY anonymousRating ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousRating){
	echo "<table ";if($a==0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousRating</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRating='$anonymousRating' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
	}	?><br>
</td></tr>

<tr><td class="stats">Traffic Source</td></tr><tr><td class="stats1" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousFrom, COUNT(*) FROM anonymous WHERE anonymousRegDate='$anonymousRegDate'  Group BY anonymousFrom ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		
	echo "<table ";if($a!=0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousFrom</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousFrom='$anonymousFrom' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
	}}	?><br>
</td></tr></table></td></tr></table>
<br>
</td></tr></table>

<?php }else{?>

<table><tr><td class="tab1">Traffic</td></tr><tr><td align="center" style="font-size:.8em">
<table><tr><td class="tab2">Activities On <span style="font-size:1.5em"><?php echo $anonymousRegDate; ?></span><br><br></td></tr></table>
<table style="width:98.7%"><tr><td width="25%" align="center" colspan="">

<table class="states"><tr><td class="stats">Users</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$anonymousRegDate' "))?></td></tr></table>

</td><td width="25%" align="center">

<table class="states"><tr><td class="stats">Page Visits</td></tr><tr><td class="stats2"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT anonymousID from anonymous WHERE anonymousRegDate='$anonymousRegDate' "))?></td></tr></table>

</td></tr><tr><td width="25%" align="center"><br>
<?php $platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"))?>
<table class="states"><tr><td colspan="2" class="stats">Platform</td></tr><tr><td class="stats1">Mobile</td><td class="stats1">Desktop</td></tr><tr><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100)?>%</td><td class="stats2"><?php echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100)?>%</td></tr></table>

</td><td width="25%" colspan="" align="center"><br>
<?php
$morning=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1' AND '1100' AND anonymousRegDate='$anonymousRegDate' ");
$afternoon=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1101' AND '1601'  AND anonymousRegDate='$anonymousRegDate'");
$evening=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1601' AND '2359' AND anonymousRegDate='$anonymousRegDate' ");

$morning=mysqli_num_rows($morning);
$afternoon=mysqli_num_rows($afternoon);
$evening=mysqli_num_rows($evening);

$times=$morning+$afternoon+$evening;

$morning=round(($morning/$times)*100);
$afternoon=round(($afternoon/$times)*100);
$evening=round(($evening/$times)*100);
?>
<table class="states"><tr><td class="stats" colspan="3">Time of the day</td></tr><tr><td class="stats1">Morning</td><td class="stats1">Afternoon</td><td class="stats1">Evening</td></tr><tr><td class="stats2"><?php echo $morning ?>%</td><td class="stats2"><?php echo $afternoon ?>%</td><td class="stats2"><?php echo $evening ?>%</td></tr></table>

</td></tr></table>
<br>
<table style="width:98.7%" class="states"><tr valign="top"><td width="33%" class="stats">Device</td><td width="33%" class="stats">Country</td><td width="33%" class="stats">City</td></tr><tr valign="top"><td class="stats" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousDevice, COUNT(*) FROM anonymous WHERE anonymousRegDate='$anonymousRegDate' Group BY anonymousDevice ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousDevice){
	echo "<table ";if($a==0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousDevice</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousDevice='$anonymousDevice' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
	}}	?><br>
</td><td class="stats" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCountry, COUNT(*) FROM anonymous  WHERE anonymousRegDate='$anonymousRegDate'  Group BY anonymousCountry ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousCountry){
	echo "<table ";if($a!=0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousCountry</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCountry='$anonymousCountry' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
	}}	?><br>
 </td><td class="stats" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCity, COUNT(*) FROM anonymous  WHERE anonymousRegDate='$anonymousRegDate' Group BY anonymousCity ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;$sql2=mysqli_query($cxn, "SELECT anonymousCountry from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$anonymousRegDate'  LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);
		if(!$anonymousCity){
	echo "<table ";if($a==0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousCity [$anonymousCountry]</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";}$counter++;
	}}	?><br>
</td></tr></table>

<table class="states" style="width:98.7%"><tr><td width="25%" colspan="2" align="center">
<table class="states"><tr><td class="stats" width="50%">Pages Visited</td><td class="stats">Traffic Source</td></tr><tr valign="top"><td class="stats1" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousRating, COUNT(*) FROM anonymous WHERE anonymousRegDate='$anonymousRegDate'  Group BY anonymousRating ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousRating){
	echo "<table ";if($a==0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousRating</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRating='$anonymousRating' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
	}}	?><br>
</td><td class="stats1" style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousFrom, COUNT(*) FROM anonymous WHERE anonymousRegDate='$anonymousRegDate'  Group BY anonymousFrom ORDER BY COUNT(*) DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousFrom){
	echo "<table ";if($a!=0){echo "style='background:rgba(0,0,0,.1)'";}echo"><tr><td style='text-align:right; width:5%'>$counter |</td><td style='width:90%;'>$anonymousFrom</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousFrom='$anonymousFrom' AND anonymousRegDate='$anonymousRegDate' "))."</td></tr></table>";$counter++;
		}}	?><br>
</td></tr></table></td></tr></table>
<br>
</td></tr></table>

<?php }?>
</body>
</html>