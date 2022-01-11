<?php include("rab_dbcon.php");
$today = date("Y-m-d"); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>
<body style="font-size:.9em">

<?php if ($detect->isMobile()){?>


<table><tr><td align="center">
<table style=" width:98.5%"><tr><td class="tab2">Daily Activities<br><br></td></tr></table>
</td></tr><tr><td align="center">
Today <?php echo date("F n, Y") ?>
<table style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr valign="top"><td align="center">
<table><tr><td align="center">Users</td></tr><tr><td align="center"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$today' "))?></td></tr></table>
</td></tr><tr><td>
<table><tr><td align="center">Page Visits</td></tr><tr><td align="center"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRegDate='$today' "))?></td></tr></table>
</td></tr></table>

<table style="width:98.7%; text-align:center"><tr><td><br><br>
<?php $platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform LIKE '%mobile%' AND anonymousRegDate='$today'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform LIKE '%desktop%' AND anonymousRegDate='$today'"))?>
<table style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000">
<tr><td colspan="2" align="center">Platform<br><br></td></tr>
<tr><td>Mobile</td></tr>
<tr><td><?php echo $mob=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform LIKE '%mobile%' AND anonymousRegDate='$today'")); echo " [ ".round(($mob/$platforms)*100)?>% ]</td></tr>
<tr><td>Desktop</td></tr>
<tr><td><?php echo $desk=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform LIKE '%desktop%' AND anonymousRegDate='$today'")); echo " [ ".round(($desk/$platforms)*100)?>% ]</td></tr></table><br><br>
</td></tr><tr><td><br><br>
<?php
$morning=mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1' AND '1100'  AND anonymousRegDate='$today' "));
$afternoon=mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1101' AND '1601'  AND anonymousRegDate='$today'"));
$evening=mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1601' AND '2359'  AND anonymousRegDate='$today'"));

$times=$morning+$afternoon+$evening;

$morningt=round(($morning/$times)*100);
$afternoont=round(($afternoon/$times)*100);
$eveningt=round(($evening/$times)*100);
?>
<table><tr><td align="center" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000;">Time of the day<br><br></td></tr><tr><td>Morning</td></tr><tr><td><?php echo $morning ?> [ <?php echo $morningt ?>% ]</td></tr><tr><td>Afternoon</td></tr><tr><td><?php echo $afternoon ?> [ <?php echo $afternoont ?>% ]</td></tr><tr><td>Evening</td></tr><tr><td><?php echo $evening ?> [ <?php echo $eveningt ?>% ]</td></tr></table><br><br>
</td></tr></table>

<table><tr valign="top"><td>

<table><tr><td style="width:25%; background:#FFF; color:#000; border-top:thin solid #000" align="center">Pages Visited<br><br></td></tr><tr valign="top"><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousRating, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousRating ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if($anonymousRating){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousRating</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRating='$anonymousRating' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
	}}	?><br>
</td></tr><tr><td style="width:25%; background:#FFF; color:#000; border-top:thin solid #000" align="center">Traffic Source<br><br></td></tr><tr><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousFrom, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousFrom ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if($anonymousFrom){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousFrom</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousFrom='$anonymousFrom' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
	}}	?><br>
</td></tr></table>

</td></tr><tr><td>

<table style="width:98.5%; background:#FFF; color:#000; border-top:thin solid #000"><tr valign="top"><td>Device<br><br></td></tr>
<tr valign="top"><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousDevice, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousDevice ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousDevice){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousDevice</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousID from anonymous WHERE anonymousDevice='$anonymousDevice' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
	}}	?><br>
</td></tr>
<tr><td>Country<br><br></td></tr>
<tr><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCountry, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousCountry ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
	if(!$anonymousCountry){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousCountry</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousID from anonymous WHERE anonymousCountry='$anonymousCountry' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
	}}	?><br>
 </td></tr>
<tr><td>City<br><br></td></tr><tr><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCity, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousCity ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;$sql2=mysqli_query($cxn, "SELECT anonymousCountry from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$today' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);
		if(!$anonymousCity){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousCity [$anonymousCountry]</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousID from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$today'"))."</td></tr></table>";}$counter++;
	}}	?><br>
</td></tr></table>

</td></tr></table>

<table style="width:98.7%; text-align:left"><tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr><tr>
<td>date</td>
<td>Users</td>
<td>Mobile</td>
<td>Desktop</td>
<td>Traffic Source</td>
<td>More</td>
</tr>
<?php date("F n, Y");
$sql = mysqli_query($cxn, "SELECT DISTINCT anonymousRegDate FROM anonymous ORDER BY anonymousRegDate DESC LIMIT 30");while($row=mysqli_fetch_assoc($sql)){extract($row);$a=$counter%2;
$users = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
$platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"));
$mobile = round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100);
$desktop = round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100);
$traffic_source = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousFrom from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
echo "
<tr class='stats' style='width:98.5%; height:40px; border-bottom:thin solid #EEE' ";?> onClick="window.open('admin_analytics_daily_preview.php?date=<?php echo $anonymousRegDate?>','_self')" <?php echo ">
<td>$anonymousRegDate</td>
<td>$users</td>
<td>$mobile%</td>
<td>$desktop%</td>
<td>$traffic_source</td>
<td align='right'>&bull;&bull;&bull;</td>
</tr>
";} ?>
</table>
<br>
</td></tr></table>




<?php }else{?>




<table><tr><td align="center">
<table style=" width:98.5%"><tr><td class="tab2">Daily Activities<br><br></td></tr></table>
</td></tr><tr><td align="center">
Today <?php echo date("F n, Y") ?>
<table style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr valign="top"><td align="center">
<table><tr><td align="center">Users</td></tr><tr><td align="center"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$today' "))?></td></tr></table>
</td><td>
<table><tr><td align="center">Page Visits</td></tr><tr><td align="center"><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRegDate='$today' "))?></td></tr></table>
</td></tr></table>

<table style="width:98.7%;"><tr><td><br><br>
<?php $platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$today'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$today'"))?>
<table style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000"><tr><td colspan="2" align="center">Platform<br><br></td></tr><tr><td>Mobile</td><td>Desktop</td></tr><tr><td><?php echo $mob=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$today'")); echo " [ ".round(($mob/$platforms)*100)?>% ]</td><td><?php echo $desk=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$today'")); echo " [ ".round(($desk/$platforms)*100)?>% ]</td></tr></table><br><br>
</td><td><br><br>
<?php
$morning=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1' AND '1100'  AND anonymousRegDate='$today' ");
$afternoon=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1101' AND '1601'  AND anonymousRegDate='$today'");
$evening=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1601' AND '2359'  AND anonymousRegDate='$today'");

$morningt=mysqli_num_rows($morning);
$afternoont=mysqli_num_rows($afternoon);
$eveningt=mysqli_num_rows($evening);

$times=$morning+$afternoon+$evening;

$morning=round(($morning/$times)*100);
$afternoon=round(($afternoon/$times)*100);
$evening=round(($evening/$times)*100);
?>
<table><tr><td colspan="3" align="center" style="width:98.7%; background:#FFF; color:#000; border-top:thin solid #000">Time of the day<br><br></td></tr><tr><td>Morning</td><td>Afternoon</td><td>Evening</td></tr><tr><td><?php echo $morningt ?> [ <?php echo $morning ?>% ]</td><td><?php echo $afternoont ?> [ <?php echo $afternoon ?>% ]</td><td><?php echo $eveningt ?> [ <?php echo $evening ?>% ]</td></tr></table><br><br>
</td></tr></table>

<table><tr valign="top"><td>

<table><tr><td style="width:25%; background:#FFF; color:#000; border-top:thin solid #000" align="center">Pages Visited<br><br></td><td style="width:25%; background:#FFF; color:#000; border-top:thin solid #000" align="center">Traffic Source<br><br></td></tr><tr valign="top"><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousRating, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousRating ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousRating){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousRating</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRating='$anonymousRating' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
	}}	?><br>
</td><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousFrom, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousFrom ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousFrom){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousFrom</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousFrom='$anonymousFrom' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
		}}	?><br>
</td></tr></table>

</td><td>

<table style="width:98.5%; background:#FFF; color:#000; border-top:thin solid #000"><tr valign="top"><td>Device<br><br></td><td>Country<br><br></td><td>City<br><br></td></tr><tr valign="top"><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousDevice, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousDevice ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousDevice){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousDevice</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousDevice='$anonymousDevice' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
	}}	?><br>
</td><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCountry, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousCountry ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;
		if(!$anonymousCountry){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousCountry</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCountry='$anonymousCountry' AND anonymousRegDate='$today'"))."</td></tr></table>";$counter++;
	}}	?><br>
 </td><td style="text-align:left">
<?php $counter=1; $sql=mysqli_query($cxn, "SELECT DISTINCT anonymousCity, COUNT(*) FROM anonymous WHERE anonymousRegDate='$today' Group BY anonymousCity ORDER BY COUNT(*) DESC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);$a=$counter%2;$sql2=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$today' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);
	if(!$anonymousCity){
	echo "<table style='width:98.5%; border-top:thin solid #EEE'><tr><td style='width:90%;'>$anonymousCity [$anonymousCountry]</td><td style='text-align:left'>".mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousCity from anonymous WHERE anonymousCity='$anonymousCity' AND anonymousRegDate='$today'"))."</td></tr></table>";}$counter++;
	}}	?><br>
</td></tr></table>

</td></tr></table>

<table style="width:98.7%; text-align:left"><tr>
<td></td>
<td></td>
<td></td>
<td colspan="2">Platform</td>
<td colspan="3">Time</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr><tr>
<td>date</td>
<td>Users</td>
<td>Page Visits</td>
<td>Mobile</td>
<td>Desktop</td>
<td>Morning</td>
<td>Afternoon</td>
<td>Evening</td>
<td>Pages Visited</td>
<td>Traffic Source</td>
<td>Device</td>
<td>Country</td>
<td>City</td>
<td>More</td>
</tr>
<?php date("F n, Y");
$sql = mysqli_query($cxn, "SELECT DISTINCT anonymousRegDate FROM anonymous ORDER BY anonymousRegDate DESC LIMIT 30");while($row=mysqli_fetch_assoc($sql)){extract($row);$a=$counter%2;
$users = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
$page_visits = mysqli_num_rows(mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
$platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"));
$mobile = round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100);
$desktop = round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$anonymousRegDate'"))/$platforms)*100);
$morning=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1' AND '1100'  AND anonymousRegDate='$anonymousRegDate' ");
$afternoon=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1101' AND '1601'  AND anonymousRegDate='$anonymousRegDate'");
$evening=mysqli_query($cxn, "SELECT * from anonymous WHERE anonymousTime BETWEEN '1601' AND '2359'  AND anonymousRegDate='$anonymousRegDate'");
$morning=mysqli_num_rows($morning);$afternoon=mysqli_num_rows($afternoon);$evening=mysqli_num_rows($evening);
$times=$morning+$afternoon+$evening;
$morning=round(($morning/$times)*100);$afternoon=round(($afternoon/$times)*100);$evening=round(($evening/$times)*100);
$pages_visited = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousRating from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
$traffic_source = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousFrom from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
$device = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousDevice from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
$country = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousCountry from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
$city = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousCity from anonymous WHERE anonymousRegDate='$anonymousRegDate' "));
echo "
<tr class='stats' style='width:98.5%; border-bottom:thin solid #EEE' ";?> onClick="window.open('admin_analytics_daily_preview.php?date=<?php echo $anonymousRegDate?>','_self')" <?php echo ">
<td>$anonymousRegDate</td>
<td>$users</td>
<td>$page_visits</td>
<td>$mobile%</td>
<td>$desktop%</td>
<td>$morning%</td>
<td>$afternoon%</td>
<td>$evening%</td>
<td>$pages_visited</td>
<td>$traffic_source</td>
<td>$device</td>
<td>$country</td>
<td>$city</td>
<td align='right'>&bull;&bull;&bull;</td>
</tr>
";} ?>
</table>
<br>
</td></tr></table>

<?php }?>

</body>
</html>