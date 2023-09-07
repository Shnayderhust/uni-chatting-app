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

function set_user(object $unigram_conn, $firstname, $lastname, $username, $email, $password)
{
    $query = "INSERT INTO users (firstname, lastname, username, email, `password`) VALUES (:firstname, :lastname, :username, :email, :hashedpassword);";
    $stmt = $unigram_conn->prepare($query);

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":hashedpassword", $hashedPassword);
    $stmt->execute();
}
