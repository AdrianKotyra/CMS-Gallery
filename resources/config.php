<?php

    defined("DS") ? null :define("DS", DIRECTORY_SEPARATOR);

    defined("TEMPLATE_FRONT") ? NULL : define("TEMPLATE_FRONTEND", __DIR__ . DS . "templates/frontend");
    defined("TEMPLATE_BACK") ? NULL : define("TEMPLATE_BACKEND", __DIR__ . DS . "templates/backend");



    defined("DB_HOST") ? NULL : define("DB_HOST", "localhost");
    defined("DB_USER") ? NULL : define("DB_USER", "root");
    defined("DB_PASS") ? NULL : define("DB_PASS", "");
    defined("DB_NAME") ? NULL : define("DB_NAME", "ecom_db");

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);



    require_once("functions.php");




?>;
