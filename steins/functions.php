<?php

function check_data($liste)
{
    $temp = true;
    foreach ($liste as $key) {
        if (! isset($_POST[$key] )) {
            $temp = false;
        }
    if ($temp) {
        foreach ($liste as $key){
            if (trim($_POST[$key] === "")) {
                $temp = false;
            }
        }
    }
    return $temp;
    }
}