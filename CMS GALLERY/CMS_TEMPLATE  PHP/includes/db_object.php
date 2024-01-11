<?php

class db_object {
    public $upload_errors_array = [
        UPLOAD_ERR_OK => "There is no error, the file uploaded with success.",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => " Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => " Failed to write file to disk."

    ];


    public static function verify_user($username, $password) {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "SELECT * FROM " . static::$db_table . " WHERE ";
        $sql .= "username = '{$username}'";
        $sql .= "and password='{$password}'";
        $sql .= "LIMIT 1";
        $the_result_array = static::create_query($sql);
        return !empty($the_result_array)? array_shift($the_result_array) :  false;
    }

    protected function properties() {
        $properties = [];
        foreach (static::$db_table_field  as $db_field) {
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
        $sql = "INSERT INTO " .static::$db_table . "(". implode("," ,array_keys($properties))   .")"   ;
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

        $sql = "UPDATE " .static::$db_table . " SET ";
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
        $sql = "DELETE from " .static::$db_table . " WHERE id= $id_user_prop";


        $database->query_array($sql);

        return (mysqli_affected_rows($database->connection) ==1)? true : false;
    }


    private function has_the_attribute($property){

        $object_properites = get_object_vars($this);
        return array_key_exists($property, $object_properites);

    }
    public static function instantiate($reccord) {
        global $database;
        $caling_class = get_called_class();
        $object = new $caling_class;
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
            $the_object_array[] = static::instantiate($row);
        }
        return $the_object_array;

    }

    public static function find_all() {
        global $database;
        $query = "SELECT * FROM " . static::$db_table . " ";
        $selected_user=static::create_query($query);
        return $selected_user;



    }

    public static function find_by_id($id) {
        global $database;
        $the_result_array = static::create_query("SELECT * FROM " . static::$db_table . " WHERE ID=$id");
        return !empty($the_result_array)? array_shift($the_result_array) :  false;
        // if(!empty($the_result_array)) {
        //     $the_first_item = array_shift($the_result_array);
        //     return $the_first_item;
        // } else {
        //     return false;
        // }
    }











}

















?>