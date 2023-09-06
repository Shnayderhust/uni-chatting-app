<?php

function get_username(object $unigram_conn, $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $unigram_conn, $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
