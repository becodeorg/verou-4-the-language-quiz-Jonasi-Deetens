<?php

class Player
{
    private string $name;

    private int $score;

    public function __construct(string $name)
    {
        // TODO: add 👤 automatically to their name
        $this->name = "👤 " . $name;
        $this->score = 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getScore()
    {
        return $this->score;
    }
}