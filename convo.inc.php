<?php

require_once "dbconnection.inc.php";
require_once "sessionconfig.inc.php";
require_once "chat_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $userIdToStartConvo = $data->getUserId;

    if ($userIdToStartConvo === 'initial_load') {
        $allUserFriendsId = get_allFriendsId($unigram_conn, $currentLogedInUserId);
        $allUserFriendsData = get_alluserfriendsdata($unigram_conn, $allUserFriendsId);

        $currentLoggedUserConvoIds = get_allConvoIdOfOneUser($unigram_conn, $currentLogedInUserId);

        $response = array(
            'allUserFriendsData' => $allUserFriendsData,
            'currentLoggedUserConvoIds' => $currentLoggedUserConvoIds,
            'currentLogedInUserId' => $currentLogedInUserId
        );

        echo json_encode($response);
        http_response_code(200);
    } elseif (doesConvoExistForCurrentUser($unigram_conn, $currentLogedInUserId, $userIdToStartConvo)) {

        $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $userIdToStartConvo);

        echo json_encode($convoId);
        http_response_code(201);
    } else if (doesConvoExistForBothUser($unigram_conn, $currentLogedInUserId, $userIdToStartConvo)) {
        $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $userIdToStartConvo);
        $userOneFriendData = get_useronefrienddata($unigram_conn, $userIdToStartConvo);

        $response = array(
            'userOneFriendData' => $userOneFriendData,
            'convoId' => $convoId,
            'currentLogedInUserId' => $currentLogedInUserId
        );

        echo json_encode($response);
        http_response_code(202);
    } else {
        add_convo($unigram_conn, $currentLogedInUserId, $userIdToStartConvo);

        $userOneFriendData = get_useronefrienddata($unigram_conn, $userIdToStartConvo);

        $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $userIdToStartConvo);
        $allConvoData = get_convodata($unigram_conn, $convoId["convor_id"]);

        $lastConvoRowData = end($allConvoData);

        $response = array(
            'userOneFriendData' => $userOneFriendData,
            'convoId' => $convoId,
            'currentLogedInUserId' => $currentLogedInUserId
        );
        echo json_encode($response);
        http_response_code(200);
    }
}
