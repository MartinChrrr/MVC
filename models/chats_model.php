<?php
// Get all conversation from an user from his id 
function GetAllConversation(string $id) {
    $sql = "SELECT * FROM conversation WHERE id_user1 =:id OR id_user2=:id ";
    $stmt = SetDB()->prepare($sql);
    $stmt->execute(["id" => $id]);
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $datas;
}

