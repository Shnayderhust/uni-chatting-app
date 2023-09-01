<?php

$db_host = 'localhost';
$db_name = 'chatdb';
$db_user = 'root';
$db_password = '';

$Unigram_conn = new mysqli($db_host,$db_name,$db_user,$db_password);

if($Unigram_conn->connect_error){
    printf("connction error", $Unigram_conn->connect_error);
    exit();
}

?>