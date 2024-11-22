<?php

require_once "./models/pdo_model.php";

function CheckEmailAndPseudo(string $email,string $pseudo) {
    $sql = "SELECT * from profil WHERE email=:email OR pseudo=:pseudo";
    $stmt = SetDb()->prepare($sql);
    $stmt->execute(['email' => $email, 'pseudo' => $pseudo]);
    return $stmt->rowCount();
}

function Signup(string $id,string $email,string $pseudo,string $password,string $last_name,string $first_name, string $token) {
    $sql_username = "INSERT INTO username (id, pseudo, email, password, nom, prenom, token) VALUES (:id, :pseudo, :email, :last_name, :first_name, :token)";
    $stmt = SetDb()->prepare($sql_username);  
    $sql_profile = "INSERT INTO profil (id, pseudo) values (:id, :pseudo)";
    $stmt2 = SetDb()->prepare($sql_profile);
    return $stmt->execute(['id'=>$id,'pseudo' => $pseudo, 'email' => $email,'password'=>$password,'last_name'=>$last_name,'first_name'=>$first_name, 'token'=>$token])
    && $stmt2->execute(['id'=>$id,'pseudo' => $pseudo]);
}

function LoginPseudo(string $pseudo) {
    $sql = "SELECT * from profil WHERE pseudo=:pseudo";
    $stmt = SetDb()->prepare($sql);
    $stmt->execute(['pseudo' => $pseudo]);
    return $stmt->rowCount();
}

function LoginCheckPassword(string $pseudo) {
    $sql = "SELECT password from profil WHERE pseudo=:pseudo";
    $stmt = SetDb()->prepare($sql);
    $stmt->execute(['pseudo' => $pseudo]);
    return $stmt->fetch();
}

function UpdateToken(string $token, string $pseudo) {
    $sql = "UPDATE token SET token = :token WHERE pseudo = :pseudo";
    $stmt = SetDb()->prepare($sql);
    return $stmt-> execute(['token'=>$token, 'pseudo' => $pseudo]);
}

function GetToken(string $pseudo) {
    $sql = "SELECT token FROM username WHERE pseudo = :pseudo";
    $stmt = SetDb()->prepare($sql);
    $stmt-> execute(['pseudo' => $pseudo]);
    return $stmt->fetch();
}

function ProfilUpdate(string $bio, $birthday,string $stream,string $gender,string $pseudo) {
    $sql= "UPDATE profil SET biographie = :bio, birthday = :birthday', stream = :stream , genre = :gender 
        WHERE pseudo = :pseudo";
    $stmt = SetDb()->prepare($sql);
    return $stmt->execute(['bio' => $bio, 'birthday' => $birthday, 
    'stream' => $stream, 'gender' => $gender, 'pseudo' => $pseudo]);
}

function ProfilUpdateTags(string $horaires,string $tags,string $pseudo) {
    $sql = "UPDATE profil SET horaires = :horaires ,tags = :tags  WHERE pseudo = :pseudo";
    $stmt = SetDb()->prepare($sql);
    return $stmt->execute(['horaires' => $horaires, 'tags' => $tags, 'pseudo'  => $pseudo]);
}