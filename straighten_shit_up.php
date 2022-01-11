<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php include("rab_dbcon.php");

$sql=mysqli_query ($cxn, "SELECT * FROM songs");
while($row=mysqli_fetch_assoc($sql))
{extract($row);


if($songDownload > '5000'){


if ($songDownload > '500'){
$songDownload += mt_rand(0,1);
$songPlay += mt_rand(0,1);}

}else{

if($songRating == ''){

if ($songDownload < '100'){
$songDownload += mt_rand(1,2);
$songPlay += mt_rand(1,3);
}

if ($songDownload >= '100' AND $songDownload <= '500'){
$songDownload += mt_rand(1,1);
$songPlay += mt_rand(1,3);
}

if ($songDownload > '500'){
$songDownload += mt_rand(1,1);
$songPlay += mt_rand(1,2);
}


}

if($songRating == '3'){

if ($songDownload < '100'){
$songDownload += mt_rand(0,5);
$songPlay += mt_rand(0,5);
}

if ($songDownload >= '100' AND $songDownload <= '500'){
$songDownload += mt_rand(0,1);
$songPlay += mt_rand(0,1);
}

if ($songDownload > '500'){
$songDownload += mt_rand(0,2);
$songPlay += mt_rand(0,2);
}


}

if($songRating == '4'){

if ($songDownload < '100'){
$songDownload += mt_rand(1,5);
$songPlay += mt_rand(1,10);
}

if ($songDownload >= '100' AND $songDownload <= '500'){
$songDownload += mt_rand(0,3);
$songPlay += mt_rand(0,5);
}

if ($songDownload > '500'){
$songDownload += mt_rand(0,2);
$songPlay += mt_rand(0,2);
}


}

if($songRating == '5'){

if ($songDownload < '100'){
$songDownload += mt_rand(1,5);
$songPlay += mt_rand(1,10);
}

if ($songDownload >= '100' AND $songDownload <= '500'){
$songDownload += mt_rand(0,3);
$songPlay += mt_rand(0,5);
}

if ($songDownload > '500'){
$songDownload += mt_rand(0,2);
$songPlay += mt_rand(0,2);
}
}
}

mysqli_query($cxn, "UPDATE songs SET songDownload = '$songDownload',songPlay = '$songPlay' WHERE songID = '$songID'")or die('dsfjh fhsj dfj bdsjbfjdsfjdsjfjds');	
}
?>
</body></html>