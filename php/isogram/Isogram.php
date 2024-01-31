<?php

function isIsogram(string $input): bool
{
    $inputToArray = mb_str_split(preg_replace('/[^\p{L}]+/u', '', mb_strtolower($input)));
    return count($inputToArray) === count(array_unique($inputToArray));
}
