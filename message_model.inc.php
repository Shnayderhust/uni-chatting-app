<?php


function add_message(object $unigram_conn, $messagePackage)
{
    $sentMessage = $messagePackage->sentMessage;
    $messageId = $messagePackage->messageId;
    $receiverId = $messagePackage->receiverId;
    $senderId = $messagePackage->senderId;
    $convorId = $messagePackage->convorId;
    $timestamp = $messagePackage->timestamp;

    $query = "INSERT INTO messages(id, conversation_id, sender_id, receiver_id, message, timestamp) VALUES(:messageId, :conversation_id, :sender_id, :receiver_id, :message, :timestamp);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":messageId", $messageId);
    $stmt->bindParam(":conversation_id", $convorId);
    $stmt->bindParam(":sender_id", $senderId);
    $stmt->bindParam(":receiver_id", $receiverId);
    $stmt->bindParam(":message", $sentMessage);
    $stmt->bindParam(":timestamp", $timestamp);
    $stmt->execute();

    $query = "SELECT * FROM messages WHERE id > :id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":id", $messageId);
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
