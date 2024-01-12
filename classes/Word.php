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
        $distance = levenshtein(strtolower($this->translation), strtolower($answer));
        $threshold = 1;

        if ($distance <= $threshold) {
            return true;
        } else {
            return false;
        }
    }
}