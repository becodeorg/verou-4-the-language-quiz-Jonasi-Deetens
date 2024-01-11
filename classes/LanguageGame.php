<?php

class LanguageGame
{
    private Word $word;
    private array $words;
    private Player $player;

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
        if (isset($_SESSION['player'])) $this->player = $_SESSION['player'];
        else $this->player = new Player("Ikke");

        echo $this->player->getName();
        echo "<br>";
        echo $this->player->getScore();

        // TODO: check for option A or B
        if (empty($_POST)) {
            $this->generateRandomWord();
            echo "<h1>Translate <i>this</i>!!!</h1>";
            echo "<h2>" . $this->word->getWord() . "</h2>";
        } else {
            $word = $_SESSION['currentWord'];
            $answer = $_POST["translationBar"];

            if($word->verify($answer)) {
                echo "<h1>Correct!</h1>";
            } else echo "<h1>Failed, The correct answer was: " . $word->getTranslation() . "</h1>";
        }
    }
}