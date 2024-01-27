<?php

class Bob {
    public function respondTo(string $expresion) : string {
        $expresion = trim($expresion);
        $expresionIsQuestion = str_ends_with($expresion, '?');
        $expresionWasYelled = $this->isYelling($expresion);

        return match (true) {
            (mb_strlen(preg_replace('/[[:^print:]]/', '', $expresion)) === 0) => "Fine. Be that way!",
            $expresionIsQuestion && !$expresionWasYelled => "Sure.",
            !$expresionIsQuestion && $expresionWasYelled => "Whoa, chill out!",
            $expresionIsQuestion && $expresionWasYelled => "Calm down, I know what I'm doing!",
            default => "Whatever.",
        };
    }

    private function isYelling(string $expresion) : bool {
        return preg_match('/^\p{Lu}+$/u', preg_replace('/[^\p{Lu}\p{L}]/u', '', $expresion));
    }
}