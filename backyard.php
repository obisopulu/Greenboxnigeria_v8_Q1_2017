<?php include("rab_dbcon.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Cockpit</title>
<meta charset="utf-8" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />
<meta name="viewport" content="user-scalable=no,maximum-scale=1" />
<meta name="MobileOptimized" content="width" />
<meta id='description' name="description" content="Discover The Nigerian Music Industry; the songs, the people, the labels and the news" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta id='keywords' name="keywords" content="Nigerian Music,  Artist, label, song, news" />
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="style/day.css" rel="stylesheet" type="text/css"/>
</head>
<body onResize="fold()">
<?php	if($_POST['login'] == 'Login'){
		if($_POST['labelName'] == 'madu' and $_POST['labelOwner'] == 'perfect101')
		{
          
if ($detect->isMobile()){

//mobileecho 
?>

<iframe style="display:none"></iframe>
<table class="header"><tr valign="middle"><td onClick="if(document.getElementById('menue').style.top==='-200%'){ document.getElementById('menue').style.top='6.5%';}else{document.getElementById('menue').style.top='-200%'}; document.getElementById('menue').style.top='40'" style="height:40px"><table><tr valign="middle"><td style="background:url(images/logo.png) center no-repeat; background-size:contain; cursor:pointer; height:30px"></td></tr></table></td></tr></table>

<table style="text-align:center; z-index:2; position:absolute; top:-200%; width:100%;" id="menue"><tbody style="width:200px; background:#000; color:#FFF" id="menued"><tr>
<td class="menu" onClick="linker('admin_home');document.getElementById('menue').style.top='-200%'" style="width:200px; color:#FFF; padding:5px">
Home
</td></tr><tr><td class="menu" id="admin_analytics_daily" style="color:#FFF; padding:5px" onClick="linker('admin_analytics_daily');document.getElementById('menue').style.top='-200%'">
Traffic Daily
</td></tr><tr><td class="menu" id="admin_quotes" style="color:#FFF; padding:5px" onClick="linker('admin_quotes');document.getElementById('menue').style.top='-200%'">
Quotes
</td></tr><tr><td class="menu" id="admin_music" style="color:#FFF; padding:5px" onClick="linker('admin_music');document.getElementById('menue').style.top='-200%'">
Music
</td></tr><tr><td class="menu" id="admin_blog" style="color:#FFF; padding:5px" onClick="linker('admin_blog');document.getElementById('menue').style.top='-200%'">
Blog
</td></tr><tr><td class="menu" id="admin_person" style="color:#FFF; padding:5px" onClick="linker('admin_person');document.getElementById('menue').style.top='-200%'">
People
</td></tr><tr><td class="menu" id="admin_label" style="color:#FFF; padding:5px" onClick="linker('admin_label');document.getElementById('menue').style.top='-200%'">
Label
</td></tr><tr><td class="menu" id="admin_video" style="color:#FFF; padding:5px" onClick="linker('admin_video');document.getElementById('menue').style.top='-200%'">
Video
</td></tr><tr><td class="menu" id="admin_member" style="color:#FFF; padding:5px" onClick="linker('admin_member');document.getElementById('menue').style.top='-200%'">
Member
</td></tr><tr><td class="menu" id="admin_comments" style="color:#FFF; padding:5px" onClick="linker('admin_comments');document.getElementById('menue').style.top='-200%'">
Comments
</td></tr></tbody></table>

<iframe class="body" src="admin_home.php"></iframe>

<?php }else{

//desktop=
?>

<iframe style="display:none"></iframe>
<table class="header"><tr valign="middle"><td onClick="linker('admin_home')" width="20%" style="background:url(images/header_logo.png) left no-repeat; background-size:contain; cursor:pointer;padding-left:40px;">Cockpit [v.q416]
</td><td class="menu" id="admin_home" onClick="linker('admin_home')">
Home
</td><td class="menu" id="admin_analytics_daily" onClick="linker('admin_analytics_daily')">
Traffic Daily
</td><td class="menu" id="admin_analytics_index" onClick="linker('admin_analytics_index')">
Traffic Index
</td><td class="menu" id="admin_member" onClick="linker('admin_member')">
Member
</td><td class="menu" id="admin_comments" onClick="linker('admin_comments')">
Comments
</td><td class="menu" id="admin_quotes" onClick="linker('admin_quotes')">
Quotes
</td><td class="menu" id="admin_music" onClick="linker('admin_music')">
Music
</td><td class="menu" id="admin_album" onClick="linker('admin_album')">
Album
</td><td class="menu" id="admin_blog" onClick="linker('admin_blog')">
Blog
</td><td class="menu" id="admin_person" onClick="linker('admin_person')">
People
</td><td class="menu" id="admin_label" onClick="linker('admin_label')">
Label
</td><td class="menu" id="admin_video" onClick="linker('admin_video')">
Video
</td><td align="left" width="25%">
</td></tr></table>

<iframe class="body" src="admin_home.php"></iframe>


<?php } }}elseif ($_POST['login'] != 'Login'){ ?>
		<form method='POST' action='backyard.php'>
		<table align='center' bgcolor='' style="width:50%; height:300px"><tr valign="bottom">
          
          <table align='center' bgcolor='' style="width:50%"><tr>
		<td style='padding:5px; font-size:12px;'>
		<input size='14' type='text' name='labelName' autofocus maxlength='50' value='' style='width:100%; height:30px; background:rgba(44,44,44,.5); border:none; padding:0 10px; color:#FFF;font-family:myFirstFont;border-left:thick solid #222'>
		</td></tr><tr><td style='padding:5px; font-size:12px;'>
		<input size='14' type='password' name='labelOwner' maxlength='50' value='' style='width:100%; height:30px; background:rgba(44,44,44,.5); border:none; padding:0 10px; color:#FFF;font-family:myFirstFont;border-left:thick solid #222;'>
		</td></tr><tr><td align="center">
		<input name='login' type='submit' value='Login' style='width:50%; height:40px; background:rgba(44,44,44,.5); border:thick #333 solid; color:#FFF;font-family:myFirstFont; cursor:pointer;border-right:left solid #222'>
		</td>
		</tr></table>
          
          </td></tr></table>
		</form></body></html>
<?php }?>

<script src="scirpt/back_layout.js"></script>
<script src="scirpt/back_links.js"></script>
<iframe id="service"></iframe>
</body>
</html>