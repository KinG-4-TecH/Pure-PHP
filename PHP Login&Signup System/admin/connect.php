<?php

    $DB_hostname = 'localhost';
    $DB_username = 'root';
    $DB_name     = 'loginsystem';
    $DB_password = '';

    try{
        $conn = new PDO("mysql:host=$DB_hostname; dbname=$DB_name", $DB_username, $DB_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "Erro :" . $e->getMessage();
    }