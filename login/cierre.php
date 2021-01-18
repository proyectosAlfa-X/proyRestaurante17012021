<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
</head>
<body>
    
    <?php
session_start();
session_destroy();
header("location:../index.html");

    ?>
</body>
</html>