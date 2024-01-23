<?php

function language_list(...$langs) : array
{
    return $langs;
}

function add_to_language_list(array $langs, string $lang) : array 
{
    return array_merge($langs, [$lang]);
}

function prune_language_list(array $langs) : array
{
    array_shift($langs);
    return $langs;
}

function current_language($langs) : string
{
    return isset($langs[0]) ? $langs[0] : [];
}

function language_list_length($langs) : int
{
    return count($langs);
}
