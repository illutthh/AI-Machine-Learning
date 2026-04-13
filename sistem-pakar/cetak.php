<?php include 'functions.php'; ?>

<html>

    <head>
        <title>Cetak</title>
    </head>

    <body onload="window.print()">

        <?php
        if (is_file($mod . '_cetak.php'))
            include $mod . '_cetak.php';
        ?>

    </body>

</html>