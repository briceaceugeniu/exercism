<?php

function distance(string $strandA, string $strandB) : int
{
    $count = 0;
    
    for ($i=0, $lenA = strlen($strandA), $lenB = strlen($strandB); $i < $lenA; $i++) { 
        if ($lenA !== $lenB) {
            throw new InvalidArgumentException("DNA strands must be of equal length.", 1);
        }
        
        if ($strandA[$i] !== $strandB[$i]) {
            $count++;
        }

    }
    return $count;
}
