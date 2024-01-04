<?php
    require_once("config.php");
    class Users extends db_object {
        protected static $db_table = "users";
        protected static $db_table_field =['username', 'password', 'first_name', 'last_name'];
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;














    }







?>