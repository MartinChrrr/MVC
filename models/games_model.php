<?php

require_once "./models/pdoModels.php";

function GetGames() 
{
    $req = "SELECT * FROM jeux ";
    $stmt = SetDB()->prepare($req);
    $stmt->execute();
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $datas;
    
}