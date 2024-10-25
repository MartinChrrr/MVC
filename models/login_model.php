<?

require_once "./models/pdo_model.php";

function CheckEmailAndPseudo($email, $pseudo) {
    $sql = "SELECT * from profil WHERE email=:email OR pseudo=:pseudo";
    $stmt = SetDb()->prepare($sql);
    $stmt->execute(['email' => $email, 'pseudo' => $pseudo]);
    return $stmt->rowCount();
}

function Signup($id, $email, $pseudo, $password, $last_name, $first_name) {
    $sql_username = "INSERT INTO username (id, pseudo, email, password, nom, prenom) VALUES (:id, :pseudo, :email, :last_name, :first_name)";
    $stmt = SetDb()->prepare($sql_username);  
    $sql_profile = "INSERT INTO profil (id, pseudo) values (:id, :pseudo)";
    $stmt2 = SetDb()->prepare($sql_profile);
    return $stmt->execute(['id'=>$id,'pseudo' => $pseudo, 'email' => $email,'password'=>$password,'last_name'=>$last_name,'first_name'=>$first_name])
    && $stmt2->execute(['id'=>$id,'pseudo' => $pseudo]);
}

function LoginPseudo($pseudo) {
    $sql = "SELECT * from profil WHERE pseudo=:pseudo";
    $stmt = SetDb()->prepare($sql);
    $stmt->execute(['pseudo' => $pseudo]);
    return $stmt->rowCount();
}

function LoginCheckPassword($pseudo) {
    $sql = "SELECT password from profil WHERE pseudo=:pseudo";
    $stmt = SetDb()->prepare($sql);
    $stmt->execute(['pseudo' => $pseudo]);
    return $stmt->fetch();
}

function ProfilUpdate($bio, $birthday, $stream, $gender, $id) {
    $sql= "UPDATE profil SET biographie = :bio, birthday = :birthday', stream = :stream , genre = :gender 
        WHERE pseudo = :id";
    $stmt = SetDb()->prepare($sql);
    return $stmt->execute(['bio' => $bio, 'birthday' => $birthday, 'stream' => $stream, 'gender' => $gender, 'id' => $id]);
}