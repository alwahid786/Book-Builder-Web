<?php
if (isset($_FILES['upload']['name'])) {
    // $time = time();
    // $file = $time . $_FILES['upload']['name'];
    // $filetmp = $time . $_FILES['upload']['tmp_name'];

    // $upload_dir = '/bookbuilder/public/uploads/';
    // $upload_path = $_SERVER['DOCUMENT_ROOT'] . $upload_dir; // adjust this based on your server configuration
    // if (!file_exists($upload_dir)) {
    //     mkdir($upload_dir, 0777, true);
    // }
    // move_uploaded_file($filetmp, $upload_path . $file);

    $root_path = $_SERVER['DOCUMENT_ROOT'];

    // Set the path to the public directory
    $public_path = $root_path . '/bookbuilder/public';

    // Set the path to the uploads directory inside the public directory
    $uploads_dir = $public_path . '/uploads';

    // If the uploads folder doesn't exist, create it
    if (!file_exists($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    // Set the path to the file that was uploaded
    $upload_file = $uploads_dir . '/' . basename($_FILES['upload']['name']);
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $upload_file)) {
        // Get the URL to the uploaded file
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/bookbuilder/public/uploads/' . basename($_FILES['upload']['name']);
        echo 'File uploaded successfully. URL: ' . $url;
    }else{
        $url = 'Nothing Saved';
    }

    $function_number = $_GET['CKEditorFuncNum'];
    $message = '';
    echo "<script>window.parent.CKEDITOR.tools.callFunction('" . $function_number . "','" . $url . "','" . $message . "');</script>";
}
