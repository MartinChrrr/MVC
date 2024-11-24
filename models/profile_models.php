<?php
require_once "./models/pdo_model.php";


function GetProfile(string $id) {
    $req = "SELECT * FROM profile WHERE id='" . $id ."'";
    $stmt = SetDB()->prepare($req);
    $stmt->execute();
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $datas;
}

function GetGamesFromID( string $id) {
    $sql = "SELECT * FROM jouer WHERE id_profil = '{$id}'";
    $stmt = SetDB()->prepare($sql);
    $stmt->execute();
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $array_games = array();
    foreach($datas as $data) {
        
    }
}