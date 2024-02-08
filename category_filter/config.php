<?php
/////// Update your database login details here /////
include '../global.php';
global  $db_host;
global  $db_user;
global  $db_password;
global  $db_name;
global  $db_port;
// $db_host = 'localhost';
// $db_user = 'root';
// $db_password = '';
// $db_name = 'amplepoint_new';
// $db_port = '3307';
$db_host = $db_host;
$db_user = $db_user;
$db_password =  $db_password;
$db_name = $db_name;
$db_port = $db_port;
//////// End of database details of your server //////
//////// Do not Edit below /////////
$dbhost_name =$db_host;
$database = $db_name;
$username = $db_user;
$password = $db_password;
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';port=3307;dbname='.$database, $username, $password);
// Output the connection string
// echo 'Connected using the following connection string: ' . $dbo->getAttribute(PDO::ATTR_CONNECTION_STATUS);

// die();
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
function Get_Options($option_name){
global  $db_host;
global  $db_user;
global  $db_password;
global  $db_name;
global  $db_port;

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