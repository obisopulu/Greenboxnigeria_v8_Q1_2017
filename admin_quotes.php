<?php include("rab_dbcon.php");
$today = date("Y-m-d"); 
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
	extract($_GET);
	$today = date("Y-m-d"); 
	if($q){mysqli_query($cxn, "DELETE FROM quotes WHERE quoteID='$q' LIMIT 1");}
	if($xxxx){mysqli_query($cxn, "UPDATE quotes SET quote='$quote', quoter='$quoter' WHERE quoteID='$xxxx'")or die("hdbfjbdsjbfjds ");}
	if($xxx=='xxx'){mysqli_query($cxn, "INSERT INTO quotes (quoteID, quote, quoter, dateUpdated)VALUES(NULL, '$quote', '$quoter', '$today')")or die("hdbfjbdsjbfjds ");}
	
if ($detect->isMobile()){
?>

<table><tr><td class="tab1">Quotes</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM quotes WHERE  quoteID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="get" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td width="70%"><input value="<?php echo $quote ?>" type="text" placeholder="Quote" maxlength="300" class="commenter" style="width:98%;"  name="quote"></td></tr><tr><td><input value="<?php echo $quoter ?>" type="text" placeholder="Author" maxlength="50" class="commenter" style="width:98%;"  name="quoter"></td></tr><tr><td><input type="submit" value="Edit" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/></td></tr></table><input type="hidden" name="xxxx" value="<?php echo $quoteID ?>"></form>
<?php }}else{?>


<form method="get" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td width="70%"><input type="text" placeholder="Quote" maxlength="300" class="commenter" style="width:98%;"  name="quote"></td></tr><tr><td><input type="text" placeholder="Author" maxlength="50" class="commenter" style="width:98%;"  name="quoter"></td></tr><tr><td><input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/></td></tr></table><input type="hidden" name="xxx" value="xxx"></form>
<?php }?>
<br><br>
<table style="width:98.7%; font-size:.8em">
<?php date("F n, Y");
	$sql = mysqli_query($cxn, "SELECT * FROM quotes ORDER BY quoteID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;

echo "<tr class='stats1'><td><br>
$quoter<br>
$quote
<table><tr><td style='height:30px;background:#EEE;cursor:pointer; width:10%' onClick=".'"'."window.open('admin_quotes.php?edit=$quoteID','_self')".'"'.">EDIT</td><td style='height:30px;background:#EEE;cursor:pointer; width:15%' onClick=".'"'."window.open('admin_quotes.php?q=$quoteID','_self')".'"'.">DELETE</td></tr></table>
</tr>";}?>
</table>
<br>
</td></tr></table>


<?php  }else{?>
<table><tr><td class="tab1">Quotes</td></tr><tr><td align="center">
<?php if($edit){
	$sql = mysqli_query($cxn, "SELECT * FROM quotes WHERE  quoteID='$edit' LIMIT 1");while($row=mysqli_fetch_assoc($sql)){extract($row);?>
<form method="get" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td width="70%"><input value="<?php echo $quote ?>" type="text" placeholder="Quote" maxlength="300" class="commenter" style="width:98%;"  name="quote"></td><td width="20%"><input value="<?php echo $quoter ?>" type="text" placeholder="Author" maxlength="50" class="commenter" style="width:98%;"  name="quoter"></td><td><input type="submit" value="Edit" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/></td></tr></table><input type="hidden" name="xxxx" value="<?php echo $quoteID ?>"></form>
<?php }}else{?>


<form method="get" enctype="multipart/form-data">
<table style="width:98.7%;"><tr><td width="70%"><input type="text" placeholder="Quote" maxlength="300" class="commenter" style="width:98%;"  name="quote"></td><td width="20%"><input type="text" placeholder="Author" maxlength="50" class="commenter" style="width:98%;"  name="quoter"></td><td><input type="submit" value="Add" class="commentbutton" style="width:100%;; background:#000; color:#FFF"/></td></tr></table><input type="hidden" name="xxx" value="xxx"></form>
<?php }?>
<br><br>
<table style="width:98.7%; font-size:.8em"><tr>
<td class="stats">Author</td>
<td class="stats">Quote</td>
<td class="stats" width="5%"></td>
<td class="stats" width="5%"></td>
</tr>
<?php date("F n, Y");
	$sql = mysqli_query($cxn, "SELECT * FROM quotes ORDER BY quoteID DESC LIMIT 50");while($row=mysqli_fetch_assoc($sql)){extract($row);
$a=$counter%2;

echo "<tr class='stats1'>
<td>$quoter</td>
<td>$quote</td>
<td style='height:30px;background:#EEE;cursor:pointer; width:10%' onClick=".'"'."window.open('admin_quotes.php?edit=$quoteID','_self')".'"'.">EDIT</td>
<td style='height:30px;background:#EEE;cursor:pointer; width:15%' onClick=".'"'."window.open('admin_quotes.php?q=$quoteID','_self')".'"'.">DELETE</td>
</tr>";}?>
</table>
<br>
</td></tr></table>

<?php  } ?>

</body>
</html>