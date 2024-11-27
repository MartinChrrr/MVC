<?php

require_once "./models/pdo_model.php";

function GetGames() 
{
    $sql = "SELECT * FROM jeux ";
    $stmt = SetDB()->prepare($sql);
    $stmt->execute();
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $datas;
}

function DeleteAllGamesFromID($id) {
    $sql = "DELETE FROM jouer WHERE id_profil = :id";
    $stmt = SetDB()->prepare($sql);
    return $stmt->execute(["id" => $id]);
}

function AddGame($game, $id) { 
    $sql = "INSERT INTO jouer(id_jeux, id_profil) VALUES (:game, :id)";
    $stmt = SetDB()->prepare($sql);
    return $stmt->execute(["game" => $game,"id" => $id]);
}