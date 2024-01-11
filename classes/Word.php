<?php

class Word
{
    // TODO: add word (FR) and answer (EN) - (via constructor or not? why?)
    private string $word;
    private string $translation;

    public function __construct(string $word, string $translation)
    {
        $this->word = $word;
        $this->translation = $translation;
    }

    public function getWord()
    {
        return $this->word;
    }

    public function getTranslation()
    {
        return $this->translation;
    }

    public function verify(string $answer): bool
    {
        // TODO: use this function to verify if the provided answer by the user matches the correct one
        if (strtolower($this->translation) === strtolower($answer)) return true;
        else return false;
        // Bonus (hard): can you allow answers with small typo's (max one character different)?
    }
}