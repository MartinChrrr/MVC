<?php
require_once(__ROOT__ . "/models/global_raw_array.php");

function DrawTags(string $tag) {
    return "<label class='tag'>
    ". $tag ."
</label>
";
}

function DrawHoraireProfile(string $horaire) {
    $array = GetHoraire();
    $value = null;
    foreach($array as $a) {
        if($a['key'] == $horaire) {
            $value =$a['value'];
        }
    }
    $start = "<label class='tag'>"; 
    
    $end = "</label>";
    return $start . $value . $end;
}
function DrawGamesProfile(array $game) {
    $start =  "<li>";
    $value = "<img src='" . $game['image'] . "' alt= 'Image du jeu ". $game ['titre'] ."'><p>" . $game['titre'] . "</p>";
    $end = "</li>";
    return $start . $value . $end;
}