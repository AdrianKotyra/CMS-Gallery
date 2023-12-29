<?php
    require_once("config.php");
    class Users {
        protected static $db_table = "users";
        protected static $db_table_field = ['username', 'password', 'first_name', 'last_name'];
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
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

        public static function instantiate($reccord) {
            $object = new self();
            foreach ($reccord as $attribute => $value) {
              if ($object->has_the_attribute($attribute)) {
                $object->$attribute = $value;
              }
            }
            return $object;
        }
        public static function create_query($query) {
            global $database;
            $result = $database->query_array($query);
            $the_object_array = array();
            while($row = mysqli_fetch_array($result)) {
                $the_object_array[] = self::instantiate($row);
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

        protected function properties() {
            $properties = [];
            foreach (self:: $db_table_field  as $db_field) {
                if(property_exists($this, $db_field )) {
                    $properties[$db_field] = $this->$db_field;
                }
            }
            return $properties;
            // return get_object_vars($this);
        }

        public function create() {
            $properties = $this->clean_properties();

            global $database;
            $sql = "INSERT INTO " .self::$db_table . "(". implode("," ,array_keys($properties))   .")"   ;
            $sql .= "VALUES ('".implode("', '" ,array_values($properties)) ."')";
            // $sql .= $database->escape_string($this->username) . "', '";
            // $sql .= $database->escape_string($this->password) . "', '";
            // $sql .= $database->escape_string($this->first_name) . "', '";
            // $sql .= $database->escape_string($this->last_name) . "')";

            if($database ->query_array($sql)) {
                $this->id = $database->the_insert_id();
                return true;
            } else {
                return false;
            }



        }
        protected function clean_properties() {
            global $database;
            $clean_properties=[];
            $properties = $this->properties();
            foreach ($properties as $key => $value) {
                $clean_properties[$key] = $database->escape_string($value);
            }
            return $clean_properties;

        }
        public function save() {
            return isset($this->id)? $this->update() : $this->create();
        }
        public function update() {
            global $database;

            $properties = $this->clean_properties();
            $properties_pairs = [];
            foreach ($properties as $key => $value) {
                $properties_pairs[] = "{$key}= '{$value}'";
            }

            $sql = "UPDATE " .self::$db_table . " SET ";
            $sql .= implode(", ", $properties_pairs);

            // $sql .= "username= '" . $database->escape_string($this->username) . "', ";
            // $sql .= "password= '" . $database->escape_string($this->password) . "', ";
            // $sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
            // $sql .= "last_name= '" . $database->escape_string($this->last_name) . "' ";
            $sql .= " WHERE id= " . $database->escape_string($this->id);

            $database->query_array($sql);

            return (mysqli_affected_rows($database->connection) ==1)? true : false;
        }

        public function delete() {
            global $database;
            $id_user_prop = $database->escape_string($this->id);
            $sql = "DELETE from " .self::$db_table . " WHERE id= $id_user_prop";


            $database->query_array($sql);

            return (mysqli_affected_rows($database->connection) ==1)? true : false;
        }








    }







?>