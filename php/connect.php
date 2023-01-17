<?php
    
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'battleship';

    $connect = new mysqli($host, $user, $password, $database);

    if ($connect->connect_error)
    {
        die('Error connect to DataBase');
    }
