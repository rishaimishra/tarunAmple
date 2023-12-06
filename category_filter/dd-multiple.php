<?Php

@$cat_id=$_GET['cat_id'];

//print_r($_GET['cat_id']);die;

//@$cat_id="2,3"; // For testing this page only. 

///////////// checking for injection attack //////

// $mn=explode(",",$cat_id); 

//print_r($mn);die;

// creating array 

// while (list ($key, $val) = each ($mn)) { 

// if(!is_numeric($val)){  // checking each element 

// echo "Data Error ";

// exit;

// }

// }






$mn = explode(",", $cat_id);

foreach ($mn as $val) {
    if (!is_numeric($val)) {
        echo "Data Error";
        exit;
    }
}


/////////// end of checking for injection attack // 



require "config.php";

$sql="select * from tbl_filters where ftype IN ($cat_id)";



$row=$dbo->prepare($sql);

$row->execute();

$result=$row->fetchAll(PDO::FETCH_ASSOC);



$main = array('data'=>$result);





echo json_encode($main);



?>

