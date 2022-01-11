<?php include("rab_dbcon.php");
if ($detect->isMobile()){
$today = date("Y-m-d"); 
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_back_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
</head>
<body>

</body>
</html>

<?php }else{
	$today = date("Y-m-d"); 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/back_cascade.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<table style="width:98.7%" class="states"><tr>
<td>Date</td>
</tr>
<?php date("F n, Y");
$sql = mysqli_query($cxn, "SELECT DISTINCT anonymousRegDate FROM anonymous ORDER BY anonymousRegDate DESC");while($row=mysqli_fetch_assoc($sql)){extract($row);$a=$counter%2;

if($a==0){echo "<tr class='stats1'><td><a href='admin_analytics_daily_preview.php?date=$anonymousRegDate'><div style='height:100%'>$anonymousRegDate &bull;&bull;&bull;</div></td>
</tr>";}else{echo "<tr class='stats'><td><a href='admin_analytics_daily_preview.php?date=$anonymousRegDate'><div style='height:100%'>$anonymousRegDate &bull;&bull;&bull;</div></td>
</tr>
";}$counter++;}?>
</table>
<br>
</td></tr></table>
</body>
</html>

<?php }?>