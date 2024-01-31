<?php

declare(strict_types=1);

class Robot
{
    /**
     *
     * @var int[]
     */
    public array $position;

    /**
     *
     * @var string
     */
    public string $direction;

    const DIRECTION_NORTH = "DIRECTION_NORTH";
    const DIRECTION_SOUTH = "DIRECTION_SOUTH";
    const DIRECTION_EAST = "DIRECTION_EAST";
    const DIRECTION_WEST = "DIRECTION_WEST";

    public function __construct(array $position, string $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    public function turnRight(): self
    {
        match ($this->direction) {
            self::DIRECTION_NORTH => $this->direction = self::DIRECTION_EAST,
            self::DIRECTION_EAST => $this->direction = self::DIRECTION_SOUTH,
            self::DIRECTION_SOUTH => $this->direction = self::DIRECTION_WEST,
            self::DIRECTION_WEST => $this->direction = self::DIRECTION_NORTH,
        };
        return $this;
    }

    public function turnLeft(): self
    {
        match ($this->direction) {
            self::DIRECTION_NORTH => $this->direction = self::DIRECTION_WEST,
            self::DIRECTION_WEST => $this->direction = self::DIRECTION_SOUTH,
            self::DIRECTION_SOUTH => $this->direction = self::DIRECTION_EAST,
            self::DIRECTION_EAST => $this->direction = self::DIRECTION_NORTH,
        };
        return $this;
    }

    public function advance(): self
    {
        match ($this->direction) {
            self::DIRECTION_NORTH => $this->position[1] += 1,
            self::DIRECTION_WEST => $this->position[0] += -1,
            self::DIRECTION_SOUTH => $this->position[1] += -1,
            self::DIRECTION_EAST => $this->position[0] += 1,
        };
        return $this;
    }

    public function instructions(string $instructions)
    {
        $instructions = mb_str_split($instructions);
        foreach ($instructions as $instruction) {
            switch ($instruction) {
                case "R":
                    $this->turnRight();
                    break;
                case "L":
                    $this->turnLeft();
                    break;
                case "A":
                    $this->advance();
                    break;
                default:
                    throw new InvalidArgumentException("Invalid instruction");
            }
        }
    }
}
