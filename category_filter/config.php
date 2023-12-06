<?php
    /////// Update your database login details here /////

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';  
$db_name = 'amplepoint_new';
$db_port = '3307';          
    //////// End of database details of your server //////






    //////// Do not Edit below /////////
    $dbhost_name = "localhost"; // Your host name 
    $database = "amplepoint_new";       // Your database name
    $username = "root";            // Your login userid 
    $password = "";            // Your password 
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