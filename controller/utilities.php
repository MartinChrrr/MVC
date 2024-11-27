<?php
function DrawPage(array $data) {
    extract($data);
    require $view;
}

//Test if 
//@parameters 
function CheckArray(string $name, string $word, array $array) {
    switch($name){
        case "tags":
            if(in_array($word, $array)) {
                DrawTagsButton($word, true);
            } else {
                DrawTagsButton($word);
            }
            break;
        case "games":
            if(in_array($word, $array)) {
                DrawGamesButton($word, true);
            } else {
                DrawGamesButton($word);
            }
            break;
        case "horaire":
            if(in_array($word, $array)) {
                DrawHoraireButton($word, true);
            } else {
                DrawHoraireButton($word);
            }
            break;
        case "gender":
            if(in_array($word, $array)) {
                DrawGenderOption($word, true);
            } else {
                DrawGenderOption($word);
            }
            break;
        default:
            break;
    }
}