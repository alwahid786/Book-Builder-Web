<?php
if (isset($_FILES['upload']['name'])) {
    $time = time();
    $file = $time . $_FILES['upload']['name'];
    $filetmp = $time . $_FILES['upload']['tmp_name'];

    $upload_dir = '/bookbuilder/public/uploads/';
    $upload_path = $_SERVER['DOCUMENT_ROOT'] . $upload_dir; // adjust this based on your server configuration
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    move_uploaded_file($filetmp, $upload_path . $file);
    $function_number = $_GET['CKEditorFuncNum'];
    $url = 'http://localhost' . $upload_dir . $file;
    $message = '';
    echo "<script>window.parent.CKEDITOR.tools.callFunction('" . $function_number . "','" . $url . "','" . $message . "');</script>";
}
