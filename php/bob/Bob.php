<?php

class Bob {
    public function respondTo(string $expresion) : string {
        $expresion = trim($expresion);

        return match ([
            str_ends_with($expresion, '?'),
            $this->isYelling($expresion),
            (mb_strlen(preg_replace('/[[:^print:]]/', '', $expresion)) === 0)
        ]) {
            [false, false, true] => "Fine. Be that way!",
            [true, false, false] => "Sure.",
            [false, true, false] => "Whoa, chill out!",
            [true, true, false] => "Calm down, I know what I'm doing!",
            default => "Whatever.",
        };
    }

    private function isYelling(string $expresion) : bool {
        return preg_match('/^\p{Lu}+$/u', preg_replace('/[^\p{Lu}\p{L}]/u', '', $expresion));
    }
}