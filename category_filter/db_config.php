<?php
/*Change Database Configuration Here*/
include '../global.php';
global  $db_host;
global  $db_user;
global  $db_password;
global  $db_name;
global  $db_port;
$db_host = $db_host;
$db_user = $db_user;
$db_password =  $db_password;
$db_name = $db_name;
$db_port = $db_port;

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port);
// return $con;
// die();
if (!$con)
{
die('could not connect To Database Change db_config.php File '.mysqli_error($con));
}
mysqli_select_db($con,$db_name);


function Get_Options($option_name){
global  $db_host;
global  $db_user;
global  $db_password;
global  $db_name;
global  $db_port;

$db_host = $db_host;
$db_user = $db_user;
$db_password =  $db_password;
$db_name = $db_name;
$db_port = $db_port;
$connew = mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port);
$sql = "SELECT option_value FROM `tbl_options` WHERE `option_name` = '$option_name'";
$query = mysqli_query($connew,$sql);
$result = mysqli_fetch_array($query);
return $result['option_value'];
}
function cdnUrl($url) {
if(empty($url)){
echo "Path is missing";
die;
}
$pattern = '/^http/i';
if(preg_match($pattern, $url))
{
throw new Exception('Invalid usage. ' .
'Use: /htdocs/images instead of the full URL ' .
'http://example.com/htdocs/images.'
);
}
$pattern = '|^/|';
if(!preg_match($pattern, $url)) {
$url = '/' . $url;
}
$cdn_hostname = Get_Options('siteurl');
if(empty($cdn_hostname)){
$cdn_hostname = 'https://amplepoints.com';
}
$uri = $cdn_hostname . $url;
return $uri;
}
?>