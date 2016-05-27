<?php

namespace LTE;


class Prompt
{
    private $challenge;
    private $maxIterations;

    public function __construct(Challenge $challenge, $maxIterations = null)
    {
        $this->challenge = $challenge;
        $this->maxIterations = (is_numeric($maxIterations)) ? $maxIterations : 10;
    }
    
    public function start()
    {
        while ($this->challenge->getTotalChallengesMade() < $this->maxIterations) {
            $this->challenge->pickWordRandomly();

            echo PHP_EOL . $this->challenge->getWordSourceLanguage() . PHP_EOL;

            $answer = readline(" > ");

            if (strtolower($this->challenge->getWordTranslation()) === strtolower($answer)) {
                echo "\033[32mCorrect!\033[37m";
                $this->challenge->increaseSuccessAnswerCount();
            } else {
                echo "\033[31mWrong! The correct word is '{$this->challenge->getWordTranslation()}'\033[37m";
                $this->challenge->increaseWrongAnswerCount();
            }

            echo PHP_EOL;
        }
    }
    
    public function showSummary()
    {
        echo PHP_EOL . "Summary: "
            . PHP_EOL . "  Successes: \e[32m{$this->challenge->getSuccessCount()}\e[37m"
            . PHP_EOL . "  Failures:  \e[31m{$this->challenge->getWrongCount()}\e[37m"
            . PHP_EOL . PHP_EOL;
    }
}