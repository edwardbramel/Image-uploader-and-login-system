<?php
// home.php
session_start();
$pageTitle = 'Home';
require 'inc/header.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col homepage col-12">
            <h1>Hello!</h1>
        </div>
        <div class="col homepage col-12">
            <p>Welcome to my image uploader site. Please either <a href="register.php">register</a> an account with us or <a href="login.php">login</a> to an existing account.</p>
            <div id="message"></div>
        </div>
    </div>
</div>

<script defer src="js/script.js"></script>

<?php require 'inc/footer.inc.php' ?>