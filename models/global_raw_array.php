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
        ["key" => "minuit" , "value"=> "00h-3h"],
        ["key" =>"trois" ,"value" => "3h-6h"],
        ["key" =>"six","value" => "6h-9h"],
        ["key" =>"neuf","value" => "9h-12h"],
        ["key" =>"douze","value"=> "12h-15h"],
        ["key" =>"quinze","value" => "15h-18h"],
        ["key" =>"dixhuit","value" => "18h-21h"],
        ["key" =>"vingtun","value" => "21h-00h"],
    );
    return $horaire;
}