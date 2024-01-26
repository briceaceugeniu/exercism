<?php

declare(strict_types=1);
define("dnaToRNA", ["G" => "C", "C" => "G", "T" => "A", "A" => "U"]);

function toRna(string $dna): string
{
    return strtr($dna, dnaToRNA);
}
