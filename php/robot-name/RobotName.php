<?php

declare(strict_types=1);

class Robot
{
    private string $name;

    private static array $existingNames = [];

    function __construct()
    {
        $this->name = $this->generateName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function reset(): void
    {
        $this->name = $this->generateName();
    }

    private function generateName(): string
    {
        do {
            $firstLetter = chr(rand(65, 90));
            $secondLetter = chr(rand(65, 90));
            $numb1 = rand(0, 9);
            $numb2 = rand(0, 9);
            $numb3 = rand(0, 9);

            $newName = $firstLetter . $secondLetter . $numb1 . $numb2 . $numb3;
        } while (in_array($newName, Robot::$existingNames));
        Robot::$existingNames[] = $newName;
        return $newName;
    }
}
