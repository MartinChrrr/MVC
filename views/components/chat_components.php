<?php
require_once(__ROOT__ . "/models/chats_model.php");
require_once(__ROOT__ . "/models/profile_models.php");

for ($i = 0; $i < count($otherID); $i++){
    echo "
    <div class='chat-card'>
       <img src= '". $otherPictures[$i] ."'>
       <a href='conversation.php?id=". $convIDs[$i]."' class='chat-card-text'>
           <h5>". $otherName[$i]  ." </h5> 
            <p class='medium-regular greyscale300'>". $messages[$i] ."</p>
        </a>
        <p class='heure'> ". $heures[$i]." </p> 
    </div>
    
    ";}

    function ChatCard($convID, $my_id, $message, $heure) {
        $otherID = GetOtherId($convID, $my_id);
        $profil = GetProfile($otherID);
        $string = "<div class='chat-card'>
        <img src= '". $profil["photo"] ."'>
        <a href='conversation.php?id=". $convID ."' class='chat-card-text'>
            <h5>". $profil['pseudo']  ." </h5> 
             <p class='medium-regular greyscale300'>". $message ."</p>
         </a>
         <p class='heure'> ". $heure." </p> 
     </div>
     
     ";
        return $string;

    }