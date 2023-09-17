<?php

require_once "dbconnection.inc.php";
require_once "sessionconfig.inc.php";
require_once "message_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $messagePackage = $data->messagePackage;

    if ($messagePackage->onloadFlag === 'initial_load') {
        $convorId = $messagePackage->convorId;
        $allConvoMessages = get_convorData($unigram_conn, $convorId);

        echo json_encode($allConvoMessages);
        http_response_code(201);
    } else {
        $lastMessage = add_message($unigram_conn, $messagePackage);

        echo json_encode($lastMessage);
        http_response_code(200);
    }
}
