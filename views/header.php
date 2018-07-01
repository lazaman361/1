<!doctype html>
<html lang="en">
<head>
    <title>Website</title>
    <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php
Session::init();
?>
<ul id="navigation">

<!--    If user is not logged in:-->
    <?php
    if(Session::get('loggedIn') == false){?>
        <li><a href="<?php echo URL;?>">Home</a></li>
        <li><a href="<?php echo URL;?>login">Login</a></li>
    <?php
    }
    ?>


<!--    If user is logged in:-->
    <?php
    if(Session::get('loggedIn') == true){?>
        <li><a href="<?php echo URL;?>dashboard">Home</a></li>
        <li><a href="<?php echo URL;?>lau">List all users</a></li>
        <li><a href="<?php echo URL;?>logout">Logout</a></li>
    <?php
    }
    ?>


</ul>