<?php include("rab_dbcon.php");
extract($_GET);
if($m && $p){ 
mysqli_query($cxn, "DELETE FROM member WHERE memberID='$m' LIMIT 1");
mysqli_query($cxn, "DELETE FROM persons WHERE personID='$p' LIMIT 1");
header("location: admin_member.php");}
$sql = mysqli_query($cxn, "SELECT * FROM member WHERE memberStageName='$member'");while($row=mysqli_fetch_assoc($sql)){extract($row);}
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

?>


<table style="text-align:center"><tr><td class="tab1">Member</td></tr><tr><td align="center">
<table><tr><td class="tab2"><span style="font-size:1.5em"><?php echo $memberStageName; ?></span><br><br></td></tr></table>
<table style="width:98.7%"><tr><td width="25%" align="center" colspan="">

<table><tr><td>Username</td></tr><tr><td><?php echo $memberUsername; ?></td></tr></table>

</td></tr><tr><td>

<table><tr><td>Password</td></tr><tr><td><?php echo $memberPassword; ?></td></tr></table>

</td></tr><tr><td colspan="2" align="center"><br>
<table><tr><td colspan="3" style="width:33.3%">Bio</td></tr><tr><td class="stats1" style="width:33.3%">Birthday</td><td class="stats1">Birthyear</td><td class="stats1" style="width:33.3%">State</td></tr><tr><td><?php echo $personBirthDay ?></td><td><?php echo $personBirthYear ?></td><td><?php echo $personPlaceOfOrigin ?></td></tr></table>

</td></tr></table>
<br>
<table style="width:98.7%"><tr valign="top"><td width="50%">Songs</td><td width="50%">Videos</td></tr><tr valign="top"><td>
<?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from songs WHERE songArtist LIKE '%$memberStageName%' OR songArtistFt LIKE '%$memberStageName%' OR songProducer LIKE '%$memberStageName%'  "));	?><br>
</td><td><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from Videos WHERE videoArtist LIKE '%$memberStageName%' OR videoArtistFt LIKE '%$memberStageName%' OR videoDirector LIKE '%$memberStageName%'  "));	?><br>
</td></tr></table>

<table bgcolor="#F33" style="width:98.7%; height:50px; color:#FFF" onClick="window.open('admin_member_preview.php?m=<?php echo $memberID ?>&p=<?php echo $personID ?>','_self')"><tr><td width="25%" colspan="2" align="center">
Delete
</td></tr></table>
<br>
</td></tr></table>

<?php }else{	

	?>

<table><tr><td class="tab1">Member</td></tr><tr><td align="center">
<table><tr><td class="tab2"><span style="font-size:1.5em"><?php echo $memberStageName; ?></span><br><br></td></tr></table>
<table style="width:98.7%"><tr><td width="25%" align="center" colspan="">

<table><tr><td>Username</td></tr><tr><td><?php echo $memberUsername; ?></td></tr></table>

</td><td width="25%" align="center">

<table><tr><td>Password</td></tr><tr><td><?php echo $memberPassword; ?></td></tr></table>

</td></tr><tr><td colspan="2" align="center"><br>
<table><tr><td colspan="3" style="width:33.3%">Bio</td></tr><tr><td class="stats1" style="width:33.3%">Birthday</td><td class="stats1">Birthyear</td><td class="stats1" style="width:33.3%">State</td></tr><tr><td><?php echo $personBirthDay ?></td><td><?php echo $personBirthYear ?></td><td><?php echo $personPlaceOfOrigin ?></td></tr></table>

</td></tr></table>
<br>
<table style="width:98.7%"><tr valign="top"><td width="50%">Songs</td><td width="50%">Videos</td></tr><tr valign="top"><td>
<?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from songs WHERE songArtist LIKE '%$memberStageName%' OR songArtistFt LIKE '%$memberStageName%' OR songProducer LIKE '%$memberStageName%'  "));	?><br>
</td><td><?php echo mysqli_num_rows(mysqli_query($cxn, "SELECT * from Videos WHERE videoArtist LIKE '%$memberStageName%' OR videoArtistFt LIKE '%$memberStageName%' OR videoDirector LIKE '%$memberStageName%'  "));	?><br>
</td></tr></table>

<table bgcolor="#F33" style="width:98.7%; height:50px; color:#FFF" onClick="window.open('admin_member_preview.php?m=<?php echo $memberID ?>&p=<?php echo $personID ?>','_self')"><tr><td width="25%" colspan="2" align="center">
Delete
</td></tr></table>
<br>
</td></tr></table>

<?php }?>
</body>
</html>