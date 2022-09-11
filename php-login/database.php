<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ubitec';

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    }catch(PDOexception $e){
        die('Connection failed: '.$e->getMessage());
    }
?>