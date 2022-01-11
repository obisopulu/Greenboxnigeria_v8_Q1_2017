<?php include("rab_dbcon.php");
	$today = date("Y-m-d"); 
	$sql = mysqli_query($cxn, "SELECT * FROM member ORDER BY memberID DESC LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);}
	$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE  personStageName='$memberStageName' LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);}
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
$today = date("Y-m-d"); 
?>

<table><tr><td class="tab1">Members</td></tr></table>


<table style="border-bottom:thin solid #000; padding-top:20px; text-align:center"><tr><td>Member Stage Name</td></tr><tr><td><?php echo $memberStageName?></td></tr></table>

<table style="border-bottom:thin solid #000; padding-top:20px; text-align:center"><tr><td>memberEmail</td></tr><tr><td><?php echo $memberEmail?></td></tr></table>

<table style="border-bottom:thin solid #000; padding-top:20px; text-align:center"><tr><td colspan="2" align="center">Login Details<br><br></td></tr><tr><td class="stats1">memberUsername: <?php echo $memberPassword?></td></tr><tr><td class="stats1">memberPassword: <?php echo $memberUsername?></td></tr></table>

<table style="border-bottom:thin solid #000; padding-top:20px; text-align:center"><tr><td colspan="3" align="center">Bio<br><br></td></tr><tr><td class="stats1">Birthday: <?php echo $personBirthDay ?></td></tr><tr><td class="stats1">Birthyear: <?php echo $personBirthYear ?></td></tr><tr><td class="stats1">State: <?php echo $personPlaceOfOrigin ?></td></tr></table>

<table style="border-bottom:thin solid #000; padding-top:20px; text-align:center"><tr><td width="50%">Career: <?php echo $personProfession1 ?><br></td></tr><tr><td>Genre: <?php echo $personGenre ?><br></td>
</tr></table>

<table style="border-bottom:thin solid #000; padding-top:20px; text-align:center"><tr valign="top"><td width="50%">Songs</td></tr>
<tr valign="top"><td>
<?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from songs WHERE songArtist LIKE '%dsfj jdgj dfj%' OR songArtistFt LIKE '%$memberStageName%' OR songProducer LIKE '%$memberStageName%'  "));	?><br>
</td></tr>
<tr><td width="50%">Videos</td></tr><tr><td><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from Videos WHERE videoArtist LIKE '%$memberStageName%' OR videoArtistFt LIKE '%$memberStageName%' OR videoDirector LIKE '%$memberStageName%'  "));	?><br>
</td></tr></table>

<br>
<table style="width:98.7%; font-size:.8em; text-align:left"><tr>
<td>Date Reg.</td>
<td>Stagename</td>
<td>More</td>
</tr>
<?php date("F n, Y");
$sql = mysqli_query($cxn, "SELECT * FROM member ORDER BY memberID DESC");while($row=mysqli_fetch_assoc($sql)){extract($row);
$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE  personStageName='$memberStageName' ORDER BY personID DESC LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);}$a=$counter%2;

echo "<tr class='stats1' style='border-bottom:solid thin #CCC; height:40px'";?> onClick="window.open('admin_member_preview.php?member=<?php echo $memberStageName?>','_self') "<?php echo ">
<td>$dateUpdated</td>
<td>$memberStageName</td>
<td>&bull;&bull;&bull;</td>
</tr>";}?>
</table>
<br>

<?php }else{?>

<table><tr><td class="tab1">Members</td></tr><tr><td align="center">
</td></tr><tr><td align="center">

<table style="width:98.7%"><tr valign="top"><td align="center" style="border-bottom:thin solid #000; padding-top:20px">
<table><tr><td>Member Stage Name</td></tr><tr><td><?php echo $memberStageName?></td></tr></table>
</td><td style="border-bottom:thin solid #000; padding-top:20px">
<table><tr><td>memberEmail</td></tr><tr><td><?php echo $memberEmail?></td></tr></table>
</td></tr><tr><td style="border-bottom:thin solid #000; padding-top:20px">
<table><tr><td colspan="2" align="center">Login Details</td></tr><tr><td class="stats1">memberUsername</td><td class="stats1">memberPassword</td></tr><tr><td><?php echo $memberUsername?></td><td><?php echo $memberPassword?></td></tr></table>
</td><td style="border-bottom:thin solid #000; padding-top:20px">
<table><tr><td colspan="3" align="center">Bio</td></tr><tr><td class="stats1">Birthday</td><td class="stats1">Birthyear</td><td class="stats1">State</td></tr><tr><td><?php echo $personBirthDay ?></td><td><?php echo $personBirthYear ?></td><td><?php echo $personPlaceOfOrigin ?></td></tr></table>
</td></tr><tr valign="top"><td width="50%" style="border-bottom:thin solid #000; padding-top:20px">

<table><tr><td width="50%">Career</td><td>Genre</td></tr><tr valign="top">
<td><?php echo $personProfession1 ?><br></td>
<td><?php echo $personGenre ?><br></td>
</tr></table>

</td><td width="50%" style="border-bottom:thin solid #000; padding-top:20px">

<table><tr valign="top"><td width="50%">Songs</td><td width="50%">Videos</td></tr><tr valign="top"><td>
<?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from songs WHERE songArtist LIKE '%dsfj jdgj dfj%' OR songArtistFt LIKE '%$memberStageName%' OR songProducer LIKE '%$memberStageName%'  "));	?><br>
</td><td><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from Videos WHERE videoArtist LIKE '%$memberStageName%' OR videoArtistFt LIKE '%$memberStageName%' OR videoDirector LIKE '%$memberStageName%'  "));	?><br>
</td></tr></table>

</td></tr></table>
<br>
<table style="width:98.7%; font-size:.8em; text-align:left"><tr>
<td>Date Reg.</td>
<td>Stagename</td>
<td>Profession</td>
<td>Email</td>
<td>More</td>
</tr>
<?php date("F n, Y");
$sql = mysqli_query($cxn, "SELECT * FROM member ORDER BY memberID DESC");while($row=mysqli_fetch_assoc($sql)){extract($row);
$sql1 = mysqli_query($cxn, "SELECT * FROM persons WHERE  personStageName='$memberStageName' ORDER BY personID DESC LIMIT 1");while($row1=mysqli_fetch_assoc($sql1)){extract($row1);}$a=$counter%2;

echo "<tr class='stats1' style='border-bottom:solid thin #CCC'";?> onClick="window.open('admin_member_preview.php?member=<?php echo $memberStageName?>','_self') "<?php echo ">
<td>$dateUpdated</td>
<td>$memberStageName</td>
<td>$personProfession1</td>
<td>$memberEmail</td>
<td>&bull;&bull;&bull;</td>
</tr>";}?>
</table>
<br>
</td></tr></table>

<?php }?>
</body>
</html>