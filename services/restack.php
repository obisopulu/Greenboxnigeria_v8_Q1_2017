<?php include("../rab_dbcon.php");

if ($detect->isMobile()){

$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY RAND() LIMIT 20");$counter=1;while($row=mysqli_fetch_assoc($sql)) {extract($row);?>
<table  onClick="playee('<?php echo $songTitle ?>', '<?php echo $songURL ?>', '<?php echo $songArt ?>',  '<?php echo $songArtist ?>', '<?php echo $songArtistFt ?>', '<?php echo $songProducer ?>', '<?php echo $songAlbum ?>', '<?php echo $songID ?>', '<?php echo $songYear ?>', '<?php echo $songRating ?>', '<?php echo $counter ?>')" style="width:95%; border-bottom:thin solid rgba(0,0,0,.1)"><tr valign="middle"><td style="padding:5px 0; width:70px; height:50px;" align="center">
<table style="width:15px; height:15px;font-size:.6em; font-weight:700; text-align:center" id="playindex<?php echo $counter ?>"><tr><td ><?php echo $counter ?></td></tr></table>
</td><td style="padding:5px 10px;font-size:.9em; font-weight:700">
<?php echo $songTitle ?><br>
<?php echo $songArtist ?><span style="font-size:.8em; font-weight:100"><?php if($songArtistFt){echo " ft ".$songArtistFt;} if($songProducer){echo " &bull; ".$songProducer;} ?></span>
</td></tr></table>
<span style="display:none">
<span id="song<?php echo $counter ?>a"><?php echo $songTitle ?></span>
<span id="song<?php echo $counter ?>b"><?php echo $songURL ?></span>
<span id="song<?php echo $counter ?>c"><?php echo $songArt ?></span>
<span id="song<?php echo $counter ?>d"><?php echo $songArtist ?></span>
<span id="song<?php echo $counter ?>e"><?php echo $songArtistFt ?></span>
<span id="song<?php echo $counter ?>f"><?php echo $songProducer ?></span>
<span id="song<?php echo $counter ?>g"><?php echo $songAlbum ?></span>
<span id="song<?php echo $counter ?>h"><?php echo $songID ?></span>
<span id="song<?php echo $counter ?>i"><?php echo $songYear ?></span>
<span id="song<?php echo $counter ?>j"><?php echo $songRating ?></span>
<span id="song<?php echo $counter ?>k"><?php echo $counter ?></span>
</span>
<?php $counter++;}?><br><br><?php

}else{
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY RAND() LIMIT 20");$counter=1;while($row=mysqli_fetch_assoc($sql)) {extract($row);?>

<table  onClick="playee('<?php echo $songTitle ?>', '<?php echo $songURL ?>', '<?php echo $songArt ?>',  '<?php echo $songArtist ?>', '<?php echo $songArtistFt ?>', '<?php echo $songProducer ?>', '<?php echo $songAlbum ?>', '<?php echo $songID ?>', '<?php echo $songYear ?>', '<?php echo $songRating ?>', '<?php echo $counter ?>')" style="width:95%; border-bottom:thin solid rgba(0,0,0,.05); font-size:.9em"><tr valign="middle"><td style="width:10px;" align="center">
<table style="width:15px; height:15px;font-size:.6em; font-weight:700; text-align:center" id="playindex<?php echo $counter ?>"><tr><td ><?php echo $counter ?></td></tr></table>
</td><td style="padding:5px 10px;font-size:.9em; font-weight:700">
<?php echo $songTitle ?> - <?php echo $songArtist ?><span style="font-size:.8em; font-weight:100"><?php if($songArtistFt){echo " ft ".$songArtistFt;} if($songProducer){echo " &bull; ".$songProducer;} ?></span>
</td></tr></table>
<span style="display:none">
<span id="song<?php echo $counter ?>a"><?php echo $songTitle ?></span>
<span id="song<?php echo $counter ?>b"><?php echo $songURL ?></span>
<span id="song<?php echo $counter ?>c"><?php echo $songArt ?></span>
<span id="song<?php echo $counter ?>d"><?php echo $songArtist ?></span>
<span id="song<?php echo $counter ?>e"><?php echo $songArtistFt ?></span>
<span id="song<?php echo $counter ?>f"><?php echo $songProducer ?></span>
<span id="song<?php echo $counter ?>g"><?php echo $songAlbum ?></span>
<span id="song<?php echo $counter ?>h"><?php echo $songID ?></span>
<span id="song<?php echo $counter ?>i"><?php echo $songYear ?></span>
<span id="song<?php echo $counter ?>j"><?php echo $songRating ?></span>
<span id="song<?php echo $counter ?>k"><?php echo $counter ?></span>
</span>
<?php $counter++;}

}


