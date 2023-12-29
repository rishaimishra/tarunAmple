<?php
    $mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "amplepoint_new";
    $db_port = '3307'; 


$db_host = 'localhost';
$db_user = 'root';
$db_password = '';  
$db_name = 'amplepoint_new';
$db_port = '3307'; 
$con = mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port) or die("Could not connect database");
    mysqli_select_db($con,$mysql_database) or die("Could not select database");
    if(! empty($_SERVER['REMOTE_ADDR']) ){
        $_SESSION["REMOTE_ADDR"]=$_SERVER['REMOTE_ADDR'];
    }
    function Get_Options($option_name){

        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';  
        $db_name = 'amplepoint_new';
        $db_port = '3307'; 

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