<?php
try {
    $dbconnection = new PDO('mysql:host=localhost;dbname=somewords', 'root', '');
} catch (Exception $e) {
    die("error ".$e->getMessage());
}