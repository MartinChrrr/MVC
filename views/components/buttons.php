<?php

function DrawTagsButton(string $tags, bool $checked = false) {
    $string =  "<div class='checkbox-button' onclick=toggleCheckbox('". $tags ."')>
    <input type='checkbox' name='player-tags[]' value='" . $tags ."' id ='". $tags . "'";
    $string_check = " ";
    if($checked) {
        $string_check = " checked ";
    }
    $string_end =" 
    >
    <label for='" . $tags ."'> ". $tags  ."
    </label>
    </div>";
    return $string . $string_check . $string_end;
}

function DrawGenderOption(string $gender, bool $checked = false) {
    $start =  "<option value='" . strtolower($gender) . "'";
    $string_check = " ";
    if($checked) {
     $string_check = "selected";   
    }
    $end = "> " . $gender . "</option>";
    return $start . $checked . $end;
}

function DrawHoraireButton(array $horaire, bool $checked = false) {
    $key = $horaire["key"];
    $value = $horaire["value"];
    $string_check = " ";
    $string = "<div class='checkbox-button' onclick=toggleCheckbox('". $key ."')  >
    <input type='checkbox' name='player-horaire[]' value='" . $key ."' id ='". $key . "'";
    if($checked) {
        $string_check = " checked ";
    }
    $string_end = ">
    <label for='" . $key ."'> ". $value  ."
    </label>
</div>";
    return $string . $string_check . $string_end;
}

function DrawGamesButton(array $game, bool $checked = false) {
    $string_check = " ";
    $string = '<div class="jeu">
    <input type="checkbox" name="jeux[]" value="'. $game['id'] .'" id="'
    . $game['id'] .'" ';
    
    if($checked) {
        $string_check = " checked";
    }

    $end = '/>
    <label for="'. $game['id'] .'"><img class="image-jeux" src="'. $game['image'] .' "/></label>
    </div>';
    return $string . $string_check . $end;
}
