<?php

class Player
{
    private string $name;

    private int $score;

    public function __construct(string $name, int $score)
    {
        // TODO: add 👤 automatically to their name
        $this->name = "👤" . $name;
        $this->score = $score;
    }
}