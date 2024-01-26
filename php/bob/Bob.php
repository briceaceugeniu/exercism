<?php

class Bob {
    private string $expresionIsQuestion;
    private array $splitedExpresion;

    public function respondTo(string $expresion) : string {
        $this->splitedExpresion = mb_str_split(trim($expresion));
        $expresion = $this->removeUnprintableChars($expresion);
        
        if (mb_strlen($expresion) === 0) {
            return "Fine. Be that way!";
        }

        $this->expresionIsQuestion = end($this->splitedExpresion) === '?';

        if ($this->expresionIsQuestion && !$this->isYelling()) {
            return "Sure.";
        }

        if (!$this->expresionIsQuestion && $this->isYelling()) {
            return "Whoa, chill out!";
        }
        
        if ($this->expresionIsQuestion && $this->isYelling()) {
            return "Calm down, I know what I'm doing!";
        }

        return "Whatever.";
    }

    private function removeUnprintableChars() : string
    {
        $result = "";
        $excludedCharacters = ["\u{000b}", "\u{00a0}", "\u{2002}"];

        foreach ($this->splitedExpresion as $char) {
            if (mb_ord($char) < 32 || in_array($char, $excludedCharacters)) {
                continue;
            }
            $result .= $char;
        }
        return $result;
    }

    private function isYelling() : bool {
        $upperCaseChars = 0;
        foreach ($this->splitedExpresion as $char) {
            $isAlpha = preg_match('/^\p{L}+$/u', $char);
            
            if($isAlpha) {
                $isLowercase = mb_strtolower($char, 'UTF-8') === $char;
                if ($isLowercase) {
                    return false;
                }
                $upperCaseChars++;
            }
        }

        return $upperCaseChars > 0;
    }
}