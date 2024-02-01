<?php

declare(strict_types=1);

class School
{
    private array $db = [];

    public function add(string $name, int $grade): void
    {
        $this->db[$grade][] = $name;
    }

    public function grade(int $grade): array
    {
        return $this->db[$grade] ?? [];
    }

    public function studentsByGradeAlphabetical(): array
    {
        ksort($this->db);
        foreach ($this->db as $key => $value_) {
            sort($this->db[$key]);
        }
        return $this->db;
    }
}
