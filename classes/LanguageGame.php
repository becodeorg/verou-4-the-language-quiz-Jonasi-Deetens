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
        else if (isset($_POST["nickname"])) {
            $this->player = new Player($_POST["nickname"]);
            $_SESSION['player'] = $this->player;
        }

        // TODO: check for option A or B
        if (empty($_POST) || isset($_POST["nickname"])) {
            $_SESSION["message"] = "";
            $this->generateRandomWord();
        } else if (isset($_POST["reset"])) {
            $this->player->resetScore();
            $_SESSION["message"] = "Score has been reset!";
        } else if (isset($_POST["new"])) {
            unset($_SESSION["player"]);
        } else {
            $word = $_SESSION['currentWord'];
            $answer = $_POST["translationBar"];

            if($word->verify($answer)) {
                $this->player->incrementScore();
                if ($this->player->getRightAnswers() >= 10)
                {
                    $_SESSION["message"] = "Congratulations, you won!";
                    $_POST["gameover"] = true;

                } else {
                    $_SESSION["message"] =  "Correct";
                }
            } else {
                $this->player->incrementWrongScore();
                if ($this->player->getWrongAnswers() >= 10)
                {
                    $_SESSION["message"] =  "Failure as always, atleast you didn't get a 0.. Did you?";
                    $_POST["gameover"] = true;

                } else {
                    $_SESSION["message"] =  "Failed, The correct answer was: " . $word->getTranslation();
                }
            }
        }
    }
}