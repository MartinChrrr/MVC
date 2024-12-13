<?php
// Get all conversation from an user from his id 
function GetAllConversation(string $id) {
    $sql = "SELECT * FROM conversation WHERE id_user1 =:id OR id_user2=:id ";
    $stmt = SetDB()->prepare($sql);
    $stmt->execute(["id" => $id]);
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $datas;
}

function GetOtherId($conversationID,string $id) {
    $otherID = null;
    $sql = "SELECT id_user1, id_user2 FROM conversation WHERE id = :id";
    $stmt = SetDB()->prepare($sql);
    $stmt->execute(["id" => $id]);
    $ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($ids["id_user1"] == $id) {
        $otherID = $ids["id_user2"];
    } else {
        $otherID = $ids["id_user1"];
    }
    return $otherID;
}


