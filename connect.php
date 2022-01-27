<?php
    $dsn = 'mysql:host=localhost;dbname=patiens';
    $usr = 'root';
    $pass = '';
    $options = array(

        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    try{

        $h_db = new PDO($dsn, $usr, $pass, $options);
        $h_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected';

    }
    catch(PDOException $e){
        echo 'Failed To Connect' . ' ' .  $e->getMessage();
    }