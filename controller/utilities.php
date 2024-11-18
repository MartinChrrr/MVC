<?php
function DrawPage(array $data) {
    extract($data);
    require $view;
}

