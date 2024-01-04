<?php
    defined('DS') ?  null : define('DS' , DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ?  null : define('SITE_ROOT', DS . 'laragon' . DS .'www' . DS . 'CMS GALLERY' . DS . 'CMS_TEMPLATE  PHP');
    defined('INCLUDES_PATHS') ?  null : define('INCLUDES_PATHS', SITE_ROOT .DS. 'admin'. DS . 'includes');

    require_once("session.php");
    require_once("functions.php");
    require_once("config.php");
    require_once("data_base.php");
    require_once("db_object.php");
    require_once("photo.php");
    require_once("user.php");

?>