<?php
session_start();
include 'functions.php';

$mod = $_GET['m'] ?? 'home';
$act = $_GET['act'] ?? '';
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Sistem Pakar CF</title>
        <link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
    </head>

    <body>

        <nav>
            <a href="?">Home</a> |
            <a href="?m=konsultasi">Konsultasi</a> |
            <a href="?m=login">Login</a>
        </nav>

        <div class="container">
            <?php
            if (file_exists($mod . '.php'))
                include $mod . '.php';
            else
                include 'home.php';
            ?>
        </div>

    </body>

</html>