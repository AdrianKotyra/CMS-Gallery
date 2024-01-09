<?php
    require_once("config.php");
    class Users extends db_object {
        protected static $db_table = "users";
        protected static $db_table_field =['username', 'password', 'first_name', 'last_name', 'user_image'] ;
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $user_image;
        public $image_directory = "images";
        public $image_placeholder = "http://placehold.it/400x400&text=image";

        public function image_path_and_placeholder(){
            return empty($this->user_image)? $this->image_placeholder : $this->image_directory.DS.$this->user_image;
        }
        public function picture_path() {
            return $this->image_directory.DS.$this->user_image;

        }
        public function delete_user() {
            if($this->delete()) {
                $target_path = SITE_ROOT.DS. 'admin'.DS. $this->picture_path();
                return unlink($target_path)? true : false;  //delete the file predfined function

            }
            else {
            return false;
            }
        }








    }







?>