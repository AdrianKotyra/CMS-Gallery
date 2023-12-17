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
            $query2 = "SELECT * FROM users where id=$user_id";
            $selected_user=self::create_query($query2);
            $selected_user_list = mysqli_fetch_array($selected_user);
            return $selected_user_list;



        }
        public static function create_query($query) {
            global $database;
            $result = $database->query_array($query);
            return $result;

        }
        public static function RunOnstart($find_user_query) {
            $Object = new self;

            $Object->id = $find_user_query["id"];
            $Object->username = $find_user_query["username"];
            $Object->password = $find_user_query["password"];
            $Object->firstname = $find_user_query["first_name"];
            $Object->lastname = $find_user_query['last_name'];

            return $Object;
        }






    }







?>