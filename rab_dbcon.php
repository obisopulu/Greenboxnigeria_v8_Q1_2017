<?php
$dbroot = 'root';
$dbpsw = '';
$dbname = 'greenbox_q316';

error_reporting(E_NOTICE); 
set_error_handler('pc_error_handler');
function pc_error_handler($errno, $error, $file, $line, $context) 
{ $message = "";    
print "$message";}

$cxn = mysqli_connect("localhost", $dbroot, $dbpsw, $dbname);
if (!$cxn)
{
	header("Location:http://www.google.com");
	exit;
}
	include 'Mobile_Detect.php';
	

function get_ip_address() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}
/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range. 
 */
function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}

$userIP=get_ip_address();

$detect = new Mobile_Detect();
if ($detect->isMobile()){
$anonymousPlatform='mobile ';
}
else{
$anonymousPlatform='desktop ';
}
$anonymousTime=date("Hi");

if(stripos($_SERVER['HTTP_USER_AGENT'],"iPod"))$anonymousDevice.="iPod ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"Macintosh"))$anonymousDevice.="Macintosh ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"windows"))$anonymousDevice.="windows ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"samsung"))$anonymousDevice.="samsung ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"kindle"))$anonymousDevice.="kindle ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"nintendo"))$anonymousDevice.="nintendo ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"opera"))$anonymousDevice.="opera ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"nokia"))$anonymousDevice.="nokia ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"windows phone"))$anonymousDevice.="windows phone ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"hp"))$anonymousDevice.="hp ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"iPhone"))$anonymousDevice.="iPhone ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"iPad"))$anonymousDevice.="iPad ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"Android"))$anonymousDevice.="Android ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"Blackberry"))$anonymousDevice.="Blackberry ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"webOS"))$anonymousDevice.="webOS ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"Googlebot"))$anonymousDevice.="Robot: Google ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"wget"))$anonymousDevice.="Robot: wget ";
if(stripos($_SERVER['HTTP_USER_AGENT'],"libwww-perl"))$anonymousDevice.="Robot: libwww ";


$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$anonymousCity=$geo["geoplugin_city"];
$anonymousCountry=$geo["geoplugin_countryName"];

session_start(); 
extract($_SESSION);

mysqli_query ($cxn, "SELECT anonymousName FROM anonymous WHERE anonymousIP='$userIP' LIMIT 1");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}	

if(!$anonymousName){$anonymous=$anonymousName=gethostbyaddr();}

$anonymousFrom=$_SERVER['HTTP_REFERER'];
if (strpos($anonymousFrom,'http://;') !== false) {
	$a = str_replace('http://', '', $anonymousFrom);
}
if (strpos($anonymousFrom,'https://;') !== false) {
	$a = str_replace('https://', '', $anonymousFrom);
}
if (strpos($_SERVER['HTTP_REFERER'],'greenbox') !== false) {
	$a = 'local';
}
if (strpos($_SERVER['HTTP_REFERER'],'gbngr') !== false) {
	$a = 'local';
}
$anonymousFrom= $a;
?>