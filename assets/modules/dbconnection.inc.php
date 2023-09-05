<?php

$db_host = 'localhost';
$db_name = 'unigramdb';
$db_user = 'unigram';
$db_password = 'password';

try {
    $unigram_conn = new PDO("mysql:host = $db_host;dbname = $db_name", $db_user, $db_password);
    $unigram_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("connection error:" . $e->getMessage());
}
