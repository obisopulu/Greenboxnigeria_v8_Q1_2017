	<?php 
	$to = "support@greenboxnigeria.com";
	$subject = 'Greenboxnigeria Membership email confirmation';
	
	$headers = "From: webmaster@greenboxnigeria.com\r\n";
	$headers .= "Reply-To: support@greenboxnigeria.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= " <table style='width:100%'><tr><td>Users Today</td></tr><tr><td>"; echo mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousRegDate='$today' "))."</td></tr></table>";
	$message .= "<table style='border:none'>";
	$message .= "<tr style='font-size:3em; font-weight:100'><td>";$platforms=mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$today'")) + mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$today'")); echo"<table><tr><td colspan='2'>Platform</td></tr><tr><td>Mobile</td><td>Desktop</td></tr><tr><td>"; echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='mobile' AND anonymousRegDate='$today'"))/$platforms)*100)."%</td><td>"; echo round((mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP from anonymous WHERE anonymousPlatform='desktop' AND anonymousRegDate='$today'"))/$platforms)*100)."%</td></tr></table><br><br><br></td></tr>";
	$message .= "<tr><td align='center'>Confirmation link <a style='background:#00E676; color:#FFF;padding:10px 30px;text-decoration:none' href='http://www.gbngr.com/archive/member-$gbn'>Here</a><br><br><br></td></tr>";
	$message .= "<tr><td align='right' style='font-size:1em;color:#33'>for support, comments or any question(s) contact our support team <a href='mailto:support@greenboxnigeria.com?subject=Enquiry' target='_new'>support@greenboxnigeria.com</a></td></tr>";
	$message .= "<tr><td align='center' style='font-size:.7em;color:#555'>&copy; 2016 Renegade</td></tr>";
	$message .= "</table></center>";
	$message .= "</body></html>";
	
	mail($to, $subject, $message, $headers);
	
	?>