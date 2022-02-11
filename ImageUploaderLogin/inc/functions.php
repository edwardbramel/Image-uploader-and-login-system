<?php
function displayImages()
{
    $dir = "uploads";
    if (is_dir($dir)) {
        $dir_array = scandir($dir);
        foreach ($dir_array as $file) {
            if (strpos($file, '.') > 0) {
                echo
                "<div class='col-3' col-md-4 col-sm-6>
                    <div class='card'>
                        <a class='clickimage' href='$dir/$file'><img src='" . $dir . "/{$file}' alt='uploadedImg'></a>
                        <div class='card-body'>
                            <a class='deletebutton' href='?file=$dir" . '/' . "$file'>Delete Image</a>
                        </div>
                        </div>
                </div>";
            }
        }
        // "<div class='box'>
        // <a class='clickimage' href='$dir/$file'><img src='" . $dir . "/{$file}' alt='uploadedImg'></a>
        // <a class='deletebutton' href='?file=$dir" . '/' . "$file'>Delete Image</a>
        // </div>";
    }
}

function processFile()
{
    $upload_errors = array(
        UPLOAD_ERR_OK           => "no errors.",
        UPLOAD_ERR_INI_SIZE     => "lager than max file size.",
        UPLOAD_ERR_FORM_SIZE    => "larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL      => "Partial upload.",
        UPLOAD_ERR_NO_FILE      => "no file.",
        UPLOAD_ERR_NO_TMP_DIR   => "no temp directory.",
        UPLOAD_ERR_CANT_WRITE   => "can't write to disk.",
        UPLOAD_ERR_EXTENSION    => "file upload stopped by extention.",
    );

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $tmp_file = $_FILES['file_upload']['tmp_name'];
        $target_file = basename($_FILES['file_upload']['name']);
        $upload_dir = 'uploads';
        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            $message = "File uploaded successfully";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        }
        return $message;
    }
}

function displayErrorMessage()
{
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
}

function deleteFile()
{
    if (isset($_GET["file"])) {
        unlink($_GET['file']);
        // unlink("uploads/" . $_GET['file']);
    }
}
