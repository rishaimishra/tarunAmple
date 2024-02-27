<?php

define("DBHOST","localhost");
define("DBUSER","db_ampllifyon");
define("DBPWD","db_ampllifyon");
define("DB","db_ampllifyon");

class DB_FUNCTIONS {
  	
	public function __construct() {
		$conn = @mysql_connect(DBHOST,DBUSER,DBPWD);
		$db_select = mysql_select_db(DB,$conn);		
	}
	
	public function getResults($table) 
	{
	    $data = array();
		$query = mysql_query("SELECT * FROM $table") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if($num_rows>0) {
        	while($row=mysql_fetch_assoc($query))
				$data[]=$row;
		}
	    return $data;		
    }
	
	public function allProducts()
	{
		$query = mysql_query("SELECT * FROM products");	
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	
	public function getproductPhoto($id)
	{
		$photo = mysql_result(mysql_query("SELECT photo FROM products where id = $id limit 0,1"),0);	
				
		return $photo;
	}
	
	public function _getAllProductPhotos($id)
	{
		$photo = mysql_query("SELECT photo FROM products where id = $id limit 0,5");	
		while($row=mysql_fetch_assoc($photo))
		$data[]=$row;	
		
		return $data;
	}
	
	public function getProductDetails($id)
	{
		$query = mysql_query("SELECT * FROM products where id = $id");	
		while($row=mysql_fetch_assoc($query))
		$data=$row;
		
		return $data;
	
	}
	
	public function getAvailableSize($id)
	{
		$query = mysql_query("SELECT sizeID from tbl_productsizes where ProductID = $id");
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	
}
?>
