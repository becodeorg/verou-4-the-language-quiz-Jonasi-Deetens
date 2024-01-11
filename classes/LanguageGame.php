<?php

class LanguageGame
{
    private Word $word;
    private array $words;

    public function __construct()
    {
        // :: is used for static functions
        // They can be called without an instance of that class being created
        $this->words = [];
        // and are used mostly for more *static* types of data (a fixed set of translations in this case)
        foreach (Data::words() as $englishTranslation => $dutchTranslation) {
            // TODO: create instances of the Word class to be added to the words array
            $this->words[] = new Word($englishTranslation, $dutchTranslation);
        }
    }

    private function generateRandomWord(): void
    {
        $this->word = $this->words[rand(0, count($this->words)-1)];
        $_SESSION['currentWord'] = $this->word;
    }

    public function run(): void
    {
        session_start();

        // TODO: check for option A or B
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $this->generateRandomWord();
            echo "<h1>Translate <i>this</i>!!!</h1>";
            echo "<h2>" . $this->word->getWord() . "</h2>";
        } else {
            $word = $_SESSION['currentWord'];
            $answer = $_POST["translationBar"];

            if($word->verify($answer)) {
                echo "Correct!";
            } else echo "Failed, The correct answer was: " . $word->getTranslation();
        }

        // Option A: user visits site first time (or wants a new word)
        // TODO: select a random word for the user to translate

        // Option B: user has just submitted an answer
        // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
        // TODO: generate a message for the user that can be shown

    }
}