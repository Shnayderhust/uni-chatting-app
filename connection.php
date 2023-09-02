<?php

$db_host = 'localhost';
$db_name = 'unigramdb';
$db_user = 'unigram';
$db_password = 'password';

$unigram_conn = new mysqli($db_host,$db_user,$db_password,$db_name);

if($unigram_conn->connect_error){
    printf("connction error", $unigram_conn->connect_error);
    exit();
}

?>