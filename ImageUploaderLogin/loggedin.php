<?php require "inc/functions.php" ?>
<?php
// home.php
session_start();
$pageTitle = 'Home';
?>
<?php require 'inc/header.inc.php'; ?>
<div class="container">
    <div class="row">
        <div class="col col-12 loggedin">
            <h1>You are logged in to <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'New User!' ?>'s account
            </h1>
        </div>
        <div class="col col-12">
            <div id="message"></div>
            <p>select an image to upload</p>
        </div>
        <div class="col col-12">
            <?php
            require "inc/form.html";
            $message = processFile();
            displayErrorMessage($message);
            deleteFile();
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-12">
            <div class="display">
                <?php
                displayImages();
                ?>
            </div>
        </div>
    </div>
</div>

<script defer src="js/script.js"></script>

<?php require 'inc/footer.inc.php' ?>