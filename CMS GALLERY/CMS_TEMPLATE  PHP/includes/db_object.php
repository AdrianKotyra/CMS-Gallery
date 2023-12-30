<?php

class db_object {
    protected static $db_table = "users";



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

    public static function find_by_id($user_id) {
        global $database;
        $the_result_array = static::create_query("SELECT * FROM " . static::$db_table . " WHERE ID=$user_id");
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