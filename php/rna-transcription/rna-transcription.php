<?php

define("dnaToRNA", ["G" => "C", "C" => "G", "T" => "A", "A" => "U"]);

function toRNA(string $input) : string {
    return strtr($input, dnaToRNA);
}