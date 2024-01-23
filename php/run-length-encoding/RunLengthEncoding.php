<?php
declare(strict_types=1);

function encode(string $input): string
{
	$input_len = mb_strlen($input);
	$curr_char = mb_substr($input, 0, 1);
	$counter = 0;
	$solution = "";

	for ($i=0; $i < $input_len; $i++) { 
		$c = mb_substr($input, $i, 1);
		if ($c === $curr_char) {
    		$counter++; 
    	} else {
    		$solution .= ($counter > 1 ? $counter : "") .  $curr_char;
    		$curr_char = $c;
    		$counter = 1;
    	}
	}
	$solution .= ($counter > 1 ? $counter : "") .  $curr_char;
    return $solution;
}

function decode(string $input): string
{
	$input_len = mb_strlen($input);
	$temp = "";
	$solution = "";

	for ($i=0; $i < $input_len; $i++) { 
		$c = mb_substr($input, $i, 1);

		if (is_numeric($c)) {
			$temp .= $c;
		} else {
			$solution .= (int)$temp > 1 ? str_repeat($c, (int)$temp) : $c;
			$temp = "";
		}
	}
	
	return $solution;
}