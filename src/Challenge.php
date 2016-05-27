<?php

namespace LTE;


class Challenge
{
    private $words;
    private $from;
    private $to;
    private $current;
    private $totalChallengesMade = 0;
    private $successCount = 0;
    private $wrongCount = 0;

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function setFromToLanguage($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function pickWordRandomly()
    {
        $this->current = $this->words[rand(0, (count($this->words) - 1))];

        $this->totalChallengesMade++;
    }

    public function getWordSourceLanguage()
    {
        return $this->current[$this->from];
    }

    public function getWordTranslation()
    {
        return $this->current[$this->to];
    }

    public function getTotalChallengesMade()
    {
        return $this->totalChallengesMade;
    }

    public function increaseSuccessAnswerCount()
    {
        $this->successCount++;
    }

    public function increaseWrongAnswerCount()
    {
        $this->wrongCount++;
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }

    public function getWrongCount()
    {
        return $this->wrongCount;
    }
}