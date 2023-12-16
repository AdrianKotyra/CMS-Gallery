<?php
    require_once("config.php");
    class Users {

        public static function find_all_users() {
            global $database;
            $query = "SELECT * FROM users";
            $selected_user=self::create_query($query);
            return $selected_user;



        }
        public static function find_user_by_id($user_id) {
            global $database;
            $query2 = "SELECT * FROM users where id=$user_id";
            $selected_user=self::create_query($query2);
            return $selected_user;



        }
        public static function create_query($query) {
            global $database;
            $result = $database->query_array($query);
            return $result;

        }






    }







?>