<?php

class Bob {
    private string $expresionIsQuestion;
    private string $expresionWasYelled;

    public function respondTo(string $expresion) : string {
        $expresion = trim($expresion);
        $this->expresionIsQuestion = str_ends_with($expresion, '?');
        $this->expresionWasYelled = $this->isYelling($expresion);
        $expresion = preg_replace('/[[:^print:]]/', '', $expresion);
        
        if (mb_strlen($expresion) === 0) {
            return "Fine. Be that way!";
        }

        if ($this->expresionIsQuestion && !$this->expresionWasYelled) {
            return "Sure.";
        }

        if (!$this->expresionIsQuestion && $this->expresionWasYelled) {
            return "Whoa, chill out!";
        }
        
        if ($this->expresionIsQuestion && $this->expresionWasYelled) {
            return "Calm down, I know what I'm doing!";
        }

        return "Whatever.";
    }

    private function isYelling(string $expresion) : bool {
        return preg_match('/^[A-ZÄÖÜ]+$/u', preg_replace('/[^A-Za-zÄÖÜäöü]/u', '', $expresion));
    }
}