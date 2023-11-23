<?php
    /////// Update your database login details here /////
    $dbhost_name = "localhost"; // Your host name 
    $database = "amplepoi_main_db";       // Your database name
    $username = "amplepoi_main_db";            // Your login userid 
    $password = "amplepoi_main_db";            // Your password 
    //////// End of database details of your server //////

    //////// Do not Edit below /////////
    try {
        $dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    function Get_Options($option_name){

        $connew = mysqli_connect("localhost","amplepoi_main_db","amplepoi_main_db","amplepoi_main_db");
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