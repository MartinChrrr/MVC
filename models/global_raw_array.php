<?php 



function GetGender() {
    $genders = ["Homme", "Femme", "Non binaire"];
    return $genders;
}

function GetTags() {
    $tags = ["Nul", "Nulle"];
    return $tags;
}

function GetHoraire() {
    $horaire = array(
        ["value" => "minuit" , "show"=> "00h-3h"],
        ["value" =>"trois" ,"show" => "3h-6h"],
        ["value" =>"six","show" => "6h-9h"],
        ["value" =>"neuf","show" => "9h-12h"],
        ["value" =>"douze","show"=> "12h-15h"],
        ["value" =>"quinze","show" => "15h-18h"],
        ["value" =>"dixhuit","show" => "18h-21h"],
        ["value" =>"vingtun","show" => "21h-00h"],
    );
    return $horaire;
}