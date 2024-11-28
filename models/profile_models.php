<?php
require_once "./models/pdo_model.php";

function GetIDFromProfil(string $pseudo) {
    $sql = "SELECT id from profile WHERE pseudo= :pseudo";
    $stmt = SetDB()->prepare($sql);
    $stmt->execute(["pseudo" => $pseudo]);
    return $stmt->fetch();
}

function GetProfile(string $id) {
    $req = "SELECT * FROM profile WHERE id=:id";
    $stmt = SetDB()->prepare($req);
    $stmt->execute(["id" => $id]);
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $datas;
}

function GetGamesFromID( string $id) {
    $sql = "SELECT * FROM jouer WHERE id_profil =:id";
    $stmt = SetDB()->prepare($sql);
    $stmt->execute(["id" => $id]);
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $array_games = array();
    foreach($datas as $data) {
        
    }
}

function UpdateHoraireAndTags(string $horaire, string $tags, $pseudo) {
    $sql = "UPDATE profil SET horaires =:horaire ,tags =:tags  WHERE pseudo = :pseudo";
    $stmt = SetDB()->prepare($sql);
    return $stmt->execute(["horaire" => $horaire, "tags" => $tags,"pseudo" => $pseudo]);
}