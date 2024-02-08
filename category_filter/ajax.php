<?php
    /* File : ajax.php
    * Author : Manish Kumar Jangir
    */
    include '../global.php';
    global  $db_host;
    global  $db_user;
    global  $db_password;
    global  $db_name;
    global  $db_port;


    class AJAX {

        private $database = NULL;
        private $_query = NULL;
        private $_fields = array();
        public  $_index = NULL;
        const DB_HOST = $db_host;
        const DB_USER =  $db_user;
        const DB_PASSWORD =  $db_password;
        const DB_NAME =  $db_name;
        const DB_PORT = $db_port;


        public function __construct(){
            $this->db_connect();                    // Initiate Database connection
            $this->process_data();
        }

        /*
        *  Connect to database
        */
        private function db_connect(){
            $this->database = @mysqli_connect(self::DB_HOST,self::DB_USER,self::DB_PASSWORD,self::DB_NAME,self::DB_PORT);
            if($this->database){
                $db =  mysqli_select_db($this->database,self::DB_NAME);
            } else {
                echo mysqli_error($this->database);die;
            }
        }

        private function process_data(){
            $this->_index = ($_REQUEST['index'])?$_REQUEST['index']:NULL;
            $id = ($_REQUEST['id'])?$_REQUEST['id']:NULL;

            switch($this->_index){
                case 'Category':
                    $this->_query = "SELECT * FROM main_category";
                    $this->_fields = array('id','category_name');
                    break;
                case 'Subcategory':
                    $this->_query = "SELECT * FROM sub_category WHERE maincategory_id=$id";
                    $this->_fields = array('id','subcategory_name');
                    break;
                case 'Subcategory2':
                    $this->_query = "SELECT * FROM sub_category2 WHERE ssubcategory_id=$id";
                    $this->_fields = array('id','subcategory2_name');
                    break;
                default:
                    break;
            }
            $this->show_result();

        }

        public function show_result(){
            echo '<option value="">Select '.$this->_index.'</option>';
            $query = mysqli_query($this->database,$this->_query);
            while($result = mysqli_fetch_array($query)){
                $entity_id = $result[$this->_fields[0]];
                $enity_name = $result[$this->_fields[1]];
                echo "<option value='$entity_id'>$enity_name</option>";
            }
        }
    }

    $obj = new AJAX;

?>