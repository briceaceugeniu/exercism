<?php
function isValid(string $input): bool
{
    $input = preg_replace('/\s+/', '', $input);
    $inpLength = strlen($input);

    if ($inpLength <= 1 || !is_numeric($input)) {
        return false;
    }

    $prepInput = "";
    $isCheckDigit = false;

    for ($i = $inpLength - 1; $i >= 0; $i--) {
        if ($isCheckDigit) {
            $prepInput .= ($input[$i] * 2 > 9) ? $input[$i] * 2 - 9 : $input[$i] * 2;
        } else {
            $prepInput .= $input[$i];
        }

        $isCheckDigit = !$isCheckDigit;
    }
    return array_sum(str_split($prepInput)) % 10 === 0;
}
