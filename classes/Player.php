<?php

class Player
{
    private string $name;

    private int $rightAnswers;
    private int $wrongAnswers;

    public function __construct(string $name)
    {
        // TODO: add 👤 automatically to their name
        $this->name = "👤 " . $name;
        $this->rightAnswers = 0;
        $this->wrongAnswers = 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRightAnswers()
    {
        return $this->rightAnswers;
    } 
    
    public function getWrongAnswers()
    {
        return $this->wrongAnswers;
    }

    public function incrementScore(): void
    {
        $this->rightAnswers += 1;
    }

    public function incrementWrongScore(): void
    {
        $this->wrongAnswers += 1;
    }

    public function resetScore(): void 
    {
        $this->rightAnswers = 0;
        $this->wrongAnswers = 0;
    }
}