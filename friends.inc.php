<?php

require_once "dbconnection.inc.php";
require_once "sessionconfig.inc.php";
require_once "chat_model.inc.php";

$currentUserId = $_SESSION["userid"];

$users = get_alluser($unigram_conn, $currentUserId);


function displayuserprof($users)
{
    foreach ($users as $user) {
        echo '<div class="onefriend" data-username = "' . $user["username"] . '">';
        echo '<div class="leftprof">';
        echo '<img src="' . $user["profile_pic_id"] . '" alt="" class="profpic">';
        echo '<div class="details">';
        echo '<h3 class="jina">' . $user["username"] . '</h3>';
        echo '<p class="friendbio">' . $user["bio"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<button class="addfriend" data-username = "' . $user["user_id"] . '">ADD</button>';
        echo '</div>';
    }
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $userIdToAdd = $data->getUserId;

    if (empty(check_userfriends($unigram_conn, $currentUserId, $userIdToAdd))) {
        http_response_code(400);
    } else {
        add_userfriends($unigram_conn, $currentUserId, $userIdToAdd);
        http_response_code(200);
    }
}


$UserFriendsId = get_userfriendsid($unigram_conn, $currentUserId);

$allUserData = get_userfriendsdata($unigram_conn, $UserFriendsId);




function displayuserfriends($allUserData)
{
    foreach ($allUserData as $friend) {
        echo '<div class="userfriend" data-username = "' . $friend["username"] . '">';
        echo '<div class="leftprof">';
        echo '<img src="' . $friend["profile_pic_id"] . '" alt="" class="profpic">';
        echo '<div class="details">';
        echo '<h3 class="jina">' . $friend["username"] . '</h3>';
        echo '<p class="friendbio">' . $friend["bio"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<button class="addfriend" data-username = "' . $friend["user_id"] . '">ADD</button>';
        echo '</div>';
    }
}
