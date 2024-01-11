
<?php

    if(isset($_POST["submit"])) {


    $upload_error = array(
        UPLOAD_ERR_OK => "There is no error, the file uploaded with success.",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => " Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => " Failed to write file to disk."

    );
    $directory = "uploads";
    $temp_name = $_FILES["file_upload"]["tmp_name"]; //  temporary file location on local machine
    $the_file = $_FILES["file_upload"]["name"]; // file name

    if(move_uploaded_file($temp_name, $directory . "/" . $the_file)) {
        $the_message = $upload_error[0];
    } else {
        $file_error = $_FILES["file_upload"]["error"];
        $the_message = $upload_error[$file_error];
    }










}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="uploads.php" enctype="multipart/form-data" method="POST">
        <?php
        if(!empty($upload_error)) {
            echo $the_message;
        }


        ?>
        <input type="file" name="file_upload">


        <input type="submit" name="submit">





    </form>




</body>
</html>


