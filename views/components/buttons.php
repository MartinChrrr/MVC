<?php

function DrawTagsButton(string $tags) {
    return "<div class='checkbox-button' onclick=toggleCheckbox('". $tags ."')>
    <input type='checkbox' name='player-tags[]' value='" . $tags ."' id ='". $tags . "' >
    <label for='" . $tags ."'> ". $tags  ."
    </label>



</div>";
}

function DrawHoraireButton(array $horaire) {
    $key = $horaire["key"];
    $value = $horaire["value"];
    return "<div class='checkbox-button' onclick=toggleCheckbox('". $key ."')  >
    <input type='checkbox' name='player-horaire[]' value='" . $key ."' id ='". $key . "' >
    <label for='" . $key ."'> ". $value  ."
    </label>



</div>";

}