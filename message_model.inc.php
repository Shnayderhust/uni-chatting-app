<?php


function add_message(object $unigram_conn, $messagePackage)
{
    $sentMessage = $messagePackage->sentMessage;
    $receiverId = $messagePackage->receiverId;
    $senderId = $messagePackage->senderId;
    $convorId = $messagePackage->convorId;

    $query = "INSERT INTO messages(conversation_id, sender_id, receiver_id, message) VALUES(:conversation_id, :sender_id, :receiver_id, :message);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":conversation_id", $convorId);
    $stmt->bindParam(":sender_id", $senderId);
    $stmt->bindParam(":receiver_id", $receiverId);
    $stmt->bindParam(":message", $sentMessage);
    $stmt->execute();

    $query = "SELECT * FROM messages WHERE sender_id = :sender_id ORDER BY timestamp DESC LIMIT 1;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":sender_id", $senderId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}


function get_convorData(object $unigram_conn, $converId)
{
    $query = "SELECT * FROM messages WHERE conversation_id = :conversation_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":conversation_id", $converId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
