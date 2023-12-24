<?php
    require_once("config.php");
    class Users {
        public $id;
        public $username;
        public $password;
        public $firstname;
        public $lastname;
        public static function find_all_users() {
            global $database;
            $query = "SELECT * FROM users";
            $selected_user=self::create_query($query);
            return $selected_user;



        }

        public static function find_user_by_id($user_id) {
            global $database;
            $the_result_array = self::create_query("SELECT * FROM USERS WHERE ID=$user_id");
            return !empty($the_result_array)? array_shift($the_result_array) :  false;
            // if(!empty($the_result_array)) {
            //     $the_first_item = array_shift($the_result_array);
            //     return $the_first_item;
            // } else {
            //     return false;
            // }
        }

        public static function RunOnstart($find_user_query) {
            $Object = new self;

            // $Object->id = $find_user_query["id"];
            // $Object->username = $find_user_query["username"];
            // $Object->password = $find_user_query["password"];
            // $Object->firstname = $find_user_query["first_name"];
            // $Object->lastname = $find_user_query['last_name'];


            foreach ($find_user_query as $property => $value) {
                if($Object->has_the_attribute($property)) {
                    $Object->$property = $value;
                }


            }

            return $Object;
        }
        public static function create_query($query) {
            global $database;
            $result = $database->query_array($query);
            $the_object_array = array();
            while($row = mysqli_fetch_array($result)) {
                $the_object_array[] = self::RunOnstart($row);
            }
            return $the_object_array;

        }
        public static function verify_user($username, $password) {
            global $database;
            $username = $database->escape_string($username);
            $password = $database->escape_string($password);
            $sql = "SELECT * FROM users WHERE ";
            $sql .= "username = '{$username}'";
            $sql .= "and password='{$password}'";
            $sql .= "LIMIT 1";
            $the_result_array = self::create_query($sql);
            return !empty($the_result_array)? array_shift($the_result_array) :  false;
        }

        private function has_the_attribute($property){
            $object_properites = get_object_vars($this);
            return array_key_exists($property, $object_properites);

        }

        public function create() {
            global $database;
            $sql = "INSERT INTO users (username, password, first_name, last_name)";
            $sql .= "VALUES ('";
            $sql .= $database->escape_string($this->username) . "', '";
            $sql .= $database->escape_string($this->password) . "', '";
            $sql .= $database->escape_string($this->firstname) . "', '";
            $sql .= $database->escape_string($this->lastname) . "')";

            if($database ->query_array($sql)) {
                $this->id = $database->the_insert_id();
                return true;
            } else {
                return false;
            }



        }







    }







?>