<?php


// The functions below deals with user table
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

function get_alluser(object $unigram_conn, $currentLogedInUserId)
{
    $query = "SELECT * FROM users WHERE user_id <> :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// The functions below deals mainly with friend table and user table a little
function check_userfriends(object $unigram_conn, $currentLogedInUserId, $userIdToAdd)
{
    $query = "SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->bindParam(":friend_id", $userIdToAdd);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}

function add_userfriends(object $unigram_conn, $currentLogedInUserId, $userIdToAdd)
{
    $query = "INSERT INTO friends(user_id, friend_id) VALUES(:user_id, :friend_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->bindParam(":friend_id", $userIdToAdd);
    $stmt->execute();
}

function get_userfriendsid(object $unigram_conn, $currentLogedInUserId)
{
    $query = "SELECT friend_id FROM friends WHERE user_id = :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_userfriendsdata(object $unigram_conn, $UserFriendsId)
{
    $allUserData = [];

    $query = "SELECT * FROM users WHERE user_id = :user_id;";

    foreach ($UserFriendsId as $FriendId) {

        $stmt = $unigram_conn->prepare($query);
        $stmt->bindParam(":user_id", $FriendId["friend_id"]);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $allUserData = array_merge($allUserData, $result);
    }
    return $allUserData;
}

function get_useronefrienddata(object $unigram_conn, $userIdToStartConvo)
{

    $query = "SELECT * FROM users WHERE user_id = :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}



// The below function deals with conversation table
function doesConvoExistForCurrentUser(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $query = "SELECT convor_id FROM conversation WHERE
     (user1_id = :user1_id AND user2_id = :user2_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}

function doesConvoExistForBothUser(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $query = "SELECT convor_id FROM conversation WHERE
     (user1_id = :user1_id AND user2_id = :user2_id) OR (user1_id = :user2_id AND user2_id = :user1_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}

function add_convo(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $convor_id = $currentLogedInUserId . $userIdToStartConvo;
    $query = "INSERT INTO conversation(convor_id, user1_id, user2_id) VALUES(:convor_id, :user1_id, :user2_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->bindParam(":convor_id", $convor_id);
    $stmt->execute();
}

function get_convoid(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $query = "SELECT convor_id FROM conversation WHERE user1_id = :user1_id AND user2_id = :user2_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_convodata(object $unigram_conn, $convoId)
{
    $allConvoData = [];

    $query = "SELECT * FROM messages WHERE conversation_id = :conversation_id";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":conversation_id", $convoId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $allConvoData = array_merge($allConvoData, $result);

    return $allConvoData;
}

// queryng friends id from conversation table

function get_allFriendsId(object $unigram_conn, $currentLogedInUserId)
{
    $query = "SELECT user2_id FROM conversation WHERE user1_id = :user1_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_alluserfriendsdata(object $unigram_conn, $allUserFriendsId)
{
    $allUserData = [];

    $query = "SELECT * FROM users WHERE user_id = :user_id;";

    foreach ($allUserFriendsId as $FriendId) {

        $stmt = $unigram_conn->prepare($query);
        $stmt->bindParam(":user_id", $FriendId["user2_id"]);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $allUserData[] = $result;
    }

    return $allUserData;
}


function get_allConvoIdOfOneUser(object $unigram_conn, $currentLogedInUserId)
{
    $query = "SELECT convor_id FROM conversation WHERE user1_id = :user1_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}




// function get_allconvoDataOfOneUser(object $unigram_conn, $allConvoIds)
// {
//     $allConvoData = [];

//     $query = "SELECT * FROM messages WHERE conversation_id = :conversation_id";

//     foreach ($allConvoIds as $convoId) {
//         $stmt = $unigram_conn->prepare($query);
//         $stmt->bindParam(":conversation_id", $convoId["convor_id"]);
//         $stmt->execute();

//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         $allConvoData = array_merge($allConvoData, $result);
//     };


//     return $allConvoData;
// }
