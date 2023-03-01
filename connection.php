<?php
    $dsn = "pgsql:host=localhost;port=5432;dbname=MOVIE_STAR";
    $user = "postgres";
    $pass = "12345678";
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>