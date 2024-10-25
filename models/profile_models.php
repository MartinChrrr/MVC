<?php
require_once "./models/pdoModels.php";


function GetProfile($id) {
    $req = "SELECT * FROM profile WHERE id='" . $id ."'";
    $stmt = SetDB()->prepare($req);
    $stmt->execute();
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $datas;
}