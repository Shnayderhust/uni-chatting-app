<?php

function get_user(object $unigram_conn, $username)
{
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_status(object $unigram_conn, $username, $status)
{
    $query = "UPDATE users SET status = :status WHERE username = :username;";
    $stmt = $unigram_conn->prepare($query);


    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":status", $status);
    $stmt->execute();
}

function get_alluser(object $unigram_conn, $currentUserId)
{
    $query = "SELECT * FROM users WHERE user_id <> :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function add_userfriends(object $unigram_conn, $currentUserId, $userIdToAdd)
{
    $query = "INSERT INTO friends(user_id, friend_id) VALUES(:user_id, :friend_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentUserId);
    $stmt->bindParam(":friend_id", $userIdToAdd);
    $stmt->execute();
}

function get_userfriendsid(object $unigram_conn, $currentUserId)
{
    $query = "SELECT friend_id FROM friends WHERE user_id = :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_userfriendsdata(object $unigram_conn, $UserFriendsId)
{
    $allUserData = [];

    $query = "SELECT * FROM users WHERE user_id = :user_id;";

    foreach ($UserFriendsId as $FriendsId) {

        $stmt = $unigram_conn->prepare($query);
        $stmt->bindParam(":user_id", $FriendsId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $allUserData = $result;
    }
    return $allUserData;
}



function check_userfriends(object $unigram_conn, $currentUserId, $userIdToAdd)
{
    $query = "SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentUserId);
    $stmt->bindParam(":friend_id", $userIdToAdd);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
