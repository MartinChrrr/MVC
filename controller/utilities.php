<?php
function DrawPage(array $data) {
    extract($data);
    require $view;
}

//Test if the second parameter is in the third parameter array
//@parameters 
//@out strings to create buttons
function CheckStringInArray(string $name, string $word, array $array) {
    switch($name){
        case "tags":
            if(in_array($word, $array)) {
                return DrawTagsButton($word, true);
            } else {
                return DrawTagsButton($word);
            }
        case "gender":
            if(in_array($word, $array)) {
                return DrawGenderOption($word, true);
            } else {
                return DrawGenderOption($word);
            }
        default:
        return "";
    }
}

function CheckArrayInArray(string $name,array $arrayToFind,array $arrayIn) {
    switch($name){
        case "horaire":
            if (in_array($arrayToFind,$arrayIn)) {
                return DrawHoraireButton($arrayToFind, true);
            } else {
                return DrawHoraireButton($arrayToFind);
            }
        case "games":
            if (in_array($arrayToFind,$arrayIn)) {
                return DrawGamesButton($arrayToFind, true);
            } else {
                return DrawGamesButton($arrayToFind);
            }
        default:
            return "";
    }

}

function GetAge(string $birthday) {
    $today = date("Y-m-d");
    $age = date_diff(baseObject: date_create(datetime: $birthday), targetObject: date_create(datetime: $today)) ->format('%y');
    return $age;
}

