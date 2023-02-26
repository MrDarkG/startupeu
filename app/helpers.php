<?php
function generateSlug($title)
{
    $slugTitle = str_replace(" ", "-", $title);
    $notAllowedChars = ['.','/','>','?','<','\\','',"#"];
    foreach ($notAllowedChars as $value) {
        $slugTitle = str_replace($value, "-", $slugTitle);
    }
    return strval($slugTitle);
}

