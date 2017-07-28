<?php
    $dsn = 'mysql:host=sql.njit.edu;dbname=wt49';
    $username = 'wt49';
    $password = 'CImYkE0rQ';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
