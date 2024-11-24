<?php

function DrawTags(string $tag) {
    return "<label class='tag'>
    ". $tag ."
</label>
";
}

function DrawGamesProfile(array $game) {
    $component =  "<li>";
    $component += "<img src='" . $game['image'] . "' alt= 'Image du jeu ". $game ['titre'] ."'>"; 
    $component += "<p>" . $game['titre'] . "</p>";
    $component += "</li>";
    return $component;
}